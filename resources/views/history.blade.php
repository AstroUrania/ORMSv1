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
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"
></script>
    </head> 
<body class="paymentbody " style="font-size:1rem">

  <!---------------------------------------------------------------------------------- FOOD ORDERS DIV -->
  <div class="align-items-center">
  <div class="container py-5 h-50 ">
  <div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col" style="padding-bottom:100px;">
  
  <div class="card" style="border-radius: 5rem;">
  <div class="card-body p-4">
  <div class="row">
  <div style="overflow:auto;">

    <!--CART HEADER-->
    <div class="heading">
    <Span>My Order History</span>
    </div>

  <!--------------------  FOREACH CART --------------------------->
   <table style="width: 100%;font-size:150%">
          <tbody><tr>
              <td class="icontainer flex-children">
                <div class="">
                  <tbody><tr>
                    <!--tr class="alignleft">
                              <a href="#" class="backbtn"><h1><</h1></a>
                            </tr-->
                    <td class="content-wrap aligncenter">
                       <table style="display:flex;justify-content:center">
                        <tbody>

                        <tr>
                        <td class="content-block">
                        <td>
                        <table id="datatable" class="invoice-items">
                          <tbody>
                            <!--{{$total=0}}-->
                            <tr class="tr" style>
                                <th class="mainsth">Order(Quantity)</th>
                                <th class="mainsth">Price</th>
                                <th class="mainsth">Order Status</th>
                                <th class="mainsth">Claim Type:</th>
                                <th class="mainsth">Receiver</th>
                                <th class="mainsth">Order Date</th>                                
                              </tr>
                            @foreach ($trans as $trans)
                            <tr class="tr p-10" style="color:rgb(1, 30, 1); border-top:solid rgb(0, 0, 0) 3px" >
                              <td class="mains">Tracking #: {{$trans->Tracking_No}}</td>
                            </tr>
                                  @foreach ($orders as $item)
                                  @if ($item->Tracking_No==$trans->Tracking_No)
                                  <tr class="tr p-10" style="color:rgb(1, 30, 1); border-top:solid rgb(4, 84, 4) 1px" >
                                    <td class="mains">{{$item->Menu_Name}}(x{{$item->Quantity}})</td>
                                    <td class="mains">
                                      {{$item->Orders_Price}}<br>
                                    </td>
                                    <td class="mains">
                                      @if($item->Order_Status=='Successful')
                                      <p class="badge badge--success">Successful</p>
                                      @elseif($item->Order_Status=='Pending')
                                      <p class="badge badge--secondary">Pending</p>
                                      @elseif($item->Order_Status=='Cancelled')
                                        <p class="badge badge--danger">Cancelled</p>
                                      @endif  
                                    </td>
                                    <td class="mains m-0">{{$item->Claim_Type}}<br>
                                    @if ($item->Claim_Type=="Delivery")
                                      @if($item->Delivery_Status=='Successful')
                                      <p class="badge badge--success">Successful</p>
                                      @elseif($item->Delivery_Status=='Pending')
                                      <p class="badge badge--secondary">Pending</p>
                                      @elseif($item->Delivery_Status=='Cancelled')
                                        <p class="badge badge--danger">Cancelled</p>
                                      @endif  <br>
                                    <p style="font-size:12px">Deliverer ID: {{$item->Deliverer_ID}}<br>
                                    Time Departed: {{$item->Time_Departed}}<br>
                                    Time Received: {{$item->Time_Received}}<br><br></P>
                                    @endif  
                                    </td>
                                    <td class="">
                                      <p class="mains">{{$item->Receiver_Name}}<br><p>
                                      @if ($item->Claim_Type=="Delivery")
                                    Address: {{$item->Rec_Address}}<br>
                                    @endif  
                                    </td>
                                    <td class="mains">{{$item->created_at}}</td>
                                  </tr>
                                  @endif
                                      @endforeach
                             <tr class="tr p-10" style=" border-top:solid rgb(4, 84, 4) 1px" >
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                             <td style="text-align:right" class="p-3">
                              Mode of Payment: {{$trans->MOP}}<br>
                              Order Total: ₱{{$trans->Total_Payment}}<br>
                              Promo: {{$trans->Promo_Name}}<br>
                              Promo Code: {{$trans->Promo_Code}}<br>
                              <div class="mains p-0" style="text-align:right"> Total Payment: ₱{{$trans->TP_Promo}}</div></td>
                             </tr>
                            @endforeach

                          </tbody>
                        </table>
                        </td>
                      </td>
                      </tr>

                                  
                </tbody>
                </table>
                              </td>



                          </tr>
                      </tbody></table> 
                      <div class="footer">
                          <table width="100%">
                              <tbody><tr>
                                  <td class="aligncenter content-block">Questions? Email <a class="qs"href="mailto:">support.lamesaweb@gmail.com</a></td>
                                  
                              </tr>
                          </tbody></table>
                      </div></div>
              </td>
          </tr>
      </tbody>
    </table>

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
    </div>
            
  
  <!--D------------------------------------------------------------------------------RESERVATIONS DIV-->
  <div class="align-items-center">
  <div class="container py-5 h-50 ">
  <div class="row d-flex justify-content-center align-items-center h-100">
  <div class="col" style="padding-bottom:100px;">
  
  <div class="card" style="border-radius: 5rem;">
  <div class="card-body p-4">
  <div class="row">
  <div style="overflow:auto;">

    <!--CART HEADER-->
    <div class="heading">
    <Span>My Reservation History</span>
    </div>

  <!--------------------  FOREACH CART --------------------------->
   <table style="width: 100%;font-size:150%">
          <tbody><tr>
              <td class="icontainer flex-children">
                <div class="">
                  <tbody><tr>
                    <!--tr class="alignleft">
                              <a href="#" class="backbtn"><h1><</h1></a>
                            </tr-->
                    <td class="content-wrap aligncenter">
                       <table style="display:flex;justify-content:center">
                        <tbody>

                        <tr>
                        <td class="content-block">
                        <td>
                        <table id="datatable" class="invoice-items">
                          <tbody>
                            <tr class="tr" style>
                                <th class="mainsth">ID</th>
                                <th class="mainsth">Reservation Details</th>
                                <th class="mainsth">Date and Time</th>
                                <th class="mainsth">Tracking Number</th>
                                <th class="mainsth">Reservation Price</th>
                                <th class="mainsth">Reservation Status</th>
                                <th class="mainsth">Created at</th>                                
                              </tr>
                              
                            @foreach ($res as $item)
                            <tr class="tr p-10" style="color:rgb(1, 30, 1); border-top:solid rgb(4, 84, 4) 1px" >
                              <td class="mains">{{$item->Reservation_ID}}</td>
                              <td class="alignleft"><p class="mains m-0">{{ $item->RT_type }} ID: {{$item->RT_ID}}
                                <br><p style="font-size:12px;">
                                  @if ( $item->RT_Name != null)
                                  {{ $item->RT_type }} Name: {{ $item->RT_Name }}
                                  @endif
                                <br><br></p></p>
                              </td>
                              <td class="mains">
                                <p style="font-size:12px">
                                Reservation Start: {{$item->Reservation_Datetime}}<br>
                                  Reservation End: {{$item->End_Datetime}}
                                </p></td>
                              <td class="mains">{{$item->Tracking_No}}</td>
                              <td class="mains">{{$item->Reservation_Price}}</td>

                              <td class="mains">
                                @if ($item->Reservation_Status=="Successful")
                                <p class="badge badge--success">Successful</p>
                                @elseif ($item->Reservation_Status=="Approved")
                                <p class="badge badge--info">Approved</p>
                                @elseif($item->Reservation_Status=='Pending')
                                <p class="badge badge--secondary">Pending</p>
                                @elseif($item->Reservation_Status=='To be Approved')
                                <p class="badge badge--line">To be Approved</p>
                                @elseif($item->Reservation_Status=='Cancelled')
                                  <p class="badge badge--danger">Cancelled</p>
                                @endif  
                              </td>
                              <td class="mains">{{$item->created_at}}</td>
                             </tr>
                             @endforeach
                          </tbody>
                        </table>
                        </td>
                      </td>
                      </tr>

                                  
                </tbody>
                </table>
                              </td>



                          </tr>
                      </tbody></table> 
                      <div class="footer">
                          <table width="100%">
                              <tbody><tr>
                                  <td class="aligncenter content-block">Questions? Email <a class="qs"href="mailto:">support.lamesaweb@gmail.com</a></td>
                                  
                              </tr>
                          </tbody></table>
                      </div></div>
              </td>
          </tr>
      </tbody>
    </table>

      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>





      
<script>

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