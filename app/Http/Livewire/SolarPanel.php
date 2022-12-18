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

        $pvVolt = new GetDataController();
        $pvEnergy = new GetDataController();
        $pvPower = new GetDataController();
        $pvCurrent = new GetDataController();

        $this->pvVolt = $pvVolt->getFirstData(PvVoltage::class);
        $this->pvEnergy = $pvEnergy->getFirstData(PvEnergy::class);
        $this->pvPower = $pvPower->getFirstData(PvPower::class);
        $this->pvCurrent = $pvCurrent->getFirstData(PvCurrent::class);


        $this->chartData = [
            [
                'name' => 'Pv Volt',
                'data' => $pvVolt->getDataYear(PvVoltage::class)
            ],
            [
                'name' => 'Pv Energy',
                'data' => $pvEnergy->getDataYear(PvEnergy::class)
            ],
            [
                'name' => 'Pv Power',
                'data' => $pvPower->getDataYear(PvPower::class)
            ],
            [
                'name' => 'Pv Current',
                'data' => $pvCurrent->getDataYear(PvCurrent::class)
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

        $pvVolt = new GetDataController();
        $pvEnergy = new GetDataController();
        $pvPower = new GetDataController();
        $pvCurrent = new GetDataController();

        $this->pvVolt = $pvVolt->getFirstData(PvVoltage::class);
        $this->pvEnergy = $pvEnergy->getFirstData(PvEnergy::class);
        $this->pvPower = $pvPower->getFirstData(PvPower::class);
        $this->pvCurrent = $pvCurrent->getFirstData(PvCurrent::class);

        $this->emit('changedPvVolt', $this->pvVolt);
        $this->emit('changedPvPower', $this->pvPower);
        $this->emit('changedPvEnergy', $this->pvEnergy);
        $this->emit('changedPvCurrent', $this->pvCurrent);
    }
}
