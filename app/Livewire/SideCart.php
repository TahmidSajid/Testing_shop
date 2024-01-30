<?php

namespace App\Livewire;

use App\Models\Cart;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Livewire\Component;

class SideCart extends Component
{
    public function render()
    {
        $order_items = Cart::where('user_id',auth()->user()->id)->get();
        return view('livewire.side-cart')->with([
            'color_name' => new NameThatColor(),
            'order_items' => $order_items,
        ]);
    }
}
