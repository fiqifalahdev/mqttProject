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

        $this->pvVolt = PvVoltage::latest()->first();
        $this->pvEnergy = PvEnergy::latest()->first();
        $this->pvPower = PvPower::latest()->first();
        $this->pvCurrent = PvCurrent::latest()->first();

        $pvVolt = new GetDataController(PvVoltage::class);
        $pvEnergy = new GetDataController(PvEnergy::class);
        $pvPower = new GetDataController(PvPower::class);
        $pvCurrent = new GetDataController(PvCurrent::class);

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

        $this->pvVolt = PvVoltage::latest()->first();
        $this->pvEnergy = PvEnergy::latest()->first();
        $this->pvPower = PvPower::latest()->first();
        $this->pvCurrent = PvCurrent::latest()->first();
        // $this->pvCurrent = PvCurrent::latest()->limit(10)->get();
        // foreach ($this->pvCurrent as $value) {
        //     $data['label'][] = $value->created_at->format("H:i:s");
        //     $data['data'][] = $value->message;
        // }

        // $this->pvCurrent = json_encode($data);
        $this->emit('changedPvVolt', $this->pvVolt);
        $this->emit('changedPvPower', $this->pvPower);
        $this->emit('changedPvEnergy', $this->pvEnergy);
        $this->emit('changedPvCurrent', $this->pvCurrent);
    }
}
