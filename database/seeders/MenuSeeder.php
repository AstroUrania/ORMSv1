<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //
         DB::table('TB_MENU')->insert([
            [ 
                'Menu_Name'=>'Pork Adobo',
                'Menu_Price'=>'250.00',
                'Menu_Desc'=>'Pork Adobo made with succulent pork belly braised in vinegar, soy sauce, garlic, and onions.  A delicious balance of salty and savory, this hearty stew is Philippine’s national dish for a good reason!',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Main Dish',
                'Menu_Status'=>'Available',
                'Menu_Pic'=>"adobo.jpg"
                ],
               [
                'Menu_Name'=>'Sinigang',
                'Menu_Price'=>'250.00',
                'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Main Dish',
                'Menu_Status'=>'Available',
                'Menu_Pic'=>"sinigang.png"
               ],
               [
                'Menu_Name'=>'Kare-kare',
                'Menu_Price'=>'250.00',
                'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Main Dish',
                'Menu_Status'=>'Available',
                'Menu_Pic'=>"karekare.jpeg"
               ],
               [ 
                'Menu_Name'=>'Taho',
                'Menu_Price'=>'50.00',
                'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Dessert',
                'Menu_Status'=>'Available',
                'Menu_Pic'=>"taho.jpg"
               ],
               [  
                'Menu_Name'=>'Lumpia',
                'Menu_Price'=>'100.00',
                'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Main Dish',
                'Menu_Status'=>'Available',
                'Menu_Pic'=>"Lumpia.jpg"
               ],
               [   
                'Menu_Name'=>'Bulalo',
                'Menu_Price'=>'50.00',
                'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
                'Menu_Type'=>'Best Seller',
                'Menu_Category'=>'Dessert',
                'Menu_Status'=>'Unavailable',
                'Menu_Pic'=>"bulalo.jpg"
               ],
            [ 
            'Menu_Name'=>'Poqui Poqui',
            'Menu_Price'=>'50.00',
            'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
            'Menu_Type'=>'regular',
            'Menu_Category'=>'Side Dish',
            'Menu_Status'=>'Available',
            'Menu_Pic'=>"poquipoqui.jpg"
            ],
           [
            'Menu_Name'=>'Atchara',
            'Menu_Price'=>'50.00',
            'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
            'Menu_Type'=>'regular',
            'Menu_Category'=>'Side Dish',
            'Menu_Status'=>'Available',
            'Menu_Pic'=>"atchara.jpg"
           ],
           [
            'Menu_Name'=>'Mushroom Adobo',
            'Menu_Price'=>'50.00',
            'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
            'Menu_Type'=>'regular',
            'Menu_Category'=>'Side Dish',
            'Menu_Status'=>'Available',
            'Menu_Pic'=>"mushrooms.jpeg"
           ],
           [ 
            'Menu_Name'=>'Cucumber Salad',
            'Menu_Price'=>'50.00',
            'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
            'Menu_Type'=>'regular',
            'Menu_Category'=>'Side Dish',
            'Menu_Status'=>'Available',
            'Menu_Pic'=>"ctsalad.jpg"
           ],
           [  
            'Menu_Name'=>'Shanghai',
            'Menu_Price'=>'100.00',
            'Menu_Desc'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut convallis ac nulla nec semper. Praesent varius, nibh ut semper mollis, mauris ante pulvinar lorem, pellentesque bibendum nibh nibh ac magna.',
            'Menu_Type'=>'regular',
            'Menu_Category'=>'Side Dish',
            'Menu_Status'=>'Available',
            'Menu_Pic'=>"shanghai.jpg"
           ],
    
    
    ]);
    }
}
