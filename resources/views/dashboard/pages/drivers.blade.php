
@include('dashboard.layouts.head');
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<body class="g-sidenav-show  bg-gray-100">
  
  @include('dashboard.layouts.sidebar');
  
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.layouts.navbar');

    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Drivers table</h6>
          <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              Add new driver
            </button>
          </div>      <!-- Button trigger modal -->
            <div>
              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form>
                        <div class="form-group">
                          <input type="Text" class="form-control my-3" placeholder="Driver name">
                          <input type="Text" class="form-control my-3" placeholder="Driver phone">
                          <input type="Text" class="form-control my-3" placeholder="national ID">
                          <input type="Text" class="form-control my-3" placeholder="license">
                          <select class="form-control" >
                            <option>Bus selection </option>
                            @foreach ($buses as $bus )
                            <option value="{{ $bus->id }}">{{ $bus->bus_license }} </option>
                            @endforeach
                          </select>
                        </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>

              </div>
              
              <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group">
                  <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" placeholder="Search for driver">
                </div>
              </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NAME</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">last location</th>
                      <th class="text-secondary opacity-7">Bus License</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Verified?</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Edit</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Delete</th>
                    </tr>
                  </thead>
                  <tbody id="table">
               
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      {{-- @include('dashboard.layouts.footer'); --}}
      
    </div>
  </main>
  <!--   Core JS Files   -->
  @include('dashboard.layouts.scripts');
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>

$(document).ready(function () {
  displayall();
});

function displayall()
  {
    $.ajax({
      type: "GET",
      url: "{{ route('drivers.all') }}",
      dataType: "json",
      contentType: "application/json; charset=utf-8",
      success: function (response) {
        filldata(response);
      }
    });
  }



  function filldata(alldata){

    let table = document.getElementById('table');
    let c= 0;
    table.innerHTML=``;
    for (data of alldata) {
      
    table.innerHTML+=`
    <tr>
                        <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">${++c}</h6>
                              </div>
                            </div>
                          </td>
                      <td>
                       ${data.name}
                      </td>
                      <td>
                        ${data.phone}
                      </td>
                      <td>
                        35:6565:232:222
                      </td>
                      <td>
                        ${data.license}
                      </td>
                      <td>
                        ${data.verified}
                      </td>
                      <td>
                        ${data.created_at}
                      </td>
                      <td>
                        <button type="button" class="btn btn-outline-warning">Edit</button>
                    </td>
                      <td>
                        <button type="button" class="btn btn-outline-danger">Delete</button>
                    </td>
                  </tr>  
    
    `;
  }
}

</script>

</body>

</html>