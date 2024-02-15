
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.staffcss')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!--------------INCLUDES------------------->
  @include('admin.kitchen.kitchennav')
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
          </div>
        </div>
        
        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Members Orders List</h2></div>
          <table id="datatable" class="table table-striped" style="width:100%; margin:10px">
              <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Claiming Details</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
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
                      <h5 class="mb-0 text-lg"> {{$members->Menu_Name}} (x{{$members->Quantity}})</h5>
                      <p class="text-xs font-weight-bold mb-0">{{$members->Tracking_No}}</p>
                      <p class="text-xs font-weight-bold mb-0">Category: {{$members->Menu_Category}}</p>
                      <p style="height:50px; overflow:scroll; border: 1px solid rgb(187, 180, 180); border-radius:5px"class="text-xs text-secondary mb-0">Specifications: {{$members->Specification}}</p>
                  </div>
                    </div>
                  </td>
                  <td>
                    <h6 class="text-s font-weight-bold mb-0">{{$members->Claim_Type}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Delivery date:{{$members->Delivery_Datetime}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$members->Delivery_Price}}</p>
                    <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$members->Deliverer_ID}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time departed:{{$members->Time_Departed}}</p>
                    <p class="text-xs font-weight-bold mb-0">Time Received:{{$members->Time_Received}}</p>
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
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$members->created_at}}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$members->updated_at}}</p>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
        <div class="table-responsive p-0"><div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Guests Orders List</h2></div>
        <table id="datatable2" class="table table-striped" style="width:100%; margin:10px">
            <thead>
              <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Menu Details</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Claiming Details</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order Status</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
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
                      <h5 class="mb-0 text-lg">{{$guests->Menu_Name}} (x{{$guests->Quantity}})</h5>
                      <p class="text-xs font-weight-bold mb-0">{{$guests->Tracking_No}}</p>
                      <p class="text-xs font-weight-bold mb-0">Category: {{$guests->Menu_Category}}</p>
                      <p style="height:50px; overflow:scroll; border: 1px solid rgb(187, 180, 180); border-radius:5px"class="text-xs text-secondary mb-0">Specifications: {{$guests->Specification}}</p>
                  </div>
                  </div>
                </td>
                
                <td>
                  <h6 class="text-s font-weight-bold mb-0">{{$guests->Claim_Type}}</h6>
                  <p class="text-xs font-weight-bold mb-0">Delivery date:{{$guests->Delivery_Datetime}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Price: ₱{{$guests->Delivery_Price}}</p>
                  <p class="text-xs font-weight-bold mb-0">Delivery Person ID:{{$guests->Deliverer_ID}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time departed:{{$guests->Time_Departed}}</p>
                  <p class="text-xs font-weight-bold mb-0">Time Received:{{$guests->Time_Received}}</p>
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

                <td  class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->created_at}}</p>
                </td>
                <td  class="align-middle text-center">
                  <p class="text-xs font-weight-bold mb-0">{{$guests->updated_at}}</p>
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
  
  <!-- EDIT MODAL  -->
  <form action="/updateorder" method="POST" id="editform">
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
                  <div class="py-3 text-center ">
                    <img id="mpic" name="mpic" class="w-30 border-radius-lg shadow-sm" alt="Order"> <br>
                    <h6 style="border-top:solid green 1px" class="m-3">
                    <label > <h6>Menu Details</h6></label>
                    <div class="d-flex mb-0">
                    <p class="text-xs font-weight-bold mb-0">Menu ID:&nbsp;</p> 
                    <p class="text-xs mb-0" id="mid" name="mid" ></p>
                    </div>
                    <div class="d-flex mb-0">
                      <p class="text-xs font-weight-bold mb-0">Menu Name:&nbsp;</p> 
                      <p class="text-xs mb-0" id="name" name="name"></p>
                      </div>
                      <div class="d-flex mb-0">
                        <p class="text-xs font-weight-bold mb-0">Menu Price:&nbsp;</p> 
                        <p class="text-xs mb-0" id="mprice" name="mprice"></p>
                        </div>
                      </h6>
                  </div>
                  <table> 
                  <tr>
                    <th><label>Quantity</label></th>
                      <th><label>Order Subtotal</label></th>
                  </tr>
                  <tr>
                    <td>
                      <input type="number" id="qty" name="qty" class="form-control" disabled>
                    </td>
                    
                    <td>
                      <input type="number" id="oprice" name="oprice" class="form-control" disabled>
                    </td>
                  </tr>
                  </table>
                    <label>Specifications</label>
                    <div class="input-group m-2 w-100">
                      <textarea type="text" id="specs" name="specs" class="form-control w-100"></textarea>
                    </div>
                    <label>Claim Type</label>
                    <div class="input-group mb-3">
                          <select id="claim" onchange="myclaim()" style="width:100%" name="claim" class="w-100 claimvia form-sontrol" required>
                            <option value="">Claim Type:</option>
                            <option value="Delivery">Delivery</option>
                            <option value="Pick-up">Pick-up</option>
                            <option value="Dine-in">Dine-in</option>
                          </select>
                      </div>

                  <!-----------------CUSTOMER DETAILS----------------->
                  <div class="py-3 text-center ">
                    <h6 style="border-top:solid green 1px" class="m-3">
                      <label> 
                        <div class="d-flex">
                        <h5 id="custt" name="custt"></h5>
                        <h5>#</h5>
                        <h5 id="custid" name="custid"></h5>
                        <h5>&nbsp;details</h5></div>
                      </label>
                      <div class="d-flex mb-0">
                      <p class="text-xs font-weight-bold mb-0">Customer Name:&nbsp;</p> 
                      <p class="text-xs mb-0" id="custn" name="custn" ></p>
                      </div>
                      <div class="d-flex mb-0">
                        <p class="text-xs font-weight-bold mb-0">Customer Email:&nbsp;</p> 
                        <p class="text-xs mb-0" id="custem" name="custem"></p>
                        </div>
                      </h6>
                  </div>
                  <label>Receiver Name</label>
                    <div class="input-group m-2 w-100">
                      <input type="text" id="rname" name="rname" class="form-control" required>
                    </div>
                    <label>Receiver Contact No</label>
                    <div class="input-group m-2 w-100">
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

              <!---------------------------STATUS --------------------------------------->
              <div class="py-3 text-center ">
                <div style="border-top:solid green 1px" class="m-3">
                  <label> 
                    <h5>Status</h5>
                  </label>
                  </div>
              </div>  

                <label>Order Status</label>
              <div class="input-group mb-3">
                <select style="width:100%; " id="ostatus" name="ostatus" required>
                  <option value="">Status:</option>
                  <option value="Successful">Successful</option>
                  <option value="Pending">Pending</option>
                  <option value="Cancelled">Cancelled</option>
                  <option value="None">None</option>
                </select>
              </div>

              <label>Delivery Status</label>
              <div class="input-group mb-3">
                <select style="width:100%; " id="dstatus" name="dstatus" required>
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
    $('#ostatus').val($(this).data("id15"));
  //  $('#mop').val($(this).data("id16"));
    $('#pid').html($(this).data("id17"));
    $('#payid').val($(this).data("id17"));

    $('#dt').val($(this).data("id18"));
    $('#dprice').val($(this).data("id19"));

    $('#rname').val($(this).data("id20"));
    $('#contact').val($(this).data("id21"));

    $('#raddress').val($(this).data("id22"));
    $('#dstatus').val($(this).data("id23"));
    $('#dID ').val($(this).data("id24"));
    $('#td').val($(this).data("id25"));
    $('#tr').val($(this).data("id26"));


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


