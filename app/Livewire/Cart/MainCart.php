<?php

namespace App\Livewire\Cart;

use Livewire\Component;
use App\Models\Cart;

class MainCart extends Component
{
    public $order_lists ;
    public $quantity;

    public function mount()
    {
        $this->order_lists = Cart::where('user_id',auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.cart.main-cart')->with([
            'order_lists' => $this->order_lists,
        ]);
    }
}
