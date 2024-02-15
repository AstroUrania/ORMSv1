<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customercontroller;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\staffcontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\guestscontroller;

use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
|                           Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

Route::get('/foo', function () {
    Artisan::call('storage:link');
    });
 
//routes to login page
Route::get('/login', function () {
    return view('login');
}); 

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

//login customer 
Route::post("/login",[customercontroller::class,'login']);
Route::get("userprofile",[MenuController::class,'userprofile']);
Route::post("updateuser",[MenuController::class,'updateuser']);
Route::post("updateuserpass",[MenuController::class,'updateuserpass']);


//HOME
Route::get("/",[MenuController::class,'index']);
Route::get("/2",[MenuController::class,'index2']);

Route::get("/search",[MenuController::class,'search']);
Route::get("history",[MenuController::class,'History']);
Route::get("rooms",[MenuController::class,'rooms']);
Route::get("tables",[MenuController::class,'tables']);
Route::post("add_to_cart",[MenuController::class,'addtocart']);
Route::get("cart",[MenuController::class,'cart']);
Route::get("removecart/{cart_id}",[MenuController::class,'removeCart']);
Route::post("updateqty/{Menu_id}",[MenuController::class,'updateqty']);

Route::post("Reserverm",[MenuController::class,'Reserverm']);
Route::post("Reservetb",[MenuController::class,'Reservetb']);

Route::post("Reservedrm",[MenuController::class,'Reservedrm']);
Route::post("Reservedtb",[MenuController::class,'Reservedtb']);

Route::get("checkout",[MenuController::class,'checkout']);
Route::post("placeorder",[MenuController::class,'placeOrder']);
Route::get("thanks",[MenuController::class,'thanks']);

//registercustomer
Route::view("/register",'register');
Route::post("/register",[customercontroller::class,'register']);


//routestafflogin
Route::get('/stafflogin', function () {return view('stafflogin');});
Route::post("updatestaff",[dashboardcontroller::class,'updatestaff']);
Route::post("updatestaffpass",[dashboardcontroller::class,'updatestaffpass']);

//login staff 
Route::view("/stafflogin",'stafflogin');
Route::post("/stafflogin",[staffcontroller::class,'stafflogin']);

//dashboard staff
Route::get("/dashboard",[dashboardcontroller::class,'index']);

//logoutstaff
Route::get('/stafflogout', function () {Session::forget('staff');return redirect('/stafflogin');});

Route::view("/staffregister",'staffregister');
Route::post("/staffregister",[staffcontroller::class,'staffregister']);

//UPDATE ROUTE
//Route::view("/updatestaffmembers",'admin/manager/updatestaffmembers');


//REPORTS
//Route::view("/updatestaffmembers",'admin/manager/updatestaffmembers');
Route::get("/orderreports",[dashboardcontroller::class,'orderreports']);
Route::get("/monthlysales",[dashboardcontroller::class,'monthlysales']);
Route::get("/rmonthlysales",[dashboardcontroller::class,'rmonthlysales']);



//REMOVE MODAL 
Route::get("removestaff/{staff_id}",[staffcontroller::class,'removestaff']);
Route::get("removecustomer/{cust_id}",[customercontroller::class,'removecustomer']);
Route::get("removemenu/{menu_id}",[dashboardcontroller::class,'removemenu']);
Route::get("removemenucategory/{menuc_id}",[dashboardcontroller::class,'removemenucategory']);
Route::get("removert/{rt_id}",[dashboardcontroller::class,'removert']);
Route::get("removeorder/{order_id}",[dashboardcontroller::class,'removeorder']);
//Route::get("removeinventory/{inventory_id}",[dashboardcontroller::class,'removeinventory']);
Route::get("removereservation/{r_id}",[dashboardcontroller::class,'removereservation']);
Route::get("removepayment/{p_id}",[dashboardcontroller::class,'removepayment']);
Route::get("removetransaction/{tr_id}",[dashboardcontroller::class,'removetransaction']);
Route::get("removepr/{pr_id}",[dashboardcontroller::class,'removepr']);
//Route::get("getstaffdetails/{staff_id}",[staffcontroller::class,'getstaffdetails']);
//Route::post("getstaffdetails",[dashboardcontroller::class,'getstaffdetails'])->name('get.staff.details');

//UPDATE MODAL 
Route::post("/updatestaffmember",[staffcontroller::class,'updatestaffmember']);
Route::post("/updatecustomer",[customercontroller::class,'updatecustomer']);
Route::post("/updatemenu",[dashboardcontroller::class,'updatemenu']);
Route::post("/updatemenucategory",[dashboardcontroller::class,'updatemenucategory']);
Route::post("/updatert",[dashboardcontroller::class,'updatert']);
Route::post("/updatepr",[dashboardcontroller::class,'updatepr']);
Route::post("/updateorder",[dashboardcontroller::class,'updateorder']);
Route::post("/updateorderstat",[dashboardcontroller::class,'updateorderstat']);

Route::post("/updatepayment",[dashboardcontroller::class,'updatepayment']);
Route::post("/updatereservation",[dashboardcontroller::class,'updatereservation']);
//Route::post("/updateinventory",[dashboardcontroller::class,'updateinventory']);
Route::post("/updaterestaurantinfo",[dashboardcontroller::class,'updaterestaurantinfo']);

//dashboardsfor manager
Route::get("/staffmembers",[dashboardcontroller::class,'staffmembers']);
Route::get("/customers",[dashboardcontroller::class,'customers']);
Route::get("/menu",[dashboardcontroller::class,'menu']);
Route::get("/menucategory",[dashboardcontroller::class,'menucategory']);
Route::get("/roomsntables",[dashboardcontroller::class,'roomsntables']);
Route::get("/orders",[dashboardcontroller::class,'orders']);
//Route::get("/inventory",[dashboardcontroller::class,'inventory']);
Route::get("/reservationtb",[dashboardcontroller::class,'reservationtb']);
Route::get("/reservation",[dashboardcontroller::class,'reservation']);
Route::get("/promo",[dashboardcontroller::class,'promo']);
Route::get("/payments",[dashboardcontroller::class,'payments']);
Route::get("/profile",[dashboardcontroller::class,'profile']);
Route::get("/Restaurantinfo",[dashboardcontroller::class,'Restaurantinfo']);

//dashboardsfor reception
Route::get("/rcustomers",[dashboardcontroller::class,'rcustomers']);
Route::get("/rroomsntables",[dashboardcontroller::class,'rroomsntables']);
Route::get("/rorders",[dashboardcontroller::class,'rorders']);
Route::get("/rreservationtb",[dashboardcontroller::class,'rreservationtb']);
Route::get("/rreservation",[dashboardcontroller::class,'rreservation']);
Route::get("/rpromo",[dashboardcontroller::class,'rpromo']);
Route::get("/rpayments",[dashboardcontroller::class,'rpayments']); 
Route::get("/rprofile",[dashboardcontroller::class,'rprofile']);

//ADD MODAL
Route::post("/staffregistermodal",[staffcontroller::class,'staffregistermodal']);
Route::post("/registermodal",[customercontroller::class,'registermodal']);
Route::post("/addmenu",[dashboardcontroller::class,'addmenu']);
Route::post("/addmenucategory",[dashboardcontroller::class,'addmenucategory']);
Route::post("/addrt",[dashboardcontroller::class,'addrt']);
Route::post("/addpayment",[dashboardcontroller::class,'addpayment']);
//Route::post("/addinventory",[dashboardcontroller::class,'addinventory']);
Route::post("/addreservation",[dashboardcontroller::class,'addreservation']);
Route::post("/addpr",[dashboardcontroller::class,'addpr']);

//addorderguests
Route::get("/gcart",[guestscontroller::class,'gcart']);
Route::post("/addcart",[guestscontroller::class,'addcart']);
Route::post("gremovecart",[guestscontroller::class,'gremovecart']);
Route::post("gupdateqty/{Menu_id}",[guestscontroller::class,'gupdateqty']);
Route::post("gplaceorder",[guestscontroller::class,'gplaceorder']);

//reserveguests
Route::get("/greservation",[guestscontroller::class,'greservation']);
Route::post("reservationcart",[guestscontroller::class,'reservationcart']);
Route::post("cancelreservation",[guestscontroller::class,'cancelreservation']);
Route::post("updatereservation/{r_id}",[guestscontroller::class,'updatereservation']);
Route::post("gplacereservation",[guestscontroller::class,'gplacereservation']);

//reserveguests
Route::get("/gtbreservation",[guestscontroller::class,'gtbreservation']);
Route::post("tbreservationcart",[guestscontroller::class,'tbreservationcart']);
Route::post("canceltbreservation",[guestscontroller::class,'canceltbreservation']);
Route::post("updatetbreservation/{r_id}",[guestscontroller::class,'updatetbreservation']);
Route::post("gplacetbreservation",[guestscontroller::class,'gplacetbreservation']);
 
//dashboardsfor reception
Route::get("/rcustomers",[dashboardcontroller::class,'rcustomers']);
Route::get("/rmenu",[dashboardcontroller::class,'rmenu']);
Route::get("/rroomsntables",[dashboardcontroller::class,'rroomsntables']);
Route::get("/rorders",[dashboardcontroller::class,'rorders']);
Route::get("/rreservationtb",[dashboardcontroller::class,'rreservationtb']);
Route::get("/rreservation",[dashboardcontroller::class,'rreservation']);

//addorderguestsreception
Route::get("/rgcart",[guestscontroller::class,'rgcart']);
Route::post("radd2cart",[guestscontroller::class,'radd2cart']);
Route::post("rgremovecart",[guestscontroller::class,'rgremovecart']);
Route::post("rgupdateqty/{Menu_id}",[guestscontroller::class,'rgupdateqty']);
Route::post("rgplaceorder",[guestscontroller::class,'rgplaceorder']);

//reserveguestsreception
Route::get("/rgreservation",[guestscontroller::class,'rgreservation']);
Route::post("rreservationcart",[guestscontroller::class,'rreservationcart']);
Route::post("rcancelreservation",[guestscontroller::class,'rcancelreservation']);
Route::post("rupdatereservation/{r_id}",[guestscontroller::class,'rupdatereservation']);
Route::post("rgplacereservation",[guestscontroller::class,'rgplacereservation']);

//reserveguestsreception
Route::get("/rgtbreservation",[guestscontroller::class,'rgtbreservation']);
Route::post("rtbreservationcart",[guestscontroller::class,'rtbreservationcart']);
Route::post("rcanceltbreservation",[guestscontroller::class,'rcanceltbreservation']);
Route::post("rupdatetbreservation/{r_id}",[guestscontroller::class,'rupdatetbreservation']);
Route::post("rgplacetbreservation",[guestscontroller::class,'rgplacetbreservation']);



//dashboardsfor deliveries
Route::get("/dcustomers",[dashboardcontroller::class,'dcustomers']);
Route::get("/dorders",[dashboardcontroller::class,'dorders']);
Route::get("/dprofile",[dashboardcontroller::class,'dprofile']);
Route::post("/updatedelivery",[dashboardcontroller::class,'updatedelivery']);


//dashboardsfor kitchen
Route::get("/kmenu",[dashboardcontroller::class,'kmenu']);
Route::get("/korders",[dashboardcontroller::class,'korders']);
//Route::get("/kinventory",[dashboardcontroller::class,'kinventory']);
Route::get("/kprofile",[dashboardcontroller::class,'kprofile']);

/*

Route::middleware([
    'auth:sanctum', 
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/login', function () {
        return view('login');
    })->name('login');
});

return response()->json([ 'valid' => auth()->check() ]);
Route::get("/dashboard",[dashboardcontroller::class,'index'])->middleware('auth','verified');


//route::get('/',[HomeController::class,'redirect'])->middleware('auth','verified');

Auth::routes([
    'verify' =>true
]);*/
//Route::get("/dashboard",[dashboardcontroller::class,'index']);

//Route::get("/",[MenuController::class,'index']);
/*
Route::middleware([
    "auth:sanctum", 
    "verified"
])->get("/",function() {
    return view ("/");
})->name("/");

route::get("/".[MenuController::class,"index"])->middleware("auth","verified");*/