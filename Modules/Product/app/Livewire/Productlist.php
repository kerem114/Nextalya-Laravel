<?php

namespace Modules\Product\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Models\Products;

class Productlist extends Component
{
    use WithPagination;

    public $search = '';

    public $sort = '';

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $perPage = $this->getItemsPerPage();

        $data = $this->fetchData($perPage);

        return view('product::livewire.productlist', [
            'data' => $data,
        ]);
    }

    private function getItemsPerPage()
    {
        return min(100, $this->sort && is_numeric($this->sort) ? (int)$this->sort : 10);
    }

    private function fetchData($perPage)
    {
        return Products::where('user_id', Auth::user()->id)
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->where('type', 'product')
            ->paginate($perPage);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

}
