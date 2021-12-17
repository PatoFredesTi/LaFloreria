<?php
use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

/*
function quantity($product_id){
    $product = Product::find($product_id);
    $quantity = $product->quantity;
    return $quantity;
}

function qty_added($product_id){
    $cart = Cart::content();

    $item = $cart->where('id', $product_id)->first();
    return $item->qty;
}

function qty_available($product_id){
    return quantity($product_id) - qty_added($product_id);
}
*/