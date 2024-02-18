<?php

namespace App\Livewire\Cart;

use App\Models\Cart;
use App\Models\Cupons;
use Livewire\Attributes\On;
use Livewire\Component;

class AddCupon extends Component
{
    public $coupon;

    // ********* for appear and disappear the cupon form
    public $cupon_addition ;

    public function boot()
    {
        $this->cupon_addition = Cart::where('user_id',auth()->user()->id)->first()->cupon_id;
    }

    public function addCupon()
    {
        $cupon_info = Cupons::where('key',$this->coupon)->where('user_id',auth()->user()->id)->first();
        if($cupon_info !== null){
            Cart::where('user_id',auth()->user()->id)->update([
                'cupon_id' => $cupon_info->id,
            ]);
            $this->cupon_addition = Cart::where('user_id',auth()->user()->id)->first()->cupon_id;

            // *********** for price check after adding a cupon
            $this->dispatch('after_cupon');
        }
        else{
            session()->flash('cuponError', 'Invalid cupon.');
        }
    }
    public function detachCupon()
    {
        Cart::where('user_id',auth()->user()->id)->update([
            'cupon_id' => null,
        ]);

        // *********** for price check after detaching a cupon
        $this->dispatch('before_cupon');

        $this->cupon_addition = Cart::where('user_id',auth()->user()->id)->first()->cupon_id;
    }

    public function render()
    {
        return view('livewire.cart.add-cupon');
    }

}
