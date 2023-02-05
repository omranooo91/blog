<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Post extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasEagerLimit ;
    public $translatedAttributes = ['title', 'content', 'excerpt','tags'];
    public $fillable = ['id', 'image','category_id'];


    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
