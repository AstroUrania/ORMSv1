<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\staff;
use Illuminate\Support\Facades\DB;
class staffcontroller extends Controller
{
    function stafflogin(Request $req)
    {
        
      $staff= staff::where(['Staff_EmailAdd'=>$req->email])->first();
      if(!$staff || !Hash::check($req->password,$staff->Staff_Password))
      {
          /*echo "<script>
              alert('Email or Password does not match staff record');
              window.location.href='/stafflogin';
              </script>";*/
              return redirect('/stafflogin')->with('error', 'Email or Password does not match staff record');

      }
      else{
          $req->session()->put('staff',$staff);
          return redirect('/dashboard');
      }
    }
   
    function staffregister(Request $req){      
      
      $staff= staff::where(['Staff_EmailAdd'=>$req->email])->first();
      if(!$staff)
      {
        //return $req->password;
        if ($req->password==$req->confirm)
        { 
        $staff = new staff;
        $staff->Staff_Name=$req->name;
        $staff->Staff_Position=$req->position;
        $staff->Staff_EmailAdd=$req->email;
        $staff->Staff_ContactNo=$req->phone; 
        $staff->Staff_Password=Hash::make($req->password);
        $staff->Staff_Birthday=$req->bday;
        $staff->DP="user.jpg";
       // $staff->PicID=$req->ID;
        $staff->save();

        return redirect('/stafflogin')->with('success','Registered Successfully');

        }
        else
        {
            return redirect()->back()->with('warning', 'Password does not match');

        }

      }
      else{
        return redirect('/stafflogin')->with('warning', 'Email Already Registered');
      }
       

    }
/* ------------------ CRUD ---------------------------- */

      public function staffregistermodal(Request $req){         

      $staff= staff::where(['Staff_EmailAdd'=>$req->email])->first();
      if(!$staff)
      {

        $staff = new staff;
        $staff->Staff_Name=$req->name;
        $staff->Staff_Position=$req->position;
        $staff->Staff_EmailAdd=$req->email;
        $staff->Staff_ContactNo=$req->phone; 
        $staff->Staff_Password=Hash::make($req->password);
        $staff->Staff_Birthday=$req->bday;
        if ($req->file('DP')==null)
         {
          $staff->DP="user.jpg";
         }
         else
         {
                  $req->file('DP')->store('public/DP/'); 
                  $staff->DP= $req->file('DP')->hashName();
         }

       // $staff->PicID=$req->ID;
        $staff->save();
        return redirect()->back()->with('success','Staff Added Successfully');

      }
      else{
        return redirect()->back()->with('warning', 'Email Already Registered');
      }
    }

    public function removestaff($staff_id)
    {
        staff::destroy($staff_id);//from model destroy cart_id
        return redirect()->back()->with('warning','Staff Deleted!');
        
    }

    public function updatestaffmember(Request $req)
    {
      //return $req->input();
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

       staff::where('Staff_ID', '=', $req->staffid)
              ->update(['tb_staff.Staff_Name' => $req->name,
                        'tb_staff.Staff_EmailAdd' => $req->email,
                        'tb_staff.Staff_Position' => $req->position,
                        'tb_staff.Staff_ContactNo' => $req->phone,
                        'tb_staff.Staff_Birthday' => $req->bday,
                          'tb_staff.DP' => $dp                        
            ]);

            return redirect()->back()->with('success','Successfully Updated Staff Details');
      
    }

}
