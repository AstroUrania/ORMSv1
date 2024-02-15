
<div class="container-fluid py-4">
    <div class="row">

    <div class="col-xl-6 col-sm-6 mb-4"> 
        <button class="card w-100" onclick="window.location='/rcustomers'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Total Customers</p>
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



      <div class="col-xl-6 col-sm-6 mb-6"> 
      <button class="card w-100"  onclick="window.location='/rpromo'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Promos & Discounts</p>
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
      
    <div class="col-xl-4 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Total Orders</p>
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
      <div class="col-xl-4 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Completed Orders</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($completedOR)}}
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
      
      <div class="col-xl-4 col-sm-6 mb-6"> 
      <button class="card w-100"  onclick="window.location='/rorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Pending Orders</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($pendingOR)}}
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
      <div></div>

      <div class="col-xl-5 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservation'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Room Reservations</p>
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

      <div class="col-xl-7 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservation'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Room Reservations To be Approved</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($tbarmres)}}
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

      <div class="col-xl-5 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservation'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Pending Room Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($pendingrmres)}}
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

      <div class="col-xl-7 col-sm-6 mb-6"> 
      <button class="card w-100"  onclick="window.location='/rreservation'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Completed Room Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($completedrmres)}}
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
<div></div>
      <div class="col-xl-5 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservationtb'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Table Reservations</p>
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

      <div class="col-xl-7 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservationtb'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Table Reservations To be Approved</p>
                  <h2 class="font-weight-bolder mb-0">
                  {{ count($tbatbres)}}
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

      <div class="col-xl-5 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservationtb'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Pending Table Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                  {{ count($pendingtbres)}}
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

      <div class="col-xl-7 col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/rreservationtb'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Completed Table Reservations</p>
                  <h2 class="font-weight-bolder mb-0">
                  {{ count($completedtbres)}}
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
      
    
  </div>

  <script>
    var element = document.getElementById("dashboard");
  element.classList.add("active");
    </script>
