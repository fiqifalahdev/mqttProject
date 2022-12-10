<?php

namespace App\Http\Livewire;

use App\Jobs\MqttJobs;
use App\Models\Energy;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\Rainfall;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use Illuminate\Support\Facades\Log;
use Livewire\Component;


class Dashboard extends Component
{
    public $humidity;
    public $intensity;
    public $windPoint;
    public $windSpeed;
    public $rainfall;

    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        dispatch(new MqttJobs());

        $this->humidity = Humidity::latest()->first();
        $this->intensity = Intensity::latest()->first();
        $this->windSpeed = WindSpeed::latest()->first();
        $this->windPoint = WindPoint::latest()->first();
        $this->rainfall = Rainfall::latest()->first();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }


    public function change()
    {
        dispatch(new MqttJobs());

        $this->humidity = Humidity::latest()->first();
        $this->intensity = Intensity::latest()->first();
        $this->windSpeed = WindSpeed::latest()->first();
        $this->windPoint = WindPoint::latest()->first();
        $this->rainfall = Rainfall::latest()->first();

        // Emit event 
        $this->emit('windSpeed', $this->windSpeed);
        $this->emit('humidity', $this->humidity);
        $this->emit('intensity', $this->intensity);
        $this->emit('rainfall', $this->rainfall);
    }
}
