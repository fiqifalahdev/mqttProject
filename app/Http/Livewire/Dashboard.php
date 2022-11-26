<?php

namespace App\Http\Livewire;

use App\Jobs\MqttJobs;
use App\Models\Energy;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class Dashboard extends Component
{
    public $energy;
    public $humidity;
    public $intensity;
    public $windPoint;
    public $windSpeed;

    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $this->energy = Energy::latest()->first();
        $this->humidity = Humidity::latest()->first();
        $this->intensity = Intensity::latest()->first();
        $this->windSpeed = WindSpeed::latest()->first();
        $this->windPoint = WindPoint::latest()->first();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }


    public function change()
    {
        dispatch(new MqttJobs());

        $this->energy = Energy::latest()->first();
        $this->humidity = Humidity::latest()->first();
        $this->intensity = Intensity::latest()->first();
        $this->windSpeed = WindSpeed::latest()->first();
        $this->windPoint = WindPoint::latest()->first();
        // $this->emit('changed', [$this->energy, $this->humidity, $this->intensity, $this->windPoint, $this->windSpeed]);
    }
}
