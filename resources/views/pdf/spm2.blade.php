@extends('pdf.layouts2')
@section('css')
@endsection
@section('content')
    <br>
    <div style="text-align: center" style="padding: 5px;border-bottom: 0px solid black; line-height:0;" class="bordered">
        <h3 style="line-height: 10PX;    ">UNIVERSITAS NEGERI MAKASSAR </h3>
        <h1 class="judul" style="  line-height: 10PX;    "> SURAT PERINTAH MEMBAYAR </h1>
        <h3 style="  line-height: 10PX;    "> Tanggal: {{ $rs->proses }} Nomor :
            {{ $rs->nomorspp }}/UN.36/KU/{{ $rs->tahun }}</h3>

    </div>
    <div style="padding: 2px;border-bottom: 0px solid black; line-height:0;" class="bordered">
        <h1>Pejabat Keuangan Badan Layanan Umum Universitas Negeri Makassar</h1>

    </div>
    <div style="padding: 2px;border-bottom: 0px solid black; line-height:0;" class="bordered">
        @if ($rs->jenis == 2)
            <h1>Agar melakukan pembayaran sejumlah @money($dataup['nilai'], 'IDR', 'true')
            </h1>
        @else
            <h1>Agar melakukan pembayaran sejumlah @money($nilai, 'IDR', 'true')
            </h1>
        @endif


    </div>
    <div style="padding: 2px;border-bottom: 0px solid black; line-height:0;" class="bordered">
        @if ($rs->jenis == 2)
            <h1>*** {{ strtoupper(Terbilang($dataup['nilai'])) }} ***
            </h1>
        @else
            <h1>*** {{ strtoupper(Terbilang($nilai)) }} ***
            </h1>
        @endif

    </div>
    <div style="padding: 2px;border-bottom: 0px solid black; line-height:0;" class="bordered">

        <table class="tbtd" style="text-align:left; width: 100%">

            <tbody>
                <tr style="line-height:0;">
                    <td style="width: 40%"> Jenis SPM : 3 Langsung </td>
                    <td style="width: 30%"> Cara Bayar : 1 Giro Bank </td>
                    <td style="width: 30%;text-align:right"> Tahun Anggaran : {{ $rs->tahun }} </td>

                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 2px;border-bottom: 0px solid black;" class="bordered">

        <table class="tbtd" style="text-align:left; width: 100%">

            <tbody>
                <tr>
                    <td style="width: 40%"> Dasar Pembayaran </td>
                    <td style="width: 15%"> Satker </td>
                    <td style="width: 15%;text-align:left"> Kewenangan </td>
                    <td style="width: 30%;text-align:left"> Nama Satker </td>

                </tr>
                <tr style="vertical-align: top">
                    <td style="width: 40%">
                        @foreach ($dparr as $key => $item)
                            ({{ $key + 1 }})
                            {{ $item }} <br>
                        @endforeach
                    </td>
                    <td style="width: 15%"> 677523 </td>
                    <td style="width: 15%;text-align:left"> KD </td>
                    <td style="width: 30%;text-align:left"> {{ $set->satker }} </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="3">
                        <table class="" style="text-align:left; width: 100%">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="width: 50%"> Fungsi, Sub Fungsi, BA, Unit Es I, Program </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%">
                                        10,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        06,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        023,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 17,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; WA
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%"> Kegiatan, Output, Lokasi </td>
                                </tr>
                                <tr>
                                    @if ($untukup->jenis == 2)
                                        <td colspan="2" style="width: 50%"> 4471,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            000,&nbsp;&nbsp;&nbsp;&nbsp; 000
                                        </td>
                                    @else
                                        <td colspan="2" style="width: 50%"> 4471,&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            EAA,&nbsp;&nbsp;&nbsp;&nbsp; 19.51
                                        </td>
                                    @endif

                                </tr>
                                <tr>
                                    <td>Jenis Pembayaran</td>
                                    <td>: 1 Pengeluaran</td>
                                </tr>
                                <tr>
                                    <td>Sifat Pembayaran</td>
                                    <td>: 4 Pembayaran Langsung</td>
                                </tr>
                                <tr>
                                    <td>Sumber Dana/ Cara Penarikan</td>
                                    <td>: 04 PNBN/BLU</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="">
        <table style="text-align:left; width: 100%; border: 1px solid black">
            <tbody>
                <tr class="borderrow">
                    <td colspan="2" style="text-align:center;border: 0.5px solid black;width: 50%">PENGELUARAN</td>
                    <td colspan="2" style="text-align:center;border: 0.5px solid black;width: 50%">POTONGAN</td>
                </tr>
                <tr>
                    <td style="text-align:center;border: 0.5px solid black;">Jenis Belanja</td>
                    <td style="text-align:center;border: 0.5px solid black;">Jumlah Uang</td>
                    <td style="text-align:center;border: 0.5px solid black;">Akun Pajak</td>
                    <td style="text-align:center;border: 0.5px solid black;">Jumlah Uang</td>
                </tr>
                @php
                    $no = 0;
                @endphp

                @if ($untukup->jenis == 1)
            
                        @foreach ($arrayVal as $key => $item)
                            <tr>
                                <td style="text-align:right;">{{ $item[1] }} </td>
                                <td style="text-align:right;vertical-align: top;">@money($item[0], 'IDR', 'true')</td>
                            </tr>
                        @endforeach
                @else
                    <tr>

                        <td style="text-align:right;">{{ '000.000' . $dataup['akun'] }}</td>

                        <td style="text-align:right;vertical-align: top;">@money($dataup['nilai'], 'IDR', 'true')</td>
                        @if ($no == 0)
                            <td style="text-align:right;">
                            </td>
                            <td style="text-align:right;">
                            </td>
                        @else
                            <td></td>
                            <td></td>
                        @endif
                        @php
                            $no++;
                        @endphp
                    </tr>
                @endif

                @if ($untukup->jenis == 1)
                    <tr>
                        <td style="text-align:right;border: 0.5px solid black;">Jumlah Pengeluaran</td>
                        <td style="text-align:right;border: 0.5px solid black;">@money($nilai, 'IDR', 'true')</td>
                        <td style="text-align:right;border: 0.5px solid black;">Jumlah Potongan</td>
                        <td style="text-align:right;border: 0.5px solid black;">@money(0, 'IDR', 'true')</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;border: 0.5px solid black;">@money(0, 'IDR', 'true')</td>
                    </tr>
                @else
                    <tr>
                        <td style="text-align:right;border: 0.5px solid black;">Jumlah Pengeluaran</td>
                        <td style="text-align:right;border: 0.5px solid black;">@money($dataup['nilai'], 'IDR', 'true')</td>
                        <td style="text-align:right;border: 0.5px solid black;">Jumlah Potongan</td>
                        <td style="text-align:right;border: 0.5px solid black;">@money($pajak->jumlah, 'IDR', 'true')</td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;"></td>
                        <td style="text-align:right;border: 0.5px solid black;">@money($dataup['nilai'], 'IDR', 'true')</td>
                    </tr>
                @endif

            </tbody>
        </table>
        <br>

    </div>
    <table class="tbtd" style="text-align:left; width: 100%;">
        <tbody>
            <tr class="borderrow">
                <td style="width: 10%">Kepada</td>
                <td style="">: {{ $rm->sup->nama }}</td>
            </tr>
            <tr class="">
                <td style="">NPWP</td>
                <td style="">: {{ $rm->sup->npwp }}</td>
            </tr>
            <tr class="">
                <td style="">Rekening</td>
                <td style="">: {{ $rm->sup->no_rek }} ({{ $rm->sup->nama_rek }}) </td>
            </tr>
            <tr class="">
                <td style="">Bank / Pos</td>
                <td style="">: {{ $rm->sup->bank }} / {{ $rm->sup->kode_pos }} </td>
            </tr>
            <tr class="">
                <td style="">Uraian</td>
                <td style="line-height: normal">: {{ $rs->uraian }}</td>
            </tr>
        </tbody>
    </table>
    <table style="width: 100%;line-height:1" class="">
        <thead>
            <tr>
                <td style="width: 65%; border: 0px">

                </td>
                <td style="width:35%;border: 0px">
                    <p style="line-height: 5px">Makassar, {{ $rs->proses }} </p>
                    <p style="line-height: 5px">A.n Kuasa Pengguna Anggaran</p>
                    <p style="line-height: 5px">Pejabat Penanda Tangan SPM</p>
                    <br><br><br>
                    <p style="line-height: 5px"> {{ $set->penerbit }}</p>

                    <p style="line-height: 5px">NIP. {{ $set->nip }} </p>
                </td>
            </tr>
        </thead>
    </table>
@endsection
