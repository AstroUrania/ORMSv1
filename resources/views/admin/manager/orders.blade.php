
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.staffcss')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!--------------INCLUDES------------------->
  @include('admin.manager.managernav')
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('admin.staffheader')
    @include('admin.Alerts')

<div class="container-fluid py-4">
  <div class="row" id="staffmemberstable">
    <div class="col-12">
      <div class="card mb-4">
        
      <div class="card-header pb-0 p-3" style="padding-bottom:10px">
          <div class="row">
          <div class="col-6 d-flex align-items-center">
          <h2>Orders List</h2>
          </div>
<!--div class="nav-wrapper position-relative end-0">
<ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">

<li class="nav-item" role="presentation">
  <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>document</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(154.000000, 300.000000)">
      <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
      <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
    </svg>
    <span class="ms-1">Messages</span>
  </a>
</li>
<li class="nav-item" role="presentation">
  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false" tabindex="-1">
    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <title>settings</title>
      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
      <g transform="translate(1716.000000, 291.000000)">
      <g transform="translate(304.000000, 151.000000)">
      <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667">
      </polygon>
      <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
      <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z">
      </path>
      </g>
      </g>
      </g>
      </g>
    </svg>
  <span class="ms-1">Settings</span>
  </a>
</li>
<li>

</li>
</div-->

              <!--------------ADD ORDER------------------->

              <div class="col-6 text-end">
            <a type="button" style="min-width:200px" class="btn btn-outline-success btn-sm" id="addbutton" href="/gcart" >Add an Order</a>
            </div>
          </div>
        </div>
        
        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Members Orders List</h2></div>
          <table id="datatable" class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Details</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer Details</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Claiming Details</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subtotal</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivery Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($members as $members)
                <tr>
                  <td class="align-middle text-center text-sm">
                    <h6 class="text-xs font-weight-bold mb-0">{{$members->Order_ID}}</h6>
                  </td>
                  <td style="max-width:200px;">
                    <div class="d-flex px-2 py-1" >
                      <div>
                        <img src="storage/Menupics/{{$members->Menu_pic}}" class="avatar avatar-lg me-3" alt="Menupic">
                      </div>
                      
                    <div class="d-flex flex-column justify-content-center">
                      <h5 class="mb-0 text-lg">{{$members->Tracking_No}}</h5>
                      <p class="text-xs font-weight-bold mb-0"> {{$members->Menu_Name}} (x{{$members->Quantity}})</p>
                      <p class="text-xs font-weight-bold mb-0">Category: {{$members->Menu_Category}}</p>
                      <p style="height:50px; overflow:scroll; border: 1px solid rgb(187, 180, 180); border-radius:5px"class="text-xs text-secondary mb-0">Specifications: {{$members->Specification}}</p>
                  </div>
                    </div>
                  </td>
                  <td>
                    <h6 class="text-s font-weight-bold mb-0">{{$members->Customer_type}} #{{ $members->Customer_ID}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Member Name: {{$members->Customer_Name}}</p>
                    <p class="text-xs font-weight-bold mb-0">Receiver: {{$members->Receiver_Name}}</p>
                    <p class="text-xs font-weight-bold mb-0">Receiver contact#: {{$members->Rec_ContactNo}}</p>
                  </td>
                  <td>
                    <h6 class="text-s font-weight-bold mb-0">{{$members->Claim_Type}}</h6>
                    @if ($members->Claim_Type=="Delivery")
                    <p class="text-xs font-weight-bold mb-0">Receiver Address: {{$members->Rec_Address}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery date:{{$members->Delivery_Datetime}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$members->Delivery_Price}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$members->Deliverer_ID}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time departed:{{$members->Time_Departed}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time Received:{{$members->Time_Received}}</p>
                    @elseif ($members->Claim_Type=="Dine-in") 
                      <p class="text-xs font-weight-bold mb-0">Reservation Tracking #: {{$members->Reservation_TrackingNo}}</p>       
                    @elseif ($members->Claim_Type=="Pick-up")   
                    <p class="text-xs font-weight-bold mb-0">Pickup date and Time:{{$members->Delivery_Datetime}}</p>               
                    @endif             
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="text-s font-weight-bold mb-0">{{$members->Orders_Price}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Payment ID: {{$members->Payment_ID}}</p>
                  </td>

                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($members->Order_Status=='Successful')
                    <span class="badge badge-sm bg-gradient-success">Successful</span>
                    @elseif($members->Order_Status=='Pending')
                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @elseif($members->Order_Status=='Cancelled')
                    <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                    @else
                    <span class="badge badge-sm bg-gradient-light">None</span>
                    @endif
                  </td>

                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($members->Delivery_Status=='Successful')
                    <span class="badge badge-sm bg-gradient-success">Successful</span>
                    @elseif($members->Delivery_Status=='Pending')
                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @elseif($members->Delivery_Status=='Cancelled')
                    <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                    @else
                    <span class="badge badge-sm bg-gradient-light">None</span>
                    @endif
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$members->created_at}}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$members->updated_at}}</p>
                  </td>
                <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" 
                    data-id2="{{$members->Menu_ID}}"
                    data-id3="{{$members->Menu_pic}}"
                    data-id4="{{$members->Menu_Name}}"
                    data-id5="{{$members->Menu_Price}}"
                    data-id6="{{$members->Menu_Category}}"
                    data-id="{{$members->Order_ID}}"
                    data-id7="{{$members->Customer_ID}}"
                    data-id8="{{$members->Customer_type}}"
                    data-id9="{{$members->Customer_Name}}"
                    data-id10="{{$members->Cust_EmailAdd}}"
                    data-id11="{{$members->Quantity}}"
                    data-id12="{{$members->Specification}}"
                    data-id13="{{$members->Claim_Type}}"
                    data-id14="{{$members->Orders_Price}}"
                    data-id15="{{$members->Order_Status}}"
                    data-id17="{{$members->Payment_ID}}"
                    data-id18="{{$members->Delivery_Datetime}}" 
                    data-id19="{{$members->Delivery_Price}}" 
                    data-id20="{{$members->Receiver_Name}}"
                    data-id21="{{$members->Rec_ContactNo}}"
                    data-id22="{{$members->Rec_Address}}"
                    data-id23="{{$members->Delivery_Status}}"
                    data-id24="{{$members->Deliverer_ID}}"
                    data-id25="{{$members->Time_Departed}}"
                    data-id26="{{$members->Time_Received}}"
                    type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="10px" height="10px"></img>
                     details
                    </a>    
                    </td>
                <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editstatusbutton" 
                    data-id="{{$members->Order_ID}}"
                    data-id15="{{$members->Order_Status}}"
                    data-id23="{{$members->Delivery_Status}}"
                    type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="10px" height="10px"></img>
                     status
                    </a>              
                    </td>
                <td class="align-middle text-center">
                       <!-- DELETE BUTTON -->
                   <a id="delbutton"  data-id="{{$members->Order_ID}}"  
                     type="button" class="text-secondary font-weight-bold text-xs">
                     <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                 </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
        <div class="table-responsive p-0"><div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Guests Orders List</h2></div>
        <table id="datatable2" class="table table-striped">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Customer Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Claiming Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subtotal</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delivery Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
              </tr>
            </thead>
            <tbody>

              @foreach ($guests as $guests)
              <tr>
                <td class="align-middle text-center text-sm">
                  <h6 class="text-xs font-weight-bold mb-0">{{$guests->Order_ID}}</h6>
                </td>
                <td style="max-width:200px;">
                  <div class="d-flex px-2 py-1" >
                    <div>
                      <img src="storage/Menupics/{{$guests->Menu_pic}}" class="avatar avatar-lg me-3" alt="Menupic">
                    </div>
                    <div class="d-flex flex-column justify-content-center">
                      <h5 class="mb-0 text-lg">{{$guests->Tracking_No}}</h5>
                      <p class="text-xs font-weight-bold mb-0"> {{$guests->Menu_Name}} (x{{$guests->Quantity}})</p>
                      <p class="text-xs font-weight-bold mb-0">Category: {{$guests->Menu_Category}}</p>
                      <p style="height:50px; overflow:scroll; border: 1px solid rgb(187, 180, 180); border-radius:5px"class="text-xs text-secondary mb-0">Specifications: {{$guests->Specification}}</p>
                  </div>
                  </div>
                </td> 
                <td>
                  <h6 class="text-s font-weight-bold mb-0">Guest #{{$guests->Customer_ID}}</h6>
                  <p class="text-xs font-weight-bold mb-0">Receiver: {{$guests->Receiver_Name}}</p>
                  <p class="text-xs font-weight-bold mb-0">Receiver contact#: {{$guests->Rec_ContactNo}}</p>
                </td>
                <td>
                  <h6 class="text-s font-weight-bold mb-0">{{$guests->Claim_Type}}</h6>
                  @if ($guests->Claim_Type=="Delivery")
                  <p class="text-xs font-weight-bold mb-0">Receiver Address: {{$guests->Rec_Address}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery date:{{$guests->Delivery_Datetime}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$guests->Delivery_Price}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$guests->Deliverer_ID}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time departed:{{$guests->Time_Departed}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time Received:{{$guests->Time_Received}}</p>
                  @elseif ($guests->Claim_Type=="Dine-in") 
                  <p class="text-xs font-weight-bold mb-0">Reservation Tracking #: {{$guests->Reservation_TrackingNo}}</p>   
                  @elseif ($guests->Claim_Type=="Pick-up")   
                  <p class="text-xs font-weight-bold mb-0">Pickup date and Time:{{$guests->Delivery_Datetime}}</p>               
                  @endif
                </td>
                <td class="align-middle text-center">
                  <h6 class="text-s font-weight-bold mb-0">{{$guests->Orders_Price}}</h6>
                  <p class="text-xs font-weight-bold mb-0">Payment ID: {{$guests->Payment_ID}}</p>
                </td>

                <td class="align-middle text-center text-m">
                  <!--p class="text-xs font-weight-bold mb-0"></p-->
                  @if($guests->Order_Status=='Successful')
                  <span class="badge badge-sm bg-gradient-success">Successful</span>
                  @elseif($guests->Order_Status=='Pending')
                  <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                  @elseif($guests->Order_Status=='Cancelled')
                  <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                  @else
                  <span class="badge badge-sm bg-gradient-light">None</span>
                  @endif
                </td>

                <td class="align-middle text-center text-m">
                  <!--p class="text-xs font-weight-bold mb-0"></p-->
                  @if($guests->Delivery_Status=='Successful')
                  <span class="badge badge-sm bg-gradient-success">Successful</span>
                  @elseif($guests->Delivery_Status=='Pending')
                  <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                  @elseif($guests->Delivery_Status=='Cancelled')
                  <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                  @else
                  <span class="badge badge-sm bg-gradient-light">None</span>
                  @endif
                </td>
                <td  class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->created_at}}</p>
                </td>
                <td  class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->updated_at}}</p>
                </td>
                <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" 
                    data-id2="{{$guests->Menu_ID}}"
                    data-id3="{{$guests->Menu_pic}}"
                    data-id4="{{$guests->Menu_Name}}"
                    data-id5="{{$guests->Menu_Price}}"
                    data-id6="{{$guests->Menu_Category}}"
                    data-id="{{$guests->Order_ID}}"
                    data-id7="{{$guests->Customer_ID}}"
                    data-id8="{{$guests->Customer_type}}"
                    data-id11="{{$guests->Quantity}}"
                    data-id12="{{$guests->Specification}}"
                    data-id13="{{$guests->Claim_Type}}"
                    data-id14="{{$guests->Orders_Price}}"
                    data-id15="{{$guests->Order_Status}}"
                    data-id17="{{$guests->Payment_ID}}"
                    data-id18="{{$guests->Delivery_Datetime}}" 
                    data-id19="{{$guests->Delivery_Price}}" 
                    data-id20="{{$guests->Receiver_Name}}"
                    data-id21="{{$guests->Rec_ContactNo}}"
                    data-id22="{{$guests->Rec_Address}}"
                    data-id23="{{$guests->Delivery_Status}}"
                    data-id24="{{$guests->Deliverer_ID}}"
                    data-id25="{{$guests->Time_Departed}}"
                    data-id26="{{$guests->Time_Received}}"
                    type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="10px" height="10px"></img>details
                    </a>   
                    </td>
                <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editstatusbutton" 
                    data-id="{{$guests->Order_ID}}"
                    data-id15="{{$guests->Order_Status}}"
                    data-id23="{{$guests->Delivery_Status}}"
                    type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="10px" height="10px"></img>status
                    </a>              
                    </td>
                <td class="align-middle text-center">
                       <!-- DELETE BUTTON -->
                   <a id="delbutton"  data-id="{{$guests->Order_ID}}"  
                     type="button" class="text-secondary font-weight-bold text-xs">
                     <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                 </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
<!---------------------------- START MODALS -------------------------------->
  <!-- DELETE Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Removal Confirmation</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="HIDDEN" name="modalid" id="modalid">
          Are you sure you want to delete this Order?<br> All its corresponding details will be deleted forever.
        </div>
        <div class="modal-footer">
          <a id="yesdel" type="button" class="btn btn-outline-secondary" >Yes</a>
          <a type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</a>
            </div>
      </div>
    </div>
  </div>
    <!-- EDIT status MODAL  -->
    <form action="/updateorderstat" method="POST" id="editform"  enctype="multipart/form-data">
    @csrf 
   <div class="modal fade" id="editstatusmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Edit Order Status</h3>    <input type="hidden" name="theid2" id="theid2">

            </div>
            <div class="card-body pb-3">
              <form role="form text-left">

              <div class="input-group mb-3">
                <select style="width:100%; " id="ostatus" name="ostatus" required class="form-control">
                  <option value="">Status:</option>
                  <option value="Successful">Successful</option>
                  <option value="Pending">Pending</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="None">None</option>
                </select>
              </div>

              <label>Delivery Status</label>
              <div class="input-group mb-3">
                <select style="width:100%; " id="dstatus" name="dstatus" required  class="form-control">
                  <option value="">Status:</option>
                  <option value="Successful">Successful</option>
                  <option value="Pending">Pending</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="None">None</option>
                </select>
              </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Update Order Record</button>
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

  <!-- EDIT MODAL  -->
  <form action="/updateorder" method="POST" id="editform" enctype="multipart/form-data">
    @csrf 
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Edit Order Details</h3> 
                <input type="hidden" name="theid" id="theid">
                <input type="hidden" name="custidd" id="custidd">
                <input type="hidden" name="ctype" id="ctype">
                <input type="hidden" name="qnty" id="qnty">
                <input type="hidden" name="op" id="op">
                <input type="hidden" name="payid" id="payid">
                <input type="hidden" name="mnprice" id="mnprice">
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                  <!-----------------ORDER DETAILS----------------->
                  <div class="py-1 text-center ">
                    <img id="mpic" name="mpic" class="w-30 border-radius-lg shadow-sm my-1" alt="Order"> <br>
                    <h6 style="border-top:solid green 1px" class="mb-3">
                    <label > <h5>Menu Details</h5></label>
                    <div class="d-flex mb-0">
                    <p class="text-m font-weight-bold mb-0">Menu ID:&nbsp;</p> 
                    <p class="text-m mb-0" id="mid" name="mid" ></p>
                    </div>
                    <div class="d-flex mb-0">
                      <p class="text-m font-weight-bold mb-0">Menu Name:&nbsp;</p> 
                      <p class="text-m mb-0" id="name" name="name"></p>
                      </div>
                      <div class="d-flex mb-0">
                        <p class="text-m font-weight-bold mb-0">Menu Price:&nbsp;</p> 
                        <p class="text-m mb-0" id="mprice" name="mprice"></p>
                        </div>
                      </h6>
                  </div>
                  <table> 
                  <!--tr>
                    <th><label>Quantity</label></th>
                      <th><label>Order Subtotal</label></th>
                  </tr-->
                  <tr class="m-auto">
                    <td >
                      <input type="hidden" id="qty" name="qty" class="form-control m-auto w-70" disabled>
                    </td>
                    
                    <td>
                      <input type="hidden" id="oprice" name="oprice" class="form-control m-auto w-70" disabled>
                    </td>
                  </tr>
                  </table>
                    <label>Specifications</label>
                    <div class="input-group w-100">
                      <textarea type="text" id="specs" name="specs" class="form-control w-100"></textarea>
                    </div>
                    <label>Claim Type</label>
                    <div class="input-group mb-3">
                          <select class="form-control" id="claim" onchange="myclaim()" style="width:100%" name="claim" class="w-100 claimvia form-sontrol" required>
                            <option value="">Claim Type:</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Pick-up">Pick-up</option>
                            <option value="Dine-in">Dine-in</option>
                          </select>
                      </div>

                  <!-----------------CUSTOMER DETAILS----------------->
                  <div class="py-1 text-center ">
                    <h6 style="border-top:solid green 1px" class="my-1">
                      <label> 
                        <div class="d-flex">
                        <h5 id="custt" name="custt"></h5>
                        <h5>#</h5>
                        <h5 id="custid" name="custid"></h5>
                        <h5>&nbsp;details</h5></div>
                      </label>
                      <div class="d-flex mb-0">
                      <p class="text-m font-weight-bold mb-0">Customer Name:&nbsp;</p> 
                      <p class="text-m mb-0" id="custn" name="custn" ></p>
                      </div>
                      <div class="d-flex mb-0">
                        <p class="text-m font-weight-bold mb-0">Customer Email:&nbsp;</p> 
                        <p class="text-m mb-0" id="custem" name="custem"></p>
                        </div>
                      </h6>
                  </div>
                  <label>Receiver Name</label>
                    <div class="input-group w-100">
                      <input type="text" id="rname" name="rname" class="form-control" required>
                    </div>
                    <label>Receiver Contact No</label>
                    <div class="input-group w-100">
                      <input type="tel" id="contact" name="contact" class="form-control" pattern="[0-9]{11}" required>
                    </div>

                     <!-----------------DELIVERY DETAILS----------------->

                    <div class="input-group p-3" style="background-color:antiquewhite" id='delivery'>
                      
                    <label>Receiver Address</label>
                    <div class="input-group m-2 w-100">
                      <input type="text" id="raddress" name="raddress" class="form-control">
                    </div>

                    <label>Delivery Date and Time</label>
                    <div class="input-group m-2 w-100">
                      <input type="datetime-local" id="dt" name="dt" class="form-control">
                    </div>

                    <label>Delivery Price  (Php.):</label>
                    <div class="input-group m-2 w-100">
                      <input type="number" id="dprice" name="dprice" class="form-control">
                    </div>

                    <label>Deliverer ID:</label>
                    <div class="input-group m-2 w-100">
                      <input type="text" id="dID" name="dID" class="form-control">
                    </div>

                    <label>Time Departted:</label>
                    <div class="input-group m-2 w-100">
                      <input type="time" id="td" name="td" class="form-control">
                    </div>

                    <label>Time Received:</label>
                    <div class="input-group m-2 w-100">
                      <input type="time" id="tr" name="tr" class="form-control">
                    </div>

                    </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Update Order Record</button>
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
  
  <!-----------------------END MODALS------------------------------->

    </div>
  </div>
  @include('admin.stafffooter')
  
</div>

  </main>
  
  @include('admin.staffscript')

<script>
  window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000); 

var element = document.getElementById("orders");
  element.classList.add("active");
    /* ---------------------- DATA TABLE ------------------------ */
  
  $(document).ready( function () {
      $('#datatable').DataTable(
        {order: [[0, 'desc']]}
      );
  } );

  $(document).ready( function () {
      $('#datatable2').DataTable(
        {order: [[0, 'desc']]}
      );
  } );
  
  /* ---------------------- SELECT BOX ------------------------ */
  $(document).ready(function(){
      $('#custtype').on('change', function() {
        if ( this.value == 'Member')
        {
          $("#custid").show();
          document.getElementById("cid").required = true;//to not require field of proof of online payment 
  
  
        }
        else
        {
          $("#custid").hide();
          document.getElementById("cid").required = false;//to not require field of proof of online payment 
  
  
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
  
  /*----------DELETE MODAL------------*/
  $(document).on('click','#delbutton',function() 
  {
  var theID = $(this).data("id");
  //alert(Staff_ID);
    $('#deleteModal').modal('show');
    $('#modalid').val($(this).data("id"));
    document.getElementById('yesdel').href="/removeorder/"+theID;
  
  });
  /*----------EDIT MODAL------------*/
  $(document).on('click','#editbutton',function() 
  {
  var theID = $(this).data("id");
   // alert($(this).data("s5"));
  $('#theid').val(theID);
  
  console.log(theID);
  //SHOW DELIVERY DETAILS IF DELIVERY IS PICKED
          $('#editmodal').modal('show');

          if($(this).data("id13")=='Delivery')
          {
            $('#delivery').show();
          }
          else
          {
            $('#delivery').hide();
          }
  
    $('#mid').html($(this).data("id2"));
    document.getElementById('mpic').src="storage/Menupics/"+($(this).data("id3"));
    $('#name').html($(this).data("id4"));
    $('#mprice').html($(this).data("id5"));
    $('#mnprice').val($(this).data("id5"));
    $('#mcat').html($(this).data("id6"));
    $('#custid').html($(this).data("id7"));
    $('#custidd').val($(this).data("id7"));
    $('#custt').html($(this).data("id8"));
    $('#ctype').val($(this).data("id8"));
    $('#custn').html($(this).data("id9"));
    $('#custem').html($(this).data("id10"));
    $('#qty').val($(this).data("id11"));
    $('#qnty').val($(this).data("id11"));
    $('#specs').val($(this).data("id12"));
    $('#claim').val($(this).data("id13"));
    $('#oprice').val($(this).data("id14"));
    $('#op').val($(this).data("id14"));
  //  $('#mop').val($(this).data("id16"));
    $('#pid').html($(this).data("id17"));
    $('#payid').val($(this).data("id17"));

    $('#dt').val($(this).data("id18"));
    $('#dprice').val($(this).data("id19"));

    $('#rname').val($(this).data("id20"));
    $('#contact').val($(this).data("id21"));

    $('#raddress').val($(this).data("id22"));
    $('#dID ').val($(this).data("id24"));
    $('#td').val($(this).data("id25"));
    $('#tr').val($(this).data("id26"));


    // document.getElementById('editform').action="/updatestaffmember/"+theID;
  
  });
  
  
  /*----------EDIT STATUS MODAL------------*/
  $(document).on('click','#editstatusbutton',function() 
  {
  var theID = $(this).data("id");
   // alert($(this).data("s5"));
  $('#theid2').val(theID);
  
  console.log(theID);
  //SHOW DELIVERY DETAILS IF DELIVERY IS PICKED
          $('#editstatusmodal').modal('show');

    $('#ostatus').val($(this).data("id15"));
    $('#dstatus').val($(this).data("id23"));
    // document.getElementById('editform').action="/updatestaffmember/"+theID;
  
  });
  
  /*-----------------SELECT BOXES CONDITIONS ---------------------------*/

    /*___________________________F claim via_______________________________*/

  function myclaim() {
        var y = document.getElementById("claim").value;
        if ( y == 'Delivery')
        {
          $("#delivery").show();
  
  
        }
        else
        {
          $("#delivery").hide(); 
  
        }
      }
  </script>


</body>

</html>


