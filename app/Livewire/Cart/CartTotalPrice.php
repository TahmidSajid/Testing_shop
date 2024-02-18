<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Cupons;
use Livewire\Attributes\On;
use Livewire\Component;

class CartTotalPrice extends Component
{
    public $cart_info ;
    public $total_cart_price = 0;
    public $total_order_price = 0;

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

            $this->total_order_price = $this->total_cart_price;
        }


        // ******** for price check if cupon added
        $cupon_check = Cart::where('user_id',auth()->user()->id)->first()->cupon_id;
        if($cupon_check !== null){
            $this->dispatch('after_cupon');
        }
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
            $this->total_order_price = $this->total_cart_price;
        }

        // ******** for price check if cupon added
        $cupon_check = Cart::where('user_id',auth()->user()->id)->first()->cupon_id;
        if($cupon_check !== null){
            $this->dispatch('after_cupon');
        }
    }

    #[On('after_cupon')]
    public function afterCupon()
    {
        $cupon_id = Cart::select('cupon_id')->where('user_id',auth()->user()->id)->first()->cupon_id;
        $cupon_info = Cupons::where('id',$cupon_id)->first();
        $after_cupon = $this->total_order_price * ($cupon_info->cupon_discount/100);
        $this->total_order_price = $after_cupon;
    }

    #[On('before_cupon')]
    public function beforeCupon()
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
            $this->total_order_price = $this->total_cart_price;
        }
    }

    public function render()
    {
        return view('livewire.cart.cart-total-price');
    }
}
