<?php

namespace Modules\Community\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Community\Models\Communities;

class Userdetail extends Component
{
    use WithPagination;


    public $search = '';

    public $sort = '';

    public $userId;


    protected $paginationTheme = 'bootstrap';

    public function mount($userId)
    {
        $this->userId = $userId;
    }

    public function render()
    {
        $perPage = $this->getItemsPerPage();

        $data = $this->fetchData($perPage);

        return view('community::livewire.userdetail', [
            'data' => $data,
        ]);
    }

    private function getItemsPerPage()
    {
        return min(100, $this->sort && is_numeric($this->sort) ? (int)$this->sort : 20);
    }

    private function fetchData($perPage)
    {
        return Communities::where('user_id', $this->userId)
            ->where('name', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
