<?php

namespace App\Http\Livewire;

use App\Models\Energy;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use Livewire\Component;

class Dashboard extends Component
{
    public $object;
    public $collection;
    protected $listeners = ['change' => 'change'];

    public function mount()
    {
        $energy = Energy::latest()->first();
        $humidity = Humidity::latest()->first();
        $intensity = Intensity::latest()->first();
        $windSpeed = WindSpeed::latest()->first();
        $windPoint = WindPoint::latest()->first();

        $this->collection = collect([
            [
                'title' => 'Energy',
                'topic' => '/sub/energy',
                'message' => $energy->message
            ],
            [
                'title' => 'Humidity',
                'topic' => '/sub/humidity',
                'message' => $humidity->message
            ],
            [
                'title' => 'Wind Point',
                'topic' => '/sub/windPoint',
                'message' => $windPoint->message
            ],
            [
                'title' => 'Wind Speed',
                'topic' => '/sub/windSpeed',
                'message' => $windSpeed->message
            ],
            [
                'title' => 'Intensity',
                'topic' => '/sub/intensity',
                'message' => $intensity->message
            ],
        ]);

        $this->object = json_encode($this->collection);
    }

    public function render()
    {
        return view('livewire.dashboard');
    }

    public function insert($topic, $message)
    {
        if ($topic == '/sub/energy') {
            Energy::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'energy'
            ]);
        } else if ($topic == '/sub/humidity') {
            Humidity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'humidity'
            ]);
        } else if ($topic == '/sub/intensity') {
            Intensity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'intensity'
            ]);
        } else if ($topic == '/sub/windPoint') {
            WindPoint::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windPoint'
            ]);
        } else if ($topic == '/sub/windSpeed') {
            WindSpeed::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windSpeed'
            ]);
        }

        dd($topic, $message);
    }

    public function change()
    {
        $energy = Energy::latest()->first();
        $humidity = Humidity::latest()->first();
        $intensity = Intensity::latest()->first();
        $windSpeed = WindSpeed::latest()->first();
        $windPoint = WindPoint::latest()->first();

        $this->collection = collect([
            [
                'title' => 'Energy',
                'topic' => '/sub/energy',
                'message' => $energy->message
            ],
            [
                'title' => 'Humidity',
                'topic' => '/sub/humidity',
                'message' => $humidity->message
            ],
            [
                'title' => 'Wind Point',
                'topic' => '/sub/windPoint',
                'message' => $windPoint->message
            ],
            [
                'title' => 'Wind Speed',
                'topic' => '/sub/windSpeed',
                'message' => $windSpeed->message
            ],
            [
                'title' => 'Intensity',
                'topic' => '/sub/intensity',
                'message' => $intensity->message
            ],
        ]);

        $this->object = json_encode($this->collection);
    }
}
