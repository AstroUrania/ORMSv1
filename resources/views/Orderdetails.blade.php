@extends('master')
@section("content")
<?php use App\Http\Controllers\guestscontroller; 


// Set the new timezone
date_default_timezone_set('Asia/Manila');
$currdate = date('d-m-y h:i:s');

//$currdate = date('d-m-y h:i:s', strtotime('+30 minutes'));

//echo $date;

?>
    <head>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
       <style>
        * {
          box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
          float: left;
          width: 50%;
        } 

        /* Clear floats after the columns */
        .row:after {
          content: "";
          display: table;
          clear: both;
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 1000px) {
          .column {
            width: 95%;
          }
        }

        .inp{
         width: 100%;
         border: solid 1px rgb(85 183 107);
         border-radius: 0.5rem;
        padding: 1rem;
        font-size: 1.6rem;
        color: var(--black);
        text-transform: none;
        margin-bottom: 1rem;
         width: 100%;
        }

        label{
          font-weight: 20
        }

        .foodpanda{
          border-radius: 1rem; border: 
          1px solid green;display:block;margin:auto;
          width:90%;
        }
        .foodpanda:hover{
          border-radius: 1rem; border: 
          2px solid rgb(59, 236, 59);display:block;margin:auto;
          width:95%;
        }
        </style>
    </head>
    <!--body class="bodybg"style="background-image: url('image/bg.jpg');"-->
    <body class="bodybg">        

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

      <form action="/placeorder" method="POST" enctype="multipart/form-data">
        @csrf
 
    <table class="body-wrap">
      <tbody><tr>
          <td>
            </td>
          <td class="row">
          <div id="orderform" class="tabcontent column h-50 container py-5 order">
          <!--div class="row" style="justify-content:center">
         <div class="card" style="border-radius:1rem; width:8rem; height:5rem;margin-right:10px"></div>
         <div class="card" style="border-radius:1rem; width:8rem; height:5rem;margin-left:10px"></div>
          </div-->
          <div class="card" style="border-radius: 5rem;padding-bottom:20px">
                  <div class="order" id="order">
                  <div class="row" style="padding:20px">
              <!--h3 class="sub-heading"> order now </h3-->
              <div style="position:absolute" >
                        <a href="/cart" style="font-size:50px; color: #9ba99e" ><i class="fa fa-chevron-circle-left"></i></a>
                      </div>
              <!------------ORDER FORM---------------->
              <div class="heading">
              <h1> <span> Order Form </span></h1>
              </div>       
              
                      <div class="inputBox">
                          <div class="input">
                              <span>Claim Type</span>
                          <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                          <div class="selectcss">
                              <select id='claimvia' style="width:100%" name="claimvia" class="claimvia" required>
                                <option value="">Claim Type:</option>
                                <option value="Delivery">Delivery</option>
                                <option value="Pick-up">Pick-up</option>
                                <option value="Dine-in">Dine-in</option>
                              </select>
                              
                              <div style='display:none;' id='delivery'>
                                <p style="text-align:center; color:grey; max-width:90%;margin:auto">* Delivery option in this website is under maintenance. 
                                                                                                       For the mean time, you may proceed to order from our food panda page:<br><br></p>
                                  <a href="https://www.foodpanda.ph/restaurant/h9jf/balaw-balaw-restaurant-dona-justa-subdivision">
                                  <img class="foodpanda" alt="Foodpanda Website" src="storage/Delivery/foodpanda.png" >
                                  </a>
                                  <!--div class="input">
                                      <span>date and time</span>
                                      <input type="datetime-local" id="date" name="date">
                                  </div>
                                  <div class="input">
                                      <span>your address</span>
                                      <--textarea id="address" name="address" placeholder="enter your address" cols="30" rows="10"></textarea>
                                      <div class="form-group">
                                      <input type="number" class="form-control" id="houseno" name="houseno" placeholder="House #">
                                      <input type="text" class="form-control" id="street" name="street" placeholder="Street">
                                      <input type="text" class="form-control" id="baranggay" name="baranggay" placeholder="Baranggay">
                                      <input type="text" class="form-control" id="inputCity" name="city" placeholder="City">
                                      <input type="text" class="form-control" id="inputZip" name="zip" placeholder="Zip">
                                      <input type="text" class="form-control" id="inputprovince" name="province"  placeholder="Province">
                                      <input type="text" class="form-control" id="InputRegion" name="region"  placeholder="region">
                                    </div>

                                  </div-->
          
                              </div>
                              <div style='display:none;' id='pickup'>
                                  <div class="input">
                                      <span>date and time</span>
                                      <input type="datetime-local" class="datelimit" id="date2" name="date">
                                    </div>
          
                              </div>
                                           
                              <div style='display:none;' id='dinein'>
                                  <div class="input">
                                      <span>Tracking number of Reservation</span>
                               <select id='tracking' style="width:100%" name="tracking" class="claimvia" >
                                <option value="">Tracking Number:</option>
                                @foreach($res as $res)
                                <option value="{{$res->Tracking_No}}">{{$res->Tracking_No}} - {{$res->RT_type}}{{$res->RT_ID}}</option>
                                @endforeach
                              </select>
                                  </div>
                                  
                               <P style="text-align:center; color:grey;margin:auto">*Tracking numbers can be acquired once you have made a room or table reservation.</P>
          
                              </div>
                          </div>
                            
                          </div>
                      </div>
                      
                      <div id="deliv">
                       <div class="inputBox">
          
                       @foreach ($user as $user)
                      <div class="input" id="delivery dinein">
                          <span>Your name</span>
                          <input type="text" required id="name" name="name" value="{{$user->Customer_Name}}" placeholder="enter your name">
                      </div>
                      <div class="input">
                          <span>Your contact number</span>
                          <input type="tel" id="number" name="number" value="{{$user->Cust_ContactNo}}" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" required>
                      </div>
                      <div class="input">
                          <span>Your email address</span>
                          <input type="email" required name="email" value="{{$user->Cust_EmailAdd}}" placeholder="customer@email.com" class="form-control" id="email" aria-describedby="emailHelp">
                      </div>
                      @endforeach
                      <div class="input">
                          <span>Specifications</span>
                          <textarea placeholder="extra instructions" id="specs" name="specs" cols="30" rows="5"></textarea>
                      </div></div>
                      
                        <P style="text-align:center; color:grey;margin:auto">*Please make sure to fill up all required fields before proceeding to payment.</P>

                      <div class="inputBox" style="justify-content:center">
                          <!--button class="btn" onclick="topay()">Proceed to Payment</button-->
                          <button type="button" class="btn tablink" onclick="topay()">Proceed to Payment</button>
                          </div> 
                        </div>
                          
                    </div>
                      
                  </div>
              </div>
              </div>

            <div id="paymentform" class="tabcontent content column" style="display:none">
              <table class="main" width="100%" cellpadding="0" cellspacing="0">
                <tbody><tr>
                <!--tr class="alignleft">
                          <a href="#" class="backbtn"><h1><</h1></a>
                        </tr-->
                <td class="content-wrap aligncenter">
                   <table width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
                         <tr>
                          <td class="content-block">
                        <table class="invoice">
                             <tbody><tr>
                                        <!--h3 class="sub-heading"> order now </h3-->
                      <div style="position:absolute" >
                      <button type="button" style="font-size:50px; color: #9ba99e; background:none" onclick="todetails()"><i class="fa fa-chevron-circle-left"></i></button>

                      </div>
                          <!------------ORDER FORM---------------->
                          <div class="heading">
                            <h1> <span> Payment Form </span></h1>
                            </div> 
                            </tr>
                              <tr>
                                <td class="content-block"></td>
                             </tr>
                              <tr>
                          <p id="currdate"></p></td>
                         </tr>
                        <tr>
                      <td>
                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                       <tbody>
                        <div id="invoice">
                        <?php $total=0 ?>
                        @foreach ($cart as $item)
                        <tr>
                       <td>{{$item->Menu_Name}}(x{{$item->quantity}})</td>
                          <!--td class="alignright">{{$item->Menu_Price}}</td-->
                          <td class="alignright">{{$item->Menu_Price*$item->quantity}}</td>
                          <?php $total=$total+($item->Menu_Price*$item->quantity)?>
                            </tr>
                             @endforeach
                               <tr class="">
                                  <td style="width:80%">Promo</td>
                                  <td class="alignright"><span class="dpromo" name="dpromo" id="dpromo"></span></td>
                                </tr>                            
                               <tr class="total">
                               <td style="width:80%">Total</td>
                                <td id="itotal" class="alignright itotal">{{$total}}</td>
                                <input type="hidden" name="dtotal" id="dtotal" value="{{$total}}">

                               </tr>
                              </div>
                      </tbody>
                      </table>
                               </td>
                               </tr>
                               </tbody></table>
                               </td>
                                  </tr>

                                  <tr>
                                    <td>
                                      
                                        <div>
                                        <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                                        <div class="selectcss order">
                                            <select id='payvia' style="width:100%;border: solid 1px rgb(85 183 107); margin-bottom:10px" name="MOP" value="payment"required>
                                              <option value="">Mode of Payment:</option>
                                              <option value="Cash">Cash</option>
                                              <option value="Online Payment">Online Payment</option>
                                              <!--option value="Mastercard Payment">Mastercard Payment</option>
                                              <option value="Visa credit card Payment">Visa credit card Payment</option-->

                                            </select>
                                              <div class="inputBox" style='display:none;' id='cashh'>
                                                <p style="text-align:center; color:grey; max-width:350px;margin:auto">*Please make sure to save your Tracking Number upon placing your order/s. </p>
                                              </div>

                                            <div class="inputBox" style='display:none;' id='online'>
                                              <p style="text-align:center; color:grey; max-width:350px;margin:auto">*Please make sure to save your Tracking Number and accomplish your online payment upon placing your order/s. 
                                             <br><br><label>Proof of Payment</label><br>
                                              <div class="input">
                                                GCASH:09656009662<br></p>
                                                  <input type="file" id="proof"  name="proof" placeholder="upload proof of payment" class="form-control">
                                              </div>

                                            <div class="inputBox" style='display:none;' id='Mastercard'>
                                              <label>Name on Card</label>
                                              <div class="input">
                                              <input type="text" id="mcname"  name="mcname">
                                              </div>

                                              <label>Master card Number</label> 
                                              <div class="input">
                                              <input  class="payinput" type="text" id="mcnum" name="mcnum" placeholder="1111-2222-3333-4444" pattern="^5[1-5][0-9]{14}$|^2(?:2(?:2[1-9]|[3-9][0-9])|[3-6][0-9][0-9]|7(?:[01][0-9]|20))[0-9]{12}$">
                                              </div>

                                              <label>CVV</label>
                                              <div class="input">
                                              <input type="text" id="mccvv" name="mccvv" placeholder="123" pattern="\d{3}" title="must be 3 digit">
                                              </div>

                                              <label>Exp Date</label>
                                              <div class="input">
                                              <input type="date" id="mcdate" name="mcdate">
                                              </div>
                                            </div>

                                            <div class="inputBox" style='display:none;' id='Visacard'>
                                            <label>Name on Card</label>  
                                            <div class="input">
                                                  <input type="text" id="vcname"  name="vcname">
                                              </div>
                                              
                                              <label>Visa card Number</label>
                                              <div class="input">
                                              <input  class="payinput"  type="text" id="vcnum" name="vcnum" placeholder="2222-3333-4444" pattern="^4[0-9]{12}(?:[0-9]{3})?$">
                                              </div>
                                              
                                              <label>CVV</label>
                                              <div class="input">
                                              <input type="text" id="vccvv" name="vccvv" placeholder="123" pattern="\d{3}" title="must be 3 digit">
                                              </div>
                                            
                                            <p>Exp Date</p>
                                            <div style="width:100%">
                                              <div class="input">            
                                              <input type="date" id="vcdate" name="vcdate">
                                              </div>
                                            </div>
                                            </div>
                                      </div>
                                      </div>
                                      <!--label>Promo Code</label>
                                      <div>
                                        <input class="selectcss" style="width:50%; border: solid 1px rgb(85 183 107)" type="text" placeholder="Promo Code" id="promocode" name="promocode">
                                      </div-->

                                  <div class="selectcss order">
                                    <select id="promo" style="width:100%;border: solid 1px rgb(85 183 107); margin-bottom:10px" name="promocode">
                                    <option value="">Promo:</option>
                                    @foreach ($promo as $promo)          
                                    <option data-val="{{$promo->Promo_value}}" data-type="{{$promo->Promo_Type}}" value="{{$promo->Promo_Code}}">{{$promo->Promo_Name}}</option>
                                    @endforeach
                                    </select>
                                    
                                    </div>  
                                    </div>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td class="content-block" >
                                      <input type="submit" onclick="return confirm('Once you have clicked - Place Order, you cannot edit your order details further. Are you sure you want to Place your order?');" value="Place order">
                                      
                                      <p style="text-align:center; color:grey; max-width:350px;margin:auto">*Please make sure to fill all required fields in the Order and Payment form before placing your order. </p>
                                  </td>
                                  </tr>
                                  <tr>
                                      <td class="content-block">
                                        BALAW BALAW Restaurant and Art Museum since 1983.<br>
                                        11 Doña Justa Subd. brgy san roque Angono, Rizal
                                      </td>
                                  </tr>
                              </tbody>
                            
                            </table></div>
                          </td>
                      </tr>
                  </tbody></table> 

 

</form>
<script>
  date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("currdate").innerHTML = month + "/" + day + "/" + year;

//const now = new Date().toISOString().slice(0, 19);
//document.querySelector('.datelimit').min = now;
const now = new Date();
const future = new Date(now.setHours(now.getHours() + 1)).toISOString().slice(0, 16);
document.querySelector('.datelimit').min = future;
//const future = new Date(now.getTime() + 30 * 60000).toISOString().slice(0, 16);
//document.querySelector('.datelimit').min = future;
const futuremax = new Date(now.setDate(now.getDate() + 30)).toISOString().slice(0, 16);
document.querySelector('.datelimit').max = futuremax;


  $(document).ready(function(){ 
      $('#payvia').on('change', function() {
        if ( this.value == 'Cash')
        {
          $("#cashh").show();
          $("#online").hide();
          $("#Mastercard").hide();
          $("#Visacard").hide();
          document.getElementById("proof").required = false;//to not require f
          document.getElementById("mcname").required = false;//to not require 
          document.getElementById("mcnum").required = false;//to not require 
          document.getElementById("mccvv").required = false;//to not require 
          document.getElementById("mcdate").required = false;//to not require 
          document.getElementById("vcname").required = false;//to not require 
          document.getElementById("vcnum").required = false;//to not require 
          document.getElementById("vccvv").required = false;//to not require  
          document.getElementById("vcdate").required = false;//to not require

        }
        else if ( this.value == 'Online Payment')
        {
          $("#cashh").hide();
          $("#online").show();
          $("#Mastercard").hide();
          $("#Visacard").hide(); 
          document.getElementById("proof").required = true;//to not require
          document.getElementById("mcname").required = false;//to not require 
          document.getElementById("mcnum").required = false;//to not require 
          document.getElementById("mccvv").required = false;//to not require
          document.getElementById("mcdate").required = false;//to not require  
          document.getElementById("vcname").required = false;//to not require  
          document.getElementById("vcnum").required = false;//to not require field 
          document.getElementById("vccvv").required = false;//to not require field  
          document.getElementById("vcdate").required = false;//to not require field
        }
        else if ( this.value == 'Mastercard Payment')
        {
          $("#cashh").hide();
          $("#online").hide();
          $("#Mastercard").show();
          $("#Visacard").hide();
          document.getElementById("proof").required = false;//to not require field of proo
          document.getElementById("mcname").required = true;//to not require field of
          document.getElementById("mcnum").required = true;//to not require field 
          document.getElementById("mccvv").required = true;//to not require field 
          document.getElementById("mcdate").required = true;//to not require field o
          document.getElementById("vcname").required = false;//to not require field
          document.getElementById("vcnum").required = false;//to not require field
          document.getElementById("vccvv").required = false;//to not require field
          document.getElementById("vcdate").required = false;//to not require field
        }
        else if ( this.value == 'Visa credit card Payment')
        {
          $("#cashh").hide();
          $("#online").hide();
          $("#Mastercard").hide();
          $("#Visacard").show();
          document.getElementById("proof").required = true;//to not require field 
          document.getElementById("mcname").required = false;//to not require field 
          document.getElementById("mcnum").required = false;//to not require field 
          document.getElementById("mccvv").required = false;//to not require field 
          document.getElementById("mcdate").required = false;//to not require field 
          document.getElementById("vcname").required = true;//to not require field
          document.getElementById("vcnum").required = true;//to not require field 
          document.getElementById("vccvv").required = true;//to not require field 
          document.getElementById("vcdate").required = true;//to not require field of
        }
      });
  });
  /*___________________________FOR COMBO BOX_______________________________*/
  
  $(document).ready(function(){
      $('#claimvia').on('change', function() {
        if ( this.value == 'Delivery')
        {
          $("#deliv").hide();
          $("#delivery").show();
          $("#dinein").hide();
          $("#pickup").hide();
          //document.getElementById("date").required = true;//to not require 
          //document.getElementById("date2").required = false;//to not require field 
          //document.getElementById("address").required = true;//to not require field
        //  document.getElementById("tracking").required = false;//to not require field
  
        }
        else if ( this.value == 'Pick-up')
        {
          $("#deliv").show();
          $("#pickup").show();
          $("#delivery").hide();
          $("#dinein").hide();
          //document.getElementById("date").required = false;//to not require field of
          document.getElementById("date2").required = true;//to not require field of 
         // document.getElementById("address").required = false;//to not require field
          document.getElementById("tracking").required = false;//to not require field 
        }
        else if ( this.value == 'Dine-in')
        {
          $("#deliv").show();
          $("#dinein").show();
          $("#delivery").hide();
          $("#pickup").hide();
          
        //  document.getElementById("date").required = false;//to not require field
          document.getElementById("date2").required = false;//to not require field 
       //   document.getElementById("address").required = false;//to not require field
          document.getElementById("tracking").required = true;//to not require field
        }
      });
  });
  
      var x, i, j, l, ll, selElmnt, a, b, c;
      /*look for any elements with the class "custom-select":*/
      x = document.getElementsByClassName("custom-select");
      l = x.length;
      for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
          /*for each option in the original select element,
          create a new DIV that will act as an option item:*/
          c = document.createElement("DIV");
          c.innerHTML = selElmnt.options[j].innerHTML;
          c.addEventListener("click", function(e) {
              /*when an item is clicked, update the original select box,
              and the selected item:*/
              var y, i, k, s, h, sl, yl;
              s = this.parentNode.parentNode.getElementsByTagName("select")[0];
              sl = s.length;
              h = this.parentNode.previousSibling;
              for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                  s.selectedIndex = i;
                  h.innerHTML = this.innerHTML;
                  y = this.parentNode.getElementsByClassName("same-as-selected");
                  yl = y.length;
                  for (k = 0; k < yl; k++) {
                    y[k].removeAttribute("class");
                  }
                  this.setAttribute("class", "same-as-selected");
                  break;
                }
              }
              h.click();
          });
          b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
          });
      }
      function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
          if (elmnt == y[i]) {
            arrNo.push(i)
          } else {
            y[i].classList.remove("select-arrow-active");
          }
        }
        for (i = 0; i < xl; i++) {
          if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
          }
        }
      }


  
    /*  $(document).ready(function(){
      $('#topay').on('click', function() {

          $("#Paymentform").show();
          $("#Orderform").hide();
      });
  });*/

function topay() {
   
     if (confirm("Please make sure all required fields are filled up before proceeding to payment. Click OK if you have provided all necessary details")) {
    $("#paymentform").show();
    $("#orderform").hide();
      }
    
      }

  function todetails() {
    $("#orderform").show();
    $("#paymentform").hide();
      }




      /*if the user clicks anywhere outside the select box,
      then close all select boxes:*/
      document.addEventListener("click", closeAllSelect);
      
      
/*--------------------PROMO---------------------*/
$(document).on('change','#promo',function() 
    {
    const selectElement = document.querySelector('#promo');

    const selectedIndex = event.target.selectedIndex;
    const selectedOption = event.target.options[selectedIndex];
    const Value = selectedOption.getAttribute('data-val');
    const Type = selectedOption.getAttribute('data-type');
   // alert(`Selected option data value: ${Value}`);
   // alert(`Selected option data value: ${Type}`);
 //   dpromo.textContent = $('#promo option:selected').text();

    var itotal=document.getElementById("itotal");//select value
    var dtotal=document.getElementById("dtotal");//select value

   // alert(dtotal.value);
    //alert(Value);
    if (Value==null)
    {
      dpromo.textContent = "";

      itotal.textContent=dtotal.value;
    }
    else
    {
      dpromo.textContent = $('#promo option:selected').text();

       if (Type=='Percentage Discount')
    {
      //itotal.textContent = "Percentage Disc";
     itotal.textContent= (dtotal.value)-((dtotal.value)*(Value/100));

    }
    else if (Type=='Price Discount')
    {
      //itotal.textContent= 'Price Disc';
     itotal.textContent= (dtotal.value)-Value;
    }
    }
   

    });

      </script>
    </body>
    
    </div>

    @endsection