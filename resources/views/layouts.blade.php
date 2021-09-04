    @include('_partials.backend_header')
    
    @include('_partials.backend_loader')
    
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('_partials.backend_page_header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        
        @include('_partials.backend_sidebar')

        <!-- Page Sidebar Ends-->
        @yield('content')
        <!-- footer start-->
        @include('_partials.backend_footer')

      </div>
    </div>
    <!-- latest jquery-->
    @include('_partials.backend_js')
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>