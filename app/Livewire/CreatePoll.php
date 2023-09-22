<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;


class CreatePoll extends Component
{
    public $title;
    public $options = ["First Option"];
    public function addOption()
    {
        $this->options[] = "";
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }
    public function createPoll()
    {
        $validated = $this->validate([
            'title' => 'required|min:5',
            'options' => 'required|array|min:1',
            'options.*' => 'required|string|min:5|max:255',
        ], [
            'options.*' => "This option shouldn't be empty"
        ]);
        $poll = Poll::create([
            "title" => $validated["title"],
        ]);
        foreach ($validated["options"] as $option) {
            $poll->options()->create([
                "name" => $option
            ]);
        }
        $this->dispatch('poll-created', $poll);
        $this->reset();
    }
    public function render()
    {
        return view('livewire.create-poll');
    }
}