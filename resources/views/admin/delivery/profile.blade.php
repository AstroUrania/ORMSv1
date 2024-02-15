
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.staffcss')
</head>


<body class="g-sidenav-show bg-gray-100">
    @include('admin.delivery.deliverynav')

@foreach ($details as $staff)
  <main class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
    @include('admin.staffheader')

    <div class="container-fluid">
      <div class="page-header min-height-100 border-radius-xl mt-4" style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
        <span class="mask bg-gradient-primary opacity-6"></span>
      </div>
      <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
          <div class="col-auto">
            <div class="avatar avatar-xl position-relative">
              <img src="storage/DP/{{ $staff->DP }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
            </div>
          </div>
          <div class="col-auto my-auto">
            <div class="h-100">
              <h5 class="mb-1">
               {{ $staff->Staff_Name }}
              </h5>
              <p class="mb-0 font-weight-bold text-sm">
                {{ $staff->Staff_Position }}
            </p>
            </div>
          </div>
          <!--div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
            <div class="nav-wrapper position-relative end-0">
              <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 active " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                    <svg class="text-dark" width="16px" height="16px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                          <g transform="translate(1716.000000, 291.000000)">
                            <g transform="translate(603.000000, 0.000000)">
                              <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z">
                              </path>
                              <path class="color-background" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z" opacity="0.7"></path>
                              <path class="color-background" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z" opacity="0.7"></path>
                            </g>
                          </g>
                        </g>
                      </g>
                    </svg>
                    <span class="ms-1">App</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
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
                <li class="nav-item">
                  <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
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
              </ul>
            </div>
          </div-->
        </div>
      </div>
    </div>

    @include('admin.Alerts')

    <div class="container-fluid py-4">
      <div class="row">

        <div class="col-12 col-xl-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                  <h6 class="mb-0">Profile Information</h6>
                </div>
                <div class="col-md-4 text-end">
                  <a href="javascript:;">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body p-3">              
                
              <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Full Name:</strong> &nbsp;{{ $staff->Staff_Name }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Mobile:</strong> &nbsp; {{ $staff->Staff_ContactNo }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> &nbsp; {{ $staff->Staff_EmailAdd }}</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Birthday:</strong> &nbsp; {{ $staff->Staff_Birthday }}</li>
              </ul>
              
              <hr class="horizontal gray-light my-4">
                <a href="#changepass" id="changep" type="button" onclick="changepass()" class="pass"><h6>Change Password</h6></a>

                <div  id="changepass" style="display:none">

                    <form action="/updatestaffpass" method="POST">
                    <!--form-->
                      @csrf 
                        <form role="form text-left">
                                   
                                    <label>Current Password</label>
                                    <div class="input-group mb-3">
                                      <input type="password" name="pass"  id="pass" class="form-control">
                                      <input type="hidden" value="{{ $staff->Staff_Password }}" required name="passold"  id="passold" class="form-control">
                                    </div>
                                    <label>New Password</label>
                                    <div class="input-group mb-3">
                                      <input type="password" name="newpass" id="newpass" class="form-control">
                                    </div>
                                    <label>Re-Type Password</label>
                                    <div class="input-group mb-3">
                                      <input type="password" name="repass"  id="repass" class="form-control">
                                    </div>
                                    <hr style="border-top: 1px solid rgb(45, 45, 45);">
                    
                                  <div class="text-center">
                                    <!--button type="button" onclick="updatepass()" class="btn btn-lg btn-rounded w-100 mt-4 mb-0">Update Password
                                        </button-->
                                  <button type="submit" class="btn bg-gradient-secondary btn-lg w-50 mt-4 mb-4">Update Password
                                        </button>
                                  
                                    </div>
                        </form>
                              
                      </form>
                    </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-xl-7">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Edit Profile Details</h6>
            </div>
            <div class="card-body p-3">
              <!-- EDITSTAFFMODAL -->
            <form action="/updatestaff" method="POST" id="editform" enctype="multipart/form-data">
                @csrf 
                <!--method('PUT')-->
            <form role="form text-left">
                <!------------------- DP CHANGE ---------------------->
                <div class="text-center">
                <img name="setDP" src="storage/DP/{{ $staff->DP }}" class="w-10 border-radius-lg shadow-sm" id="setDP" alt="user"> <br>
                <input type="hidden" name="currDP" id="currDP" value="{{ $staff->DP }}" >
                <label>Change Profile Picture?</label> <br>
                  <input type="radio" value="No" id="no" checked="checked" onclick="show1();" />
                    No
                  <input type="radio" value="Yes" id="yes" onclick="show2();" />
                    Yes
                <div id="div1" style="display:none">
                      <div class="input-group mb-3">
                        <input type="hidden" id="activeDP" name="activeDP" value="{{ $staff->DP }}" class="form-control">
                      <input type="file"  id="DPchange" name="DPchange" placeholder="upload a profile picture" class="form-control">
                        <!--a href="#" id="DPchangebtn" class="btn btn-secondary" style="margin-bottom:0"role="button">update</a-->
                    </div>
                    </div>
                  </div>
                <br>
                
                <label>Name</label>
                <div class="input-group mb-3">
                  <input type="text" required name="name" value="{{ $staff->Staff_Name }}" class="form-control" aria-describedby="name-addon">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" required name="email"  value="{{ $staff->Staff_EmailAdd}}" class="form-control" aria-describedby="emailHelp" disabled>
                </div>
                <!--label>Password</label>
                <div class="input-group mb-3">
                  <input type="password" required name="password"  id="password" class="form-control">
                </div-->
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="tel" name="phone"  id="phone" value="{{ $staff->Staff_ContactNo }}" class="form-control" pattern="[0-9]{11}" required>
                </div>
                <label>Position</label>
                <div class="input-group mb-3">
                  <select style="width:100%;" name="position" id="position" required disabled>
                  <option selected value="{{ $staff->Staff_Position}}">{{ $staff->Staff_Position}}</option>
                  <option value="Manager">Manager</option>
                  <option value="Reception">Reception</option>
                  <option value="Delivery Person">Delivery Person</option>
                  <option value="Kitchen Staff">Kitchen Staff</option>
              </select>
                </div>
                <label>Birthday</label>
                <div class="input-group mb-3">
                  <input type="date"  id="bday" name="bday" value="{{ $staff->Staff_Birthday }}" min='1915-01-01' max='2015-12-31' class="form-control" required>
                </div>
                
                <div class="text-center">
                  <button id="updatebtn" type="submit" class="btn bg-gradient-info btn-lg w-50 mt-4 mb-4">Update Profile Details</button>
                </div>
              </form>
           </form>
            </div>
          </div>
        </div>
        
      </div>
    
      @include('admin.stafffooter')
    </div>
    

</main>
@endforeach
  
  @include('admin.staffscript')
<script>
    var element = document.getElementById("profile");
  element.classList.add("active");
//ALERT TIMEOUT
window.setTimeout(function() {
  $( "#alert" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);

//SHOW CHANGEPASS FORM
function changepass() {

  var x = document.getElementById("changepass");
  if (x.style.display == "none") {
    x.style.display = "block";
    document.getElementById("changep").innerHTML ="<h6>Cancel Edit Password</h6>";
    document.getElementById("pass").required = true;
    document.getElementById("newpass").required = true;
    document.getElementById("oldpass").required = true;
  } else {
    x.style.display = "none";
    document.getElementById("changep").innerHTML ="<h6>Change Password</h6>"
    document.getElementById("pass").required = false;
    document.getElementById("newpass").required = false;
    document.getElementById("oldpass").required = false;  
  }
}

 /**********************************************************************/    
 function updatepass() {

           $.ajax({    
              
              url: 'updateuserpass/', 
              method:'POST', 
              data: {"_token":"{{csrf_token()}}"},
              success: function(data){
                //$('#cartt').load(location.href + " #cartt");
                alert(data);
           /*     if (data=="YES")
                {
                //  alert("yes");
                  document.getElementById("flash").style.display="block";
                }
                else if (data=="NO"){
                 // alert("no");
                  document.getElementById("flash").style.display="none";
                }*/
               // location.reload();
           
              }
            });  
          }



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
  

});

    </script>
</body>

</html>