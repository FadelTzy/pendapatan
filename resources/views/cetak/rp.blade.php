<table class="table table-hover table-sm table-bordered align-middle table-row-dashed fs-6 gy-5" id="example">
    <!--begin::Table head-->
    <thead>
        <!--begin::Table row-->
        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th style="font-weight:bold; text-align:center;vertical-align:center" rowspan="3">No</th>
            <th style="font-weight:bold; text-align:center;vertical-align:center" rowspan="3">Tanggal</th>
            <th style="font-weight:bold; text-align:center;vertical-align:center" rowspan="3">Nomor SP3B</th>
            <th class="text-bold " colspan="{{ count($rkakl->mRab) }}" style="text-align: center">Akun Pendapatan</th>
            <th style="font-weight:bold; text-align:center;vertical-align:center" rowspan="3">Jumlah</th>

        </tr>
        <tr>
            @foreach ($rkakl->mRab as $item)
                <th style="vertical-align: center;font-weight:bold">{{ $item->nama_akun }}</th>
            @endforeach

        </tr>
        <tr>
            @foreach ($rkakl->mRab as $item)
                <th style="text-align: center">{{ $item->kode_akun }}</th>
            @endforeach
        </tr>
        <!--end::Table row-->
    </thead>
    <tbody>
        @php
            $sisa = 12 - count($data);
            $nom = 1;
            $sum2 = 0;
            $sum1 = [];
            $ver = [];
            
        @endphp
        @foreach ($data as $item)
            <tr>
                <td>{{ $nom++ }}</td>
                <td>{{ $item->tanggal_p }}</td>
                <td>{{ $item->nomor }}</td>
                @php
                    $jum = 0;
                    
                @endphp
                @foreach ($item->mAkun as $itemm)
                    @php
                        
                        $tot = 0;
                        $ver[$itemm->id][0] = 0;

                    @endphp
                    @if ($itemm->mBku)
                        @foreach ($itemm->mBku as $i => $itemb)
                            @php
                                $tot += $itemb->nilai;
                                $p = $itemb->nilai;
                                $sum1[$itemm->id][$i] = $p;
                                $ver[$itemm->id][] = $p;
                            @endphp
                        @endforeach
                    @else
                        @php
                            $ver[$itemm->id][0] = 0;
                        @endphp
                    @endif

                    <td>{{$tot}}</td>
                    @php
                        $jum += $tot;
                        
                    @endphp
                @endforeach
                <td>{{$jum}}</td>
            </tr>
            @php
                $sum2 += $jum;
            @endphp
        @endforeach
        @for ($i = 1; $i <= $sisa; $i++)
            <tr>
                <td>{{ $nom++ }}</td>
            </tr>
        @endfor
        <tr>
            <td style="font-weight:bold;text-align:center" colspan="3">
                Jumlah
            </td>
            @foreach ($ver as $itemk)
             @php
                 $n = 0;
             @endphp
                @foreach ($itemk as $itemc)
                    @php
                        $n += $itemc;
                    @endphp
                @endforeach
                <td>
                    {{ $n }}
                </td>
            @endforeach
            <td>{{$sum2}}</td>
       
        </tr>
    </tbody>
</table>
