<!DOCTYPE html>
<html lang="en">
<?php use App\Http\Controllers\guestscontroller; 


// Set the new timezone
date_default_timezone_set('Asia/Manila');
$currdate = date('d-m-y h:i:s');
//echo $date;

?>

<head>
  @include('admin.staffcss')     
  
  <style>
      /* skin 1 */
      .skin-1 .num-in {
          float: left;
          width: 122px;
        display: flex;
        justify-content: space-around;
        margin:10px;
      }
      
      .skin-1 .num-in span {
          display: block;
          float: left;
          width: 30px;
          height: 32px;
          line-height: 32px;
          text-align: center;
          position: relative;
          cursor: pointer;
        border: 2px solid #62ad53;
          border-radius: 5rem;
      }
      
      .skin-1 .num-in input {
          float: left;
          width: 32px;
          height: 32px;
          border: 2px solid #62ad53;
          border-radius: 5px;
          color: #000;
          text-align: center;
          padding: 0;
      }
      
      .skin-1 .num-in span.minus:before {
          content: '';
          position: absolute;
          width: 15px;
          height: 2px;
          background-color: #00A94F;
          top: 50%;
          left: 5px;
      }
      
      .skin-1 .num-in span.plus:before, .skin-1 .num-in span.plus:after {
          content: '';
          position: absolute;
          right: 6px;
          width: 15px;
          height: 2px;
          background-color: #00A94F;
          top: 50%;
      }
      
      .skin-1 .num-in span.plus:after {
          -webkit-transform: rotate(90deg);
          -ms-transform: rotate(90deg);
          -o-transform: rotate(90deg);
          transform: rotate(90deg);
      }
      
      </style>
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!--------------INCLUDES------------------->
  @include('admin.reception.receptionnav')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('admin.staffheader')
    @include('admin.Alerts')

<div class="row">
    <div class="col-md-7" style="padding:0px">
    <!----------------------------------ROOMS SECTION----------------------------------------->     
        <h1 class="heading text-center" style="border-bottom:1px solid green"><Span>ROOMS</span></h1><br>
      <div class="row" style="justify-content:center">
        @foreach ($rt as $rt)
        @if($rt->Avail_Status=='Available')

        <div class="col-md-6" style="max-width:180px; margin-bottom: 10px;">
          <div class="card">
            <div class="card-header p-3 text-center">
              <div class="avatar avatar-xxl border-radius-xxl">
                <img src="storage/RT/{{$rt->RT_pic}}" class="avatar avatar-xxl" alt="Menupic">
            </div>
            </div>
            <div class="card-body pt-0 p-3 text-center">
              <h6 class="text-center mb-0">{{$rt->RT_Type}} {{$rt->RT_ID}}. {{$rt->RT_Name}}</h6>
              <span class="text-xs">
                @if($rt->Avail_Status=='Available')
                <span class="badge badge-sm bg-gradient-success">Available</span>
                @elseif($rt->Avail_Status=='Reserved')
                <span class="badge badge-sm bg-gradient-secondary">Reserved</span>
                @elseif($rt->Avail_Status=='Unavailable')
                <span class="badge badge-sm bg-gradient-danger">Unavailable</span>
                @elseif($rt->Avail_Status=='On hold')
                <span class="badge badge-sm bg-gradient-info">On hold</span>
                @endif
              </span><br>
              <span class="text-xs">Capacity: {{$rt->RT_Capacity}}</span>

              <hr class="horizontal dark my-3">
              <h5 class="mb-0">{{$rt->RT_Price}}</h5>

              <!--ADDTOCART-->
              <a data-id="{{$rt->RT_ID}}" data-type="{{$rt->RT_Type}}" data-price="{{$rt->RT_Price}}" id="book" class="btn bg-gradient-success">Book this Room</a>

            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
        </div>
    <!-------------------------------------------- CART ----------------------------------->
    <div class="col-md-4"  id="cartt">

    <div  style="padding:0px">
    
          <!--DIV-->
          <div class="align-items-center">
          <div class=" h-50 order">
          <div class="row justify-content-center align-items-center h-100">
          <div class="col card card-body p4" style="padding:10px;padding-bottom:90px;">
          
          <div class="" style="border-radius: 5rem;">
          <div class="">
          <div class="row" style="padding:20px">

            <!--CART HEADER-->
            <div class="heading d-flex">
            <h2 class="col-6" style="min-width:140px"><Span>Reservation</span></h2><br>
              <h2 class="col-6 text-end"><Span>ID: {{ Session::get('guests')['id'] }}</span></h2>
            </div>
            
            <!-------------------------- ALERTS ------------------------------------>
            <div id="alert">
              <div id="success" class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:2rem; display:none">
                 <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                 <span class="alert-text"><strong>Success!</strong> successfully booked! </span>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             
              <div id="warning" class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:2rem; display:none">
                 <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                 <span class="alert-text"><strong>Warning</strong>Already Listed</span>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>

              <div id="cancel" class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top:2rem; display:none">
                  <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                  <span class="alert-text"><strong>Reservation Cancelled</strong> </span>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
             
              <div id="info" class="alert alert-info alert-dismissible fade show" role="alert" style="margin-top:2rem; display:none">
                 <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                 <span class="alert-text"><strong>Info.</strong>You must enter Complete details</span>
                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
            </div>

             <!------------------------------------------------------------------------------>

            <div class="row">
          <!-----  FOREACH CART ------------->
              @php $subtotal @endphp
                @foreach ($rcart as $res)
                <div class="mb-3" style="border-top:1px solid #878686;">
                  <div class="">
                    
            <!--#1  ITEM GROUP---------------------------------------->

                    <div class="d-flex justify-content-between" style="margin:10px">
                        <!--NAME & DESCRIPTION-->
                            <h5>{{$res->RT_type}} #{{$res->RT_ID}}:{{$res->RT_Name}}</h5>
                        <a type="button" id="remove" data-id="{{$res->Reservation_ID}}" data-rtid="{{ $res->RT_ID }}style="color:#ff5c5c;font-weight:bolder"> Cancel Reservation
                              </a> 

                        </div>
    
              <div class="d-flex justify-content-start" style="margin:10px">
             <!--#2 DETAILS GROUP---------------------------------------->
                      <div class="row align-items-center">
                        <!--IMAGE-->
                        <div class="col">  
                          <img src="storage/RT/{{$res->RT_pic}}"class="avatar rounded-3" style="width:200px;height:200px" alt="Room/Table" >
                         <input class="rt_id" value="{{$res->RT_ID}}"  id="rt_id" type="hidden" name="rt_id">
                        </div>
                        <!--NAME & DESCRIPTION-->
                        <div class="col"style="max-width:300px;">
                            <!--COMPANION-->
                            <div class="row">
                                <label>Companion No.</label>
                                <div class="col-6 align-items-center justify-content-between"> 
                                <div class="num-block skin-1">
                                <div class="num-in">
                                    <span class="minus dis"></span>
                                    <input class="companion" value="{{$res->Companion_No}}" type="number" name="companion" id="details" min="1" max="50" style="width:50px;" >
                                    <span class="plus"></span>
                                </div>
                                </div>
                                </div>
                            </div>
                          <!--STARTDATETIME-->
                          <div class="mb-3">
                            <label>Reservation Start Date&Time</label>
                          <div class="num-in">
                              <input class="form-control start datefield" value="{{$res->Reservation_Datetime}}" min="{{ $currdate }}" type="datetime-local" name="start" id="details" min="1" max="50" >
                            </div>
                            <!--ENDDATETIME-->
                            <label>Reservation End Date&Time</label>
                            <div class="num-in">
                              <input class="form-control end datefield" value="{{$res->End_Datetime}}" type="datetime-local"  min="{{ $currdate }}" name="end" id="details" min="1" max="50">
                            </div>
                            </div>
                            <!--QUANTITY GROUP-------------------------------------->
                            <div class="row">
                            <div class=col-7>
                              @if($res->RT_Type=="Room")
                                <label>Total Days</label>
                                @endif
                            </div>
                            <div class="col-4 text-center">
                                <label>Subtotal</label>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-6 align-items-center justify-content-between">          
                               @if($res->RT_Type=="Room")
                              <h5 class="align-middle text-center" style="padding-right:10px" >   
                              <span class="days" name="days">{{$res->Days}}</span></h5>
                               @endif
                            </div>
                            <!--PRICE-->
                            <div class="col-6" style="margin:auto">
                                <h5 class="align-middle text-center" style="padding-right:10px" >
                                    <span class="itotal" name="subtotal">{{$res->RT_Price*$res->Days  }}</span>
                                    <input class="iprice" value="{{$res->RT_Price}}"  id="iprice" type="hidden" name="iprice">
                                    <input class="idays" value="{{$res->Days}}" d="idays" type="hidden" name="idays">
                                    <!--SUBTOTAL INPUT-->
                                     <input class="gtot"  id="gtot" type="hidden" value="{{$res->Reservation_Price}}" name="gtot"></span>

                                  </h5>  
                              </div>      
                              
                        </div>


                        </div>
                        </div>
    
                      
                        
                      </div>
                    </div>
                    
                            
                  </div>
                
               @endforeach</div>
                <!--td class="alignright" id="gtotal">Grand Total: ₱ {{$total=0}}</td-->
                            <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1fee9;">
                              <!--h5 class="fw-bold mb-0">Grand Total:</h5-->
                              <label>Grand Total: ₱</label>
                              <h5 class="fw-bold mb-0" id="gtotal" name="gtotal" ></h5>
                            </div>
                <!--input class="btn btn-success btn-lg w-100" type="submit" value="Checkout"-->   
                <!--a class="btn" href="ordernow"> Order Now</a-->
                 <!-- EDIT BUTTON -->
                 <a id="checkoutbutton" type="submit" class="btn btn-success btn-lg w-100">Checkout</a>                 

    
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
              </div>
            </div>
                    
          </div>
 
</div></div>

<form action="gplacereservation" method="POST">
  @csrf 
   <div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Reservation Details</h3>
                <p class="mb-0">Enter Reservation details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
            
                <label>Customer Name</label>
                <div class="input-group mb-3">
                  <input type="text" required id="name" value="Guest" name="name" placeholder="enter your name" class="form-control" aria-describedby="name-addon">
                </div>
                
                <label>Customer Number</label>
                <div class="input-group mb-3">
                  <input type="tel" id="number" name="number" value="00000000000" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" required class="form-control">
                </div>

                <label>Notes/Message</label>
                <div class="input-group mb-3">
                  <input type="text" placeholder="extra instructions" id="specs" name="specs" class="form-control">
                </div>
                
                <label>Mode of Payment</label>
                <div class="input-group mb-3">
                      <select class="form-control" onchange="mypay()" id="payvia" style="width:100%;border: solid 1px rgb(85 183 107)" name="MOP" required>
                        <option value="">Mode of Payment:</option>
                        <option value="Cash">Cash</option>
                        <option value="Online Payment">Online Payment</option>
                      </select>
                      <div class="input-group m-3" style='display:none;' id='online'>
                        <div class="input-group mb-3 m-3">
                          GCASH:09281885467<br>
                          BANKS:Metrobank<br>
                        </div>
                        <div class="input-group"> 
                          <label>Transfer Screenshot</label>
                          <div class="input input-group">
                            <input class="payinput form-control " type="file" id="proof"  name="proof" accept="image/*">
                          </div>
                        </div>
                    </div>
                  </div>

                  <label>Promo</label>
                <div class="input-group mb-3">
                  <select id="promocode" class="form-control" name="promocode">
                    <option value="">Promo:</option>
                    @foreach ($promo as $promo)          
                    <option data-val="{{$promo->Promo_value}}" data-type="{{$promo->Promo_Type}}" value="{{$promo->Promo_Code}}">{{$promo->Promo_Name}}</option>
                    @endforeach
                    </select>
                </div>
                    
                <!-----------------------------BUTTON--------------------------------------->
                <div class="text-center">
                  <button type="submit" id="gplacereservation" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Place Order</button>
                </div>
              </form>
            </div>
            <div class="card-footer text-center pt-0 px-sm-4 px-1">
              <p class="mb-4 mx-auto">
                <a href="javascrpt:;" class="text-danger text-gradient font-weight-bold" data-bs-dismiss="modal" >Cancel</a>
              </p>
            </div>
          </div>
        </div>
      </div>
      </div>
  </div>
</form>


  @include('admin.stafffooter')
</main>
 
@include('admin.staffscript')

      <script>
         window.setTimeout(function() {
            $( "#alert" ).fadeIn( 500 ).delay( 7000 ).fadeOut( 1000 );
          }, 2000);

    /*---------- SET GRAND TOTAL------------*/ 
    var iprice=document.getElementsByClassName('iprice');
    var gtotal=document.getElementById('gtotal');
    var itotal=document.getElementsByClassName('itotal');
    var idays=document.getElementsByClassName('idays');
    var days=document.getElementsByClassName('days');
    var gtot=document.getElementsByClassName('gtot');
    var gt=0;
    
    for(i=0;i<iprice.length;i++)
          {
            gt = gt+iprice[i].value*idays[i].value;  
          }
      gtotal.textContent = gt;

     /*---------- ADD 2 RESERVATION------------*/ 
      $(document).on('click','#book',function() 
      {
       var mid=$(this).data("id");
       var type=$(this).data("type");
       var price=$(this).data("price");
            $.ajax({    
              
              url: 'reservationcart/', 
              method:'POST', 
              data: {RT_ID:mid,RT_Type:type,RT_Price:price,"_token":"{{csrf_token()}}"},
              success: function(data){
                //alert(data);
               // $('#cartt').html(data);
               
               if (data=="success")
               {
                location.reload();
                $("#success").show();
               }
               else if (data=="warning")
               {
                location.reload();
                $("#warning").show();
               }
             // $('#cartt').load(location.href + " #cartt")
              }
            });  
         
      });
           
      $(document).on('change','#details',function() 
    {
        /*-------------- VARIABLES--------*/
            var companion=document.getElementsByClassName('companion');
            var theID=document.getElementsByClassName('rt_id');
            var start=document.getElementsByClassName('start');
            var end=document.getElementsByClassName('end');
            var istart = Date.parse($(start).val()); //get timestamp
            var iend = Date.parse($(end).val()); //get timestamp

            /*-------------- UPDATE AJAX --------*/
                for(i=0;i<iprice.length;i++)
                    {
                    
                   // idays[i].value = Math.floor((iend - istart) / 1000 / 60 / 60 / 24); //milliseconds: /1000 / 60 / 60
                   // alert(Math.floor((Date.parse($(end[i]).val()) - Date.parse($(start[i]).val())) / 1000 / 60 / 60 / 24));
                  var dayscounter=Math.floor((Date.parse($(end[i]).val()) - Date.parse($(start[i]).val())) / 1000 / 60 / 60 / 24);
                  var dayscount=0
                  if (dayscounter == 0)
                  {
                    dayscount=1;
                  }
                  else
                  {
                    dayscount=dayscounter;
                  }
                  idays[i].value=dayscount;

                  days[i].textContent = idays[i].value;
                  itotal[i].textContent=iprice[i].value*idays[i].value;
                  gtot[i].value=iprice[i].value*idays[i].value;
                  // alert(JSON.stringify(start[i].value));
                  days[i].value = idays[i].value;
                  $.ajax({    
                    url: 'updatereservation/'+theID[i].value, 
                    method:'POST', 
                    data: {gtot:gtot[i].value,Days:days[i].value,Companion_No:companion[i].value,Reservation_Datetime:start[i].value,End_Datetime:end[i].value,"_token":"{{csrf_token()}}"},
                    success: function(data){
                        //  alert(data);
                        }
                    });  
                    }
                    gt=0;
                    for(i=0;i<iprice.length;i++)
                        {
                          gt = gt+iprice[i].value*idays[i].value;  
                        }
                    gtotal.textContent = gt;
             
    });
 /*******************************REMOVE***************************************/    
     $(document).on('click','#remove',function() 
      {
       var mid=$(this).data("id");
       var rtid=$(this).data("rtid");

       //alert(mid);
            $.ajax({    
              
              url: 'cancelreservation/', 
              method:'POST', 
              data: {cart_id:mid,rtid:rtid,"_token":"{{csrf_token()}}"},
              success: function(data){
                //$('#cartt').load(location.href + " #cartt");
                //alert(data);
              if (data=="cancel")
               {
                location.reload();
                $("#cancel").show();
               }
           
              }
            });  
            
         
      });

 /********************************* + - BUTTONS*************************************/    

$(document).ready(function() {
  $('.num-in span').click(function () {
      var $input = $(this).parents('.num-block').find('input.companion');
    if($(this).hasClass('minus')) {
      var count = parseFloat($input.val()) - 1;
      count = count < 1 ? 1 : count;
      if (count < 2) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    else {
      var count = parseFloat($input.val()) + 1
      
      count = count > 50 ? 50 : count;
      if (count > 1) {
        $(this).addClass('dis');
      }
      else {
        $(this).removeClass('dis');
      }
      $input.val(count);
    }
    
    $input.change();
    return false;
  });
  
});

  /*----------CHECKOUT MODAL------------*/
  $(document).on('click','#checkoutbutton',function() 
  {
  //var theID = $(this).data("id");
  //alert(Staff_ID);
    $('#checkoutmodal').modal('show');
  });



  /*-----------------SELECT BOXES CONDITIONS ---------------------------*/

   /*___________________________pay via_______________________________*/

        function mypay() {
        var x = document.getElementById("payvia").value;
        if ( x == 'Cash')
        {
          $("#online").hide();
          document.getElementById("proof").required = false;//to not require field of proof of online payment 
          
        }
        else if ( x == 'Online Payment')
        {
          $("#online").show();
          document.getElementById("proof").required = true;//to require field of proof of online payment 
        }
        else 
        {
          $("#online").hide();
        }
      }
  /*___________________________F claim via_______________________________*/
      function myclaim() {
        var y = document.getElementById("claimvia").value;
        if ( y == 'Delivery')
        {
          $("#delivery").show();
          document.getElementById("date").required = true;//to not require field of proof of online payment 
          document.getElementById("address").required = true;//to not require field of proof of online payment 
  
  
        }
        else
        {
          $("#delivery").hide();
          document.getElementById("date").required = false;//to not require field of proof of online payment 
          document.getElementById("address").required = false;//to not require field of proof of online payment 
  
  
        }
      }

      /*-----------------------------------------*/
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10){
            dd='0'+dd
        } 
        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementsByClassName("mindate").setAttribute("min", today);
    alert(today);
      
      </script>

</body>

</html>


