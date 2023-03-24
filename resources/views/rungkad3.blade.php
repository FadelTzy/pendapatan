<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DATA RKAKL</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <div style="text-align: center;line-height: 15%;">
        <h3>LAPORAN KETERSEDIAAN DANA DETAIL TA 2023</h3>
        <P>Per Program; Kegiatan; Output; SubOutput; Komponen; SubKomponen; Akun; Item;</P>
        <p>Periode Januari 2023</p>
    </div>
    <br>
    <hr>
    <table style="border: none">
        <tbody >
            <tr >
                <td style="border: none" >Kementerian</td>
                <td style="border: none">023</td>
                <td style="border: none">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</td>
            </tr>
            <tr>
                <td style="border: none">Unit Organisasi                </td>
                <td style="border: none">17</td>
                <td style="border: none">DITJEN PENDIDIKAN TINGGI, RISET DAN TEKNOLOGI</td>
            </tr>
            <tr>
                <td style="border: none">Satuan Kerja</td>
                <td style="border: none">677523</td>
                <td style="border: none">UNIVERSITAS NEGERI MAKASSAR</td>
            </tr>

        </tbody>
    </table>
    <hr>

    <table>
        <thead>
            <tr style="background-color: steelblue">
                <th rowspan="2" style="width: 40%">Uraian</th>
                <th rowspan="2" style="width: 10%">Pagu Revisi</th>
                <th rowspan="2">Lock Pagu</th>
                <th colspan="4">Realisasi TA 2023</th>
                <th rowspan="2">Sisa Anggaran</th>
            </tr>
            <tr style="background-color: steelblue">
                <th>Periode Lalu</th>
                <th>Periode Ini</th>
                <th>s.d Periode</th>
                <th>%</th>
            </tr>
        </thead>
        <tbody style="text-align: left; width: 100%">
            <tr style="background-color: rgb(0, 225, 255)">
                <td style="text-align: center">Jumlah Seluruhnya</td>
                <td>@money($dr->revici->anggaran, 'IDR', true)</td>
                <td>@money(0, 'IDR', true)</td>
                <td>@money($rdspplalu, 'IDR', true)</td>
                <td>@money($rdsppini, 'IDR', true)</td>
                <td>@money($rdsppini + $rdspplalu, 'IDR', true)</td>
                <td>0,00 %</td>
                
                <td>@money($dr->revici->anggaran, 'IDR', true)</td>

            </tr>
            <tr style="background-color: rgb(255, 255, 255)">
                <td>DK Program Pendidikan Tinggi</td>
                <td>@money($dr->revici->anggaran, 'IDR', true)</td>
                <td>@money(0, 'IDR', true)</td>
                <td>@money($rdspplalu, 'IDR', true)</td>
                <td>@money($rdsppini, 'IDR', true)</td>
                <td>@money($rdsppini + $rdspplalu, 'IDR', true)</td>
                <td>0,00 %</td>
                
                
                <th>@money($dr->revici->anggaran, 'IDR', true)</th>
            </tr>
            @foreach ($c as $keg => $itemc)
                <tr style="background-color: rgb(254, 254, 254)">
                    <td>DK . {{ $keg }}</td>
                    <td>@money(getsumofkeg($itemc), 'IDR', true)</td>
                    <td>@money(0, 'IDR', true)</td>
                    <td>@money($totallalu = getsumofspplalukeg($itemc), 'IDR', true)</td>
                    <td>@money($totalini = getsumofsppinikeg($itemc), 'IDR', true)</td>
                    <td>@money($totallalu + $totalini, 'IDR', true)</td>
                    <td>0,00 %</td>


                    <th>@money(getsumofsisakeg($itemc), 'IDR', true)</th>
                </tr>
                @foreach ($itemc as $key => $item)
                    <tr style="background-color: rgb(255, 255, 255)">
                        <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp; {{ $key }}</th>
                        <th>@money(getsumofkro($item), 'IDR', true)</th>
                        <th>@money(0, 'IDR', true)</th>
                        <th>@money($totallalu = getsumofspplalukro($item), 'IDR', true)</th>
                        <th>@money($totalini = getsumofsppinikro($item), 'IDR', true)</th>
                        <th>@money($totallalu + $totalini, 'IDR', true)</th>
                        <th>0,00 %</th>


                        <th>@money(getsumofsisakro($item), 'IDR', true)</th>
                    </tr>

                    @foreach ($item as $rokey => $roitem)
                        <tr style="background-color: rgb(255, 255, 255)">
                            <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp;&nbsp;&nbsp;{{ explode(' - ', $key)[0] }} . {{ $rokey }}</th>
                            <th>@money(getsumofro($roitem), 'IDR', true)</th>
                            <th>@money(0, 'IDR', true)</th>
                            <th>@money($totallalu = getsumofspplaluro($roitem), 'IDR', true)</th>
                            <th>@money($totalini = getsumofsppiniro($roitem), 'IDR', true)</th>
                            <th>@money($totallalu + $totalini, 'IDR', true)</th>
                            <th>0,00 %</th>

                            <th>@money(getsumofsisaro($roitem), 'IDR', true)</th>
                        </tr>
                        @foreach ($roitem as $komkey => $koitem)
                            <tr style="background-color: rgb(255, 255, 255)">
                                <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $komkey }}</th>
                                <th>@money(getsumofkom($koitem), 'IDR', true)</th>
                                <th>@money(0, 'IDR', true)</th>
                                <th>@money($totallalu = getsumofspplalukom($koitem), 'IDR', true)</th>
                                <th>@money($totalini = getsumofsppinikom($koitem), 'IDR', true)</th>
                                <th>@money($totallalu + $totalini, 'IDR', true)</th>
                                <th>0,00 %</th>

                                <th>@money(getsumofsisakom($koitem), 'IDR', true)</th>
                            </tr>
                            @foreach ($koitem as $subkey => $subitem)
                                <tr style="background-color: rgb(255, 255, 255)">
                                    <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ explode(' - ', $komkey)[0] }} . {{ $subkey }} </th>
                                    <th>@money(getsumofsubkom($subitem), 'IDR', true)</th>
                                    <th>@money(0, 'IDR', true)</th>
                                    <th>@money($totallalu = getsumofspplalusubkom($subitem), 'IDR', true)</th>
                                    <th>@money($totalini = getsumofsppinisubkom($subitem), 'IDR', true)</th>
                                    <th>@money($totallalu + $totalini, 'IDR', true)</th>
                                    <th>0,00 %</th>
                                    <th>@money(getsumofsisasubkom($subitem), 'IDR', true)</th>
                                </tr>
                                @foreach ($subitem as $akunkey => $akunitem)
                                    <tr style="background-color: rgb(255, 255, 255)">
                                        <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $akunkey }}.{{ $akunitem[0]->nama_akun }}</th>
                                        <th>@money(getsumofakun($akunitem), 'IDR', true)</th>
                                        <th>@money(0, 'IDR', true)</th>
                                        <th>@money($totallalu = getsumofspplaluakun($akunitem), 'IDR', true)</th>
                                        <th>@money($totalini = getsumofsppiniakun($akunitem), 'IDR', true)</th>
                                        <th>@money($totallalu + $totalini, 'IDR', true)</th>
                                        <th>0,00 %</th>

                                        <th>@money(getsumofsisaakun($akunitem), 'IDR', true)</th>
                                    </tr>
                                    @foreach ($akunitem as $detailkey => $detailitem)
                                        <tr style="background-color: rgb(255, 255, 255)">
                                            <th style="color: rgb(0, 0, 0)">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $detailitem->unit }} : {{ $detailitem->keterangan }}</th>
                                            <th>@money($detailitem->biaya, 'IDR', true)</th>
                                            <th>@money(0, 'IDR', true)</th>
                                            <th>@money($detailitem->spplalu ?? 0 ,'IDR', true)</th>
                                            <th>@money($detailitem->sppini ?? 0, 'IDR', true)</th>
                                            <th>@money((int)($detailitem->spplalu ?? 0) + (int)($detailitem->sppini ?? 0), 'IDR', true)</th>
                                            <th>0,00 %</th>

                                            <th>@money($detailitem->sisabiaya, 'IDR', true)</th>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach


        </tbody>
    </table>
</body>

</html>
