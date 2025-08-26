<?php

namespace Modules\Dashboard\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Member\Models\Follows;
use Modules\Product\Models\Products;

class DashboardFeed extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $perPage = 5; // her seferde kaç tane içerik yüklenecek

    public function loadMore()
    {
        $this->perPage += 5; // butona basınca 5 tane daha getir
    }

    public function render()
    {
        $user = auth()->user();

        // takip edilen kullanıcıların id'leri
        $followingIds = Follows::where('follower_id', $user->id)
            ->pluck('following_id')
            ->toArray();

        // ürünleri çekiyoruz
        $feed = Products::where(function ($query) use ($user, $followingIds) {
                $query->whereIn('user_id', $followingIds)
                      ->whereIn('visibility', ['everyone', 'friends']);
            })
            ->orWhere(function ($query) {
                // herkes görebilir (everyone)
                $query->where('visibility', 'everyone');
            })
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);

        return view('dashboard::livewire.dashboard-feed', [
            'feed' => $feed,
        ]);
    }
}
