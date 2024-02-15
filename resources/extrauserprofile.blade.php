@extends('master')
@section("content")

<head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">


      <!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
</head> 

<table class="body-wrap">
  <!--------------INCLUDES------------------->
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
  
  <!-- EDIT MODAL -->
  <form action="/updateuser" method="POST">
    @csrf 

    <div class="column h-50 container py-5 order" style="margin:auto">
  
      <div class="card" style="border-radius: 5rem;padding-bottom:20px">
          <div class="order" id="order">
          <div class="row" style="padding:20px">
      <!--h3 class="sub-heading"> order now </h3-->
      <!------------ORDER FORM---------------->
      <div class="heading">
      <h1> <span> Edit Profile </span></h1>
      </div>    @foreach ($user as $user)  
             <div class="card-body pb-3">
              <form role="form text-left">
                <!------------------- DP CHANGE ---------------------->
                <div class="text-center">
                <img name="setDP" src="DP/{{ $user->DP }}"  class="w-30 border-radius-lg shadow-sm" id="setDP" alt="user"> <br>
                <input type="hidden" name="currDP" id="currDP" value="{{ Session::get('user')['DP'] }}">
                <label>Change Profile Picture?</label> <br>
                  <input type="radio" value="No" id="no" checked="checked" onclick="show1();" />
                    No
                  <input type="radio" value="Yes" id="yes" onclick="show2();" />
                    Yes
                <div id="div1" style="display:none">
                      <div class="input-group mb-3">
                        <input type="hidden"  id="activeDP" name="activeDP" value="{{ Session::get('user')['DP'] }}"class="form-control">
                      <input type="file"  id="DPchange" name="DPchange" placeholder="upload a profile picture" class="form-control">
                        <!--a href="#" id="DPchangebtn" class="btn btn-secondary" style="margin-bottom:0"role="button">update</a-->
                    </div>
                    </div>
                  </div>
                <br>
                
                <label>Name</label>
                <div class="input-group mb-3">
                  <input type="text" value=" {{ $user->Customer_Name }} " required name="name" id="name" class="form-control" aria-describedby="name-addon">
                </div>
                <label>Email</label>
                <div class="input-group mb-3">
                  <input type="email" disabled value="{{ $user->Cust_EmailAdd }}" class="form-control" aria-describedby="emailHelp">
                  <input type="hidden" name="email"  id="email" value="{{ $user->Cust_EmailAdd }}" class="form-control" aria-describedby="emailHelp">
                </div>
                <!--label>Password</label>
                <div class="input-group mb-3">
                  <input type="password" required name="password"  id="password" class="form-control">
                </div-->
                <label>Phone Number</label>
                <div class="input-group mb-3">
                  <input type="tel" name="phone"  id="phone" value="{{ $user->Cust_ContactNo }}" class="form-control" pattern="[0-9]{11}" required>
                </div>

                <label>Address</label>
                <div class="input-group mb-3">
                  <input type="address" name="address" id="address" value="{{ $user->Cust_Address }}" class="form-control" required>
                </div>
                <label>Birthday</label>
                <div class="input-group mb-3">
                  <input type="date"  id="bday" name="bday" class="form-control" value="{{ $user->Cust_Birthday }}" required>
                </div>

                <a id="changep" type="button" onclick="changepass()" class="pass">Edit Password?</a>
               

                <div id="changepass" style="display:none">
                  <hr style="border-top: 1px solid rgb(45, 45, 45);">
                  
                  <label>Current Password</label>
                  <div class="input-group mb-3">
                    <input type="password" name="pass"  id="pass" class="form-control">
                    <input type="hidden" value="{{ $user->Cust_pass }}" required name="passold"  id="passold" class="form-control">
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

                </div>
                
                <div class="text-center">
                  <button id="updatebtn" class="btn btn-lg btn-rounded w-100 mt-4 mb-0">Update Customer Record</button>
                </div>
              </form>
            </div>
            @endforeach
            </div>
              
          </div>
      </div>
      </div>


            
</form>

</div>

  </main>
  
<script>

function changepass() {

  var x = document.getElementById("changepass");
  if (x.style.display == "none") {
    x.style.display = "block";
    document.getElementById("changep").innerHTML ="Cancel Edit Password";
    document.getElementById("pass").required = true;
    document.getElementById("newpass").required = true;
    document.getElementById("oldpass").required = true;
  } else {
    x.style.display = "none";
    document.getElementById("changep").innerHTML ="Edit Password"
    document.getElementById("pass").required = false;
    document.getElementById("newpass").required = false;
    document.getElementById("oldpass").required = false;
    
  }

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
    document.getElementById('setDP').src="DP/"+oldpic;
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
  document.getElementById('setDP').src="DP/"+(pic);
  

});

</script>


</body>

@endsection

