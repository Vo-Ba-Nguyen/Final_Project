<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dang_ky_admins')->delete();

        // Reset id về lại 1
        DB::table('dang_ky_admins')->truncate();

        DB::table('dang_ky_admins')->insert([
            [
                'ho_va_ten'         => "Admin",
                'email'             => "admin@master.com",
                'so_dien_thoai'     => 1234567890,
                'password'          => bcrypt(1234567),
                'ngay_sinh'         => 12345,
                'dia_chi'           => 12345,
                'hash_code'         => 12345,
            ],
        ]);
    }
}
