<?php

namespace Modules\Community\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Modules\Community\Database\Factories\CommunitiesFactory;

class Communities extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'community_token',
    ];

    // protected static function newFactory(): CommunitiesFactory
    // {
    //     // return CommunitiesFactory::new();
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
