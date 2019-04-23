<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table='orders';

    public function RelationshipOrderDetail(){
        return $this->hasOne('App\OrderDetail','order_id','id');
    }

    public function RelationshipOrderStatus(){
        return $this->belongsTo('App\OrderStatus','status','id');
    }

    public function RelationshipUsers(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
