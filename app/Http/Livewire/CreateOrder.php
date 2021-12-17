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
    public $departments=[], $cities=[] , $districts = [];

    public $department_id = "", $city_id = "", $district_id = "";

    public $contact, $phone, $address, $reference, $shipping_cost=0, $total=0, $content;

    public $rules = ['contact' => 'required', 'phone' => 'required', 'address' => 'required'];

    public function updateDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['city_id', 'district_id']);
    }

    public function updateDistrict($value){
        $department = Department::find($value);
        $this->shipping_cost = $department->cost;

        $city = City::find($value);
        $this->shipping_cost = $city->cost;
        
    }

    public function create_order($value){
        $rules = $this->rules;
        $rules['contact']='required|string|max:255';
        $rules['phone'] = 'required|numeric';
        $rules['address'] = 'required|string|max:255';
        $this->validate($rules);
        $department = Department::find($value);
        $this->shipping_cost = $this->department->cost;
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone;
        $order->address = $this->address;
        $order->reference = $this->reference;
        $order->shipping_cost = $this->shipping_cost;
        $order->total = $this->total;
        $order->content = Cart::content();
        //$order->status = Order::PENDIENTE;

        $order->save();

        Cart::destroy();

        return redirect()->route('orders.payment', $order);

    }

    public function validate_ship(){
        $this->resetValidation([
            'contact',
            'phone',
        ]);
    }

    public function mount(){
        $this->departments = Department::all();
        $this->cities = City::all();
    }


    public function render()
    {
        return view('livewire.create-order');
    }
}
