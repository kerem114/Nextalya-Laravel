<?php

namespace Modules\Product\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Poll\Models\Polloptions;
use Modules\Poll\Models\Pollvotes;
use Modules\Product\Models\Productlikes;
// use Modules\Product\Database\Factories\ProductsFactory;

class Products extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'description',
        'price',
        'image',
        'platform',
        'url',
        'topcat_id',
        'subcat_id',
        'lowcat_id',
        'base_token',
        'visibility',
        'type',
    ];

    public function likes()
    {
        return $this->hasMany(Productlikes::class, 'product_id');
    }

    public function isLikedBy($user)
    {
        if (!$user) return false;
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function options() {
        return $this->hasMany(Polloptions::class, 'poll_id');
    }

    public function votes() {
        return $this->hasMany(Pollvotes::class,'poll_id');
    }
}
