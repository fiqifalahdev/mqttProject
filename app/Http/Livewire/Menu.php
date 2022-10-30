<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Menu extends Component
{
    // private $typeList = ['Dashboard', 'Profile'];
    public $type;
    public $name;

    public function render()
    {
        return view('livewire.menu');
    }
}
