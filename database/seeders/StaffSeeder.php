<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_staff')->insert([
        [   
            'Staff_Name'=>'Manager Sample',
            'Staff_Position'=>'Manager',
            'Staff_EmailAdd'=>'managersample@gmail.com',
            'Staff_ContactNo'=>'09267716536',
            'Staff_Password'=>Hash::make('managersample'),
            'Staff_Birthday'=>'2000-10-10',                
            'DP'=>'managerDP.jpg',
            'PicID'=>'managerID.jpg',

        ],
        [   
            'Staff_Name'=>'Reception Sample',
            'Staff_Position'=>'Reception',
            'Staff_EmailAdd'=>'receptionsample@gmail.com',
            'Staff_ContactNo'=>'09267716537',
            'Staff_Password'=>Hash::make('receptionsample'),
            'Staff_Birthday'=>'2000-10-10',                
            'DP'=>'receptionDP.jpg',
            'PicID'=>'receptionID.jpg',

        ],
        [   
            'Staff_Name'=>'Deliverer Sample',
            'Staff_Position'=>'Delivery Person',
            'Staff_EmailAdd'=>'deliverersample@gmail.com',
            'Staff_ContactNo'=>'09267716538',
            'Staff_Password'=>Hash::make('deliverersample'),
            'Staff_Birthday'=>'2000-10-10',                
            'DP'=>'delivererDP.jpg',
            'PicID'=>'delivererID.jpg',

        ],
        [   
            'Staff_Name'=>'Kitchen Sample',
            'Staff_Position'=>'Kitchen Staff',
            'Staff_EmailAdd'=>'kitchensample@gmail.com',
            'Staff_ContactNo'=>'09267716539',
            'Staff_Password'=>Hash::make('kitchensample'),
            'Staff_Birthday'=>'2000-10-10',                
            'DP'=>'kitchenDP.jpg',
            'PicID'=>'kitchenID.jpg',

        ]  
        
        
        ]);
    }
}
