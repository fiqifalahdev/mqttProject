<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    public $type;
    public $name;

    public function render()
    {
        return view('livewire.menu');
    }
}
