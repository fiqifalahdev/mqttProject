<?php

namespace App\Http\Controllers;

class GetDataController
{

    protected $object;

    public function __construct($obj)
    {
        $this->object = $obj;
    }

    // Method untuk mendapatkan data dari database berdasarkan tahun
    // Ambil data maximal terbaru di bulan xx untuk tahun xxxx
    // Ambil Data maksimal berdasarkan bulan dan tahun
    // $test = Humidity::selectRaw("avg(message) as `data`,  year(created_at) year, month(created_at) month")
    //     ->groupby('year', 'month')
    //     ->get();
    // dd($test);
    public function getDataYear()
    {
        $dumms = $this->object::selectRaw("avg(message) as `data`,  year(created_at) year, month(created_at) month")
            ->groupby('year', 'month')
            ->get();
        foreach ($dumms as $dumm) {
            $data[] = floatval($dumm->data);
        }

        return $data;
    }
}
