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

        $windVolt = new GetDataController();
        $windEnergy = new GetDataController();
        $windPower = new GetDataController();
        $windCurrent = new GetDataController();

        $this->windVolt = $windVolt->getFirstData(WindVolt::class);
        $this->windEnergy = $windEnergy->getFirstData(WindEnergy::class);
        $this->windPower = $windPower->getFirstData(WindWatt::class);
        $this->windCurrent = $windCurrent->getFirstData(WindCurrent::class);


        $this->chartData = [
            [
                'name' => 'Wind Volt',
                'data' => $windVolt->getDataYear(WindVolt::class)
            ],
            [
                'name' => 'Wind Energy',
                'data' => $windEnergy->getDataYear(WindEnergy::class)
            ],
            [
                'name' => 'Wind Power',
                'data' => $windPower->getDataYear(WindWatt::class)
            ],
            [
                'name' => 'Wind Current',
                'data' => $windCurrent->getDataYear(WindCurrent::class)
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

        $windVolt = new GetDataController();
        $windEnergy = new GetDataController();
        $windPower = new GetDataController();
        $windCurrent = new GetDataController();

        $this->windVolt = $windVolt->getFirstData(WindVolt::class);
        $this->windEnergy = $windEnergy->getFirstData(WindEnergy::class);
        $this->windPower = $windPower->getFirstData(WindWatt::class);
        $this->windCurrent = $windCurrent->getFirstData(WindCurrent::class);

        // emit to frontend
        $this->emit('changedWindVolt', $this->windVolt);
        $this->emit('changedWindEnergy', $this->windEnergy);
        $this->emit('changedWindCurr', $this->windCurrent);
        $this->emit('changedWindPower', $this->windPower);
    }
}
