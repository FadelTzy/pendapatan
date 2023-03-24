<?php

namespace App\Http\Controllers;

use Akaunting\Money\View\Components\Money;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\JenisDokumen;
use Illuminate\Support\Facades\Validator;
use App\Models\DasarPembayaran;
use App\Models\akun;
use App\Models\detailAkun;
use App\Models\rkakl;
use App\Models\rab_akun;
use App\Models\Unit;
use Illuminate\Support\Carbon;
use App\Models\kegiatan;
use App\Models\rab_kekro;
class AkunController extends Controller
{
    public function high()
    {
        $dr = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
    
        $kegiatan = kegiatan::with('kroitem.roitem.komponenitem.subkomponenitem')->get();
        if (request()->ajax()) {
            return Datatables::of(
                rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya.mAkun.mDetail.mRsppd','mRo.mKom.mSubnya.mAkun.oRspp')
                    ->where('id_rkakl', $dr->id)
                    ->where('id_revisi', $dr->revici->id)
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) use ($dr) {
                    $dataj = json_encode($data);
                    $btn = "      <ul class='list-inline mb-0'>
            <li class='list-inline-item'>
            <button  class='btn btn-sm btn-secondary d-none lihatakun'> <i class='fa fa-arrow-down'> </i> </button>
            </li>";
                    $btn .= '</ul>';
                    return $btn;
                })
                ->addColumn('thn_anggaran', function ($data) {
                    $btn = 'Tahun Anggaran ' . $data->tahun_anggaran;
                    return $btn;
                })
                ->addColumn('tanggal', function ($data) {
                    $date = Carbon::parse($data->tgl_cetak)->locale('id');
                    $date->settings(['formatFunction' => 'translatedFormat']);
                    return $date->format('l, j F Y'); //
                })
                ->addColumn('kegiatan_nama', function ($data) {
                    $date = "<span class='text-primary'> " . $data->kegiatanr->nama . ' </span>' . '<br>' . "<span class='text-danger'> " . $data->kror->nama . ' </span>' ;

                    return $date;
                })
                ->addColumn('kro_nama', function ($data) {
                    if ($data->kror == null) {
                        $date = '-';
                    } else {
                        $date = $data->kror->nama;
                    }
                    return $date;
                })
                ->addColumn('biayanya', function ($data) {
                    $date = $data->biaya;
                    return $date;
                })
                ->addColumn('spplalunya', function ($data) {
                    $date = "<span id='idrabkekrolalu".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppininya', function ($data) {
                    $date = "<span id='idrabkekroini".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppsdnya', function ($data) {
                    $date = "<span id='idrabkekrosd".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppsisanya', function ($data) {
                    $date = "<span id='idrabkekrosisa".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('kodenya', function ($data) {
                    $date = $data->kegiatanr->kode . '<br>' . '&nbsp&nbsp' . $data->kegiatanr->kode . '.' . $data->kror->kode;
                    return $date;
                })
                ->rawColumns(['aksi', 'kodenya', 'biayanya', 'kro_nama', 'kegiatan_nama', 'thn_anggaran', 'tanggal','spplalunya','sppininya','sppsdnya','sppsisanya'])
                ->make(true);
        }
        $data['page'] = 'RAB';
        $data['judul'] = 'RKA-KL';
        $data['dr'] = $dr;
        $data['kegiatan'] = $kegiatan;
        $data['unit'] = Unit::get();

        return view('spmv2.rabrealisasi2', $data);
    }
    public function akunrabunit($unit)
    {
        $dr = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
     
        // return $akun;
        if (request()->ajax()) {
            return Datatables::of(
                rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya.mAkun.mDetail.mRsppd','mRo.mKom.mSubnya.mAkun.oRspp')
                    ->where('id_rkakl', $dr->id)
                    ->where('id_revisi', $dr->revici->id)
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) use ($dr) {
                    $dataj = json_encode($data);
                    $btn = "      <ul class='list-inline mb-0'>
            <li class='list-inline-item'>
            <button  class='btn btn-sm btn-secondary d-none lihatakun'> <i class='fa fa-arrow-down'> </i> </button>
            </li>";
                 

                    $btn .= '</ul>';
                    return $btn;
                })
                ->addColumn('thn_anggaran', function ($data) {
                    $btn = 'Tahun Anggaran ' . $data->tahun_anggaran;
                    return $btn;
                })
                ->addColumn('tanggal', function ($data) {
                    $date = Carbon::parse($data->tgl_cetak)->locale('id');
                    $date->settings(['formatFunction' => 'translatedFormat']);
                    return $date->format('l, j F Y'); //
                })
                ->addColumn('kegiatan_nama', function ($data) {
                    $date = "<span class='text-primary'> " . $data->kegiatanr->nama . ' </span>' . '<br>' . "<span class='text-danger'> " . $data->kror->nama . ' </span>' ;

                    return $date;
                })
                ->addColumn('kro_nama', function ($data) {
                    if ($data->kror == null) {
                        $date = '-';
                    } else {
                        $date = $data->kror->nama;
                    }
                    return $date;
                })
                ->addColumn('biayanya', function ($data) {
                    $date = $data->biaya;
                    return $date;
                })
                ->addColumn('spplalunya', function ($data) {
                    $date = "<span id='idrabkekrolalu".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppininya', function ($data) {
                    $date = "<span id='idrabkekroini".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppsdnya', function ($data) {
                    $date = "<span id='idrabkekrosd".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('sppsisanya', function ($data) {
                    $date = "<span id='idrabkekrosisa".$data->id."'> </span>";
                    return $date;
                })
                ->addColumn('kodenya', function ($data) {
                    $date = $data->kegiatanr->kode . '<br>' . '&nbsp&nbsp' . $data->kegiatanr->kode . '.' . $data->kror->kode;
                    return $date;
                })
                ->rawColumns(['aksi', 'kodenya', 'biayanya', 'kro_nama', 'kegiatan_nama', 'thn_anggaran', 'tanggal','spplalunya','sppininya','sppsdnya','sppsisanya'])
                ->make(true);
        }
    }
    public function akunrab()
    {
        $data = rkakl::with('revici')
            ->where('tahun_anggaran', Date('Y'))
            ->first();
        $akun = rab_akun::with('oRabsub.oKom.oRo.oKros', 'mDetail', 'mCabang.mDetail', 'oRspp')
            ->where('id_revisi', $data->revici->id)
            ->get();
        // return $akun;
        if (request()->ajax()) {
            return Datatables::of($akun)
                ->addIndexColumn()
                ->addColumn('kodenya', function ($data) {
                    $btn = $data->kode_akun . ' - ' . $data->nama_akun;
                    return $btn;
                })
                ->addColumn('biayanya', function ($data) {
                    $btn = Money($data->biaya, 'IDR', true);
                    return $btn;
                })
                ->addColumn('periodelalunya', function ($data) {
                    $btn = Money($data->oRspp->spplalu ?? 0, 'IDR', true);
                    return $btn;
                })
                ->addColumn('periodeininya', function ($data) {
                    $btn = Money($data->oRspp->sppini ?? 0, 'IDR', true);
                    return $btn;
                })
                ->addColumn('periodesdnya', function ($data) {
                    $btn = Money(($data->oRspp->sppini ?? 0) + ($data->oRspp->spplalu ?? 0), 'IDR', true);
                    return $btn;
                })
                ->addColumn('sisadananya', function ($data) {
                    $btn = Money($data->oRspp->sisadana ?? 0, 'IDR', true);
                    return $btn;
                })
                ->addColumn('coanya', function ($data) {
                    $btn = explode(' - ', $data->oRabsub->oKom->oRo->oKros->nama_kro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->oRo->nama_ro)[0] . '.' . explode(' - ', $data->oRabsub->oKom->nama_komponen)[0] . '.' . $data->oRabsub->kode_sub;
                    return $btn;
                })
                ->addColumn('unitnya', function ($data) {
                    $btn = $data->unit ?? 'Kantor Pusat';
                    return $btn;
                })
                ->rawColumns(['aksi', 'biayanya'])
                ->make(true);
        }
        $data['page'] = 'Realisasi RAB';
        $data['judul'] = 'Akun';
        $data['unit'] = Unit::get();
        $data['data'] = $data;
        return view('spmv2.rabrealisasi', $data);
    }
    public function update(Request $request)
    {
        $data = akun::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $data->nama = $request->nama;
        $data->kode = $request->kode;

        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = akun::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(akun::get())
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
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('admin.rkakl.akun');
    }
    public function indexv2()
    {
        // return akun::get();
        // return akun::with('mDetail')->get();
        if (request()->ajax()) {
            return Datatables::of(akun::with('mDetail')->get())
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'> </i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffdel(" .
                        $data->id .
                        ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'> </i>  </button>
                    </li>
                    <li class='list-inline-item'>
                    <button type='button'  onclick='staffadd(" .
                    $dataj .
                        ")'   class='btn btn-warning btn-sm btn-xs mb-1'><i class='fa fa-plus'> </i>  </button>
                    </li>
                    <li class='list-inline-item d-none'>
                    <button type='button'  class='btn btn-warning btn-sm btn-xs mb-1 ddetail'> <i class='fa fa-arrow-down'> </i> </button>

                    </li>
                </ul>";
                    return $btn;
                })
                ->addColumn('dd', function ($data) {
                    $dataj = json_encode($data);

                    $btn =
                        "
              
                    
               ";
                    return $btn;
                })
                ->rawColumns(['aksi','dd'])
                ->make(true);
        }
        $data['page'] = 'Jenis Akun';
        $data['judul'] = 'Data Master Akun';
        
        return view('spmv2.jenisakun', $data);
    }
    
    public function editdetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detail' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = detailAkun::where('id',$request->id)->first();
        $user->detail = $request->detail;
        $user->save();
        
        if ($user) {
            return 'success';
        }
        return $request->all();
    }
    public function postdetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detail' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = detailAkun::create([
            'detail' => $request->detail,
            'idakun' => $request->id,
        ]);
        if ($user) {
            return 'success';
        }
        return $request->all();
    }
    public function deletedetail($id)
    {
        $data = detailAkun::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
    public function destroy($id)
    {
        $data = akun::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        detailAkun::where('idakun',$id)->delete();
        return 'success';
    }
}
