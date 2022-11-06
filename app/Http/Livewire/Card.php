<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $unit;
    public $className;
    public $icon;

    public function render()
    {
        return view('livewire.card');
    }
}
