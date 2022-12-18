<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GetDataController;
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
    public $chartData;
    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $pvVolt = new GetDataController(PvVoltage::class);
        $pvEnergy = new GetDataController(PvEnergy::class);
        $pvPower = new GetDataController(PvPower::class);
        $pvCurrent = new GetDataController(PvCurrent::class);

        $this->pvVolt = $pvVolt->getFirstData();
        $this->pvEnergy = $pvEnergy->getFirstData();
        $this->pvPower = $pvPower->getFirstData();
        $this->pvCurrent = $pvCurrent->getFirstData();


        $this->chartData = [
            [
                'name' => 'Pv Volt',
                'data' => $pvVolt->getDataYear()
            ],
            [
                'name' => 'Pv Energy',
                'data' => $pvEnergy->getDataYear()
            ],
            [
                'name' => 'Pv Power',
                'data' => $pvPower->getDataYear()
            ],
            [
                'name' => 'Pv Current',
                'data' => $pvCurrent->getDataYear()
            ],
        ];
    }

    public function render()
    {
        return view('livewire.solar-panel');
    }

    public function change()
    {
        dispatch(new MqttJobs());

        $pvVolt = new GetDataController(PvVoltage::class);
        $pvEnergy = new GetDataController(PvEnergy::class);
        $pvPower = new GetDataController(PvPower::class);
        $pvCurrent = new GetDataController(PvCurrent::class);

        $this->pvVolt = $pvVolt->getFirstData();
        $this->pvEnergy = $pvEnergy->getFirstData();
        $this->pvPower = $pvPower->getFirstData();
        $this->pvCurrent = $pvCurrent->getFirstData();

        $this->emit('changedPvVolt', $this->pvVolt);
        $this->emit('changedPvPower', $this->pvPower);
        $this->emit('changedPvEnergy', $this->pvEnergy);
        $this->emit('changedPvCurrent', $this->pvCurrent);
    }
}
