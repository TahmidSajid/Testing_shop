<?php

namespace App\Livewire\Variation;

use App\Models\Products;
use Livewire\Component;
use App\Models\Variants;

class Variant extends Component
{
    public $variant =" ";
    public $prduct = " ";

    public function save(){
        Variants::create([
            'variant' => $this->variant,
            'product_id' => $this->prduct,
        ]);
    }
    public function delete($id){
        Variants::where('id',$id)->delete();
    }
    public function render()
    {
        $variant_sec = Products::where('id',$this->prduct)->first();
        $variants = Variants::where('product_id',$this->prduct)->get();
        return view('livewire.variation.variant',compact('variants','variant_sec'));
    }
}
