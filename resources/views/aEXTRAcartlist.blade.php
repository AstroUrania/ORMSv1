@extends('master')
@section("content")

    <head>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
       
    </head>
    <!--body class="bodybg"style="background-image: url('image/bg.jpg');"-->
    <body class="bodybg">        

    <form action="ordernow" method="GET">
        @csrf
      
    <div class="flex-container">

    <div class="flexchildren">
      <div class="custom" style="width:350px">
        <div class="dishes2" id="dishes">
           <h1 class="heading"> CART </h1>
              <div class="box-container">
                @php $subtotal @endphp
                 @foreach ($cart as $item)
                <div class="box">
                  
                     <img class="imgs" src="{{$item->Menu_pic}}" alt="">
                     <h3>{{$item->Menu_Name}}</h3> 
                     <p style="font-size:12px">{{$item->Menu_Desc}}</p>
                     <div class="qtyprice">

                      <!--quantity-->
                      <label>Qty:</label>
                      <input class="qtyinput iquantity" value="{{$item->quantity}}" onchange="subTotal()" type="number" name="quantity" id="iquantity" min="1" max="50" >

                      <!--subtotalprice-->
                      <label>subtotal:</label>
                            <span class="itotal" name="subtotal">{{$item->Menu_Price}}</span>
                      <!--Menuprice
                      <span style="font-size:20px;" id="Menu_Price">{{$item->Menu_Price}}</span>-->
                      <input class="iprice" value="{{$item->Menu_Price}}"  id="iprice" type="hidden" name="price">
           <input class="Menu_ID" value="{{$item->Menu_ID}}"  id="Menu_ID" type="hidden" name="Menu_ID">
                    </div>
                     <a href="/removecart/{{$item->cart_id}}" class="right" onclick="Alert()" >Remove from cart</a>       
                    </div>
                 @endforeach
           </div>
        </div>
      </div>
    </div>
    
    <div class="flexchildren">
                
        <div class="order" id="order">

    <!--h3 class="sub-heading"> order now </h3-->
    <h1 class="heading"> Order Form </h1>
    <!--td class="alignright" id="gtotal">Grand Total: ₱ {{$total}}</td-->
    <label>Grand Total: ₱</label>
    
    <span class="alignright" id="gtotal" name="gtotal">Grand Total: ₱ {{$total}}</span>
    <input class="gtot" value="{{$total}}"  id="gt" type="hidden" name="gt">

            
            <div class="inputBox" >
                <div class="input">
                    <span>Claim Type</span>
                <!--surround the select box with a "custom-select" DIV element. Remember to set the width:-->
                <div class="selectcss">
                    <select id='claimvia' style="width:100%" name="claimvia" required>
                      <option value="">Claim Type:</option>
                      <option value="Delivery">Delivery</option>
                      <option value="Pick-up">Pick-up</option>
                      <option value="Dine-in">Dine-in</option>
                    </select>
                    
                    <div style='display:none;' id='delivery'>
                        <div class="input">
                            <span>date and time</span>
                            <input type="datetime-local" id="date" name="date">
                        </div>
                        <div class="input">
                            <span>your address</span>
                            <textarea id="address" name="address" placeholder="enter your address" cols="30" rows="10"></textarea>
                        </div>

                    </div>
                </div>
                  
                </div>
            </div>
            
             <div class="inputBox">

                
            <div class="input" id="delivery dinein">
                <span>Your name</span>
                <input style="background-color:rgb(219, 237, 223);"type="text" required id="name" name="name" placeholder="enter your name">
            </div>
            <div class="input">
                <span>Your number</span>
                <input type="tel" id="number" name="number" placeholder="09XXXXXXXXX" pattern="[0-9]{11}" required>
            </div>
            <div class="input">
                <span>Specifications</span>
                <textarea placeholder="extra instructions" id="specs" name="specs" cols="30" rows="5"></textarea>
            </div></div>
            <input type="submit" value="Order Now">
            <!--a class="btn" href="ordernow"> Order Now</a-->
            
        </div>
    </div>
    </div>
</form>

    <!------------------------------------------->

    <div class="card bg-primary text-white rounded-3">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h5 class="mb-0">Card details</h5>
          <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp"
            class="img-fluid rounded-3" style="width: 45px;" alt="Avatar">
        </div>

        <p class="small mb-2">Card type</p>
        <a href="#!" type="submit" class="text-white"><i
            class="fab fa-cc-mastercard fa-2x me-2"></i></a>
        <a href="#!" type="submit" class="text-white"><i
            class="fab fa-cc-visa fa-2x me-2"></i></a>
        <a href="#!" type="submit" class="text-white"><i
            class="fab fa-cc-amex fa-2x me-2"></i></a>
        <a href="#!" type="submit" class="text-white"><i class="fab fa-cc-paypal fa-2x"></i></a>

        <form class="mt-4">
          <div class="form-outline form-white mb-4">
            <input type="text" id="typeName" class="form-control form-control-lg" siez="17"
              placeholder="Cardholder's Name" />
            <label class="form-label" for="typeName">Cardholder's Name</label>
          </div>

          <div class="form-outline form-white mb-4">
            <input type="text" id="typeText" class="form-control form-control-lg" siez="17"
              placeholder="1234 5678 9012 3457" minlength="19" maxlength="19" />
            <label class="form-label" for="typeText">Card Number</label>
          </div>

          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-outline form-white">
                <input type="text" id="typeExp" class="form-control form-control-lg"
                  placeholder="MM/YYYY" size="7" id="exp" minlength="7" maxlength="7" />
                <label class="form-label" for="typeExp">Expiration</label>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline form-white">
                <input type="password" id="typeText" class="form-control form-control-lg"
                  placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3" />
                <label class="form-label" for="typeText">Cvv</label>
              </div>
            </div>
          </div>

        </form>

        <hr class="my-4">

        <div class="d-flex justify-content-between">
          <p class="mb-2">Subtotal</p>
          <p class="mb-2">$4798.00</p>
        </div>

        <div class="d-flex justify-content-between">
          <p class="mb-2">Shipping</p>
          <p class="mb-2">$20.00</p>
        </div>
      </div></div>
    <!--------------------------------------------->


<script>
/*___________________________FOR SUBTOTALS_______________________________*/
var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtot=document.getElementsByClassName('gtot');
var gtotal=document.getElementById('gtotal');
function subTotal()
{
  gt=0;
  for(i=0;i<iprice.length;i++)
  {
    itotal[i].textContent=(iprice[i].value)*(iquantity[i].value);
    gt=gt+(iprice[i].value)*(iquantity[i].value)
  }
  return gtotal.textContent=gt;
  return gtot.value=gt
  return itotal[i];

}

subTotal();

/*___________________________FOR ALERT MESSAGE_______________________________*/
function Alert() {
  alert("Item Removed from Cart!");
}

/*___________________________FOR COMBO BOX_______________________________*/

$(document).ready(function(){
    $('#claimvia').on('change', function() {
      if ( this.value == 'Delivery')
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
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
    </script>
    </body>
    
    </div>

    @endsection