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
<table style="margin: 10px 0px">
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:15px;">RINCIAN PENDAPATAN BLU PERIODE 01 {{$bulan}} S.D. {{$ld}} {{$bulan}} 2023</td>
    </tr>
</table> 
<br>
<table id="customers">
    <tr>
        <td colspan="3"></td>
    </tr>
    @foreach ($datax as $i )
    <tr style="border: 1px solid black" >
        <td style="border: 1px solid black;font-weight:bold;text-align:center">{{$i->kode_akun}}</td>
        <td style="border: 1px solid black;font-weight:bold;text-align:left">{{$i->nama_akun}}</td>
        <td style="border: 1px solid black;font-weight:bold;text-align:center"></td>

    </tr>
    @php
        $tot = 0;
    @endphp
    @foreach ($i->mBku as $item)
    @php
        $tot += $item->nilai;
    @endphp
    <tr style="border: 1px solid black">
        <td> {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMM YYYY') }}</td>
        <td style="">{{$item->uraian}}</td>
        <td style="">@money($item->nilai,'IDR',true)</td>

    </tr>
    @endforeach
    <tr style="border: 1px solid black">
        <td></td>
        <td style="font-weight:bold;text-align:center">Jumlah</td>
        <td style="font-weight:bold;text-align:left">@money($tot,'IDR',true)</td>

    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
    @endforeach
 
</table>

@endsection