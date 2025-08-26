<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Product\Database\Factories\ProductviewsFactory;

class Productviews extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'view_user_id',
        'view_count',
    ];

    // protected static function newFactory(): ProductviewsFactory
    // {
    //     // return ProductviewsFactory::new();
    // }
}
