<?php

namespace Modules\Member\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Poll\Models\Pollvotes;
use Modules\Product\Models\Products;

class Polloption extends Component
{


    public $poll; // dışarıdan gönderilecek
    public $userVoted;
    public $totalVotes;

    public function mount(Products $poll)
    {
        $this->poll = $poll->load('options', 'votes');
        $this->userVoted = $this->poll->votes->where('user_id', Auth::id())->first();
        $this->totalVotes = $this->poll->votes->count();
    }

    public function vote($optionId)
    {
        if ($this->userVoted) {
            return; // tekrar oy kullanamaz
        }

        Pollvotes::create([
            'poll_id' => $this->poll->id,
            'poll_option_id' => $optionId,
            'user_id' => Auth::id(),
        ]);

        // Tekrar güncelle
        $this->poll->load('options', 'votes');
        $this->userVoted = $this->poll->votes->where('user_id', Auth::id())->first();
        $this->totalVotes = $this->poll->votes->count();
    }

    public function render()
    {
        return view('member::livewire.polloption');
    }
}
