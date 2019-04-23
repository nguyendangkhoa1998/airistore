<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesChild extends Model
{
    protected $table='categories_child';

    public function RelationshipCategory(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function RelationshipProducts(){
        return $this->hasMany('App\Products','categories_child_id','id');
    }
}
