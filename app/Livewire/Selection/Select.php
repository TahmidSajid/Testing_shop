<?php

namespace App\Livewire\Selection;

use App\Models\Colors;
use App\Models\Products;
use App\Models\Sizes;
use App\Models\Variants;
use Livewire\Component;

class Select extends Component
{
    public $product_details;
    public $size ;
    public $size_per ;
    public $color ;
    public $color_per = false ;
    public $variation ;
    public $variation_per ;
    public $product_status ;

    public function select(){
        // if($this->size != ''){
        //     $this->size_per = true;
        // }
        // else{
        //     $this->size_per = false;
        // };

        // if($this->variation != ''){
        //     $this->variation_per = true;
        // }
        // else{
        //     $this->variation_per = false;
        // };
    }
    public function selectSize($id){
        $this->size = $id;
        if($this->size != ''){
            $this->color_per = true;
        }
        else{
            $this->color_per = false;
        };
    }


    public function render()
    {
        $size_options = Sizes::where('product_id',$this->product_details->id)->get();
        $color_options = Colors::where('product_id',$this->product_details->id)->get();
        $variant_options = Variants::where('product_id',$this->product_details->id)->get();
        return view('livewire.selection.select',compact('size_options','color_options','variant_options',))->with([
            'color_per' => $this->color_per,
        ]);
    }
}
