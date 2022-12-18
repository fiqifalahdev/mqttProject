<?php

namespace App\Http\Controllers;

class GetDataController
{
    // Method untuk mendapatkan data dari database berdasarkan tahun
    // Ambil data maximal terbaru di bulan xx untuk tahun xxxx
    // Ambil Data maksimal berdasarkan bulan dan tahun
    // $test = Humidity::selectRaw("avg(message) as `data`,  year(created_at) year, month(created_at) month")
    //     ->groupby('year', 'month')
    //     ->get();
    // dd($test);
    public function getDataYear($object)
    {
        $datas = $object::selectRaw("avg(message) as `data`,  year(created_at) year, month(created_at) month")
            ->groupby('year', 'month')
            ->get();
        if ($datas->isEmpty()) {
            $data[] = floatval('0');
            return $data;
        }
        foreach ($datas as $d) {
            $data[] = floatval($d->data);
        }

        return $data;
    }

    // Method untuk mendapatkan data pertama dari satu table
    public function getFirstData($object)
    {
        $datas = $object::latest()->first();
        if ($datas == null) {
            $datas = '0';
            return $datas;
        }
        return $datas->message;
    }
}
