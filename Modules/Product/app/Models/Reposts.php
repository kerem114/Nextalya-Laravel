<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Products;
// use Modules\Product\Database\Factories\RepostsFactory;

class Reposts extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'comment',
    ];

    // protected static function newFactory(): RepostsFactory
    // {
    //     // return RepostsFactory::new();
    // }

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
