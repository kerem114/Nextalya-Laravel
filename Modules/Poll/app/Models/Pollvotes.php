<?php

namespace Modules\Poll\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Poll\Models\Polloptions;
use Modules\Product\Models\Products;
// use Modules\Poll\Database\Factories\PollvotesFactory;

class Pollvotes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'poll_id',
        'poll_option_id',
    ];

    public function poll() {
        return $this->belongsTo(Products::class,'poll_id');
    }

    public function option() {
        return $this->belongsTo(Polloptions::class, 'poll_option_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
