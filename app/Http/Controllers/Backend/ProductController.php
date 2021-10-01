<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function subcategory($category_id){
    //     $subCategories = SubCategory::where('category_id',$category_id)->get();
    //     return response()->json($subCategories);
        // try{
        //     $subCategories = SubCategory::where('category_id',$category_id)->get();
        //     return response()->json($subCategories,Response::HTTP_OK);
        //    }catch(\Exception $exception){
        //         return response()->json($exception->getMessage(),Response::HTTP_INTERNAL_SERVER_ERROR);
        //    }

    // }

 
    public function status($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
            if ($brand->status == 0) {
                $brand->status = 1;
            } else {
                $brand->status = 0;
            }
            $brand->save();
            Session()->flash('alert-success', 'Status Update successfully');
            return back();
        } else {
            return abort(404);
        }
    }

    public function index()
    {
        $products = Product::all();
        return view('backend.product.list_product', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $subCategories = SubCategory::get();
        $brands = Brand::all();
        return view('backend.product.add_product',[
            'categories' => $categories,
            'subCategories' => $subCategories,
            'brands' => $brands,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'tag' => 'required',
            'brand_id' => 'required',
            'short_description' => 'required',
            'thumbnail' => 'required',
            'featured_image' => 'required',
            'quantity' => 'required',
            'abalivality' => 'required',
        ]);

        $products = new Product;
        $products->name  =  $request->name;
        $products->price  =  $request->price;
        $products->offer_price  =  $request->offer_price;
        $products->slug  =  Str::slug($request->name);
        $products->product_id  = random_int(100000, 999999);
        $products->category_id  =  $request->category_id;
        $products->subcategory_id  =  $request->subcategory_id;
        $products->brand_id  =  $request->brand_id;
        $products->user_id  =  1;
        $products->description  =  $request->description;
        $products->short_description  =  $request->short_description;
        $products->tag  =  $request->tag;
        if ($request->hasFile('thumbnail')) {
            // if($request->validate([
            //     'thumbnail'=> 'max:512|image|dimensions:max_height=500,max_width:500',
            // ]));
            $image = $request->file('thumbnail');
            $imagesFileName = $image->getClientOriginalName();
            $fileName = pathinfo($imagesFileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesFileName, PATHINFO_EXTENSION);
            $originalName = $fileName . '.' . $extension;
            $path = public_path('images/products/thumbnail/');
            File::makeDirectory($path, $mode = 0777, true, true);
            if (File::exists($path . $originalName)) {
                $originalName =   random_int(10, 99) . $originalName;
            }
            Image::make($image)->save($path . $originalName);
            $products->thumbnail = $originalName;
        }

        if ($request->hasFile('featured_image')) {
            $featured_image = $request->File('featured_image');
            if (count($featured_image) >= 1) {
                $images = array();
                $image = $request->file('featured_image');
                foreach ($image as $item) {
                    $imagesFileName = $item->getClientOriginalName();
                    $fileName = pathinfo($imagesFileName, PATHINFO_FILENAME);
                    $extension = pathinfo($imagesFileName, PATHINFO_EXTENSION);
                    $originalName = $fileName . '.' . $extension;
                    $path = public_path('images/products/featured_image/');
                    File::makeDirectory($path, $mode = 0777, true, true);
                    if (File::exists($path . $originalName)) {
                        $originalName =   random_int(10, 99) . $originalName;
                    }
                    $images[] = $originalName;
                    Image::make($item)->save($path . $originalName);
                }
                $products->featured_image = implode("|", $images);
            } else {
                $image = $request->file('featured_image');
                $imagesFileName = $image->getClientOriginalName();
                $fileName = pathinfo($imagesFileName, PATHINFO_FILENAME);
                $extension = pathinfo($imagesFileName, PATHINFO_EXTENSION);
                $originalName = $fileName . '.' . $extension;
                $path = public_path('images/products/featured_image/');
                File::makeDirectory($path, $mode = 0777, true, true);
                Image::make($image)->save($path . $originalName);
                $products->featured_image = $originalName;
            }
        }
        $products->quantity  =  $request->quantity;
        $products->size  =  $request->size;
        $products->color  =  $request->color;
        $products->waist  =  $request->waist;
        $products->length  =  $request->length;
        $products->chest  =  $request->chest;
        $products->fabric  =  $request->fabric;
        $products->abalivality  =  $request->abalivality;
        $products->video_link  =  $request->video_link;
        $products->camera  =  $request->camera;
        $products->screen_size  =  $request->screen_size;
        $products->processor  =  $request->processor;
        $products->warranty  =  $request->warranty;
        $products->battery_capacity  =  $request->battery_capacity;
        $products->ram_size  =  $request->ram_size;
        $products->storage  =  $request->storage;
        $products->save();
        Session()->flash('alert-success', 'Products Added Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('backend.product.edit_product', [
            'product' => $product,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'brands' => $brands
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->name  =  $request->name;
        $products->price  =  $request->price;
        $products->offer_price  =  $request->offer_price;
        $products->slug  =  Str::slug($request->name);
        $products->product_id  = random_int(100000, 999999);
        $products->category_id  =  $request->category_id;
        $products->subcategory_id  =  $request->subcategory_id;
        $products->brand_id  =  $request->brand_id;
        $products->user_id  =  1;
        $products->description  =  $request->description;
        $products->short_description  =  $request->short_description;
        $products->tag  =  $request->tag;

        if ($request->hasFile('thumbnail')) {
            // if($request->validate([
            //     'thumbnail'=> 'max:512|image|dimensions:max_height=500,max_width:500',
            // ]));
            $image = $request->file('thumbnail');
            $imagesFileName = $image->getClientOriginalName();
            $fileName = pathinfo($imagesFileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesFileName, PATHINFO_EXTENSION);
            $originalName = $fileName . '.' . $extension;
            $path = public_path('images/products/thumbnail/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $products->thumbnail = $originalName;
            if (file_exists("images/products/thumbnail/$products->thumbnail")) {
                File::delete("images/products/thumbnail/$products->thumbnail");
            }
            Image::make($image)->save($path . $originalName);
        }
        if ($request->hasFile('featured_image')) {
            // if($request->validate([
            //     'featured_image'=> 'max:512|image|dimensions:max_height=500,max_width:500',
            // ]));
            $image = $request->file('featured_image');
            $imagesFileName = $image->getClientOriginalName();
            $fileName = pathinfo($imagesFileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesFileName, PATHINFO_EXTENSION);
            $originalName = $fileName . '.' . $extension;
            $path = public_path('images/products/featured_image/');
            $products->featured_image = $originalName;
            if (file_exists("images/products/featured_image/$products->featured_image")) {
                File::delete("images/products/featured_image/$products->featured_image");
            }
            Image::make($image)->save($path . $originalName);
        }
        $products->quantity  =  $request->quantity;
        $products->size  =  $request->size;
        $products->waist  =  $request->waist;
        $products->length  =  $request->length;
        $products->chest  =  $request->chest;
        $products->fabric  =  $request->fabric;
        $products->abalivality  =  $request->abalivality;
        $products->video_link  =  $request->video_link;
        $products->camera  =  $request->camera;
        $products->screen_size  =  $request->screen_size;
        $products->processor  =  $request->processor;
        $products->warranty  =  $request->warranty;
        $products->battery_capacity  =  $request->battery_capacity;
        $products->ram_size  =  $request->ram_size;
        $products->storage  =  $request->storage;
        $products->update();
        Session()->flash('alert-success', 'Products Update Successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        Session()->flash('alert-success', 'Products Added Successfully');
        return redirect()->route('products.index');
    }
}
