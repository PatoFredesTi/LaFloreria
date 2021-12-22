<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::query();

        if (request('status')) {
            $orders->where('status', request('status'));
        }

        $orders = $orders->get();

        $pendiente = $orders->where('status', 1)->count();
        $recibido = $orders->where('status', 2)->count();
        $enviado = $orders->where('status', 3)->count();
        $entregado = $orders->where('status', 4)->count();
        $anulado = $orders->where('status', 5)->count();

        return view('orders.index', compact('orders', 'pendiente', 'recibido', 'enviado', 'entregado', 'anulado'));
    }

    public function show(Order $order){
        return view('orders.show', compact('order'));
    }

    public function payment(Order $order){

        $items = json_decode($order->content);

        return view('orders.payment', compact('order', 'items'));
    }
}
