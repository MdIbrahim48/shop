<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Cart;
use App\Models\SocialIcon;
use App\Models\SubCategory;
use DB;

class WebsiteController extends Controller
{

    public function index()
    {
        $products = Product::get();
        return view('frontend.shop', [
            'products' => $products
        ]);
    }
// singleShop
    public function singleShop($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $pByCategory = Product::where('category_id', $product->category_id)->get();
            return view('frontend.single_shop', [
                'product' => $product,
                'pByCategory' => $pByCategory
            ]);
        } else {
            return abort(404);
        }
    }
// category
    public function category($slug)
    {
        $category = Category::where('slug',$slug)->first();
        if($category){
            return view('frontend.category', [
                'datacategory' => $category
            ]);
        }else{
            abort(404);
        }
       
    }
// categoryItem
    public function subCategoryItem($slug)
    {
        $categoryItem = SubCategory::where('slug', $slug)->first();
        $products = Product::where('category_id', $categoryItem->id)->get();
        return view('frontend.category_item', [
            'categoryItem' => $categoryItem,
            'products' => $products
        ]);
    }

    // search
    public function search(Request $request){
        $products = Product::where('name', 'like', '%'.$request->q.'%')
            ->orderBy('id')
            ->paginate(20);
        return view('frontend.search',[
            'products' => $products
        ]);
    }

   
}
