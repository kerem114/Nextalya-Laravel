<?php

namespace Modules\Member\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Product\Models\Products;

class ProfileProduct extends Component
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
        $query = Products::where('user_id', $this->userId)
            ->orderBy('created_at','desc')
            ->where('type', 'product');

        $this->total = $query->count(); // toplam ürün sayısı

        $data = $query->take($this->perPage)->get();

        return view('member::livewire.profile-product', [
            'data' => $data,
        ]);
    }

    public function loadMore()
    {
        // Eğer hala ürün kaldıysa perPage artır
        if ($this->perPage < $this->total) {
            $this->perPage += 2;
        }
    }

    public function updatingSearch()
    {
        $this->perPage = 2; // arama yapılınca resetlensin
    }
}
