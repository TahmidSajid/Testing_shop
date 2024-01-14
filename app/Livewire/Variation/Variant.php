<?php

namespace App\Livewire\Variation;

use App\Models\Products;
use Livewire\Component;
use App\Models\Variants;
use App\Models\Quantites;
use Livewire\Attributes\On;

class Variant extends Component
{
    public $variant =" ";
    public $prduct = " ";

    public function save(){
        Variants::create([
            'variant' => $this->variant,
            'product_id' => $this->prduct,
        ]);
        $this->reset('variant');
        $this->dispatch("redering");
    }
    public function delete($id){
        Variants::where('id',$id)->delete();
        $this->dispatch("redering");
    }
    #[On('q_update')]
    public function render()
    {
        // ********** to know which color are in use **********
        $quantity_variant = Quantites::select('variation_id')->where('product_id',$this->prduct)->get();
        $variant_used = array();
        foreach ($quantity_variant as $key => $value) {
            $variant_used[$key] = $value['variation_id'];
        }
        $variant_used = array_unique($variant_used);
        // ********** end **********


        $variant_sec = Products::where('id',$this->prduct)->first();
        $variants = Variants::where('product_id',$this->prduct)->get();
        return view('livewire.variation.variant',compact('variants','variant_sec','variant_used'));
    }
}
