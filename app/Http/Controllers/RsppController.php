<?php

namespace App\Http\Controllers;

use App\Models\pajakSpp;
use App\Models\rab_akun;
use App\Models\rsppd;
use Illuminate\Http\Request;
use App\Models\rab_detail;
use App\Models\RiwayatSpp;
use App\Models\rspp;
use Illuminate\Support\Facades\Validator;

class RsppController extends Controller
{
    // public function pajakrspp(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'idrsppd' => ['required', 'max:255'],
    //         'ppn' => ['required', 'max:255'],

    //     ]);


    //     if ($validator->fails()) {
    //         $data = ['status' => 'error', 'data' => $validator->errors()];
    //         return $data;
    //     }
    //     $jumlah = $request->ppn * 0.01 * (int)$request->totalrsppd;
    //    $Cek = pajakSpp::updateOrCreate(
    //     [
            
    //         'id_riwayat_spp' => $request->idspp,
    //         'id_rsppd' => $request->idrsppd
    //     ],
    //     [
    //         'id_pajak' => $request->pajak,
    //         'persen' => $request->ppn,
    //         'jumlah' => $jumlah,
    //         'total' => $request->totalrsppd,
    //     ]);
    //     if ($Cek) {
    //         return ['status' => 'success'];
    //     }
    //     return ['status' =>'error'];
    //     // return $request->all();
    // }
    public function pajakrspp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idspp' => ['required', 'max:255'],
            'nilai' => ['required', 'max:255'],

        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
       $Cek = pajakSpp::create(

        [
            'id_riwayat_spp' => $request->idspp,
            'id_pajak' => $request->pajak,
            'jumlah' => $request->nilai,
        ]);
        if ($Cek) {
            return ['status' => 'success'];
        }
        return ['status' =>'error'];
        // return $request->all();
    }
    public function pajakrsppu(Request $request)
    {
        // return $request->all();
        $validator = Validator::make($request->all(), [
            'idspp' => ['required', 'max:255'],
            'nilai' => ['required', 'max:255'],

        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $cek = pajakSpp::where('id',$request->id)->first();
 
          $cek->id_riwayat_spp = $request->idspp;
          $cek->id_pajak = $request->pajak;
          $cek->jumlah = $request->nilai;
          $cek->save();
  
        if ($cek) {
            return ['status' => 'success'];
        }
        return ['status' =>'error'];
        // return $request->all();
    }
    public function postisremun(Request $request)
    {
        // return $request->all();
       $rp = RiwayatSpp::where('id',$request->id)->first();
       $rp->isremun = $request->dp;
       $rp->save();
       if ($rp) {
        return ['status' =>' success'];
       }else{
        return ['status' =>' error'];
       }
    }
    public function getrsppd(Request $request)
    {
      return  rsppd::with('oPajak')->where('id',$request->id)->first();
    }
    public function deletersppd(Request $request)
    {
        
        $data = rsppd::where('id',$request->id)->first();
        $id_rsppd = $data->id_rab_detail;
        if ($data->status == 1) {
            $rabd = rab_detail::where('id', $id_rsppd)->first();
            // return $rabd;
            $rabd->realisasi = $rabd->realisasi - $data->sppini;
            $rabd->sisabiaya = $rabd->sisabiaya + $data->sppini;
            $rabd->save();
        }
        $rspp = rspp::where('id',$data->id_rspp)->first();
        $rspp->sppini = $rspp->sppini - $data->sppini;
        if ($rspp->sppini == 0) {
            $rspp->delete();
        }else{
            $rspp->save();
        }
        $data->delete();

        return ['status' => 'success'];
        // return $request->all();
    }
}