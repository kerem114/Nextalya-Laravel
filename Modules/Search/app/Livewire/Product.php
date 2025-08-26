<?php

namespace Modules\Search\Livewire;

use Livewire\Component;
use Modules\Product\Models\Products;

class Product extends Component
{
   public $search = '';
    public $perPage = 2;
    public $total = 0;


    public function render()
    {
        $query = Products::inRandomOrder()
            ->orderBy('created_at','desc')
            ->where('type', 'product');

        $this->total = $query->count();

        $data = $query->take($this->perPage)->get();

        return view('search::livewire.product', [
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
