@extends('master')
@section("content")

    <head>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
                <!-- Jquery
                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                <-- Datatables ->
                <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
                <-- Bootstrap 
                <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
                -->
                <style>
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
                    padding-left:15px;
                    border-radius: 1.5rem;
                    margin-bottom:10px
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
                    margin:0;font-size:11px; 
                    height:50px; overflow:auto;
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
<body style="background-color: #333;">
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
<!--------------------------------------------------------->
<section class="dishes" id="#" style="padding-bottom:200px">
    <!--h1 class="sub-heading"  style="color:rgb(50, 185, 50)"> TABLE RESERVATION</h1-->

        <form action="Reservedtb" method="POST">
            @csrf 
        
            <div class="column h-50 container py-5 order" style="margin:auto">
          
              <div class="card" style="border-radius: 5rem;padding-bottom:20px">
                  <div class="order" id="order">
                  <div class="row" style="padding:20px">
        
                     <div class="card-body pb-3">
                      <form role="form text-left">
                        <div class="card-body pb-3">
                              <form role="form text-left">
                        <div class="text-center">
        
                                    <div class="heading">
                                      <!--h2 style="border-top:2px solid green"></h2-->
                                      <h2> <span> Table Reservation Form </span></h2>
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
                                  <input type="datetime-local" required name="rdt" id="rdt" class="form-control datelimit">
                                </div>
                                <label>End Date and Time</label>
                                <div class="input-group mb-3">
                                  <input type="datetime-local" required name="edt" id="edt" class="form-control datelimit2">
                                </div>
                                 <label>Number of Companions</label>
                                <div class="input-group mb-3">
                                  <input required type="number" id="cn" name="cn" max="" min="1" class="form-control">
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
     
        </div>
    </div>
</div>
</div>
        </form>
        <!--------------------------------------------------------->
        <div id="#" style="padding:1rem; max-width:1180px; margin:auto; overflow:auto">
                <h1 class="sub-heading" style="color:rgb(50, 185, 50)"> TABLE RESERVATION POLICIES AND GUIDELINES </h1>
                <div style="background-color:white; width:100%; height:1px; "> </div>
                <h5 style="padding:1rem">
                <img src="storage/Policy/reservationpolicies.png" style="border-radius: 5rem; background-size: cover;" alt="">
                  </h5>
            </div>
</section>

<script>


//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);
//document.getElementById("currdate").innerHTML = Date();
$(document).ready( function () {
      $('#datatable').DataTable();
  } );

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