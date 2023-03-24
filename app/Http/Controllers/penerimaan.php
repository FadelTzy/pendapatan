<?php

namespace App\Http\Controllers;
use App\Models\akun;
use App\Models\bku;
use App\Models\detailAkun;
use App\Models\kasAwal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Models\rab_akun;
use App\Models\rab_detail;
use App\Models\rkakl;
use Illuminate\Support\Carbon;

class penerimaan extends Controller
{
    public function index()
    {
        $data['page'] = 'v 1.0';
        $data['judul'] = 'Dashboard Sepadan UNM';
        return view('p.dashboard', $data);
    }
    public function rpengesahan()
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

        $data['page'] = 'Rincian Data Pengesahan';
        $data['judul'] = 'Laporan';
        $data['data'] = $Arr;
        return view('p.rpengesahan', $data);
    }
    public function bkup(Request $request)
    {
        // return 'tes';
        if ($request->status == 1) {
            $validator = Validator::make($request->all(), [
                'id_revisi' => ['required', 'max:255'],
                'akun' => ['required', 'max:255'],
                'nilai' => ['required', 'max:255'],

            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'id_revisi' => ['required', 'max:255'],
                'uraian' => ['required', 'max:255'],
                'nilai' => ['required', 'max:255'],

            ]);
        }
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $lastdata = bku::where('rkakl', $request->id_revisi)
        // ->where('bulan', $request->bulan)
        ->where('no_bukti', '>=', $request->bukti)
        // ->where('no_bukti', '!=', $request->valref)
        ->orderBy('no_bukti', 'ASC')
        ->get();
        $sisa = count($lastdata);
        $month = date('m-Y', strtotime($request->tanggal));
        if ($month != $request->bulan.'-'.$request->tahun ) {
            $data = ['status' => 'warning','message'=> 'Tanggal penginputan tidak sesuai'];
            return $data;
        }
        if ($request->status == 1) {
            $d = rab_detail::where('id', $request->akun)->first();
            $uraian = $d->nama_cabang;
        } else {
            $uraian = $request->uraian;
        }
       
        $user = bku::create([
            'akun' => $request->akun ? $d->id_rab_akun : null,
            'detail' => $request->akun ?? null,
            'rkakl' => $request->id_revisi,
            'status' => $request->status,
            'uraian' => $uraian,
            'nilai' => $request->nilai,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'no_bukti' => $request->bukti,
        ]);
        if ($sisa != 0) {
         
            $counted = $request->bukti;
            foreach ($lastdata as $key => $value) {
                $counted += 1;
                $value->no_bukti = $counted;
                $value->save();
            }
        }
            $total = bku::where('rkakl', $request->id_revisi)->count();
        if ($user) {
            return ['status' => 'success', 'jumlah' => $total + 1];
        }
    }
    public function bkud($id)
    {
        $user = bku::where('id', $id)->first();

        $lastdata = bku::where('rkakl', $user->rkakl)
        ->where('bulan', $user->bulan)
        ->where('no_bukti', '>', $user->no_bukti)
        ->orderBy('no_bukti', 'ASC')
        ->get();
        $rkakl = $user->rkakl;
        $urut = $user->no_bukti;
        foreach ($lastdata as $key => $value) {
            $value->no_bukti = $urut;
            $value->save();
            $urut++;
        }
        $user->delete();
        $total = bku::where('rkakl', $rkakl)->count();

        return ['status' => 'success','total'=>$total];

    }
    public function bkue(Request $request)
    {
        if ($request->statusu == 1) {
            $validator = Validator::make($request->all(), [
                'id_revisi' => ['required', 'max:255'],
                'akun' => ['required', 'max:255'],
                'nilai' => ['required', 'max:255'],

            ]);
        } else {
            $validator = Validator::make($request->all(), [
                'id_revisi' => ['required', 'max:255'],
                'uraian' => ['required', 'max:255'],
                'nilai' => ['required', 'max:255'],

            ]);
        }
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        // return $request->all();
        $months = date('m-Y', strtotime($request->tanggal));

        if ($months != $request->bulan.'-'.$request->tahun ) {
            $data = ['status' => 'warning','message'=> 'Tanggal penginputan tidak sesuai'];
            return $data;
        }
        $lastdata = bku::where('rkakl', $request->id_revisi)
            ->where('bulan', $request->bulan)
            ->where('no_bukti', '>=', $request->bukti)
            ->where('no_bukti', '!=', $request->valref)
            ->orderBy('no_bukti', 'ASC')
            ->get();

        // return $lastdata;
        $month = date('m', strtotime($request->tanggal));
        $user = bku::where('id', $request->id)->first();

        if ($request->statusu == 1) {
            $d = rab_detail::where('id', $request->akun)->first();
            $uraian = $d->nama_cabang;
            $user->akun = $d->id_rab_akun;
            $user->detail = $request->akun;
        } else {
            $uraian = $request->uraian;
            $user->akun = null;
            $user->detail = null;
        }

        $user->no_bukti = $request->bukti;
        $user->status = $request->statusu;
        $user->uraian = $uraian;
        $user->nilai = $request->nilai;
        $user->tanggal = $request->tanggal;
        $user->bulan = $request->bulan;
        $user->save();
        $counted = $request->bukti;
        foreach ($lastdata as $key => $value) {
            $counted += 1;
            $value->no_bukti = $counted;
            $value->save();
        }

        $total = bku::where('rkakl', $request->id_revisi)->count();
        if ($user) {
            return ['status' => 'success', 'jumlah' => $total + 1];
        }
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
    public function getlastmonth($tahun,$mon)
    {
        $date = $tahun .'-' . $mon. "-11";
        $newdate = date("m", strtotime ( '-1 month' , strtotime ( $date ) )) ;
        return $newdate;
    }
    public function sahkan(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'nomor' => ['required', 'max:255'],
            'tanggal' => ['required', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $kasawal = kasAwal::where('id',$request->id)->first();
        $last = $this->getlastmonth($kasawal->tahun,$kasawal->bulan);
        if ($kasawal->bulan != '01') {
            $kaslalu = kasAwal::where('bulan',$last)->where('rkakl',$kasawal->rkakl)->first();
            // return $kaslalu->status;
            if ($kaslalu->status != 1) {
                return ['status' => 'gagal','data'=>'Gagal mengesahkan, penerimaan bulan kemarin belum disahkan','kode'=>'3'];
            }
        }
        // return '0';
        $kasawal->status = 1;
        $kasawal->nomor = $request->nomor;
        $kasawal->tanggal_p = $request->tanggal;

        $kasawal->updated_at = Date('Y-m-d H:i:s');

        $kasawal->save();
        return ['status' => 'success'];

    }
    public function rekapp(Request $request)
    {
        kasAwal::updateOrCreate(
            [
                'rkakl' => $request->id_revisi,
                'bulan' => $request->bulan,

            ],
            [
                'rkakl' => $request->id_revisi,
                'nilai' => $request->nilai,
                'bulan' => $request->bulan,
                'tahun' => $request->tahun
            ]
            );
            return ['status'=>'success'];
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
        // return $rkakl;
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
        $data['rkakl'] = $rkakl;
        $data['data'] = $dataa;
        $data['date'] = $date;
        $data['datee'] = $datee;
        $data['kasawal'] = $kasawal;
        $data['rekapawal'] = $rekapawal;

        
        $data['tot'] = $tot + 1;

        return view('p.bku', $data);
    }
    public function ap()
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$bulan.'-01' )) ;

        }else{
            $bulan = date('m');
            $datee = date('M');


        }
        $rkakl = rkakl::where('aktivasi', 1)->first();

        if (request()->input('tanggalaw')) {
            $firstdate = request()->input('tanggalaw');
            $first = Carbon::parse(request()->input('tanggalaw'))->isoFormat('MMMM');

        }else{
            $firstdate =  $rkakl->tahun_anggaran.'-01-01';
            $first = Carbon::parse($firstdate)->isoFormat('MMMM');

        }
        if (request()->input('tanggalak')) {
            $lastdate = request()->input('tanggalak');
            $last = Carbon::parse(request()->input('tanggalak'))->isoFormat('MMMM');

        }else{
            $lastdate = $rkakl->tahun_anggaran.'-12-31';
            $last = Carbon::parse($lastdate)->isoFormat('MMMM');

        }

                

        // return $rkakl;
        $akun = akun::with('mDetail')->get();
        $datax = rab_akun::with(['mBku'=>function ($q) use($firstdate,$lastdate)
        {
                # code...
                $q->whereBetween('tanggal',[$firstdate,$lastdate]);
            
        }])
        ->where('id_rkakl', $rkakl->id)
        ->get();
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
    
        $data['page'] = 'Akun Pendapatan';
        $data['judul'] = 'Laporan';
        $data['akun'] = $akun;
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;
        $data['first'] = $first;
        $data['last'] = $last;

        $data['datax'] = $datax;
        // return $datax;
        return view('p.ap', $data);
    }
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
        $akun = akun::with('mDetail')->get();
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
    
        $data['page'] = 'Data Buku Pembantu';
        $data['judul'] = 'Penerimaan';
        $data['akun'] = $akun;
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;

        $data['datax'] = $datax;
        // return $datax;
        return view('p.bp', $data);
    }
    public function syncref($id)
    {
        $akun = akun::with('mDetail')->get();
        foreach ($akun as $key => $value) {
            $a = rab_akun::updateOrCreate(
                [
                    'id_rkakl' => $id,
                    'id_akun' => $value->id,
                ],
                [
                    'unit' => 'Kantor Pusat',
                    'nama_akun' => $value->nama,
                    'kode_akun' => $value->kode,
                    'biaya' => 0,
                    'sisa' => 0,
                    'realisasi' => 0,
                    'status_cabang' => 0,
                ],
            );
            if ($value->mDetail) {
                foreach ($value->mDetail as $v) {
                    rab_detail::updateOrCreate(
                        [
                            'id_rkakl' => $id,
                            'id_cabang' => $v->id ?? null,
                        ],
                        [
                            'id_rab_akun' => $a->id,
                            'nama_cabang' => $v->detail,
                        ],
                    );
                }
            }
        }
        return 1;
    }
    public function dreferensi($id)
    {
        $data = detailAkun::where('idakun', $id)->get();
        return $data;
    }
    public function referensi()
    {
        $rkakl = rkakl::where('aktivasi', 1)->first();
        // return $rkakl;
        $akun = akun::with('mDetail')->get();
   
        if (request()->ajax()) {
            return Datatables::of(
                rab_akun::with('mDetail.mD', 'mD')
                    ->where('id_rkakl', $rkakl->id)
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);
                    $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button  class='btn btn-sm btn-secondary d-none lihatakun'> <i class='fa fa-arrow-down'> </i> </button>
                </li>";
                    if ($data->status_cabang == 0) {
                        $btn .=
                            "<li class='list-inline-item'>
                    <button type='button'  onclick='addRo(" .
                            $dataj .
                            ")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>
                    </li>";
                    }

                    $btn .=
                        "
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'></i>  </button>
                    </li>";

                    if ($data->status_cabang == 1) {
                        $btn .=
                            "   <li class='list-inline-item'>
                <button type='button'  onclick='addCabang(" .
                            $dataj .
                            ")'   class='btn btn-warning btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>
                </li>";
                    }
                    $btn .= '</ul>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
        $data['page'] = 'Data Referensi';
        $data['judul'] = 'Penerimaan';
        $data['akun'] = $akun;
        $data['rkakl'] = $rkakl;

        return view('p.referensi', $data);
    }
    public function lpj()
    {
        if (request()->input('bulan')) {
            $bulan = request()->input('bulan');
            $datee = date("M", strtotime ( '2020-'.$bulan.'-01' )) ;

        }else{
            $bulan = date('m');
            $datee = date('M');


        }
        $rkakl = rkakl::where('aktivasi', 1)->first();
        $rkakl = rkakl::where('aktivasi', 1)->first();
        $lastmonth = $this->getlastmonth($rkakl->tahun_anggaran,$bulan);
        
        $rekapan = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$bulan)->first();
        $saldoakhir = kasAwal::where('rkakl',$rkakl->id)->where('bulan',$lastmonth)->first();
        // return $rekapan;
        // $akun = akun::with('mDetail')->get();
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
        $data['page'] = 'Laporan Pertanggungjawaban';
        $data['judul'] = 'Penerimaan';
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;
        $data['saldoakhir'] = $saldoakhir;
        $data['rekapan'] = $rekapan;
        $data['pengeluaran'] = $pengeluaran;
        $data['pemasukan'] = $pemasukan;

        $data['datax'] = $datax;
        // return $datax;
        return view('p.lpj', $data);
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
        $akun = akun::with('mDetail')->get();
        $datax = rab_akun::with(['mBku'=>function ($q) use($bulan)
        {
            $q->where('bulan','<=',$bulan);
        },'mBkuu'=>function ($q) use($bulan)
        {
            $q->where('bulan',$bulan);
        },'mDetail', 'mD'])
        ->where('id_rkakl', $rkakl->id)
        ->get();
        
        // return $datax;
   
        $data['page'] = 'Data Pengesahan Bulanan';
        $data['judul'] = 'Laporan';
        $data['akun'] = $akun;
        $data['rkakl'] = $rkakl;
        $data['bulan'] = $bulan;
        $data['datee'] = $datee;
        $data['rekapawal'] = $rekapawal;

        $data['kasawal'] = $kasawal;
        // return $datax;
        $data['datax'] = $datax;
        // return $datax;

        return view('p.pengesahan', $data);
    }
    
}
