
<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.staffcss')
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!--------------INCLUDES------------------->
  @include('admin.reception.receptionnav')
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
          <h2>Table Reservation List</h2>
          </div>
            <!--------------ADD ORDER------------------->

          <div class="col-6 text-end">
            <a HREF="/gtbreservation" type="button" class="btn btn-outline-success btn-sm">Add a Reservation</a>
            </div>
          </div>
        </div>
<!--------------------------------------------MEMBERS--------------------------------------------------->

        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Members Table Reservation List</h2></div>
            <table id="datatable" class="table table-striped">
              <thead>
              <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracking Number</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($r as $r)
                @if ($r->Customer_Type=="Member")
                <tr>
                <td class="align-middle text-center text-sm">
                    <h6 class="text-xs font-weight-bold mb-0">{{$r->Reservation_ID}}</h6>
                </td>
                  <td style="max-width:200px;">
                    <div class="d-flex px-2 py-1" >
                      <div class="d-flex flex-column justify-content-center">
                        <h5 class="mb-0 text-m"> {{$r->Tracking_No}}</h5>
                        @if($r->RT_ID==0)
                        <h6 class="mb-0 text-sm" style="color:maroon">**Table not set**</h6>
                        @else
                        <h6 class="mb-0 text-sm">{{$r->RT_Type}} ID: {{$r->RT_ID}}</h6>
                        <h6 class="mb-0 text-sm">{{$r->RT_Type}} Name: {{$r->RT_Name}}</h6>
                        @endif

                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-m">
                    <h6 class="mb-0 text-s">Member ID: {{$r->Customer_ID}}</h6>
                    <h6 class="mb-0 text-sm">Customer Name: {{$r->Customer_Name}}</h6>
                    <h6 class="mb-0 text-sm">Contact Number: {{$r->Customer_Number}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Number of Companions: {{$r->Companion_No}}</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <p class="text-xs font-weight-bold mb-0">Reservation start: {{$r->Reservation_Datetime}}</p>
                    <p class="text-xs font-weight-bold mb-0">Reservation end: {{$r->End_Datetime}}</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <p class="text-xs font-weight-bold mb-0">Free</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($r->Reservation_Status=='Pending')
                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @elseif($r->Reservation_Status=='No Show')
                    <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                    @elseif($r->Reservation_Status=='Successful')
                    <span class="badge badge-sm bg-gradient-success">Successful</span>
                    @else
                    <span class="badge badge-sm bg-gradient-info">To be Approved</span>
                    @endif
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$r->created_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$r->updated_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" 
                    data-id="{{$r->Reservation_ID}}"
                    data-s1="{{$r->Customer_ID}}"
                    data-s2="{{$r->Reservation_Datetime}}"
                    data-s3="{{$r->End_Datetime}}"
                    data-s4="{{$r->RT_type}}"
                    data-s5="{{$r->RT_ID}}"
                    data-s6="{{$r->Reservation_Price}}"
                    data-s7="{{$r->Reservation_Status}}"
                    data-s8="{{$r->Companion_No}}"
                     type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                    </a>                 
                    </td>
                  <td class="align-middle text-center">
                         <!-- DELETE BUTTON -->
                     <a id="delbutton"  data-id="{{$r->Reservation_ID}}"  
                       type="button" class="text-secondary font-weight-bold text-xs">
                       <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                    </a>
                   </td>
                </tr>
                @endif
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
<!--------------------------------------------GUESTS--------------------------------------------------->
        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Guests Table Reservation List</h2></div>
            <table id="datatable2" class="table table-striped">
              <thead>
              <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tracking Number</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Reservation Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($gr as $r)
                @if ($r->Customer_Type=="Guest")
                <tr>
                <td class="align-middle text-center text-sm">
                    <h6 class="text-xs font-weight-bold mb-0">{{$r->Reservation_ID}}</h6>
                </td>
                  <td style="max-width:200px;">
                    <div class="d-flex px-2 py-1" >
                      <div class="d-flex flex-column justify-content-center">
                        <h5 class="mb-0 text-m"> {{$r->Tracking_No}}</h5>
                        @if($r->RT_ID==0)
                        <h6 class="mb-0 text-sm" style="color:maroon">**Table not set**</h6>
                        @else
                        <h6 class="mb-0 text-sm">{{$r->RT_Type}} ID: {{$r->RT_ID}}</h6>
                        <h6 class="mb-0 text-sm">{{$r->RT_Type}} Name: {{$r->RT_Name}}</h6>
                        @endif

                      </div>
                    </div>
                  </td>
                  <td class="align-middle text-center">
                    <h6 class="mb-0 text-sm">Guest ID: {{$r->Customer_ID}}</h6>
                    <h6 class="mb-0 text-sm">Customer Name: {{$r->Customer_Name}}</h6>
                    <h6 class="mb-0 text-sm">Contact Number: {{$r->Customer_Number}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Number of Companions: {{$r->Companion_No}}</p>
                    
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">Reservation start: {{$r->Reservation_Datetime}}</p>
                    <p class="text-xs font-weight-bold mb-0">Reservation end: {{$r->End_Datetime}}</p>
                  </td>
                  <td class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">Free</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($r->Reservation_Status=='Pending')
                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @elseif($r->Reservation_Status=='Accomplished')
                    <span class="badge badge-sm bg-success">Accomplished</span>
                    @elseif($r->Reservation_Status=='Cancelled')
                    <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                    @elseif($r->Reservation_Status=='Approved')
                    <span class="badge badge-sm bg-gradient-success">Approved</span>
                    @elseif($r->Reservation_Status=='To be Approved')
                    <span class="badge badge-sm bg-gradient-info">To be Approved</span>
                    @endif
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$r->created_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$r->updated_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" 
                    data-id="{{$r->Reservation_ID}}"
                    data-s1="{{$r->Customer_ID}}"
                    data-s1t="{{$r->Customer_Type}}"
                    data-s2="{{$r->Reservation_Datetime}}"
                    data-s3="{{$r->End_Datetime}}"
                    data-s6="{{$r->Reservation_Price}}"
                    data-s7="{{$r->Reservation_Status}}"
                    data-s8="{{$r->Companion_No}}"                  
                     type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                    </a>    
                    </td>
                  <td class="align-middle text-center">             
 
                         <!-- DELETE BUTTON -->
                     <a id="delbutton"  data-id="{{$r->Reservation_ID}}"  
                       type="button" class="text-secondary font-weight-bold text-xs">
                       <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                    </a>
                   </td>
                </tr>
                @endif
                @endforeach

              </tbody>
            </table>
          </div>
        </div>


<!---------------------------- START MODALS -------------------------------->
  <!-- DELETE Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Reservation Removal Confirmation</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" name="modalid" id="modalid">
          Are you sure you want to delete this reservation?<br> All its corresponding details will be deleted forever.
        </div>
        <div class="modal-footer">
          <a id="yesdel" type="button" class="btn btn-outline-secondary" >Yes</a>
          <a type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</a>
            </div>
      </div>
    </div>
  </div>
 
  
  <!-- EDIT MODAL -->
  <form action="/updatereservation" method="POST" id="editform">
    @csrf 
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Update Reservation Details</h3>
                <p class="mb-0">Edit Reservation details</p>
                <input type="hidden" name="theid" id="theid">

            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <div class="py-3 text-center ">
                  <h6 style="border-top:solid green 1px" class="m-3">
                  <label > <h6>Reservation Details</h6></label>
                  <div class="d-flex mb-0">
                  <p class="text-s font-weight-bold mb-0">Reservation ID:&nbsp;</p> 
                  <p class="text-s mb-0" id="rid" name="rid" ></p>
                  </div>
                  <div class="d-flex mb-0">
                    <p class="text-s font-weight-bold mb-0"id="ct" name="ct"></p> 
                    <p class="text-s font-weight-bold mb-0">&nbsp;Customer ID:&nbsp;</p> 
                    <p class="text-s mb-0" id="cid" name="cid" ></p>
                    </div>
                    <div class="d-flex mb-0">
                    <p class="text-s font-weight-bold mb-0"id="rt" name="rt"></p>   
                    <p class="text-s font-weight-bold mb-0">&nbsp;Table ID:&nbsp;</p> 
                    <p class="text-s mb-0" id="rtid" name="rtid" ></p>
                      </div>
                      <div class="d-flex mb-0">
                        <p class="text-s font-weight-bold mb-0">Price:&nbsp;</p> 
                        <p class="text-s mb-0" id="price" name="price" ></p>
                        </div>
                    </h6>
                </div>
                <label>Change Table</label>
                <div class="input-group mb-3">
                  <select id="rtid" class="form-control" name="rtid">
                    <option value="">Change Table</option>
                    @foreach ($rt as $rt)          
                    <option data-val="{{$rt->RT_ID}}" value="{{$rt->RT_ID}}">{{$rt->RT_Type}}-{{$rt->RT_Name}}</option>
                    @endforeach
                    </select>
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
                  <input type="number" id="cn" name="cn" class="form-control">
                </div>
                <label>Status</label>
                <div class="input-group mb-3">
                  <select style="width:100%; " name="sts" id="sts" required>
                    <option value="">Status:</option>
                    <option value="Approved">Approved</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                    <option value="To be Approved">To be Approved</option>
                    <option value="Accomplished">Accomplished</option>
                  </select>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Update Record</button>
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
  </div></form>
  
  
  <!-----------------------END MODALS------------------------------->

      </div>
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
    
  var element = document.getElementById("reservationtb");
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
    document.getElementById('yesdel').href="/removereservation/"+theID;
  
  });
  
  /*----------EDIT MODAL------------*/
  $(document).on('click','#editbutton',function() 
  {
  var theID = $(this).data("id");
   // alert($(this).data("s5"));
  $('#theid').val(theID);
  
  console.log(theID);
  
    $('#editmodal').modal('show');
    $('#rid').html($(this).data("id"));
    $('#cid').html($(this).data("s1"));
    $('#ct').html($(this).data("s1t"));
    $('#rdt').val($(this).data("s2"));
    $('#edt').val($(this).data("s3"));
    $('#rt').html($(this).data("s4"));
    $('#rtid').html($(this).data("s5"));
    $('#price').html($(this).data("s6"));
    $('#sts').val($(this).data("s7"));
    $('#cn').val($(this).data("s8"));

  });
  
  </script>

</body>

</html>


