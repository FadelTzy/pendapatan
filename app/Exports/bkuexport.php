<?php

namespace App\Exports;

use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\bku;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class bkuexport implements FromView,ShouldAutoSize
{
    protected $datenya;
    protected $rkakl;
    protected $rekapawal;
    protected $data;
    protected $set;
    protected $last;

    public function __construct($datenya,$rkakl,$rekapawal,$data,$set,$last)
    {
        $this->datenya = $datenya;
        $this->rekapawal = $rekapawal;
        $this->rkakl = $rkakl;
        $this->data = $data;
        $this->set = $set;
        $this->last = $last;

    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.bku', [
            'invoices' => bku::all(),
            'date' => $this->datenya,
            'rkakl' => $this->rkakl,
            'rekapawal' => $this->rekapawal,
            'data' => $this->data,
            'set' => $this->set,
            'last' => $this->last,

        ]);
    }
}
