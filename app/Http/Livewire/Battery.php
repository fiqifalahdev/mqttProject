<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GetDataController;
use App\Jobs\MqttJobs;
use App\Models\BatteryCurrent;
use App\Models\BatteryEnergy;
use App\Models\BatteryOver;
use App\Models\BatterySoc;
use App\Models\BatteryTemp;
use App\Models\BatteryUnder;
use App\Models\BatteryVolt;
use App\Models\BatteryWatt;
use Livewire\Component;

class Battery extends Component
{
    public $battVolt;
    public $battEnergy;
    public $battPower;
    public $battCurrent;

    public $battOver;
    public $battUnder;
    public $battSoc;
    public $battTemp;

    public $chartData;

    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());
        // Get Data From Database by passing its Class
        $battVolt = new GetDataController();
        $battEnergy = new GetDataController();
        $battPower = new GetDataController();
        $battCurrent = new GetDataController();
        $battOver = new GetDataController();
        $battUnder = new GetDataController();
        $battSoc = new GetDataController();
        $battTemp = new GetDataController();

        $this->battVolt = $battVolt->getFirstData(BatteryVolt::class);
        $this->battEnergy = $battEnergy->getFirstData(BatteryEnergy::class);
        $this->battPower = $battPower->getFirstData(BatteryWatt::class);
        $this->battCurrent = $battCurrent->getFirstData(BatteryCurrent::class);

        $this->battOver = $battOver->getFirstData(BatteryOver::class);
        $this->battUnder = $battUnder->getFirstData(BatteryUnder::class);
        $this->battSoc = $battSoc->getFirstData(BatterySoc::class);
        $this->battTemp = $battTemp->getFirstData(BatteryTemp::class);

        $this->chartData = [
            [
                'name' => 'Battery Volt',
                'data' => $battVolt->getDataYear(BatteryVolt::class)
            ],
            [
                'name' => 'Battery Energy',
                'data' => $battEnergy->getDataYear(BatteryEnergy::class)
            ],
            [
                'name' => 'Battery Power',
                'data' => $battPower->getDataYear(BatteryWatt::class)
            ],
            [
                'name' => 'Battery Current',
                'data' => $battCurrent->getDataYear(BatteryCurrent::class)
            ],
            [
                'name' => 'Battery Over',
                'data' => $battOver->getDataYear(BatteryOver::class)
            ],
            [
                'name' => 'Battery Under',
                'data' => $battUnder->getDataYear(BatteryUnder::class)
            ],
            [
                'name' => 'Battery SOC',
                'data' => $battSoc->getDataYear(BatterySoc::class)
            ],
            [
                'name' => 'Battery Temp',
                'data' => $battTemp->getDataYear(BatteryTemp::class)
            ],
        ];
    }

    public function render()
    {
        return view('livewire.battery');
    }

    public function change()
    {
        dispatch(new MqttJobs());

        $battVolt = new GetDataController();
        $battEnergy = new GetDataController();
        $battPower = new GetDataController();
        $battCurrent = new GetDataController();
        $battOver = new GetDataController();
        $battUnder = new GetDataController();
        $battSoc = new GetDataController();
        $battTemp = new GetDataController();

        $this->battVolt = $battVolt->getFirstData(BatteryVolt::class);
        $this->battEnergy = $battEnergy->getFirstData(BatteryEnergy::class);
        $this->battPower = $battPower->getFirstData(BatteryWatt::class);
        $this->battCurrent = $battCurrent->getFirstData(BatteryCurrent::class);

        $this->battOver = $battOver->getFirstData(BatteryOver::class);
        $this->battUnder = $battUnder->getFirstData(BatteryUnder::class);
        $this->battSoc = $battSoc->getFirstData(BatterySoc::class);
        $this->battTemp = $battTemp->getFirstData(BatteryTemp::class);

        $this->emit('changedCurrent', $this->battCurrent);
        $this->emit('changedVolt', $this->battVolt);
        $this->emit('changedEnergy', $this->battEnergy);
        $this->emit('changedPower', $this->battPower);

        $this->emit('changedOver', $this->battOver);
        $this->emit('changedUnder', $this->battUnder);
        $this->emit('changedSoc', $this->battSoc);
        $this->emit('changedTemp', $this->battTemp);
    }
}
