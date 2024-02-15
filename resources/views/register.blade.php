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
      @elseif(Session::has('error')) 
          <div class="alert alert-bad alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>    
              <strong>{{ Session::get('error')}}</strong>
          </div>
      @endif
      
    </div>
        <form class="loginform" action="/register" method="POST">
        @csrf
            <h2 class="loginh1">CUSTOMER REGISTRATION </h2>
        <div style="overflow:scroll">
            <!--NAME-->    
            <div class="txt_field">
                <label for="name"></label>
                <input type="text" required name="name" placeholder="Customer Name" class="form-control" id="email" aria-describedby="emailHelp">
                <label>Name</label>
                <div id="name" class="form-text" ></div>
                </div>

            <!--EMAIL-->        
            <div class="txt_field">
            <label for="email"></label>
            <input type="email" required name="email" placeholder="customer@email.com"class="form-control" id="email" aria-describedby="emailHelp">
            <label>Email</label>
            <div id="emailHelp" class="form-text"></div>
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

            <!--ADDRESS       
            <div class="txt_field">
                <label for="address"></label>
                <input type="text" id="address" name="address" placeholder="###-Address-Suite/Apartment-City-Country-Zip" class="form-control" required>
                <label>Full Address</label>
                </div>--> 

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


            <!--forgot password-->
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="register">
            <div class="link">
                <a href="/login">Back to Login</a>
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