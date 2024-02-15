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
  <form action="Reservedtb" method="POST">
    @csrf 

    <div class="column h-50 container py-5 order" style="margin:auto">
  
      <div class="card" style="border-radius: 5rem;padding-bottom:20px">
          <div class="order" id="order">
          <div class="row" style="padding:20px">

       @foreach ($tables as $tb)  
             <div class="card-body pb-3">
              <form role="form text-left">
                                    <div class="card-body pb-3">
                      <form role="form text-left">
           <!------------------- DP CHANGE ---------------------->
                <div class="text-center">
                <h2 style="margin:auto; font-size:50px; color:grey " class="SD mb-4">{{ $tb->RT_Name }}</h2>
                   <input type="hidden" name="rtd" id="rtd" value="{{ $tb->RT_ID }}">

                <img style="background-size: cover;" src="storage/RT/{{ $tb->RT_pic }}"  class="w-30 border-radius-lg shadow-sm" id="" alt="table photo"> <br>
                           <h4 class="d-flex mb-0" style="font-weight:bold">
                            <p class="subdetails">Capacity: </p>
                            <p class="subdetails">{{ $tb->RT_Capacity }}</p>
                            <input type="hidden" name="cap" id="cap" value="{{ $tb->RT_Capacity }}">
                            </h4>

                            <h4 class="d-flex mb-0">
                            <p class="subdetails">{{ $tb->RT_Desc }}</p>
                            <input type="hidden" name="desc" id="desc" value="{{ $tb->RT_Desc }}">
                            </h4>

                             <!--PRICE-->                               
                            </h6>

                            <div class="heading">
                              <h2 style="border-top:2px solid green"></h2>
                              <h2> <span> Table Reservation Form </span></h>

                              </div>   
                        </div>
                        <label>Reservation Date and Time</label>
                        <div class="input-group mb-3">
                          <input type="datetime-local" required name="rdt" id="rdt" class="form-control">
                        </div>
                        <label>End Date and Time</label>
                        <div class="input-group mb-3">
                          <input type="datetime-local" required name="edt" id="edt" class="form-control">
                        </div>
                        <label>Companion Number</label>
                        <div class="input-group mb-3">
                          <input required type="number" id="cn" name="cn" max="{{ $tb->RT_Capacity }}" min="1" class="form-control">
                        </div>
        
                        <label>Notes/Message</label>
                        <div class="input-group mb-3">
                          <input type="text" placeholder="extra instructions" id="specs" name="specs" class="form-control">
                        </div>

                        <div class="text-center">
                          <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Reserve This table</button>
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
  

//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);

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


</script>


</body>

@endsection


