<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;
use Livewire\Attributes\Computed;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Livewire\Attributes\On;

class MainCart extends Component
{
    public $quantity;
    public $total_price;
    public $cart_info;

    public function mount()
    {
        $this->cart_info = Cart::where('user_id',auth()->user()->id)->get();
    }
    public function boot()
    {
        unset($this->OrderLists);
    }

    #[Computed]
    public function OrderLists(){
        return Cart::where('user_id',auth()->user()->id)->get();
    }

    public function delete($id){
        Cart::where('id',$id)->delete();
        $this->dispatch('total_price_check');
    }
    public function decrementer($quantity,$id)
    {
        if($quantity !== 1){
            $quantity = $quantity - 1;
            Cart::where('id',$id)->update([
                'quantity' => $quantity,
            ]);
            $this->dispatch('total_price_check');
        }
    }
    public function incrementer($quantity,$id)
    {
        $quantity = $quantity + 1;
        Cart::where('id',$id)->update([
            'quantity' => $quantity,
        ]);
        $this->dispatch('total_price_check');
    }

    public function render()
    {
        return view('livewire.cart.main-cart')->with([
            'color_name' => new NameThatColor()
        ]);
    }
}
