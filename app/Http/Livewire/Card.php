<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Card extends Component
{
    public $header;
    public $className;
    public $values;


    public function mount($values)
    {
        $this->values = $values;
    }

    public function render()
    {
        return view('livewire.card');
    }
}
