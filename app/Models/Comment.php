<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'description',
        'status'
    ];
    public function reply(){
        return $this->hasMany(Reply::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
}
