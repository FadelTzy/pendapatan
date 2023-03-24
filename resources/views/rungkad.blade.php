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
    <br>
   <b> Kegiatan : {{ $d[0]->nama_kegiatan }} </b>
    <hr>
    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Jenis</th>
                <th>Keterangan</th>
                <th>Jumlah/Satuan</th>
                <th>Pagu</th>
            </tr>
        </thead>
        <tbody style="text-align: left; width: 100%">
            @foreach ($d as $kro)
                <tr style="background-color: blue">
                    <th>KRO</th>
                    <th>{{ explode(' - ',$kro->nama_kro)[0] }}</th>
                    <th>{{ $kro->nama_kro }}</th>
                    <th>-</th>
                    <th>@money($kro->biaya, 'IDR', true)</th>
                </tr>
                @foreach ($kro->mRo as $ro)
                    <tr style="background-color: rgb(0, 255, 234)">
                        <th> RO</th>
                        <th> - {{ explode(' - ',$ro->nama_ro)[0] }}</th>
                        <th> - {{ $ro->nama_ro }}</th>
                        <th>-</th>
                        <th>@money($ro->biaya, 'IDR', true)</th>
                    </tr>
                    @foreach ($ro->mKom as $kom)
                        <tr style="background-color: rgb(0, 255, 72)">
                            <th> KOMPONEN</th>
                            <th> - - {{ explode(' - ',$kom->nama_komponen)[0] }}</th>
                            <th> - - {{ $kom->nama_komponen }}</th>
                            <th>-</th>
                            <th>@money($kom->biaya, 'IDR', true)</th>
                        </tr>
                        @foreach ($kom->mSubnya as $sub)
                            <tr style="background-color: rgb(153, 255, 0)">
                                <th> SUBKOMPONEN</th>
                                <th> - - - {{ $sub->kode_sub }}</th>
                                <th> - - - {{ $sub->kode_sub }} - {{ $sub->nama_sub }}</th>
                                <th>-</th>
                                <th>@money($sub->biaya, 'IDR', true)</th>
                            </tr>
                            @foreach ($sub->mAkun as $akun)
                                <tr style="background-color: rgb(238, 255, 0)">
                                    <th>  AKUN</th>
                                    <th> - - - - {{ $akun->kode_akun }}</th>
                                    <th> - - - - {{ $akun->kode_akun }} - {{ $akun->nama_akun }} {{ $akun->id }}
                                    </th>
                                    <th>-</th>
                                    <th>@money($akun->biaya, 'IDR', true)</th>
                                </tr>
                                @foreach ($akun->mDetail as $detail)
                                    <tr style="background-color: rgb(255, 174, 0)">
                                        <th style="text-align: right">UNIT :</th>
                                        <th>  {{$detail->unit}}</th>
                                        <th> {{ $detail->keterangan }}</th>
                                        <th>{{$detail->volume}} {{$detail->satuan}}</th>
                                        <th>@money($detail->biaya, 'IDR', true)</th>
                                    </tr>
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
