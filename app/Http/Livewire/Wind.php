<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GetDataController;
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
        $this->windCurrent = WindCurrent::latest()->first();

        $windVolt = new GetDataController(WindVolt::class);
        $windEnergy = new GetDataController(WindEnergy::class);
        $windPower = new GetDataController(WindWatt::class);
        $windCurrent = new GetDataController(WindCurrent::class);

        $this->chartData = [
            [
                'name' => 'Wind Volt',
                'data' => $windVolt->getDataYear()
            ],
            [
                'name' => 'Wind Energy',
                'data' => $windEnergy->getDataYear()
            ],
            [
                'name' => 'Wind Power',
                'data' => $windPower->getDataYear()
            ],
            [
                'name' => 'Wind Current',
                'data' => $windCurrent->getDataYear()
            ],
        ];
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
        $this->windCurrent = WindCurrent::latest()->first();

        // emit to frontend
        $this->emit('changedWindVolt', $this->windVolt);
        $this->emit('changedWindEnergy', $this->windEnergy);
        $this->emit('changedWindCurr', $this->windCurrent);
        $this->emit('changedWindPower', $this->windPower);
    }
}
