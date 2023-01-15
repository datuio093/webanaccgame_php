<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thenap extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'thenap';
    protected $filltable = [
        'macode', 'menhgia' ,'status'
    ];

}
