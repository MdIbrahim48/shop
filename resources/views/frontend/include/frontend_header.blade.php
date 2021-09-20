<!-- Header
		============================================= -->
		<header id="header" class="full-header">
			<div id="header-wrap">
				<div class="container">
					<div class="header-row">

						<!-- Logo
						============================================= -->
						<div id="logo">
							<a href="{{url('/')}}" class="standard-logo" data-dark-logo="{{asset('frontend/images/logo-dark.png')}}"><img src="{{asset('frontend/images/logo.png')}}" alt="Canvas Logo"></a>
							<a href="{{url('/')}}" class="retina-logo" data-dark-logo="{{asset('frontend/images/logo-dark@2x.png')}}"><img src="{{asset('frontend/images/logo@2x.png')}}" alt="Canvas Logo"></a>
						</div><!-- #logo end -->

						<div class="header-misc">

							<!-- Top Search
							============================================= -->
							<div id="top-search" class="header-misc-icon">
								<a href="#" id="top-search-trigger"><i class="icon-line-search"></i><i class="icon-line-cross"></i></a>
							</div><!-- #top-search end -->

							<!-- Top Cart
							============================================= -->
							<div id="top-cart" class="header-misc-icon d-none d-sm-block">
								<a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">{{Cart::instance('addtoCart')->count()}}</span></a>
								<div class="top-cart-content">
									<div class="top-cart-title">
										<h4>Shopping Cart</h4>
									</div>
									<div class="top-cart-items">
										@foreach (Cart::instance('addtoCart')->content() as $item)
										<div class="top-cart-item">
											<div class="top-cart-item-desc">
												<div class="top-cart-item-desc-title">
													<a href="#">{{$item->name}}</a>
													<span class="top-cart-item-price d-block">{{$item->price}}</span>
												</div>
												<div class="top-cart-item-quantity">{{$item->qty}}</div>
											</div>
										</div>
										@endforeach
									</div>
									<div class="top-cart-action">
										<span class="top-checkout-price">{{Cart::subtotal()}}</span>
										<a href="{{route('show.cart')}}" class="button button-3d button-small m-0">View Cart</a>
									</div>
								</div>
							</div><!-- #top-cart end -->
							<div class="login"><a href="{{route('customer.index')}}"><i class="fas fa-user"></i>login</a></div>

						</div>

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu">

							<ul class="menu-container">
								<li class="menu-item">
									<a class="menu-link" href="{{url('/')}}"><div>Home</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item">
											<a class="menu-link" href="intro.html#section-niche"><div>Niche Demos</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="intro.html#section-onepage"><div>One-Page Demos</div></a>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="index-corporate.html"><div>Home - Corporate</div></a>
											<ul class="sub-menu-container">
												<li class="menu-item">
													<a class="menu-link" href="index-corporate.html"><div>Corporate - Layout 1</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-corporate-2.html"><div>Corporate - Layout 2</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-corporate-3.html"><div>Corporate - Layout 3</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-corporate-4.html"><div>Corporate - Layout 4</div></a>
												</li>
											</ul>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="index-portfolio.html"><div>Home - Portfolio</div></a>
											<ul class="sub-menu-container">
												<li class="menu-item">
													<a class="menu-link" href="index-portfolio.html"><div>Portfolio - Layout 1</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-portfolio-2.html"><div>Portfolio - Layout 2</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-portfolio-3.html"><div>Portfolio - Masonry</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-portfolio-4.html"><div>Portfolio - AJAX</div></a>
												</li>
											</ul>
										</li>
										<li class="menu-item">
											<a class="menu-link" href="index-fullscreen-image.html"><div>Home - Full Screen</div></a>
											<ul class="sub-menu-container">
												<li class="menu-item">
													<a class="menu-link" href="index-fullscreen-image.html"><div>Full Screen - Image</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-fullscreen-slider.html"><div>Full Screen - Slider</div></a>
												</li>
												<li class="menu-item">
													<a class="menu-link" href="index-fullscreen-video.html"><div>Full Screen - Video</div></a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								@foreach ($category as $item)
								<li class="menu-item">
									<a class="menu-link" href="{{route('category',$item->slug)}}"><div>{{$item->name}}</div></a>
									<ul class="sub-menu-container">
										@foreach ($item->subcategory as $key => $subItem)
										<li class="menu-item">
											<a class="menu-link" href="{{route('category.item',['slug'=>$subItem->slug])}}"><div>{{$subItem->name}}</div></a>
										</li>
										@endforeach
									</ul>
								</li>
								@endforeach
								
							</ul>

						</nav><!-- #primary-menu end -->

						<form class="top-search-form" action="{{route('search')}}" method="post">
							@csrf
							<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter.." autocomplete="off">
						</form>

					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->