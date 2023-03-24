
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
<table>
    <tr>
        <th style="font-size: 15px;font-weight:bold;text-align:center" colspan="6">UNIVERSITAS NEGERI MAKASSAR</th>
    </tr>
    <tr>
        <th style="font-size: 13px;font-weight:bold;text-align:center" colspan="6">BUKU KAS UMUM</th>
    </tr>
    <tr>
        <th style="font-size: 10px;font-weight:bold;text-align:center" colspan="6">PERIODE : 01 {{ $date }} {{$rkakl->tahun_anggaran}} - {{ $date }} {{$rkakl->tahun_anggaran}} </th>
    </tr>
    <tr>
        <td colspan="6">
            <hr>
        </td>
    </tr>
    <tr>
        <td>Kementerian/Lembaga</td>
        <td></td>
        <td>: Kementerian Pendidikan dan Kebudayaan</td>
        <td>( 023 )</td>
    </tr>
    <tr>
        <td>Unit Organisasi</td>
        <td></td>
        <td>: Direktorat Jenderal Pendidikan Tinggi</td>
        <td>( 17 )</td>
    </tr>
    <tr>
        <td>Propinsi/Kab/Kota</td>
        <td></td>
        <td>: Makassar, Sulawesi Selatan</td>
        <td>( 51 )</td>
    </tr>
    <tr>
        <td>Satuan Kerja</td>
        <td></td>
        <td>: Universitas Negeri Makassar</td>
        <td>( 677523 ) </td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
</table>

    <table id="customers">

    <tr style="background-color: gray">
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:11%" rowspan="2">Tanggal</th>
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:6%" rowspan="2">No Ref</th>
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:51%" rowspan="2">Uraian </th>
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:11%" rowspan="2">Penerimaan</th>
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:11%" rowspan="2">Pengeluaran</th>
        <th style="text-align:center;  font-weight: bold;vertical-align:center;width:11%" rowspan="2">Jumlah</th>


    </tr>
    <tr>

    </tr>

    @php
        $total = 0;
        $pemasukan = 0;
        $pengeluaran = 0;
        $islast = 0;
        $awal = 0;
    @endphp
    <tr style="border: 1px solid black">
        <td style="width: 12%" > {{ \Carbon\Carbon::parse($rkakl->tahun_anggaran.'-'.$datee.'-01')->isoFormat('DD MMM YYYY') }}</td>
        <td class="text-center"></td>
        <td>Kas Awal</td>
        <td>
            @if ($rekapawal)
                @money($rekapawal->nilai, 'IDR', true)
                @php
                    $total += $rekapawal->nilai;
                    $pemasukan += $rekapawal->nilai;

                @endphp
            @else
                @money(0, 'IDR', true)
                @php
                    $total += 0;
                @endphp
            @endif
        </td>
        <td>

        </td>
        <td>
            @if ($rekapawal)
                @money($rekapawal->nilai, 'IDR', true)
            @else
                @money(0, 'IDR', true)
            @endif
        </td>
    </tr>



    @foreach ($data as $item)
        @if ($loop->last)
            @php
                $islast = 1;
            @endphp
        @endif
        <tr style="border: 1px solid black">
            <td> {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMM YYYY') }} </td>
            <td style="text-align: center">{{ $item->no_bukti }}</td>
            <td>{{ $item->uraian }}</td>
            <td>
                @if ($item->status == 1)
                    @php
                        $total += $item->nilai;
                        $pemasukan += $item->nilai;

                    @endphp
                    @money($item->nilai, 'idr', true)
                @endif
            </td>
            <td>
                @if ($item->status == 2)
                    @php
                        $total -= $item->nilai;
                        $pengeluaran += $item->nilai;

                    @endphp
                    @money($item->nilai, 'idr', true)
                @endif
            </td>
            <td>
                @money($total, 'IDR', true)
            </td>

        </tr>
    @endforeach
    <tr style="background-color: rgb(139, 140, 141)">
        <td colspan="3" style="background-color: rgb(139, 140, 141);text-align: center;font-weight:bold">Jumlah</td>
        <td style="background-color: rgb(139, 140, 141);font-weight:bold">@money($pemasukan,'IDR',true)</td>
        <td style="background-color: rgb(139, 140, 141);font-weight:bold">@money($pengeluaran,'IDR',true)</td>
        <td style="background-color: rgb(139, 140, 141);font-weight:bold">@money($pemasukan - $pengeluaran,'IDR',true)</td>

    </tr>
</table>
        <table>
    <tr>
        <td style="width: 70%"></td>
        <td></td>

       

    </tr>
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td ></td>
        <td>Makassar, {{$last}} {{ $date }}  {{$rkakl->tahun_anggaran}}</td>
    </tr>
    <tr>
        <td ></td>
        <td>Bendahara Penerima,    </td>
    </tr>
    <br>
    <br>
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td colspan="2"></td>
    </tr>
    <tr>
        <td></td>
        <td>{{$set->bendahara}}
        </td>
    </tr>
    <tr>
        <td></td>
        <td>NIP.{{$set->nipbendahara}}</td>
    </tr>
</table>
@endsection