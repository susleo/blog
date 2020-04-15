<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //

//    protected $fillable = [
//        'title','description',''
//    ];

   protected $guarded = [];

    use SoftDeletes;
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function deleteImage(){
        return Storage::delete($this->image);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
