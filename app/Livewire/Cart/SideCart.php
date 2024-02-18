<?php

namespace App\Livewire\Cart;
use App\Models\Cart;
use App\Models\Cupons;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class SideCart extends Component
{
    public $Items_info;

    public $cupon_discount = null;

    public $moneyOff ;

    public $price_after_discount ;


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
        $cupon_id = Cart::where('user_id', auth()->user()->id)->first()->cupon_id;
        if($cupon_id !== null){
            $this->cupon_discount = Cupons::where('id',$cupon_id)->where('user_id',auth()->user()->id)->first()->cupon_discount;
            $this->price_after_discount = $this->totalPrice * ($this->cupon_discount/100);
            $this->moneyOff = $this->totalPrice - $this->price_after_discount;
        }
        return view('livewire.cart.side-cart')->with([
            'color_name' => new NameThatColor(),
        ]);
    }
}
