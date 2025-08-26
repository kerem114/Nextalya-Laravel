<?php

namespace Modules\Community\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Models\Products;
use Modules\Community\Models\Communityproducts;

class My extends Component
{
    use WithPagination;


    public $search = '';

    public $sort = '';

    public $communityId;

    protected $paginationTheme = 'bootstrap';

    public function mount($communityId = null)
    {
        $this->communityId = $communityId;
    }

    public function render()
    {
        $perPage = $this->getItemsPerPage();

        $data = $this->fetchData($perPage);

        return view('community::livewire.my', [
            'data' => $data,
            'community_id' => $this->communityId,
        ]);
    }

        public function isInCommunity($productId, $communityId)
    {
        return Communityproducts::where('product_id', $productId)
            ->where('community_id', $communityId)
            ->where('user_id', Auth::id())
            ->exists();
    }

    public function addProduct($productId, $communityId)
    {
        Communityproducts::firstOrCreate([
            'product_id'   => $productId,
            'community_id' => $communityId,
            'user_id'      => Auth::id(),
        ]);
    }

    public function removeProduct($productId, $communityId)
    {
        Communityproducts::where('product_id', $productId)
            ->where('community_id', $communityId)
            ->where('user_id', Auth::id())
            ->delete();
    }

    private function getItemsPerPage()
    {
        return min(100, $this->sort && is_numeric($this->sort) ? (int)$this->sort : 20);
    }

    private function fetchData($perPage)
    {
        return Products::where('user_id', Auth::id())
            ->where('type', 'product')
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
