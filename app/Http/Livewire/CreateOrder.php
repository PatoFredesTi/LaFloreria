<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
//use Gloudemans\Shoppingcart\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{
    public $contact, $phone, $address, $reference, $shipping_cost=0, $total=0, $content;

    public $departments;

    public $department_id = "";

    public $rules = ['contact' => 'required', 'phone' => 'required', 'address' => 'required'];

    public function updateDepartmentId($value){
        $department = Department::find($value);
        $this->shipping_cost = $department->cost;      
    }

    public function create_order(){
        $rules = $this->rules;
        $rules['contact']='required|string|max:255';
        $rules['phone'] = 'required|numeric|';
        $rules['address'] = 'required|string|max:255';
        $rules['department_id'] = 'required';
        $this->validate($rules);

        $order = new Order();
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->reference = $this->reference;
        $order->shipping_cost = $this->shipping_cost;
        $order->total = $this->shipping_cost + Cart::subtotal();
        $order->content = Cart::content();
        $order->department->id = $this->department_id;
        
        //$order->status = Order::PENDIENTE;

        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', $order);

    }

    public function orderMuestra(){
        $rules = $this->rules;
        $rules['contact']='required|string|max:255';
        $rules['phone'] = 'required|numeric|';
        $rules['address'] = 'required|string|max:255';
        $rules['department_id'] = 'required';
        $this->validate($rules);

        Cart::destroy();

        return redirect()->route('payment');
    }

    public function validate_ship(){
        $this->resetValidation([
            'contact',
            'phone',
        ]);
    }

    public function mount(){
        $this->departments = Department::all();
    }


    public function render()
    {
        return view('livewire.create-order');
    }
}
