<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getProduct():HasOne
    {
        return $this->hasOne(Products::class,'id','product_id');
    }
    public function getSize():HasOne
    {
        return $this->hasOne(Sizes::class,'id','size_id');
    }
    public function getVariant():HasOne
    {
        return $this->hasOne(Variants::class,'id','variant_id');
    }
    public function getColor():HasOne
    {
        return $this->hasOne(Colors::class,'id','color_id');
    }
}
