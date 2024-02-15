<!-- Navbar -->      
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
<div class="container-fluid py-1 px-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <!--li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li-->
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page"></li>
  </ol>
  <!--h6 class="font-weight-bolder mb-0">Dashboard</h6-->
</nav>
<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
<!----------------SEARCH BAR------------>
  <div class="ms-md-auto pe-md-3 d-flex align-items-center">
    <!--div class="input-group">
      <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
      <input type="text" class="form-control" placeholder="Type here...">
    </div-->
  </div>
  
<!----------------ACCOUNT------------>
  <ul class="navbar-nav  justify-content-end">
    <li class="nav-item d-flex align-items-center">
      <div class="w3-dropdown-click">
      <a href="javascript:;"  onclick="myFunction()" class="nav-link text-body font-weight-bold px-0">
        <i class="fa fa-user me-sm-1"></i>
        <span class="d-sm-inline d-none"> {{ Session::get('staff')['Staff_Name'] }} </span>
      </a>

      <ul id="Demo" style="min-width:8rem" class="w3-dropdown-content w3-bar-block border-radius-md dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4">
        @if (Session::get('staff')['Staff_Position']=="Manager")
        <li class="nav-item d-flex align-items-center"><a href="/profile" class="w3-bar-item w3-button border-radius-md">Profile</a></li>
        @elseif (Session::get('staff')['Staff_Position']=="Reception")
        <li class="nav-item d-flex align-items-center"><a href="/rprofile" class="w3-bar-item w3-button border-radius-md">Profile</a></li>
        @elseif (Session::get('staff')['Staff_Position']=="Delivery Person")
        <li class="nav-item d-flex align-items-center"><a href="/dprofile" class="w3-bar-item w3-button border-radius-md">Profile</a></li>
        @elseif (Session::get('staff')['Staff_Position']=="Kitchen Staff")
        <li class="nav-item d-flex align-items-center"><a href="/kprofile" class="w3-bar-item w3-button border-radius-md">Profile</a></li>
        @endif
        <li class="nav-item d-flex align-items-center"><a href="/stafflogout" class="w3-bar-item w3-button border-radius-md">Logout</a></li>
        
      </ul>
    </div>
    </li>
    
<!----------------TOGGLER------------>
    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
        <div class="sidenav-toggler-inner">
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
          <i class="sidenav-toggler-line"></i>
        </div>
      </a>
    </li>

<!--------------SETTINGS------------
    <li class="nav-item px-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0">
      <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle>
      <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>

      </a>
    </li>-->
<!----------------NOTIFICATIONS-----------
    <li class="nav-item dropdown pe-2 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
      <svg width="12" height="12" stroke-width="1.5" viewBox="0 0 24 24" fill="gray" xmlns="http://www.w3.org/2000/svg"> <path d="M18.1336 11C18.7155 16.3755 21 18 21 18H3C3 18 6 15.8667 6 8.4C6 6.70261 6.63214 5.07475 7.75736 3.87452C8.88258 2.67428 10.4087 2 12 2C12.3373 2 12.6717 2.0303 13 2.08949" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="white"></path> <path d="M19 8C20.6569 8 22 6.65685 22 5C22 3.34315 20.6569 2 19 2C17.3431 2 16 3.34315 16 5C16 6.65685 17.3431 8 19 8Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="white"></path> <path d="M13.73 21C13.5542 21.3031 13.3019 21.5547 12.9982 21.7295C12.6946 21.9044 12.3504 21.9965 12 21.9965C11.6496 21.9965 11.3054 21.9044 11.0018 21.7295C10.6982 21.5547 10.4458 21.3031 10.27 21" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="white"></path> </svg>      
    
    </a>
      <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
      <!
        <li class="mb-2">
          <a class="dropdown-item border-radius-md" href="javascript:;">
            <div class="d-flex py-1">

              <div class="d-flex flex-column justify-content-center">
                <h6 class="text-sm font-weight-normal mb-1">
                  <span class="font-weight-bold">Name </span>Type
                </h6>
                <p class="text-xs text-secondary mb-0">
                  <i class="fa fa-circle me-1"></i>
                  Remaining: 
                </p>
                <p class="text-xs text-secondary mb-0">
                  <i class="fa fa-clock me-1"></i>
                  Expiring on: 
                </p>
              </div>
            </div>
          </a>
        </li>--
      </ul>
    </li>-->


  </ul>
</div>
</div>
</nav>
<!-- End Navbar -->
