<?php

namespace App\Http\Livewire;

use App\Jobs\MqttJobs;
use App\Models\WindCurrent;
use App\Models\WindEnergy;
use App\Models\WindVolt;
use App\Models\WindWatt;
use Livewire\Component;

class Wind extends Component
{
    public $windVolt;
    public $windEnergy;
    public $windPower;
    public $windCurrent;
    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $this->windVolt = WindVolt::latest()->first();
        $this->windEnergy = WindEnergy::latest()->first();
        $this->windPower = WindWatt::latest()->first();
        $this->windCurrent = WindCurrent::latest()->limit(10)->get();
        foreach ($this->windCurrent as $value) {
            $data['label'][] = $value->created_at->format("H:i:s");
            $data['data'][] = $value->message;
        }

        $this->windCurrent = json_encode($data);
    }

    public function render()
    {
        return view('livewire.wind');
    }

    public function change()
    {
        dispatch(new MqttJobs());

        $this->windVolt = WindVolt::latest()->first();
        $this->windEnergy = WindEnergy::latest()->first();
        $this->windPower = WindWatt::latest()->first();
        $this->windCurrent = WindCurrent::latest()->limit(10)->get();
        foreach ($this->windCurrent as $value) {
            $data['label'][] = $value->created_at->format("H:i:s");
            $data['data'][] = $value->message;
        }

        $this->windCurrent = json_encode($data);
        $this->emit('changed', $this->windCurrent);
    }
}
