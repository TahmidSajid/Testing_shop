<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTotalPrice extends Component
{
    public $cart_info ;
    public $total_cart_price;
    public $total_order_price;

    public function mount()
    {
        $this->cart_info = Cart::where('user_id',auth()->user()->id)->get();
        $this->total_cart_price= 0;
        foreach ($this->cart_info as $key => $product) {
            $quantity = $product->quantity;
            if($product->getProduct->discount_price){
                $price = $product->getProduct->discount_price;
            }
            else{
                $price = $product->getProduct->regular_price;
            }
            $this->total_cart_price = $this->total_cart_price + ($quantity * $price);
        }
        $this->total_order_price = $this->total_cart_price + 100;
    }

    #[On('total_price_check')]
    public function reCalculatePrice()
    {
        $this->cart_info = Cart::where('user_id',auth()->user()->id)->get();
        $this->total_cart_price= 0;
        foreach ($this->cart_info as $key => $product) {
            $quantity = $product->quantity;
            if($product->getProduct->discount_price){
                $price = $product->getProduct->discount_price;
            }
            else{
                $price = $product->getProduct->regular_price;
            }
            $this->total_cart_price = $this->total_cart_price + ($quantity * $price);
        }
        $this->total_order_price = $this->total_cart_price + 100;
    }

    public function render()
    {
        return view('livewire.cart.cart-total-price');
    }
}
