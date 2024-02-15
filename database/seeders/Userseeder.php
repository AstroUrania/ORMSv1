<?php

namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tb_customers')->insert([
            'Customer_Name'=>'sample',
            'Cust_pass'=>Hash::make('sample'),
            'Cust_EmailAdd'=>'sample@gmail.com',
            'Cust_ContactNo'=>'09267716536',
            'Cust_Address'=>'address example',
            'Cust_Birthday'=>'2000-10-10',
            'DP'=>'hello.jpg',
            'PicID'=>'hi.jpg'

        ]);
    }
}
