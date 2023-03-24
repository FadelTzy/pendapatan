<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class lpjexport implements FromView,ShouldAutoSize
{
    protected $data;
    protected $pemasukan;
    protected $pengeluaran;
    protected $lastdate;
    protected $rkakl;
    protected $saldoakhir;
    protected $set;

    public function __construct($pemasukan,$pengeluaran,$data,$lastdate,$rkakl,$saldoakhir,$set)
    {
    
        $this->pemasukan = $pemasukan;
        $this->pengeluaran = $pengeluaran;
        $this->data = $data;
        $this->lastdate = $lastdate;
        $this->rkakl = $rkakl;
        $this->saldoakhir = $saldoakhir;
        $this->set = $set;

    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.lpj', [
            'pemasukan' => $this->pemasukan,
            'pengeluaran' => $this->pengeluaran,
            'data' => $this->data,
            'bulan' => $this->lastdate,
            'rkakl' => $this->rkakl,
            'saldoakhir' => $this->saldoakhir,
            'set' => $this->set,

        ]);
    }
}
