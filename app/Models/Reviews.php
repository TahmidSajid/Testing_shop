<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUsers(): HasOne
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
