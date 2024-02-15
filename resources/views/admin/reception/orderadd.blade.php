<!DOCTYPE html>
<html lang="en">
<?php 
      use App\Http\Controllers\guestscontroller;      
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
    <!----------------------------------MENU SECTION----------------------------------------->     
    <div class="col-md-6" style="padding:0px">
      <div class="row" style="justify-content:center">
        @foreach ($Menus as $Menus)
        <div class="col-md-6" style="max-width:180px; margin-bottom: 10px;">
          <div class="card">
            <div class="card-header mx-4 p-3 text-center">
              <div class="avatar avatar-xl border-radius-xl">
                <img src="storage/Menupics/{{$Menus->Menu_pic}}" class="avatar avatar-xl" alt="Menupic">
            </div>
            </div>
            <div class="card-body pt-0 p-3 text-center">
              <h6 class="text-center mb-0">#{{$Menus->Menu_ID}}. {{$Menus->Menu_Name}}</h6>
              <span class="text-xs">Type: {{$Menus->Menu_Type}}</span>
              <span class="text-xs">Category: {{$Menus->Menu_Category}}</span>
              <span class="text-xs">Status: {{$Menus->Menu_status}}</span>
              <hr class="horizontal dark my-3">
              <h5 class="mb-0">{{$Menus->Menu_Price}}</h5>

              <!--ADDTOCART-->
                    <a data-id="{{$Menus->Menu_ID}}" id="add2cart" class="btn bg-gradient-success">Add to Cart</a>

            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    
    <!-------------------------------------------- CART ----------------------------------->
    <div class="col-md-5"  id="cartt">

    <div  style="padding:0px">
    
          <!--DIV-->
          <div class="align-items-center">
          <div class=" h-50 order">
          <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col" style="padding-bottom:100px;">
          
          <div class="card" style="border-radius: 5rem;">
          <div class="card-body p-4">
          <div class="row" style="padding:20px">
          <div>

            <!--CART HEADER-->
            <div class="heading row">
            <h1 class="col-6"><Span>My Cart</span></h1><br>
              <h1 class="col-6 text-end"><Span>Guest ID: {{ Session::get('guests')['id'] }}</span></h1>
            </div>
            <!-------------------------- ALERTS ------------------------------------>
            <div id="alert">
              <div id="success" class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top:2rem; display:none">
                 <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                 <span class="alert-text"><strong>Success!</strong> Successfully added to cart! </span>
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
                  <span class="alert-text"><strong></strong>Removed from cart </span>
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
          <!-----  FOREACH CART ------------->
              @php $subtotal @endphp
                @foreach ($cart as $item)
                <div class="mb-3" style="border-top:1px solid #878686;">
                  <div class="card-body" style="padding:15px">
                    <div class="d-flex justify-content-around" style="margin:10px">
                  <!--#1 IMAGE ITEM GROUP---------------------------------------->
                      <div class="d-flex flex-row align-items-center">
                        <!--IMAGE-->
                        <div style="max-width:65px">  
                          <img src="storage/Menupics/{{$item->Menu_pic}}"class="avatar avatar-lg me-3 rounded-3" alt="Food item" style="width:80px;height:80px">
                        
                        </div>
                        <!--NAME & DESCRIPTION-->
                        <div style="max-width:300px;">
                          <h5 style="margin-right:10px;">{{$item->Menu_Name}}</h5>
                        </div>
                        </div>
    
                      <!--#2 PRICE QUANTITY GROUP-------------------------------------->
                      <div class="d-flex flex-row align-items-center justify-content-between"> 
                        <div class="num-block skin-1">
                          <div class="num-in">
                            <span class="minus dis"></span>
                            <input class="iquantity" value="{{$item->Quantity}}" type="number" name="quantity" id="iquantity" min="1" max="50" style="width:50px;" >
                            <span class="plus"></span>
                          </div>
                        </div>
                        <input class="Menu_id" value="{{$item->Menu_ID}}"  id="Menu_id" type="hidden" name="Menu_id">
                      
                        
                        <!--PRICE-->
                        <div>
                          <h5 class="align-middle text-center" style="padding-right:10px" >
                              <span class="itotal" name="subtotal">{{$item->Menu_Price*$item->Quantity}}</span>
                              <input class="iprice" value="{{$item->Menu_Price}}"  id="iprice" type="hidden" name="price">
                          </h5>
                        </div>
                        <!--REMOVE-->
                        <a type="button" id="remove" data-id="{{$item->Cart_ID}}" style="color:#ff5c5c; width: 20px;" class="fa fa-trash" >
                        </a>      
                      </div>
                      
                    </div>
                  </div>
                </div>
               @endforeach
                <!--td class="alignright" id="gtotal">Grand Total: ₱ {{$total=0}}</td-->
                            <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1fee9;">
                              <!--h5 class="fw-bold mb-0">Grand Total:</h5-->
                              <label>Grand Total: ₱</label>
                              <h5 class="fw-bold mb-0" id="gtotal" name="gtotal" ></h5>
                              <input class="gtot"  id="gt" type="hidden" name="gt"></span>
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

<form action="gplaceorder" method="POST">
  @csrf 
   <div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Order Details</h3>
                <p class="mb-0">Enter Order details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Claim Type</label>
                <div class="input-group mb-3">
                      <select id="claimvia" onchange="myclaim()" style="width:100%" name="claimvia" class="w-100 claimvia form-sontrol" required>
                        <option value="">Claim Type:</option>
                        <option value="Delivery">Delivery</option>
                        <option value="Pick-up">Pick-up</option>
                        <option value="Dine-in">Dine-in</option>
                      </select>
                      <div class="input-group mb-3" style='display:none;' id='delivery'>
                        <label>Date and Time</label>
                        <div class="input input-group mb-3">
                          <input type="datetime-local" id="date" name="date" class="form-control">
                        </div>
                        <label>Address</label>
                        <div class="input-group mb-3">
                          <input type="address" name="address" placeholder="###-Address-Suite/Apartment-City-Country-Zip" class="form-control">
                        </div>
                      </div>
                  </div>
            
                <label>Customer Name</label>
                <div class="input-group mb-3">
                  <input type="text" required id="name" value="Guest" name="name" placeholder="enter your name" class="form-control" aria-describedby="name-addon">
                </div>
                
                <label>Customer Number</label>
                <div class="input-group mb-3">
                  <input type="tel" id="number" name="number" value="00000000000" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" required class="form-control">
                </div>

                <label>Specification</label>
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
                  <button type="submit" id="gplaceorder" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Place Order</button>
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
  </div></form>


  @include('admin.stafffooter')
</main>
 
@include('admin.staffscript')

      <script>

        window.setTimeout(function() {
            $( "#alert" ).fadeIn( 500 ).delay( 7000 ).fadeOut( 1000 );
          }, 2000);


    /*---------- SET GRAND TOTAL------------*/ 
    var iprice=document.getElementsByClassName('iprice');
    var iquantity=document.getElementsByClassName('iquantity');
    var itotal=document.getElementsByClassName('itotal');
    var gtot=document.getElementsByClassName('gtot');
    var gtotal=document.getElementById('gtotal');
    var gt=0;
    
   for(i=0;i<iprice.length;i++)
      {
    gt = gt+(iprice[i].value)*(iquantity[i].value);
      }
      gtotal.textContent = gt;


     /*---------- ADD 2 CART------------*/ 
      $(document).on('click','#add2cart',function() 
      {
       var mid=$(this).data("id");
        //alert(mid);

            $.ajax({    
              
              url: 'addcart/', 
              method:'POST', 
              data: {Menu_ID:mid,"_token":"{{csrf_token()}}"},
              success: function(data){
              //  alert(data);
               // $('#cartt').html(data);
              // location.reload();
                              
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
           
      $(document).on('change','#iquantity',function() 
    {
  /*---------- SET SUBTOTALS AND GRAND TOTAL ONCHANGE------------*/
  gt=0;
      for(i=0;i<iprice.length;i++)
      {
        itotal[i].textContent=(iprice[i].value)*(iquantity[i].value);
        gt=gt+(iprice[i].value)*(iquantity[i].value)
      }
   
    gtotal.textContent = gt;
/*-------------- ACCESS MMENU CONTROLLER FUNCTION = UPDATEQTY --------*/
   var quantity=document.getElementsByClassName('iquantity');
   var trial=document.getElementsByClassName('try');
   var theID=document.getElementsByClassName('Menu_id');


    for(i=0;i<iprice.length;i++)
      {
      
      $.ajax({    
        
        url: 'gupdateqty/'+theID[i].value, 
        method:'POST', 
        data: {quantity:quantity[i].value,"_token":"{{csrf_token()}}"},
        success: function(data){
        //  alert(data);
        }
      });  
      }
   
    });
 /*******************************REMOVE***************************************/    
     $(document).on('click','#remove',function() 
      {
       var mid=$(this).data("id");
       
            $.ajax({    
              
              url: 'gremovecart/', 
              method:'POST', 
              data: {cart_id:mid,"_token":"{{csrf_token()}}"},
              success: function(data){
                //$('#cartt').load(location.href + " #cartt");
               // alert(data);
               // location.reload();
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
      var $input = $(this).parents('.num-block').find('input.iquantity');
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
  var theID = $(this).data("id");
  //alert(Staff_ID);
    $('#checkoutmodal').modal('show');
  });


  date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("currdate").innerHTML = month + "/" + day + "/" + year;
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
 
      
      </script>

</body>

</html>


