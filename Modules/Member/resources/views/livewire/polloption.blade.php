<div class="mb-4 border p-3 rounded">
    <h4>{{ $poll->title }}</h4>
    <p class="text-dark">{{ $poll->created_at->format('d.m.Y H:i') }}</p>

    @if(!$userVoted)
        {{-- Kullanıcı oy vermemişse seçenekleri göster --}}
        @foreach($poll->options as $option)
            <button wire:click="vote({{ $option->id }})"
                    class="btn btn-outline-primary btn-sm d-block mb-1">
                {{ $option->option_text }}
            </button>
        @endforeach
    @else
        {{-- Kullanıcı oy verdiyse sonuçları göster --}}
        @foreach($poll->options as $option)
            @php
                $optionVotes = $option->votes->count();
                $percent = $totalVotes > 0 ? round(($optionVotes / $totalVotes) * 100) : 0;
            @endphp
            <div class="mb-1 text-dark">
                <strong>{{ $option->option_text }}</strong> - {{ $optionVotes }} oy ({{ $percent }}%)
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{ $percent }}%">
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
