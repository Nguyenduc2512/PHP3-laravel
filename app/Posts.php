<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Posts extends Model
{
   protected $table = 'posts';
   protected $fillable = [
       'title', 'image', 'content',
       'publish_date', 'status',
       'author_id','category_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User','author_id','id');
    }
    public function catename(){
        return $this->belongsto('App\Category','category_id','id');
    }
}



