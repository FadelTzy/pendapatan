<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Models\pembayaran as P;
class pembayaran implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {
            P::create([
                'nim' => $row[0],
                'jenjang' => $row[1],
                'fakultas' => $row[2],
                'jenis' => $row[3],
                'biaya' => $row[4],
                'kota' => $row[5],
                'angkatan' => $row[6],
                'tahun' => $row[7],
                'bulan' => $row[8],
                'tahun_akademik' => $row[9],
                'sms' => $row[10],
            ]);
        }
    }
}
