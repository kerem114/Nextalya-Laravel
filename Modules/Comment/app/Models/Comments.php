<?php

namespace Modules\Comment\Models;

use \App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Modules\Comment\Database\Factories\CommentsFactory;

class Comments extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'comment',
    ];

    // protected static function newFactory(): CommentsFactory
    // {
    //     // return CommentsFactory::new();
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
