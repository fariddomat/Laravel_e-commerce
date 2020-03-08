<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable=['name', 'price', 'img', 'desc'];
    
    public function getImagePathAttribute($value)
    {
        return asset('uploads/product_images/'.$this->img);
    }
}
