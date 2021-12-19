<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'image', 'icon'];

    //relacion de uno a muchos
    public function subCategories(){
        return $this->hasMany(SubCategory::class);
    }

    //relacion de muchos a muchos
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    //URL
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
