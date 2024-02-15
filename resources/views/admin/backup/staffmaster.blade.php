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
   <!-- (//'admin.manager.dashboard')-->
   @yield('content')
  </main>
  
  @include('admin.staffscript')
</body>

</html>