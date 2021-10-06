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

            <div id="shop" class="shop row grid-container gutter-30" data-layout="fitRows">
                @foreach ($products as $product)
                @if ($products->count()>=0)
                <div class="product col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="grid-inner">
                        <div class="product-image">
                            <a href="{{route('single.shop',['slug'=>$product->slug])}}"><img src="{{asset('images/products/thumbnail/'.$product->thumbnail)}}" alt="{{$product->featured_image}}"></a>
                            <a href="{{route('single.shop',['slug'=>$product->slug])}}"><img src="{{asset('images/products/featured_image/'.$product->featured_image)}}" alt="{{$product->featured_image}}"></a>
                            <div class="sale-flash badge bg-secondary p-2"> @if ($product->abalivality == 1) Instock @else Out of Stock @endif</div>
                            <div class="bg-overlay">
                                <div class="bg-overlay-content align-items-end justify-content-between" data-hover-animate="fadeIn" data-hover-speed="400">
                                    <a href="{{route('single.cart',$product->id)}}" class="btn btn-dark me-2"><i class="icon-shopping-basket"></i></a>
                                    <a href="include/ajax/shop-item.html" class="btn btn-dark" data-lightbox="ajax"><i class="icon-line-expand"></i></a>
                                </div>
                                <div class="bg-overlay-bg bg-transparent"></div>
                            </div>
                        </div>
                        <div class="product-desc">
                            <div class="product-title"><h3><a href="{{route('single.shop',['slug'=>$product->slug])}}">{{$product->name}}</a></h3></div>
                            <div class="product-price"><del>${{$product->price}}</del> <ins>${{$product->offer_price}}</ins></div>
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
                @else
                    {{"Product Not Found"}}
                @endif
            @endforeach
                
               
            </div>

        </div>
    </div>
</section>
@endsection
