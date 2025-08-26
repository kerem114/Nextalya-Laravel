<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Models\Products;
use Illuminate\Support\Facades\DB;

class HomeSuggest extends Component
{
    public $perPage = 5;
    public $loaded = false;

    public function loadUsers()
    {
        $this->loaded = true;
    }

    public function follow($userId)
    {
        auth()->user()->followings()->syncWithoutDetaching([$userId]);
    }

    public function unfollow($userId)
    {
        auth()->user()->followings()->detach($userId);
    }

    public function getUsersProperty()
    {
        if (!$this->loaded) return collect();

        $currentUser = auth()->user();

        $users = User::select('users.*', DB::raw('COUNT(products.id) as products_count'))
            ->leftJoin('products', 'products.user_id', '=', 'users.id')
            ->where('users.id', '!=', $currentUser->id)
            ->whereDoesntHave('followers', function($q) use ($currentUser) {
                $q->where('follower_id', $currentUser->id);
            })
            ->groupBy('users.id')
            ->orderByDesc('products_count')
            ->inRandomOrder()
            ->take($this->perPage)
            ->get();

        return $users;
    }
    public function render()
    {
        return view('livewire.home-suggest');
    }
}
