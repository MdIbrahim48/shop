<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'comment_id'
    ];
    public function comments(){
        return $this->belongsTo(Comment::class);
    }
}
