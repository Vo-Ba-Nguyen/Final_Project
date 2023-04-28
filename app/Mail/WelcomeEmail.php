<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function build()
    {
        return $this->subject('Kích Hoạt Tài Khoản Tại Website....')
                    ->view('Home.Mail.kich_hoat_tai_khoan', [
                        'data'   => $this->data,
                    ]);
    }
}
