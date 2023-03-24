<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Validator;
use App\Models\Setting;

class SettingController extends Controller
{
    public function store(Request $request)
    {

        $data = Setting::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'max:255'],
            'file' => ['mimes:jpeg,png,jpg|max:2000'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        if (request()->file('file')) {
            $path = '/gambar/logo/' . $data->logo;
            $bases =  $_SERVER['DOCUMENT_ROOT'];
            if ($data->logo != null) {
                if (file_exists($bases . '/' . $path)) {
                    unlink($bases . '/' . $path);
                    $data->logo = null;
                } else {
                    return "gagal hapus foto";
                }
            }

            $gmbr = request()->file('file');
            $nama_file = str_replace(' ', '_', time() . "_" . $gmbr->getClientOriginalName());
            $tujuan_upload = 'gambar/logo';
            $gmbr->move($tujuan_upload, $nama_file);

            $data->logo = $nama_file ?? null;
        }
        $data->nama_app = $request->versi;
        $data->nama_aplikasi = $request->nama;
        $data->desc = $request->deskripsi;
        $data->email = $request->email;
        $data->lembaga = $request->lembaga;
        $data->kode_lembaga = $request->kode_lembaga;
        $data->unit = $request->unit;
        $data->satker = $request->satker;
        $data->kode_satker = $request->kode_satker;
        $data->tempat = $request->tempat;
        $data->kode_tempat = $request->kode_tempat;
        $data->alamat = $request->alamat;
        $data->lokasi = $request->lokasi;
        $data->kode_lokasi = $request->kode_lokasi;
        $data->penerbit = $request->penerbit;
        $data->nip = $request->nippenerbit;
        $data->kp = $request->kp;
        $data->kppn = $request->kppn;
        $data->bendahara = $request->bendahara;
        $data->nipbendahara = $request->nipbendahara;
        $data->sp2d = $request->sp2d;
        $data->nipsp2d = $request->nipsp2d;
        $data->sp2d2 = $request->sp2d2;
        $data->nipsp2d2 = $request->nipsp2d2;
        $data->save();

        return 'success';
    }

    public function setting()
    {
        $data = Setting::first();
        if ($data == null) {
            Setting::create([
                'nama_app' => 'Aplikasi v1',
                'nama_aplikasi' => 'Web Aplikasi SPM',

            ]);
            $data = Setting::first();
        }
        return view('admin.cog', compact('data'));
    }
    public function destroy($id)
    {
        $data = Setting::findorfail($id);
        $path = 'gambar/ttd/'  . $data->ttd;
        $bases =  $_SERVER['DOCUMENT_ROOT'];
        if ($data->ttd != null) {
            if (file_exists($bases . '/' . $path)) {
                unlink($bases . '/' . $path);
            } else {
                return "Gagal menghapus gambar";
            }
        }
        $data->delete();
        return 'success';
    }
}
