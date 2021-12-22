<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CategoryProducts extends Component
{

    public $category;
    
    public $products = [];
    public $product;
    public $qty = 1;
    public $options = [];

    public function loadPosts(){
        $this->products = $this->category->products()->where('status', 2)->take(20)->get();

        $this->emit('glider', $this->category->id);
    }

    public function addItem(){
        Cart::add(['id' => $this->product->id,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'options' => $this->options,
                'weight' => 0,]);

        $this->emit('render');
    }

    public function render()
    {
        return view('livewire.category-products');
    }
}
