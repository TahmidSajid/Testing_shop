<?php

namespace App\Livewire\Variation;

use App\Models\Sizes;
use App\Models\Variants;
use App\Models\Colors;
use App\Models\Products;
use App\Models\Quantites;
use Livewire\Component;
use Livewire\Attributes\On;

class Quantity extends Component
{
    public $prduct = "";
    public $color = "";
    public $size = "";
    public $variant = "";
    public $quantity = "";

    public function save(){
        if($this->size == ''){
            $this->size = null;
        };

        if($this->color == ''){
            $this->color = null;
        };

        if($this->variant == ''){
            $this->variant = null;
        };

        Quantites::create([
            'product_id' => $this->prduct,
            'size_id' => $this->size,
            'color_id' => $this->color,
            'variation_id' => $this->variant,
            'quantity' => $this->quantity,
        ]);

        $this->reset('color','size','variant','quantity');
        $this->dispatch('q_update');
    }
    public function delete($id){
        Quantites::where('id',$id)->delete();
        $this->dispatch('q_update');
    }
    #[On('redering')]
    public function render()
    {
        $product = Products::where('id',$this->prduct)->first();
        $color_select = Colors::where('product_id',$this->prduct)->get();
        $size_select = Sizes::where('product_id',$this->prduct)->get();
        $varint_select = Variants::where('product_id',$this->prduct)->get();
        $quantities = Quantites::where('product_id',$this->prduct)->get();
        return view('livewire.variation.quantity',compact('color_select','size_select','varint_select','product','quantities'));
    }
}
