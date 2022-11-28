<?php

namespace App\Http\Livewire;

use App\Jobs\MqttJobs;
use App\Models\PvCurrent;
use App\Models\PvEnergy;
use App\Models\PvPower;
use App\Models\PvVoltage;
use Livewire\Component;

class SolarPanel extends Component
{
    public $pvVolt;
    public $pvEnergy;
    public $pvPower;
    public $pvCurrent;
    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $this->pvVolt = PvVoltage::latest()->first();
        $this->pvEnergy = PvEnergy::latest()->first();
        $this->pvPower = PvPower::latest()->first();
        $this->pvCurrent = PvCurrent::latest()->limit(10)->get();
        foreach ($this->pvCurrent as $value) {
            $data['label'][] = $value->created_at->format("H:i:s");
            $data['data'][] = $value->message;
        }

        $this->pvCurrent = json_encode($data);
    }

    public function render()
    {
        return view('livewire.solar-panel');
    }

    public function change()
    {
        dispatch(new MqttJobs());

        $this->pvVolt = PvVoltage::latest()->first();
        $this->pvEnergy = PvEnergy::latest()->first();
        $this->pvPower = PvPower::latest()->first();
        $this->pvCurrent = PvCurrent::latest()->limit(10)->get();
        foreach ($this->pvCurrent as $value) {
            $data['label'][] = $value->created_at->format("H:i:s");
            $data['data'][] = $value->message;
        }

        $this->pvCurrent = json_encode($data);
        $this->emit('changed', $this->pvCurrent);
    }
}
