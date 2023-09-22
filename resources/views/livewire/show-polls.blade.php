<div>
    @foreach ($polls as $poll)
        <div class="mb-4 mt-4">
            <div class="mb-4"><label for="">{{ $poll->title }}</label></div>
            @foreach ($poll->options as $option)
                <div class=" flex gap-4 mb-4">
                    <button class="btn" wire:click.prevent="addVote({{ $option }})">Vote</button>
                    <div>{{ $option->name }} ({{ $option->votes()->count() }})</div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
