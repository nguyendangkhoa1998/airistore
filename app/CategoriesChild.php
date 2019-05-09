<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesChild extends Model
{
    protected $table='categories_child';
    protected $fillable = ['category_id','name','url_link','active'];

    public function RelationshipCategory(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function RelationshipProducts(){
        return $this->hasMany('App\Products','categories_child_id','id');
    }

    public function getName(){
    	$name=CategoriesChild::where('active',1)->get();

    	return $name;
    }
}
