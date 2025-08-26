<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Product\Database\Factories\ProductfeaturesFactory;

class Productfeatures extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'feature_name',
    ];

    // protected static function newFactory(): ProductfeaturesFactory
    // {
    //     // return ProductfeaturesFactory::new();
    // }
}
