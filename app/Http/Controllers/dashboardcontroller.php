<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Menu;
use App\Models\MenuCategory;
use App\Models\cart;
use App\Models\Order;
use App\Models\payment;
use App\Models\transaction;
use App\Models\staff;
use App\Models\User;
use App\Models\reservation;
use App\Models\roomsntables;
use App\Models\guests;
use App\Models\promo;
use App\Models\RestaurantInfo;


use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;


class dashboardcontroller extends Controller
{    //
    function index()
    { 
      //  $data = Menu::all();//fetch all data
     //   return view('admin/staffdashboard',['Menus'=>$data]);
    $usertype=Session::get('staff')['Staff_Position'];
    $staff= staff::all();
          $customers= User::all();
          $menu = Menu::all();
          $roomsntables= roomsntables::all();
          $orders=Order::all();
          $pay=payment::all();
          $reservations=reservation::all();
          $promo=promo::all();

          $completedOR= Order::where('Order_Status','Successful')->get();
          $pendingOR= Order::where('Order_Status','Pending')->get(); 
          $rmreservations=reservation::where('RT_Type','Room')->get();
          $tbreservations=reservation::where('RT_Type','Table')->get();
          $menuavail = Menu::where('Menu_status','Available')->get();
          $completedtbres=reservation::where('RT_Type','Table')->where('Reservation_Status','Successful')->get();
          $pendingtbres=reservation::where('RT_Type','Table')->where('Reservation_Status','Pending')->get();
          $completedrmres=reservation::where('RT_Type','Room')->where('Reservation_Status','Successful')->get();
          $pendingrmres=reservation::where('RT_Type','Room')->where('Reservation_Status','Pending')->get();
          $tbatbres=reservation::where('RT_Type','Table')->where('Reservation_Status','To be Approved')->get();
          $tbarmres=reservation::where('RT_Type','Room')->where('Reservation_Status','To be Approved')->get();

       $curYear = date('Y');
       $curMonth = date('m');
       $jan=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','1')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');       
       $feb=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','2')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $mar=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','3')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $apr=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','4')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $may=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','5')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $jun=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','6')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $jul=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','7')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $aug=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','8')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $sep=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','9')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $oct=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','10')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $nov=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','11')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
       $dec=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','12')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');

      $rjan=reservation::where('RT_Type','Room')->whereMonth('created_at','=','1')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');       
      $rfeb=reservation::where('RT_Type','Room')->whereMonth('created_at','=','2')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rmar=reservation::where('RT_Type','Room')->whereMonth('created_at','=','3')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rapr=reservation::where('RT_Type','Room')->whereMonth('created_at','=','4')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rmay=reservation::where('RT_Type','Room')->whereMonth('created_at','=','5')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rjun=reservation::where('RT_Type','Room')->whereMonth('created_at','=','6')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rjul=reservation::where('RT_Type','Room')->whereMonth('created_at','=','7')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $raug=reservation::where('RT_Type','Room')->whereMonth('created_at','=','8')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rsep=reservation::where('RT_Type','Room')->whereMonth('created_at','=','9')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $roct=reservation::where('RT_Type','Room')->whereMonth('created_at','=','10')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rnov=reservation::where('RT_Type','Room')->whereMonth('created_at','=','11')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
      $rdec=reservation::where('RT_Type','Room')->whereMonth('created_at','=','12')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');

      $tjan=reservation::where('RT_Type','Table')->whereMonth('created_at','=','1')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tfeb=reservation::where('RT_Type','Table')->whereMonth('created_at','=','2')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tmar=reservation::where('RT_Type','Table')->whereMonth('created_at','=','3')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tapr=reservation::where('RT_Type','Table')->whereMonth('created_at','=','4')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tmay=reservation::where('RT_Type','Table')->whereMonth('created_at','=','5')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tjun=reservation::where('RT_Type','Table')->whereMonth('created_at','=','6')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tjul=reservation::where('RT_Type','Table')->whereMonth('created_at','=','7')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $taug=reservation::where('RT_Type','Table')->whereMonth('created_at','=','8')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tsep=reservation::where('RT_Type','Table')->whereMonth('created_at','=','9')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $toct=reservation::where('RT_Type','Table')->whereMonth('created_at','=','10')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tnov=reservation::where('RT_Type','Table')->whereMonth('created_at','=','11')->whereYear('tb_reservation.created_at','=',$curYear)->get();
      $tdec=reservation::where('RT_Type','Table')->whereMonth('created_at','=','12')->whereYear('tb_reservation.created_at','=',$curYear)->get();
    if ($usertype=="Manager")
    {

      
      $maintotal =Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->sum('tb_orders.Orders_Price');
      $bestseller=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
      ->select('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic', DB::raw('COUNT(tb_orders.Menu_ID) AS Occurences'), DB::raw('SUM((tb_orders.Orders_Price)) AS total'))
      ->groupBy('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic')->whereMonth('tb_orders.created_at','=',$curMonth)->whereYear('tb_orders.created_at','=',$curYear)
      ->orderBy('Occurences','DESC')->get();

      $bestseller2=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
      ->select('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic', DB::raw('COUNT(tb_orders.Menu_ID) AS Occurences'), DB::raw('SUM((tb_orders.Orders_Price)) AS total'))
      ->groupBy('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic')->whereYear('tb_orders.created_at','=',$curYear)
      ->orderBy('Occurences','DESC')->get();
      
        return view('admin/managerdashboard',['orders'=>$orders,'completedOR'=>$completedOR,'pendingOR'=>$pendingOR,
                                                'Menus'=>$menu,'staff'=>$staff,'customers'=>$customers,'pay'=>$pay,
                                                'promo'=>$promo,'reservations'=>$reservations,'menuavail'=>$menuavail,
                                              'rmreservations'=>$rmreservations,'tbreservations'=>$tbreservations,
                                              'completedtbres'=>$completedtbres,'pendingtbres'=>$pendingtbres,
                                              'completedrmres'=>$completedrmres,'pendingrmres'=>$pendingrmres,
                                              'tbatbres'=>$tbatbres,'tbarmres'=>$tbarmres,'bestseller'=>$bestseller,
                                              'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,
                                              'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec,
                                              'rjan'=>$rjan,'rfeb'=>$rfeb,'rmar'=>$rmar,'rapr'=>$rapr,'rmay'=>$rmay,'rjun'=>$rjun,'rjul'=>$rjul,
                                              'raug'=>$raug,'rsep'=>$rsep,'roct'=>$roct,'rnov'=>$rnov,'rdec'=>$rdec,
                                              'tjan'=>$tjan,'tfeb'=>$tfeb,'tmar'=>$tmar,'tapr'=>$tapr,'tmay'=>$tmay,'tjun'=>$tjun,'tjul'=>$tjul,
                                              'taug'=>$taug,'tsep'=>$tsep,'toct'=>$toct,'tnov'=>$tnov,'tdec'=>$tdec,
                                            ]);
    }
    else if ($usertype=="Reception")
    {
        return view('admin/receptiondashboard',['orders'=>$orders,'completedOR'=>$completedOR,'pendingOR'=>$pendingOR,
                                                  'Menus'=>$menu,'staff'=>$staff,'customers'=>$customers,'pay'=>$pay,
                                                  'promo'=>$promo,'reservations'=>$reservations,'menuavail'=>$menuavail,
                                                'rmreservations'=>$rmreservations,'tbreservations'=>$tbreservations,
                                                'completedtbres'=>$completedtbres,'pendingtbres'=>$pendingtbres,
                                                'completedrmres'=>$completedrmres,'pendingrmres'=>$pendingrmres,
                                                'tbatbres'=>$tbatbres,'tbarmres'=>$tbarmres
                                              ]);
    }
    else if ($usertype=="Kitchen Staff")
    {
        
        return view('admin/kitchendashboard',['orders'=>$orders,'completedOR'=>$completedOR,'pendingOR'=>$pendingOR,
                                                  'Menus'=>$menu,'staff'=>$staff,'customers'=>$customers,'pay'=>$pay,
                                                  'promo'=>$promo,'reservations'=>$reservations,'menuavail'=>$menuavail,
                                                'rmreservations'=>$rmreservations,'tbreservations'=>$tbreservations,
                                                'completedtbres'=>$completedtbres,'pendingtbres'=>$pendingtbres,
                                                'completedrmres'=>$completedrmres,'pendingrmres'=>$pendingrmres,
                                              ]);
    }
    else if ($usertype=="Delivery Person")
    {
      $dorders=Order::where('Claim_Type','Delivery')->get();
      $kitchendorders=Order::where('Claim_Type','Delivery')->where('Order_Status','Pending')->get();
      $completeddorders=Order::where('Claim_Type','Delivery')->where('Order_Status','Successful')->where('Delivery_Status','Successful')->get();
      $pendingdorders=Order::where('Claim_Type','Delivery')->where('Order_Status','Successful')->where('Delivery_Status','Pending')->get();

        return view('admin/delivererdashboard',['dorders'=>$dorders,'completeddorders'=>$completeddorders,'pendingdorders'=>$pendingdorders,'kitchendorders'=>$kitchendorders]);
    }
    else
    {
        return "USER INVALID";
    }

    } 

    public function orderreports()
    {
      $curYear = date('Y');
      $curMonth = date('m');
         $staff= Order::all();
         $bestseller=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
         ->select('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic', DB::raw('COUNT(tb_orders.Menu_ID) AS Occurences'), DB::raw('SUM((tb_orders.Orders_Price)) AS total'))
         ->groupBy('tb_orders.Menu_ID','tb_menu.Menu_Name','tb_menu.Menu_pic')->whereYear('tb_orders.created_at','=',$curYear)
         ->whereMonth('tb_orders.created_at','=',$curMonth)
         ->orderBy('Occurences','DESC')->get();
   

      $bssum=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereYear('tb_orders.created_at','=',$curYear)
      ->whereMonth('tb_orders.created_at','=',$curMonth)->sum('tb_orders.Orders_Price');
      
        return view('admin/manager/orderreports',['bestseller'=>$bestseller, 'bssum'=>$bssum]);
    }
    

    public function monthlysales()
    {
      $curYear = date('Y');
      $curMonth = date('m');
         $staff= Order::all();

         $jan=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','1')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');       
         $feb=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','2')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $mar=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','3')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $apr=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','4')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $may=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','5')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $jun=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','6')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $jul=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','7')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $aug=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','8')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $sep=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','9')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $oct=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','10')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $nov=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','11')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');
         $dec=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereMonth('tb_orders.created_at','=','12')->whereYear('tb_orders.created_at','=',$curYear)->sum('tb_orders.Orders_Price');

      $sum=Order::join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')->whereYear('tb_orders.created_at','=',$curYear)
      ->sum('tb_orders.Orders_Price');
      
        return view('admin/manager/monthlysales',['sum'=>$sum, 
        'jan'=>$jan,'feb'=>$feb,'mar'=>$mar,'apr'=>$apr,'may'=>$may,'jun'=>$jun,'jul'=>$jul,
        'aug'=>$aug,'sep'=>$sep,'oct'=>$oct,'nov'=>$nov,'dec'=>$dec,
      
      ]);
    }
    public function rmonthlysales()
    {
      $curYear = date('Y');
      $curMonth = date('m');
         $staff= Order::all();

         $rjan=reservation::where('RT_Type','Room')->whereMonth('created_at','=','1')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');       
         $rfeb=reservation::where('RT_Type','Room')->whereMonth('created_at','=','2')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rmar=reservation::where('RT_Type','Room')->whereMonth('created_at','=','3')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rapr=reservation::where('RT_Type','Room')->whereMonth('created_at','=','4')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rmay=reservation::where('RT_Type','Room')->whereMonth('created_at','=','5')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rjun=reservation::where('RT_Type','Room')->whereMonth('created_at','=','6')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rjul=reservation::where('RT_Type','Room')->whereMonth('created_at','=','7')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $raug=reservation::where('RT_Type','Room')->whereMonth('created_at','=','8')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rsep=reservation::where('RT_Type','Room')->whereMonth('created_at','=','9')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $roct=reservation::where('RT_Type','Room')->whereMonth('created_at','=','10')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rnov=reservation::where('RT_Type','Room')->whereMonth('created_at','=','11')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
         $rdec=reservation::where('RT_Type','Room')->whereMonth('created_at','=','12')->whereYear('tb_reservation.created_at','=',$curYear)->sum('tb_reservation.Reservation_Price');
   
   
         $crjan=reservation::where('RT_Type','Room')->whereMonth('created_at','=','1')->whereYear('tb_reservation.created_at','=',$curYear)->get();       
         $crfeb=reservation::where('RT_Type','Room')->whereMonth('created_at','=','2')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crmar=reservation::where('RT_Type','Room')->whereMonth('created_at','=','3')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crapr=reservation::where('RT_Type','Room')->whereMonth('created_at','=','4')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crmay=reservation::where('RT_Type','Room')->whereMonth('created_at','=','5')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crjun=reservation::where('RT_Type','Room')->whereMonth('created_at','=','6')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crjul=reservation::where('RT_Type','Room')->whereMonth('created_at','=','7')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $craug=reservation::where('RT_Type','Room')->whereMonth('created_at','=','8')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crsep=reservation::where('RT_Type','Room')->whereMonth('created_at','=','9')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $croct=reservation::where('RT_Type','Room')->whereMonth('created_at','=','10')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crnov=reservation::where('RT_Type','Room')->whereMonth('created_at','=','11')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
         $crdec=reservation::where('RT_Type','Room')->whereMonth('created_at','=','12')->whereYear('tb_reservation.created_at','=',$curYear)->get(); 
   
   
         $sum=reservation::where('RT_Type','Room')->whereYear('created_at','=',$curYear)->sum('Reservation_Price');
      
        return view('admin/manager/monthlyrsales',['sum'=>$sum, 
        'rjan'=>$rjan,'rfeb'=>$rfeb,'rmar'=>$rmar,'rapr'=>$rapr,'rmay'=>$rmay,'rjun'=>$rjun,'rjul'=>$rjul,
        'raug'=>$raug,'rsep'=>$rsep,'roct'=>$roct,'rnov'=>$rnov,'rdec'=>$rdec,
        'crjan'=>$crjan,'crfeb'=>$crfeb,'crmar'=>$crmar,'crapr'=>$crapr,'crmay'=>$crmay,'crjun'=>$crjun,'crjul'=>$crjul,
        'craug'=>$craug,'crsep'=>$crsep,'croct'=>$croct,'crnov'=>$crnov,'crdec'=>$crdec
      
      ]);
    }

    public function staffmembers()
    {

         $staff= staff::all();


        return view('admin/manager/staffmembers',['staff'=>$staff]);
    }

    public function customers()
    {
        $user= User::all();
        return view('admin/manager/customers',['user'=>$user]);
    }

    public function menu()
    {
      $menu = Menu::all();
      $cat = MenuCategory::all();
        return view('admin/manager/menu',['menu'=>$menu,'cat'=>$cat]);
    }

    public function menucategory()
    {
        $cat = MenuCategory::orderByRaw('MenuCategory_Queue = 0', 'ASC')->orderBy('MenuCategory_Queue')->get();
        return view('admin/manager/menucategory',['cat'=>$cat]);
    }

    public function roomsntables()
    {
        $roomsntables= Roomsntables::all();
        return view('admin/manager/Roomsntables',['roomsntables'=>$roomsntables]);
    }

    public function orders() 
    {
       $guests=DB::table('tb_orders')
        ->join('tb_guests','tb_orders.Customer_ID',"=",'tb_guests.id')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Guest')
        ->get();

       $members=DB::table('tb_orders')
        ->join('tb_customers','tb_orders.Customer_ID',"=",'tb_customers.Customer_ID')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Member')
        ->get();
        
        return view('admin/manager/orders',['guests'=>$guests],['members'=>$members]);
    }


    public function reservation()
    {
 
      $r=DB::table('tb_reservation')
        ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_customers','tb_reservation.Customer_ID',"=",'tb_customers.Customer_ID')
        ->where('tbroomsntables.RT_Type',"Room")
        ->get();

       $gr=DB::table('tb_reservation')
        ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_guests','tb_reservation.Customer_ID',"=",'tb_guests.id')
        ->where('tbroomsntables.RT_Type',"Room")
        ->get();
      
        $rt=DB::table('tbroomsntables')
        ->where('tbroomsntables.RT_Type',"Room")
        ->where('tbroomsntables.Avail_Status',"Available")
        ->get();

       // $room=DB::table('tbroomsntables')->where('RT_type','Room')->get();
      //  $table=DB::table('tbroomsntables')->where('RT_type','Table')->get();
        return view('admin/manager/reservation',['r'=>$r,'rt'=>$rt,'gr'=>$gr]);
    }
    public function reservationtb()
    {
     
       $r=DB::table('tb_reservation')
       ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_customers','tb_reservation.Customer_ID',"=",'tb_customers.Customer_ID')
        ->where('tb_reservation.RT_Type',"Table")
        ->get();

       $gr=DB::table('tb_reservation')
       ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_guests','tb_reservation.Customer_ID',"=",'tb_guests.id')
        ->where('tb_reservation.RT_Type',"Table")
        ->get();

        $rt=DB::table('tbroomsntables')
        ->where('tbroomsntables.RT_Type',"Table")
        ->where('tbroomsntables.Avail_Status',"Available")
        ->get();

       // $room=DB::table('tbroomsntables')->where('RT_type','Room')->get();
      //  $table=DB::table('tbroomsntables')->where('RT_type','Table')->get();
        return view('admin/manager/reservationtb',['r'=>$r,'rt'=>$rt,'gr'=>$gr]);
    }

    public function promo()
    {
      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->get();
        return view('admin/manager/promo',['promo'=>$promo]);
    
    } 

    public function payments()
    {
       $payments=DB::table('tb_payment')
        ->join('tb_customers','tb_payment.Customer_ID',"=",'tb_customers.Customer_ID')
        ->where('Customer_Type',"Member")
       // ->join('tb_reservation','tb_payment.Reservation_ID',"=",'tb_reservation.Reservation_ID') 
        ->get();

        $gpayments=DB::table('tb_payment')
        ->join('tb_guests','tb_payment.Customer_ID',"=",'tb_guests.id')
       // ->join('tb_reservation','tb_payment.Reservation_ID',"=",'tb_reservation.Reservation_ID') 
       ->where('Customer_Type',"Guest")
        ->get();


        payment::where('Total_Payment', '=', 0)->update(['Payment_Status'=>"Successful"]);// FORGET GUEST
             
        return view('admin/manager/payments',['payments'=>$payments],['gpayments'=>$gpayments]);
        
    }

    public function profile()
    {
         $staffuser=Session::get('staff')['Staff_ID'];
         $details=DB::table('tb_staff')
        ->where('tb_staff.Staff_ID',$staffuser) 
        ->get();

        return view('admin/manager/profile',['details'=>$details]);
    }

    public function RestaurantInfo()
    {
         $details=DB::table('tb_restaurantinfo')
        ->get();

        return view('admin/manager/RestaurantInfo',['details'=>$details]);
    }
    public function kmenu()
    {
   $menu = Menu::all();
        return view('admin/kitchen/menu',['menu'=>$menu]);
    }
    public function korders() 
    {
    
       $guests=DB::table('tb_orders')
        ->join('tb_guests','tb_orders.Customer_ID',"=",'tb_guests.id')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Guest')
        ->get();

       $members=DB::table('tb_orders')
        ->join('tb_customers','tb_orders.Customer_ID',"=",'tb_customers.Customer_ID')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Member')
        ->get();
        
        return view('admin/kitchen/orders',['guests'=>$guests],['members'=>$members]);
    }

    public function kprofile()
    {
         $staffuser=Session::get('staff')['Staff_ID'];
         $details=DB::table('tb_staff')
        ->where('tb_staff.Staff_ID',$staffuser) 
        ->get();

        return view('admin/kitchen/profile',['details'=>$details]);
    }
//-------------------------------------------------------RECEPTION DASHBOARD
    public function rcustomers()
    {
      $user= User::all();
        return view('admin/reception/customers',['user'=>$user]);
    }

    public function rmenu()
    {
   $menu = Menu::all();
        return view('admin/reception/menu',['menu'=>$menu]);
    }

    public function rroomsntables()
    {
      $roomsntables= Roomsntables::all();
        return view('admin/reception/roomsntables',['roomsntables'=>$roomsntables]);
    
    }

    public function rorders() 
    {
    
       $guests=DB::table('tb_orders')
        ->join('tb_guests','tb_orders.Customer_ID',"=",'tb_guests.id')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Guest')
        ->get();

       $members=DB::table('tb_orders')
        ->join('tb_customers','tb_orders.Customer_ID',"=",'tb_customers.Customer_ID')
        ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
        ->where('Customer_Type','Member')
        ->get();
        
        return view('admin/reception/orders',['guests'=>$guests],['members'=>$members]);
    }

    public function rreservation()
    {
   
 
      $r=DB::table('tb_reservation')
        ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_customers','tb_reservation.Customer_ID',"=",'tb_customers.Customer_ID')
        ->where('tbroomsntables.RT_Type',"Room")
        ->get();

       $gr=DB::table('tb_reservation')
        ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
        ->join('tb_guests','tb_reservation.Customer_ID',"=",'tb_guests.id')
        ->where('tbroomsntables.RT_Type',"Room")
        ->get();
      
        $rt=DB::table('tbroomsntables')
        ->where('tbroomsntables.RT_Type',"Room")
        ->where('tbroomsntables.Avail_Status',"Available")
        ->get();

       // $room=DB::table('tbroomsntables')->where('RT_type','Room')->get();
      //  $table=DB::table('tbroomsntables')->where('RT_type','Table')->get();
        return view('admin/reception/reservation',['r'=>$r,'rt'=>$rt,'gr'=>$gr]);
    }
    public function rreservationtb()
    {

      $r=DB::table('tb_reservation')
      ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
       ->join('tb_customers','tb_reservation.Customer_ID',"=",'tb_customers.Customer_ID')
       ->where('tb_reservation.RT_Type',"Table")
       ->get();

      $gr=DB::table('tb_reservation')
      ->leftjoin('tbroomsntables','tb_reservation.RT_ID',"=",'tbroomsntables.RT_ID')
       ->join('tb_guests','tb_reservation.Customer_ID',"=",'tb_guests.id')
       ->where('tb_reservation.RT_Type',"Table")
       ->get();

       $rt=DB::table('tbroomsntables')
       ->where('tbroomsntables.RT_Type',"Table")
       ->where('tbroomsntables.Avail_Status',"Available")
       ->get();

      // $room=DB::table('tbroomsntables')->where('RT_type','Room')->get();
     //  $table=DB::table('tbroomsntables')->where('RT_type','Table')->get();
       return view('admin/reception/reservationtb',['r'=>$r,'rt'=>$rt,'gr'=>$gr]);
    }

    public function rpromo()
    {
      $promo=DB::table('tb_promo')
      ->orderBy('tb_promo.created_at', 'desc')->get();
        return view('admin/reception/promo',['promo'=>$promo]);
    
    } 

    public function rpayments()
    {
       $payments=DB::table('tb_payment')
        ->join('tb_customers','tb_payment.Customer_ID',"=",'tb_customers.Customer_ID')
        ->where('Customer_Type',"Member")
        ->get();

        $gpayments=DB::table('tb_payment')
        ->join('tb_guests','tb_payment.Customer_ID',"=",'tb_guests.id')
       ->where('Customer_Type',"Guest")
        ->get();


        payment::where('Total_Payment', '=', 0)->update(['Payment_Status'=>"Successful"]);// FORGET GUEST
             
        return view('admin/reception/payments',['payments'=>$payments],['gpayments'=>$gpayments]);
        
    }

    public function rprofile()
    {
         $staffuser=Session::get('staff')['Staff_ID'];
         $details=DB::table('tb_staff')
        ->where('tb_staff.Staff_ID',$staffuser) 
        ->get();

        return view('admin/reception/profile',['details'=>$details]);
    }
//---------------------DELIVERY DASHBOARD

public function dorders() 
{
  $guests=DB::table('tb_orders')
    ->join('tb_guests','tb_orders.Customer_ID',"=",'tb_guests.id')
    ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
    ->where('Customer_Type','Guest')
    ->where('Claim_Type','Delivery')
    ->get();

   $members=DB::table('tb_orders')
    ->join('tb_customers','tb_orders.Customer_ID',"=",'tb_customers.Customer_ID')
    ->join('tb_menu','tb_orders.Menu_ID',"=",'tb_menu.Menu_ID')
    ->where('Customer_Type','Member')
    ->where('Claim_Type','Delivery')
    ->get();
    
    return view('admin/delivery/orders',['guests'=>$guests],['members'=>$members]);
}

public function dprofile()
{
     $staffuser=Session::get('staff')['Staff_ID'];
     $details=DB::table('tb_staff')
    ->where('tb_staff.Staff_ID',$staffuser) 
    ->get();

    return view('admin/delivery/profile',['details'=>$details]);
}

//------------------------------------------------------------------------CRUD--------------------------------------
function updaterestaurantinfo(Request $req)
    {

       $req->input();
        $dp;
        if ($req->DPchange == null)
                         {
                           $dp=null;
                         }
        else
                       {
                        $req->file('DPchange')->store('public/Logo/');
                        $dp=$req->file('DPchange')->hashName();
                       }
        if ($dp==null)
        {
            RestaurantInfo::where ('id','=',1)
              ->update([
              'tb_restaurantinfo.Name' => $req->name,
              'tb_restaurantinfo.Contact' => $req->phone,
              'tb_restaurantinfo.About' => $req->about                        
            ]);
        }
        else 
        {
              RestaurantInfo::where ('id','=',1)
              ->update([
              'tb_restaurantinfo.Name' => $req->name,
              'tb_restaurantinfo.Contact' => $req->phone,
              'tb_restaurantinfo.About' => $req->about,
              'tb_restaurantinfo.DP' => $dp   
            ]); 
        }
 
       
 
    return redirect()->back()->with('success', 'Restasurant details Updated Successfully!');

     }

    function updatestaff(Request $req)
    {

    //   $confirmpass= $req->pass;
    //  $passold= $req->session()->get('staff')['Staff_Password'];
     
       $req->input();
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
       $staffid=$req->session()->get('staff')['Staff_ID'];
        
       if ($dp==null)
       {
            staff::where('Staff_ID', '=', $staffid)
              ->update(['tb_staff.Staff_Name' => $req->name,
                        'tb_staff.Staff_EmailAdd' => $req->email,
                        'tb_staff.Staff_Position' => $req->position,
                        'tb_staff.Staff_ContactNo' => $req->phone,
                        'tb_staff.Staff_Birthday' => $req->bday,                      
            ]); 
       }
       else
       {  staff::where('Staff_ID', '=', $staffid)
              ->update(['tb_staff.Staff_Name' => $req->name,
                        'tb_staff.Staff_EmailAdd' => $req->email,
                        'tb_staff.Staff_Position' => $req->position,
                        'tb_staff.Staff_ContactNo' => $req->phone,
                        'tb_staff.Staff_Birthday' => $req->bday,
                          'tb_staff.DP' => $dp                        
            ]);
       }
     
 
    return redirect()->back()->with('success', 'Staff details Updated Successfully!');

     }

     function updatestaffpass(Request $req)
     {
         $req->input();
      $staff=$req->session()->get('staff')['Staff_ID'];
            if (!Hash::check($req->pass,$req->passold))
            {
            return redirect()->back()->with('warning', 'old password does not match input');
            } 
            else
            {
                if ($req->newpass==$req->repass)
                { 
                    staff::where('Staff_ID', '=', $staff)
                ->update([
                            'tb_staff.Staff_Password' => Hash::make($req->newpass),                     
                ]);
                return redirect()->back()->with('success', 'Password Updated Successfully!');

                }
                else
                {
                    return redirect()->back()->with('warning', 'New password does not match');

                }
            }
      }


/* ------------------ CRUD MENU---------------------------- */
    public function addmenu(Request $req){


            $menu = new Menu;
            $menu->Menu_Name=$req->name;
            $menu->Menu_Desc=$req->desc;
            $menu->Menu_Price=$req->price;
            $menu->Menu_Type=$req->type; 
            $menu->Menu_Category=$req->category; 
            $menu->Menu_status=$req->status;
            if ($req->file('pic')==null)
            {
             $menu->Menu_pic="default.jpg";
            }
            else
            {
                     $req->file('pic')->store('public/Menupics/'); 
                     $menu->Menu_pic= $req->file('pic')->hashName();
            }
            $menu->save();
    
            return redirect()->back()->with('success', 'Menu Added Successfully!');

    
    }

    public function addmenucategory(Request $req){
              
      $category = Menucategory::where(['MenuCategory_Name'=>$req->category])->first();
      if(!$category)
      {
      $cat = new Menucategory;
      $cat->MenuCategory_Name=$req->category;
      $cat->MenuCategory_Queue=0;
      $cat->save();
            return redirect()->back()->with('success', 'Menu Category Added Successfully!');
      }
      return redirect()->back()->with('error', 'Menu Category already exists!');
}

    public function removemenu($menu_id)
    {
        menu::destroy($menu_id);
       return redirect()->back()->with('warning', 'Menu Deleted Successfully!');

    }

    public function updatemenu(Request $req)
    {
      //return $req->input();

      /*  return $details=DB::table('tb_menu')
        ->where('tb_menu.Menu_ID',$req->theid)
        ->get();*/
       $dp;
       if ($req->DPchange == null)
                        {
                          $dp=null;
                        }
       else
                      {
                        $req->file('DPchange')->store('public/Menupics/');
                        $dp=$req->file('DPchange')->hashName();
                      }
        if ($dp==null)
        {
        menu::where('Menu_ID', '=', $req->theid)
              ->update(['tb_menu.Menu_Name' => $req->name,
                        'tb_menu.Menu_Desc' => $req->desc,
                        'tb_menu.Menu_Price' => $req->price,
                        'tb_menu.Menu_Type' => $req->type,
                      //  'tb_menu.Menu_Category' => $req->category,
                        'tb_menu.Menu_status' => $req->status,    
            ]);           
        }
        
        else
        {
       menu::where('Menu_ID', '=', $req->theid)
              ->update(['tb_menu.Menu_Name' => $req->name,
                        'tb_menu.Menu_Desc' => $req->desc,
                        'tb_menu.Menu_Price' => $req->price,
                        'tb_menu.Menu_Type' => $req->type,
                    //    'tb_menu.Menu_Category' => $req->category,
                        'tb_menu.Menu_status' => $req->status,
                        'tb_menu.Menu_pic' => $dp,     ]); 
        }
        return redirect()->back()->with('success', 'Menu details Updated Successfully!');
    
    }
    public function updatemenucategory(Request $req)
    {
     
       MenuCategory::where('MenuCategory_ID', '=', $req->theid)
              ->update(['MenuCategory_Name' => $req->name,
                        'MenuCategory_Queue' => $req->q,            
            ]);

            return redirect()->back()->with('success', 'Menu Category details Updated Successfully!');
    
    }
    public function removemenucategory($menuc_id)
    {
        MenuCategory::destroy($menuc_id);
       return redirect()->back()->with('warning', 'Menu Category Deleted Successfully!');

    }

/* ------------------ CRUD RT ---------------------------- */

public function addrt(Request $req){
   // return $req->input();
        $rt = new roomsntables;
        $rt->RT_Type=$req->type; 
        $rt->RT_Name=$req->RTname; 
        $rt->RT_Desc=$req->desc; 
        $rt->Avail_Status=$req->status;
        $rt->RT_Capacity=$req->capacity;
        $rt->RT_Price=$req->price; 
        if ($req->file('pic')==null)
         {
          $rt->RT_pic="default.jpg";
         }
         else
         {
                  $req->file('pic')->store('public/RT/'); 
                  $rt->RT_pic= $req->file('pic')->hashName();
         }
        $rt->save();

        return redirect()->back()->with('success', 'Room or Table Record Added Successfully!');
}

public function removert($rt_id)
{
    roomsntables::destroy($rt_id);
    return redirect()->back()->with('warning', 'Room or Table Record Deleted Successfully!');

}

public function updatert(Request $req)
{
  //return $req->input();

  /*  return $details=DB::table('tb_menu')
    ->where('tb_menu.Menu_ID',$req->theid)
    ->get();*/
   $dp;
   if ($req->DPchange == null)
                    {
                     $dp=null;
                    }
   else
                  {
                    $req->file('DPchange')->store('public/RT/');
                    $dp=$req->file('DPchange')->hashName();
                  }
    if ($dp==null)
    {
        roomsntables::where('RT_ID', '=', $req->theid)
          ->update([
                    'tbroomsntables.RT_Name' => $req->RT_Name,
                    'tbroomsntables.RT_Desc' => $req->desc,
                    'tbroomsntables.Avail_Status' => $req->status,
                    'tbroomsntables.RT_Capacity' => $req->capacity,
                    'tbroomsntables.RT_Price' => $req->price,
        ]);  
    }
    
    else
    {
      roomsntables::where('RT_ID', '=', $req->theid)
          ->update([
                    'tbroomsntables.RT_Name' => $req->RT_Name,
                    'tbroomsntables.RT_Desc' => $req->desc,
                    'tbroomsntables.Avail_Status' => $req->status,
                    'tbroomsntables.RT_Capacity' => $req->capacity,
                    'tbroomsntables.RT_Price' => $req->price,
                    'tbroomsntables.RT_pic' => $dp,
        ]);     
    }


        return redirect()->back()->with('success', 'Room or Table details Updated Successfully!');
      
}

/* ------------------ CRUD ORDERS ---------------------------- */

public function removeorder($order_id)
{
   $x=Order::where('Order_ID',$order_id)
    ->join('tb_payment','tb_orders.Payment_ID',"=",'tb_payment.Payment_ID')
    ->first();
    $PID = $x->Payment_ID;
    $price = $x->Orders_Price;
    $total = $x->Total_Payment;

    $rem = $total-$price;

    payment::where('Payment_ID', '=', $PID)->update(['Total_Payment' => $rem]);
    Order::destroy($order_id);

    return redirect()->back()->with('warning', 'Order details Removed Successfully!');

  
}

public function updateorder(Request $req)
{

 // return Order::all();
 //return $req->input();

  Order::where('Order_ID', '=', $req->theid)
         ->update([
                    'Quantity'=>$req->qnty,
                    'Orders_Price'=>$req->qnty*$req->mnprice,
                    'Specification'=>$req->specs,
                    'Claim_Type'=>$req->claim,
                    
                    'Delivery_Datetime'=>$req->dt,
                    'Delivery_Price'=>$req->dprice,
                    'Deliverer_ID'=>$req->dID,
                    
                    'Receiver_Name'=>$req->rname,
                    'Rec_ContactNo'=>$req->contact,
                    'Rec_Address'=>$req->raddress,
                    'Time_Departed'=>$req->td,
                    'Time_Received'=>$req->tr,

                  //  'Delivery_Status'=>$req->dstatus,
                //    'Order_Status'=>$req->ostatus,
     ]);

     return redirect()->back()->with('success', 'Order Updated Successfully!');
      
}

public function updatedelivery(Request $req)
{


  Order::where('Order_ID', '=', $req->theid)
         ->update([
                    'Deliverer_ID'=>Session::get('staff')['Staff_ID'],
                    'Delivery_Datetime'=>$req->dt,
                    'Time_Departed'=>$req->td,
                    'Time_Received'=>$req->tr,

                    'Delivery_Status'=>$req->dstatus,
                    'Order_Status'=>$req->ostatus,
     ]);

     return redirect()->back()->with('success', 'Order Updated Successfully!');
      
    }


public function updateorderstat (Request $req)
{

 // return Order::all();
 //return $req->input();

  Order::where('Order_ID', '=', $req->theid2)
         ->update([
                    'Delivery_Status'=>$req->dstatus,
                    'Order_Status'=>$req->ostatus,
     ]);
     
     //return $req->all();
     
    // return $req->theid2;

     return redirect()->back()->with('success', 'Order Status Updated Successfully!');
     
      
}

/* ------------------ CRUD PAYMENT ---------------------------- */

public function removepayment($pay_id)
{
  payment::destroy($pay_id);//from model destroy cart_id
  Order::where('Payment_ID', '=', $pay_id)->delete();
  return redirect()->back()->with('warning', 'Payment Record Deleted Successfully!');

}



public function updatepayment(Request $req)
{

 // return Order::all();
 // $req->input();
    if ($req->eMOP=="Online Payment")
    {
    $req->file('eproof')->store('public/Proof/');
    $eproof=$req->file('eproof')->hashName();
    }
    else
    {
    $eproof=$req->eproof;
    }
  payment::where('Payment_ID', '=', $req->theid)
         ->update([
                    'MOP'=>$req->eMOP,
                    'Proof'=>$eproof,
                    'Payment_Status'=>$req->epstat,
                   
     ]);

     return redirect()->back()->with('success', 'Payment Record Updated Successfully!');

}

public function addpayment(Request $req){
               

  // return $req->input();
       $p = new payment;
       //if user is a member validate ID else, create new ID
        if ($req->custt == "Member")
          {
            //check if user exists
            $user= User::where(['Customer_ID'=>$req->custID])->first();
            if($user)
            {$p->Customer_ID=$req->custID;}
            else
            {echo "<script> alert('Customer ID does not Exist');
                    window.location.href='/payments';</script>";}
          }
        elseif($req->custt == "Guest")
          {
            $user = new guests;
            $user->save();
            $p->Customer_ID=$user->id;
          }
       $p->Customer_Type=$req->custt; 
       $p->Total_Payment=$req->tpay;
       $p->MOP=$req->MOP;
       if ($req->MOP=="Online Payment")
                   {
                   $req->file('proof')->store('public/Proof/');
                   $p->Proof=$req->file('proof')->hashName();
                   }
                   else
                   {
                   $p->Proof=$req->proof;
                   }
       $p->Payment_Status=$req->pstat;
       $p->save();

       return redirect()->back()->with('success', 'Payment Record Added Successfully!');


}


/* ------------------ CRUD RESERVATION---------------------------- */
public function removereservation($r_id)
{
reservation::destroy($r_id);
echo "<script>
  alert('Successfully Removed Reservation');
  window.location.href='/reservation';
  </script>";
 return redirect()->back()->with('warning','Reservation Record Removed Successfully');
}

public function updatereservation(Request $req)
{    

  if ($req->rtid==null)
  {
    reservation::where('Reservation_ID', '=', $req->theid)
    ->update(['tb_reservation.Reservation_Datetime' => $req->rdt,
              'tb_reservation.End_Datetime' => $req->edt,
              'tb_reservation.Companion_No' => $req->cn,
              'tb_reservation.Reservation_Status' => $req->sts                      
            ]);
  }
  else
  {
    reservation::where('Reservation_ID', '=', $req->theid)
    ->update(['tb_reservation.Reservation_Datetime' => $req->rdt,
              'tb_reservation.End_Datetime' => $req->edt,
              'tb_reservation.Companion_No' => $req->cn,
              'tb_reservation.Reservation_Status' => $req->sts,
              'tb_reservation.RT_ID' => $req->rtid                       
            ]);
   roomsntables::where('RT_ID', '=', $req->rtid)
    ->update([
              'tbroomsntables.Avail_Status' => "Reserved",
          ]);  
  }

  return redirect()->back()->with('success', 'Reservation Updated Successfully!');

}



/* ------------------ CRUD RT ---------------------------- */

public function addpr(Request $req){
   //return $req->input();
       $pr = new promo;
       $pr->Promo_Code= Helper::Promo_IDGenerator(new promo,'Promo_Code',3,'PD');
       $pr->Promo_Name= $req->name;
       $pr->Promo_Desc= $req->desc;
       $pr->Promo_Type= $req->type;
       $pr->Promo_value= $req->value;
       $pr->Access= $req->access;

       $pr->save();

       return redirect()->back()->with('success', 'New Promo Record Added Successfully!');

}

public function removepr($rt_id)
{
   promo::destroy($rt_id);
   return redirect()->back()->with('warning', 'Promo Record Deleted Successfully!');

}

public function updatepr(Request $req)
{
   $req->input();

  promo::where('Promo_ID', '=', $req->theid)
         ->update([
                   'tb_promo.Promo_Name' => $req->name,
                   'tb_promo.Promo_value' => $req->value,
                   'tb_promo.Promo_Desc' => $req->desc,
                   'tb_promo.Access' => $req->access,
       ]);

       return redirect()->back()->with('success', 'Promo details Updated Successfully!');
      
}

}
