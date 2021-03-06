@extends('frontend.layouts.master')

@section('page_title')
    <section id="page-title">
        <div class="container clearfix">
            <h1>Shop</h1>
            <span>Start Buying your Favourite Theme</span>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </div>
    </section>
@endsection

@section('content')
<section id="content">
	<div class="content-wrap">
		<div class="container clearfix">

			<div class="single-product">
				<div class="product">
					<div class="row gutter-40">

						<div class="col-md-5">

							<!-- Product Single - Gallery
							============================================= -->
							<div class="product-image">
								<div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
									<div class="flexslider">
										<div class="slider-wrap" data-lightbox="gallery">
											<div class="slide" data-thumb="{{asset('images/products/thumbnail/'.$product->thumbnail)}}"><a href="{{asset('images/products/thumbnail/'.$product->thumbnail)}}" title="Pink Printed Dress - Front View" data-lightbox="gallery-item"><img src="{{asset('images/products/thumbnail/'.$product->thumbnail)}}" alt="Pink Printed Dress"></a></div>
											@php
											  $featuredImage = explode('|',$product->featured_image);
											@endphp
											@foreach ($featuredImage as $key => $item)
											 <div class="slide" data-thumb="{{asset('images/products/featured_image/'.$item)}}"><a href="{{asset('images/products/featured_image/'.$item)}}" title="Pink Printed Dress - Side View" data-lightbox="gallery-item"><img src="{{asset('images/products/featured_image/'.$item)}}" alt="{{$item}}"></a></div> 
											@endforeach
										</div>
									</div>
								</div>
								<div class="sale-flash badge bg-danger p-2">Sale!</div>
							</div><!-- Product Single - Gallery End -->

						</div>

						<div class="col-md-5 product-desc">

							<div class="d-flex align-items-center justify-content-between">

								<!-- Product Single - Price
								============================================= -->
								<div class="product-price"><del>${{$product->price}}</del> <ins>${{$product->offer_price}}</ins></div><!-- Product Single - Price End -->

								<!-- Product Single - Rating
								============================================= -->
								<div class="product-rating">
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star3"></i>
									<i class="icon-star-half-full"></i>
									<i class="icon-star-empty"></i>
								</div><!-- Product Single - Rating End -->

							</div>

							<div class="line"></div>

							<!-- Product Single - Quantity & Cart Button
							============================================= -->
							<form action="{{route('add.cart')}}" class="cart mb-0 d-flex justify-content-between align-items-center" method="get"enctype='multipart/form-data'>
								@csrf
								<div class="quantity clearfix">
									<input type="button" value="-" class="minus">
									<input type="hidden" name="product_id" value="{{$product->id}}">
									<input type="hidden" name="name" value="{{$product->name}}">
									<input type="hidden" name="price" value="{{$product->price}}">
									<input type="hidden" name="offer_price" value="{{$product->offer_price}}">
									<input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" />
									<input type="button" value="+" class="plus">
								</div>
								<button type="submit" class="add-to-cart button m-0">Add to cart</button>
							</form><!-- Product Single - Quantity & Cart Button End -->

							<div class="line"></div>

							<!-- Product Single - Short Description
							============================================= -->
							<p>{{$product->short_description}}</p>
							{{-- <p>Perspiciatis ad eveniet ea quasi debitis quos laborum eum reprehenderit eaque explicabo assumenda rem modi.</p> --}}
							<ul class="iconlist">
								<li><i class="icon-caret-right"></i> Dynamic Color Options</li>
								<li><i class="icon-caret-right"></i> Lots of Size Options</li>
								<li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
							</ul><!-- Product Single - Short Description End -->

							<!-- Product Single - Meta
							============================================= -->
							<div class="card product-meta">
								<div class="card-body">
									<span itemprop="productID" class="sku_wrapper">SKU: <span class="sku">{{$product->product_id}}</span></span>
									<span class="posted_in">Category: <a href="#" rel="tag">{{$product->category->name}}</a>.</span>
									@php
										$tags = explode(',',$product->tag)
									@endphp
									<br><span class="tagged_as">Tags: 
										@foreach ($tags as $item)
										<a href="#" rel="tag">{{$item}}</a>
										@endforeach 
									</span>
								</div>
							</div><!-- Product Single - Meta End -->

							<!-- Product Single - Share
							============================================= -->
							<div class="si-share border-0 d-flex justify-content-between align-items-center mt-4">
								<span>Share:</span>
								<div>
									<a href="#" class="social-icon si-borderless si-facebook">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="#" class="social-icon si-borderless si-twitter">
										<i class="icon-twitter"></i>
										<i class="icon-twitter"></i>
									</a>
									<a href="#" class="social-icon si-borderless si-pinterest">
										<i class="icon-pinterest"></i>
										<i class="icon-pinterest"></i>
									</a>
									<a href="#" class="social-icon si-borderless si-gplus">
										<i class="icon-gplus"></i>
										<i class="icon-gplus"></i>
									</a>
									<a href="#" class="social-icon si-borderless si-rss">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#" class="social-icon si-borderless si-email3">
										<i class="icon-email3"></i>
										<i class="icon-email3"></i>
									</a>
								</div>
							</div><!-- Product Single - Share End -->

						</div>

						<div class="col-md-2">

							<a href="#" title="Brand Logo" class="d-none d-md-block"><img src="{{asset('frontend/images/shop/brand.jpg')}}" alt="Brand Logo"></a>

							<div class="divider divider-center"><i class="icon-circle-blank"></i></div>

							<div class="feature-box fbox-plain fbox-dark fbox-sm">
								<div class="fbox-icon">
									<i class="icon-thumbs-up2"></i>
								</div>
								<div class="fbox-content fbox-content-sm">
									<h3>100% Original</h3>
									<p class="mt-0">We guarantee you the sale of Original Brands.</p>
								</div>
							</div>

							<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
								<div class="fbox-icon">
									<i class="icon-credit-cards"></i>
								</div>
								<div class="fbox-content fbox-content-sm">
									<h3>Payment Options</h3>
									<p class="mt-0">We accept Visa, MasterCard and American Express.</p>
								</div>
							</div>

							<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
								<div class="fbox-icon">
									<i class="icon-truck2"></i>
								</div>
								<div class="fbox-content fbox-content-sm">
									<h3>Free Shipping</h3>
									<p class="mt-0">Free Delivery to 100+ Locations on orders above $40.</p>
								</div>
							</div>

							<div class="feature-box fbox-plain fbox-dark fbox-sm mt-4">
								<div class="fbox-icon">
									<i class="icon-undo"></i>
								</div>
								<div class="fbox-content fbox-content-sm">
									<h3>30-Days Returns</h3>
									<p class="mt-0">Return or exchange items purchased within 30 days.</p>
								</div>
							</div>

						</div>

						<div class="w-100"></div>

						<div class="col-12 mt-5">

							<div class="tabs clearfix mb-0" id="tab-1">

								<ul class="tab-nav clearfix">
									<li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="d-none d-md-inline-block"> Description</span></a></li>
									<li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="d-none d-md-inline-block"> Additional Information</span></a></li>
									<li><a href="#tabs-3"><i class="icon-star3"></i><span class="d-none d-md-inline-block"> Reviews {{$reviews->count()}}</span></a></li>
									<li><a href="#tabs-4"><i class="icon-star3"></i><span class="d-none d-md-inline-block">Comment</span></a></li>
								</ul>

								<div class="tab-container">

									<div class="tab-content clearfix" id="tabs-1">
										<p>{{$product->description}}</p>
										Comes with a white, slim synthetic belt that has a tang clasp.
									</div>
									<div class="tab-content clearfix" id="tabs-2">

										<table class="table table-striped table-bordered">
											<tbody>
												<tr>
													<td>Size</td>
													<td>{{$product->size}}</td>
												</tr>
												<tr>
													<td>Color</td>
													<td>{{$product->color}}</td>
												</tr>
												<tr>
													<td>Waist</td>
													<td>{{$product->waist}}</td>
												</tr>
												<tr>
													<td>Length</td>
													<td>{{$product->length}}</td>
												</tr>
												<tr>
													<td>Chest</td>
													<td>{{$product->chest}}</td>
												</tr>
												<tr>
													<td>Fabric</td>
													<td>{{$product->fabric}}</td>
												</tr>
												<tr>
													<td>Warranty</td>
													<td>{{$product->warranty}}</td>
												</tr>
											</tbody>
										</table>

									</div>
									<div class="tab-content clearfix" id="tabs-3">

										<div id="reviews" class="clearfix">

											<ol class="commentlist clearfix">
												@foreach ($reviews as $review)
													<li class="comment even thread-even depth-1" id="li-comment-1">
														<div id="comment-1" class="comment-wrap clearfix">

															<div class="comment-meta">
																<div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
																</div>
															</div>

															<div class="comment-content clearfix">
																<div class="comment-author">{{$review->name}}<br><span>{{$review->email}}</span><span><a href="#" title="Permalink to this comment">{{$review->created_at}}</a></span></div>
																<p>{{$review->comment}}</p>
																<div class="review-comment-ratings">
																	@if ($review->rating >= 1)
																	<i class="icon-star3"></i>
																	@endif
																	@if ($review->rating >= 2)
																	<i class="icon-star3"></i>
																	@endif
																	@if ($review->rating >= 3)
																	<i class="icon-star3"></i>
																	@endif
																	@if ($review->rating >= 4)
																	<i class="icon-star3"></i>
																	@endif
																	@if ($review->rating >= 5)
																	<i class="icon-star3"></i>
																	@endif
																	{{-- <i class="icon-star-half-full"></i> --}}
																</div>
															</div>

															<div class="clear"></div>

														</div>
													</li>
												@endforeach
											</ol>

											<!-- Modal Reviews
											============================================= -->
											<a href="#" data-bs-toggle="modal" data-bs-target="#reviewFormModal" class="button button-3d m-0 float-end">Add a Review</a>

											<div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
															<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
														</div>
														<div class="modal-body">
															<form class="row mb-0" id="template-reviewform" name="template-reviewform" action="{{route('reviews.store')}}" method="post">
																@csrf
																<input type="hidden" name="product_id" value="{{$product->id}}">
																<div class="col-6 mb-3">
																	<label for="template-reviewform-name">Name <small>*</small></label>
																	<div class="input-group">
																		<div class="input-group-text"><i class="icon-user"></i></div>
																		<input type="text" id="template-reviewform-name" name="name" value="" class="form-control required" />
																		@error('name')
																			<div class="alert text-danger">{{$message}}</div>
																		@enderror
																	</div>
																</div>

																<div class="col-6 mb-3">
																	<label for="template-reviewform-email">Email <small>*</small></label>
																	<div class="input-group">
																		<div class="input-group-text">@</div>
																		<input type="email" id="template-reviewform-email" name="email" value="" class="required email form-control" />
																		@error('email')
																			<div class="alert text-danger">{{$message}}</div>
																		@enderror
																	</div>
																</div>

																<div class="w-100"></div>

																<div class="col-12 mb-3">
																	<label for="template-reviewform-rating">Rating</label>
																	<select id="template-reviewform-rating" name="rating" class="form-select">
																		<option value="">-- Select One --</option>
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																	</select>
																	@error('rating')
																		<div class="alert text-danger">{{$message}}</div>
																	@enderror
																</div>

																<div class="w-100"></div>

																<div class="col-12 mb-3">
																	<label for="template-reviewform-comment">Comment <small>*</small></label>
																	<textarea class="required form-control" id="template-reviewform-comment" name="comment" rows="6" cols="30"></textarea>
																	@error('comment')
																	<div class="alert text-danger">{{$message}}</div>
																@enderror
																</div>

																<div class="col-12">
																	<button class="button button-3d m-0" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">Submit Review</button>
																</div>

															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											<!-- Modal Reviews End -->

										</div>

									</div>
									<div class="tab-content clearfix" id="tabs-4">
										<div id="reviews" class="clearfix">

											<ol class="commentlist clearfix">
												@foreach ($comments as $comment)
													<li class="comment even thread-even depth-1" id="li-comment-1">
														<div id="comment-1" class="comment-wrap clearfix">

															<div class="comment-meta">
																<div class="comment-author vcard">
																	<span class="comment-avatar clearfix">
																	<img alt='Image' src='https://0.gravatar.com/avatar/ad516503a11cd5ca435acc9bb6523536?s=60' height='60' width='60' /></span>
																</div>
															</div>

															<div class="comment-content clearfix">
																<div class="comment-author">{{$comment->name}} <br><span>{{$comment->email}}</span></span><span><a href="#" title="Permalink to this comment">{{$comment->created_at}}</a></span></div>
																<p>{{$comment->description}}</p>
																	@foreach ($comment->reply as $item)
																		<p style="margin-left: 20px">{{$item->comment}}</p>
																	@endforeach
																
																
															</div>

															<div class="clear"></div>

														</div>
													</li>
												@endforeach
											</ol>

											<!-- Modal Reviews
											============================================= -->
											<a href="#" data-bs-toggle="modal" data-bs-target="#reviewFormModal1" class="button button-3d m-0 float-end">Add a Comment</a>

											<div class="modal fade" id="reviewFormModal1" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel1" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h4 class="modal-title" id="reviewFormModalLabel1">Submit a Comment</h4>
															<button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
														</div>
														<div class="modal-body">
															<form class="row mb-0" id="template-reviewform" name="template-reviewform" action="{{route('comments.store')}}" method="post">
																@csrf
																<input type="hidden" name="product_id" value="{{$product->id}}">
																<div class="w-100"></div>

																<div class="col-12 mb-3">
																	<label for="name">Name <small>*</small></label>
																	<input type="text" name="name" class="required form-control" id="name">
																	@error('name')
																	   <div class="alert text-danger">{{$message}}</div>
																    @enderror
																</div>
																<div class="col-12 mb-3">
																	<label for="email">Email <small>*</small></label>
																	<input type="email" name="email" class="required form-control" id="email">
																	@error('email')
																	   <div class="alert text-danger">{{$message}}</div>
																    @enderror
																</div>
																<div class="col-12 mb-3">
																	<label for="template-reviewform-comment">Comment <small>*</small></label>
																	<textarea class="required form-control" id="template-reviewform-comment" name="description" rows="6" cols="30"></textarea>
																	@error('description')
																	<div class="alert text-danger">{{$message}}</div>
																@enderror
																</div>

																<div class="col-12">
																	<button class="button button-3d m-0" type="submit" id="template-reviewform-submit" name="template-reviewform-submit" value="submit">Submit Comment</button>
																</div>
															</form>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div><!-- /.modal-content -->
												</div><!-- /.modal-dialog -->
											</div><!-- /.modal -->
											<!-- Modal Reviews End -->

										</div>

									</div>

								</div>

							</div>

						</div>

					</div>
				</div>
			</div>

			<div class="line"></div>

			<div class="w-100">

				<h4>Related Products</h4>

				<div class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xs="1" data-items-md="2" data-items-lg="3" data-items-xl="4">
					@foreach ($pByCategory as $item)
						<div class="oc-item">
							<div class="product">
								<div class="product-image">
									<a href="#"><img src="{{asset('images/products/thumbnail/'.$item->thumbnail)}}" alt="{{$item->thumbnail}}"></a>
									<a href="#"><img src="{{asset('images/products/featured_image/'.$item->featured_image)}}" alt="{{$item->featured_image}}"></a>
									<div class="badge bg-success p-2">50% Off*</div>
									<div class="bg-overlay">
										<div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
											<a href="#" class="btn btn-dark me-2"><i class="icon-shopping-cart"></i></a>
											<a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
										</div>
										<div class="bg-overlay-bg bg-transparent"></div>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3><a href="#">{{$item->name}}</a></h3></div>
									<div class="product-price"><del>${{$item->price}}</del> <ins>${{$item->offer_price}}</ins></div>
									<div class="product-rating">
										<i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star3"></i>
										<i class="icon-star-half-full"></i>
									</div>
								</div>
							</div>
						</div>  
					@endforeach
				</div>

			</div>

		</div>
	</div>
</section>
@endsection