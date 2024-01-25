<?php

namespace App\Livewire\Selection;

use App\Models\Colors;
use App\Models\Quantites;
use App\Models\Products;
use App\Models\Sizes;
use App\Models\Variants;
use App\Models\Cart;
use Carbon\Carbon;
use Livewire\Attributes\Computed;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Livewire\Attributes\On;
use Livewire\Component;

class Select extends Component

{
    public $product_id ;
    public $size_id ;
    public $size_name ;
    public $variant_id ;
    public $variant_name ;
    public $color_id ;
    public $selected_color_name ;
    public $quantity = 1 ;
    public $permit ;
    public $price ;
    public $total_price = null ;

    public function mount(){
        $this->permit = Products::where('id',$this->product_id)->first();
        if($this->permit->discount_price === null){
            $this->price = $this->permit->regular_price;
        }
        else{
            $this->price = $this->permit->discount_price;
        }
    }

    #[Computed()]
    public function sizes(){
        return Quantites::select('size_id')->where('product_id',$this->product_id)->distinct()->get();
    }

    public function getSize($id){
        $this->size_id = $id;
        $this->size_name = Sizes::find($id)->size;
        $this->dispatch('variantCheck');
        $this->dispatch('colorCheck');
    }

    #[Computed()]
    public function variants(){
        if($this->permit->size == 'enable'){
        return Quantites::select('variation_id')->where('product_id',$this->product_id)->where('size_id',$this->size_id)->distinct()->get();
        }
        else{
            return Quantites::select('variation_id')->where('product_id',$this->product_id)->distinct()->get();
        }
    }

    public function getVariant($id){
        $this->variant_id = $id;
        $this->variant_name = Variants::find($id)->variant;
        $this->dispatch('colorCheck');
    }

    #[On('variantCheck')]
    public function resetVariant(){
        if($this->variant_id){
            $this->reset('variant_name','variant_id');
        }
        if($this->color_id){
            $this->dispatch('colorCheck');
        }
    }

    #[Computed()]
    public function colors(){
        if($this->permit->size == 'enable' && $this->permit->variant == 'enable'){
            return Quantites::select('color_id')->where('product_id',$this->product_id)->where('size_id',$this->size_id)->where('variation_id',$this->variant_id)->distinct()->get();
        }
        elseif($this->permit->variant == 'enable'){
            return Quantites::select('color_id')->where('product_id',$this->product_id)->where('variation_id',$this->variant_id)->distinct()->get();
        }
        else{
            return Quantites::select('color_id')->where('product_id',$this->product_id)->distinct()->get();
        }
    }

    public function getColor($id){
        $this->color_id = $id;
        $this->selected_color_name = new NameThatColor();
        $this->selected_color_name = $this->selected_color_name->name(Colors::find($id)->color_code)['name'];
    }

    #[On('colorCheck')]
    public function resetColor(){
        if($this->color_id){
            $this->reset('color_id','selected_color_name');
        }
    }

    public function incrementing(){
        $this->quantity = $this->quantity +1 ;
        $this->total_price = $this->quantity * $this->price;
    }
    public function decrementing(){

        if($this->quantity >1){
            $this->quantity = $this->quantity -1 ;
            $this->total_price = $this->total_price - $this->price;
        }

    }
    public function save($user_id){
        Cart::insert([
            'user_id' => $user_id,
            'product_id' => $this->product_id,
            'size_id' => $this->size_id,
            'variant_id' => $this->variant_id,
            'color_id' => $this->color_id,
            'created_at' => Carbon::now(),
        ]);
    }
    public function render()
    {
        return view('livewire.selection.select')->with([
            'permit' => $this->permit,
            'color_name' => new NameThatColor(),
        ]);
    }
}
