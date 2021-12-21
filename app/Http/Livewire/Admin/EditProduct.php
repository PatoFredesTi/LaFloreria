<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Image;
use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{


    public $product, $categories;

    public $category_id;

    public $name, $slug, $description, $price, $quantity;

    protected $listeners = ['refreshProduct', 'delete'];

    protected $rules = [
        'category_id' => 'required|numeric',
        'product.name' => 'required|min:3|unique:products,name',
        'product.slug' => 'required|unique:products,slug',
        'product.description' => 'required|min:10',
        'product.price' => 'required|numeric|min:0',
        'product.quantity' => 'required|numeric|min:0|max:100',
    ];

    public function mount(Product $product){
        $this->product = $product;

        $this->categories = Category::all();

        $this->category_id = $product->category_id;
    }

    public function refreshProduct(){
        $this->product = $this->product->fresh();
    }

    public function save(){
        $rules = $this->rules;

        $rules['product.slug'] = 'required|unique:products,slug,'.$this->product->id;
        $rules['product.name'] = 'required|min:3|unique:products,name,'.$this->product->id;

        $this->validate($rules);

        $this->product->save();

        $this->emit('saved'); 

    }
    public function deleteImage(Image $image){
        Storage::delete($image->url);
        $image->delete();

        $this->product = $this->product->fresh();
    }

    public function delete(){

        $images = $this->product->images;

        foreach($images as $image){
            Storage::delete($image->url);
            $image->delete();
        }

        $this->product->delete();
        return redirect()->route('admin.index');
    }

    public function render()
    {
        return view('livewire.admin.edit-product')->layout('layouts.admin');
    }
}
