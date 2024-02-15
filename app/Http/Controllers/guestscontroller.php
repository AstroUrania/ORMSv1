<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash; 
use App\Models\guests;
use App\Models\Menu;
use App\Models\payment;
use App\Models\Order;
use App\Models\roomsntables;
use App\Models\reservation;
use Illuminate\Support\Facades\DB;
use App\Models\transaction;
use App\Models\promo;
use App\Models\cart;
use Session;

use App\Helpers\Helper;
use Illuminate\Http\Request;

class guestscontroller extends Controller
{

  //GUEST ORDER ADDING-----------------------------------------------------------------------------------
    public function gcart(Request $req)
    {
      if(Session::has('guests'))
      {
        $Menus= Menu::all(); 
        // $userid=13;
        $userid=Session::get('guests')['id'];
        $cartlist=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('tb_cart.Customer_Type',"Guest")
        ->get();
         $total=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('tb_cart.Customer_Type',"Guest"   )
        ->sum('tb_menu.Menu_Price');
        $usertype=Session::get('staff')['Staff_Position'];

        $promo=DB::table('tb_promo')
        ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

        if ($usertype=="Manager")
            {
            return view('admin/manager/orderadd',['Menus'=>$Menus,'cart'=>$cartlist,'total'=>$total,'userid'=>$userid,'promo'=>$promo]);                 
            }
        else if ($usertype=="Reception")
            {
        return view('admin/reception/orderadd',['Menus'=>$Menus,'cart'=>$cartlist,'total'=>$total,'userid'=>$userid,'promo'=>$promo]); 
            }

      }

      else{
        $user = new guests;
        $user->save();
        $req->session()->put('guests',$user);  
        
        $Menus= Menu::all(); 
       // $userid=13;
        $userid=Session::get('guests')['id'];
       $cartlist=DB::table('tb_cart')
       ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
       ->where('tb_cart.Customer_ID',$userid)
       ->where('tb_cart.Customer_Type',"Guest")
       ->get();
       $total=DB::table('tb_cart')
       ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
       ->where('tb_cart.Customer_ID',$userid)
       ->where('tb_cart.Customer_Type',"Guest")
       ->sum('tb_menu.Menu_Price');
       $usertype=Session::get('staff')['Staff_Position'];

       $promo=DB::table('tb_promo')
       ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

       if ($usertype=="Manager")
       {       
        return view('admin/manager/orderadd',['Menus'=>$Menus,'cart'=>$cartlist,'total'=>$total,'userid'=>$userid,'promo'=>$promo]); 
       }
        else if ($usertype=="Reception")
            {
        return view('admin/reception/orderadd',['Menus'=>$Menus,'cart'=>$cartlist,'total'=>$total,'userid'=>$userid,'promo'=>$promo]); 
            }

      }
        
    }
    
    function addcart(Request $req) 
      {
        $menu=$req->Menu_ID;
       // $userid=13;
         $userid=Session::get('guests')['id'];

       if (cart::where('Customer_ID',$userid)->where('Customer_type',"Guest")->where('Menu_ID',$menu)->exists()) {
              return "warning";
              }
            else { 
              $carts = new cart; 
              $carts->Customer_ID=$userid;
              $carts->Customer_Type="Guest";
              $carts->Menu_ID=$menu;
              $carts->Quantity=1;
              $carts->save();
              return "success";
                } 
          }

      function gremovecart(Request $req)
      {
        $cart_id=$req->cart_id;
        cart::destroy($cart_id);//from model destroy cart_id
        return "cancel";

          }
          
      function gupdateqty($Menu_id,Request $req)
      {
        $userid=Session::get('guests')['id'];
        cart::where('Customer_ID', '=', $userid)
        ->where('Customer_type',"Guest")
        ->where('Menu_ID','=',$Menu_id)
        ->update(['tb_cart.quantity' => $req->quantity]);
              //  return response('success');
            // return "it's working"; 
         }
     
         
         function gplaceorder(Request $req)
         {

          //$req->input();
         $promocode = $req->promocode;
         //$promocode = "DSC_0001";
         $promodeets=DB::table('tb_promo')
               ->where('tb_promo.Promo_Code',$promocode)
               ->get();
        
          if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
          {
             $userid=Session::get('guests')['id'];
             
             $allcart=DB::table('tb_cart')
                     ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
                     ->where('tb_cart.Customer_ID',$userid)
                     ->where('Customer_type',"Guest")
                     ->get();
     
                     foreach($allcart as $acart)
                     { 
                     
                         $order = new Order;
                         $order->Customer_ID=$acart->Customer_ID;
                         $order->Customer_type="Guest";
                         $order->Menu_ID=$acart->Menu_ID;
                         $order->Quantity=$acart->Quantity;
                         $order->Specification=$req->specs;
                         $order->Claim_Type=$req->claimvia;
                         $order->Orders_Price=$acart->Quantity*$acart->Menu_Price;
                         $order->Order_Status="Pending";
                         $order->Payment_ID=0;
                         $order->Delivery_Datetime=$req->date;
                         $order->Delivery_Price=0.0;
                         $order->Receiver_Name=$req->name;
                         $order->Rec_ContactNo=$req->number;
                         $order->Rec_Address=$req->address;
                         $order->Delivery_Status="Pending";
                         $order->Deliverer_ID=0;
                         $order->save();
     
                     }
     
                //--------------TRANSACTION ---------------------------
                $trans = new transaction;
                //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
              $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'OR');
              $trans->Customer_ID=$userid;
              $trans->Customer_type="Guest";
              $trans->save();

                //--------------ORDERS ---------------------------
                    $totalpay=DB::table('tb_orders')
                    ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
                    ->where('tb_orders.Customer_ID',$userid)
                    ->where('tb_orders.Customer_type',"Guest")
                    ->where('tb_orders.Payment_ID',0)
                    ->sum('tb_orders.Orders_Price');
                  
        

          if ($promocode != NULL)
            {

              
              foreach($promodeets as $promodeets)
              { //return $promodeets->Promo_Type;
                    $payment = new payment;
                    $payment->Customer_ID=$userid;
                    $payment->Customer_Type="Guest";
                    $payment->Total_Payment=$totalpay;
                    $payment->MOP=$req->MOP;
                    if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                    $payment->Promo_Code=$promocode;
                      if ($promodeets->Promo_Type=="Percentage Discount")
                      {
                        $payment->TP_Promo=$totalpay-$totalpay*($promodeets->Promo_value/100);
                      }
                      else if($promodeets->Promo_Type=="Price Discount")
                      {
                        $payment->TP_Promo=$totalpay-$promodeets->Promo_value;

                      }
                      else 
                      {
                        $payment->TP_Promo=0;
                      }
                    $payment->Tracking_No=$trans->TrackingNo;
                    $payment->Payment_For="Orders";
                    $payment->Payment_Status="Pending";
                    //$payment->Promo_Code=$req->promo;
                    
                    $payment->save();
                }
            }
             else
                {
                  $payment = new payment;
                  $payment->Customer_ID=$userid;
                  $payment->Customer_Type="Guest";
                  $payment->Total_Payment=$totalpay;
                  $payment->MOP=$req->MOP;
                  if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                  $payment->Promo_Code=$promocode;
                  $payment->TP_Promo=$totalpay;
                  $payment->Payment_For="Orders";
                  $payment->Tracking_No=$trans->TrackingNo;
                  $payment->Payment_Status="Pending";
                  //$payment->Promo_Code=$req->promo;
                  
                  $payment->save();
                }
          }
        
        else 
        {
          return redirect()->back()->with('warning', 'Promo Code Invalid, Please make sure the Promo Code is Correct');
        }

            Cart::where('Customer_ID',$userid)->where('Customer_type',"Guest")->delete();      
                 
            $PID=$payment->Payment_ID;
            $TID=$trans->TrackingNo;

            Order::where('Customer_ID', '=', $userid)
                 ->where('Customer_type',"Guest")
                 ->where('Payment_ID','=',0)
                 ->update(['tb_orders.Payment_ID' => $PID,
                           'tb_orders.Tracking_No' => $TID ]);
             // FORGET GUEST
                 Session::forget('guests');
            // return view('orders',['PID'=>$PID]);
            $usertype=Session::get('staff')['Staff_Position'];

            if ($usertype=="Manager")
            {            
              return redirect('/orders')->with('success', 'Order details Added Successfully!');
            }
            else if ($usertype=="Reception")
            {
              return redirect('/rorders')->with('success', 'Order details Added Successfully!');
            }
     
         }

  //GUEST RESERVATION ADDING-----------------------------------------------------------------------------------
  public function greservation(Request $req)
  {
    $usertype=Session::get('staff')['Staff_Position'];

    if(Session::has('guests'))
    {
      $rt= roomsntables::where('RT_Type','Room')->get();
      $rtable= roomsntables::where('RT_Type','Table')->get();

      // $userid=13;
      $userid=Session::get('guests')['id'];
      $rcart=DB::table('tb_reservation')
      ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
      ->where('tb_reservation.Customer_ID',$userid)
      ->where('tb_reservation.Customer_Type',"Guest")
      ->where('tbroomsntables.RT_Type',"Room")
      ->get();

      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

      if ($usertype=="Manager")
      {
        return view('admin/manager/reserveadd',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
      else if ($usertype=="Reception")
      {
        return view('admin/reception/reserveadd',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
    }

    else{
      $user = new guests;
      $user->save();
      $req->session()->put('guests',$user);  
      
      $rt= roomsntables::where('RT_Type','Room')->get();
      $rtable= roomsntables::where('RT_Type','Table')->get();
      // $userid=13;
      $userid=Session::get('guests')['id'];
      $rcart=DB::table('tb_reservation')
      ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
      ->where('tb_reservation.Customer_ID',$userid)
      ->where('tb_reservation.Customer_Type',"Guest")
      ->where('tbroomsntables.RT_Type',"Room")
      ->get();

      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

      if ($usertype=="Manager")
      { return view('admin/manager/reserveadd',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); }
      else if ($usertype=="Reception")
      { return view('admin/reception/reserveadd',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); }
    }
      
  }
  
  function reservationcart(Request $req)
    {
      $rt=$req->RT_ID;
      $type=$req->RT_Type;
     $price=$req->RT_Price;
       $userid=Session::get('guests')['id'];
       $currdate = date('Y-m-d H:i:s');

     if (reservation::where('Customer_ID',$userid)->where('Customer_Type',"Guest")->where('RT_ID',$rt)->exists()) {
            return "warning";
            }
          else { 
            $res = new reservation; 
            $res->Customer_ID=$userid;
            $res->Customer_Type="Guest";
            $res->RT_ID=$rt;
            $res->RT_type=$type;
            $res->Days=1;
            $res->Reservation_Price=$price;
            $res->Reservation_Status="Pending";
            $res->Companion_No=0;
            $res->save();

            roomsntables::where('RT_ID', '=', $rt)
            ->update(['tbroomsntables.Avail_Status' => "On hold"]);

            return ("success");

              }
        }

    function cancelreservation(Request $req)
    {
      $rcart_id=$req->cart_id;
      $rtid=$req->rtid;
      reservation::destroy($rcart_id);

      roomsntables::where('RT_ID', '=', $rtid)
      ->update(['tbroomsntables.Avail_Status' => "Available"]);

      return "cancel";
    }
        
    function updatereservation($r_id,Request $req)
    {
      $userid=Session::get('guests')['id'];
     /* ------------------- updates  --------------------------*/
      reservation::where('Customer_ID', '=', $userid)
      ->where('Customer_type',"Guest")
      ->where('RT_ID','=',$r_id)
      ->update(['Companion_No' => $req->Companion_No, 
                'Reservation_Datetime' => $req->Reservation_Datetime,
                'End_Datetime' => $req->End_Datetime,
                'Days' => $req->Days,
                'Reservation_Price' => $req->gtot
                //'Reservation_Status' => "Pending"
              ]);
         //  return "it's working"; 
       }
   
       
       function gplacereservation(Request $req)
       {
        $usertype=Session::get('staff')['Staff_Position'];

        $promocode = $req->promocode;
              //$promocode = "DSC_0001";
          $promodeets=DB::table('tb_promo')
                    ->where('tb_promo.Promo_Code',$promocode)
                    ->get();
            
          if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
          {
           $userid=Session::get('guests')['id'];
           
                   
                   reservation::
                   join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
                   ->where('tb_reservation.Customer_ID',$userid)
                   ->where('Customer_Type',"Guest")
                   ->where('tbroomsntables.RT_Type',"Room")
                   ->update([
                    
                    'Customer_Name' => $req->name, 
                    'Customer_Number' => $req->number,
                    'Specifications' => $req->specs,
                    'Reservation_Status' => "To be Approved",
                    'Payment_ID'=>0,
                    'Avail_Status'=>"Reserved",
                          ]);
   
        //--------------TRANSACTION ---------------------------
            $trans = new transaction;
            //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
              $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'RM');
              $trans->Customer_ID=$userid;
              $trans->Customer_type="Guest";
              $trans->save();

        //--------------RESERVATION ---------------------------
           $totalpay=DB::table('tb_reservation')
           ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
           ->where('tb_reservation.Customer_ID',$userid)
           ->where('tb_reservation.Customer_type',"Guest")
           ->where('tb_reservation.Payment_ID',0)
           ->where('tbroomsntables.RT_Type',"Room")
           ->sum('tb_reservation.Reservation_Price');
   
            //$req->input();
              
            if ($promocode != NULL)
            {
              foreach($promodeets as $promodeets)
              { 
        
                $payment = new payment;
                $payment->Customer_ID=$userid;
                $payment->Customer_Type="Guest";
                $payment->Total_Payment=$totalpay;
                $payment->MOP=$req->MOP;
                if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                $payment->Promo_Code=$promocode;
                              if ($promodeets->Promo_Type=="Percentage Discount")
                              {
                                $payment->TP_Promo=$totalpay-$totalpay*($promodeets->Promo_value/100);
                              }
                              else if($promodeets->Promo_Type=="Price Discount")
                              {
                                $payment->TP_Promo=$totalpay-$promodeets->Promo_value;
                              }
                              else 
                              {
                                $payment->TP_Promo=0;
                              }
                $payment->Tracking_No=$trans->TrackingNo;
                $payment->Payment_For="Reservation";
                $payment->Payment_Status="Pending";
                $payment->save();
            }
        
            }
            else
            {
                $payment = new payment;
                $payment->Customer_ID=$userid;
                $payment->Customer_Type="Guest";
                $payment->Total_Payment=$totalpay;
                $payment->MOP=$req->MOP;
                if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                $payment->Promo_Code=$promocode;
                $payment->TP_Promo=$totalpay;
                $payment->Tracking_No=$trans->TrackingNo;
                $payment->Payment_For="Reservation";
                $payment->Payment_Status="Pending";
                $payment->save();
            }
               
          $PID=$payment->Payment_ID;
          $TID=$trans->TrackingNo;

          reservation::where('Customer_ID', '=', $userid)
               ->where('Customer_type',"Guest")
               ->where('Payment_ID','=',0)
               ->update(['tb_reservation.Payment_ID' => $PID,
                           'tb_reservation.Tracking_No' => $TID]);

               reservation::where('Customer_ID', '=', $userid)
               ->where('Customer_type',"Guest")->where('Payment_ID','=',NULL)->delete();// FORGET GUEST
              Session::forget('guests');

          /* return view('orders',['PID'=>$PID]);
           echo "<script>
                  alert('Payment ID: $PID');
                  window.location.href='/reservation';
                  </script>";*/

           
        if ($usertype=="Manager")
        {        
          return redirect('/reservation')->with('success', 'Room Reserved Successfully! '.' Transaction ID: '.$TID);
        }
        else if ($usertype=="Reception")
        {
          return redirect('/rreservation')->with('success', 'Room Reserved Successfully! '.' Transaction ID: '.$TID);
        }
           } 
           else 
           {
               return back()->with('warning', 'Promo Code Invalid, Please make sure the Promo Code is Correct');
           }
   
       }

  //GUEST TABLE RESERVATION ADDING-----------------------------------------------------------------------------------
  public function gtbreservation(Request $req)
  {
    $usertype=Session::get('staff')['Staff_Position'];

    if(Session::has('guests'))
    {
      $rt= roomsntables::where('RT_Type','Room')->get();
      $rtable= roomsntables::where('RT_Type','Table')->get();

      // $userid=13;
      $userid=Session::get('guests')['id'];
      $rcart=DB::table('tb_reservation')
      ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
      ->where('tb_reservation.Customer_ID',$userid)
      ->where('tb_reservation.Customer_Type',"Guest")
      ->where('tbroomsntables.RT_Type',"Table")
      ->get();

      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

      if ($usertype=="Manager")
      {
        return view('admin/manager/reserveaddtb',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
      else if ($usertype=="Reception")
      {
        return view('admin/reception/reserveaddtb',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
    }

    else{
      $user = new guests;
      $user->save();
      $req->session()->put('guests',$user);  
      
      $rt= roomsntables::where('RT_Type','Room')->get();
      $rtable= roomsntables::where('RT_Type','Table')->get();
      // $userid=13;
      $userid=Session::get('guests')['id'];
      $rcart=DB::table('tb_reservation')
      ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
      ->where('tb_reservation.Customer_ID',$userid)
      ->where('tb_reservation.Customer_Type',"Guest")
      ->where('tbroomsntables.RT_Type',"Table")
      ->get();

      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();

      if ($usertype=="Manager")
      {
        return view('admin/manager/reserveaddtb',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
      else if ($usertype=="Reception")
      {
        return view('admin/reception/reserveaddtb',['rt'=>$rt,'rcart'=>$rcart,'rtable'=>$rtable,'promo'=>$promo]); 
      }
    }
      
  }
  
  function tbreservationcart(Request $req)
    {
      $rt=$req->RT_ID;
      $type=$req->RT_Type;
     $price=$req->RT_Price;
       $userid=Session::get('guests')['id'];
       $currdate = date('Y-m-d H:i:s');

     if (reservation::where('Customer_ID',$userid)->where('Customer_Type',"Guest")->where('RT_ID',$rt)->exists()) {
            return "warning";
            }
          else { 
            $res = new reservation; 
            $res->Customer_ID=$userid;
            $res->Customer_Type="Guest";
            $res->RT_ID=$rt;
            $res->RT_type=$type;
            $res->Days=1;
            $res->Reservation_Price=$price;
            $res->Reservation_Status="Pending";
            $res->Companion_No=0;
            $res->save();
           

            roomsntables::where('RT_ID', '=', $rt)
            ->update(['tbroomsntables.Avail_Status' => "On hold"]);
            
            return ("success");
              }
        }

    function canceltbreservation(Request $req)
    {
      $rcart_id=$req->cart_id;
      $rtid=$req->rtid;
      reservation::destroy($rcart_id);

      roomsntables::where('RT_ID', '=', $rtid)
      ->update(['tbroomsntables.Avail_Status' => "Available"]);

      return "cancel";
    }
        
    function updatetbreservation($r_id,Request $req)
    {
      $userid=Session::get('guests')['id'];
     /* ------------------- updates  --------------------------*/
      reservation::where('Customer_ID', '=', $userid)
      ->where('Customer_type',"Guest")
      ->where('RT_ID','=',$r_id)
      ->update(['Companion_No' => $req->Companion_No, 
                'Reservation_Datetime' => $req->Reservation_Datetime,
                'End_Datetime' => $req->End_Datetime,
                'Days' => 0,
                //'Reservation_Status' => "Pending"
              ]);
    
        //   return "it's working"; 
       }
   
       
       function gplacetbreservation(Request $req)
       {

        $promocode = $req->promocode;
              //$promocode = "DSC_0001";
          $promodeets=DB::table('tb_promo')
                    ->where('tb_promo.Promo_Code',$promocode)
                    ->get();
            
          if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
          {
           $userid=Session::get('guests')['id'];
           
                   
                   reservation::
                   join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
                   ->where('tb_reservation.Customer_ID',$userid)
                   ->where('Customer_Type',"Guest")
                   ->where('tb_reservation.RT_type',"Table")
                   ->update([
                    'Customer_Name' => $req->name, 
                    'Customer_Number' => $req->number,
                    'Specifications' => $req->specs,
                    'Reservation_Status' => "To be Approved",
                    'Payment_ID'=>0,
                    'Avail_Status'=>"Reserved",
                          ]);
   
     //--------------TRANSACTION ---------------------------
     $trans = new transaction;
     //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
       $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'TB');
       $trans->Customer_ID=$userid;
       $trans->Customer_type="Guest";
       $trans->save();
 

       
    //--------------RESERVATION ---------------------------
   
           $totalpay=DB::table('tb_reservation')
           ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
           ->where('tb_reservation.Customer_ID',$userid)
           ->where('tb_reservation.Customer_type',"Guest")
           ->where('tb_reservation.RT_type',"Table")
           ->where('tb_reservation.Payment_ID',0)
           ->sum('tb_reservation.Reservation_Price');
   
            //$req->input();

               if ($promocode != NULL)
               {
                 foreach($promodeets as $promodeets)
                 { 
           
                   $payment = new payment;
                   $payment->Customer_ID=$userid;
                   $payment->Customer_Type="Guest";
                   $payment->Total_Payment=$totalpay;
                   $payment->MOP=$req->MOP;
                   if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                   $payment->Promo_Code=$promocode;
                                 if ($promodeets->Promo_Type=="Percentage Discount")
                                 {
                                   $payment->TP_Promo=$totalpay-$totalpay*($promodeets->Promo_value/100);
                                 }
                                 else if($promodeets->Promo_Type=="Price Discount")
                                 {
                                   $payment->TP_Promo=$totalpay-$promodeets->Promo_value;
                                 }
                                 else 
                                 {
                                   $payment->TP_Promo=0;
                                 }
                   $payment->Tracking_No=$trans->TrackingNo;
                   $payment->Payment_For="Reservation";
                   $payment->Payment_Status="Pending";
                   $payment->save();
               }
           
               }
               else
               {
                   $payment = new payment;
                   $payment->Customer_ID=$userid;
                   $payment->Customer_Type="Guest";
                   $payment->Total_Payment=$totalpay;
                   $payment->MOP=$req->MOP;
                   if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $payment->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $payment->Proof=$req->proof;
                   }
                   $payment->Promo_Code=$promocode;
                   $payment->TP_Promo=$totalpay;
                   $payment->Tracking_No=$trans->TrackingNo;
                   $payment->Payment_For="Reservation";
                   $payment->Payment_Status="Pending";
                   $payment->save();
               }
               
          $PID=$payment->Payment_ID;
          $TID=$trans->TrackingNo;

          reservation::where('Customer_ID', '=', $userid)
               ->where('Customer_type',"Guest")
               ->where('Payment_ID','=',0)
               ->update(['tb_reservation.Payment_ID' => $PID,
                           'tb_reservation.Tracking_No' => $TID]);

          reservation::where('Customer_ID', '=', $userid)
          ->where('Customer_type',"Guest")->where('Payment_ID','=',NULL)->delete();// FORGET GUEST
               
          Session::forget('guests');
          /* return view('orders',['PID'=>$PID]);
           echo "<script>
                  alert('Payment ID: $TID');
                  window.location.href='/reservationtb';
                  </script>";*/
          $usertype=Session::get('staff')['Staff_Position'];
          if ($usertype=="Manager")
          {
            return redirect('/reservationtb')->with('success', 'Table Reserved Successfully! '.' Transaction ID: '.$TID);
          }
          else if ($usertype=="Reception")
          {
            return redirect('/rreservationtb')->with('success', 'Table Reserved Successfully! '.' Transaction ID: '.$TID);
          }
          }  
          else 
          {
              return back()->with('warning', 'Promo Code Invalid, Please make sure the Promo Code is Correct');
          }
          
       }


      }