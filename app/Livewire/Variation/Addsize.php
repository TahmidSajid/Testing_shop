<?php

namespace App\Livewire\Variation;

use App\Models\Products;
use App\Models\Quantites;
use App\Models\Sizes;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Attributes\On;


class Addsize extends Component
{

    #[Validate('required')]
    public $size = " ";

    public $prduct = " ";

    public function add_size(){
        $this->validate();
        Sizes::insert([
            'size' => $this->size,
            'product_id' => $this->prduct,
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('size');
        $this->dispatch("redering");
    }
    public function delete($id){
        Sizes::where('id',$id)->delete();
        $this->dispatch("redering");
    }
    #[On('q_update')]
    public function render()
    {
        // ********** to know which size are in use **********
        $quantity_size = Quantites::select('size_id')->where('product_id',$this->prduct)->get();
        $size_used = array();
        foreach ($quantity_size as $key => $value) {
            $size_used[$key] = $value['size_id'];
        }
        $size_used = array_unique($size_used);
        // ********** end **********

        $size_sec = Products::where('id',$this->prduct)->first();
        $sizes = Sizes::where('product_id',$this->prduct)->get();
        return view('livewire.variation.addsize',compact('sizes','size_sec','quantity_size','size_used'));
    }
}
