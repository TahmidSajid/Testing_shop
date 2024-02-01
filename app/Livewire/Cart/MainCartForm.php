<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use Livewire\Component;

class MainCartForm extends Component
{
    public $product_info;
    public $cart_info;
    public $quantity;
    public $total_price;

    public function mount()
    {
        $this->quantity = $this->cart_info->quantity;
    }
    public function decrementer()
    {
        if($this->quantity !== 1){
            $this->quantity = $this->quantity - 1;
            Cart::where('id',$this->cart_info->id)->update([
                'quantity' => $this->quantity,
            ]);
            if ($this->product_info->discount_price){
                $this->total_price = $this->product_info->discount_price * $this->quantity;
            }
            else{
                $this->total_price = $this->product_info->regular_price * $this->quantity;
            }
        }
    }
    public function incrementer()
    {
        $this->quantity = $this->quantity + 1;
        Cart::where('id',$this->cart_info->id)->update([
            'quantity' => $this->quantity,
        ]);
        if ($this->product_info->discount_price){
            $this->total_price = $this->product_info->discount_price * $this->quantity;
        }
        else{
            $this->total_price = $this->product_info->regular_price * $this->quantity;
        }
    }

    public function render()
    {
        return view('livewire.cart.main-cart-form');
    }
}
