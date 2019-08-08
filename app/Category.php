<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='catrgories';
     protected $fillable = [
       'name', 'image', 'description'
    ];
    public function post(){
        return $this->belongsto('App\Posts', 'id', 'category_id');
    }
}
