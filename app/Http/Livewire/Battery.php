<?php

namespace App\Http\Livewire;

use App\Jobs\MqttJobs;
use App\Models\BatteryCurrent;
use App\Models\BatteryEnergy;
use App\Models\BatteryVolt;
use App\Models\BatteryWatt;
use Livewire\Component;

class Battery extends Component
{
    public $battVolt;
    public $battEnergy;
    public $battPower;
    public $battCurrent;
    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $this->battVolt = BatteryVolt::latest()->first();
        $this->battEnergy = BatteryEnergy::latest()->first();
        $this->battPower = BatteryWatt::latest()->first();
        $this->battCurrent = BatteryCurrent::latest()->first();
    }

    public function render()
    {
        return view('livewire.battery');
    }

    public function change()
    {
        dispatch(new MqttJobs());

        $this->battVolt = BatteryVolt::latest()->first();
        $this->battEnergy = BatteryEnergy::latest()->first();
        $this->battPower = BatteryWatt::latest()->first();
        $this->battCurrent = BatteryCurrent::latest()->first();

        $this->emit('changedCurrent', $this->battCurrent);
        $this->emit('changedVolt', $this->battVolt);
        $this->emit('changedEnergy', $this->battEnergy);
        $this->emit('changedPower', $this->battPower);
    }
}
