<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Akaunting\Money\Money;
use App\Models\DasarPembayaran;
use Illuminate\Http\Request;
use App\Models\SifatPembayaran;
use App\Models\JenisPembayaran;
use App\Models\Pajak;
use App\Models\pajakSpp;
use App\Models\Pejabat;
use App\Models\rab_akun;
use App\Models\rab_detail;
use App\Models\rkakl;
use App\Models\rab_kekro;
use App\Models\rab_sub;
use App\Models\RiwayatMaster;
use App\Models\RiwayatRevisi;
use App\Models\RiwayatSpp;
use App\Models\rspp;
use App\Models\rsppd;
use App\Models\Setting;
use App\Models\Supplier;
use App\Models\up;
use Yajra\DataTables\Facades\DataTables;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class SpmController extends Controller
{
    public function dashboard()
    {
        $data['page'] = 'Dashboard RKAKL';
        $data['judul'] = 'Dashboard RKAKL';
        return view('spmv2.dashboard', $data);
    }
    public function realrabakun($id)
    {
        if (request()->ajax()) {
            $c = RiwayatSpp::where('id', $id)->first()->isremun;
            if ($c == 1) {
                $rspp = rspp::with('akun.oRabsub.oKom.oRo.oKros', 'rsppd.rabdetail', 'rSpp', 'rsppd.oPajak')
                    ->where('id_riwayat_spp', $id)
                    ->get();
            } else {
                $rspp = rspp::with('akun.oRabsub.oKom.oRo.oKros', 'rsppd.rabdetail', 'rSpp')
                    ->where('id_riwayat_spp', $id)
                    ->get();
            }

            return Datatables::of($rspp)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn = '<buttontype="button" class="downrabakunn btn btn-sm btn-primary">-  </button>';
                    // if () {
                    //     # code...
                    // }

                    return $btn;
                })
                ->addColumn('coanya', function ($data) {
                    $btn = explode(' - ', $data->akun->oRabsub->oKom->oRo->oKros->nama_kro)[0] . '.' . explode(' - ', $data->akun->oRabsub->oKom->oRo->nama_ro)[0] . '.' . explode(' - ', $data->akun->oRabsub->oKom->nama_komponen)[0] . '.' . $data->akun->oRabsub->kode_sub;
                    return $btn;
                })
                ->addColumn('namanya', function ($data) {
                    $btn = $data->akun->kode_akun . ' - ' . $data->akun->nama_akun;
                    return $btn;
                })
                ->addColumn('pagunya', function ($data) {
                    $btn = Money($data->akun->biaya, 'IDR', 'false');
                    return $btn;
                })
                ->addColumn('sisanya', function ($data) {
                    $btn = Money($data->sisadana, 'IDR', 'false');
                    return $btn;
                })
                ->addColumn('realisasinya', function ($data) {
                    $btn = Money($data->spplalu + $data->sppini, 'IDR', 'false');
                    return $btn;
                })
                ->addColumn('anggarannya', function ($data) {
                    $jumlah = 0;
                    foreach ($data->rsppd as $key => $value) {
                        $jumlah += $value->sppini;
                    }
                    $btn = $jumlah;
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }
    public function getrabakun()
    {
    //     $data = rkakl::with('revici')
    //     ->where('tahun_anggaran', Date('Y'))
    //     ->first();
    // $akun = rab_akun::with('oRabsub.oKom.oRo.oKros', 'mDetail', 'mCabang.mDetail')
    //     ->where('id_revisi', $data->revici->id)
    //     ->get();
    
    // return $akun;
        if (request()->ajax()) {
            $data = rkakl::with('revici')
                ->where('tahun_anggaran', Date('Y'))
                ->first();
            $akun = rab_akun::with('oRabsub.oKom.oRo.oKros', 'mDetail', 'mCabang.mDetail')
                ->where('id_revisi', $data->revici->id)
                ->get();
            
            // return $akun;
            // return $data->revici->id;
            return Datatables::of($akun)
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn = '<button  class="downrabakun btn btn-sm btn-primary"><i class="fa fa-angle-down"></i></button>';
                    return $btn;
                })
                ->addColumn('coanya', function ($data) {
                    // return $data->id;

                    $btn = explode(' - ', $data->oRabsub->oKom->oRo->oKros->nama_kro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->oRo->nama_ro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->nama_komponen)[0] . '.' . $data->oRabsub->kode_sub;
                    return $btn;
                    if ($data->oRabsub->oKom->oRo) {
                        $btn = explode(' - ', $data->oRabsub->oKom->oRo->oKros->nama_kro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->oRo->nama_ro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->nama_komponen)[0] . '.' . $data->oRabsub->kode_sub;
                        return $btn;
                    } else {
                        $btn = ' ' . '.' . ' ' . '.' . explode(' - ', $data->oRabsub->oKom->nama_komponen)[0] . '.' . $data->oRabsub->kode_sub;
                        return $btn;
                    }

                    // return $data->oRabsub->oKom->oRo->oKros;

                    if ($data->oRabsub->oKom->oRo->oKros) {
                        $btn = explode(' - ', $data->oRabsub->oKom->oRo->oKros->nama_kro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->oRo->nama_ro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->nama_komponen)[0] . '.' . $data->oRabsub->kode_sub;
                        return $btn;
                    } else {
                        return 'hehe';
                    }
                })
                ->addColumn('namanya', function ($data) {
                    $btn = $data->kode_akun . ' - ' . $data->nama_akun;
                    return $btn;
                })
                ->addColumn('pagunya', function ($data) {
                    $btn = Money($data->biaya, 'IDR', 'false');
                    return $btn;
                })
                ->addColumn('sisanya', function ($data) {
                    $btn = Money($data->biaya - $data->realisasi, 'IDR', 'false');
                    return $btn;
                })
                ->addColumn('realisasinya', function ($data) {
                    $btn = Money($data->biaya - $data->realisasi, 'IDR', 'false');
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }
    }
    public function index()
    {
        $SP = SifatPembayaran::all();
        $JP = JenisPembayaran::all();

        return view('admin.spm', compact('SP', 'JP'));
    }
    public function cetakspm($id)
    {
        $ds = RiwayatSpp::with('revisi')
            ->where('id', $id)
            ->first();
        $dparr = [];
        $data['rs'] = $ds;
        $data['rm'] = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();
        $dp = json_decode($data['rm']->dasar_pembayaran);
        if($dp){
            foreach ($dp as $key => $value) {
                $dparr[] = DasarPembayaran::where('id', $value)->first()->nomor;
            }
        }
    
        $data['dparr'] = $dparr ?? [];
        $data['rsp'] = rspp::with('akun.oRabsub.oKom.oRo.oKros', 'rsppd.oPajak.oPajak')
            ->where('id_riwayat_spp', $id)
            ->get()
            ->groupBy('id_rab_akun');
        $n = $data['rsp'];
        // return $n;
        $p = pajakSpp::with('oPajak')
            ->where('id_riwayat_spp', $id)
            ->get();
        // return $data['pajak'];
        $nilai = 0;
        // return $n;
        $arrayVal = [];
        // return $n;
        $patok = 0;
        foreach ($n as $key => $value) {
            $arrayVal[$patok][0] = 0;
            $arrayVal[$patok][1] = '';
            $arrayVal[$patok][2] = '';

            foreach ($value as $keys => $values) {
                $kegiatan = explode(' - ', $values->akun->oRabsub->oKom->oRo->oKros->nama_kegiatan)[0];
                $kro = explode(' - ', $values->akun->oRabsub->oKom->oRo->oKros->nama_kro)[0];
                $ro = explode(' - ', $values->akun->oRabsub->oKom->oRo->nama_ro)[0];
                $komp = explode(' - ', $values->akun->oRabsub->oKom->nama_komponen)[0];

                $arrayVal[$patok][0] += $values->sppini;
                $arrayVal[$patok][1] = $kegiatan . '.' . $kro . '.' . $ro . '.' . $komp . '.' . $values->akun->oRabsub->kode_sub . '.' . $values->akun->kode_akun;
                // $arrayVal[$key][2] = $values->rsppd;
                $nilai += (int) $values->sppini;
            }
            $patok++;
        }
        // echo $nilai;
        // return $p;
        $data['pajak'] = $p;
        $data['nilai'] = $nilai;
        if ($ds->jenis == 1) {
            # code...

            $newArr = [];
            if (count($p) >= count($arrayVal)) {
                foreach ($p as $key => $value) {
                    // print_r( $arrayVal[$key][0]);

                    $newArr[$key]['jumlah'] = $arrayVal[$key][0] ?? 0;
                    $newArr[$key]['kode'] = $arrayVal[$key][1] ?? 0;
                    $newArr[$key]['kodepajak'] = $value->oPajak->kode ?? 0;
                    $newArr[$key]['nilaipajak'] = $value->jumlah ?? 0;
                }
                // return $newArr;
            } else {
                // echo $p[0];
                // retu
                // foreach ($p as $key => $value) {
                //     # code...
                //     echo $value;
                // }
                $noar = 0;
                foreach ($arrayVal as $key => $value) {
                    // echo $p[$noar] ?? 0;

                    // print_r($value);
                    $newArr[$key]['jumlah'] = $value[0];
                    $newArr[$key]['kode'] = $value[1];
                    $newArr[$key]['kodepajak'] = $p[$noar]->oPajak->kode ?? 0;
                    $newArr[$key]['nilaipajak'] = $p[$noar]->jumlah ?? 0;

                    if (count($p) - 1 >= $noar) {
                        $noar++;
                    }
                    echo '<br>';
                }
                // return $newArr;
            }

            // return $besa count($p);
            $data['newArr'] = $newArr;
            // return $arrayVal;
        }
        $data['untukup'] = $ds;
        // return $ds;
        if ($ds->jenis == 2) {
            $data['dataup'] = up::where('idriwayat', $ds->id)->first();
        }
        // return $data['untukup']->jenis;
        $data['set'] = Setting::first();
        $data['kro'] = rab_kekro::with([
            'mAkun' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', $ds->id);
            },
            'mAkunlalu' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', '!=', $ds->id);
            },
        ])
            ->where('id_revisi', $ds->id_revisi)
            ->where('id_rkakl', $ds->id_rkakl)
            ->get();
        // return 'w';
        $pdf = Pdf::loadView('pdf.spm', $data);

        return $pdf->setPaper('a4', 'potrait')->stream('SPM.pdf');
    }
    public function cetaksp2d($id)
    {
        $ds = RiwayatSpp::with('revisi', 'oUp')
            ->where('id', $id)
            ->first();
        // return $ds;

        $data['pajak'] = pajakSpp::with('oPajak')
            ->where('id_riwayat_spp', $id)
            ->get()->sum('jumlah');
        
        // return $data['pajak'];
        $data['rs'] = $ds;
        $data['rm'] = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();
        $data['rsp'] = rspp::with('akun.oRabsub.oKom.oRo.oKros')
            ->where('id_riwayat_spp', $id)
            ->get();
        $data['set'] = Setting::first();
        $data['kro'] = rab_kekro::with([
            'mAkun' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', $ds->id);
            },
            'mAkunlalu' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', '!=', $ds->id);
            },
            'mAkun.akun',
        ])
            ->where('id_revisi', $ds->id_revisi)
            ->where('id_rkakl', $ds->id_rkakl)
            ->get();
        // return $data['kro'];
        // return $data;
        $pdf = Pdf::loadView('pdf.sp2d', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('SP2D.pdf');
    }
    public function cetakunit($id, $all)
    {
        $dr = rkakl::with('revici')
            ->where('id', $id)
            ->first();
        // $d =  rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya.mAkun.mDetail("fbs")')
        // ->where('id_rkakl', $id)
        // ->where('id_revisi', $dr->revici->id)
        // ->get();
        $d = rab_kekro::with([
            'mRo.mKom.mSubnya.mAkun.mDetail' => function ($q) {
                return $q->where('unit', 'fbs');
            },
        ])
            ->where('id_rkakl', $id)
            ->where('id_revisi', $dr->revici->id)
            ->get();
        $data = rab_detail::with('oAkun.oRabsub.oKom.oRo.oKros')
            ->where('unit', 'fbs')
            ->get();
        $c = DB::table('rab_kekros')

            ->select('rab_kekros.id_rkakl', 'rab_kekros.id_revisi', 'rab_kekros.nama_kegiatan', 'rab_kekros.nama_kro', 'rab_ros.nama_ro', 'rab_komponens.nama_komponen', 'rab_subs.nama_sub', 'rab_subs.kode_sub', 'rab_akuns.kode_akun', 'rab_akuns.nama_akun', 'rab_details.keterangan', 'rab_details.unit', 'rab_details.biaya', 'rab_details.sisabiaya', 'rab_details.realisasi', 'rsppds.status', 'rsppds.sppini', 'rsppds.spplalu')
            // ->max('rsppds.sppini')
            ->join('rab_ros', 'rab_ros.id_rab_kekro', '=', 'rab_kekros.id')
            ->join('rab_komponens', 'rab_komponens.id_rab_ro', '=', 'rab_ros.id')
            ->join('rab_subs', 'rab_subs.id_rab_komponen', '=', 'rab_komponens.id')
            ->join('rab_akuns', 'rab_akuns.id_rab_sub', '=', 'rab_subs.id')
            ->join('rab_details', 'rab_details.id_rab_akun', '=', 'rab_akuns.id')
            ->leftJoin('rsppds', function ($leftjohn) {
                $leftjohn
                    ->on('rab_details.id', '=', 'rsppds.id_rab_detail')
                    ->where('rsppds.status', '1')
                    // $leftjohn->max('rsppds.sppini');
                    ->whereRaw('rsppds.id IN (select MAX(a2.id) from rsppds as a2 join rab_details as u2 on u2.id = a2.id_rab_detail group by u2.id)');

                // $leftjohn->on(DB::raw('rsppds.status'),'=' ,DB::raw("'1'"));
                // $leftjohn->take(1);
            })

            ->where(function ($q) use ($all) {
                if ($all == 'all') {
                    # code...
                } else {
                    $q->where('rab_details.unit', $all);
                }
            })
            // ->where('rab_details.unit',$all == 'all' ? '')
            ->where('rab_kekros.id_rkakl', $id)

            ->where('rab_kekros.id_revisi', $dr->revici->id)
            ->get()
            ->groupBy(['nama_kegiatan', 'nama_kro', 'nama_ro', 'nama_komponen', 'nama_sub', 'kode_akun']);
        // return $c;
        // return $data;
        // $d->kegiatanr();
        $rdsppini = DB::table('rab_details')
            ->select('rab_details.id', 'rab_details.keterangan', 'rab_details.unit', 'rab_details.biaya', 'rab_details.sisabiaya', 'rab_details.realisasi', 'rsppds.status', 'rsppds.sppini', 'rsppds.spplalu')
            ->leftJoin('rsppds', function ($leftjohn) {
                $leftjohn
                    ->on('rab_details.id', '=', 'rsppds.id_rab_detail')
                    ->where('rsppds.status', '1')
                    ->whereRaw('rsppds.id IN (select MAX(a2.id) from rsppds as a2 join rab_details as u2 on u2.id = a2.id_rab_detail group by u2.id)');
            })
            ->where('rab_details.id_revisi', $dr->revici->id)
            ->get()
            ->sum('sppini');
        $rdspplalu = DB::table('rab_details')
            ->select('rab_details.id', 'rab_details.keterangan', 'rab_details.unit', 'rab_details.biaya', 'rab_details.sisabiaya', 'rab_details.realisasi', 'rsppds.status', 'rsppds.sppini', 'rsppds.spplalu')
            ->leftJoin('rsppds', function ($leftjohn) {
                $leftjohn
                    ->on('rab_details.id', '=', 'rsppds.id_rab_detail')
                    ->where('rsppds.status', '1')
                    ->whereRaw('rsppds.id IN (select MAX(a2.id) from rsppds as a2 join rab_details as u2 on u2.id = a2.id_rab_detail group by u2.id)');
            })
            ->where('rab_details.id_revisi', $dr->revici->id)
            ->get()
            ->sum('spplalu');
        return view('rungkad3', compact('c', 'dr', 'rdsppini', 'rdspplalu'));

        // return $d;
    }
    public function cetakrkakl($id)
    {
        $dr = rkakl::with('revici')
            ->where('id', $id)
            ->first();
        $d = rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya.mAkun.mDetail')
            ->where('id_rkakl', $id)
            ->where('id_revisi', $dr->revici->id)
            ->get();
        // return $d;
        // return $data;
        // $data['rabkro'] = $d;
        return view('rungkad', compact('d'));

        $ds = RiwayatSpp::with('revisi')
            ->where('id', $id)
            ->first();
        $data['pajak'] = pajakSpp::with('oPajak')
            ->where('id_riwayat_spp', $id)
            ->first();

        $data['rs'] = $ds;
        $data['rm'] = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();

        $data['set'] = Setting::first();
        // return $data['pajak'];

        // return $data;
        $pdf = Pdf::loadView('pdf.pajak', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('Pajak.pdf');
    }
    public function cetakpajak($id,$idp)
    {
        $ds = RiwayatSpp::with('revisi')
            ->where('id', $id)
            ->first();

    
            $data['pajak'] = pajakSpp::with('oPajak')
                ->where('id_riwayat_spp', $id)
                ->where('id', $idp)

                ->first();
        
        // return $data['pajak'];

        $data['rs'] = $ds;
        $data['rm'] = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();

        $data['set'] = Setting::first();
        // return $data['pajak'];

        // return $data;
        
        $pdf = Pdf::loadView('pdf.newpajak', $data);
        return $pdf->setPaper('a4', 'potrait')->stream('Pajak.pdf');
    }
    public function cetakspp($id)
    {
        $ds = RiwayatSpp::with('revisi')
            ->where('id', $id)
            ->first();
        // return $ds;
        $data['rs'] = $ds;
        $data['rm'] = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();
        $data['rsp'] = rspp::with('akun.oRabsub.oKom.oRo.oKros')
            ->where('id_riwayat_spp', $id)
            ->get();
        $data['set'] = Setting::first();
        $data['kro'] = rab_kekro::with([
            'mAkun' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', $ds->id);
            },
            'mAkunlalu' => function ($query) use ($ds) {
                $query->where('id_riwayat_spp', '!=', $ds->id);
            },
        ])
            ->where('id_revisi', $ds->id_revisi)
            ->where('id_rkakl', $ds->id_rkakl)
            ->get();
        // return $data['kro'];
        // return view('pdf.testing',$data);
        $pdf = Pdf::loadView('pdf.testing', $data);

        return $pdf->setPaper('A4', 'potrait')->stream('SPP.pdf');
    }
    public function show($id)
    {
        $rs = RiwayatSpp::with('oUp','oRevisi')->where('id', $id)->first();
        // return $rs;
        $rm = RiwayatMaster::with('sup', 'pejabatppk')
            ->where('id_riwayat_spp', $id)
            ->first();
        $rsp = rspp::with('akun.oRabsub.oKom.oRo.oKros')
            ->where('id_riwayat_spp', $id)
            ->get();
        $set = Setting::first();
        $pajak = pajakSpp::with('oPajak')->where('id_riwayat_spp', $id)
        ->get();
        $t = json_encode($pajak);
        $data['pajak'] = $pajak;
        // return $pajak;
        $data['rs'] = $rs;
        $data['page'] = 'Detail';
        $data['rsp'] = $rsp;
        $data['rm'] = $rm;
        $data['set'] = $set;

        $data['judul'] = 'Surat Permintaan Pembayaran';
        return view('spmv2.spm.detail', $data);
    }
    public function storeedit(Request $request)
    {
        // return 'halo';
        $validator = Validator::make($request->all(), [
            'supplier' => ['required', 'max:255'],
            'dasarpembayaran' => ['required', 'max:255'],
            'idrspp' => ['required', 'max:255'],
            'pejabat' => ['required', 'max:255'],
            'sp' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $rspp = RiwayatSpp::where('id', $request->idrspp)->first();
        if ($request->jenisspp == 1) {
            # code...

            $datarsppd = rsppd::where('id_riwayat_spp', $rspp->id)->get();

            if (count($datarsppd) == 0) {
                return ['status' => 'error', 'pesan' => 'Belum ada detail yang dibuat', 'tipe' => 404];
                // return 'ada';
            }
        }
        $set = Setting::first();

        $cek = rspp::where('id_riwayat_spp', $request->idrspp)
            ->get()
            ->sum('sppini');

        $rspp->proses = Date('d-m-Y');
        $rspp->status = 1;
        $rspp->judul = $request->judul;
        $rspp->uraian = $request->uraian;
        $rspp->tanggal = $request->tanggalproses;
        $rspp->total_sppini_1 = $cek;
        $rspp->nomorspp = $request->nomorspp;

        $rspp->jenis = $request->jenisspp;
        $rspp->save();
       

        if ($request->jenisspp == 2) {
            up::updateOrCreate(
                [
                    'idriwayat' => $rspp->id,
                ],
                [
                    'nilai' => $request->nilaiup,
                    'akun' => $request->akunup,
                    'nilaiterakhir' => $request->nilaiupterakhir,
                ],
            );
        } else {
            $rsppd = rsppd::where('id_riwayat_spp', $request->idrspp)->get();
            // return $rsppd;
            $total = 0;
            foreach ($rsppd as $vr) {
                if ($vr->status == 0) {
                    // return 'ha';

                    $vr->status = 1;
                    $rabd = rab_detail::where('id', $vr->id_rab_detail)->first();
                    $total += $vr->sppini;
                    $rabd->realisasi = $rabd->realisasi + $vr->sppini;
                    $rabd->sisabiaya = $rabd->sisabiaya - $vr->sppini;
                    $rabd->save();
                    $vr->save();
                }
            }
            $rspp = rspp::where('id_riwayat_spp', $request->idrspp)->first();
            $rspp->status = 1;

            if ($rspp->status == 0) {
                $raba = rab_akun::where('id', $rspp->id_rab_akun)->first();
                $raba->realisasi = $raba->realisasi + $rspp->sppini;
                $raba->sisa = $raba->sisa - $rspp->sppini;
                $raba->save();
            }
            $rspp->save();
        }

        RiwayatMaster::updateOrCreate(
            [
                'id_riwayat_spp' => $request->idrspp,
            ],
            [
                'id_supplier' => $request->supplier,
                'ppk' => $request->pejabat,
                'penerbit' => $set->penerbit . ' - ' . $set->nip,
                'sifat_pembayaran' => $request->sp,
                'jenis_pembayaran' => $request->jp,
                'kp' => '(KD) Kota Daerah',
                // 'dasar_pembayaran' => json_encode($ddp),
            ],
        );

        return ['status' => 'success', 'data' => $rspp];
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'supplier' => ['required', 'max:255'],
            'dasarpembayaran' => ['required', 'max:255'],
            'idrspp' => ['required', 'max:255'],
            'pejabat' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $dp = json_decode($request->dasarpembayaran);

        foreach ($dp as $value) {
            $ddp[] = $value->id;
        }
        $set = Setting::first();

        $cek = rspp::where('id_riwayat_spp', $request->idrspp)
            ->get()
            ->sum('sppini');
        $rspp = RiwayatSpp::where('id', $request->idrspp)->first();
        $rspp->proses = Date('d-m-Y');
        $rspp->status = 1;
        $rspp->judul = $request->judul;
        $rspp->uraian = $request->uraian;
        $rspp->tanggal = $request->tanggalproses;
        $rspp->total_sppini_1 = $cek;
        $rspp->jenis = $request->jenisspp;
        $rspp->save();

        if ($request->jenisspp == 2) {
            up::updateOrCreate(
                [
                    'idriwayat' => $rspp->id,
                ],
                [
                    'nilai' => $request->nilaiup,
                    'akun' => $request->akunup,
                    'nilaiterakhir' => $request->nilaiupterakhir,
                ],
            );
        } else {
            $rsppd = rsppd::where('id_riwayat_spp', $request->idrspp)->get();
            $total = 0;
            foreach ($rsppd as $vr) {
                if ($vr->status == 0) {
                    # code...

                    $vr->status = 1;
                    $rabd = rab_detail::where('id', $vr->id_rab_detail)->first();
                    $total += $vr->sppini;
                    $rabd->realisasi = $rabd->realisasi + $vr->sppini;
                    $rabd->sisabiaya = $rabd->sisabiaya - $vr->sppini;
                    $rabd->save();
                    $vr->save();
                }
            }
            $rspp = rspp::where('id_riwayat_spp', $request->idrspp)->first();
            $rspp->status = 1;

            if ($rspp->status == 0) {
                $raba = rab_akun::where('id', $rspp->id_rab_akun)->first();
                $raba->realisasi = $raba->realisasi + $rspp->sppini;
                $raba->sisa = $raba->sisa - $rspp->sppini;
                $raba->save();
            }
            $rspp->save();
        }
      
        RiwayatMaster::updateOrCreate(
            [
                'id_riwayat_spp' => $request->idrspp,
            ],
            [
                'id_supplier' => $request->supplier,
                'ppk' => $request->pejabat,
                'penerbit' => $set->penerbit . ' - ' . $set->nip,
                'sifat_pembayaran' => $request->sp,
                'jenis_pembayaran' => $request->jp,
                'kp' => '(KD) Kota Daerah',
                'dasar_pembayaran' => json_encode($ddp),
            ],
        );

        return ['status' => 'success', 'data' => $rspp];
    }
    public function indexv2()
    {
        $SP = SifatPembayaran::all();
        $JP = JenisPembayaran::all();
        $datark = rkakl::get();
        $datakl = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
        if (request()->ajax()) {
            return Datatables::of(
                RiwayatSpp::with('oUp', 'oMaster')
                    ->where('tahun', $datakl->tahun_anggaran)
                    ->latest()
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <a type='button' href='" .
                        url('spm/edit/redirect/') .
                        '/' .
                        $data->id .
                        "'  class='btn btn-primary btn-sm btn-xs mb-1'>Edit </a>

                </li>";
                    if ($data->status == 1) {
                        $btn .=
                            "<li class='list-inline-item'>
                        <a type='button' href='" .
                            url('spm/create/') .
                            '/' .
                            $data->id .
                            "'  class='btn btn-success btn-sm btn-xs mb-1'>Detail </a>
                        </li>";
                    }

                    $btn .=
                        "<li class='list-inline-item'>
                    <button onclick='deleteme(" .
                        $data->id .
                        ")' type='button'  class='btn btn-danger btn-sm btn-xs mb-1'>Hapus </button>
                    </li>
                </ul>";
                    return $btn;
                })
                ->addColumn('tanggalproses', function ($data) {
                    $btn = $data->proses;
                    return $btn;
                })
                ->addColumn('sppininya', function ($data) {
                    if ($data->jenis == 2) {
                        $btn = Money($data->oUp->nilai ?? 0, 'IDR', true);
                    } else {
                        $btn = Money($data->total_sppini_1 ?? 0, 'IDR', true);
                    }
                    return $btn;
                })
                ->addColumn('statusnya', function ($data) {
                    if ($data->status == 0) {
                        $btn = "<span class='badge badge-warning'> Draft </span>";
                    } else {
                        $btn = "<span class='badge badge-success'> Fixed </span>";
                    }
                    if ($data->oMaster) {
                        $btn .= "<span class='badge badge-primary'>  " . $data->oMaster->sifat_pembayaran . ' </span>';
                    } else {
                    }
                    return $btn;
                })
                ->rawColumns(['aksi', 'statusnya'])
                ->make(true);
        }
        $data['page'] = 'Riwayat SPP';
        $data['judul'] = 'RKA-KL';
        $data['rk'] = $datark;
        $data['kl'] = $datakl;

        return view('spmv2.spm.list', $data);
    }
    public function getbytahun($tahun)
    {
        if (request()->ajax()) {
            return Datatables::of(
                RiwayatSpp::where('tahun', $tahun)
                    ->latest()
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'>Edit </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-sm btn-xs mb-1'>Hapus </button>
                    </li>
               
                </ul>";
                    return $btn;
                })
                ->addColumn('tanggalproses', function ($data) {
                    $btn = $data->proses;
                    return $btn;
                })
                ->addColumn('sppininya', function ($data) {
                    $btn = Money($data->total_sppini_1 ?? 0, 'IDR', true);
                    return $btn;
                })
                ->addColumn('statusnya', function ($data) {
                    if ($data->status == 0) {
                        $btn = "<span class='badge badge-warning'> Draft </span>";
                    } else {
                        $btn = "<span class='badge badge-success'> Fixed </span>";
                    }
                    return $btn;
                })
                ->rawColumns(['aksi', 'statusnya'])
                ->make(true);
        }
    }
    public function redirect()
    {
        $data = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
        $set = Setting::first();

        $jumlahsurat = RiwayatSpp::where('tahun', $data->tahun_anggaran)->count() + 1;
        $nomorsurat = $set->kode_satker . '.' . $data->tahun_anggaran . '.' . '000' . $jumlahsurat;
        $rspp = RiwayatSpp::create([
            'tahun' => $data->tahun_anggaran,
            'nomorspp' => $nomorsurat,
            'tanggal' => null,
            'id_rkakl' => $data->id,
            'id_revisi' => $data->revici->id,
            'no_dipa' => 'DIPA-023.17.2' . $set->kode_satker . '/' . $data->tahun_anggaran,
            'tanggal_dipa' => $data->revici->tanggal,
            'status' => 0,
            'proses' => null,
        ]);
        return redirect('spm/create/redirect/' . $rspp->id);
    }
    public function create($id)
    {
        $data = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
        // return $data;
        // return $data;
        // $rk = rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya')
        //     ->where('id_rkakl', $data->id)
        //     ->where('id_revisi', $data->revici->id)
        //     ->get();
        // return $rk;
        $pajak = Pajak::get();
        $dp = DasarPembayaran::get();
        $sup = Supplier::get();
        $pejabat = Pejabat::get();
        $set = Setting::first();

        // $akun = rab_akun::with('oRabsub.oKom.oRo.oKros', 'mDetail', 'mCabang.mDetail')
        //     ->where('id_revisi', $data->revici->id)
        //     ->get();

        $sp = SifatPembayaran::all();

        //create drafted riwayat spp

        $rspp = RiwayatSpp::with('oMaster')
            ->where('id', $id)
            ->first();
        if ($rspp) {
            return redirect()->route('spm.edit', ['id' => $rspp->id]);
        }
        // return $rspp;
        // $rrspp = rspp::create([
        //     'id_rab_akun' => $request->id_akun,
        //     'id_kro' => $kro->oRabsub->oKom->oRo->oKros->id,
        //     'id_riwayat_spp' => $request->id,
        //     'pagu' => 0,
        //     'sppini' => 0,
        //     'spplalu' => 0,
        //     'sisadana' => 0,
        // ]);
        // return $data;
        $data['rspp'] = $rspp;
        $data['pajak'] = $pajak;

        $data['page'] = 'Penyusunan SPP';
        $data['judul'] = 'Form SPP';
        $data['dp'] = $dp;
        $data['sp'] = $sp;
        $data['sup'] = $sup;
        $data['set'] = $set;
        $data['data'] = $data;
        $data['date'] = Date('d-m-Y');
        $data['pejabat'] = $pejabat;
        // return $akun;
        return view('spmv2.spm.create', $data);
    }
    public function edit($id)
    {
        $data = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();

        $pajak = Pajak::get();
        $dp = DasarPembayaran::get();
        $sup = Supplier::get();
        $pejabat = Pejabat::get();
        $set = Setting::first();

        $sp = SifatPembayaran::all();

        //create drafted riwayat spp

        $rspp = RiwayatSpp::with('oMaster.sup', 'oMaster.pejabatppk', 'oUp')
            ->where('id', $id)
            ->first();
        // return $rspp;
        if ($rspp->oMaster) {
            if ($rspp->oMaster->dasar_pembayaran) {
                // return $rspp->oMaster->dasar_pembayaran;
                $dpa = json_decode($rspp->oMaster->dasar_pembayaran);
                // return $dpa;
                if (count($dpa) == 0) {
                    $data['dpa'] = $dpa;
                } else {
                    $dpa = DasarPembayaran::where(function ($q) use ($dpa) {
                        foreach ($dpa as $key => $value) {
                            $q->orWhere('id', $value);
                        }
                    })->get();
                }
                // return $adp;

                // return 0;
                $data['dpa'] = $dpa;
            } else {
                $data['dpa'] = [];
            }
        } else {
            $data['dpa'] = [];
        }

        $data['rspp'] = $rspp;
        $data['pajak'] = $pajak;

        $data['page'] = 'Penyusunan SPP';
        $data['judul'] = 'Form SPP';
        $data['dp'] = $dp;
        $data['sp'] = $sp;
        $data['sup'] = $sup;
        $data['set'] = $set;
        $data['data'] = $data;
        $data['date'] = Date('d-m-Y');
        $data['pejabat'] = $pejabat;
        // return $akun;
        return view('spmv2.spm.edit', $data);
    }
}
