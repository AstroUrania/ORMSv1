@extends('master')
@section("content")

<?php 
use App\Http\Controllers\MenuController;
$carttotal=0;
if(Session::has('user'))
{
  $carttotal=MenuController::cartitem();
}
elseif(Session::has('guests'))
{
  $carttotal=MenuController::cartitem();
}

?>
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
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

/* / skin 1 */


</style>
    
    
      </head>
    
    <body class="bodybg">   
          <!--------------ALERT------------------->    
    <div id="alert">

      @if(Session::has('success')) 
        <div class="alert alert-good alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('success')}}</strong>
        </div>

        @elseif(Session::has('warning')) 
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('warning')}}</strong>
        </div>

        @elseif(Session::has('error')) 
        <div class="alert alert-bad alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>    
            <strong>{{ Session::get('error')}}</strong>
        </div>
        @endif
        
      </div>
    <form action="checkout" method="GET">
        @csrf

      <!--DIV-->
      <div class="align-items-center">
      <div class="container py-5 h-50 order">
      <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col" style="padding-bottom:100px;">
      
      <div class="card" style="border-radius: 5rem;">
      <div class="card-body p-4">
      <div class="row" style="padding:20px">
      <div>
      <!--CART SUB-->
        <div style="margin-bottom:30px; display:flex; flex:nowrap; justify-content:space-between;" >
              <a href="/" style="font-size:50px; color: #9ba99e" ><i class="fa fa-chevron-circle-left"></i></a>
              <p  style="margin:10px; margin-top:30px; color:green" class="m b-0">You have {{ $carttotal }} item/s in your cart</p>
            </div>
        <!--CART HEADER-->
        <div class="heading">
        <h1><Span>My Cart</span></h1>
        </div>
            
      <!--------------------  FOREACH CART --------------------------->
          @php $subtotal @endphp
            @foreach ($cart as $item)
            <div class="mb-3" style="border-top:1px solid #878686;">
              <div id="hai" class="card-body" style="padding:15px">
                <div class="d-flex justify-content-around" style="margin:10px">
              <!--#1 IMAGE ITEM GROUP---------------------------------------->
                  <div class="d-flex flex-row align-items-center">
                    <!--IMAGE-->
                    <div style="min-width:65px">  
                      <img src="storage/Menupics/{{$item->Menu_pic}}"class="avatar avatar-lg me-3 rounded-3" alt="Food item" style="width:80px;height:80px">
                    </div>
                    <!--NAME & DESCRIPTION-->
                    <div class="ms-3"style="max-width:500px; padding-left:20px">
                      <h4 style="margin-right:20px;">{{$item->Menu_Name}}</h4>
                      <p style="font-size:12px; height:70px;overflow:scroll;">{{$item->Menu_Desc}}</p>
                    </div>
                    </div>

                  <!--#2 PRICE QUANTITY GROUP-------------------------------------->
                  <div class="d-flex flex-row align-items-center justify-content-between"> 
                  <!--QUANTITY-->
                  <!--a class="fa fa-minus-circle" id="minus"  style="font-size:20px"></a>
                    <input class="iquantity" value="{{$item->quantity}}" type="number" name="quantity" id="iquantity" min="1" max="50" style="width:30px;" >
                    <a class="fa fa-plus-circle" id="plus" style="font-size:20px"></a-->
                    
                    <div class="num-block skin-1">
                      <div class="num-in">
                        <span class="minus dis"></span>
                        <input class="iquantity" value="{{$item->quantity}}" type="number" name="quantity" id="iquantity" min="1" max="50" style="width:50px;" >
                        <span class="plus"></span>
                      </div>
                    </div>
                    <input class="Menu_id" value="{{$item->Menu_ID}}"  id="Menu_id" type="hidden" name="Menu_id">
                  
                    
                    <!--PRICE-->
                    <div>
                      <h5 class="mb-3">
                          <span class="itotal" name="subtotal">{{$item->Menu_Price*$item->quantity}}</span>
                          <input class="iprice" value="{{$item->Menu_Price}}"  id="iprice" type="hidden" name="price">
                      </h5>
                    </div>
                    <!--REMOVE-->
                    <a href="/removecart/{{$item->cart_id}}" onclick="return confirm('Are you sure you want to delete this item?');" style="color:#ff5c5c; width: 20px;" class="fa fa-trash">
                    </a>      
                    <!--input class="try" name="try" id="try" type="number"></input-->
                  </div>
                </div>
              </div>
            </div>
           @endforeach
            <!--td class="alignright" id="gtotal">Grand Total: ₱ {{$total}}</td-->
                        <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1fee9;">
                          <!--h5 class="fw-bold mb-0">Grand Total:</h5-->
                          <label>Grand Total: ₱</label>
                          <h5 class="fw-bold mb-0" id="gtotal" name="gtotal" ></h5>
                          <input class="gtot"  id="gt" type="hidden" name="gt"></span>
                        </div>

            <input type="submit" value="Checkout">
            <!--a class="btn" href="ordernow"> Order Now</a-->

          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
        </div>
                
          </form>
<script>
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
      
/*---------- SET SUBTOTALS AND GRAND TOTAL ONCHANGE------------
$(document).on('input','#iquantity',function() 
{
    gt=0;
      for(i=0;i<iprice.length;i++)
      {
        itotal[i].textContent=(iprice[i].value)*(iquantity[i].value);
        gt=gt+(iprice[i].value)*(iquantity[i].value)
      }
   
    gtotal.textContent = gt;
   
});*/

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
        //trial[i].value=theID[i].value;
       // trial[i].value=quantity[i].value;
       // alert(theID[i].value)
      
      $.ajax({    
        
        url: 'updateqty/'+theID[i].value, 
        method:'POST', 
        data: {quantity:quantity[i].value,"_token":"{{csrf_token()}}"},
        success: function(data){
          //alert(data);
        }
      });  
      }
   
});
 /*******************************************************************    
    ALERT MESSAGE 
    function Alert() {
      alert("Item Removed from Cart!");
    }***/

    //ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);
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

function Alert() {
  let text = "Press a button!\nEither OK or Cancel.";
  if (confirm(text) == true) {
    text = "You pressed OK!";
  } else {
    text = "You canceled!";
  }
  document.getElementById("demo").innerHTML = text;

    }


</script>
    </body>

    @endsection