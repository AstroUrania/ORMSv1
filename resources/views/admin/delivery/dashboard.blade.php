
<div class="container-fluid py-4">
    <div class="row">

      <div class="col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/dorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Total Deliveries</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($dorders)}}
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

      <div class="col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/dorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Completed Deliveries</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($completeddorders)}}
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

      <div class="col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/dorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Being Prepared in the Kitchen</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($kitchendorders)}}
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

      <div class="col-sm-6 mb-4"> 
      <button class="card w-100"  onclick="window.location='/dorders'">
          <div class="card-body p-3 w-100">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-lg mb-0 text-capitalize font-weight-bold">Pending Deliveries</p>
                  <h2 class="font-weight-bolder mb-0">
                    {{ count($pendingdorders)}}
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
    
  </div>

  <script>
    var element = document.getElementById("dashboard");
  element.classList.add("active");
    </script>
