<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rab;
use Illuminate\Support\Facades\Validator;
use App\Models\jenisAkunRkakl;
use App\Models\rab_akun;
use App\Models\rab_detail;
use App\Models\rspp;
use App\Models\rsppd;
class RabController extends Controller
{
    public function postrab(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'pengeluaran' => ['required', 'string', 'max:255'],
            'iddetail' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $kro = rab_akun::with('oRabsub.oKom.oRo.oKros')
            ->where('id', $request->idakun)
            ->first();
            // return [$kro, $request->pengeluaran];

        // return $kro;
        $lalu = rspp::where('id_rab_akun', $request->idakun)
            ->latest()
            ->first();
        $lalud = rsppd::where('id_rab_akun',$request->idakun)->where('id_rab_detail',$request->iddetail)->latest()
        ->first();
        if ($lalud) {
            $spplalud = $lalu->spplalu;
            $sppinid = $lalu->sppini;
        } else {
            $spplalud = 0;
            $sppinid = 0;
        }
        if ($lalu) {
            $spplalu = $lalu->spplalu;
            $sppini = $lalu->sppini;
        } else {
            $spplalu = 0;
            $sppini = 0;
        }
        // $kro->sisa = $kro->sisa - $request->pengeluaran;
        // $kro->realisasi = $kro->realisasi + $request->pengeluaran;
      $datarspp =  rspp::where('id_rab_akun',$request->idakun)->where('id_riwayat_spp',$request->id_riwayatspp)->where('id_kro',$kro->oRabsub->oKom->oRo->oKros->id)->first();
      if ($datarspp) {
            $datarspp->sppini = $datarspp->sppini + $request->pengeluaran;
            $datarspp->sisadana = $datarspp->sisadana - $request->pengeluaran;
            $datarspp->save();
      }else{
         $datarspp = rspp::create([
            'id_rab_akun' => $request->idakun,
            'id_kro' => $kro->oRabsub->oKom->oRo->oKros->id,
            'id_riwayat_spp' => $request->id_riwayatspp,
            'pagu' => $request->totalpagud,
            'sppini' => $request->pengeluaran,
            'spplalu' => $spplalu + $sppini,
            'sisadana' => $request->totalpagud - ($request->pengeluaran + $spplalu + $sppini),
            'status' => 0,
        ]);
        
      }
      
        // $rd = rab_detail::where('id', $request->iddetail)->first();
        // $rd->sisabiaya = $rd->sisabiaya - $request->pengeluaran;
        // $rd->realisasi = $rd->realisasi + $request->pengeluaran;
        // $rd->save();
       $rsppd = rsppd::create([
            'id_rspp' => $datarspp->id,
            'id_rab_detail' => $request->iddetail,
            'id_rab_akun' => $request->idakun,
            'id_kro' => $kro->oRabsub->oKom->oRo->oKros->id,
            'id_riwayat_spp' => $request->id_riwayatspp,
            'pagu' => $request->hanggaran,
            'sppini' => $request->pengeluaran,
            'spplalu' => $sppinid + $spplalud,
            'status' => 0,
            // 'spplalu' => $spplalu + $sppini,
            // 'sisadana' => $rd->sisabiaya,
        ]);
        // $user = CaraBayar::create([
        //     'nama' => $request->nama,
        //     'desc' => $request->desc,
        // ]);
        if ($rsppd) {
            return 'success';
        }
    }
    public function storejenisakun(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rab' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];

            return $data;
        }
        $user = jenisAkunRkakl::create([
            'anggaran' => $request->anggaran,
            'realisasi' => $request->realisasi,
            'sisa' => $request->anggaran - $request->realisasi,
            'id_akun' => $request->akun,
            'id_rab' => $request->id_rab,
            // 'status' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_rkakl' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = rab::create([
            // 'anggaran' => $request->anggaran,
            // 'realisasi' => $request->realisasi,
            // 'sisa' => $request->anggaran - $request->realisasi,
            // 'id_akun' => $request->akun,
            'id_rkakl' => $request->id_rkakl,
            'id_kegiatan' => $request->kegiatan,
            'id_kro' => $request->kro,
            'ro' => $request->ro,
            'komponen' => $request->komponen,
            'sub_komponen' => $request->subkomponen,
            'tanggal' => Date('Y/m/d'),
            'status' => 0,
        ]);
        if ($user) {
            return 'success';
        }
    }
    public function update(Request $request)
    {
        $data = rab::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'tanggal' => ['required', 'max:255'],
        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $data->anggaran = $request->anggaran;
        $data->realisasi = $request->realisasi;
        $data->sisa = $request->anggaran - $request->realisasi;
        $data->id_akun = $request->akun;
        $data->id_kegiatan = $request->kegiatan;
        $data->id_kro = $request->kro;
        $data->ro = $request->ro;
        $data->komponen = $request->komponen;
        $data->sub_komponen = $request->subkomponen;
        $data->tanggal = $request->tanggal;
        $data->status = 0;
        $data->keterangan = $request->keterangan;
        $data->updated_at = date('Y-m-d G:i:s');

        $data->save();

        return 'success';
    }
    public function destroy($id)
    {
        $data = rab::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
