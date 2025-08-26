<?php

namespace Modules\Poll\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Poll\Models\Pollvotes;
use Modules\Product\Models\Products;
// use Modules\Poll\Database\Factories\PolloptionsFactory;

class Polloptions extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'option_text',
        'poll_id',
    ];

    public function poll() {
        return $this->belongsTo(Products::class, 'poll_id');
    }

    public function votes() {
        return $this->hasMany(Pollvotes::class, 'poll_option_id');
    }
}
