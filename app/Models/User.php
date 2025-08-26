<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use \Modules\Community\Models\Communityproducts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Community\Models\Communities;
use Modules\Product\Models\Productlikes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function likes()
    {
        return $this->hasMany(Productlikes::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'follower_id')->withTimestamps();;
    }

    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'following_id')->withTimestamps();;
    }

    public function followersCount()
    {
        return $this->followers()->count();
    }

    public function followingsCount()
    {
        return $this->followings()->count();
    }
    public function isFollowing(User $user)
    {
        return $this->followings()->where('following_id', $user->id)->exists();
    }

    public function isFollowedBy(User $user)
    {
        return $this->followers()->where('follower_id', $user->id)->exists();
    }


    public function communities()
    {
        return $this->hasMany(Communities::class, 'user_id');
    }

    public function communityProducts()
    {
        return $this->hasManyThrough(
            Communityproducts::class,
            Communities::class,
            'user_id',
            'community_id',
            'id',
            'id'
        );
    }
}
