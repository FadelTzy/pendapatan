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
                <a href="#" class="pl-1 btn btn-white btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    @if ($kasawal)
                        <i>Telah Direkap</i>
                    @else
                        <i>Belum Direkap</i>
                    @endif
                    <!--end::Svg Icon-->
                </a>

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
                        <h2 class="fw-bold">BUKU KAS UMUM {{ $rkakl->tahun_anggaran }}</h2>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar d-flex justify-end">
                        <div class="input-group ">
                            <select name="bulan" class="form-control" id="pilihbulan">
                                <option disabled selected>Pilih Bulan</option>
                                <option @if ($date == '01') selected @endif value="01">Januari</option>
                                <option @if ($date == '02') selected @endif value="02">Februari</option>
                                <option @if ($date == '03') selected @endif value="03">Maret</option>
                                <option @if ($date == '04') selected @endif value="04">April</option>
                                <option @if ($date == '05') selected @endif value="05">Mei</option>
                                <option @if ($date == '06') selected @endif value="06">Juni</option>
                                <option @if ($date == '07') selected @endif value="07">Juli</option>
                                <option @if ($date == '08') selected @endif value="08">Agustus</option>
                                <option @if ($date == '09') selected @endif value="09">September</option>
                                <option @if ($date == '10') selected @endif value="10">Oktober</option>
                                <option @if ($date == '11') selected @endif value="11">November</option>
                                <option @if ($date == '12') selected @endif value="12">Desember</option>
                            </select>
                        </div><!-- input-group -->

                    </div>


                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-3">
                    <!--begin::Section-->
                    <div class="mb-0">
                        <!--begin::Title-->
                        <h3 class="fw-bold"> Bulan : {{ $datee }} </h3>

                        <!--end::Title-->
                        <!--begin::Details-->
                        <div class="d-flex flex-wrap py-5">
                            <!--begin::Row-->
                            <div class="flex-equal me-5">
                                <!--begin::Details-->
                                <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400 min-w-175px w-175px">KEMEN/LEMB:</td>
                                        <td class="text-gray-800 min-w-200px">
                                            KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN (023)
                                        </td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">UNIT ORG:</td>
                                        <td class="text-gray-800"> DITJEN PENDIDIKAN TINGGI (17)</td>
                                    </tr>
                                    <!--end::Row-->
                                    <!--begin::Row-->

                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <tr>
                                        <td class="text-gray-400">PROPINSI/KAB/KOTA:</td>
                                        <td class="text-gray-800">Makassar, Sulawesi Selatan (51)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">SATUAN KERJA:</td>
                                        <td class="text-gray-800"> UNIVERSITAS NEGERI MAKASSAR (677523)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">Total Pendapatan:</td>
                                        <td class="text-gray-800" id="tp"> </td>
                                    </tr>
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
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-docs-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Cari Data" />
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
                        <button
                        @if ($rekapawal) 
                            @if ($kasawal)
                                 disabled
                            @else 
                            @endif
                        @else 
                            disabled 
                        @endif
                            data-bs-toggle="modal" @if ($rkakl->status_draft == 2)  @endif
                            data-bs-target="#exampleLargeModal" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>
                            @if ($rekapawal)
                                @if ($kasawal)
                                    Telah direkap
                                @else
                                    Tambah KAS

                                @endif
                            @else
                                Belum melakukan rekap bulan kemarin 
                            @endif
                        </button>
                        @if ($date == '01')
                        <button
                    
                            data-bs-toggle="modal"
                            data-bs-target="#exampleLargeModal" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i>
                      
                                    Tambah KAS

                        </button>
                        @endif
                     

                        <a href="{{ url('rkakl/data-rkakl/') . '/' . Request::segment(3) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-angle-left"></i> Kembali
                        </a>
                        <button type="button"
                            class="btn btn-sm d-inline @if ($kasawal) btn-success
                        @else
                        btn-warning @endif "
                            data-bs-toggle="modal" data-bs-target="#rekapmodal">Rekap</button>
                        <a type="button" class="btn btn-sm d-inline btn-warning" href="{{ url('cetak/buku-kas-umum').'?bulan='.$date }}"
                            style="margin-left:5px">Cetak</a>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm table-bordered align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>Tanggal</th>
                                <th style="width: 8%;">No Bukti / Referensi</th>
                                <th>Uraian</th>
                                <th>Penerimaan</th>
                                <th>Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @php
                                $total = 0;
                                $islast = 0;
                                $awal = 0;
                            @endphp
                            <tr>
                                <td> 01 {{ \Carbon\Carbon::parse($rkakl->tahun_anggaran .'-'. $date .'-01' )->isoFormat('MMM') }} {{ $rkakl->tahun_anggaran }}</td>
                                <td class="text-center"></td>
                                <td>Kas Awal</td>
                                <td>
                                    @if ($rekapawal)
                                        @money($rekapawal->nilai, 'IDR', true)
                                        @php
                                            $total += $rekapawal->nilai;
                                        @endphp
                                    @else
                                        @money(0, 'IDR', true)
                                        @php
                                            $total += 0;
                                        @endphp
                                    @endif
                                </td>
                                <td>

                                </td>
                                <td>
                                    @if ($rekapawal)
                                        @money($rekapawal->nilai, 'IDR', true)
                                    @else
                                        @money(0, 'IDR', true)
                                    @endif
                                </td>
                                <td>
                                    <button onclick="" class="btn btn-sm btn-warning">Edit </button>
                                    <button onclick="" class="btn btn-sm btn-danger">Hapus </button>
                                </td>
                            </tr>
                        </tbody>
                        <tbody id="databody">


                            @foreach ($data as $item)
                                @if ($loop->last)
                                    @php
                                        $islast = 1;
                                    @endphp
                                @endif
                                <tr>
                                    <td> {{ \Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMM YYYY') }}</td>
                                    <td class="text-center">{{ $item->no_bukti }}</td>
                                    <td>{{ $item->uraian }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            @php
                                                $total += $item->nilai;
                                            @endphp
                                            @money($item->nilai, 'idr', true)
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 2)
                                            @php
                                                $total -= $item->nilai;
                                            @endphp
                                            @money($item->nilai, 'idr', true)
                                        @endif
                                    </td>
                                    <td>
                                        @money($total, 'IDR', true)
                                    </td>
                                    <td>
                                        <button onclick="editbku({{ $item }},{{ $islast }})"
                                            class="btn btn-sm btn-warning">Edit </button>
                                        <button onclick="hapusbku({{ $item->id }},{{ $islast }})"
                                            class="btn btn-sm btn-danger">Hapus </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
        </div>
        <!--end::Post-->

    </div>


    <!--end::Toast-->
    <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabakun" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ $rkakl->id }}" name="id_revisi">
                        <input type="hidden" value="{{ $date }}" name="bulan">
                        <input type="hidden" value="{{ $rkakl->tahun_anggaran }}" name="tahun">

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Status</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" checked value="1"
                                        id="status1">
                                    <label class="form-check-label" for="status1">
                                        Pemasukan
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" value="2"
                                        id="status2">
                                    <label class="form-check-label" for="status2">
                                        Pengeluaran
                                    </label>
                                </div>
                                <br>
                                <div id="ura">
                                    <label class="form-label">Akun</label>
                                    <div class="input-group">
                                        <select required name="akun" class="form-control" id="rabakun">
                                            <option disabled selected>Pilih Akun</option>
                                            @foreach ($akun as $i)
                                                <option value="{{ $i->id }}">
                                                    {{ $i->oAkun->nama_akun }} ({{ $i->oAkun->kode_akun }}) -
                                                    {{ $i->nama_cabang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><!-- input-group -->
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">No Bukti / Referensi</label>
                                        <div class="input-group">
                                            <input type="bukti" id="buktiref" value="{{ $tot }}"
                                                name="bukti" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Tanggal</label>
                                        <div class="input-group">
                                            <input type="date" value="{{ date('Y-m-d') }}" name="tanggal"
                                                class="form-control">
                                        </div><!-- input-group -->
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">Nilai</label>
                                        <div class="input-group">
                                            <input type="number" onkeyup="cekharga(this)" id="nilai" name="nilai"
                                                class="form-control">
                                        </div><!-- input-group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Rupiah</label>
                                        <div class="input-group">
                                            <input type="text" readonly id="rupiah" class="form-control">
                                        </div><!-- input-group -->
                                    </div>

                                </div>



                                <br>


                            </div>
                            <div id="field" class="col-md-12">

                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabakun" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Toast-->
    <div class="modal fade" id="modaleditbku" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabakunu" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ $rkakl->id }}" name="id_revisi">
                        <input type="hidden" id="islastcheck" name="islastcheck">
                        <input type="hidden" id="idu" name="id">
                        <input type="hidden" value="{{ $rkakl->tahun_anggaran }}" name="tahun">

                        <input type="hidden" id="valref" name="valref">
                        <input type="hidden" value="{{ $date }}" name="bulan">

                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Status</label>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusu" checked value="1"
                                        id="statusu1">
                                    <label class="form-check-label" for="statusu1">
                                        Pemasukan
                                    </label>
                                </div>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="statusu" value="2"
                                        id="statusu2">
                                    <label class="form-check-label" for="statusu2">
                                        Pengeluaran
                                    </label>
                                </div>
                                <br>
                                <div id="urau">
                                    <label class="form-label">Akun</label>
                                    <div class="input-group">
                                        <select name="akun" class="form-control" id="rabakunu">
                                            <option disabled selected>Pilih Akun</option>
                                            @foreach ($akun as $i)
                                                <option value="{{ $i->id }}">
                                                    {{ $i->oAkun->nama_akun }} ({{ $i->oAkun->kode_akun }}) -
                                                    {{ $i->nama_cabang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><!-- input-group -->
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">No Bukti / Referensi</label>
                                        <div class="input-group">
                                            <input type="bukti" id="buktirefu" value="{{ $tot }}"
                                                name="bukti" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Tanggal</label>
                                        <div class="input-group">
                                            <input type="date" id="tanggalu" value="{{ date('Y-m-d') }}"
                                                name="tanggal" class="form-control">
                                        </div><!-- input-group -->
                                    </div>

                                </div>

                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="form-label">Nilai</label>
                                        <div class="input-group">
                                            <input type="number" onkeyup="cekhargau(this)" id="nilaiu"
                                                name="nilai" class="form-control">
                                        </div><!-- input-group -->
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label">Rupiah</label>
                                        <div class="input-group">
                                            <input type="text" readonly id="rupiahu" class="form-control">
                                        </div><!-- input-group -->
                                    </div>

                                </div>
                            </div>
                            <div id="field" class="col-md-12">

                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabakunu" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Toast-->
    <div class="modal fade" id="rekapmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Rekap</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrekap" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{ $rkakl->id }}" name="id_revisi">
                        <input type="hidden" id="rekapanilai" name="nilai" value="{{ $total }}">
                        <input type="hidden" name="tahun" value="{{ $rkakl->tahun_anggaran }}">
                        <input type="hidden" name="bulan" value="{{ $date }}">

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="form-label">Rekap Bulan {{ $date }}</h3>

                                <hr>


                                <div class="row">

                                    <div class="col-sm-12">
                                        <label class="form-label">Nilai</label>
                                        <div class="input-group">
                                            <input type="text" readonly id="rupiahrekap" value="@money($total, 'IDR', true)"
                                                class="form-control">
                                        </div><!-- input-group -->
                                    </div>

                                </div>



                                <br>


                            </div>
                            <div id="field" class="col-md-12">

                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button id="btnrekap" type="button" class="btn btn-primary">Rekap</button>
                </div>
            </div>
        </div>
    </div>




    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToast" class="toast bg-success text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Berhasil Menambah Data
            </div>
        </div>
    </div>

    <div class="position-fixed top-0 end-0 p-3" style="z-index: 99999">
        <div id="liveToastErr" class="toast bg-danger text-white" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Notifikasi</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Gagal Menambah Data
            </div>
        </div>
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
        var bulannya = '{{ $date }}';
        var totnya = '{{ $total }}';
        var kasawal = '{{ $rekapawal->nilai ?? 0 }}';

        $(document).ready(function() {

            console.log("ready!", kasawal);
            $("#tp").html(idr(totnya))
        });
        $("input[name='status']").on('change', function() {
            var vall = this.value
            var ht = `     <label class="form-label">Akun</label>
                                <div class="input-group">
                                    <select required name="akun" class="form-control" id="rabakun">
                                        <option disabled selected>Pilih Akun</option>
                                        @foreach ($akun as $i)
                                            <option value="{{ $i->id }}">
                                                {{ $i->oAkun->nama_akun }} ({{ $i->oAkun->kode_akun }}) -
                                                {{ $i->nama_cabang }}
                                            </option>
                                        @endforeach
                                    </select>
                                `;
            var ht2 = `     <label class="form-label">Uraian</label>
                                <div class="input-group">
                                    <input required type="text" name="uraian" class="form-control">
                                </div>`;
            if (vall == 1) {
                $('#ura').html(ht);
            } else {
                $("#ura").html(ht2)

            }
        })
        $("input[name='statusu']").on('change', function() {
            var vall = this.value
            var ht = `     <label class="form-label">Akun</label>
                                <div class="input-group">
                                    <select required name="akun" class="form-control" id="rabakunu">
                                        <option disabled selected>Pilih Akun</option>
                                        @foreach ($akun as $i)
                                            <option value="{{ $i->id }}">
                                                {{ $i->oAkun->nama_akun }} ({{ $i->oAkun->kode_akun }}) -
                                                {{ $i->nama_cabang }}
                                            </option>
                                        @endforeach
                                    </select>
                                `;
            var ht2 = `     <label class="form-label">Uraian</label>
                                <div class="input-group">
                                    <input required type="text" name="uraian" class="form-control">
                                </div>`;
            if (vall == 1) {
                $('#urau').html(ht);
            } else {
                $("#urau").html(ht2)

            }
        })


        function editbku(data, islast) {
            console.log(data, islast)
            $("#rupiahu").val(idr(data.nilai));
            $("#islastcheck").val(islast);
            $("#idu").val(data.id);
            $("#valref").val(data.no_bukti);
            $("#nilaiu").val(data.nilai);
            $("#tanggalu").val(data.tanggal);
            $("#buktirefu").val(data.no_bukti);
            if (data.status == 1) {
                var hte1 = `  <label class="form-label">Akun</label>
                                    <div class="input-group">
                                        <select name="akun" class="form-control" id="rabakunu">
                                            <option disabled selected>Pilih Akun</option>
                                            @foreach ($akun as $i)
                                                <option value="{{ $i->id }}">
                                                    {{ $i->oAkun->nama_akun }} ({{ $i->oAkun->kode_akun }}) -
                                                    {{ $i->nama_cabang }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div><!-- input-group -->`;
                $("#urau").html(hte1);
                $("input[name=statusu][value='" + data.status + "']").prop("checked", true);

                $("#rabakunu").val(data.detail);
            } else {
                var hte2 = ` <label class="form-label">Uraian</label>
                                <div class="input-group">
                                    <input type="text" value="${data.uraian}" name="uraian" class="form-control">
                                </div>`;
                $("input[name=statusu][value='" + data.status + "']").prop("checked", true);

                $("#urau").html(hte2);

            }
            $("#modaleditbku").modal('show')
        }

        function hapusbku(id, islast) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/penerimaan/bku-post/delete/' + id,
                    type: "delete",
                    success: function(e) {
                        console.log(e);
                        $.LoadingOverlay("hide");
                        if (e.status == 'success') {
                            $("#buktiref").val(e.total)
                            toastFun(1);
                            getData(bulannya);
                        } else {
                            toastFun(2);
                        }

                    }
                })
            }
            console.log(id, islast);
        }

        function cekharga(e) {
            var c = e.value;
            $("#rupiah").val(idr(c))

        }

        function cekhargau(e) {
            var c = e.value;
            $("#rupiahu").val(idr(c))

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


        $("#btncabang").on('click', function() {
            $("#formcabang").trigger('submit');
        });



        //form dan btn rab kegiatan
        $("#btnrabakun").on('click', function() {
            $("#formrabakun").trigger('submit');
        });
        $("#btnrabakunu").on('click', function() {
            $("#formrabakunu").trigger('submit');
        });
        $("#btnrekap").on('click', function() {
            $("#formrekap").trigger('submit');
        });
        $("#pilihbulan").on('change', function(d) {

            $.LoadingOverlay("show");
            location.href = url + '/penerimaan/buku-kas-umum?bulan=' + this.value;

            // getData(this.value);
        })
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
                    url: '{{ route('p.rekapp') }}',
                    type: "post",
                    data: datar,
                    success: function(e) {
                        console.log(e);
                        $.LoadingOverlay("hide");
                        if (e.status == 'success') {
                            toastFun(1);


                        } else {
                            toastFun(2);
                        }

                    }
                })

            }


        })

        $("#formrabakun").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('p.bkup') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabakun").trigger('reset');
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(2);
                    } else if(id.status == 'warning'){
                        toastFun(2);
                        alert(id.message);
                        location.reload();
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        toastFun(1);
                        $("#buktiref").val(id.jumlah)
                        getData(bulannya);


                    }
                }
            })


        })
        $("#formrabakunu").on('submit', function(id) {
            id.preventDefault();
            var tes = new FormData(this);
            var islast = $("#islastcheck").val();
            var valref = $("#valref").val();
            var nowvalref = $("#buktirefu").val();
            if (valref == nowvalref) {
                console.log('1')
                sendUp(tes);
            } else {
                if (islast == 0) {
                    datac = confirm(
                        "jika anda mengubah nomor bukti / referensi akan mengubah nomor bukti yang lain");
                    if (datac) {
                        console.log('21')

                        sendUp(tes);
                    } else {
                        console.log('3')

                        return 0;
                    }
                } else {
                    console.log('4')

                    sendUp(tes);

                }
            }
            return;



        })

        function sendUp(params) {
            // return;
            $.LoadingOverlay("show");

            $.ajax({
                url: '{{ route('p.bkupu') }}',
                data: params,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#formrabakunu").trigger('reset');
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(2);
                    } else if(id.status == 'warning'){
                        toastFun(2);
                        alert(id.message)
                    } else {
                        $('#modaleditbku').modal('hide');
                        toastFun(1);
                        console.log('disinikah')
                        // $("#buktiref").val(id.jumlah)
                        getData(bulannya);


                    }
                }
            })
        }

        $("#rabakun").on('change', function() {
            var v = $("#rabakun option:selected").text();
            v = v.split(" - ");
            var subkode = v[0].replace(/ +/g, '');
            var subnama = v[1];
            $("#nama_akun").val(subnama);
            $("#kode_akun").val(subkode);
        })
        //form dan btn rab kegiatan




        $("#submitbtnu").on('click', function() {
            $("#editdata").trigger('submit');
        });

        function staffdel(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/jenis-belanja/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {
                            toastFun(2);
                        }

                    }
                })

            }
        }

        function getData(id) {
            $.ajax({
                url: '{{ url('penerimaan/get-bku/') }}' + '/' + id,
                type: "get",
                success: function(dd) {
                    total = 0;
                    var html = ``;
                    var lastcheck = 0;
                    total = 0 + parseInt(kasawal);
                    dd.forEach((e, idx, array) => {
                        console.log(total, e.nilai, idx)
                        var dataget = JSON.stringify(e);
                        var text = dataget.replace(/"/g, '&quot;');
                        console.log(text, 'oy')
                        if (idx === array.length - 1) {
                            lastcheck = 1;
                        } else {
                            lastcheck = 0;

                        }
                        if (e.status == 1) {
                            total += parseInt(e.nilai);
                        } else {
                            total -= parseInt(e.nilai);

                        }
                        html += `
                        <tr>
                                    <td>${e.tanggal}</td>
                                    <td>${e.no_bukti}</td>
                                    <td>${e.uraian}</td>
                                    <td>
                                        ${e.status == 1 ? idr(e.nilai) : '-'}
                                        
                                    </td>
                                    <td>
                                        ${e.status == 2 ? idr(e.nilai) : '-'}

                                    </td>
                                    <td>
                                        ${idr(total)} 
                                    </td>
                                    <td>
                                        <button onclick="editbku(${text},${lastcheck})"
                                            class="btn btn-sm btn-warning">Edit </button>
                                            <button onclick="hapusbku(${e.id},${lastcheck})"
                                            class="btn btn-sm btn-danger">Hapus </button>
                                    </td>
                                </tr>
                        `;
                    });
                    $("#databody").html(html)
                    $("#tp").html(idr(total))

                    $.LoadingOverlay("hide");

                }
            })
        }

        function sync(id) {
            console.log(id);
            // return ;
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/penerimaan/referensi/sync/' + id,
                    type: "get",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 1) {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {
                            toastFun(2);
                        }

                    }
                })

            }
        }

        function delcabang(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/jenis-belanja/cabang/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {
                            toastFun(2);
                        }

                    }
                })

            }
        }


        function deldetail(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/rkakl/data-rkakl/jenis-belanja/detail/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1);

                            tabel.ajax.reload();

                        } else {
                            toastFun(2);
                        }

                    }
                })

            }
        }
        $("#editdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/rkakl/rab/edit') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $.LoadingOverlay("hide");
                    if (id.status == 'error') {
                        var data = id.data;
                        var elem;
                        var result = Object.keys(data).map((key) => [data[key]]);
                        elem =
                            '<div ><u>';
                        elem +=
                            '   <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button><ul>';
                        result.forEach(function(data) {
                            elem += '<li>' + data[0][0] + '</li>';
                        });
                        elem += '</ul></div>';
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(2);

                    } else {
                        toastFun(1);
                        $('#exampleLargeModalu').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function addkomponen(id, komponen) {

            $('#modalkomponen').modal('show');
            var html = '<option disabled selected>Pilih Komponen</option>';
            komponen.forEach((id) => {
                html +=
                    `<option value="${id.id}"> ${id.kode} - ${id.nama}</option>`;
            });
            $("#komponen").html(html);
            $("#id_rab_ro").val(id);

        }
        $("#komponen").on('change', function() {
            var v = $("#komponen option:selected").text();
            $("#rkom").val(v);
        });
        //form dan btn rab ro
    

        $("#subkomponen").on('change', function() {
            var v = $("#subkomponen option:selected").text();
            v = v.split(" - ");
            var subkode = v[0].replace(/ +/g, '');
            var subnama = v[1];
            $("#rnamakom").val(subnama);
            $("#rkodekom").val(subkode);
            // $("#rkom").val(v);
        });



        function idr(uang) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(uang);

        }
    </script>
@endpush
