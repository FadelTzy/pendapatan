<table>
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:15px">RINCIAN PENDAPATAN BLU PERIODE 01 {{$bulan}} S.D. {{$ld}} {{$bulan}} 2023</td>
    </tr> 
    <tr>
        <td colspan="3"></td>
    </tr>
    @foreach ($data as $i )
    <tr>
        <td style="font-weight:bold;text-align:center">{{$i->kode_akun}}</td>
        <td style="font-weight:bold;text-align:left">{{$i->nama_akun}}</td>
        <td style="font-weight:bold;text-align:center"></td>

    </tr>
    @php
        $tot = 0;
    @endphp
    @foreach ($i->mBku as $item)
    @php
        $tot += $item->nilai;
    @endphp
    <tr>
        <td></td>
        <td style="">{{$item->uraian}}</td>
        <td style="">@money($item->nilai,'IDR',true)</td>

    </tr>
    @endforeach
    <tr>
        <td></td>
        <td style="font-weight:bold;text-align:center">Jumlah</td>
        <td style="font-weight:bold;text-align:left">@money($tot,'IDR',true)</td>

    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
    @endforeach
 
</table>
