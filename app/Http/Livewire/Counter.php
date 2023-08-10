<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;

    public function increment(): int
    {
        return $this->count++;
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
