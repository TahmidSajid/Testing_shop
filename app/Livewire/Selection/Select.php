<?php

namespace App\Livewire\Selection;

use App\Models\Quantites;
use App\Models\Products;
use Livewire\Attributes\Computed;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Livewire\Component;

class Select extends Component

{
    public $product_id ;
    public $size_id ;
    public $variant_id ;
    public $color_id ;
    public $permit ;

    public function mount(){
        $this->permit = Products::where('id',$this->product_id)->first();
    }
    #[Computed()]
    public function sizes(){
        return Quantites::select('size_id')->where('product_id',$this->product_id)->distinct()->get();
    }

    public function getSize($id){
        $this->size_id = $id;
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
    }

    public function save(){

    }
    public function render()
    {
        return view('livewire.selection.select')->with([
            'permit' => $this->permit,
            'color_name' => new NameThatColor(),
        ]);
    }
}
