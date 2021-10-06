       

       <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/plugins.min.js')}}"></script>

	<script src="{{asset('frontend/js/custom.js')}}"></script>
       
	<!-- Footer Scripts
	============================================= -->
	<script src="{{asset('frontend/js/functions.js')}}"></script>
	<script src="{{asset('frontend/js/custom.js')}}"></script>
 {{-- toaster js --}}
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
	<script>
        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            //"positionClass": "toast-bottom-left",
        }
                toastr.success("{{ session('message') }}");
        @endif
    
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.error("{{ session('error') }}");
        @endif
    
        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.info("{{ session('info') }}");
        @endif
    
        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
                toastr.warning("{{ session('warning') }}");
        @endif
  </script>