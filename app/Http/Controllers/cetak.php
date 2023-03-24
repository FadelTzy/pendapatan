<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rkakl;
use App\Models\kasAwal;
use App\Models\rab_detail;
use App\Models\bku;
use App\Exports\bkuexport;
use App\Models\akun;
use App\Models\rab_akun;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\refexport;
use App\Exports\bpallexport;
use App\Exports\pengesahanexport;
use App\Exports\bpexport;
use App\Exports\lpjexport;
use App\Exports\rpexport;
use App\Models\Setting;
use Barryvdh\DomPDF\Facade\Pdf;
class cetak extends Controller
{
    public function bp()
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$bulan.'-01' )) ;

        }else{
            $bulan = date('m');
            $datee = date('M');


        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        // return $rkakl;
        $datax = rab_akun::with(['mBku'=>function ($q) use($bulan)
        {
            $q->where('bulan',$bulan);
        }])
        ->where('id_rkakl', $rkakl->id)
        ->get();
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
    
        $a_date =  $rkakl->tahun_anggaran."-" . $bulan ."-01";
        $lastdate = date("t", strtotime($a_date));
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;
        $month = $this->getNameOfMonth($bulan);
        $data['bulan'] = $month;
        $data['datax'] = $datax;
        $data['ld'] = $lastdate;
        $data['rka'] = $rkakl;

        // return $datax;
        $pdf = Pdf::loadView('pdf.bp', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('bukupembantu.pdf');
        return Excel::download(new bpallexport($datax,$rkakl,$month,$lastdate), 'bukupembanturinci.xlsx');
        // return Excel::download(new refexport($data), 'referensi.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function bpd($id)
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$bulan.'-01' )) ;

        }else{
            $bulan = date('m');
            $datee = date('M');


        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        // return $rkakl;
        $datax = rab_akun::with(['mBku'=>function ($q) use($bulan)
        {
            $q->where('bulan',$bulan);
        }])
        ->where('id',$id)
        ->first();
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
    
     
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;
        $month = $this->getNameOfMonth($bulan);
        $data['rka'] = $rkakl;
        $data['bulan'] = $month;

        $data['datax'] = $datax;
        // return $datax;
        $pdf = Pdf::loadView('pdf.bpd', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('bukupembantuakun.pdf');
        return Excel::download(new bpexport($datax,$rkakl,$month), 'bukupembantu.xlsx');
        // return Excel::download(new bpexport($data), 'referensi.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function lpj()
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');

        }else{
            $bulan = date('m');
        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        $lastmonth = $this->getlastmonth($rkakl->tahun_anggaran,$bulan);
        
        $rekapan = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$bulan)->first();
        $saldoakhir = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$lastmonth)->first();
        // return $rekapan;
        // $akun = akun::with('mDetail')->get();
        $setting = setting::first();
        $datax = rab_akun::with(['mBku'=>function ($q) use($bulan)
        {
            $q->where('bulan',$bulan);
        }])
        ->where('id_rkakl', $rkakl->id)
        ->get();
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
        $pemasukan = bku::where('rkakl', $rkakl->id)
        ->where('bulan', $bulan)
        ->where('status', 1)
        ->sum('nilai');
        $pengeluaran = bku::where('rkakl', $rkakl->id)
        ->where('bulan', $bulan)
        ->where('status', 2)
        ->sum('nilai');
        // return $pengeluaran;
        $nabul = $this->getNameOfMonth($bulan);
        $data['rkakl'] = $rkakl;
        $data['saldoakhir'] = $saldoakhir;
        $data['rekapan'] = $rekapan;
        $data['pengeluaran'] = $pengeluaran;
        $data['pemasukan'] = $pemasukan;
        $data['datax'] = $datax;
        $data['bulan'] = $nabul;
        $data['set'] = $setting;

        // return $datax;
        $pdf = Pdf::loadView('pdf.lpj', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('lpj' . $nabul .'-'. $rkakl->tahun_anggaran . '.pdf');
        return Excel::download(new lpjexport($pemasukan,$pengeluaran,$datax,$nabul,$rkakl,$saldoakhir,$setting), 'lpj' . $nabul .'-'. $rkakl->tahun_anggaran . '.xlsx');

        // return Excel::download(new lpjexport($pemasukan,$pengeluaran,$datax,$nabul,$rkakl,$saldoakhir), 'lpj' . $nabul .'-'. $rkakl->tahun_anggaran . '.html', \Maatwebsite\Excel\Excel::HTML);
        // return Excel::download(new lpjexport($data), 'lpj.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function rp()
    {
        $rkakl = rkakl::with('mRab')->where('aktivasi', 1)->first();
        $Arr = [];
        $kasawal = kasAwal::where('rkakl',$rkakl->id)->where('status',1)->get();
        foreach ($kasawal as $key => $value) {
            
           $Arr[] = kasAwal::with(['mAkun.mBku'=>function ($q)use($value){
            $q->where('bulan',$value->bulan);
           }])->where('rkakl',$rkakl->id)->where('status',1)->where('bulan',$value->bulan)->first();
            // $Arr[] =   $datax = rab_akun::with(['mBku'=>function ($q) use($value)
            // {
            //     $q->where('bulan','=',$value->bulan);
            // },'mDetail', 'mD'])
            // ->where('id_rkakl', $rkakl->id)
            // ->get();
        }
        // return $Arr;
     
        $data['rkakl'] = $rkakl;
        $data['data'] = $Arr;
        $pdf = Pdf::loadView('pdf.rincianpengesahan', $data);
        return $pdf->setPaper('a4', 'landscape')->stream('rincianpengesahan'.$rkakl->tahun_anggaran.'.pdf');
        return Excel::download(new rpexport($Arr,$rkakl), 'rincianpengesahan'.$rkakl->tahun_anggaran.'.xlsx');
        // return Excel::download(new rpexport($Arr,$rkakl), 'rincianpengesahan.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function pengesahan()
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$bulan.'-01' )) ;

        }else{
            $bulan = date('m');
            $datee = date('M');

        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        $lastmonth = $this->getlastmonth($rkakl->tahun_anggaran,$bulan);
        
        $kasawal = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$bulan)->first();
        // return $kasawal;
        $rekapawal = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$lastmonth)->first();
        // return $rkakl;
        $datax = rab_akun::with(['mBku'=>function ($q) use($bulan)
        {
            $q->where('bulan','<=',$bulan);
        },'mBkuu'=>function ($q) use($bulan)
        {
            $q->where('bulan',$bulan);
        },'mDetail', 'mD'])
        ->where('id_rkakl', $rkakl->id)
        ->get();
        

        $data['rkakl'] = $rkakl;
        $data['datee'] = $datee;
        $data['rekapawal'] = $rekapawal;
        $a_date =  $rkakl->tahun_anggaran."-" . $bulan ."-01";
        $lastdate = date("t", strtotime($a_date));
        $namabul = $this->getNameOfMonth($bulan);
        // return $datax;
        $data['datax'] = $datax;
        $data['bulan'] = $bulan;
        $data['nbulan'] = $namabul;
        $data['lastdate'] = $lastdate;
        $data['tahun'] = $rkakl->tahun_anggaran;

        // return $datax;
        $pdf = Pdf::loadView('pdf.pengesahan', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('pengesahan'.$rkakl->tahun_anggaran. 'bulan' . $bulan .'.pdf');
        return Excel::download(new pengesahanexport($datax,$bulan,$namabul,$lastdate,$rkakl->tahun_anggaran), 'pengesahan'.$rkakl->tahun_anggaran . $namabul .'.xlsx');
        // return Excel::download(new pengesahanexport($datax,$bulan,$namabul,$lastdate,$rkakl->tahun_anggaran), 'pengesahan.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function referensi()
    {
        $rkakl = rkakl::where('aktivasi', 1)->first();
        // return $rkakl;
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
        $datax =  rab_akun::with('mDetail.mD', 'mD')
        ->where('id_rkakl', $rkakl->id)
        ->get();
        // $data = 'ss';
        $data['datax'] = $datax;
        $pdf = Pdf::loadView('pdf.ref', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('referensi.pdf');
        return Excel::download(new refexport($data), 'referensi.xlsx');
        // return Excel::download(new refexport($data), 'referensi.html', \Maatwebsite\Excel\Excel::HTML);
    }
    public function bku()
    {
        if (request()->input('bulan')) {
            $date = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$date.'-01' )) ;

        }else{
            $date = date('m');
            $datee = date('M');


        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        $lastmonth = $this->getlastmonth($rkakl->tahun_anggaran,$date);
        
        $kasawal = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$date)->first();
        $rekapawal = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$lastmonth)->first();

        // return $kasawal;
        $akun = rab_detail::where('id_rkakl', $rkakl->id)
            ->with('oAkun')
            ->get();
        $dataa = $this->getDatabku($date);
        // return $data;
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
        $tot = bku::where('rkakl', $rkakl->id)->count();
        $data['page'] = 'Data Buku Kas Umum';
        $data['judul'] = 'Penerimaan';
        $data['akun'] = $akun;
        $data['date'] = $date;
        $data['datee'] = $datee;
        $data['kasawal'] = $kasawal;
        $data['rekapawal'] = $rekapawal;
    
        $a_date =  $rkakl->tahun_anggaran."-" . $date ."-01";

        $data['tot'] = $tot + 1;
        $data['date'] = $this->getNameOfMonth($date);
        $data['rkakl'] = $rkakl;
        $data['rekapawal'] = $rekapawal;
        $data['data'] = $dataa;
        $data['set'] = Setting::first();
        $data['last'] = date("t", strtotime($a_date));

        // return $date;
        // return Excel::download(new bkuexport($month,$rkakl,$rekapawal,$dataa,$set,$lastdate), 'bku.xlsx');
        // return Excel::download(new bkuexport($month,$rkakl,$rekapawal,$dataa,$set,$lastdate), 'invoices.html', \Maatwebsite\Excel\Excel::HTML);
        $pdf = Pdf::loadView('pdf.bku', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('bukukasumum.pdf');

    }
    public function getNameOfMonth($data)
    {
        if ($data == '01') {
            return 'Januari';
        }
        if ($data == '02') {
            return 'Februari';
        }
        if ($data == '03') {
            return 'Maret';
        }
        if ($data == '04') {
            return 'April';
        }
        if ($data == '05') {
            return 'Mei';
        }
        if ($data == '06') {
            return 'Juni';
        }
        if ($data == '07') {
            return 'Juli';
        }
        if ($data == '08') {
            return 'Agustus';
        }
        if ($data == '09') {
            return 'September';
        }
        if ($data == '10') {
            return 'Oktober';
        }
        if ($data == '11') {
            return 'November';
        }
        if ($data == '12') {
            return 'Desember';
        }
    }
    public function getlastmonth($tahun,$mon)
    {
        $date = $tahun .'-' . $mon. "-11";
        $newdate = date("m", strtotime ( '-1 month' , strtotime ( $date ) )) ;
        return $newdate;
    }
    public function getDatabku($bulan)
    {
        $rkakl = rkakl::where('aktivasi', 1)->first();
        // return $rkakl;
        $akun = rab_detail::where('id_rkakl', $rkakl->id)
            ->with('oAkun')
            ->get();
        $data = bku::where('rkakl', $rkakl->id)
            ->where('bulan', $bulan)
            ->orderBy('no_bukti', 'ASC')
            ->get();
        return $data;
    }
}
