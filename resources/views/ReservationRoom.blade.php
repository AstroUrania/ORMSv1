@extends('master')
@section("content")
<style>


</style>
    <head>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">


                <!-- Jquery -->
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <!-- Datatables -->
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <!-- Bootstrap -->
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

                <style>
                * {box-sizing: border-box}
                body {font-family: Verdana, sans-serif; margin:0}
                .mySlides {display: none}
                img {vertical-align: middle;}

                /* Slideshow container */
                .slideshow-container {
                max-width: 1180px;
                position: relative;
                margin: auto;
                }

                /* Next & previous buttons */
                .prev, .next {
                cursor: pointer;
                position: absolute;
                top: 0;
                height:inherit;
                width: auto;
                padding: 16px;
                color: gray;
                font-weight: bold;
                font-size: 18px;
                transition: 0.6s ease;
                border-radius: 0 3px 3px 0;
                user-select: none;
                
                }

                .prev{
                border-radius: 1rem;
                height: -webkit-fill-available;
                }

                /* Position the "next button" to the right */
                .next {
                right: 0;
                border-radius: 1rem;
                height: -webkit-fill-available;
                }
                .glyphicon{
                    top:50%
                }
                /* On hover, add a black background color with a little bit see-through */
                .prev:hover, .next:hover {
                color: white;
                }
                .prev:hover {
                color: white;
                background-image: linear-gradient(to right,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
                }
                .next:hover {
                color: white;
                background-image: linear-gradient(to left,rgba(0,0,0,.5) 0,rgba(0,0,0,.0001) 100%);
                }

                /* Caption text */
                .text {
                color: #f2f2f2;
                font-size: 15px;
                padding: 8px 12px;
                position: absolute;
                bottom: 8px;
                width: 100%;
                text-align: center;
                }

                /* Number text (1/3 etc) */
                .numbertext {
                color: #f2f2f2;
                font-size: 12px;
                padding: 8px 12px;
                position: absolute;
                top: 0;
                }

                /* The dots/bullets/indicators */
                .dot {
                cursor: pointer;
                height: 15px;
                width: 15px;
                margin: 0 2px;
                background-color: #bbb;
                border-radius: 50%;
                display: inline-block;
                transition: background-color 0.6s ease;
                }

                .active, .dot:hover {
                background-color: #717171;
                }

                /* Fading animation */
                .fade {
                animation-name: fade;
                animation-duration: 1s;
                opacity:1
                }

                .fade:not(.show) {
                        opacity: 1;
                    }

                @keyframes fade {
                from {opacity: .4} 
                to {opacity: 1}
                }

                /* On smaller screens, decrease text size */
                @media only screen and (max-width: 300px) {
                .prev, .next,.text {font-size: 11px}
                }
                h3{
                    margin-top:10px;
                }
                @media (max-width:450px){
                span{
                    font-size:20px
                }
                .btn{
                  width:100%;
                    padding-left:3rem;
                    border-radius: 1.5rem;
                    margin-bottom: 10px
                }
                h4{
                    font-size:15px;
                    font-weight:bold;
                }
                .subdetails{
                    font-size:11px;
                    font-weight:bold;
                    color: #747e71;
                    text-align: left;
                }
                .descr{
                    margin:0;font-size:11px; height:50px; overflow:auto;
                }
                .dishes .box-container .box {
                      height: 320px;
                      width: 200px;
                  }
                }
                @media (min-width:450px){
                .subdetails{
                    font-size:15px;
                    font-weight:bold;
                    color: #747e71;
                    text-align: left;
                }
                h4{
                    font-weight:bold;
                }
                .descr{
                    margin:0;font-size:12px; height:70px; overflow:auto;
                }
            }
                </style>

    </head> 
<body class="paymentbody " style="font-size:1rem;">
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
<!------------------------- -------------------------------->
<div style="padding-bottom:20px">
<div class="slideshow-container">
@foreach ($rooms as $item)
<div class="mySlides fade">
  <img class="imgs" src="storage/RT/{{$item->RT_pic}}" style="width:100%; height:400px" alt="">
  <div class="text">{{$item->RT_Desc}}</div>
</div>@endforeach
<a class="prev" onclick="plusSlides(-1)"><span class="glyphicon glyphicon-chevron-left"></span></a>
<a class="next" onclick="plusSlides(1)"><span class="glyphicon glyphicon-chevron-right"></a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
</div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>


<!--------------------------------------------------------->

<section class="dishes" id="#" style="padding-bottom:100px">
    <!--------------------------------------------------------->
    <h1 class="sub-heading" style="color:rgb(50, 185, 50)"> FUNCTION ROOMS </h1>

        <div class="box-container" style ="padding:5rem; margin: auto;overflow: auto;">
        
        @foreach ($rooms as $item)
        @if($item->Avail_Status=='Available')

        <div class="box ">
            <!--a href="#" class="fas fa-heart"></a>
            <a href="#" class="fas fa-eye"></a> -->
            <img class="imgs" src="storage/RT/{{$item->RT_pic}}" alt="">
            <div style="display:flex; justify-content:space-between; align-items:center">
                <h4>{{$item->RT_Name}}</h4>
                @if($item->Avail_Status=='Available')
                    <div class="badge badge--success">Available</div>
                @elseif($item->Avail_Status=='Reserved')
                    <div class="badge badge--secondary">Reserved</div>
                @else
                    <div class="badge badge--danger">Unavailable</div>
                @endif
            </div>
              <div style="display:flex">
                    
            </div>
              <p class="subdetails">
                Capacity: {{$item->RT_Capacity}} Pax<br>
                Price: Php. {{$item->RT_Price}}
                <input type="hidden" name="Menu_id" value="{{$item->RT_ID}}">
            </p>
              <p class="descr">{{$item->RT_Desc}}</p>
            <!--FILLUP FORM-->

            <form action="Reserverm" method="POST">
              @csrf
              <input type="hidden" name="rtid" value={{$item->RT_ID}}>
              <button class="btn">See Room Details</button>
            </form>          
          
          </div>
        @endif
        @endforeach
        </div>        
        <!--------------------------------------------------------->
        <div id="#" style="padding:1rem; max-width:1180px; margin:auto; overflow:auto">
                <h1 class="sub-heading" style="color:rgb(50, 185, 50)"> ROOM RESERVATION POLICIES AND GUIDELINES </h1>
                <div style="background-color:white; width:100%; height:1px; "> </div>
                <h5 style="padding:1rem">
                <img src="storage/Policy/reservationpolicies.png" style="border-radius: 10px; background-size: cover;" alt="">
                  </h5>
            </div>

</section>
      
<script>
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);
//document.getElementById("currdate").innerHTML = Date();
$(document).ready( function () {
      $('#datatable').DataTable();
  } );


date = new Date();
year = date.getFullYear();
month = date.getMonth() + 1;
day = date.getDate();
document.getElementById("currdate").innerHTML = month + "/" + day + "/" + year;
</script>
    </body>

    @endsection