<table>
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:12px">{{ $data->nama_akun }}
            ({{ $data->kode_akun }})</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:12px">Bulan {{ $bulan }}
            {{$rka->tahun_anggaran}}</td>
    </tr>
    <tr>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td style="font-weight:bold;text-align:center">Tanggal</td>
        <td style="font-weight:bold;text-align:center">Uraian</td>
        <td style="font-weight:bold;text-align:center">Jumlah</td>

    </tr>
    @php
        $tot = 0;
    @endphp
    @foreach ($data->mBku as $i)
        @php
            $tot += $i->nilai;
        @endphp
        <tr>
            <td style="text-align:center">{{ $i->tanggal }}</td>
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
