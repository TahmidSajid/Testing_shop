<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\categories;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Products extends Model
{
    use HasFactory;
    public function catetoprod():HasOne
    {
        return $this->hasOne(categories::class,'id','category_id');
    }
    public function productReview():HasMany
    {
        return $this->HasMany(Reviews::class,'product_id','id');
    }
    protected  $guarded = [];

}
