<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Card extends Component
{
    public $unit;
    public $fontSize;
    public $fontWeight;
    public $color;

    public function render()
    {
        return view('livewire.card');
    }
}
