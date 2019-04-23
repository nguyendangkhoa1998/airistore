<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table='comments';

    public function RelationshipProducts(){
        return $this->belongsTo('App\Products','product_id','id');
    }

    public function RelationshipUsers(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
