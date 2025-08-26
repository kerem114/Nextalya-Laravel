<?php

namespace Modules\Save\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Models\Products;
// use Modules\Save\Database\Factories\FavoriesFactory;

class Favories extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    static function isSave($urun_no)
    {
        $c = Favories::where('product_id',$urun_no)->where('user_id',Auth::id())->count();
        if($c !=0){ return true;} else { return false;}
    }


    public function getProduct()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}
