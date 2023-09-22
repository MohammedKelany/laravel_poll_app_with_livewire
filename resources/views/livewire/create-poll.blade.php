<div>
    @if (session('status'))
        <div class="alert m-4 text-green-500">{{ session('status') }}</div>
    @endif
    <form wire:submit="createPoll" method="post">
        @csrf
        <label>Poll Title</label>
        <input type="text" id="title" wire:model.live="title">
        @error('title')
            <div class="text-red-500 mt-2">{{ $message }}</div>
        @enderror
        {{-- <input type="submit"> --}}
        <button wire:click.prevent="addOption" class="btn mt-4">Add Option</button>
        @foreach ($options as $index => $option)
            <div class="mb-4 mt-4">
                <label for="">Option {{ $index + 1 }}</label>
                <div class="flex gap-2">
                    <input type="text" wire:model.live="options.{{ $index }}">
                    <button wire:click.prevent="removeOption({{ $index }})" class="btn">Remove</button>
                </div>
                @error("options.{$index}")
                    <div class="text-red-500 mb-2 mt-2">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
        @error('options')
            <div class="text-red-500 mb-2 mt-2">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn">Submit</button>
    </form>
</div>
