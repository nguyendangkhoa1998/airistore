<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductGalery extends Model
{
    protected $table='product_galery';
    
    protected $fillable = ['product_id','image_url'];
}
