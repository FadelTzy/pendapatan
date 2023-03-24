      <tr>
          <td style="border: 0.5px solid black;">I</td>
          <td style="border: 0.5px solid black;">
              @foreach ($rsp as $item)
                  <p>
                      {{ $item->rab->kegiatanr->kode }} {{ $item->rab->kror->kode }}
                      {{ $item->rab->ror->kode }}
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      {{ $item->rab->komponenr->kode }}
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      {{ $item->rab->akunr->kode }}

                  </p>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              @php $totalpagu = 0 @endphp
              @foreach ($akunrk as $item)
                  @php $totalpagu += $item->rab->anggaran;  @endphp
                  <p>
                      @money($item->rab->anggaran, 'IDR', 'true')
                  </p>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              @php $totalrealisasi = 0 @endphp

              @foreach ($akunrk as $item)
                  @php $totalrealisasi += $item->rab->realisasi;  @endphp

                  <p>
                      @money($item->rab->realisasi, 'IDR', 'true')
                  </p>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              @php $totalsppini = 0 @endphp
              @foreach ($akunrk as $item)
                  @php $totalsppini += $item->jumlah;  @endphp

                  <p>
                      @money($item->jumlah, 'IDR', 'true')
                  </p>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              @php $totaljumlahsppini = 0 @endphp

              @foreach ($akunrk as $item)
                  @php $totaljumlahsppini += $item->jumlah + $item->rab->realisasi;  @endphp

                  <p>
                      @money($item->jumlah + $item->rab->realisasi, 'IDR', 'true')
                  </p>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              @php $totalrabanggaran = 0 @endphp

              @foreach ($akunrk as $item)
                  @php $totalrabanggaran += $item->rab->anggaran - ($item->jumlah + $item->rab->realisasi);  @endphp

                  <p>
                      @money($item->rab->anggaran - ($item->jumlah + $item->rab->realisasi), 'IDR', 'true')
                  </p>
              @endforeach
          </td>
      </tr>
      <tr style="background-color: gray">
          <td style="border: 0.5px solid black;"></td>
          <td style="border: 0.5px solid black;">Jumlah 1</td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalpagu, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalrealisasi, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalsppini, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totaljumlahsppini, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalrabanggaran, 'IDR', 'true') </td>

      </tr>
      <tr>
          <td style="border: 0.5px solid black;">II</td>
          <td style="border: 0.5px solid black;">
              <p>SEMUA KEGIATAN</p>
              @foreach ($rkakl->datarab as $item)
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ $item->kegiatanr->kode }}
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  {{ $item->kror->kode }}
                  <br>
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              <p></p>
              @php $totalskdipa2 = 0  @endphp

              @foreach ($rkakl->datarab as $item)
                  @php $totalskdipa = 0  @endphp

                  @foreach ($item->datakro as $item)
                      @php $totalskdipa += $item->anggaran @endphp
                  @endforeach
                  @money($totalskdipa, 'IDR', 'true')
                  <br>
                  @php $totalskdipa2 += $totalskdipa @endphp
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              <p></p>
              @php
                  $totalskrealisasi2 = 0;
                  $realisasi = [];
                  $sppsaatini = [];
              @endphp

              @foreach ($rkakl->datarab as $va => $item)
                  @php $totalskrealisasi = 0;   @endphp

                  @foreach ($item->datakro as $item)
                      @php $totalskrealisasi += $item->realisasi @endphp
                  @endforeach
                  @money($totalskrealisasi, 'IDR', 'true')
                  <br>
                  @php $totalskrealisasi2 += $totalskrealisasi @endphp
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              <p></p>
              @php $totalsksppisi2 = 0  @endphp

              @foreach ($rkakl->datarab as $item)
                  @php $totalsksppisi = 0  @endphp

                  @foreach ($item->datakro as $item)
                      @php $totalsksppisi += $item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0 @endphp
                  @endforeach
                  @money($totalsksppisi, 'IDR', 'true')
                  <br>
                  @php $totalsksppisi2 += $totalsksppisi @endphp
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              <p></p>
              @php $totalskpengurangan2 = 0  @endphp

              @foreach ($rkakl->datarab as $item)
                  @php $totalskpengurangan = 0  @endphp

                  @foreach ($item->datakro as $item)
                      @php $totalskpengurangan += ($item->realisasi + ($item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0)) @endphp
                  @endforeach
                  @money($totalskpengurangan, 'IDR', 'true')
                  <br>
                  @php $totalskpengurangan2 += $totalskpengurangan @endphp
              @endforeach
          </td>
          <td style="border: 0.5px solid black; text-align:right;">
              <p></p>
              @php $totalsktotal2 = 0  @endphp

              @foreach ($rkakl->datarab as $item)
                  @php $totalsktotal = 0  @endphp

                  @foreach ($item->datakro as $item)
                      @php $totalsktotal += $item->anggaran - ($item->realisasi + ($item->dataakunrkakl != null ? $item->dataakunrkakl->jumlah : 0)) @endphp
                  @endforeach
                  @money($totalsktotal, 'IDR', 'true')
                  <br>
                  @php $totalsktotal2 += $totalsktotal @endphp
              @endforeach
          </td>
      </tr>
      <tr style="background-color: gray">
          <td style="border: 0.5px solid black;"></td>
          <td style="border: 0.5px solid black;">JUMLAH II</td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalskdipa2, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalskrealisasi2, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalsksppisi2, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalskpengurangan2, 'IDR', 'true') </td>
          <td style="border: 0.5px solid black;text-align:right;"> @money($totalsktotal2, 'IDR', 'true') </td>
      </tr>
