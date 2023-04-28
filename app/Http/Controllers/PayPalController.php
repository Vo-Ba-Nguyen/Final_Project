<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class PayPalController extends Controller
{
    public function createTransaction(Request $request)
    {
        $tien_hang = $request->tien_hang;
        $ship = $request->ship;
        $price = $request->tien_hang + $request->ship;
        return view('Home.Page.success', compact("tien_hang", "ship", "price"));
    }
    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]),
                "cancel_url" => route('cancelTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // return redirect()->away($links['href']);
                    return response()->json([
                        'status' => true,
                        'link' => $links['href'],
                    ]);
                }
            }

            return redirect()
                ->route('createTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]);
                // ->with('error', 'Something went wrong.');

        } else {
            return redirect()
                ->route('createTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]);
                // ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('createTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]);
                // ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('createTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]);
                // ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction', ['tien_hang' => $request->tien_hang, 'ship' => $request->ship, 'price' => $request->price]);
            // ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
