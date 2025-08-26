<?php

namespace Modules\Poll\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Poll\Http\Requests\PollCreateRequest;
use Modules\Poll\Services\PollService;

class PollController extends Controller
{
    public function __construct(public PollService $PollService) {}

    public function create()
    {
        return view('poll::frontend.create');
    }

    public function pollStore(PollCreateRequest $request)
    {
        $validated = $request->validated();

        $this->PollService->createPoll($validated);

        return redirect()->route('poll.create')->with('success', 'Anket başarıyla oluşturuldu.');
    }

}
