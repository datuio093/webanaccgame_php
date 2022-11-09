<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'accessories';
    protected $filltable = [
        'title',  'status' , 'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
