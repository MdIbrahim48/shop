@extends('layouts')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>Add Product</h3>
          </div>
          <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item"> Form Controls</li>
              <li class="breadcrumb-item active"> Validation Forms</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
              {{-- <h4><a href="{{route('products.index')}}" class="btn-primary pull-right" style="margin-right:5px">Product List</a></h4>
           --}}
            <div class="card-body">
              <form action="{{route('products.update',['product'=>$product->id])}}" method="POST" class="needs-validation" novalidate="" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="validationCustom01">Product name</label>
                    <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name ?? old('name')}}" id="validationCustom01" type="text" placeholder="Enter Product Name" required="">
                    @error('name')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="price">Product price</label>
                    <input class="form-control @error('price') is-invalid @enderror" name="price" value="{{$product->price ?? old('price')}}" id="price" type="text" placeholder="Enter Product price" required="">
                    @error('price')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="offer_price">Product Offer Price</label>
                    <input class="form-control @error('offer_price') is-invalid @enderror" name="offer_price" value="{{$product->offer_price ?? old('offer_price')}}" id="offer_price" type="text" placeholder="Enter Product Offer Price" required="">
                    @error('offer_price')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="size">Size</label>
                    {{-- <input class="form-control @error('size') is-invalid @enderror" name="size" value="{{old('size')}}" id="size" type="text" placeholder="Enter Size" required=""> --}}
                    <select name="size" id="" class="form-control @error('size') is-invalid @enderror" value="{{$product->size ?? old('size')}}">
                      <option value>Select Size</option>
                      <option @if ($product->size == 'xl') selected  @endif value="xl">xl</option>
                      <option @if ($product->size == 'lg') selected  @endif  value="lg">lg</option>
                      <option @if ($product->size == 'md') selected  @endif  value="md">md</option>
                      <option @if ($product->size == 'sm') selected  @endif value="sm">sm</option>
                    </select>
                    @error('size')
                    <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="category_id">Category Name</label>
                    <select  name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">    
                        <option value>Select Category</option>
                      @foreach ($categories as $item)
                        <option @if ($product->category_id == $item->id)? selected @endif value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                     @error('category_id')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="subcategory_id">SubCategory Name</label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                      <option value>Select SubCategory</option>
                      @foreach ($subCategories as $item)
                      <option @if ($product->subcategory_id == $item->id)? selected @endif value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                     @error('subcategory_id')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="brand_id">Brand Name</label>
                    <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                      <option value>Select Brand</option>
                      @foreach ($brands as $item)
                      <option @if ($product->brand_id == $item->id)? selected @endif value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                    </select>
                     @error('brand_id')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="tag">Tag</label>
                    <input class="form-control @error('tag') is-invalid @enderror" name="tag" value="{{$product->tag ?? old('tag')}}" id="tag" type="text" placeholder="Tag" required="">
                    @error('tag')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="thumbnail">Thumbnail</label>
                    <input multiple class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" value="{{old('thumbnail')}}" id="thumbnail" type="file" required="">
                    <img width="100" src='{{asset("images/products/thumbnail/".$product->thumbnail)}}' alt="{{$product->thumbnail}}">
                    @error('thumbnail')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="featured_image">Featured Image</label>
                    <input  multiple class="form-control @error('featured_image') is-invalid @enderror" name="featured_image" value="{{old('featured_image')}}" id="featured_image" type="file"  required="">
                    <img width="100" src='{{asset("images/products/featured_image/".$product->featured_image)}}' alt="{{$product->featured_image}}">
                    @error('featured_image')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  
                  <div class="col-md-6">
                    <label class="form-label" for="color">Color</label>
                    <input class="form-control @error('color') is-invalid @enderror" name="color" value="{{$product->color ?? old('color')}}" id="color" type="text" placeholder="Enter color" required="">
                    @error('color')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="waist">Waist</label>
                    <input class="form-control @error('waist') is-invalid @enderror" name="waist" value="{{$product->waist ?? old('waist')}}" id="waist" type="text" placeholder="Enter waist" required="">
                    @error('waist')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="length">Length</label>
                    <input class="form-control @error('length') is-invalid @enderror" name="length" value="{{$product->length ?? old('length')}}" id="length" type="text" placeholder="Enter length" required="">
                    @error('length')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="chest">Chest</label>
                    <input class="form-control @error('chest') is-invalid @enderror" name="chest" value="{{$product->chest ?? old('chest')}}" id="chest" type="text" placeholder="Enter chest" required="">
                    @error('chest')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="fabric">Fabric</label>
                    <input class="form-control @error('fabric') is-invalid @enderror" name="fabric" value="{{$product->fabric ?? old('fabric')}}" id="fabric" type="text" placeholder="Enter fabric" required="">
                    @error('fabric')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="quantity">Quantity</label>
                    <input class="form-control @error('quantity') is-invalid @enderror" name="quantity" value="{{$product->quantity ?? old('quantity')}}" id="quantity" type="number" placeholder="Enter Quantity" required="">
                    @error('quantity')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="abalivality">Abalivality</label>
                    <select name="abalivality" id="abalivality" class="form-control  @error('abalivality') is-invalid @enderror">
                      <option value>Select Abalivality</option>
                      <option @if ($product->abalivality == 1) selected @endif value="1">In Stock</option>
                      <option  @if ($product->abalivality == 0) selected @endif  value="0">Out Of Stock Stock</option>
                    </select>
                    @error('abalivality')
                    <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="video_link">Video Link</label>
                    <input class="form-control @error('video_link') is-invalid @enderror" name="video_link" value="{{$product->video_link ?? old('video_link')}}" id="video_link" type="text" placeholder="Enter Video Link" required="">
                    @error('video_link')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="camera">Camera</label>
                    <input class="form-control @error('camera') is-invalid @enderror" name="camera" value="{{$product->camera ??  old('camera')}}" id="camera" type="text" placeholder="Camera" required="">
                    @error('camera')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="screen_size">Screen Size</label>
                    <input class="form-control @error('screen_size') is-invalid @enderror" name="screen_size" value="{{$product->screen_size ?? old('screen_size')}}" id="screen_size" type="text" placeholder="Enter Screen Size" required="">
                    @error('screen_size')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="processor">Processor</label>
                    <input class="form-control @error('processor') is-invalid @enderror" name="processor" value="{{$product->processor ?? old('processor')}}" id="processor" type="text" placeholder="Enter Processor" required="">
                    @error('processor')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="warranty">Warranty</label>
                    <input class="form-control @error('warranty') is-invalid @enderror" name="warranty" value="{{$product->warranty ?? old('warranty')}}" id="warranty" placeholder="Enter Warranty" type="text" required="">
                    @error('warranty')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="battery_capacity">Battery Capacity</label>
                    <input class="form-control @error('battery_capacity') is-invalid @enderror" name="battery_capacity" value="{{$product->battery_capacity ?? old('battery_capacity')}}" id="battery_capacity" placeholder="Enter Battery Capacity" type="text"  required="">
                    @error('battery_capacity')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="ram_size"> Ram Size</label>
                    <input class="form-control @error('ram_size') is-invalid @enderror" name="ram_size" value="{{$product->ram_size ?? old('ram_size')}}" id="ram_size" type="text" placeholder="Enter Ram Size" required="">
                    @error('ram_size')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="storage">Storage</label>
                    <input class="form-control @error('storage') is-invalid @enderror" name="storage" value="{{$product->storage ?? old('storage')}}" id="storage" placeholder="Storage" type="text" required="">
                    @error('storage')
                        <div class="alert text-danger">{{$message}}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-8">
                  <label class="form-label" for="description">Product Description</label>
                  <textarea name="description" id="description" cols="70" rows="" class="form-control @error('description') is-invalid @enderror" placeholder="Enter Product Description">{{$product->description ?? old('description')}}</textarea>
                  @error('description')
                      <div class="alert text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-8">
                  <label class="form-label" for="short_description">Product Short Description</label>
                  <textarea name="short_description" id="short_description" cols="70" rows="" class="form-control @error('short_description') is-invalid @enderror" placeholder="Enter Product Short Description">{{$product->short_description ?? old('short_description')}}</textarea>
                  @error('short_description')
                      <div class="alert text-danger">{{$message}}</div>
                  @enderror
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection