<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class pengesahanexport implements FromView,ShouldAutoSize
{
    protected $data;
    protected $bulan;
    protected $nbulan;
    protected $lastdate;
    protected $tahun;

    public function __construct($data,$bulan,$nbulan,$lastdate,$tahun)
    {
    
        $this->data = $data;
        $this->bulan = $bulan;
        $this->nbulan = $nbulan;
        $this->lastdate = $lastdate;
        $this->tahun = $tahun;

    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.p', [
            'data' => $this->data,
            'bulan' => $this->bulan,
            'nbulan' => $this->nbulan,
            'lastdate' => $this->lastdate,
            'tahun' => $this->tahun,

        ]);
    }
}
