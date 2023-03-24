@extends('pdf.layouts3')
@section('css')
    <style>
        * {
            font-size: 12px;
            font-family: sans-serif;
            box-sizing: border-box;

        }
        .tapares {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .tapares td,
        .tapares th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .tapares tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tapares tr:hover {
            background-color: #ddd;
        }

        .tapares th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ce8d0c;
            color: white;
        }
        
        /* bernando */
        .bernando {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        .bernando td,
        .bernando th {
            border: 0px solid #dddddd00;
            padding: 8px;
        }

        .bernando tr:nth-child(even) {
            background-color: #dddddd00;
        }

        .bernando tr:hover {
            background-color: #dddddd00;
        }

        .bernando th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #dddddd00;
            color: #dddddd00;
        }
    </style>
@endsection
@section('content')
<table id="" class="tapares">
    <tr>
        <td style="font-weight:bold;text-align:center" colspan="5">LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENERIMAAN   </td>
        <td style="font-weight:bold;text-align:center">TAHUN ANGGARAN</td>
    </tr> 
    <tr>
        <td style="font-weight:bold;text-align:center" colspan="5">PERIODE {{$bulan}} </td>
        <td style="font-weight:bold;text-align:center">{{$rkakl->tahun_anggaran}}</td>
    </tr> 
</table>
    <table>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="2">Kementerian/Lembaga </td>
        <td>: 023</td>
        <td colspan="3">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</td>
    </tr>
    <tr>
        <td colspan="2">Unit Organisasi 	</td>
        <td>: 17</td>
        <td colspan="3">DITJEN PENDIDIKAN TINGGI</td>
    </tr>
    <tr>
        <td colspan="2">Provinsi/Kab/Kota 	</td>
        <td>: 051</td>
        <td colspan="3">KOTA MAKASSAR        </td>
    </tr>
    <tr>
        <td colspan="2">Satuan Kerja 	</td>
        <td>: 677523</td>
        <td colspan="3">UNIVERSITAS NEGERI MAKASSAR</td>
    </tr>
    <tr>
        <td colspan="2">Alamat dan Telp 	</td>
        <td>: JL. AP. PETTARANI</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="2">Tahun Anggaran	</td>
        <td>: {{$rkakl->tahun_anggaran}}</td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td colspan="2">KPPN 	</td>
        <td>: 054</td>
        <td colspan="3">MAKASSAR 1</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td>I</td>
        <td colspan="4">Keadaan Pembukuan bulan pelaporan dengan saldo akhir pada BKU sebesar</td>
        <td>55</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="">dan Nomor Bukti Terakhir Nomor        </td>
        <td colspan="4">828</td>
    </tr>
</table>
    <table id="customers">
    <tr>
        <td style="font-weight:bold;text-align:center">No</td>
        <td style="font-weight:bold;text-align:center">Jenis Buku Pembantu</td>
        <td style="font-weight:bold;text-align:center">Saldo Awal</td>
        <td style="font-weight:bold;text-align:center">Penambahan</td>
        <td style="font-weight:bold;text-align:center">Pengurangan</td>
        <td style="font-weight:bold;text-align:center">Saldo Akhir</td>
    </tr>
    <tr>
        <td>(1)</td>
        <td>(2)</td>
        <td>(3)</td>
        <td>(4)</td>
        <td>(5)</td>
        <td>(6)</td>
    </tr>
    @php
    $n = ($saldoakhir->nilai ?? 0) + $pemasukan - $pengeluaran;
@endphp
    <tr>
        <td>A</td>
        <td>BP Kas</td>
        <td>{{$saldoakhir->nilai ?? 0}}</td>
        <td>{{$pemasukan}}</td>
        <td>{{$pengeluaran}}</td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td></td>
        <td>1. BP Kas ( Tunai dan Bank )</td>
        <td>{{$saldoakhir->nilai ?? 0}}</td>
        <td>{{$pemasukan}}</td>
        <td>{{$pengeluaran}}</td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td>B</td>
        <td>Buku Pembantu</td>
        <td>{{$saldoakhir->nilai ?? 0}}</td>
        <td>{{$pemasukan}}</td>
        <td>{{$pengeluaran}}</td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td></td>
        <td>1. Buku Pembantu PNBP</td>
        <td>{{$saldoakhir->nilai ?? 0}}</td>
        <td>{{$pemasukan}}</td>
        <td>{{$pengeluaran}}</td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td></td>
        <td>2. Buku Pembantu Lain-Lain</td>
        <td>{{0}}</td>
        <td>{{0}}</td>
        <td>{{0}}</td>
        <td>{{0}}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
</table>
    <table>
    <tr>
        <td>II</td>
        <td colspan="2">Keadaan Kas pada akhir bulan Pelaporan </td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2">1. Uang Tunai di Brankas</td>
        <td colspan="2"></td>
        <td>0</td>
    </tr>
   
    <tr>
        <td></td>
        <td colspan="2">2. Uang di Rekening Bank ( Terlampir Daftar Rincian Kas Di Rekening )</td>
        <td colspan="2"></td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2">3. Jumlah Kas</td>
        <td colspan="2"></td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td>III</td>
        <td colspan="2">Selisih Kas</td>
        <td colspan="3"></td>  
    </tr>
    <tr>
        <td></td>
        <td colspan="2">1. Saldo Akhir BP Kas I.A 1 Kolom (6)</td>
        <td colspan="2"></td>
        <td>{{$n}}</td>
    </tr>
   
    <tr>
        <td></td>
        <td colspan="2">2. Jumlah Kas (II.3)</td>
        <td colspan="2"></td>
        <td>{{$n}}</td>
    </tr>
    <tr>
        <td></td>
        <td colspan="2">3. Selisih Kas</td>
        <td colspan="2"></td>
        <td>0</td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td>IV</td>
        <td colspan="2">Penjelasan selisih kas dan/atau selisih pembukuan ( Apabila ada )</td>
        <td colspan="3"></td>  
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
</table>
    <table class="bernando">
    <tr>
        <td colspan="4"></td>
        <td style="text-align: right" colspan="2">Makassar, 31 Desember {{$rkakl->tahun_anggaran}}</td>

    </tr>
    <tr>
        <td colspan="2">Mengetahui,</td>
        <td colspan="2"></td>
        <td style="text-align: right" colspan="2">Bendahara Penerima</td>
    </tr>
    <tr>
        <td colspan="2">Kuasa Pengguna Anggaran</td>
        <td colspan="4"></td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
    <tr>
        <td colspan="6"></td>
    </tr>
</table>
    <table>
    <tr>
        <td colspan="2">{{$set->penerbit}}</td>
        <td colspan="2"></td>
        <td style="text-align: right" colspan="2">{{$set->bendahara}}</td>
    </tr>
    <tr>
        <td colspan="2">NIP. {{$set->nip}}</td>
        <td colspan="2"></td>
        <td style="text-align: right" colspan="2">NIP. {{$set->nipbendahara}}</td>
    </tr>
</table>


@endsection