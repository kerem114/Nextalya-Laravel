<?php

namespace Modules\Community\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Community\Models\Communities;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sort = '';
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $perPage = $this->getItemsPerPage();
        $users = $this->fetchUsersWithCommunities($perPage);

        return view('community::livewire.index', [
            'users' => $users,
        ]);
    }

    private function getItemsPerPage()
    {
        return min(100, $this->sort && is_numeric($this->sort) ? (int)$this->sort : 20);
    }

    private function fetchUsersWithCommunities($perPage)
    {
        return User::whereHas('communities')
            ->with(['communities' => function($query) {
                $query->select('id', 'user_id', 'name');
            }])
            ->where(function($query) {
                $query->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('username', 'like', '%'.$this->search.'%')
                      ->orWhereHas('communities', function($q) {
                          $q->where('name', 'like', '%'.$this->search.'%');
                      });
            })
            ->withCount(['communities', 'communityProducts'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
