<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
class rpexport implements FromView,ShouldAutoSize
{
    protected $data;
    protected $rkakl;


    public function __construct($data,$rkakl)
    {
    
        $this->data = $data;
        $this->rkakl = $rkakl;


    }
    public function view(): View
    {
        // return $this->datenya;
        return view('cetak.rp', [
            'data' => $this->data,
            'rkakl' => $this->rkakl,
         

        ]);
    }
}
