<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
	@include('frontend.include.frontend_css')
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Shop - 1 Column | Canvas</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		

		<!-- Header
		============================================= -->
        @include('frontend.include.frontend_header')
	

		<!-- Page Title
		============================================= -->
        @yield('page_title')
        
		
		<!-- Content
		============================================= -->
		@yield('content')
		<!-- Footer
		============================================= -->
		@include('frontend.include.frontend_footer')


	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- JavaScripts
	============================================= -->
	@include('frontend.include.frontend_js')

</body>
</html>