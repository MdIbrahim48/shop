<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Constants\ApplicationConstant;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }



    // public function getStatusAttribute($value){
    //     if($value == ApplicationConstant::Active){
    //         return "Active";
    //     }
    //         return 'InActive';

    // }
}
