<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chart extends Component
{
    public $type;
    public $chartSize;
    public $className;
    public $chartName;
    public function render()
    {
        return view('livewire.chart');
    }
}
