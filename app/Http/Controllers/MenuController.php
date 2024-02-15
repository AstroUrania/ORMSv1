<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\cart;
use App\Models\Order;
use App\Models\payment;
use App\Models\transaction;
use App\Models\User; 
use App\Models\roomsntables;
use App\Models\reservation;
use App\Models\RestaurantInfo;
use App\Models\guests;
use App\Models\promo;

 
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Helpers\Helper;
//se Illuminate\Database\Eloquent\Factories\HasFactory;


class MenuController extends Controller
{

  function restaurantinfo()
  {
      return RestaurantInfo::get();
    //     $info = RestaurantInfo::all();//fetch all data
 
  }
    function index()
    {
       $data = Menu::where("Menu_status","Available")->get();//fetch all data
       $cat = MenuCategory::orderByRaw('MenuCategory_Queue = 0', 'ASC')->orderBy('MenuCategory_Queue')->get();

        return view('HomeMenu2',['Menus'=>$data,'cat'=>$cat]);
   
    }

    function index2()
    {
       $data = Menu::all();//fetch all data
       $cat = MenuCategory::orderByRaw('MenuCategory_Queue = 0', 'ASC')->orderBy('MenuCategory_Queue')->get();

        return view('HomeMenu',['Menus'=>$data,'cat'=>$cat]);
   
    }
    function userprofile(Request $req)
    {
        $custid=$req->session()->get('user')['Customer_ID'];
 
       $user = User::where('Customer_ID', '=', $custid)->get();

     return view('userprofile',['user'=>$user]);
   
    }

    function updateuser(Request $req)
    {

      $confirmpass= $req->pass;
      $passold= $req->session()->get('user')['Cust_pass'];
      $custid=$req->session()->get('user')['Customer_ID'];


      $req->input();
        $dp;
        if ($req->DPchange == null)
                         {
                           $dp=null;
                         }
        else
                       {
                        $req->file('DPchange')->store('public/DP/');
                        $dp=$req->file('DPchange')->hashName();
                       }
        if ($dp==null)
        {
 
        User::where('Customer_ID', '=', $custid)
               ->update(['tb_customers.Customer_Name' => $req->name,
                         'tb_customers.Cust_EmailAdd' => $req->email,
                         'tb_customers.Cust_Address' => $req->address,
                         'tb_customers.Cust_ContactNo' => $req->phone,
                         'tb_customers.Cust_Birthday' => $req->bday,
             ]);
        }
        else
        {
             User::where('Customer_ID', '=', $custid)
               ->update(['tb_customers.Customer_Name' => $req->name,
                         'tb_customers.Cust_EmailAdd' => $req->email,
                         'tb_customers.Cust_Address' => $req->address,
                         'tb_customers.Cust_ContactNo' => $req->phone,
                         'tb_customers.Cust_Birthday' => $req->bday,
                       //  'tb_customers.Cust_pass' => $req->pass,
                         'tb_customers.DP' => $dp                        
             ]);
        }
 
             return redirect()->back()->with('success', 'User details Updated successfully!');

     }

     function updateuserpass(Request $req)
     {
       // return $req->input();
      $custid=$req->session()->get('user')['Customer_ID'];
            if (!Hash::check($req->pass,$req->passold))
            {
            return redirect()->back()->with('warning', 'old password does not match input');
            } 
            else
            {
                if ($req->newpass==$req->repass)
                { 
                    User::where('Customer_ID', '=', $custid)
                ->update([
                            'tb_customers.Cust_pass' => Hash::make($req->newpass),                     
                ]);
                return redirect()->back()->with('success', 'Password Updated successfully!');

                }
                else
                {
                    return redirect()->back()->with('warning', 'New password does not match');

                }
            }
      }

    function addtocart(Request $req)
    {
        $menu=$req->Menu_id;
        if($req->session()->has('user'))
        {       
          $custid=$req->session()->get('user')['Customer_ID'];

            if (cart::where('Customer_ID',$custid)->where('Customer_type',"Member")->where('Menu_ID',$menu)->exists()) {
                return redirect()->back()->with('warning', 'Item is already added to cart');
            }
            else { 
                $cart = new cart; 
                $cart->Customer_ID=$custid;
                $cart->Customer_Type="Member";
                $cart->Menu_ID=$menu;
                $cart->Quantity=1;
                $cart->save();
                return redirect()->back()->with('success', 'Successfully added to cart');

            }
        }
        else if($req->session()->has('guests'))
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

            if (cart::where('Customer_ID',$userid)
            ->where('Customer_type',"Guest")
            ->where('Menu_ID',$menu)->exists()) 
                {
                  return redirect()->back()->with('warning', 'Item already in cart!');
                }
            else { 
                    $carts = new cart; 
                    $carts->Customer_ID=$userid;
                    $carts->Customer_Type="Guest";
                    $carts->Menu_ID=$menu;
                    $carts->Quantity=1;
                    $carts->save();
                    return redirect()->back()->with('success', 'Successfully added to cart');
                }
          }
    
          else if(!$req->session()->has('guests'))
          {
                  $user = new guests;
                  $user->save();
                  $req->session()->put('guests',$user);  
                  $Menus= Menu::all(); 

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
          
                if (cart::where('Customer_ID',$userid)
                ->where('Customer_type',"Guest")
                ->where('Menu_ID',$menu)->exists()) {
                  return redirect()->back()->with('warning', 'Item already in cart!');
                      }
                      else { 
                        $carts = new cart; 
                        $carts->Customer_ID=$userid;
                        $carts->Customer_Type="Guest";
                        $carts->Menu_ID=$menu;
                        $carts->Quantity=1;
                        $carts->save();
                        return redirect()->back()->with('success', 'Successfully added to cart');

                          }
        
          }

        }


    static function cartitem()
    {
        if(session()->has('user'))
        {    
       $userid=Session::get('user')['Customer_ID'];
      return cart::where('Customer_ID',$userid)->where('Customer_type',"Member")->count();

        }
        elseif(session()->has('guests'))
        {
        $userid=Session::get('guests')['id'];
        return cart::where('Customer_ID',$userid)->where('Customer_type',"Guest")->count();
        }

    } 

    static function menucategory()
    {
      return MenuCategory::orderByRaw('MenuCategory_Queue = 0', 'ASC')->orderBy('MenuCategory_Queue')->get('MenuCategory_Name');
    } 

    function cart()
    {
      if(session()->has('user'))
      {    
     $userid=Session::get('user')['Customer_ID'];
      $cartlist=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Member")
        ->select('tb_menu.*','tb_cart.Cart_ID as cart_id', 'tb_cart.quantity as quantity')
        ->get();
        
      $total=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Member")
        ->sum('tb_menu.Menu_Price');  
      }
      elseif(session()->has('guests'))
      {
      $userid=Session::get('guests')['id'];

      $cartlist=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Guest")
        ->select('tb_menu.*','tb_cart.Cart_ID as cart_id', 'tb_cart.quantity as quantity')
        ->get();
        
      $total=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Guest")
        ->sum('tb_menu.Menu_Price');  

      }
     return view('cartlist',['cart'=>$cartlist],['total'=>$total]);
    }
 
    function removeCart($cart_id)
    {
        cart::destroy($cart_id);//from model destroy cart_id
        return redirect()->back()->with('warning', 'Item removed from cart');
    }

    function updateqty($Menu_id,Request $req)
    {
      if($req->session()->has('user'))
      {    
        $userid=Session::get('user')['Customer_ID'];
        cart::where('Customer_ID', '=', $userid)->where('Customer_type', '=',"Member")->where('Menu_ID','=',$Menu_id)
        ->update(['tb_cart.quantity' => $req->quantity]);
      }
      elseif($req->session()->has('guests'))
      {
        $userid=Session::get('guests')['id'];
        cart::where('Customer_ID', '=', $userid)->where('Customer_type', '=',"Guest")->where('Menu_ID','=',$Menu_id)
        ->update(['tb_cart.quantity' => $req->quantity]);    
        }
    
      //  return response('success');
       //return "it's working";
   }
         
    function checkout(Request $req)
    {   
      if($req->session()->has('user'))
      {    
        $userid=Session::get('user')['Customer_ID'];
        $user=User::where('Customer_ID',$userid)->get();
        $res=DB::table('tb_reservation')
        ->where('tb_reservation.Customer_ID',$userid)
        ->where('tb_reservation.Customer_type',"Member")
        ->orderBy('tb_reservation.created_at', 'desc')->get();

        $total=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Member")
        ->sum('tb_menu.Menu_Price');
        $tot=0;
 
       $cartlist=DB::table('tb_cart')
                ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
                ->where('tb_cart.Customer_ID',$userid)
                ->where('Customer_type',"Member")
                ->select('tb_menu.*','tb_cart.Cart_ID as cart_id', 
                    'tb_cart.quantity as quantity')
                ->get();

      $promo=DB::table('tb_promo')
                ->orderBy('tb_promo.created_at', 'desc')->get();
                if (count($cartlist)==0)
                {
                    return redirect('/')->with('error', 'Your cart is still empty!');
                }
                else {
                return view('Orderdetails',['cart'=>$cartlist,'promo'=>$promo,'user'=>$user,'res'=>$res]);
                }
      }
      elseif($req->session()->has('guests'))
      {
        $userid=Session::get('guests')['id'];
        $user=guests::where('id',$userid)->get();
        
        $res=reservation::where('Customer_ID',$userid)
        ->where('Customer_type',"Guest")->get();

        $total=DB::table('tb_cart')
        ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_cart.Customer_ID',$userid)
        ->where('Customer_type',"Guest")
        ->sum('tb_menu.Menu_Price');
        $tot=0;

       $cartlist=DB::table('tb_cart')
                ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
                ->where('tb_cart.Customer_ID',$userid)
                ->where('Customer_type',"Guest")
                ->select('tb_menu.*','tb_cart.Cart_ID as cart_id', 
                    'tb_cart.quantity as quantity')
                ->get();
       $promo=DB::table('tb_promo')
                ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get();
                if (count($cartlist)==0)
                {
                    return redirect('/')->with('error', 'Your cart is still empty!');
                }
                else {
                  return view('Orderdetails',['cart'=>$cartlist,'promo'=>$promo,'user'=>$user,'res'=>$res]);
                }
        
        }

      }
    
    function placeOrder(Request $req)
    {

      if($req->session()->has('user'))
      {  
         $promocode = $req->promocode;
         //$promocode = "DSC_0001";
         $promodeets=DB::table('tb_promo')
               ->where('tb_promo.Promo_Code',$promocode)
               ->get();
          if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
          {
        $userid=Session::get('user')['Customer_ID'];
        
        $allcart=DB::table('tb_cart')
                ->join('tb_menu','tb_cart.Menu_ID',"=",'tb_menu.Menu_ID')
                ->where('tb_cart.Customer_ID',$userid)
                ->where('Customer_type',"Member")
                ->get();

                foreach($allcart as $acart)
                { 
                    $order = new Order;
                    $order->Customer_ID=$acart->Customer_ID;
                    $order->Customer_type="Member";
                    $order->Customer_Email=$req->email;
                    $order->Menu_ID=$acart->Menu_ID;
                    $order->Quantity=$acart->Quantity;
                    $order->Specification=$req->specs;
                    $order->Claim_Type=$req->claimvia;
                    $order->Reservation_TrackingNo=$req->tracking;
                    $order->Orders_Price=$acart->Quantity*$acart->Menu_Price;
                    $order->Order_Status="Pending";
                    $order->Payment_ID=0;
                    $order->Delivery_Datetime=$req->date;
                    $order->Delivery_Price=0.0;
                    $order->Receiver_Name=$req->name;
                    $order->Rec_ContactNo=$req->number;
                    $order->Rec_Address=$req->houseno." ".$req->street." ".$req->baranggay." ".$req->city." ".$req->zip." ".$req->province." ".$req->region;
                    $order->Delivery_Status="Pending";
                    $order->Deliverer_ID=0; 
                    $order->save();
                }

        //--------------TRANSACTION ---------------------------
        $trans = new transaction;
        //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
       $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'OR');
       $trans->Customer_ID=$userid;
       $trans->Customer_type="Member";
       $trans->save();
       
        //--------------RESERVATION ---------------------------

        $totalpay=DB::table('tb_orders')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_orders.Customer_ID',$userid)
        ->where('tb_orders.Customer_type',"Member")
        ->where('tb_orders.Payment_ID',0)
        ->sum('tb_orders.Orders_Price');

          if ($promocode != NULL)
          {
                  
              foreach($promodeets as $promodeets)
              { 
                    $payment = new payment;
                    $payment->Customer_ID=$userid;
                    $payment->Customer_Type="Member";
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
            $payment->Customer_Type="Member";
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
       
       Cart::where('Customer_ID',$userid)->where('Customer_type',"Member")->delete();      
            
       $PID=$payment->Payment_ID;
       $TID=$trans->TrackingNo;

       Order::where('Customer_ID', '=', $userid)
            ->where('Customer_type',"Member")
            ->where('Payment_ID','=',0)
            ->update(['tb_orders.Payment_ID' => $PID,
                      'tb_orders.Tracking_No' => $TID ]);

      $receipt=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
      ->where('Tracking_No','=',$TID)->get();

      $totalprice=$payment->Total_Payment;
      $totalprices=$payment->TP_Promo;
      $promo=Promo::where("Promo_Code",$payment->Promo_Code)->get();

      $deliveryprice=Order::where('Tracking_No','=',$TID)->get('Delivery_Price');

      return view('thankyou',['TID'=>$TID,'promo'=>$promo,'receipt'=>$receipt,'totalprices'=>$totalprices,'deliveryprice'=>$deliveryprice]);
    }

      elseif ($req->session()->has('guests'))
      {
        //return $req->input();

        //return $req->all();
        $promocode = $req->promocode;
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
                   $order->Customer_Email=$req->email;
                   $order->Menu_ID=$acart->Menu_ID;
                   $order->Quantity=$acart->Quantity;
                   $order->Specification=$req->specs;
                   $order->Claim_Type=$req->claimvia;
                   $order->Reservation_TrackingNo=$req->tracking;
                   $order->Orders_Price=$acart->Quantity*$acart->Menu_Price;
                   $order->Order_Status="Pending";
                   $order->Payment_ID=0;
                   $order->Delivery_Datetime=$req->date;
                   $order->Delivery_Price=0.0;
                   $order->Receiver_Name=$req->name;
                   $order->Rec_ContactNo=$req->number;
                   $order->Rec_Address=$req->houseno." ".$req->street." ".$req->baranggay." ".$req->city." ".$req->zip." ".$req->province." ".$req->region;
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
       //--------------RESERVATION ---------------------------

       $totalpay=DB::table('tb_orders')
       ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
       ->where('tb_orders.Customer_ID',$userid)
       ->where('tb_orders.Customer_type',"Guest")
       ->where('tb_orders.Payment_ID',0)
       ->sum('tb_orders.Orders_Price');

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

      $receipt=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
      ->where('Tracking_No','=',$TID)->get();

      $totalprice=$payment->Total_Payment;
      $totalprices=$payment->TP_Promo;
      $promo=Promo::where("Promo_Code",$payment->Promo_Code)->get();

      $deliveryprice=Order::where('Tracking_No','=',$TID)->get('Delivery_Price');


       return view('thankyou',['TID'=>$TID,'promo'=>$promo,'receipt'=>$receipt,'totalprices'=>$totalprices,'deliveryprice'=>$deliveryprice]);
      }

    }

    function history(){

        $userid=Session::get('user')['Customer_ID'];
        $trans=DB::table('tb_payment')
        ->leftjoin('tb_promo','tb_payment.Promo_Code',"=",'tb_promo.Promo_Code')
        ->where('tb_payment.Customer_ID',$userid)
        ->where('tb_payment.Customer_Type',"Member")
        ->where('tb_payment.Payment_For',"Orders")
        ->orderBy('tb_payment.created_at', 'desc')
        ->get();

        $orders=DB::table('tb_orders')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('tb_orders.Customer_ID',$userid)
        ->where('Customer_type',"Member")
        ->orderBy('tb_orders.created_at', 'desc')->get();

        $res=DB::table('tb_reservation')
        ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->where('tb_reservation.Customer_ID',$userid)
        ->where('tb_reservation.Customer_type',"Member")
        ->orderBy('tb_reservation.created_at', 'desc')->get();

     return view('history',['orders'=>$orders, 'res'=>$res, 'trans'=>$trans]);
        }


    function rooms(){
          $rooms=DB::table('tbroomsntables')
            ->where('tbroomsntables.RT_Type',"Room")
            ->where('tbroomsntables.Avail_Status',"Available")
            ->get(); 

         return view('ReservationRoom',['rooms'=>$rooms]);
            }

     function tables(Request $req){

        if ($req->session()->has('guests'))
          {
            $userid=Session::get('guests')['id'];
            $users=guests::where('id',$userid)->get();
          }
        elseif ($req->session()->has('user'))
          {
            $userid=Session::get('user')['Customer_ID'];
            $users=User::where('Customer_ID',$userid)->get();
          }
        else
          {
              $user = new guests;
              $user->save();
              $req->session()->put('guests',$user);  
              $userid=Session::get('guests')['id'];
              $users=guests::where('id',$userid)->get();
          }
        return view('ReservationTable',['users'=>$users]);
        }

    function thanks(){
      if(session()->has('user'))
      {
        return redirect('/')->with('success', 'Order successful! You can check your past purchases by clicking the history tab');
      }

      elseif(session()->has('guests'))
      {
        return redirect('/')->with('success2', 'Order successful! Please wait for the confirmation of your order');

      }

    }
///----------------------------RESERVATIONS-----------------------

function Reservetb(Request $req)
{
    $rtid= $req->rtid;
    
    $tables=DB::table('tbroomsntables')
    ->where('tbroomsntables.RT_ID',$rtid)
    ->get();

    if ($req->session()==null)
    {
         $user = new guests;
        $user->save();
        $req->session()->put('guests',$user);  
    }

   // return roomsntables::find($rt_id);
    return view('/reserveformtb');

}

function Reserverm(Request $req)
{
    $rtid= $req->rtid;
    
    $rooms=DB::table('tbroomsntables')
    ->where('tbroomsntables.RT_ID',$rtid)
    ->get();
    
    if ($req->session()->has('guests'))
    {
      $userid=Session::get('guests')['id'];
      $users=guests::where('id',$userid)->get();
           $promo=DB::table('tb_promo')
                ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get(); 
    }
    elseif ($req->session()->has('user'))
    {
      $userid=Session::get('user')['Customer_ID'];
      $users=User::where('Customer_ID',$userid)->get();
           $promo=DB::table('tb_promo')
                ->orderBy('tb_promo.created_at', 'desc')->get(); 
    }
    else
    {
        $user = new guests;
        $user->save();
        $req->session()->put('guests',$user);  
        $userid=Session::get('guests')['id'];
        $users=guests::where('id',$userid)->get();
        
        $promo=DB::table('tb_promo')
                ->orderBy('tb_promo.created_at', 'desc')->where('tb_promo.Access',"All")->get(); 
    }
   // return roomsntables::find($rt_id);
    return view('/reserveformrm',['rooms'=>$rooms,'promo'=>$promo,'users'=>$users]);

}

function Reservedtb(Request $req)
{
    $promocode = $req->promocode;
         //$promocode = "DSC_0001";
    $promodeets=DB::table('tb_promo')
               ->where('tb_promo.Promo_Code',$promocode)
               ->get();
        
    if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
    {

    
    if ($req->session()->has('user'))
    {
    $userid=Session::get('user')['Customer_ID'];
    $user=User::where('Customer_ID',$userid)->get();
    $name=$req->num;
    $num=$req->num;
    $type="Member";
        }
    elseif ($req->session()->has('guests'))
    {
    $userid=Session::get('guests')['id'];
    $user=guests::where('id',$userid)->get();
    $name=$req->name;
    $num=$req->num;
    $type="Guest";
        }

    $res = new reservation; 
    $res->Customer_ID=$userid;
    $res->Customer_Type=$type;
    $res->RT_ID=0;
    $res->RT_type="Table";
    $res->Days=0;
    $res->Reservation_Price=0;
    $res->Reservation_Status="To be Approved";
    $res->Reservation_Datetime=$req->rdt;
    $res->End_Datetime=$req->edt;
    $res->Companion_No=$req->cn;
    $res->Customer_Name=$name;
    $res->Customer_Number=$num;
    $res->Specifications=$req->specs;
    $res->Payment_ID=0;
    $res->save();

    
    //roomsntables::where('RT_ID', '=', $table->RT_ID)
    //->update(['tbroomsntables.Avail_Status' => "Reserved"]);
    

//--------------TRANSACTION ---------------------------
     $trans = new transaction;
    //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
      $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'TB');
      $trans->Customer_ID=$userid;
      $trans->Customer_type=$type;
      $trans->save();

//--------------RESERVATION ---------------------------

    $totalpay=DB::table('tb_reservation')
    ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
    ->where('tb_reservation.Customer_ID',$userid)
    ->where('tb_reservation.Customer_type',$type)
    ->where('tb_reservation.RT_type',"Table")
    ->where('tb_reservation.Payment_ID',0)
    ->sum('tb_reservation.Reservation_Price');

    
    if ($promocode != NULL)
    {
      foreach($promodeets as $promodeets)
      { 

        $payment = new payment;
        $payment->Customer_ID=$userid;
        $payment->Customer_Type=$type;
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
        $payment->Customer_Type=$type;
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
        ->where('Customer_type',$type)
        ->where('Payment_ID','=',0)
        ->update(['tb_reservation.Payment_ID' => $PID,
                    'tb_reservation.Tracking_No' => $TID]);
        
    return redirect('/')->with('success2', 'Table Reserved Successfully! '.' Transaction ID: '.$TID);

    } 
    else 
    {
        return redirect('/tables')->with('warning', 'Promo Code Invalid, Please make sure the Promo Code is Correct');
    }


}


function Reservedrm(Request $req)
{    $promocode = $req->promocode;
    //$promocode = "DSC_0001";
$promodeets=DB::table('tb_promo')
          ->where('tb_promo.Promo_Code',$promocode)
          ->get();
   
if (count($promodeets) != 0||$promocode==NULL) // If the promo exists
{
    if ($req->session()->has('user'))
    {      
    $userid=Session::get('user')['Customer_ID'];
    $user=User::where('Customer_ID',$userid)->get();
    
    $name=$req->name;
    $num=$req->num;  
    $type="Member";
    }
    
    elseif ($req->session()->has('guests'))
    {    
      
    $userid=Session::get('guests')['id'];
    $user=guests::where('id',$userid)->get();
    $name=$req->name;
    $num=$req->num;   
    $type="Guest"; 
    }
        
    
    
    $room=DB::table('tbroomsntables')
    ->where('tbroomsntables.RT_ID',$req->rtd)
    ->get();

    $req->rdt;

    foreach($room as $room)
    { 
        $res = new reservation; 
        $res->Customer_ID=$userid;
        $res->Customer_Type=$type;
        $res->RT_ID=$room->RT_ID;
        $res->RT_type=$room->RT_Type;
        $res->Days=$req->idays;
        $res->Reservation_Price=$req->gtotal;
        $res->Reservation_Status="To be Approved";
        $res->Reservation_Datetime=$req->rdt;
        $res->End_Datetime=$req->edt;
        $res->Companion_No=$req->cn;
        $res->Customer_Name=$name;
        $res->Customer_Number=$num;
        $res->Specifications=$req->specs;
        $res->Payment_ID=0;
        $res->save();

         roomsntables::where('RT_ID', '=', $room->RT_ID)
        ->update(['tbroomsntables.Avail_Status' => "Reserved"]);
    }
//--------------TRANSACTION ---------------------------
        $trans = new transaction;
        //  return $trans->TrackingNo=transaction::max('Transaction_ID') + 1;
          $trans->TrackingNo= Helper::IDGenerator(new transaction,'TrackingNo',5,'RM');
          $trans->Customer_ID=$userid;
          $trans->Customer_type=$type;
          $trans->save();

//--------------RESERVATION ---------------------------
    $totalpay=DB::table('tb_reservation')
    ->join('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
    ->where('tb_reservation.Customer_ID',$userid)
    ->where('tb_reservation.Customer_type', $type)
    ->where('tb_reservation.RT_type',"Room")
    ->where('tb_reservation.Payment_ID',0)
    ->sum('tb_reservation.Reservation_Price');

   if ($promocode != NULL)
    {
      foreach($promodeets as $promodeets)
      { 

        $payment = new payment;
        $payment->Customer_ID=$userid;
        $payment->Customer_Type=$type;
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
        $payment->Customer_Type=$type;
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
        ->where('Customer_type',$type)
        ->where('Payment_ID','=',0)
        ->update(['tb_reservation.Payment_ID' => $PID,
                    'tb_reservation.Tracking_No' => $TID]);
        
    return redirect('/')->with('success2', 'Room Reserved Successfully! '.'  Transaction ID: '.$TID);
    
      


} 
else 
{
    return redirect('/rooms')->with('warning', 'Promo Code Invalid, Please make sure the Promo Code is Correct');
}

}


}
