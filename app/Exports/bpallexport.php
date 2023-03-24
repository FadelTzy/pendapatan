<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class bpallexport implements FromView,ShouldAutoSize
{
    protected $data;
    protected $rka;
    protected $bulan;
    protected $ld;

    public function __construct($data,$rka,$bulan,$ld)
    {
    
        $this->data = $data;
        $this->rka = $rka;
        $this->bulan = $bulan;
        $this->ld = $ld;

    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.bpa', [
            'data' => $this->data,
            'rka' => $this->rka,
            'bulan' => $this->bulan,
            'ld' => $this->ld,

        ]);
    }
}
