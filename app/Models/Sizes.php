<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sizes extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getSizeAll(): HasMany
    {
        return $this->hasMany(Quantites::class,'size_id','id');
    }
}
