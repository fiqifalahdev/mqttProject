<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chart extends Component
{
    public $type;
    public $cWidth;
    public $cHeight;
    public $tWidth;
    public $chartName;
    public function render()
    {
        return view('livewire.chart');
    }
}
