<?php

namespace App\Http\Livewire;

use App\Models\Broker;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\Facades\MQTT;

class TestingMqtt extends Component
{
    public $brokerData;
    protected $listeners = ['updateData' => 'changeData'];

    public function mount()
    {
        $brokers = Broker::all();
        foreach ($brokers as $broker) {
            $data['label'][] = $broker->created_at->format('H:i:s');
            $data['data'][] = $broker->message;
        }
        $this->brokerData = json_encode($data);
    }
    // render components
    public function render()
    {
        return view('livewire.testing-mqtt');
    }

    // changeData asynchronous
    public function changeData()
    {
        $brokers = Broker::all();
        foreach ($brokers as $broker) {
            $data['label'][] = $broker->created_at->format('H:i:s');
            $data['data'][] = $broker->message;
        }
        $this->brokerData = json_encode($data);
        $this->emit('changed', ['data' => $this->brokerData]); 
    }

    // subscribe
    public function subscribe()
    {
        try {
            // Koneksi ke broker
            $mqtt = MQTT::connection();
            // definisi topic dan callback
            $mqtt->subscribe('/sub/test', function ($topic, $message) use ($mqtt) {
                // insert data ke database
                $broker = Broker::create([
                    'topic' => $topic,
                    'message' => $message,
                    'type' => 'wind'
                ]);
                Log::info($broker);

                // interupt looping 
                $mqtt->interrupt();
            });

            //Looping event yang menangani pesan melalui server.
            $mqtt->loop(false, true, 1000);
            $mqtt->disconnect();
        } catch (MqttClientException $e) {
            Log::error($e->getMessage());
        }
    }
    // $this->emit('connect', $broker);
}
