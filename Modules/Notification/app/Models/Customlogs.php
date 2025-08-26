<?php

namespace Modules\Notification\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\Notification\Database\Factories\CustomlogsFactory;

class Customlogs extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'type',
        'content',
        'status',
    ];

    // protected static function newFactory(): CustomlogsFactory
    // {
    //     // return CustomlogsFactory::new();
    // }
}
