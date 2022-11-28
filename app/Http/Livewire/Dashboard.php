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

        $rainfall = Rainfall::latest()->limit(10)->get();
        foreach ($rainfall as $rain) {
            $data['label'][] = $rain->created_at->format('H:i:s');
            $data['data'][] = $rain->message;
        }
        $this->rainfall = json_encode($data);
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

        $rainfall = Rainfall::latest()->limit(10)->get();
        foreach ($rainfall as $rain) {
            $data['label'][] = $rain->created_at->format('H:i:s');
            $data['data'][] = $rain->message;
        }
        $this->rainfall = json_encode($data);
        $this->emit('changed', $this->rainfall);
    }
}
