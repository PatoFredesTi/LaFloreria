<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //Relacion uno a muchos
    public function products(){
        return $this->hasMane(Product::class);
    }

    //Relacion muchos a uno
    public function category(){
        return $this->belongsTo(Category::class);
    }

}