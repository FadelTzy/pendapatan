@extends('pdf.layouts3')
@section('css')
    <style>
        * {
            font-size: 12px;
            font-family: sans-serif;
            box-sizing: border-box;

        }
    </style>
@endsection
@section('content')
<table style="margin: 15px 0px">
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:12px">{{ $datax->nama_akun }}
            ({{ $datax->kode_akun }})</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:12px">Bulan {{ $bulan }}
            {{$rka->tahun_anggaran}}</td>
    </tr>
</table>
<table id="customers">
    <tr>
        <td colspan="3"></td>
    </tr>
    <tr>
        <th style="font-weight:bold;text-align:center;">Tanggal</th>
        <th style="font-weight:bold;text-align:center;">Uraian</th>
        <th style="font-weight:bold;text-align:center;">Jumlah</td>

    </tr>
    @php
        $tot = 0;
    @endphp
    @foreach ($datax->mBku as $i)
        @php
            $tot += $i->nilai;
        @endphp
        <tr>
            <td style="text-align:center">  {{ \Carbon\Carbon::parse($i->tanggal)->isoFormat('DD MMM YYYY') }}</td>
            <td style="text-align:left">{{ $i->uraian }}</td>
            <td style="text-align:left">@money($i->nilai, 'IDR', true)</td>
        </tr>


    @endforeach
    
    <tr>
        <td></td>
        <td style="font-weight:bold;text-align:center">Jumlah</td>
        <td style="font-weight:bold;text-align:left">@money($tot, 'IDR', true)</td>

    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
</table>


@endsection