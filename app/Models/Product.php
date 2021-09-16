<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'offer_price',
        'product_id',
        'category_id',
        'subcategory_id',
        'brand_id',
        'user_id',
        'slug',
        'description',
        'short_description',
        'tag',
        'thumbnail',
        'featured_image',
        'quantity',
        'size',
        'color',
        'waist',
        'length',
        'chest',
        'fabric',
        'abalivality',
        'video_link',
        'camera',
        'screen_size',
        'processor',
        'warranty',
        'battery_capacity',
        'ram_size',
        'storage'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
     public function cart(){
        return $this->belongsTo(Cart::class);
    }

}
