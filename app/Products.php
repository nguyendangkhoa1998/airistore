<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table='products';
    protected $fillable = ['category_id','categories_child_id','name','symbolic_image','unit_price','quantity','short_desciption','desciption','stars','views','is_new','status'];

    //Get relates products
    public function relates()
    {
        $relates=Products::where('categories_child_id',$this->categories_child_id)
            ->where('id','<>',$this->id)
            ->orderBy('views', 'desc')
            ->orderBy('id', 'desc')
            ->take(4)
            ->get();
        return $relates;
    }

    //Scope attribute status from products
    public function scopeStatus($query)
    {
        return $this->where('status', 1);
    }

    //Scope attribute quantity from products
    public function scopeQuantity($query)
    {
        return $this->where('quantity','>',0);
    }

     public function RelationshipCategory(){
        return $this->belongsTo('App\Category','category_id','id');
    }

    public function RelationshipCategoriesChild(){
        return $this->belongsTo('App\CategoriesChild','categories_child_id','id');
    }

    public function RelationshipProductGalery(){
        return $this->hasMany('App\ProductGalery','product_id','id');
    }

    public function RelationshipComments(){
        return $this->hasMany('App\Comments','product_id','id');
    }

}
