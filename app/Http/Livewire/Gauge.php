<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Gauge extends Component
{
    public $type;
    public $gaugeSize;
    public $className;
    public $gaugeName;
    public $fetchData;
    public $data;

    public function mount($data)
    {
        $this->data = $data;
    }

    public function render()
    {
        return view('livewire.gauge');
    }
}
