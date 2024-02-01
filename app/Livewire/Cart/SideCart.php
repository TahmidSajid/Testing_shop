<?php

namespace App\Livewire\Cart;
use App\Models\Cart;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class SideCart extends Component
{
    public $Items_info;


    #[Computed]
    public function orderItems()
    {
        if(Auth::check()){
        return Cart::where('user_id',auth()->user()->id)->get();
        }
        else{
            return [];
        }

    }

    #[Computed]
    public function totalPrice()
    {
        $total = 0;
        foreach ($this->orderItems as $key => $value) {
            if($value->getProduct->discount_price){
                $total = $total + ($value->getProduct->discount_price * $value->quantity);
            }
            else{
                $total = $total + ($value->getProduct->regular_price * $value->quantity);
            }
        }
        return $total;
    }

    #[On('addToCart')]
    public function render()
    {
        return view('livewire.cart.side-cart')->with([
            'color_name' => new NameThatColor(),
        ]);
    }
}
