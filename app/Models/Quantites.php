<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Sizes;
use Illuminate\Database\Eloquent\Model;

class Quantites extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getSize(): HasOne
    {
        return $this->hasOne(Sizes::class,'id','size_id');
    }
    public function getColor(): HasOne
    {
        return $this->hasOne(Colors::class,'id','color_id');
    }
    public function getVariant(): HasOne
    {
        return $this->hasOne(Variants::class,'id','variation_id');
    }
}
