<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPolls extends Component
{
    #[On('poll-created')]
    public function render()
    {
        $polls = Poll::with("options.votes")->latest()->get();
        return view('livewire.show-polls', ["polls" => $polls]);
    }
    public function addVote(Option $option)
    {
        $option->votes()->create();
    }
}