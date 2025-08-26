<?php

namespace Modules\Community\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Products;
// use Modules\Community\Database\Factories\CommunityproductsFactory;

class Communityproducts extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'community_id',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }

}
