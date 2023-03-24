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
    <br>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="text-align:center;border: 0.5px solid black;width: 50%;margin:0;padding:0">
                        <span class="judul" style="font-weight: bold">KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br> UNIVERSITAS
                            NEGERI
                            MAKASSAR</span>
                    </td>
                    <td rowspan="2"
                        style="height:10px;text-align:center;vertical-align: top;border: 0.5px solid black;width: 50%;">
                        <p style="font-weight: bold;">LAMPIRAN PAJAK</p>
                        <table class="tbtr2" style="text-align:left; width: 100%">
                            <tbody>

                                <tr>
                                    <td>Dari</td>
                                    <td>: {{ $set->satker }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{ $rs->proses }}</td>
                                </tr>
                                <tr>
                                    <td>Nomor</td>
                                    <td>: @php
                                        echo explode('.', $rs->nomorspp)[2];
                                    @endphp </td>
                                </tr>
                                <tr>
                                    <td>Tahun Anggaran</td>
                                    <td>: {{ $rs->tahun }}</td>
                                </tr>
                                <tr>
                                    <td>Kepada Yth</td>
                                    <td>: Bank Negera Indonesia 1946 KCP. UNM</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="text-align:center;border: 0.5px solid black;">
                        <table class="tbtr2" style="text-align:left; width: 100%">
                            <tbody>

                                <tr>
                                    <td>NO. SPM</td>
                                    <td>: @php
                                        echo explode('.', $rs->nomorspp)[2] . 'P';
                                        
                                    @endphp </td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{ $rs->proses }}</td>
                                </tr>
                                <tr>
                                    <td>Unit Kerja / Fakultas</td>
                                    <td>: {{ $set->satker }}</td>
                                </tr>
                                <tr>
                                    <td>Kode UK</td>
                                    <td>: A</td>
                                </tr>

                            </tbody>
                        </table>
                    </td>
                </tr>



            </tbody>
        </table>
        <br>

    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table class="" style="text-align:left; width: 50%">
            <tbody>
                    <tr>
                        <td style="line-height: 5px">Klasifikasi Belanja : 41 
                        @php
                            // echo substr($pajak->oPajak->kode, 0, 2);
                        @endphp  (PAJAK) </td>
                    </tr>



            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        <table style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow">
                    <td style="">Bank / Pos &nbsp;&nbsp;&nbsp; : BANK NEGARA INDONESIA 1946 KCP. UNM</td>
                </tr>

                <tr class="borderrow">
                    <td style="">Hendaklah mencairkan/memindahbukukan dari Bank Rekening Nomor  5405409778
                        {{-- {{ $rm->sup->no_rek }} --}}
                        sesuai dengan</td>
                </tr>
                <tr class="borderrow">
                    @if ($rs->isremun == 1)
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($pajak as $item)
                        @php
                            $total += $item->jumlah;
                        @endphp
                    @endforeach
                        <td style=""> <span class="bordered"> 1 </span> Giro Bank &nbsp; &nbsp; &nbsp; &nbsp; <span class="bordered" style="font-weight: bold"> @money($total, 'IDR', 'true') </span></td>
                    @else
                        <td style=""> <span class="bordered"> 1 </span> Giro Bank &nbsp; &nbsp; &nbsp; &nbsp; <span class="bordered" style="font-weight: bold"> @money($pajak->jumlah, 'IDR', 'true') </span></td>
                    @endif
                </tr>
                <br>
            </tbody>
        </table>

    </div>

    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        @if ($rs->isremun == 1)
        <h1>*** {{ strtoupper(Terbilang($total)) }} RUPIAH ***
        </h1>
        @else
        <h1>*** {{ strtoupper(Terbilang($pajak->jumlah)) }} RUPIAH ***
        </h1>
        @endif
  
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">

    </div>

    <div style="padding: 5px;" class="bordered">

        <table class="tbtr2" style="text-align:left; width: 100%">
            <tbody>

                <tr>
                    <td style="width: 15%">Nama Wajib Pajak </td>
                    <td>: {{ $rm->sup->nama }}</td>
                </tr>
                <tr>
                    <td>NPWP</td>
                    <td>: {{ $rm->sup->npwp }}</td>
                </tr>
                <tr>
                    <td>Yaitu</td>
                    <td>: Sesuai SPM No. {{ explode('.', $rs->nomorspp)[2];  }}/UN.36/KU/{{$rs->tahun}}</td>
                </tr>
          
                <tr>
                    <td>Uraian</td>
                    <td>: {{ $rs->uraian }}</td>
                </tr>
            </tbody>
        </table>
        <br><br>
        <table style="width: 100%;line-height:1" class="">
            <thead>
                <tr>
                    <td style="width: 65%; border: 0px">

                        <p style="line-height:3px">.</p>
                        <p style="line-height:3px">Bendahara Pengeluaran</p>
                        <br><br><br>
                        <p style="line-height:3px">{{ $set->bendahara }} </p>

                        <p style="line-height:3px">NIP. {{ $set->nipbendahara }} </p>
                    </td>
                    <td style="width:35%;border: 0px">
                        <p style="line-height:3px">Kota Makassar, {{ $rs->proses }} </p>
                        <p style="line-height:3px">Kabag Keuangan UNM, Pelaku SSP2D</p>
                        <p style="line-height:3px">{{ $set->satker }}</p>
                        <br><br><br>
                        <p style="line-height:3px"> {{ $set->sp2d }}</p>

                        <p style="line-height:3px">NIP. {{ $set->nipsp2d }} </p>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
@endsection
