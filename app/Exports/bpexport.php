<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class bpexport implements FromView,ShouldAutoSize
{
    protected $data;
    protected $rka;
    protected $bulan;

    public function __construct($data,$rka,$bulan)
    {
    
        $this->data = $data;
        $this->rka = $rka;
        $this->bulan = $bulan;

    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.bpad', [
            'data' => $this->data,
            'rka' => $this->rka,
            'bulan' => $this->bulan,

        ]);
    }
}
