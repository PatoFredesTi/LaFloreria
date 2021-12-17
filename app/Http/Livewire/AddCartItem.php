<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;

class AddCartItem extends Component
{
    public $product, $quantity;
    public $qty = 1;
    public $options = [];

    public function mount()
    {
        //$this->quantity = qty_available($this->product->id);
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }

    public function decrement(){
        $this->qty = max(1, $this->qty - 1);
    }

    public function increment(){
        $this->qty = min(5, $this->qty + 1);
    }

    public function addItem(){
        Cart::add(['id' => $this->product->id,
                'name' => $this->product->name,
                'qty' => $this->qty,
                'price' => $this->product->price,
                'options' => $this->options,
                'weight' => 0,]);

        $this->emit('render');
            
        //$this->quantity = qty_available($this->product->id);

        
    }

    public function render()
    {
        return view('livewire.add-cart-item');
    }
}
