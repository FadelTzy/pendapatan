<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
class UnitController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return Datatables::of(Unit::get())
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

        return view('admin.ms.unit');
    }
    public function update(Request $request)
    {
        $data = Unit::findorfail($request->id);
        $validator = Validator::make($request->all(), [
            'unit' => ['required', 'max:255'],
        ]);


        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }


        $data->unit = $request->unit;
        $data->kode = $request->kode;
        $data->save();

        return 'success';
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'unit' => ['required', 'string', 'max:255'],


        ]);
        if ($validator->fails()) {
            $data = ['status' => 'error', 'data' => $validator->errors()];
            return $data;
        }

        $user = Unit::create([
            'unit' => $request->unit,
            'kode' => $request->kode


        ]);
        if ($user) {
            return 'success';
        }
    }
    public function destroy($id)
    {
        $user = Unit::where('id',$id)->delete();
        
            return 'success';
        
    }
}
