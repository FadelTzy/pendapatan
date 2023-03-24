@extends('layouts.appv2')

@push('prepend-style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title')
    {{ $page }} :: test
@endsection

@section('toolbar')
    <div class="toolbar mb-n1 pt-3 mb-lg-n3 pt-lg-6" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap gap-2">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column align-items-start me-3 py-2 py-lg-0 gap-2">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bold m-0 fs-3">{{ $judul ?? '-' }}
                    <!--begin::Separator-->
                    <span class="h-20px border-gray-400 border-start mx-3"></span>
                    <!--end::Separator-->
                    <!--begin::Description-->
                    <small class="text-gray-500 fs-7 fw-semibold my-1">{{ $page }}</small>
                    <!--end::Description-->
                </h1>
                <!--end::Title-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                @if ($kasawal->status ?? 0 == 1)
                    <a href="#" class="pl-1 btn btn-white btn-sm">
                        <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                        Telah disahkan
                        <!--end::Svg Icon-->
                    </a>
                @else
                    Belum disahkan
                @endif


                <!--end::Button-->
                <!--begin::Button-->


            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-fluid">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <div class="card card-flush pt-3 mb-1 mb-xl-10">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="fw-bold"> Rincian Data Pengesahan Periode 01 Janurai - 31 Desember
                            {{ $rkakl->tahun_anggaran }}
                        </h2>


                    </div>

                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar d-flex justify-end">

                    </div>


                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-3">
                    <!--begin::Section-->
                    <div class="mb-0">
                        <!--begin::Title-->


                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-3">
                            <!--begin::Row-->
                            <div class="flex-equal me-5">
                                <!--begin::Details-->
                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">KEMEN/LEMB:</td>
                                        <td style="width: 5%">:</td>
                                        <td class="text-gray-800 min-w-200px">
                                            KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN (023)
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">UNIT ORG:</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800"> DITJEN PENDIDIKAN TINGGI (17)</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->

                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">PROPINSI/KAB/KOTA:</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800">Makassar, Sulawesi Selatan (51)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">SATUAN KERJA:</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800"> UNIVERSITAS NEGERI MAKASSAR (677523)</td>
                                    </tr>
                                    @if ($kasawal->status ?? 0 == 1)
                                        <tr>
                                            <td class="text-gray-400">NOMOR SP3B:</td>
                                            <td style="width: 5%">:</td>

                                            <td class="text-gray-800"> {{ $kasawal->nomor }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-gray-400">TANGGAL PENGESAHAN:</td>
                                            <td style="width: 5%">:</td>

                                            <td class="text-gray-800"> {{ $kasawal->tanggal_p }}</td>
                                        </tr>
                                    @endif

                                    <!--end::Row-->

                                </table>
                                <!--end::Details-->

                            </div>
                            <!--end::Row-->

                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Section-->

                </div>
                <!--end::Card body-->
            </div>
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <h4 class="fw-bold">
                            Rincian Data Pengesahan Periode 01 Janurai - 31 Desember {{ $rkakl->tahun_anggaran }}
                        </h4>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <a href="{{ url('cetak/rincian-pengesahan/') }}" target="_blank"
                            class="btn btn-sm btn-primary">Cetak</a>


                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                @php
                @endphp
                <div class="card-body pt-0 table-responsive">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm table-bordered align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th class="text-bold text-center" rowspan="3">No</th>
                                <th class="text-bold text-center" rowspan="3">Tanggal</th>
                                <th class="text-bold text-center" rowspan="3">Nomor SP3B</th>
                                <th class="text-bold " colspan="{{ count($rkakl->mRab) }}" style="text-align: center">Akun
                                    Pendapatan</th>
                                <th class="text-bold text-center" rowspan="3">Jumlah</th>

                            </tr>
                            <tr>
                                @foreach ($rkakl->mRab as $item)
                                    <th>{{ $item->nama_akun }}</th>
                                @endforeach

                            </tr>
                            <tr>
                                @foreach ($rkakl->mRab as $item)
                                    <th>{{ $item->kode_akun }}</th>
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
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <br>

        </div>
        <!--end::Post-->

    </div>
@endsection

@push('prepend-script')
@endpush
@push('addon-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            ">
    </script>
    <script src="{{ asset('assets/js/custom/utilities/modals/new-target.js') }}"></script>
    <script>
        var tabel;
        var url = window.location.origin;
        var toastLiveExample = document.getElementById('liveToast')
        var toastErr = document.getElementById('liveToastErr')
        var harganya = 0;
        $("#flexSwitchDefault").on('change', function() {
            var html = `  <div class="form-group">
                                    <div class="d-flex justify-content-end">
                                        <button type='button' id="ak" class="btn btn-sm btn-primary">Tambah Data <i
                                                class="fa fa-plus"></i></button>

                                    </div>
                                    <div id="tk">
                                        <div class="input-group">
                                            <input type="text" placeholder="..." name='cipung[]' class="form-control ">
                                            <div class="input-group-append">
                                                <div onclick='myFunc(this)' style="cursor: pointer" 
                                                    class="input-group-text rk">
                                                    <i id="fonteye" class="fa fa-trash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
            if ($(this).is(':checked')) {
                $("#field").html(html);
                $("#labelcheck").html('Bercabang')
                panggilak();
            } else {
                $("#labelcheck").html('Tidak Bercabang')
                $("#field").html('');

            }
        })
        $("#btnrekap").on('click', function() {
            $("#formrekap").trigger('submit');
        });
        $("#formrekap").on('submit', function(id) {
            id.preventDefault();
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");
                var datar = $(this).serialize();

                $.ajax({
                    url: '{{ route('p.sahkan') }}',
                    type: "post",
                    data: datar,
                    success: function(e) {
                        console.log(e);
                        // return 0;
                        $.LoadingOverlay("hide");
                        if (e.status == 'success') {
                            toastFun(1);


                        } else {
                            toastFun(2);
                            if (e.kode == 3) {
                                alert(e.data);
                            }
                        }
                        location.reload();
                    }
                })
            }


        })

        function panggilak() {
            $("#ak").on('click', function(e) {
                e.preventDefault();
                var cok = `<div class="input-group">
                                                <input type="text" placeholder="..." name='cipung[]' class="form-control ">
                                                <div class="input-group-append">
                                        <div onclick='myFunc(this)' style="cursor: pointer"  class="input-group-text rk">
                                            <i id="fonteye" class="fa fa-trash"></i>
                                        </div>
                                    </div>
                                            </div>
                                            `;
                $("#tk").append(cok);
            })
        }

        $("#pilihbulan").on('change', function(d) {

            $.LoadingOverlay("show");
            location.href = url + '/penerimaan/pengesahan?bulan=' + this.value;

            // getData(this.value);
        })

        function myFunc(params) {
            $(params).parent('div').parent('div').remove();
        }

        function toastFun(type) {
            var toast;

            if (type == 1) {
                toast = new bootstrap.Toast(toastLiveExample);
                toast.show();
            } else {
                toast = new bootstrap.Toast(toastErr);
                toast.show();
            }
        }





        //form dan btn rab kegiatan



        function idr(uang) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(uang);

        }
    </script>
@endpush
