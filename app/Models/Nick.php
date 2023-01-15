<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nick extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'nicks';
    protected $filltable = [
        'title', 'attribute' , 'category_id	' , 'price' , 'status' , '	description' , 'image' , 'ms', 'user_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
