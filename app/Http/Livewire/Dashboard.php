<?php

namespace App\Http\Livewire;

use App\Http\Controllers\GetDataController;
use App\Jobs\MqttJobs;
use App\Models\BatteryOver;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\Rainfall;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use Livewire\Component;

class Dashboard extends Component
{
    public $humidity;
    public $intensity;
    public $windPoint;
    public $windSpeed;
    public $rainfall;
    public $chartData;

    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        // Dispatch Jobs for running subscriber
        dispatch(new MqttJobs());

        // Get Data For Gauge
        $humidity = new GetDataController();
        $intensity = new GetDataController();
        $windSpeed = new GetDataController();
        $rainfall = new GetDataController();
        $windPoint = new GetDataController();

        $this->humidity = $humidity->getFirstData(Humidity::class);
        $this->intensity = $intensity->getFirstData(Intensity::class);
        $this->windSpeed = $windSpeed->getFirstData(WindSpeed::class);;
        $this->rainfall = $rainfall->getFirstData(Rainfall::class);;
        $this->windPoint = $windPoint->getFirstData(WindPoint::class);
        $this->windPoint = $this->convertToDirection(intval($this->windPoint));

        // Get Data for Trend Chart
        $this->chartData = [
            [
                'name' => 'Humidity',
                'data' => $humidity->getDataYear(Humidity::class)
            ],
            [
                'name' => 'Intensity',
                'data' => $intensity->getDataYear(Intensity::class)
            ],
            [
                'name' => 'WindSpeed',
                'data' => $windSpeed->getDataYear(WindSpeed::class)
            ],
            [
                'name' => 'Rainfall',
                'data' => $rainfall->getDataYear(Rainfall::class)
            ],
        ];
    }

    public function render()
    {
        return view('livewire.dashboard');
    }


    public function change()
    {
        dispatch(new MqttJobs());

        $humidity = new GetDataController();
        $intensity = new GetDataController();
        $windSpeed = new GetDataController();
        $rainfall = new GetDataController();
        $windPoint = new GetDataController();

        $this->humidity = $humidity->getFirstData(Humidity::class);
        $this->intensity = $intensity->getFirstData(Intensity::class);
        $this->windSpeed = $windSpeed->getFirstData(WindSpeed::class);;
        $this->rainfall = $rainfall->getFirstData(Rainfall::class);;
        $this->windPoint = $windPoint->getFirstData(WindPoint::class);
        $this->windPoint = $this->convertToDirection(intval($this->windPoint));
        // Emit event 
        $this->emit('windSpeed', $this->windSpeed);
        $this->emit('humidity', $this->humidity);
        $this->emit('intensity', $this->intensity);
        $this->emit('rainfall', $this->rainfall);
    }

    public function convertToDirection($windDirection)
    {
        if ($windDirection >= 350 && $windDirection <= 10) {
            $windDirection = 'Utara';
            return $windDirection;
        } else if ($windDirection >= 20 && $windDirection <= 70) {
            $windDirection = 'Timur Laut';
            return $windDirection;
        } elseif ($windDirection >= 80 && $windDirection <= 100) {
            $windDirection = 'Timur';
            return $windDirection;
        } else if ($windDirection >= 110 && $windDirection <= 160) {
            $windDirection = 'Tenggara';
            return $windDirection;
        } else if ($windDirection >= 170 && $windDirection <= 190) {
            $windDirection = 'Selatan';
            return $windDirection;
        } elseif ($windDirection >= 200 && $windDirection <= 250) {
            $windDirection = 'Barat Daya';
            return $windDirection;
        } elseif ($windDirection >= 260 && $windDirection <= 280) {
            $windDirection = 'Barat';
            return $windDirection;
        } elseif ($windDirection >= 290 && $windDirection <= 340) {
            $windDirection = 'Barat Laut';
            return $windDirection;
        } else {
            $windDirection = 'Utara';
            return $windDirection;
        }
    }
}
