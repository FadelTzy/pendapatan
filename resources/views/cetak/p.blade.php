<table>
    {{-- <tr>
        <td colspan="3" style="text-align: center;font-weight:bold;font-size:12px">{{ $data->nama_akun }}
            ({{ $data->kode_akun }})</td>
    </tr> --}}
    <tr>
        <td></td>
        <td></td>

        <td></td>

        <td></td>
        <td></td>

    </tr>
    <tr>
        <td>PENGESAHAN KE-{{ $bulan }}</td>
        <td></td>
        <td></td>
        <td colspan="2">PERIODE 1 {{ $nbulan }} S.D {{ $lastdate }} {{ $nbulan }} {{ $tahun }}
        </td>
    </tr>
    <tr>
        <td colspan="5"></td>
    </tr>
    @php
        
        $sum = 0;
        $sum2 = 0;
        $sum3 = 0;

    @endphp
          <tr >
            <th style="text-align: center;font-weight:bold">Uraian</th>
            <th style="text-align: center;font-weight:bold">Jumlah</th>
            <th style="text-align: center;font-weight:bold" colspan="2">Pengurang (Sudah Disahkan)</th>
            <th style="text-align: center;font-weight:bold">Jumlah Disahkan</th>


        </tr>
    @foreach ($data as $item)
        <tr>
            <td>{{ $item->nama_akun }} ({{ $item->kode_akun }})</td>
            {{-- uraian --}}
            @php
                $total = 0;
                $total2 = 0;
                
            @endphp
            @foreach ($item->mBku as $itemn)
                @php
                    $total += $itemn->nilai;
                @endphp
            @endforeach
            @foreach ($item->mBkuu as $itemb)
                @php
                    $total2 += $itemb->nilai;
                @endphp
            @endforeach
            <td>@money($total, 'IDR', true)</td>
            {{-- @if ($item->mBkuu)
        @else
            @php
                $total2 = 0;
            @endphp
        @endif --}}

            {{-- <td>@money(count($item->mBku), 'IDR', true)</td> --}}
            {{-- <td>{{$item->mBkuu}}</td> --}}
            <td colspan="2">@money($total - $total2, 'IDR', true)</td>
            <td >@money($total2, 'IDR', true)</td>
            @php
                $sum += $total - $total2;
                $sum2 += $total2;
                $sum3 += $total;
            @endphp

        </tr>
    @endforeach
    <tr>
        <td style="text-align: center;font-weight:bold"><strong>Jumlah</strong></td>

        <td>@money($sum3, 'IDR', true)</td>
        <td colspan="2">@money($sum, 'IDR', true)</td>
        <td>@money($sum2, 'IDR', true)</td>
    </tr>
</table>
