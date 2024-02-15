<?php 
use App\Http\Controllers\MenuController;
$carttotal=0;
if(Session::has('user'))
{
  $carttotal=MenuController::cartitem();
}
elseif(Session::has('guests'))
{
  $carttotal=MenuController::cartitem();
}
  $cat=MenuController::menucategory();
  $info=MenuController::restaurantinfo();

?>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark"  STYLE="position: -webkit-sticky;position:sticky; top:0px; z-index:5; padding:0px">
    <div class="container-fluid">

      @foreach ($info as $info)
      <a class="navbar logo" style="margin-bottom:10px" href="#"><img class="" src = "storage/Logo/{{$info->DP}}" alt="logo" 
      style="height: 50px;"></a>
       @endforeach
      

      <!--button for expanding by toggle-->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button> 
      

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
            
    
    </ul>
         
     <!--DROP DOWN-->
          <!--li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li-->

    <ul class = "narv nav navbar-nav navbar-right">
        <li class="nav-item"> <a class="nav-link"  aria-current="page" href="/"> Home </a> </li>

          <!--Menu-->
         <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Menu
            </a>
            <ul class="dropdown-menu">
              @foreach ($cat as $cat)
              <li><a class="dropdown-item" href="/#{{$cat->MenuCategory_Name}}">{{$cat->MenuCategory_Name}}</a></li>
              @endforeach
            </ul>
          </li>

          
       <!--Reservation-->
       <li class="nav-item dropdown">  
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"  aria-expanded="false"> 
              Reservation <!--span class="caret"></span--></a>
            <ul class="dropdown-menu">
              <li><a  class="dropdown-item" href="/rooms">Room Reservation</a></li>
              <li><a  class="dropdown-item"  href="/tables">Table Reservation</a></li>
            </ul>
          </li>

          <!--history-->
          @if(Session::has('user'))
          <li>  
            <a class="nav-link" href="/history"> History </a>
          </li>
          @else
          @endif
          
          
          
          <!--help-->
          <li class="nav-item"> <a class="nav-link" href="#"> Help </a> </li>
       
          <!--Search>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form-->

        <!--CART-->
        @if(Session::has('user')) 
            <li class="nav-item"><a class="nav-link" href="/cart">Cart({{ $carttotal }})</a></li>
        @elseif(Session::has('guests'))
            <li class="nav-item"><a class="nav-link" href="/cart">Cart({{ $carttotal }})</a></li>
        @else
        <li class="nav-item"> <a class="nav-link" href="/login">Cart(0)</a> </li>
        @endif

        <!--DROPDOWN-->
        @if(Session::has('user'))
        <li class="nav-item dropdown">  
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" href="#"  aria-expanded="false"> 
            {{ Session::get('user')['Customer_Name'] }}</a>
          <ul class="dropdown-menu">
            <li><a  class="dropdown-item" href="userprofile">User Profile</a></li>
            <li><a  class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item"> <a class="nav-link" href="/login">Login</a> </li>
        @endif
      </ul>

      </div>
    </div>
  </nav>

  