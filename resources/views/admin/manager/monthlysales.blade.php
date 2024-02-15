<!DOCTYPE html>
<html lang="en">
    
<?php 
      use App\Http\Controllers\guestscontroller;      
      // PHP headers (at the top)
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        
     //   $output = "Hello world";
     //   echo json_encode($output);
      ?>

<head>
    
  @include('admin.staffcss')     

<style>
  
  @media print {
    body *{
                visibility:hidden;
              }
              .print-container, .print-container *{
                visibility:visible;
              
              }

             /* .print-container {
                position:absolute;
                left:0px;
                top:0px;
              }*/

}
</style>
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
          </div>
            <!--------------ADD ORDER------------------->

          <div class="col-6 text-end">
          <button type="button"  class="btn bg-gradient-success btn-sm mb-3"style="padding:3px; font-size:small; margin:auto" onclick="window.print();">PRINT</button>

            </div>
          </div>
        </div>

    <div class="card-body px-0 pt-0 pb-2 row print-container" style="margin:10px;">
          <div class="table-responsive p-0">
          <div class="mb-2"style="text-align:center; border-bottom:1px solid green"><h2>Monthly Order Sales</h2></div>

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Month</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Sales</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">January</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$jan}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">Fenruary</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$feb}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">March</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$mar}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">April</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$apr}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">May</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$may}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">June</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$jun}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">July</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$jul}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">August</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$aug}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                                        <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">September</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$sep}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">October</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$oct}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">November</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$nov}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                    <td class="align-middle text-center text-sm">
                        <div class="d-flex px-2 py-1">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-m">December</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$dec}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td class="align-middle text-center">
                            <div class=" pb-0 p-3" style="padding-bottom:10px">
                                <h4>Total Sales: ₱{{$sum}}</h4>
                        </div>
                    </td>
                    </tr>
                  </tbody> 
                </table>
              </div>

            </div>

        </div>
     
            </div>
            </div> 
        </div>
@include('admin.stafffooter')
</main>
 
@include('admin.staffscript')

  <script>
    var element = document.getElementById("dashboard");
  element.classList.add("active");
    </script>

    
  <!--   Core JS Files   -->
  <script src="staff/assets/js/plugins/chartjs.min.js"></script>

      <script>
      //document.getElementById("currdate").innerHTML = Date();
      $(document).ready(function () {
        $("#datatable").DataTable();
      });

      date = new Date();
      year = date.getFullYear();
      month = 9;
      day = date.getDate();
      document.getElementById("currdate").innerHTML =
        month + "/" + day + "/" + year;

        
  $(document).ready( function () {
      $('#datatable').DataTable(
        {order: [[0, 'desc']]}
      );
  } );
    </script>

</body>

</html>
