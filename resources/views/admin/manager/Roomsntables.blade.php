
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
          <h2>Rooms and Tables List</h2>
          </div>
          
          <div class="col-6 text-end">
            <a type="button" class="btn btn-outline-success btn-sm " 
            data-bs-toggle="modal" data-bs-target="#addmodal">Add a Room or Table</a>
            </div>
          </div>
        </div>

        <div class="card-body px-0 pt-0 pb-2" style="margin:10px;">
          <div class="table-responsive p-0">
            <table  id="datatable" class="table table-striped align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"  style="width:1%;">ID</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Room/Table Details</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Capacity</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Updated at</th>
                  <th class="text-secondary opacity-7"></th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
 
                @foreach ($roomsntables as $rt)
                <tr>
                  <td class="align-middle text-center text-sm">
                    <h6 class="text-xs font-weight-bold mb-0">{{$rt->RT_ID}}</h6>
                  </td>
                  <td style="max-width:250px;">
                    <div class="d-flex px-2 py-1" >
                      <div>
                        <img src="storage/RT/{{$rt->RT_pic}}" class="avatar avatar-xxl me-3" alt="RT_pic">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-lg">{{$rt->RT_Type}} #{{$rt->RT_ID}}: {{$rt->RT_Name}}</h6>
                    
                        <p style="height:50px; overflow:scroll"class="text-xs text-secondary mb-0">{{$rt->RT_Desc}}</p>
                      </div>
                    </div>
                  </td>
                  <td>
                    <p class="text-m font-weight-bold mb-0">{{$rt->RT_Price}}</p>
                  </td>
                  <td>
                    <p class="text-m font-weight-bold mb-0">{{$rt->RT_Capacity}}</p>
                  </td>
                  <td class="align-middle text-center text-m">
                    <!--p class="text-xs font-weight-bold mb-0"></p-->
                    @if($rt->Avail_Status=='Available')
                    <span class="badge badge-m bg-gradient-success">Available</span>
                    @elseif($rt->Avail_Status=='Reserved')
                    <span class="badge badge-m bg-gradient-secondary">Reserved</span>
                    @elseif($rt->Avail_Status=='Unavailable')
                    <span class="badge badge-m bg-gradient-danger">Unavailable</span>
                    @elseif($rt->Avail_Status=='On hold')
                    <span class="badge badge-m bg-gradient-info">On hold</span>
                    @endif
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-sm font-weight-bold">{{$rt->created_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <span class="text-secondary text-sm font-weight-bold">{{$rt->updated_at}}</span>
                  </td>
                  <td class="align-middle text-center">
                    <!-- EDIT BUTTON -->
                    <a id="editbutton" data-id="{{$rt->RT_ID}}"
                     data-s1="{{$rt->RT_Type}}"
                     data-sn="{{$rt->RT_Name}}"
                     data-s2="{{$rt->RT_Desc}}"
                     data-s4="{{$rt->RT_Price}}"
                     data-s6="{{$rt->Avail_Status}}" 
                     data-s7="{{$rt->RT_pic}}"
                     data-s8="{{$rt->RT_Capacity}}"
                     type="button" style="margin-right:15px"
                     class="text-secondary font-weight-bold text-xs edit">
                     <img src="css/edit.svg" class="filter-gray" width="15px" height="15px"></img>
                    </a>                 
                    </td>
                  <td class="align-middle text-center">
                         <!-- DELETE BUTTON -->
                     <a id="delbutton"  data-id="{{$rt->RT_ID}}"  
                       type="button" class="text-secondary font-weight-bold text-xs">
                       <img src="css/trash.svg" class="filter-red" width="15px" height="15px"></img>
                    </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Room or Table Removal Confirmation</h5>
          <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="HIDDEN" name="modalid" id="modalid">
          Are you sure you want to delete this Room or Table?<br> All its corresponding details will be deleted forever.
        </div>
        <div class="modal-footer">
          <a id="yesdel" type="button" class="btn btn-outline-secondary" >Yes</a>
          <a type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</a>
            </div>
      </div>
    </div>
  </div>
  
   <!-- ADD MODAL -->
   <form action="addrt" method="POST"  enctype="multipart/form-data">
    @csrf 
   <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark">Add a Room or Table</h3>
                <p class="mb-0">Enter Customer details</p>
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <label>Type</label>
                <div class="input-group mb-3 w-100">
                  <select  class="form-control"  name="type" value="type" required>
                    <option value="">Type:</option>
                    <option value="Table">Table</option>
                    <option value="Room">Room</option>
                  </select>
                </div>
                <label>Name</label>
                <div class="input-group mb-3">
                  <input type="text" required name="RTname" placeholder="Name (optional)"class="form-control">
                </div>
                <label>Description</label>
                <div class="input-group mb-3">
                  <input type="text" required name="desc" placeholder="Description"class="form-control">
                </div>
                <label>Price (Php.)</label>
                <div class="input-group mb-3">
                  <input type="number" required name="price" placeholder="00.00"class="form-control">
                </div>
                <label>Capacity</label>
                <div class="input-group mb-3">
                  <input type="number" required name="capacity" placeholder="0" class="form-control">
                </div>
                
                <label>Status</label>
              <div class="input-group mb-3 w-100">
                <select  class="form-control"  name="status" value="status" required>
                  <option value="">Status:</option>
                  <option value="Available">Available</option>
                  <option value="Reserved">Reserved</option>
                  <option value="Unavailable">Unavailable</option>
                  <option value="On hold">On hold</option>
                </select>
              </div>
                <label>Photo</label>
                <div class="input-group mb-3">  
                  <input type="file" name="pic" placeholder="upload a picture" class="form-control" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-success btn-lg btn-rounded w-100 mt-4 mb-0">Add to Record</button>
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
  <form action="/updatert" method="POST" id="editform" enctype="multipart/form-data">
    @csrf 
   <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body p-0">
          <div class="card card-plain">
            <div class="card-header pb-0 text-left">
                <h3 class="font-weight-bolder text-dark d-flex">Edit&nbsp;  <div id="rttype"></div> &nbsp;Details</h3> 
                <input type="hidden" name="theid" id="theid">
            </div>
            <div class="card-body pb-3">
              <form role="form text-left">
                <!------------------- DP CHANGE ---------------------->
                <div class="text-center">
                <img name="setDP" class="w-100 border-radius-lg shadow-sm" id="setDP" alt="user"> <br>
                <input type="hidden" name="currDP" id="currDP">
                <label>Change Display Picture?</label> <br>
                  <input type="radio" value="No" id="no" checked="checked" onclick="show1();" />
                    No
                  <input type="radio" value="Yes" id="yes" onclick="show2();" />
                    Yes
                <div id="div1" style="display:none">
                      <div class="input-group mb-3">
                        <input type="hidden"  id="activeDP" name="activeDP" class="form-control">
                      <input type="file"  id="DPchange" name="DPchange" placeholder="upload a display picture" class="form-control">
                        <!--a href="#" id="DPchangebtn" class="btn btn-secondary" style="margin-bottom:0"role="button">update</a-->
                    </div>
                    </div>
                  </div>
                <br>
                <label id="rt"></label>
                <div style="display:flex;">
                  <input type="text"  style="width:30%;margin-right:10px" disabled id="type" name="type" class="form-control">
                  <input type="text" disabled id="rmid" name="rmid" class="form-control">
                </div>
                <label>Name</label>
                <div class="input-group mb-3">
                  <input type="text" required id="RT_Name" name="RT_Name" class="form-control">
                </div>
                <label>Description</label>
                <div class="input-group mb-3">
                  <input type="text" required id="desc" name="desc" placeholder="Description"class="form-control">
                </div>
                <label>Price (Php.)</label>
                <div class="input-group mb-3">
                  <input type="number" required id="price" name="price" placeholder="00.00"class="form-control">
                </div>
                <label>Capacity</label>
                <div class="input-group mb-3">
                  <input type="number" required id="capacity" name="capacity" placeholder="00.00"class="form-control">
                </div>
                <label>Status</label>
              <div class="w-100 input-group mb-3">
                <select class="form-control"  id="status" name="status" value="status" required>
                  <option value="">Status:</option>
                  <option value="Available">Available</option>
                  <option value="Reserved">Reserved</option>
                  <option value="Unavailable">Unavailable</option>
                  <option value="On hold">On hold</option>

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
  @include('admin.stafffooter')
  
</div>

  </main>
  
  @include('admin.staffscript')
  <script>
 window.setTimeout(function() {
      $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
    }, 1000);


  var element = document.getElementById("roomsntables");
  element.classList.add("active");
    /* ---------------------- DATA TABLE ------------------------ */
  
  $(document).ready( function () {
      $('#datatable').DataTable(
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
    document.getElementById('yesdel').href="/removert/"+theID;
  
  });
  
  /*----------EDIT MODAL------------*/
  $(document).on('click','#editbutton',function() 
  {
  var theID = $(this).data("id");
   // alert($(this).data("s5"));
  $('#theid').val(theID);
  
  console.log(theID);
  
    $('#editmodal').modal('show');
    $('#type').val($(this).data("s1"));
    document.getElementById('rttype').innerHTML = $(this).data("s1");//set room or table title
    document.getElementById('rt').innerHTML = $(this).data("s1");//set room or table in label

    $('#rmid').val(theID);
    $('#RT_Name').val($(this).data("sn"));
    $('#desc').val($(this).data("s2"));
    $('#price').val($(this).data("s4"));
    $('#status').val($(this).data("s6"));
    $('#capacity').val($(this).data("s8"));
    document.getElementById('setDP').src="storage/RT/"+($(this).data("s7"));
    $('#activeDP').val($(this).data("s7"));
    $('#currDP').val($(this).data("s7"));
   // document.getElementById('editform').action="/updatestaffmember/"+theID;
  
  });
  
/*----------RADIOBTNS------------*/
function show1(){
  document.getElementById('div1').style.display ='none';
  document.getElementById('yes').checked=false; 
  document.getElementById('DPchange').value=null;
  var oldpic=document.getElementById('activeDP').value;
    document.getElementById('setDP').src="storage/RT/"+oldpic;
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
  document.getElementById('setDP').src="storage/RT/"+(pic);
  

});
 
  </script>
</body>

</html>


