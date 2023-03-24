@extends('pdf.layouts')
@section('css')
    <style>
           .inicok {
        font-size:1px !important;
      }
      *{
        font-size: 10px
      }
   
    </style>
@endsection
@section('content')
    <h1 class="judul" style="text-align: center;">SURAT PERMINTAAN PEMBAYARAN</h1>
    <table class="center-table border-table tbtr2" style="text-align:left; width: 60%">
        <tbody>
            <tr>
                <td style="width: 35%"> Tanggal : {{ $rs->proses }}</td>
                <td style="width: 20%">Nomor  : {{ $rs->nomorspp }}</td>
            </tr>
            <tr>
                <td>Sifat Pembayaran : {{ $rm->sifat_pembayaran }}</td>
            </tr>
            <tr>
                <td>Jenis Pembayaran : {{ $rm->jenis_pembayaran }}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <div style="border-bottom: 0px solid black; margin:0px; padding:0px" class="bordered">
        <div style="font-size:10px !important" class="row" >
            <div class="column">
                <table class="" style="text-align:left; width: 100%;padding:0px">
                    <tbody style=" padding:0px">
                        <tr style="">
                            <td style="width: 23%;"> 1. Lembaga</td>
                            <td> : {{ $set->lembaga }} ({{ $set->kode_lembaga }})</td>

                        </tr>
                        <tr>
                            <td>2. Unit Organisasi</td>
                            <td> : {{ $set->unit }}</td>
                        </tr>
                        <tr>
                            <td>3. Kantor/Satker</td>
                            <td> : {{ $set->satker }} ({{ $set->kode_satker }})</td>
                        </tr>
                        <tr>
                            <td>4. Lokasi</td>
                            <td> : {{ $set->lokasi }} ({{ $set->kode_lokasi }})</td>
                        </tr>
                        <tr>
                            <td>5. Tempat</td>
                            <td> : {{ $set->tempat }} ({{ $set->kode_tempat }})</td>
                        </tr>
                        <tr>
                            <td>6. Alamat</td>
                            <td> : {{ $set->alamat }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="column2">
                <table class="" style="text-align:left; width: 100%">
                    <tbody>
                        <tr>
                            <td style="width: 30%"> 7. Kegiatan :
                                @php
                                    $kodek = explode(' - ', $rs->revisi->nama_kegiatan);
                                    echo $kodek[1];
                                @endphp</td>
                       

                        </tr>
                        <tr>
                            <td>8. Kode Kegiatan :
                                {{ $kodek[0] }}</td>
                           
                        </tr>
                        <tr>
                            <td>9. Kode Fungsi, S Fungsi, Program : 00.00.00  </td>
                        </tr>
                        <tr>
                            <td>10. Kewenangan Pelaksanaan : {{ $rm->kp }} </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div style="padding: 4px;border-bottom: 0px solid black;" class="bordered">
        <p style="line-height: 1px">Kepada:</p>
        <p style="line-height: 5px">Yth. Pejabat Penanda Tangan Surat Perintah</p>
        <p style="line-height: 5px">Membayar {{ $rm->satker }}</p>
        <P style="line-height: 5px">di {{ $rm->tempat }}</P>
        <p>Berdasarkan DIPA Nomor : {{ $rs->no_dipa }}, {{ $rs->tanggal_dipa }}, bersama ini kami ajukan permintaan
            pembayaran sebagai berikut :</p>
        <table class="" style="text-align:left; width: 100%">
            @php $total = 0; @endphp
            @foreach ($rsp as $item)
                @php $total += $item->sppini @endphp
            @endforeach
            <tbody class="tbtr">
                <tr>
                    <td style="width: 25%"> 1. Jumlah pembayaran yang diminta</td>
                    <td style="width: 1%"> :
                     
                    </td>
                    <td>
                        @if ($rs->jenis == 2)
                        @money($rs->oUp->nilai, 'IDR', 'true')

                        @else
                        @money($total, 'IDR', 'true')

                        @endif
                    </td>

                </tr>
                <tr>
                    <td>.</td>
                    <td>:</td>
                    @if ($rs->jenis == 2)
                    <td> ({{ ucfirst(Terbilang($rs->oUp->nilai)) }})</td>

                    @else
                    <td> ({{ ucfirst(Terbilang($total)) }})</td>
                    @endif
                </tr>
                <tr>
                    <td style="vertical-align:top">2. Keperluan</td>
                    <td style="vertical-align:top">:</td>
                    <td style="line-height: 13px;vertical-align:top;text-align:justify"> {{ $rs->uraian }}</td>
                </tr>
                <tr>
                    <td>3. Jenis Belanja</td>
                    <td>:</td>
                    <td> Belanja Barang</td>
                </tr>
                <tr>
                    <td>4. Atas Nama</td>
                    <td>:</td>
                    <td>  {{ $rm->sup->nama }}</td>
                </tr>
                <tr>
                    <td>5. Alamat</td>
                    <td>:</td>
                    <td>  {{ $rm->sup->alamat }}</td>
                </tr>
                <tr>
                    <td>6. Mempunyai Rekening</td>
                    <td>:</td>
                    <td>  Nomor Rekening : {{ $rm->sup->no_rek }} , NPWP : {{ $rm->sup->npwp }}
                    </td>
                </tr>
          
                <tr>
                    <td>7. Nomor dan Tanggal SPK Kontrak</td>
                    <td> :
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>8. Nilai SPK Kontrak</td>
                    <td>:</td>
                    <td>  @money(0, 'IDR', 'true')
                    </td>
                </tr>
                <tr>
                    <td>9. Dengan Penjelasan</td>
                    <td>:</td>
                    <td> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div style="padding: 5px;border-bottom: 0px solid black;" class="bordered">
        @if ($rs->jenis == 2)
        <table class="tbfont" style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow" style="">
                    <td  style="width: 1%; border:0.5px solid black">No</td>
                    <td  style="width: 38%; border:0.5px solid black;padding: 0px 2px">
                        <p style="font-size:8px !important;">I KEGIATAN/OUTPUT/MAK (AKUN 6 DIGIT) BERSANGKUTAN</p>
                        <p style="font-size:8px !important;">II SEMUA KODE KEGIATAN DALAM DIPA</p>
                    </td>
                    <td  style="border: 0.5px solid black;width: 17%">PAGU DALAM DIPA/SAKPA (RP)</td>
                    <td  style="border: 0.5px solid black;width: 15%">SPP/SPM S.D YANG LALU (RP)</td>
                    <td  style="border: 0.5px solid black;width: 15%">SPP INI (RP)</td>
                    <td  style="border: 0.5px solid black;width: 15%">JUMLAH S.D SPP INI (RP)</td>
                    <td  style="border: 0.5px solid black;width: 17%">SISA DANA (RP)</td>
                </tr>

                <tr>
                    <td style="border: 0.5px solid black;">I</td>
                    <td style="border: 0.5px solid black;line-height:1px">
                        {{$rs->oUp->akun}}
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @money($rs->oUp->nilaiterakhir, 'IDR', 'true')

                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totallalu = 0 @endphp

                        @money($totallalu, 'IDR', 'true')

                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalini = $rs->oUp->nilai @endphp

                        @money($totalini, 'IDR', 'true')
                      
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalsd =  $rs->oUp->nilai + $totallalu @endphp

                        @money($totalsd, 'IDR', 'true')

                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalsisa = $rs->oUp->nilaiterakhir - $totalsd @endphp
                        @money($totalsisa, 'IDR', 'true')

                    </td>

                </tr>
                <tr style="background-color: rgb(255, 225, 0)">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;">Jumlah 1</td>
                    <td style="border: 0.5px solid rgb(0, 0, 0);text-align:right;"> @money($rs->oUp->nilaiterakhir, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totallalu, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalini, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalsd, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;"> @money($totalsisa, 'IDR', 'true') </td>

                </tr>
          

                <tr style="">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;" colspan="6">UANG PERSEDIAAN</td>
                </tr>
                <tr style="">
                    <td></td>
                    <td>Lampiran .... Lembar</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td>Surat Buku</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td colspan="2" style="text-align:center">STS .... Lembar</td>

                </tr>
                <tr style="">
                    <td></td>
                    <td style="text-align:right">Pendukung ... Lembar</td>
                    <td></td>
                    <td colspan="2">Pengeluaran ... Lembar</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @else
        <table class="tbfont" style="text-align:left; width: 100%;">
            <tbody>
                <tr class="borderrow" style="">
                    <td style="width: 1%; border:0.5px solid black">No</td>
                    <td style="width: 38%; border:0.5px solid black;padding: 0px 0px 0px 2px">
                        <p style="font-size: 8px">I KEGIATAN/OUTPUT/MAK (AKUN 6 DIGIT) BERSANGKUTAN</p>
                        <p style="font-size: 9px">II SEMUA KODE KEGIATAN DALAM DIPA</p>
                    </td>
                    <td style="border: 0.5px solid black;width: 17%;font-size: 9px">PAGU DALAM DIPA/SAKPA (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%;font-size: 9px">SPP/SPM S.D YANG LALU (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%;font-size: 9px">SPP INI (RP)</td>
                    <td style="border: 0.5px solid black;width: 15%;font-size: 9px">JUMLAH S.D SPP INI (RP)</td>
                    <td style="border: 0.5px solid black;width: 17%;font-size: 9px">SISA DANA (RP)</td>
                </tr>

                <tr>
                    <td style="border: 0.5px solid black;">I</td>
                    <td style="border: 0.5px solid black;line-height:1px">
                        @foreach ($rsp as $item)
                            <p style="line-height: 2px;font-size: 9px">
                                {{ explode(' - ', $item->akun->oRabsub->oKom->oRo->oKros->nama_kegiatan)[0] }}
                                {{ explode(' - ', $item->akun->oRabsub->oKom->oRo->oKros->nama_kro)[0] }}
                                {{ explode(' - ', $item->akun->oRabsub->oKom->oRo->nama_ro)[0] }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{ explode(' - ', $item->akun->oRabsub->oKom->nama_komponen)[0] }}
                                &nbsp;&nbsp;&nbsp;
                                {{ explode(' - ', $item->akun->oRabsub->kode_sub)[0] }}

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                {{ $item->akun->kode_akun }}

                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalpagu = 0 @endphp
                        @foreach ($rsp as $item)
                            @php $totalpagu += $item->pagu;  @endphp
                            <p style="line-height: 2px;font-size: 9px;">
                                @money($item->pagu, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totallalu = 0 @endphp

                        @foreach ($rsp as $item)
                            @php $totallalu += $item->spplalu;  @endphp
                            <p style="line-height: 2px;font-size: 9px">
                                @money($item->spplalu, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalini = 0 @endphp

                        @foreach ($rsp as $item)
                            @php $totalini += $item->sppini;  @endphp
                            <p style="line-height: 2px;font-size: 9px">
                                @money($item->sppini, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalsd = 0 @endphp

                        @foreach ($rsp as $item)
                            @php $totalsd += $item->sppini + $item->spplalu;  @endphp
                            <p style="line-height: 2px;font-size: 9px">
                                @money($item->sppini + $item->spplalu, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        @php $totalsisa = 0 @endphp

                        @foreach ($rsp as $item)
                            @php $totalsisa += $item->sisadana;  @endphp
                            <p style="line-height: 2px;font-size: 9px">
                                @money($item->sisadana, 'IDR', 'true')
                            </p>
                        @endforeach
                    </td>

                </tr>
                <tr style="background-color: rgb(255, 225, 0)">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;font-size: 9px">Jumlah 1</td>
                    <td style="border: 0.5px solid rgb(0, 0, 0);text-align:right;font-size: 9px"> @money($totalpagu, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totallalu, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalini, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalsd, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalsisa, 'IDR', 'true') </td>

                </tr>
                <tr>
                    <td style="border: 0.5px solid black;">II</td>
                    <td style="border: 0.5px solid black;line-height:1px">
                        <p style="line-height: 2px;font-size: 9px">SEMUA KEGIATAN</p>
                        @foreach ($kro as $item)
                          <p style="line-height: 2px;font-size: 9px">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ explode(' - ', $item->nama_kegiatan)[0] }}
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            {{ explode(' - ', $item->nama_kro)[0] }}
                        </p>
                          
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>

                        @php $totalpagu2 = 0  @endphp
                        @foreach ($kro as $item)
                           <p style="line-height: 2px;font-size: 9px"> @money($item->biaya, 'IDR', 'true')</p>
                          
                            @php $totalpagu2 += $item->biaya @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>

                        @php $totalpagulalu2 = 0  @endphp
                        @foreach ($kro as $item)
                            @php
                                $totalpaguyanglalu = 0;
                            @endphp
                            @foreach ($item->mAkunlalu as $i)
                                @php
                                    $totalpaguyanglalu += $i->sppini;
                                @endphp
                            @endforeach
                            <p style="line-height: 2px;font-size: 9px">
                            @money($totalpaguyanglalu, 'IDR', 'true')
                        </p>
                          
                            @php $totalpagulalu2 += $totalpaguyanglalu @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>

                        @php $totalpaguini2 = 0  @endphp
                        @foreach ($kro as $item)
                            @php
                                $totalpaguyangini = 0;
                            @endphp
                            @foreach ($item->mAkun as $i)
                                @php
                                    $totalpaguyangini += $i->sppini;
                                @endphp
                            @endforeach
                            <p style="line-height: 2px;font-size: 9px">
                            @money($totalpaguyangini, 'IDR', 'true')
                        </p>
                          
                            @php $totalpaguini2 += $totalpaguyangini @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>

                        @php $totalpaguinilalu2 = 0  @endphp
                        @foreach ($kro as $item)
                            @php
                                $totalpaguyanginilalu = 0;
                            @endphp
                            @foreach ($item->mAkun as $i)
                                @php
                                    $totalpaguyanginilalu += $i->sppini;
                                @endphp
                            @endforeach
                            @foreach ($item->mAkunlalu as $i)
                                @php
                                    $totalpaguyanginilalu += $i->sppini;
                                @endphp
                            @endforeach
                            <p style="line-height: 2px;font-size: 9px">

                            @money($totalpaguyanginilalu, 'IDR', 'true')
                            </p>
                          
                            @php $totalpaguinilalu2 += $totalpaguyanginilalu @endphp
                        @endforeach
                    </td>
                    <td style="border: 0.5px solid black; text-align:right;">
                        <p></p>

                        @php $totalpagusisa2 = 0  @endphp

                        @foreach ($kro as $item)
                            @php
                                $totalpaguyanginilalu2 = 0;
                            @endphp
                            @foreach ($item->mAkun as $i)
                                @php
                                    $totalpaguyanginilalu2 += $i->sppini;
                                @endphp
                            @endforeach
                            @foreach ($item->mAkunlalu as $i)
                                @php
                                    $totalpaguyanginilalu2 += $i->sppini;
                                @endphp
                            @endforeach
                            <p style="line-height: 2px;font-size: 9px">

                            @money($item->biaya - $totalpaguyanginilalu2, 'IDR', 'true')
                            </p>
                          
                        @endforeach
                    </td>

                </tr>
                <tr style="background-color: rgb(255, 225, 0)">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;font-size: 9px">JUMLAH II</td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalpagu2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalpagulalu2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalpaguini2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalpaguinilalu2, 'IDR', 'true') </td>
                    <td style="border: 0.5px solid black;text-align:right;font-size: 9px"> @money($totalpagu2 - $totalpaguinilalu2, 'IDR', 'true') </td>
                </tr>

                <tr style="">
                    <td style="border: 0.5px solid black;"></td>
                    <td style="border: 0.5px solid black;font-size: 9px" colspan="6">UANG PERSEDIAAN</td>
                </tr>
                <tr style="">
                    <td></td>
                    <td>Lampiran .... Lembar</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td>Surat Buku</td>
                    <td style="border: 0.5px solid black;text-align:center">0</td>
                    <td colspan="2" style="text-align:center">STS .... Lembar</td>

                </tr>
                <tr style="">
                    <td></td>
                    <td style="text-align:right">Pendukung ... Lembar</td>
                    <td></td>
                    <td colspan="2">Pengeluaran ... Lembar</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        @endif
     
    </div>
    <table style="width: 100%;line-height:1" class="bordered">
        <thead>
            <tr>
                <td style="width: 65%; border: 0px">

                    <p>.</p>
                    <p style="line-height: 5px">Diterima oleh penguji SPP / Penerbit SPM,</p>
                    <p style="line-height: 5px">{{ $set->satker }} {{ $set->kode_satker }}</p>

                    <p style="line-height: 5px">{{ $rs->satker }}</p>
                    <br><br><br>
                    <p style="line-height: 5px">{{ $set->penerbit }} </p>

                    <p style="line-height: 5px">NIP. {{ $set->nip }} </p>
                </td>
                <td style="width:35%;border: 0px">
                    <p style="line-height: 5px">Kota Makassar, {{ $rs->proses }} </p>
                    <p style="line-height: 5px">Pejabat Pembuat Komitmen,</p>
                    <p style="line-height: 5px">{{ $set->satker }} {{ $set->kode_satker }}</p>
                    <br><br><br>
                    <p style="line-height: 5px"> {{ $rm->pejabatppk->nama }}</p>

                    <p style="line-height: 5px">NIP. {{ $rm->pejabatppk->nip }} </p>
                </td>
            </tr>
        </thead>
    </table>
@endsection
