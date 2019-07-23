<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Category extends Model
{
    protected $table='category';
    protected $fillable = ['name','url_link','active'];
    public function RelationshipCategoriesChild(){
        return $this->hasMany('App\CategoriesChild','category_id','id');
    }
    public function RelationshipProducts(){
        return $this->hasMany('App\Products','category_id','id');
    }
    public function scopeActive($query){
        return $query->where('active',1);
    }
}
