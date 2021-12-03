<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id','created_at','updated_at'];

    //Relacion muchos a uno
    public function brands(){
        return $this->belongsToMany(Brand::class);
    }

    
    public function subcategory(){
        return $this->belongsToMany(Subcategory::class);
    }

    //Relacion muchos a muchos
    public function colors(){
        return $this->hasMany(Color::class);
    }

    //Relacion uno a muchos
    public function sizes(){
        return $this->hasMany(Size::class);
    }

    //Relacion uno a muchos polimorfica
    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}
