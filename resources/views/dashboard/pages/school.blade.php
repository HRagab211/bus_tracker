
@include('dashboard.layouts.head');

<body class="g-sidenav-show  bg-gray-100">
  
  @include('dashboard.layouts.sidebar');
  
  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('dashboard.layouts.navbar');


    <div class="container text-center">
        <div style="display: flex; justify-content: space-between;" >
            <h1> School</h1>
            <button type="button" class="btn btn-success">Save</button>
            <hr>
        </div> 
        <hr class="w-60" color="black"  >
        {{-- Inputs --}}
        <div class="form-group pmd-textfield pmd-textfield-floating-label w-60">
            <input type="text" id="help1" placeholder="School name" class="form-control">
        </div>
        <div class="form-group pmd-textfield pmd-textfield-floating-label w-60">
            <input type="text" id="help1" placeholder="School Address" class="form-control">
        </div>
            
        
    </div>







    
      
</div>
</main>
<!--   Core JS Files   -->
@include('dashboard.layouts.scripts');

</body>

</html>