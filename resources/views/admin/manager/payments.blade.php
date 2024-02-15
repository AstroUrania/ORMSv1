
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
          <h2>Customer Payment List</h2>
          </div>
          <div class="col-6 text-end">
            <!--a type="button" class="btn btn-outline-success btn-sm " data-bs-toggle="modal" data-bs-target="#addmodal">Add Payment</a-->
            </div>
          </div>
        </div>

        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <table id="datatable" class="table table-striped" style="width:100%; margin:10px">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($payments as $payments)
                <tr>
                  <td class="align-middle text-center text-m">
                        <h6 class="text-m font-weight-bold mb-0">{{$payments->Payment_ID}}</h6>
                  </td>
                  <td style="max-width:200px;">
                    <div class="d-flex px-2 py-1" >
                      <div>
                        <img src="storage/DP/{{$payments->DP}}" class="avatar avatar-lg me-3" alt="Menupic">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-s font-weight-bold mb-0">{{$payments->Customer_Name}}</h6>
                    </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <h6 class="mb-0 text-m">{{$payments->Tracking_No}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Order Total: ₱{{$payments->Total_Payment}}</p>
                    <p class="text-xs font-weight-bold mb-0">Promo Code: {{$payments->Promo_Code}}</p>
                    <p class="text-xs font-weight-bold mb-0">Total Payment: {{$payments->TP_Promo}}</p>
                    <p class="text-xs font-weight-bold mb-0">Mode of Payment: ₱{{$payments->MOP}}</p>
                    @if ($payments->MOP=='Online Payment')
                    <p style="color:rgb(8, 172, 35)" class="text-xs font-weight-bold mb-0">
                      <a type="button" data-bs-toggle="modal" data-bs-target="#proofmodal" 
                              id="proofmod" data-id="{{$payments->Proof}}">Proof</a>
                    </p>                    
                    @else
                    @endif
                </td>
               

                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($payments->Payment_Status=='Successful')
                    <span class="badge badge-sm bg-gradient-success">Successful</span>
                    @elseif($payments->Payment_Status=='Cancelled')
                    <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                    @else
                    <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                    @endif
                  </td>

                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$payments->created_at}}</span>
                  </td>

                  <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton"data-id="{{$payments->Payment_ID}}"
                      data-s1="{{$payments->Customer_Type}}"
                      data-s2="{{$payments->Total_Payment}}"
                      data-s3="{{$payments->MOP}}"
                      data-s4="{{$payments->Proof}}"
                      data-s5="{{$payments->Payment_Status}}"
                     type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                    </a>                 
 
                         <!-- DELETE BUTTON 
                     <a id="delbutton"  data-id="{{$payments->Payment_ID}}"  
                       type="button" class="text-secondary font-weight-bold text-xs">
                     <i class="fas fa-trash-alt me-2 text-danger text-gradient"></i></a>-->
                   </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
<!--------------------------------------GUESTS-------------------->
      <div class="card mb-4">
        
        <div class="card-header pb-0 p-3" style="padding-bottom:10px">
          <div class="row">
          <div class="col-6 d-flex align-items-center">
          <h2>Guest Payment List</h2>
          </div>
          </div>
        </div>

        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <table id="datatable2" class="table table-striped" style="width:100%; margin:10px">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Customer Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Payment Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($gpayments as $gpayments)
                
                
                <tr>
                <td class="align-middle text-center text-sm">
                  <h6 class="text-m font-weight-bold mb-0">{{$gpayments->Payment_ID}}</h6>
                </td>
                  <td lass="align-middle text-center text-m" style="max-width:200px;">
                    <div class="d-flex px-2 py-1" >
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-s font-weight-bold mb-0">Guest #{{$gpayments->Customer_ID}}</h6>
                    </div>
                    </div>
                  </td>
                  <td class="align-middle text-center text-m">
                    
                    <h6 class="mb-0 text-m">{{$gpayments->Tracking_No}}</h6>
                    <p class="text-xs font-weight-bold mb-0">Order Total: ₱{{$gpayments->Total_Payment}}</p>
                    <p class="text-xs font-weight-bold mb-0">Promo Code: {{$gpayments->Promo_Code}}</p>
                    <p class="text-xs font-weight-bold mb-0">Total Payment: {{$gpayments->TP_Promo}}</p>
                    <p class="text-xs font-weight-bold mb-0">Mode of Payment: ₱{{$gpayments->MOP}}</p>
                    @if ($gpayments->MOP=='Online Payment')
                    <p style="color:rgb(8, 172, 35)" class="text-xs font-weight-bold mb-0">
                      <a type="button" data-bs-toggle="modal" data-bs-target="#proofmodal" 
                              id="proofmod" data-id="{{$gpayments->Proof}}">Proof</a>
                    </p>
                    @else
                    @endif
                </td>
               

                <td class="align-middle text-center text-m">
                  <!--p class="text-xs font-weight-bold mb-0"></p-->
                  @if($gpayments->Payment_Status=='Successful')
                  <span class="badge badge-sm bg-gradient-success">Successful</span>
                  @elseif($gpayments->Payment_Status=='Cancelled')
                  <span class="badge badge-sm bg-gradient-danger">Cancelled</span>
                  @else
                  <span class="badge badge-sm bg-gradient-secondary">Pending</span>
                  @endif
                </td>

                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$gpayments->created_at}}</span>
                  </td>

                  <td class="align-middle text-center">
                    <div style="display:flex;">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" 
                      data-id="{{$gpayments->Payment_ID}}"
                      data-s1="{{$gpayments->Customer_Type}}"
                      data-s2="{{$gpayments->Total_Payment}}"
                      data-s3="{{$gpayments->MOP}}"
                      data-s4="{{$gpayments->Proof}}"
                      data-s5="{{$gpayments->Payment_Status}}"
                     type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="15px" height="15px">
                     </img>
                    </a>                 
 
                         <!-- DELETE BUTTON 
                     <a id="delbutton"  data-id="{{$gpayments->Payment_ID}}"  
                       type="button" class="text-secondary font-weight-bold text-xs">
                     <i class="fas fa-trash-alt me-2 text-danger text-gradient"></i></a>-->
                     </div>
                   </td>

                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>

      
<!---------------------------- START MODALS -------------------------------->
  <!-- Show Modal-->

  <div class="modal fade" id="proofmodal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Proof of Payment</h6>
              <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body" style="overflow:auto">
              <input type="hidden" name="modalid" id="modalid">
          <img id="proofimage" style="display:block; margin:auto; padding:1rem width:100%" class="shadow-sm">
            </div>
            <div class="modal-footer">
              <p class="mb-4 mx-auto">
                <a href="javascrpt:;" class="text-danger text-gradient font-weight-bold" data-bs-dismiss="modal" >Cancel</a>
              </p>
            </div>
          </div>
        </div></div>
  <!-- DELETE Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Payment Removal Confirmation</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="modalid" id="modalid">
          Are you sure you want to delete this Payment?<br> All its corresponding details will be deleted forever.
        </div>
        <div class="modal-footer">
          <a id="yesdel" type="button" class="btn btn-outline-secondary" >Yes</a>
          <a type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</a>
            </div>
      </div>
    </div>
  </div> 
  
   <!-- ADD MODAL -->
   <form action="addpayment" method="POST"  enctype="multipart/form-data">
    @csrf 
   <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Add a Customer</h3>
                <p class="mb-0">Enter Customer details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                
                
                <label>Customer Type</label>
              <div class="input-group mb-3 w-100">
                <select  class="form-control" id="custt" name="custt" required>
                  <option value="">Customer Type:</option>
                  <option value="Member">Member</option>
                  <option value="Guest">Guest</option>
                </select>
                </div>
                
                <div id="cid" style="display:none"> 
                  <label>Customer ID</label>
                    <div class="input-group mb-3">
                      <input type="number" id="custID" name="custID" class="form-control">
                    </div>
                </div>

                <label>Total Payment</label>
                <div class="input-group mb-3">
                  <input type="number" required id="tpay" name="tpay" placeholder="Total Payment" class="form-control">
                </div>

                <label>Mode of Payment</label>
                <div class="input-group mb-3 w-100">
                      <select  class="form-control" onchange="mypay()" id="payvia" name="MOP" required>
                        <option value="">Mode of Payment:</option>
                        <option value="Cash">Cash</option>
                        <option value="Online Payment">Online Payment</option>
                      </select>
                      <div class="input-group m-3" style='display:none;' id='online'>
                        <div class="input-group mb-3 m-3">
                          GCASH:09281885467<br>
                          BANKS:Metrobank<br>
                        </div>
                        <div class="input-group">
                          <label>Transfer Screenshot</label>
                          <div class="input input-group">
                            <input class="payinput form-control " type="file" id="proof"  name="proof" accept="image/*">
                          </div>
                        </div>
                    </div>
                  </div>

                <label>Payment Status</label>
              <div class="input-group mb-3 w-100">
                <select  class="form-control" name="pstat" required>
                  <option value="">Status:</option>
                  <option value="Pending">Pending</option>
                  <option value="Successful">Successful</option>
                </select>
              </div>
          
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Add Payment Record</button>
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
  
  <!-- EDIT MODAL -->
  <form action="/updatepayment" method="POST" id="editform">
    @csrf 
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Edit Payment Details</h3> 
                <input type="hidden" name="theid" id="theid">
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                  <!-----------------ORDER DETAILS----------------->

                    <div class="d-flex mb-0">
                      <p class="text-s font-weight-bold mb-0" id="ecustt"></p> &nbsp;
                      <p class="text-s font-weight-bold mb-0"> ID:&nbsp;</p>
                      <p class="text-s mb-0" id="ecustID"></p>
                    </div>
                    <div class="d-flex mb-0">
                      <p class="text-s font-weight-bold mb-0">Total Payment: Php.&nbsp;</p> 
                      <p class="text-s mb-0" id="etpay"></p>
                      </div>
                      </h6> <br>

                      <label>Mode of Payment</label>
                      <div class="input-group mb-3 w-100">
                      <select class="form-control"   onchange="emypay()" id="eMOP" name="eMOP" required>
                        <option value="">Mode of Payment:</option>
                        <option value="Cash">Cash</option>
                        <option value="Online Payment">Online Payment</option>
                      </select>
                      </div>
                      
                      <div class="input-group m-3" style='display:none;' id='proofhide'>
                        <div class="input-group mb-3 m-3">
                          GCASH:09281885467<br>
                          BANKS:Metrobank<br>
                        </div>

                          <label>Transfer Screenshot</label>
                          <div class="input-group mb-3">
                            
                          <img style="display:block; margin:auto; padding:1rem" class="w-30 shadow-sm" id="imgproof">
                          <input type="hidden"  id="eproof" name="eproof" class="form-control">

                          <div class="input-group mb-3">
                          <input type="file"  id="theproof" name="theproof" placeholder="upload Online Payment Proof" class="form-control">
                        </div>
                      </div>

                      </div>
            

              <!---------------------------STATUS --------------------------------------->

                <label>Payment Status</label>
              <div class="input-group mb-3 w-100">
                <select  class="form-control" id="epstat" name="epstat" required>
                  <option value="">Status:</option>
                  <option value="Successful">Successful</option>
                  <option value="Pending">Pending</option>
                  <option value="Cancelled">Cancelled</option>
                </select>
              </div>

                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Update Payment Record</button>
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

        var element = document.getElementById("payments");
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
  /*----------PROOF MODAL------------*/
  $(document).on('click','#proofmod',function() 
  {
  var pic = $(this).data("id");
  //alert(Staff_ID);
    $('#proofmodal').modal('show');
    document.getElementById('proofimage').src="storage/Proof/"+pic;  
  });
  /*----------DELETE MODAL------------*/
  $(document).on('click','#delbutton',function() 
  {
  var theID = $(this).data("id");
  //alert(Staff_ID);
    $('#deleteModal').modal('show');
    $('#modalid').val($(this).data("id"));
    document.getElementById('yesdel').href="/removepayment/"+theID;
  
  });
  
  /*----------EDIT MODAL------------*/
  $(document).on('click','#editbutton',function() 
  {
  var theID = $(this).data("id");
   // alert($(this).data("s5"));
  $('#theid').val(theID);
  
  console.log(theID);
    
    $('#editmodal').modal('show');
    $('#ecustID').html(theID);
    $('#ecustt').html($(this).data("s1"));
    $('#etpay').html($(this).data("s2"));
    $('#eMOP').val($(this).data("s3"));
    $('#epstat').val($(this).data("s5"));
    $('#eproof').val($(this).data("s4"));
    document.getElementById('imgproof').src="storage/Proof/"+($(this).data("s4"));
    
          if ($(this).data("s3")=="Online Payment")
            {
              $("#proofhide").show()
           //   if ($('#eproof').val()==NULL){$("#imgproof").hide()}
            //  else{$("#imgproof").show()};
            }
          else
            {
              $("#proofhide").hide()
            };
  
  });

  /* ---------------------- PROOF UPLOAD ------------------------ */

  $(document).on('change','#theproof',function() 
    {
      var proof=document.getElementById('theproof').value.replace(/C:\\fakepath\\/i, '');
            alert(proof);
            document.getElementById('imgproof').src="storage/Proof/"+proof;
            document.getElementById('eproof').value=proof;
           // document.getElementById('imgproof').show();
    });

  

   /* ---------------------- CUSTTYPE ------------------------ */
   $(document).ready(function(){
      $('#custt').on('change', function() {
        if ( this.value == 'Member')
        {
          $("#cid").show();
          document.getElementById("custID").required = true;//to not require field of proof of online payment 
  
  
        }
        else
        {
          $("#cid").hide();
          document.getElementById("custID").required = false;//to not require field of proof of online payment 
  
  
        }
      });
  });

     /*___________________________add pay via_______________________________*/

     function mypay() {
        var x = document.getElementById("payvia").value;
        if ( x == 'Cash')
        {
          $("#online").hide();
          document.getElementById("proof").required = false;//to not require field of proof of online payment 
          
        }
        else if ( x == 'Online Payment')
        {
          $("#online").show();
          document.getElementById("proof").required = true;//to require field of proof of online payment 
        }
        else 
        {
          $("#online").hide();
        }


      }
      
         /*___________________________edit pay via_______________________________*/

         function emypay() {
        var x = document.getElementById("eMOP").value;
        if ( x == 'Cash')
        {
          $("#proofhide").hide();
          document.getElementById("eproof").required = false;//to not require field of proof of online payment 
          
        }
        else if ( x == 'Online Payment')
        {
          $("#proofhide").show();
          document.getElementById("eproof").required = true;//to require field of proof of online payment 
        }
        else 
        {
          $("#proofhide").hide();
        }
   /*___________________________ Proof of Online payment display_______________________________

        var y = document.getElementById("eproof").value;
        if ( y == null)
        {
          $("#imgproof").hide();
          
        }
        else 
        {
          $("#imgproof").show(); 
        }*/
      }

  
 </script>

</body>

</html>


