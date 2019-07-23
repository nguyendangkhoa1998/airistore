<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class OrderDetail extends Model
{
    protected $table='order_detail';
    protected $fillable = ['order_id','product_id','quantity','unit_price'];
    public function RelationshipOrders(){
        return $this->belongsTo('App\Orders','order_id','id');
    }
    public function RelationshipProducts()
    {
        return $this->belongsTo('App\Products','product_id','id');
    }
}
