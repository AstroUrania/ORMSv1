
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.staffcss')
</head>

<body class="g-sidenav-show  bg-gray-100"> 
  <!--------------INCLUDES------------------->
  @include('admin.delivery.deliverynav')
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
          <h2>Delivery List</h2>
          </div>
          </div>
        </div>
        
        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Members Delivery List</h2></div>
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
                    <p class="text-xs font-weight-bold mb-0">Receiver Address: {{$members->Rec_Address}}</p>
                  </td>
                  <td>
                    <h6 class="text-s font-weight-bold mb-0">{{$members->Claim_Type}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Delivery date:{{$members->Delivery_Datetime}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$members->Delivery_Price}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$members->Deliverer_ID}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time departed:{{$members->Time_Departed}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time Received:{{$members->Time_Received}}</p>
                  </td>
                  <td>
                    <h6 class="text-s font-weight-bold mb-0">Price: {{$members->Orders_Price}}</h6>
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
                  <td class="align-middle text-center text-m">
                    <p class="text-xs font-weight-bold mb-0">{{$members->created_at}}</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <p class="text-xs font-weight-bold mb-0">{{$members->updated_at}}</p>
                  </td>
                  <td class="align-middle text-center">
                  <!-- EDIT BUTTON -->
                  <a id="editbutton" 
                  data-id="{{$members->Order_ID}}"
                  data-id15="{{$members->Order_Status}}"
                  data-id23="{{$members->Delivery_Status}}"
                  data-id24="{{$members->Deliverer_ID}}"
                  data-id25="{{$members->Time_Departed}}"
                  data-id26="{{$members->Time_Received}}"
                  data-id18="{{$members->Delivery_Datetime}}" 
                   type="button" style="margin-right:15px"
                   class="text-secondary font-weight-bold text-xs edit">
                   <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                  </a>  
                  </td>

                  <td class="align-middle text-center me-2">       
                       <!-- DELETE BUTTON -->
                   <!--a id="delbutton"  data-id="{{$members->Order_ID}}"  
                     type="button" class="text-secondary font-weight-bold text-xs">
                     <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                  </a-->

                 </td>
                </tr>
                @endforeach
 
              </tbody>
            </table>
          </div>
        </div>

      <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
        <div class="table-responsive p-0"><div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Guests Delivery List</h2></div>
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

              </tr>
            </thead>
            <tbody>

              @foreach ($guests as $guests)
              <tr class="m-2">
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
                  <p class="text-xs font-weight-bold mb-0">Receiver Address: {{$guests->Rec_Address}}</p>
                </td>
                <td>
                  <h6 class="text-s font-weight-bold mb-0">{{$guests->Claim_Type}}</h6>
                  <p class="text-xs font-weight-bold mb-0">Delivery date:{{$guests->Delivery_Datetime}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$guests->Delivery_Price}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$guests->Deliverer_ID}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time departed:{{$guests->Time_Departed}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time Received:{{$guests->Time_Received}}</p>
                </td>
                <td>
                  <h6 class="text-s font-weight-bold mb-0">Subtotal: {{$guests->Orders_Price}}</h6>
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
                <td class="align-middle text-center text-m">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->created_at}}</p>
                </td>
                <td class="align-middle text-center text-m">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->updated_at}}</p>
                </td>
                <td class="align-middle text-center">
                  <!-- EDIT BUTTON -->
                  <a id="editbutton" 
                  data-id="{{$guests->Order_ID}}"
                  data-id15="{{$guests->Order_Status}}"
                  data-id23="{{$guests->Delivery_Status}}"
                  data-id24="{{$guests->Deliverer_ID}}"
                  data-id25="{{$guests->Time_Departed}}"
                  data-id26="{{$guests->Time_Received}}"
                  data-id18="{{$guests->Delivery_Datetime}}" 
                   type="button" style="margin-right:15px"
                   class="text-secondary font-weight-bold text-xs edit">
                   <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                  </a>  
                  </td>

                  <td class="align-middle text-center me-2">       
                       <!-- DELETE BUTTON -->
                   <!--a id="delbutton"  data-id="{{$guests->Order_ID}}"  
                     type="button" class="text-secondary font-weight-bold text-xs">
                     <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                  </a-->

                 </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>

<!---------------------------- START MODALS -------------------------------->
  
  <!-- EDIT MODAL  -->
  <form action="/updatedelivery" method="POST" id="editform">
    @csrf 
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Edit Order Details</h3> 
                <input type="hidden" name="theid" id="theid">

            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                  <!-----------------ORDER DETAILS----------------->

                  <div class="text-center ">
                    <div class="mb-0 mt-0">
                      <label> 
                        <h5>Delivery Details</h5>
                      </label>
                      </div>
                  </div>  

                  <div class="m-auto">
                    <label>Delivery Date and Time</label>
                    <div class="input-group mb-2 m-auto w-90">
                      <input type="datetime-local" id="dt" name="dt" class="form-control">
                    </div>
                  <div class="row">
                    <div class="col-sm-5 m-auto">
                    <label>Time Departed:</label>
                      <div class="input-group m-2 w-100">
                        <input type="time" id="td" name="td" class="form-control">
                      </div>
                    </div>  
                    <div class="col-sm-5 m-auto">
                      <label>Time Received:</label>
                      <div class="input-group m-2 w-100">
                        <input type="time" id="tr" name="tr" class="form-control">
                      </div>
                    </div>
                  </div>
                    </div>

              <!---------------------------STATUS --------------------------------------->
              <div class="text-center ">
                <div style="border-top:solid green 1px" class="mb-0 mt-5">
                  <label> 
                    <h5 class="mt-2">Status</h5>
                  </label>
                  </div>
              </div>  

                <label>Order Status</label>
              <div class="input-group mb-3">
                <select style="width:100%; " id="ostatus" name="ostatus" class="form-control" required>
                  <option value="">Status:</option>
                  <option value="Successful">Successful</option>
                  <option value="Pending">Pending</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="None">None</option>
                </select>
              </div>

              <label>Delivery Status</label>
              <div class="input-group mb-3">
                <select style="width:100%; " id="dstatus" name="dstatus" class="form-control" required>
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

      $('#ostatus').val($(this).data("id15"));
  //  $('#mop').val($(this).data("id16"));
    $('#pid').html($(this).data("id17"));
    $('#dt').val($(this).data("id18"));
    $('#dstatus').val($(this).data("id23"));
    $('#dID ').val($(this).data("id24"));
    $('#td').val($(this).data("id25"));
    $('#tr').val($(this).data("id26"));
  
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


