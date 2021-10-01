<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BrandRequest;
use Image;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\fileExists;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
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
        $brands = Brand::get();
        return view('backend.brand.list_brand', [
            'brands' => $brands,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.add_brand');
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
            'name'=>'required',
            'description'=>'required',
        ]);
        $brands = new Brand;
        $brands->name = $request->name;
        $brands->slug = Str::slug($request->name);
        $brands->description = $request->description;


        if ($request->hasFile('img')) {
            if($request->validate([
                'img' => 'max:512|image|dimensions:max_height=500,max_width:500',
            ]))
            $image = $request->file('img');
            $imagesfileName = $image->getClientOriginalName();
            $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
            $originalName = $filename . '.' . $extension;
            $path = public_path('images/brand/');
            File::makeDirectory($path, $mode = 0777, true, true);
            Image::make($image)->save($path . $originalName);
            $brands->img = $originalName;
        }
        $brands->save();
        Session()->flash('alert-success', 'Brand Added Successfully');
        return redirect()->route('brands.index');
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
        $brand = Brand::findOrFail($id);
        return view('backend.brand.edit_brand', [
            'brand' => $brand
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
        $brand = Brand::findOrFail($id);
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name);
        $brand->description = $request->description;
        $brand->update();

        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imagesfileName = $image->getClientOriginalName();
            $filename = pathinfo($imagesfileName, PATHINFO_FILENAME);
            $extension = pathinfo($imagesfileName, PATHINFO_EXTENSION);
            $originalName = $filename . '.' . $extension;
            $path = public_path('images/brand/');
            File::makeDirectory($path, $mode = 0777, true, true);
            $brand->img = $originalName;
            if (file_exists("images/brand/$brand->img")) {
                File::delete("images/brand/$brand->img");
            }
            Image::make($image)->save($path . $originalName);
            $brand->save();
        }
        Session()->flash('alert-success', 'Brand Update Successfully');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        Session()->flash('alert-danger', 'Brand Delete Successfully');
        return redirect()->route('brands.index');
    }
}
