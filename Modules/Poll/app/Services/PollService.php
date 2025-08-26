<?php

namespace Modules\Poll\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Modules\Poll\Interfaces\PollRepositoryInterface;
use Modules\Poll\Models\Polloptions;

class PollService
{
    protected $PollRepository;

    public function __construct(PollRepositoryInterface $PollRepository)
    {
        $this->PollRepository = $PollRepository;
    }

    public function createPoll(array $data)
    {
        $data['base_token'] = Str::random(16);
        $data['user_id'] = Auth::user()->id;
        $data['type'] = 'poll';

        $poll = $this->PollRepository->store($data);

        foreach ($data['options'] as $option) {
            Polloptions::create([
                'poll_id'     => $poll->id,
                'option_text' => $option,
            ]);
        }

        return $poll;
    }
}
