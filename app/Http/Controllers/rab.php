<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kegiatan;
use App\Models\akun;
use App\Models\detailAkun;
use App\Models\rab_akun;
use App\Models\rab_detail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Carbon;
use App\Models\rab_kekro;
use App\Models\rab_ro;
use App\Models\rab_komponen;
use App\Models\rab_sub;
use App\Models\rab_detail_rinci;
use App\Models\RiwayatRevisi;
use App\Models\rkakl;
use App\Models\Setting;
use App\Models\Unit;
use Illuminate\Support\Facades\Validator;

class rab extends Controller
{
    public function sanggar(Request $request)
    {
        //   return 0;
        // return $data;
        // return $data;
        $hrk = 0;
        $rka = rab_kekro::with('mRo.mkom.mSubnya.mAkun.mDetail')
            ->where('id_rkakl', $request->id)
            ->where('id_revisi', $request->idr)
            ->get();

        foreach ($rka as $kekro) {
            $hro = 0;
            foreach ($kekro->mRo as $ro) {
                $hkom = 0;
                foreach ($ro->mkom as $kom) {
                    $hsub = 0;
                    foreach ($kom->mSubnya as $subkom) {
                        $hak = 0;
                        foreach ($subkom->mAkun as $akun) {
                            $hde = 0;
                            foreach ($akun->mDetail as $detail) {
                                // return $detail;
                                $hde += $detail->biaya;
                                if ($detail->status_sinkron == 0) {
                                    $detail->status_sinkron = 1;
                                    $detail->realisasi = 0;

                                    $detail->sisabiaya = $detail->biaya;
                                    $detail->save();
                                }
                            }
                            $dAkun = rab_akun::where('id', $akun->id)->first();
                            if ($dAkun->status_sinkron == 0) {
                                $dAkun->biaya = $hde;
                                $dAkun->sisa = $hde;
                                $dAkun->realisasi = 0;
                                $dAkun->status_sinkron = 1;
                                $dAkun->save();
                            }
                            $hak += $hde;
                        }
                        $dSub = rab_sub::where('id', $subkom->id)->first();
                        $dSub->biaya = $hak;
                        $dSub->save();
                        $hsub += $hak;
                    }
                    $dKom = rab_komponen::where('id', $kom->id)->first();
                    $dKom->biaya = $hsub;
                    $dKom->save();
                    $hkom += $hsub;
                }
                $dRo = rab_ro::where('id', $ro->id)->first();
                $dRo->biaya = $hkom;
                $dRo->save();
                $hro += $hkom;
            }
            $dKro = rab_kekro::where('id', $kekro->id)->first();
            $dKro->biaya = $hro;
            $dKro->save();
            $hrk += $hro;
        }
        $revici = RiwayatRevisi::where('id', $request->idr)->first();
        $revici->anggaran = $hrk;
        $revici->save();
        return 'success';
        // return $data;
        // return $data;
        // return $request->id;
    }
    public function subkom($id, $subkom)
    {
        $dunit = Unit::get();

        $set = Setting::first();
        $subk = rab_sub::with('oKom.oRo.oKros')
            ->where('id', $subkom)
            ->first();
        $dr = RiwayatRevisi::where('id', $subk->id_revisi)->first();
        $akun = akun::get();
        // return  rab_akun::with('mDetail', 'mCabang.mDetail')
        // ->where('id_rkakl', $id)
        // ->where('id_rab_sub', $subkom)
        // ->get();
        if (request()->ajax()) {
            return Datatables::of(
                rab_akun::with('mDetail', 'mCabang.mDetail')
                    ->where('id_rkakl', $id)
                    ->where('id_rab_sub', $subkom)
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
                        "<li class='list-inline-item'>
                <button type='button' data-toggle='modal' onclick='staffupd(" .
                        $dataj .
                        ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'></i> </button>
                </li>
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
        $data['page'] = 'RAB';
        $data['judul'] = 'RKA-KL';
        $data['akun'] = $akun;
        $data['set'] = $set;
        $data['dunit'] = $dunit;

        $data['subk'] = $subk;
        $data['dr'] = $dr;

        return view('spmv2.rab.akun', $data);
    }
    public function kekro($id)
    {
        // return 's';
        $dr = rkakl::with('revici')
            ->where('id', $id)
            ->first();

        $kegiatan = kegiatan::with('kroitem.roitem.komponenitem.subkomponenitem')->get();
        if (request()->ajax()) {
            return Datatables::of(
                rab_kekro::with('kegiatanr', 'kror.roitem', 'mRo.ror', 'mRo.mKomponen', 'mRo.mKom.rKom', 'mRo.mKom.mSub', 'mRo.mKom.mSubnya')
                    ->where('id_rkakl', $id)
                    ->where('id_revisi', $dr->revici->id)
                    ->get(),
            )
                ->addIndexColumn()
                ->addColumn('aksi', function ($data) use ($dr) {
                    $dataj = json_encode($data);
                    $btn = "      <ul class='list-inline mb-0'>
                <li class='list-inline-item'>
                <button  class='btn btn-sm btn-secondary lihatakun'> <i class='fa fa-arrow-down'> </i> </button>
                </li>";
                    if ($dr->revici->status_draft == 2) {
                        $btn .=
                            "<li class='list-inline-item'>
                    <button type='button' disabled  onclick='addRo(" .
                            $dataj .
                            ")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>
                    </li>";
                        $btn .=
                            "<li class='list-inline-item'>
                <button type='button' disabled  data-toggle='modal' onclick='staffupd(" .
                            $dataj .
                            ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'></i> </button>
                </li>
                    <li class='list-inline-item'>
                    <button type='button' disabled onclick='staffdel(" .
                            $data->id .
                            ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'></i>  </button>
                    </li>";
                    } else {
                        $btn .=
                            "<li class='list-inline-item'>
                    <button type='button'   onclick='addRo(" .
                            $dataj .
                            ")'   class='btn btn-primary btn-sm btn-xs mb-1'> <i class='fa fa-plus-circle'> </i> </button>
                    </li>";
                        $btn .=
                            "<li class='list-inline-item'>
        <button type='button'  data-toggle='modal' onclick='staffupd(" .
                            $dataj .
                            ")'   class='btn btn-sm btn-success btn-xs mb-1'><i class='fa fa-edit'></i> </button>
        </li>
            <li class='list-inline-item'>
            <button type='button'  onclick='staffdel(" .
                            $data->id .
                            ")'   class='btn btn-danger btn-sm btn-xs mb-1'><i class='fa fa-trash'></i>  </button>
            </li>";
                    }

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
                    $date = "<span class='text-primary'> " . $data->kegiatanr->nama . ' </span>' . '<br>' . "<span class='text-danger'> " . $data->kror->nama . ' </span>' . '<hr>' . 'Lokasi : Kota Makassar';

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
                ->addColumn('kodenya', function ($data) {
                    $date = $data->kegiatanr->kode . '<br>' . '&nbsp&nbsp' . $data->kegiatanr->kode . '.' . $data->kror->kode;
                    return $date;
                })
                ->rawColumns(['aksi', 'kodenya', 'biayanya', 'kro_nama', 'kegiatan_nama', 'thn_anggaran', 'tanggal'])
                ->make(true);
        }
        $data['page'] = 'RAB';
        $data['judul'] = 'RKA-KL';
        $data['dr'] = $dr;
        $data['kegiatan'] = $kegiatan;
        return view('spmv2.rab.kekro', $data);
    }
    public function storekekro(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = rab_kekro::create([
            // 'anggaran' => $request->anggaran,
            // 'realisasi' => $request->realisasi,
            // 'sisa' => $request->anggaran - $request->realisasi,
            // 'id_akun' => $request->akun,
            'id_rkakl' => $request->id_rkakl,
            'id_revisi' => $request->id_revisi,

            'id_kegiatan' => $request->kegiatan,
            'nama_kegiatan' => $request->rke,
            'id_kro' => $request->kro,
            'nama_kro' => $request->rkr,
            'biaya' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function storero(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = rab_ro::create([
            // 'anggaran' => $request->anggaran,
            // 'realisasi' => $request->realisasi,
            // 'sisa' => $request->anggaran - $request->realisasi,
            // 'id_akun' => $request->akun,
            'id_rkakl' => $request->id_rkakl,
            'id_rab_kekro' => $request->id_rab_kekro,
            'id_revisi' => $request->id_revisi,

            'id_ro' => $request->ro,
            'nama_ro' => $request->rro,

            'biaya' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroyro($id)
    {
        $data = rab_ro::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return 'success';
        }
    }
    public function storekom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = rab_komponen::create([
            // 'anggaran' => $request->anggaran,
            // 'realisasi' => $request->realisasi,
            // 'sisa' => $request->anggaran - $request->realisasi,
            // 'id_akun' => $request->akun,
            'id_rkakl' => $request->id_rkakl,
            'id_rab_ro' => $request->id_rab_ro,
            'id_revisi' => $request->id_revisi,

            'id_komponen' => $request->komponen,
            'nama_komponen' => $request->rkom,

            'biaya' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroykom($id)
    {
        $data = rab_komponen::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return 'success';
        }
    }
    public function storesubkom(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = rab_sub::create([
            'id_rkakl' => $request->id_rkakl,
            'id_rab_komponen' => $request->id_rab_kom,
            'id_revisi' => $request->id_revisi,

            'nama_sub' => $request->rnamakom,
            'kode_sub' => $request->rkodekom,
            'id_sub' => $request->subkomponen,
            'biaya' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroysubkom($id)
    {
        $data = rab_sub::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return 'success';
        }
    }
    public function storeakun(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_revisi' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        // return $request->all();
        $user = rab_akun::create([
            'id_rkakl' => $request->id_revisi,
            'unit' => 'Kantor Pusat',
            'nama_akun' => $request->nama_akun,
            'kode_akun' => $request->kode_akun,
            'id_akun' => $request->akun,
            'biaya' => 0,
            'sisa' => 0,
            'realisasi' => 0,
            'status_cabang' =>0,
        ]);
     
        if ($user) {
            return 'success';
        }
    }
    public function destroyakun($id)
    {
        $data = rab_akun::where('id', $id)->first();
        if ($data) {
            rab_detail::where('id_rab_akun', $id)->delete();
            $data->delete();
            return 'success';
        }
    }

    public function storedetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_revisi' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $md = detailAkun::where('id',$request->unit)->first();
        // return $request->all();
        $user = rab_detail::updateOrCreate([
            'id_rkakl' => $request->id_revisi,
            'id_rab_akun' => $request->id_rab_akun,
            'id_cabang' => $request->unit ?? null,
        ],
    [
        'nama_cabang' => $md->detail,

    ]);
        if ($user) {
            return 'success';
        }
    }
    public function updatedetail(Request $request)
    {
     
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        // return $request->all();
        $user = rab_detail::where('id', $request->id)->first();
   
        $selisih = $request->hiddentotal - $user->biaya ;
        $user->sisabiaya = $user->sisabiaya + $selisih;  
        $user->keterangan = $request->keterangan;
        $user->satuan = $request->satuan;
        $user->unit = $request->unit;
        $user->hargasatuan = $request->harga;
        $user->sisavolume = $request->kuantitas;
        $user->volume = $request->kuantitas;
        $user->biaya = $request->hiddentotal;
        $this->uprab($user,$selisih);
        // return 0;
        $user->save();
        if ($user) {
            return 'success';
        } else {
            return 'error';
        }
    }
    public function destroydetail($id)
    {
        $data = rab_detail::where('id', $id)->first();
        if ($data) {
            $data->delete();
            return 'success';
        }
    }
    public function storecabang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cabang' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        // return $request->all();

        $user = rab_detail_rinci::create([
            'keterangan' => $request->cabang,
            'id_revisi' => $request->id_revisi,
            'biaya' => 0,
            'id_rab_akun' => $request->id_rab_akun,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroycabang($id)
    {
        $data = rab_detail_rinci::where('id', $id)->first();
        if ($data) {
            rab_detail::where('id_cabang', $id)->delete();
            $data->delete();
            return 'success';
        }
    }
    public function uprab($id,$nilai)
    {
        
       $rabakun = rab_akun::where('id',$id->id_rab_akun)->first();
       $rabakun->biaya = $rabakun->biaya + $nilai;
       $rabakun->sisa = $rabakun->sisa + $nilai;
       $rabakun->save();

       $rabsub = rab_sub::where('id',$rabakun->id_rab_sub)->first();
       $rabsub->biaya = $rabsub->biaya + $nilai;
       $rabsub->save();

       $rabkomp = rab_komponen::where('id',$rabsub->id_rab_komponen)->first();
       $rabkomp->biaya = $rabkomp->biaya + $nilai;
       $rabkomp->save();

       $rabro = rab_ro::where('id',$rabkomp->id_rab_ro)->first();
       $rabro->biaya = $rabro->biaya + $nilai;
       $rabro->save();

       $rabkro = rab_kekro::where('id',$rabro->id_rab_kekro)->first();
       $rabkro->biaya = $rabkro->biaya + $nilai;
       $rabkro->save();

       $revisi = RiwayatRevisi::where('id',$rabkro->id_revisi)->first();
       $revisi->anggaran = $revisi->anggaran + $nilai;
       $revisi->save();
       return 'ok';
    }
}
