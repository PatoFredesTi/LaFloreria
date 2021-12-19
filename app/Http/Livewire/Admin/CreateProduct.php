<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProduct extends Component
{


    public $categories;
    public $category_id;
    public $name, $slug, $description, $price, $quantity;

    protected $rulers = [
        'name' => 'required|min:3|unique:products,name',
        'slug' => 'required|unique:products|min:3',
        'description' => 'required|min:10',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|numeric',
        'quantity' => 'required|numeric|min:0|max:100',
    ];
    public function updateName($value){
        $this->slug = Str::slug($value);
    }

    public function mount(){
        $this->categories = Category::all();
    }

    public function save(){
        $this->validate($this->rulers);

        $product = new Product();

        $product->name = $this->name;
        $product->slug = $this->slug;
        $product->description = $this->description;
        $product->price = $this->price;
        $product->quantity = $this->quantity;
        $product->category_id = $this->category_id;
        $product->save();

        return redirect()->route('admin.products.edit', $product);
    }
    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }
}
