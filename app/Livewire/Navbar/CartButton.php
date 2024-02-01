<?php

namespace App\Livewire\Navbar;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class CartButton extends Component
{
    public $order_number;

    public function mount()
    {
        $this->order_number = Cart::where('user_id',Auth::id())->get()->count();
    }

    #[On('addToCart')]
    public function getNumber()
    {
        $this->order_number = Cart::where('user_id',Auth::id())->get()->count();
    }
    public function render()
    {
        return view('livewire.navbar.cart-button');
    }
}
