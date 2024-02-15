@extends('master')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">

<body class="bodyreg"> 
  
<div class="align-items-center cardpadd">
<div class="container h-50 order card" style="max-width:400px;">
<div class="card-body p-4">
  <!--------------ALERT------------------->    
  <div id="alert">
 
    @if(Session::has('success')) 
      <div class="alert alert-good alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ Session::get('success')}}</strong>
      </div>

      @elseif(Session::has('warning')) 
      <div class="alert alert-warning alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>    
          <strong>{{ Session::get('warning')}}</strong>
      </div>
      @endif
       
    </div>
        <form class="loginform" action="/staffregister" method="POST">
        @csrf
            <h2 class="loginh1">STAFF REGISTRATION </h2>
        <div style="overflow:scroll">
            <!--NAME-->    
            <div class="flex-children">    
            <div class="txt_field">
                <label for="name"></label>
                <input type="text" required name="name" placeholder="Staff Name" class="form-control" id="email" aria-describedby="emailHelp">
                <label>Name</label>
                <div id="name" class="form-text" ></div>
                </div>

            <!--EMAIL-->        
            <div class="txt_field">
            <label for="email"></label>
            <input type="email" required name="email" placeholder="staff@email.com"class="form-control" id="email" aria-describedby="emailHelp">
            <label>Email</label>
            <div id="emailHelp" class="form-text"></div>
            </div>
        </div>

            <!--PASSWORD-->
            <div style="display:flex">
              <div style="width:90%;margin-bottom:0px" class="txt_field">
                <label for="password"></label>
            <input type="password" required name="password" placeholder="***********"class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
            <label>Password</label>
            </div>
            <button style="width:10%; background-color:transparent" type="button" onclick="myFunction()"><i class="fa fa-eye"></i></button>
          </div>
          <P style="font-size:80%; width:95%;color:rgb(146, 146, 146);margin:auto">*Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters</P>


          <!--PASSWORD-->
          <div style="display:flex">
            <div style="width:90%" class="txt_field">
            <label for="Confirm Password"></label>
            <input type="password" required name="confirm" placeholder="***********"class="form-control" id="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
            <label>Confirm Password</label>
            </div>
            <button style="width:10%; background-color:transparent" type="button" onclick="myFunction2()"><i class="fa fa-eye"></i></button>
          </div>
            <!--PHONE       
            <div class="txt_field">
            <label for="phone"></label>
            <input type="tel" id="phone" name="phone" placeholder="09XXXXXXXXX" class="form-control" pattern="[0-9]{11}" required>
            <label>Phone Number</label> 
            </div>--> 

            <!--POSITION--> 
            <div>
            <div class="selectcss txt_field" style="background:none; border-radius:0rem">
            <label for="position"></label><select id='position' style="width:100%; " name="position" value="payment" required>
                <option value="">Position:</option>
                <option value="Manager">Manager</option>
                <option value="Reception">Reception</option>
                <option value="Delivery Person">Delivery Person</option>
                <option value="Kitchen Staff">Kitchen Staff</option>
            </select><label>Position</label>
            </div>
            </div>

            <!--BIRTHDAY        
            <div class="txt_field">
                <label for="address"></label>
                <input type="date" id="bday" name="bday" placeholder="dd-mm-yyy" class="form-control" required>
                <label>Birthday</label>
                </div>-->

            <!--DP      
            <div class="txt_field">
                <label for="DP"></label>
                <input type="file" id="DP" name="DP" placeholder="upload a profile picture" class="form-control">
                <label> Profile Picture </label>
                </div>-->  

            <!--ID>        
            <div class="txt_field">
                <label for="ID"></label>
                <input type="file" id="ID" name="ID" placeholder="upload a profile picture" class="form-control">
                <label>Picture of ID</label>
                </div-->


            <!--T$C-->
            <div class="pass">By clicking Register, you agree on our <a href="#">terms and condition</a>.</div>
            <input type="submit" value="Register">
            <div class="link">
                <a href="/stafflogin">Back to Login</a>
              </div>
            <!--CHECKBUTTON-->
            <!--<div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>--> 
            <!--SUBMITBUTTON-->   
            </div>  
            <!--button type="submit" class="btn btn-primary">Login</button-->
        </form>

        </div></div></div>
    <!--div style="height:700px"></div-->


<script>

      /*__________________________________________________________*/
  
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
    </script>
    <script>
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }

    function myFunction2() {
      var x = document.getElementById("password2");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>



</body>
@endsection