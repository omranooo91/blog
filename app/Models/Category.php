<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Category extends Model implements TranslatableContract
{
    use HasFactory, Translatable, HasEagerLimit ;
    public $translatedAttributes = ['title'];
    public $fillable = ['id', 'parent', 'image'];


    public function getParent(){
        return $this->belongsTo(Category::class,'parent');
    }
    public function children(){
        return $this->hasMany(Category::class,'parent');
    }
    public function trans(){
        return $this->hasMany(Category::class,'category_id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }



}
