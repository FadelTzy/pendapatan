<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    public function index1()
    {
        $data['page'] = 'SPM V2';
        return view('welcome1', $data);
    }
    public function userindex()
    {
        if (request()->ajax()) {
            return Datatables::of(User::get())
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
                ->addColumn('tanggalnya', function ($data) {

                    $btn = $data->created_at->format('m/D/Y');
                    return $btn;
                })
                ->addColumn('permisinya', function ($data) {

                    $btn = '';
                    if ($data->spp) {
                        $btn .= '<span class="badge bg-primary">Cetak SPP </span><br>';
                    }
                    if ($data->spm) {
                        $btn .= '<span class="badge bg-primary">Cetak SPM </span><br>';
                    }
                    if ($data->sp2d) {
                        $btn .= '<span class="badge bg-primary">Cetak SP2D </span><br>';
                    }
                    if ($data->pajak) {
                        $btn .= '<span class="badge bg-primary">Cetak Pajak </span><br>';
                    }
                    return $btn;
                })
                ->rawColumns(['aksi','permisinya'])
                ->make(true);
        }

        return view('admin.ms.users');
    }
    public function userstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'max:255'],

        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
    
        $user = User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'spp' => $request->spp,
            'spm' => $request->spm,
            'sp2d' => $request->sp2d,
            'pajak' => $request->pajak,
            'password' => Hash::make($request->password),

        ]);
        if ($user) {
            return 'success';
        }
    }
    public function userupdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'id' => ['required', 'string', 'max:255'],


        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }
        $user = User::where('id',$request->id)->first();
         $user->name = $request->nama;
         $user->username = $request->username;
         $user->email = $request->email;
         $user->spp = $request->spp;
         $user->spm = $request->spm;
         $user->sp2d = $request->sp2d;
         $user->pajak = $request->pajak;
         if ($request->password) {
            # code...
            $user->password = Hash::make($request->password);
         }

        if ($user) {
            $user->save();
            return 'success';
        }
    }
    public function userdestroy($id)
    {
        $data = User::findorfail($id);
        if ($data == null) {
            return 'fail';
        }
        $data->delete();
        return 'success';
    }
}
