<style>
  
  @media print {

body *{
  visibility:hidden;
}
.print-container{
  visibility:visible;

}

/* .print-container {
  position:absolute;
  left:0px;
  top:0px;
}*/

}
</style>
<div class="container-fluid py-4">

<!--p class="receipt__date" id="currdate"></p-->

<input type="hidden" name="jan" id="jan" value="{{$jan}}">
<input type="hidden" name="feb" id="feb" value="{{($feb)}}">
<input type="hidden" name="mar" id="mar" value="{{($mar)}}">
<input type="hidden" name="apr" id="apr" value="{{($apr)}}">
<input type="hidden" name="may" id="may" value="{{($may)}}">
<input type="hidden" name="jun" id="jun" value="{{($jun)}}">
<input type="hidden" name="jul" id="jul" value="{{($jul)}}">
<input type="hidden" name="aug" id="aug" value="{{($aug)}}">
<input type="hidden" name="sep" id="sep" value="{{($sep)}}">
<input type="hidden" name="oct" id="oct" value="{{($oct)}}">
<input type="hidden" name="nov" id="nov" value="{{($nov)}}">
<input type="hidden" name="dec" id="dec" value="{{($dec)}}">

<input type="hidden" name="rjan" id="rjan" value="{{($rjan)}}">
<input type="hidden" name="rfeb" id="rfeb" value="{{($rfeb)}}">
<input type="hidden" name="rmar" id="rmar" value="{{($rmar)}}">
<input type="hidden" name="rapr" id="rapr" value="{{($rapr)}}">
<input type="hidden" name="rmay" id="rmay" value="{{($rmay)}}">
<input type="hidden" name="rjun" id="rjun" value="{{($rjun)}}">
<input type="hidden" name="rjul" id="rjul" value="{{($rjul)}}">
<input type="hidden" name="raug" id="raug" value="{{($raug)}}">
<input type="hidden" name="rsep" id="rsep" value="{{($rsep)}}">
<input type="hidden" name="roct" id="roct" value="{{($roct)}}">
<input type="hidden" name="rnov" id="rnov" value="{{($rnov)}}">
<input type="hidden" name="rdec" id="rdec" value="{{($rdec)}}">

<input type="hidden" name="tjan" id="tjan" value="{{Count($tjan)}}">
<input type="hidden" name="tfeb" id="tfeb" value="{{Count($tfeb)}}">
<input type="hidden" name="tmar" id="tmar" value="{{Count($tmar)}}">
<input type="hidden" name="tapr" id="tapr" value="{{Count($tapr)}}">
<input type="hidden" name="tmay" id="tmay" value="{{Count($tmay)}}">
<input type="hidden" name="tjun" id="tjun" value="{{Count($tjun)}}">
<input type="hidden" name="tjul" id="tjul" value="{{Count($tjul)}}">
<input type="hidden" name="taug" id="taug" value="{{Count($taug)}}">
<input type="hidden" name="tsep" id="tsep" value="{{Count($tsep)}}">
<input type="hidden" name="toct" id="toct" value="{{Count($toct)}}">
<input type="hidden" name="tnov" id="tnov" value="{{Count($tnov)}}">
<input type="hidden" name="tdec" id="tdec" value="{{Count($tdec)}}">

    <div class="row">

    <div class="col-xl-3 col-sm-6 mb-4"> 
        <button class="card w-100">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Total Users</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($customers)+count($staff)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

    <div class="col-xl-3 col-sm-6 mb-4"> 
        <button class="card w-100" onclick="window.location='/customers'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Total Customers</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($customers)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
        <button class="card w-100" onclick="window.location='/staffmembers'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Total Staff</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($staff)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
        <button class="card w-100"  onclick="window.location='/menu'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Available Menu</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($menuavail)}}
                    <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/orders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Total Orders</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($orders)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/reservation'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Room Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($rmreservations)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/reservationtb'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Table Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                  {{ count($tbreservations)}}
                  <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="col-xl-3 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/promo'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-m mb-0 text-capitalize font-weight-bold">Promos & Discounts</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($promo)}}
                    <span class="text-danger text-sm font-weight-bolder"></span>
                  </h2>
                </div>
              </div>
              <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                  <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
      </button>
      </div>

      <div class="row mt-4">
      <!--div class="col-lg-5 mb-lg-0 mb-4"-->
      <div class="col-xl-8 col-sm-6 mb-4">
        <div class="card z-index-2">
            
        <div class="row">
          <h2 class="ms-2 mt-4 mb-0 w-40"> Order Sales Report </h2>    
            <a href="/orderreports"  class="btn btn-outline-success btn-sm me-3 mt-4 mb-0 w-25">This month's best sellers</a>
            <a href="/monthlysales"  class="btn btn-outline-success btn-sm me-3 mt-4 mb-0 w-25">Monthly Sales</a>
                </div>
               <div class="card-body p-3">
            <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
            <p class="text-sm ms-2">  </p>
            <div class="container border-radius-lg">
              <div class="row">
      
                <div class="col-3 py-3 ps-0">
                  <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                      <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Completed Orders</p>
                  </div>
                  <h4 class="font-weight-bolder">{{ count($completedOR)}}</h4>
                  <!--div class="progress w-{{ count($completedOR)}}">
                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div-->
                </div>
          
                <div class="col-3 py-3 ps-0">
                  <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                      <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Pending Orders</p>
                  </div>
                  <h4 class="font-weight-bolder">{{ count($pendingOR)}}</h4>
                </div>

              </div>
            </div>

              </div>
            </div>
          </div>

          
          <div class="col-xl-4 col-sm-6 mb-4 print-container" style="height:400px; overflow:auto">
          <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Best Selling Menu</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sales</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">number of purchase</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bestseller as $bs)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="storage/Menupics/{{$bs->Menu_pic}}" class="avatar avatar-sm me-3" alt="xd">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$bs->Menu_Name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> {{$bs->total}} </span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$bs->Occurences}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
        </div>


    <div class="row mt-4">
      <!--div class="col-lg-5 mb-lg-0 mb-4"
    <div class="col-xl-12 col-sm-6 mb-4">-->
      <div>
        <div class="card z-index-2">
        <div class="row">
          <h2 class="ms-2 mt-4 mb-0 w-65"> Reservation Sales Report </h2>    
            <a  href="/rmonthlysales" type="button" class="btn btn-outline-success btn-sm me-3 mt-4 mb-0 w-25">Print Room Reservation Sales Report</a>
                </div>   
               <div class="card-body p-3">
            <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
              <div class="chart">
                <canvas id="chart-bars2" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
            <p class="text-sm ms-2">  </p>
            <div class="container border-radius-lg">
              <div class="row">

                <div class="col-3 py-3 ps-0">
                  <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                      <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Completed Table Reservations</p>
                  </div>
                  <h4 class="font-weight-bolder">{{ count($completedtbres)}}</h4>
                </div>
          
                <div class="col-3 py-3 ps-0">
                  <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                      <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g transform="translate(1716.000000, 291.000000)">
                              <g transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">Pending Table Reservations</p>
                  </div>
                  <h4 class="font-weight-bolder">{{ count($pendingtbres)}}</h4>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
     
    <!--div class="col-xl-4 col-sm-6 mb-4">
              <div class="table-responsive">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Best Selling Rooms</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sales</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">number of purchase</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($bestseller as $bs)
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="storage/Menupics/{{$bs->Menu_pic}}" class="avatar avatar-sm me-3" alt="xd">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$bs->Menu_Name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-xs font-weight-bold"> {{$bs->total}} </span>
                      </td>
                      <td class="align-middle text-center">
                        <div class="progress-wrapper w-75 mx-auto">
                          <div class="progress-info">
                            <div class="progress-percentage">
                              <span class="text-m font-weight-bold">{{$bs->Occurences}}</span>
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>



            </div-->
            </div>
                
      </div> 
    </div>

        </div>
      </div> 
    </div>
    
    
  </div>

  <script>
    var element = document.getElementById("dashboard");
  element.classList.add("active");
    </script>

    
  <!--   Core JS Files   -->
  <script src="staff/assets/js/plugins/chartjs.min.js"></script>
  <script>
        var jan=document.getElementById('jan').value;
        var feb=document.getElementById('feb').value;
        var mar=document.getElementById('mar').value;
        var apr=document.getElementById('apr').value;
        var may=document.getElementById('may').value;
        var jun=document.getElementById('jun').value;
        var jul=document.getElementById('jul').value;
        var aug=document.getElementById('aug').value;
        var sep=document.getElementById('sep').value;
        var oct=document.getElementById('oct').value;
        var nov=document.getElementById('nov').value;
        var dec=document.getElementById('dec').value;


    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [jan,feb,mar,apr,may,jun,jul,aug,sep,oct,nov,dec],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-bars2").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        var rjan=document.getElementById('rjan').value;
        var rfeb=document.getElementById('rfeb').value;
        var rmar=document.getElementById('rmar').value;
        var rapr=document.getElementById('rapr').value;
        var rmay=document.getElementById('rmay').value;
        var rjun=document.getElementById('rjun').value;
        var rjul=document.getElementById('rjul').value;
        var raug=document.getElementById('raug').value;
        var rsep=document.getElementById('rsep').value;
        var roct=document.getElementById('roct').value;
        var rnov=document.getElementById('rnov').value;
        var rdec=document.getElementById('rdec').value;

        var tjan=document.getElementById('tjan').value;
        var tfeb=document.getElementById('tfeb').value;
        var tmar=document.getElementById('tmar').value;
        var tapr=document.getElementById('tapr').value;
        var tmay=document.getElementById('tmay').value;
        var tjun=document.getElementById('tjun').value;
        var tjul=document.getElementById('tjul').value;
        var taug=document.getElementById('taug').value;
        var tsep=document.getElementById('tsep').value;
        var toct=document.getElementById('toct').value;
        var tnov=document.getElementById('tnov').value;
        var tdec=document.getElementById('tdec').value;

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Jan", "Feb", "Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Room Reservation Sales",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [rjan,rfeb,rmar,rapr,rmay,rjun,rjul,raug,rsep,roct,rnov,rdec],
            maxBarThickness: 6

          },
          {
            label: "Number of Table Reservations",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [tjan,tfeb,tmar,tapr,tmay,tjun,tjul,taug,tsep,toct,tnov,tdec],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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
    </script>

    