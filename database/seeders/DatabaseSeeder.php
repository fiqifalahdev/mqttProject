<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BatteryCurrent;
use App\Models\BatteryEnergy;
use App\Models\BatteryVolt;
use App\Models\BatteryWatt;
use App\Models\Broker;
use App\Models\Energy;
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
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Humidity::factory(20)->create();
        Rainfall::factory(20)->create();
        WindPoint::factory(20)->create();
        WindSpeed::factory(20)->create();
        Intensity::factory(20)->create();

        PvPower::factory(20)->create();
        PvEnergy::factory(20)->create();
        PvCurrent::factory(20)->create();
        PvVoltage::factory(20)->create();

        BatteryVolt::factory(20)->create();
        BatteryWatt::factory(20)->create();
        BatteryEnergy::factory(20)->create();
        BatteryCurrent::factory(20)->create();

        WindVolt::factory(20)->create();
        WindWatt::factory(20)->create();
        WindEnergy::factory(20)->create();
        WindCurrent::factory(20)->create();
    }
}
