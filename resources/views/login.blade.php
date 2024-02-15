@extends('master')
@section('content')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">


<body class="bodylog">
  
<div class="align-items-center cardpadd">
<div class="container h-50 order card" style="max-width:400px;">
<div class="card-body p-4">
    <div id="alertz" style="z-index:3">

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
        <form class="loginform" action="/login" method="POST">

            <h1 class="loginh1">CUSTOMER LOGIN</h1>
            <!--EMAIL-->        
            <div class="txt_field">
                @csrf
            <label for="exampleInputEmail1"></label>
            <input type="email" required name="cemail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <span></span>
            <label>Email</label>
            <div id="emailHelp" class="form-text"></div>
            </div>

            <!--PASSWORD-->
          <div style="display:flex">
          <div style="width:90%" class="txt_field">
            <label for="exampleInputPassword1"></label>
            <input type="password" required name="cpassword" class="form-control" id="exampleInputPassword1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
            <span></span>
            <label>Password</label>
            </div>            
        <!--button style="width:10%; background-color:transparent" type="button" onclick="myFunction()"><i class="fa fa-eye"></i></button--->

        </div>

            <!--forgot password-->
            <div class="pass">Forgot Password?</div>
            <input type="submit" value="Login">
            <div class="link">
                Not a member? <a href="/register">Signup</a><br><br>
                <!--a href="/stafflogin">Login as Staff</a-->
              </div>
            
            <!--CHECKBUTTON-->
            <!--<div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>--> 
            <!--SUBMITBUTTON-->   
            
            <!--button type="submit" class="btn btn-primary">Login</button-->
        </form>

    </div></div></div>
</body>

<script>
    window.setTimeout(function() {
  $( "#alertz" ).fadeIn( 300 ).delay( 1000 ).fadeOut( 400 );
}, 1000);

    </script>

<script>
    function myFunction() {
      var x = document.getElementById("exampleInputPassword1");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }
    </script>

@endsection