
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
          <h2>Staff Members</h2>
          </div>
          
          <div class="col-6 text-end">
          <!--a type="button" href="/addstaffmembers"style="margin:2px; width:auto" class="nav-item align-items-center btn bg-gradient-success ">Add</a-->
            <a type="button" class="btn btn-outline-success btn-sm "data-bs-toggle="modal" data-bs-target="#addmodal">Add a Staff Member</a>
            </div>
          </div>
        </div>

    @if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show">
        <span class="alert-icon"><i class="ni ni-like-2"></i></span>
        <span class="alert-text">{{session()->get('message')}}</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <table id="datatable" class="table table-striped">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Staff Details</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Position</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Birthday</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>             
                </tr>
              </thead>
              <tbody>
 
                @foreach ($staff as $staffuser)
                <tr>
                  <td class="align-middle text-center text-sm">
                    <h6 class="text-xs font-weight-bold mb-0">{{$staffuser->Staff_ID}}</h6>
                  </td>
                  <td>
                    <div class="d-flex px-2 py-1">
                      <div>
                        <img src="storage/DP/{{$staffuser->DP}}" class="avatar avatar-lg me-3" alt="user1">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-m">{{$staffuser->Staff_Name}}</h6>
                        <p class="text-xs text-secondary mb-0">{{$staffuser->Staff_EmailAdd}}</p>
                        <p class="text-xs text-secondary mb-0">{{$staffuser->Staff_ContactNo}}</p>
                      </div>
                    </div>
                  </td>
                  <td  class="align-middle text-center">
                    <p class="text-xs font-weight-bold mb-0">{{$staffuser->Staff_Position}}</p>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <p class="text-xs font-weight-bold mb-0">{{$staffuser->Staff_Birthday}}</p>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$staffuser->created_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{$staffuser->updated_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" data-id="{{$staffuser->Staff_ID}}"
                      data-s1="{{$staffuser->Staff_Name}}"
                      data-s2="{{$staffuser->Staff_EmailAdd}}"
                      data-s4="{{$staffuser->Staff_ContactNo}}"
                      data-s5="{{$staffuser->Staff_Position}}"
                      data-s6="{{$staffuser->Staff_Birthday}}" 
                      data-s7="{{$staffuser->DP}}"
                      type="button" style="margin-right:15px"
                      class="text-secondary font-weight-bold text-xs edit">
                      <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                    </a>                 
                    </td>
                  <td class="align-middle text-center">
                    <!-- DELETE BUTTON -->
                      <a id="delbutton"  data-id="{{$staffuser->Staff_ID}}"  
                        type="button" class="text-secondary font-weight-bold text-xs removestaffbtn">
                        <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                      </a>

                 <!-- <a onclick="return confirm('Are you sure you want to delete this Staff Member?')" 
                          href="/removestaff/{$staffuser->Staff_ID}}" class="text-secondary font-weight-bold text-xs"> 
                      <i class="fas fa-trash-alt me-2 text-danger text-gradient"></i></a>-->
                  
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<!---------------------------- START MODALS -------------------------------->
  <!-- DELETE Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Staff Removal Confirmation</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="HIDDEN" name="removestaff" id="modalstaffno">
        Are you sure you want to delete staff member?<br> All their corresponding details will be deleted forever.
      </div>
      <div class="modal-footer">
        <a id="yesdel" type="button" class="btn btn-outline-secondary" >Yes</a>
        <a type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</a>
          </div>
    </div>
  </div>
</div> 

 <!-- ADDSTAFFMODAL -->
 <form action="/staffregistermodal" method="POST"  enctype="multipart/form-data"> 
  @csrf 
 <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-dark">Add a Staff Member</h3>
              <p class="mb-0">Enter Staff details</p>
          </div>
          <div class="card-body pb-3">
            <form role="form text-left">
              <label>Name</label>
              <div class="input-group mb-3">
                <input type="text" required name="name" placeholder="Staff Name" class="form-control" aria-describedby="name-addon">
              </div>
              <label>Email</label>
              <div class="input-group mb-3">
                <input type="email" required name="email" placeholder="staff@email.com"class="form-control" aria-describedby="emailHelp">
              </div>
              <label>Password</label>
              <div class="input-group mb-3">
                <input type="password" required name="password" placeholder="***********"class="form-control"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
              </div>
              <label>Phone Number</label>
              <div class="input-group mb-3">
                <input type="tel" name="phone" placeholder="09XXXXXXXXX" class="form-control" pattern="[0-9]{11}" required>
              </div>
              <label>Position</label>
              <div class=" w-100 input-group mb-3">
                <select class="form-control" name="position" value="payment" required>
                <option value="">Position:</option>
                <option value="Manager">Manager</option>
                <option value="Reception">Reception</option>
                <option value="Delivery Person">Delivery Person</option>
                <option value="Kitchen Staff">Kitchen Staff</option>
            </select>
              </div>
              <label>Birthday</label>
              <div class="input-group mb-3">
                <input type="date" name="bday" placeholder="dd-mm-yyy" min='1915-01-01' max='2015-12-31' class="form-control" required>
              </div>
              <label>Profile Picture</label>
              <div class="input-group mb-3">  
                <input type="file" name="DP" placeholder="upload a profile picture" class="form-control">
              </div>
              <!--label>ID Picture</label>
              <div class="input-group mb-3">
                <input type="file" name="ID" placeholder="upload a profile picture" class="form-control">
              </div-->
              <div class="text-center">
                <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Add Staff Record</button>
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



<!-- EDITSTAFFMODAL -->
<form action="/updatestaffmember" method="POST" id="editform"  enctype="multipart/form-data">
  @csrf 
  <!--method('PUT')-->
 <div class="modal fade" id="editstaffmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body p-0">
        <div class="card card-plain">
          <div class="card-header pb-0 text-left">
              <h3 class="font-weight-bolder text-dark">Edit Staff Details</h3> 
              <input type="hidden" name="staffid" id="staffid">
          </div>
          <div class="card-body pb-3">
            <form role="form text-left">
              <!------------------- DP CHANGE ---------------------->
              <div class="text-center">
              <img name="setDP" class="w-30 border-radius-lg shadow-sm" id="setDP" alt="user"> <br>
              <input type="hidden" name="currDP" id="currDP">
              <label>Change Profile Picture?</label> <br>
                <input type="radio" value="No" id="no" checked="checked" onclick="show1();" />
                  No
                <input type="radio" value="Yes" id="yes" onclick="show2();" />
                  Yes
              <div id="div1" style="display:none">
                    <div class="input-group mb-3">
                      <input type="hidden"  id="activeDP" name="activeDP" class="form-control">
                    <input type="file"  id="DPchange" name="DPchange" placeholder="upload a profile picture" class="form-control">
                      <!--a href="#" id="DPchangebtn" class="btn btn-secondary" style="margin-bottom:0"role="button">update</a-->
                  </div>
                  </div>
                </div>
              <br>
              
              <label>Name</label>
              <div class="input-group mb-3">
                <input type="text" required name="name" id="name" class="form-control" aria-describedby="name-addon">
              </div>
              <label>Email</label>
              <div class="input-group mb-3">
                <input type="email" required name="email"  id="email" class="form-control" aria-describedby="emailHelp" disabled>
              </div>
              <!--label>Password</label>
              <div class="input-group mb-3">
                <input type="password" required name="password"  id="password" class="form-control">
              </div-->
              <label>Phone Number</label>
              <div class="input-group mb-3">
                <input type="tel" name="phone"  id="phone" class="form-control" pattern="[0-9]{11}" required>
              </div>
              <label>Position</label>
              <div class="input-group mb-3 w-100">
                <select  class="form-control"  " name="position"  id="position" required>
                <option value="">Position:</option>
                <option value="Manager">Manager</option>
                <option value="Reception">Reception</option>
                <option value="Delivery Person">Delivery Person</option>
                <option value="Kitchen Staff">Kitchen Staff</option>
            </select>
              </div>
              <label>Birthday</label>
              <div class="input-group mb-3">
                <input type="date"  id="bday" name="bday"min='1915-01-01' max='2015-12-31' class="form-control" required>
              </div>
              
              <div class="text-center">
                <button id="updatebtn" type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Update Staff Record</button>
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
  @include('admin.stafffooter')
</div>

  </main>
  
  @include('admin.staffscript')

  
<script>
  var element = document.getElementById("staffmembers");
  element.classList.add("active");

  window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
    }, 1000);
    /* ---------------------- DATA TABLE ------------------------ */

  $(document).ready( function () {
      $('#datatable').DataTable(
        {
          order: [[0, 'desc']],

        }
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
  var Staff_ID = $(this).data("id");
  //alert(Staff_ID);
    $('#deleteModal').modal('show');
    $('#modalstaffno').val($(this).data("id"));
    document.getElementById('yesdel').href="/removestaff/"+Staff_ID;
 
});

/*----------EDIT MODAL------------*/
$(document).on('click','#editbutton',function() 
{
  var Staff_ID = $(this).data("id");
//  alert(Staff_ID);
  $('#staffid').val(Staff_ID);

  console.log(Staff_ID);

    $('#editstaffmodal').modal('show');
    $('#name').val($(this).data("s1"));
    $('#email').val($(this).data("s2"));
    $('#phone').val($(this).data("s4"));
    $('#position').val($(this).data("s5"));
    $('#bday').val($(this).data("s6"));
   // $('#DPchange').src($(this).data("s7"));
    //$('#setDP').src($(this).data("face21.jpg"));
    document.getElementById('setDP').src="storage/DP/"+($(this).data("s7"));
    $('#activeDP').val($(this).data("s7"));
    $('#currDP').val($(this).data("s7"));
   // document.getElementById('editform').action="/updatestaffmember/"+Staff_ID;
 
});

/*----------RADIOBTNS------------*/
function show1(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('yes').checked=false; 
  document.getElementById('DPchange').value=null;
  var oldpic=document.getElementById('activeDP').value;
    document.getElementById('setDP').src="storage/DP/"+oldpic;
  //alert(oldpic);
}
function show2(){
  document.getElementById('div1').style.display = 'block';
  document.getElementById('no').checked=false; 
}

/*----------UPDATE DP------------*/
$(document).on('change','#DPchange',function() 
{
  var pic=document.getElementById('DPchange').value.replace(/C:\\fakepath\\/i, '');
  document.getElementById('setDP').src="storage/DP/"+(pic);
  //alert("Profile Picture Updated~!");
  
});
  </script>

</body>

</html>


