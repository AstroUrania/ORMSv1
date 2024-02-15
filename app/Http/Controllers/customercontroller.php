<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\guests;
use App\Models\cart;

use Session;

class customercontroller extends Controller
{
    public function login(Request $req){
       // return $req->input();
        
        $user= User::where(['Cust_EmailAdd'=>$req->cemail])->first();
        //return $user->Cust_pass;
        if(!$user || !Hash::check($req->cpassword,$user->Cust_pass))
        {
           /* echo "<script>
                alert('Email or Password does not match customer record');
                window.location.href='/login';
                </script>";*/
                return redirect('/login')->with('error', 'Email or Password does not match customer record');
        }
        else{
            $req->session()->put('user',$user);
            if($req->session()->has('guests'))
            {
              $userid=Session::get('guests')['id'];

               Session::forget('guests');
               Cart::where('Customer_ID',$userid)->where('Customer_type',"Guest")->delete();      

            }
            return redirect('/');
        }

    }
 
    function register(Request $req){    
      
      $user= User::where(['Cust_EmailAdd'=>$req->email])->first();
      //return $user->Cust_pass;
      if(!$user)
      {

        if ($req->password==$req->confirm)
        { 
         $user = new user;
         $user->Customer_Name=$req->name;
         $user->Cust_pass=Hash::make($req->password);
         $user->Cust_EmailAdd=$req->email;
         $user->Cust_ContactNo=$req->phone;
         $user->Cust_Address=$req->address;
         $user->Cust_Birthday=$req->bday;
         $user->DP="user.jpg";
        // $user->PicID=$req->ID;
         $user->save();
        return redirect('/login')->with('success', 'Successfully Registered');

        }
        else
        {
            return redirect()->back()->with('warning', 'Password does not match');

        }
      }
      else{
        return redirect('/login')->with('warning', 'Email Already Registered');
      }
        

 
     }
/* ------------------ CRUD ---------------------------- */
     function registermodal(Request $req){       
      
      $user= User::where(['Cust_EmailAdd'=>$req->email])->first();
      //return $user->Cust_pass;
      if(!$user)
      {
        
        
         $user = new user;
         $user->Customer_Name=$req->name;
         $user->Cust_pass=Hash::make($req->password);
         $user->Cust_EmailAdd=$req->email;
         $user->Cust_ContactNo=$req->phone;
         $user->Cust_Address=$req->address;
         $user->Cust_Birthday=$req->bday;
         if ($req->file('DP')==null)
         {
          $user->DP="user.jpg";
         }
         else
         {
                  $req->file('DP')->store('public/DP/'); 
                  $user->DP= $req->file('DP')->hashName();
         }
        // $user->PicID=$req->ID;
         $user->save();

         return back()->with('success', 'Successfully Registered');
        }
      else{
        return back()->with('warning', 'Email Already Registered');
        
      }

    }

    public function removecustomer($cust_id)
    {
        User::destroy($cust_id);//from model destroy cart_id
        return back()->with('warning', 'Successfully Deleted');

    }

    public function updatecustomer(Request $req)
    {

       $dp; 
       if ($req->DPchange == null)
                        {
                        $dp=$req->currDP;
                        }
       else
                      {
                        $req->file('DPchange')->store('public/DP/');
                        $dp=$req->file('DPchange')->hashName();
                      }

       User::where('Customer_ID', '=', $req->theid)
              ->update(['tb_customers.Customer_Name' => $req->name,
                        'tb_customers.Cust_EmailAdd' => $req->email,
                        'tb_customers.Cust_Address' => $req->address,
                        'tb_customers.Cust_ContactNo' => $req->phone,
                        'tb_customers.Cust_Birthday' => $req->bday,
                        'tb_customers.DP' => $dp                        
            ]);
            return back()->with('success', 'Successfully Updated Customer Details');
  
    }
}  