<?php

namespace Modules\Member\Livewire;

use Livewire\Component;
use Modules\Product\Models\Reposts;

class Repost extends Component
{
    public $search = '';
    public $perPage = 2; // başlangıç
    public $total = 0;

    public $userId;

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $query = Reposts::where('user_id', $this->userId)
            ->orderBy('created_at','desc');

        $this->total = $query->count();

        $data = $query->take($this->perPage)->get();

        return view('member::livewire.repost', [
            'data' => $data,
        ]);
    }

    public function loadMore()
    {
        if ($this->perPage < $this->total) {
            $this->perPage += 2;
        }
    }

    public function updatingSearch()
    {
        $this->perPage = 2;
    }
}
