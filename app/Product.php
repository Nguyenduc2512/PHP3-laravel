<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
     protected $fillable = [
       'name', 'image', 'details','post_id','publish_date','status'
    ];
    public function post_name(){
        return $this->belongsto('App\Posts', 'post_id', 'id');
    }
}
