<?php

namespace App\Livewire\Variation;

use Livewire\Component;
use App\Models\Colors;
use App\Models\Products;
use Livewire\Attributes\Validate;
use App\Models\Quantites;
use ourcodeworld\NameThatColor\ColorInterpreter as NameThatColor;
use Livewire\Attributes\On;
use Carbon\Carbon;

class Color extends Component
{
    #[Validate('required')]
    public $code = " ";

    public $prduct = " ";

    public function add_color(){
        // $this->validate();
        Colors::insert([
            'color_code' => $this->code,
            'product_id' => $this->prduct,
            'created_at'=> Carbon::now(),
        ]);
        $this->reset('code');
        $this->dispatch("redering");
    }
    public function delete($id){
        Colors::where('id',$id)->delete();
        $this->dispatch("redering");
    }
    public function editColor($id){
        $old_values = Colors::where('id',$id)->first();
        $this->code = $old_values->color_code;
        $this->prduct = $old_values->product_id;
    }
    #[On('q_update')]
    public function render()
    {
        // ********** to know which color are in use **********
        $quantity_color = Quantites::select('color_id')->where('product_id',$this->prduct)->get();
        $color_used = array();
        foreach ($quantity_color as $key => $value) {
            $color_used[$key] = $value['color_id'];
        }
        $color_used = array_unique($color_used);
        // ********** end **********

        $color_name = new NameThatColor();
        $color_sec = Products::where('id',$this->prduct)->first();
        $colors = Colors::where('product_id',$this->prduct)->get();
        return view('livewire.variation.color',compact('colors','color_sec','color_name','color_used'));
    }
}
