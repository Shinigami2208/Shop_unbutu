<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category', 'category_products');
    }
}
