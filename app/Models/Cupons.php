<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Cupons extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUsers():HasOne
    {
        return $this->hasOne(User::class , 'id', 'user_id');
    }
}
