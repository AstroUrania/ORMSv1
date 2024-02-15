@extends('master')
@section("content")

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
<style>
                  .subdetails{
                    font-size:2rem;
                    color: #747e71;
                    text-align: left;
                }
  </style>

      <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head> 

<body class="body-wrap">
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
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
                  @endif
                  
                </div>
  <!--------------FORM 1------------------->
  <form action="/Reservedrm" method="POST"  enctype="multipart/form-data">
    @csrf 

    <div class="column h-50 container py-5 order" style="margin:auto">
  
      <div class="card" style="border-radius: 5rem;padding-bottom:20px">
          <div class="order" id="order"> 
          <div class="row" style="padding:20px">
      <!------------ORDER FORM---------------->

       @foreach ($rooms as $rm)  
             <div class="card-body pb-3">
              <form role="form text-left">
                                    <div class="card-body pb-3">
                      <form role="form text-left">
           <!------------------- DP  ---------------------->
                <div class="text-center">
                <h2 style="margin:auto; font-size:50px; color:grey " class="SD mb-4">{{ $rm->RT_Name }}</h2>
                   <input type="hidden" name="rtd" id="rtd" value="{{ $rm->RT_ID }}">

                <img style="background-size: cover;" src="storage/RT/{{ $rm->RT_pic }}"  class="w-30 border-radius-lg shadow-sm" id="" alt="room photo"> <br>
                              
                            <h4 class="itotal d-flex mb-0" style="text-align:right; width:auto; font-size:3rem">
                            <p class="">Php.&nbsp;</p> 
                            <p class="" id="price" name="price" >{{ $rm->RT_Price }}</p>
                            <input type="hidden" name="iprice" id="iprice" value="{{ $rm->RT_Price }}">
                            </h4>
 
                            <h4 class="d-flex mb-0">
                            <p class="subdetails">Capacity: </p>
                            <p class="subdetails">{{ $rm->RT_Capacity }}</p>
                            <input type="hidden" name="cap" id="cap" value="{{ $rm->RT_Capacity }}">
                            </h4>
                            <h4 class="d-flex mb-0">
                              <a href="{{ $rm->allpics }}">Check out all the photos here</a>
                              <input type="hidden" name="allpics" id="allpics" value="{{ $rm->allpics }}">
                            </h4>

                            <h4 class="d-flex mb-0">
                            <p class="subdetails">{{ $rm->RT_Desc }}</p>
                            <input type="hidden" name="desc" id="desc" value="{{ $rm->RT_Desc }}">
                            </h4>

                             <!--PRICE-->                               
                            </h6>

                            <div class="heading">
                              <h2 style="border-top:2px solid green"></h2>
                              <h2> <span> Room Reservation Form </span></h>

                              </div>   
                        </div>
                      

                      @foreach ($users as $users)
                      <label>Customer Name</label>
                      <div class="input-group mb-3">
                      <input type="text" placeholder="Enter your name" value="{{$users->Customer_Name}}" id="name" name="name" class="form-control" required> 
                      </div>
                      <label>Contact Number</label>
                      <div class="input-group mb-3">
                        <input type="tel" id="num" name="num" value="{{$users->Cust_ContactNo}}" placeholder="09XXXXXXXXX" class="form-control" pattern="[0-9]{11}" required>
                      </div>
                      @endforeach

                        <label>Reservation Date and Time</label>
                        <div class="input-group mb-3">
                          <input type="datetime-local" required name="rdt" id="details" class="start form-control datelimit">
                        </div>
                        <label>End Date and Time</label>
                        <div class="input-group mb-3">
                          <input type="datetime-local" required name="edt" id="details" class="end form-control datelimit2">
                        </div>
                        <label>Companion Number</label>
                        <div class="input-group mb-3">
                          <input required type="number" id="cn" name="cn" max="{{ $rm->RT_Capacity }}" min="1" class="form-control">
                        </div>
                    
                        <label>Notes/Message</label>
                        <div class="input-group mb-3">
                        <textarea cols="20" placeholder="extra instructions" id="specs" name="specs" class="form-control">
                                </textarea>  
                      </div>
                        
                        <label>Mode of Payment</label>
                        <div class="selectcss mt-0">
                            <select class="form-control" onchange="mypay()" id="payvia" name="MOP" required>
                                <option value="">Mode of Payment:</option>
                                <option value="Cash">Cash</option>
                                <option value="Online Payment">Online Payment (Gcash)</option>
                            </select>
                            <div class="inputBox" style='display:none;' id='cashh'>
                              <p style="text-align:center; color:grey; max-width:90%;margin:auto">*Please make sure to save your Tracking Number upon placing your order/s. </p>
                            </div>
                            <div class="input-group m-3" style='display:none;' id='online'>
                                <div class="input-group mb-3 m-3">
                                  <p style="text-align:center; color:grey; max-width:90%;margin:auto">*Please make sure to save your Tracking Number and accomplish your online payment upon placing your order/s.</p>
                                
                                <br><br><label>Proof of Payment</label><br>
                                GCASH:09656009662<br>
                                </div>
                                <div class="input-group">
                                <label>Transfer Screenshot</label>
                                <div class="input input-group">
                                    <input class="payinput" type="file" id="proof"  name="proof" accept="image/*">
                                </div>
                                </div>
                            </div>
                        </div>
                  <label>Promo</label>
                   <div class="selectcss mt-0 order">
                    <select id="promo" class="form-control" name="promocode">
                        <option value="">Promo:</option>
                        @foreach ($promo as $promo)          
                        <option data-val="{{$promo->Promo_value}}" data-type="{{$promo->Promo_Type}}" value="{{$promo->Promo_Code}}">{{$promo->Promo_Name}}</option>
                        @endforeach
                     </select> 
                     </div>  
                            <div class="d-flex mb-0 ">
                                <h4 class="itotal">Number of Days:
                               <span class="days" name="days" id="days"></span></h4>
                               <input type="hidden" name="idays" id="idays">
                             </div>
                         <!--TOTAL----------->
                            <div class="d-flex mb-0">
                                 <h2 class="itotal"> Total: <span id="total" name="total"></span>         </h2>    
                                 <input type="hidden" name="itotal" id="itotal">
                                 <input type="hidden" name="gtotal" id="gtotal">
                                </div>
                         <!--TOTAL----------->
                         <div class="d-flex mb-0" id="spromo">
                          <h2 class="itotal"> Promo: <span id="dpromo" name="dpromo"></span>         </h2>    
                         </div>    
                                


                        <div class="text-center">
                          <button type="submit" onclick="return confirm('Once you have clicked - Reserve this room, you cannot edit your reservation details further. Are you sure you want to Reserve this room?');" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Reserve This Room</button>
                        </div>
                      </form>
                    </div>
                  </div>
              </form>
            @endforeach
            </div>
              
          </div>
      </div>
      </div>
       
</form>
  </main>
  
<script>
  
  $(document).on('change','#details',function(event) 
    {
        /*-------------- VARIABLES--------*/
            var theID=document.getElementById("rtd");
            var start=document.getElementsByClassName('start');
            var end=document.getElementsByClassName('end');
            var istart = Date.parse($(start).val()); //get timestamp
            var iend = Date.parse($(end).val()); //get timestamp
            var idays=document.getElementById("idays");
            var days=document.getElementById("days");
            var iprice=document.getElementById("iprice");
            var total=document.getElementById("total");
            var itotal=document.getElementById("itotal");//select value
            var gtotal=document.getElementById("gtotal");//select value

           // alert(theID.value);
           // alert(Math.floor((iend - istart) / 1000 / 60 / 60 / 24));
            //alert(Math.floor((Date.parse($(end).val()) - Date.parse($(start).val())) / 1000 / 60 / 60 / 24));


            var dayscounter=Math.floor((iend - istart) / 1000 / 60 / 60 / 24);
                  var dayscount=0
                  if (dayscounter == 0)
                  {
                    dayscount=1;
                  }
                  else
                  {
                    dayscount=dayscounter;
                  }

                 // alert(dayscount);
                  idays.value=dayscount;
                  days.textContent = idays.value;

                  //alert(iprice.value);
                  total.textContent=dayscount*iprice.value;
                  itotal.value=dayscount*iprice.value;
                  gtotal.value=dayscount*iprice.value;


        //To include promo on date change
        const selectElement = document.getElementById('promo');
        const selectedIndex = selectElement.selectedIndex;
        const selectedOption = selectElement.options[selectedIndex];
        const Value = selectedOption.getAttribute('data-val');
        const Type = selectedOption.getAttribute('data-type');
        //alert(`Selected option data value: ${Value}`);
        //alert(`Selected option data value: ${Type}`);

        if (Type=='Percentage Discount')
          {
          total.textContent = (itotal.value)-((itotal.value)*(Value/100));
          gtotal.value = (itotal.value)-((itotal.value)*(Value/100));
          }
          else if (Type=='Price Discount')
          {
          total.textContent = (itotal.value)-Value;
          gtotal.value = (itotal.value)-Value;
          }
    });

    $(document).on('change','#promo',function() 
    {
    const selectElement = document.querySelector('#promo');
    const selectedIndex = event.target.selectedIndex;
    const selectedOption = event.target.options[selectedIndex];
    const Value = selectedOption.getAttribute('data-val');
    const Type = selectedOption.getAttribute('data-type');
    //alert(`Selected option data value: ${Value}`);
    //alert(`Selected option data value: ${Type}`);

    if (Value !== null)
    {      
      $("#dpromo").show();
      dpromo.textContent = $('#promo option:selected').text();
    }
    else 
    {
      $("#dpromo").hide();
      //alert("no promo");
    }

    var total=document.getElementById("total");
    var itotal=document.getElementById("itotal");//select value
    var gtotal=document.getElementById("gtotal");//select value


    if (Type=='Percentage Discount')
    {
     total.textContent = (itotal.value)-((itotal.value)*(Value/100));
     gtotal.value = (itotal.value)-((itotal.value)*(Value/100));


    }
    else if (Type=='Price Discount')
    {
     total.textContent = (itotal.value)-Value;
     gtotal.value = (itotal.value)-Value;

    }

    });



//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);

$(document).ready(function(){ 
      $('#payvia').on('change', function() {
        if ( this.value == 'Cash')
        {
          $("#cashh").show();
          $("#online").hide();
          $("#Mastercard").hide();
          $("#Visacard").hide();
          document.getElementById("proof").required = false;//to not require field of proof of online payment 
          document.getElementById("mcname").required = false;//to not require field of proof of online payment 
          document.getElementById("mcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("mccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("mcdate").required = false;//to not require field of proof of online payment 
          document.getElementById("vcname").required = false;//to not require field of proof of online payment 
          document.getElementById("vcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("vccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("vcdate").required = false;//to not require field of proof of online payment 

        }
        else if ( this.value == 'Online Payment')
        {
          $("#cashh").hide();
          $("#online").show();
          $("#Mastercard").hide();
          $("#Visacard").hide(); 
          document.getElementById("proof").required = true;//to not require field of proof of online payment 
          document.getElementById("mcname").required = false;//to not require field of proof of online payment 
          document.getElementById("mcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("mccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("mcdate").required = false;//to not require field of proof of online payment 
          document.getElementById("vcname").required = false;//to not require field of proof of online payment 
          document.getElementById("vcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("vccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("vcdate").required = false;//to not require field of proof of online payment 
        }
        else if ( this.value == 'Mastercard Payment')
        {
          $("#cashh").hide();
          $("#online").hide();
          $("#Mastercard").show();
          $("#Visacard").hide();
          document.getElementById("proof").required = false;//to not require field of proof of online payment 
          document.getElementById("mcname").required = true;//to not require field of proof of online payment 
          document.getElementById("mcnum").required = true;//to not require field of proof of online payment 
          document.getElementById("mccvv").required = true;//to not require field of proof of online payment 
          document.getElementById("mcdate").required = true;//to not require field of proof of online payment 
          document.getElementById("vcname").required = false;//to not require field of proof of online payment 
          document.getElementById("vcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("vccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("vcdate").required = false;//to not require field of proof of online payment 
        }
        else if ( this.value == 'Visa credit card Payment')
        {
          $("#cashh").hide();
          $("#online").hide();
          $("#Mastercard").hide();
          $("#Visacard").show();
          document.getElementById("proof").required = true;//to not require field of proof of online payment 
          document.getElementById("mcname").required = false;//to not require field of proof of online payment 
          document.getElementById("mcnum").required = false;//to not require field of proof of online payment 
          document.getElementById("mccvv").required = false;//to not require field of proof of online payment 
          document.getElementById("mcdate").required = false;//to not require field of proof of online payment 
          document.getElementById("vcname").required = true;//to not require field of proof of online payment 
          document.getElementById("vcnum").required = true;//to not require field of proof of online payment 
          document.getElementById("vccvv").required = true;//to not require field of proof of online payment 
          document.getElementById("vcdate").required = true;//to not require field of proof of online payment 
        }
      });
  });
/* ---------------------- SELECT BOX ------------------------ */
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
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);


const now = new Date();
const future = new Date(now.setHours(now.getHours() + 1)).toISOString().slice(0, 16);
document.querySelector('.datelimit').min = future;
document.querySelector('.datelimit2').min = future;

//const future = new Date(now.getTime() + 30 * 60000).toISOString().slice(0, 16);
//document.querySelector('.datelimit').min = future;
const futuremax = new Date(now.setDate(now.getDate() + 30)).toISOString().slice(0, 16);
document.querySelector('.datelimit').max = futuremax;
document.querySelector('.datelimit2').max = futuremax;

</script>


</body>

@endsection


