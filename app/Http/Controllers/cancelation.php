<?php

namespace App\Http\Controllers;

use App\Models\RiwayatMaster;
use Illuminate\Http\Request;
class cancelation extends Controller
{
    public function cancel(Request $request)
    {
        // return $request->all();
        $rm = RiwayatMaster::where('id_riwayat_spp',$request->id)->first();
        $dpa = json_decode($rm->dasar_pembayaran);
        $new = array_diff($dpa,array($request->dp));
        // array_push($dpa,4);
        // unset()
        $encode = json_encode($new);
        $rm->dasar_pembayaran = $encode;
        $rm->save();
        return ['status' => 'success'];
        // return $encode;
    }
    public function add(Request $request)
    {
        $rm = RiwayatMaster::where('id_riwayat_spp',$request->id)->first();
        // return $rm;
        $dpa = json_decode($rm->dasar_pembayaran ?? '[]');
        array_push($dpa,$request->dp);
        // array_push($dpa,4);
        // unset()
        // return $dpa;
        $rm->dasar_pembayaran = $dpa;
        $rm->save();
        return ['status' => 'success'];
    }
}
