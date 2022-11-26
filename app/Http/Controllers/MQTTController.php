<?php

namespace App\Http\Controllers;

use App\Models\Energy;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\Rainfall;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\MqttClient;

class MQTTController
{
    // topic list for subscribing
    protected $topicList = [
        'PfSains/energy',
        'PfSains/intCahaya',
        'PfSains/windSpeed',
        'PfSains/windDir',
        'PfSains/humidity',
        'PfSains/curHujan'
    ];

    public function subscribe()
    {
        try {
            // create connection between client and broker
            $client = MQTT::connection();

            // subscribe from broker
            for ($i = 0; $i < count($this->topicList); $i++) {
                $client->subscribe($this->topicList[$i], function (string $topic, string $message) {
                    echo $topic;
                    echo $message;
                    // if any topic and message coming insert to database
                    $this->insertDB($topic, $message);
                }, 0);
            }

            // regiester loop event handler 
            $client->registerLoopEventHandler(function (MqttClient $client, float $elapsedTime) {
                // After 5 seconds, we quit the loop.
                if ($elapsedTime >= 5) {
                    $client->interrupt();
                }
            });

            $client->loop(true);
            $client->disconnect();
        } catch (MqttClientException $err) {
            echo $err->getMessage();
        }
    }

    public function insertDB($topic, $message)
    {
        if ($topic == $this->topicList[0]) {
            Energy::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'energy'
            ]);
        } else if ($topic == $this->topicList[1]) {
            Intensity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'lightIntensity'
            ]);
        } else if ($topic == $this->topicList[2]) {
            WindSpeed::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windSpeed'
            ]);
        } else if ($topic == $this->topicList[3]) {
            WindPoint::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windDirection'
            ]);
        } else if ($topic == $this->topicList[4]) {
            Humidity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'humidity'
            ]);
        } else if ($topic == $this->topicList[5]) {
            Rainfall::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'curHujan'
            ]);
        }
    }
}
