<?php

namespace App\Http\Controllers;

use App\Models\BatteryCurrent;
use App\Models\BatteryEnergy;
use App\Models\BatteryVolt;
use App\Models\BatteryWatt;
use App\Models\Humidity;
use App\Models\Intensity;
use App\Models\PvCurrent;
use App\Models\PvEnergy;
use App\Models\PvPower;
use App\Models\PvVoltage;
use App\Models\Rainfall;
use App\Models\WindCurrent;
use App\Models\WindEnergy;
use App\Models\WindPoint;
use App\Models\WindSpeed;
use App\Models\WindVolt;
use App\Models\WindWatt;

use PhpMqtt\Client\Exceptions\MqttClientException;
use PhpMqtt\Client\Facades\MQTT;
use PhpMqtt\Client\MqttClient;

class MQTTController
{
    // topic list for subscribing
    protected $topicList = [
        'PfSains/intCahaya',
        'PfSains/windSpeed',
        'PfSains/windDir',
        'PfSains/humidity',
        'PfSains/curHujan',
        'PfSains/pvVolt',
        'PfSains/pvWatt',
        'PfSains/pvCurr',
        'PfSains/pvEnergy',
        'PfSains/battVolt',
        'PfSains/battWatt',
        'PfSains/battCurr',
        'PfSains/battEnergy',
        'PfSains/windVolt',
        'PfSains/windWatt',
        'PfSains/windCurr',
        'PfSains/windEnergy'
    ];

    public function subscribe()
    {
        try {
            // create connection between client and broker
            $client = MQTT::connection();
            if ($client->isConnected()) {
                echo ' Mqtt Broker Connected';
            }

            // subscribe from broker
            for ($i = 0; $i < count($this->topicList); $i++) {
                $client->subscribe($this->topicList[$i], function (string $topic, string $message) {
                    echo $topic;
                    echo " ";
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
            Intensity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'lightIntensity'
            ]);
        } else if ($topic == $this->topicList[1]) {
            WindSpeed::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windSpeed'
            ]);
        } else if ($topic == $this->topicList[2]) {
            WindPoint::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windDirection'
            ]);
        } else if ($topic == $this->topicList[3]) {
            Humidity::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'humidity'
            ]);
        } else if ($topic == $this->topicList[4]) {
            Rainfall::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'curHujan'
            ]);
        } else if ($topic == $this->topicList[5]) {
            PvVoltage::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'pvVolt'
            ]);
        } else if ($topic == $this->topicList[6]) {
            PvPower::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'pvPower'
            ]);
        } else if ($topic == $this->topicList[7]) {
            PvCurrent::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'pvCurrent'
            ]);
        } else if ($topic == $this->topicList[8]) {
            PvEnergy::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'pvEnergy'
            ]);
        } else if ($topic == $this->topicList[9]) {
            BatteryVolt::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'battVolt'
            ]);
        } else if ($topic == $this->topicList[10]) {
            BatteryWatt::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'battWatt'
            ]);
        } else if ($topic == $this->topicList[11]) {
            BatteryCurrent::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'battCurrent'
            ]);
        } else if ($topic == $this->topicList[12]) {
            BatteryEnergy::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'battEnergy'
            ]);
        } else if ($topic == $this->topicList[13]) {
            WindVolt::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windVolt'
            ]);
        } else if ($topic == $this->topicList[14]) {
            WindWatt::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windWatt'
            ]);
        } else if ($topic == $this->topicList[15]) {
            WindCurrent::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windCurrent'
            ]);
        } else if ($topic == $this->topicList[16]) {
            WindEnergy::create([
                'topic' => $topic,
                'message' => $message,
                'type' => 'windEnergy'
            ]);
        }
    }
}
