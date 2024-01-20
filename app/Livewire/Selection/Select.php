<?php

namespace App\Livewire\Selection;

use App\Models\Quantites;
use App\Models\Sizes;
use App\Models\Variants;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Select extends Component

{
    public $product_id ;
    public $size_id ;
    public $variant = [];

    #[Computed()]
    public function sizes(){
        return Sizes::where('product_id',$this->product_id)->get();
    }
    public function save(){

    }
    public function getSize($id){
        $this->size_id = $id;
    }
    #[Computed()]
    public function variants(){
        return Quantites::where('product_id',$this->product_id)->where('size_id',$this->size_id)->get();
    }
    public function render()
    {
        return view('livewire.selection.select');
    }
}
