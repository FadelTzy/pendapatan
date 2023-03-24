<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pembayaran;
use Illuminate\Support\Facades\Validator;
use App\Imports\pembayaran as I;
use Maatwebsite\Excel\Facades\Excel;
class PembayaranController extends Controller
{
    public function index()
    {
        $data['page'] = 'Data Pembayaran';
        $data['judul'] = 'Penerimaan';
        
        return view('p.pembayaran', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'string', 'max:255'],
        ]);
        Excel::import(new I, request()->file('file'));

        if (1) {
            return 'success';
        }
    }
}
