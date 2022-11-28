<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chart extends Component
{
    public $type;
    public $chartSize;
    public $className;
    public $chartName;
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.chart');
    }
}
