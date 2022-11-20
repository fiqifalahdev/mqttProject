<?php

namespace App\Http\Livewire;

use App\Models\Rainfall;
use Livewire\Component;

class Chart extends Component
{
    public $type;
    public $chartSize;
    public $className;
    public $chartName;
    public $rainfallData;

    protected $listeners = [
        'change' => 'changeData'
    ];

    public function mount()
    {
        $rainfall = Rainfall::latest()->paginate(10);
        foreach ($rainfall as $rain) {
            $data['label'][] = $rain->created_at->format('H:i:s');
            $data['data'][] = $rain->message;
        }
        $this->rainfallData = json_encode($data);
    }

    public function render()
    {
        return view('livewire.chart');
    }

    public function changeData()
    {
        $rainfall = Rainfall::latest()->paginate(10);
        foreach ($rainfall as $rain) {
            $data['label'][] = $rain->created_at->format('H:i:s');
            $data['data'][] = $rain->message;
        }
        $this->rainfallData = json_encode($data);
        $this->emit('changed', ['data' => $this->rainfallData]);
    }
}
