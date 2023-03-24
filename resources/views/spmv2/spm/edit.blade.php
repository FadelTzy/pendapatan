@extends('layouts.appv2')

@push('prepend-style')
    <link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
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
                <h3 class="me-3 text-dark">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    Status : @if ($rspp->status == 0)
                        Draft
                    @else
                        Fixed
                    @endif
                    <!--end::Svg Icon-->
                </h3>



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
            <form id="formspp" action="#">
                @csrf
                <input type="hidden" id="jenisspp" value="{{ $rspp->jenis }}" name="jenisspp">
                <input type="hidden" name="idrspp" value="{{ $rspp->id }}">
                <input type="hidden" name="idrkakl" value="{{ $data->id }}">
                <input type="hidden" name="idrevisi" value="{{ $data->revici->id }}">
                <div class="row g-5 g-lg-10">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">Informasi
                        DIPA</a>

                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat h-xl-100"
                            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-4.svg') }}">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Satker</label>
                                    <input type="text" name="satker"
                                        value="{{ $set->satker }} ({{ $set->kode_satker }})"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal Proses</label>
                                    <input type="text" value="{{ $date }}" name="tanggalproses"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Judul</label>
                                    <input type="text" value="{{ $rspp->judul }}" name="judul"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat h-xl-100"
                            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-2.svg') }}">
                            <!--begin::Body-->
                            <!--begin::Body-->
                            <div class="card-body">
                                <input type="hidden" name="tahun" value="{{ $data->tahun_anggaran }}">
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor DIPA</label>
                                    <input type="text" name="nodipa"
                                        value="DIPA-023.17.2.{{ $set->kode_satker }}/{{ $data->tahun_anggaran }}"
                                        class="form-control form-sm form-control-solid" placeholder="Nomor DIPA" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Tanggal DIPA</label>
                                    <input type="text" name="tanggaldipa" value="{{ $data->revici->tanggal }}"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">KPPN</label>
                                    <input type="text" name="kppn" value="{{ $set->kppn }}"
                                        class="form-control form-sm form-control-solid" placeholder="" />
                                </div>
                            </div>
                            <!--end::Body-->
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-4 mb-xl-10">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat h-xl-100"
                            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-1.svg') }}">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis SPP
                                        {{ $rspp->jenis }}</label>
                                    <select name="sp" id="sp" required
                                        class="form-control form-sm form-control-solid" id="">
                                        <option selected disabled>Pilih Jenis SPP</option>
                                        @if ($rspp->oMaster)
                                            @foreach ($sp as $item)
                                                <option @if ($item->nama == $rspp->oMaster->sifat_pembayaran) selected @endif
                                                    value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($sp as $item)
                                                <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                            @endforeach
                                        @endif

                                    </select>

                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pembayaran</label>
                                    <input type="text" required name="jp"
                                        value="{{ $rspp->oMaster ? $rspp->oMaster->jenis_pembayaran : 'Pengeluaran Anggaran' }}"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor</label>
                                    <input type="text" name="nomorspp" value="{{ $rspp->nomorspp }}"
                                        class="form-control form-sm form-control-solid" placeholder="" />
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row g-5 g-lg-10 @if ($rspp->jenis == 2) @else
        d-none @endif    jenisup">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">SPP UP</a>

                    <div class="col-xl-12 mb-xl-12">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat h-xl-100"
                            style="background-position: right top; background-size: 30% auto; background-image: url({{ asset('assets/media/svg/shapes/abstract-4.svg') }}">
                            <!--begin::Body-->
                            <div class="card-body">
                                <input type="hidden" name="nilaiupterakhir" value="{{ $data->revici->anggaran }}">
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Total Pagu</label>
                                    <input type="text" name="totalpagu" value="@money($data->revici->anggaran, 'IDR', true)"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Akun</label>
                                    <input type="text"
                                        value="{{ $rspp->oUp ? $rspp->oUp->akun : '4471.000.000.000.825113' }}"
                                        name="akunup" class="form-control form-sm form-control-solid"
                                        placeholder="Kode Akun" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Nilai</label>
                                    <input type="text" value="{{ $rspp->oUp ? $rspp->oUp->nilai : 0 }}"
                                        name="nilaiup" class="form-control form-sm form-control-solid"
                                        placeholder="Rupiah" />
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                </div>
                <div
                    class="row g-5 g-lg-10 @if ($rspp->jenis == 1) @else
                    d-none @endif  classbelgar">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">Belanja Anggaran</a>
                    <div class="col-xl-12 mb-xl-10">
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
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                    height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                    fill="currentColor" />
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-docs-table-filter="search"
                                            class="form-control form-control-solid w-250px ps-14"
                                            placeholder="Cari Jenis Akun" />
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--end::Card title-->
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Add customer-->
                                    {{-- <button type="button" class="btn btn-primary">
                                        SPP Remun
                                        <input onclick="isremunn(this.val)" type="checkbox" name="isremun"
                                            @if ($rspp->isremun == 1) checked @endif id="isremun">
                                    </button> --}}
                                    <button data-bs-toggle="modal" type="button" data-bs-target="#modalAdd"
                                        class="btn btn-primary">Tambah
                                        Akun</button>


                                    <!--end::Add customer-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">

                                <div class="table-responsive">
                                    <table id="trabs" class="table table-hover table-bordered" style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>COA</th>
                                                <th>Akun</th>
                                                <th>Pagu</th>
                                                <th>Sisa</th>
                                                <th>Realisasi</th>
                                                <th>Anggaran</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>


                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-lg-10">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">Uraian Keperluan Belanja &
                        Dasar Pembayaran</a>
                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Uraian Keperluan
                                        Belanja</label>
                                    <textarea name="uraian" id="" class="form-control" cols="30" rows="5">{{ $rspp->uraian }}</textarea>
                                </div>


                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <!--begin::Card header-->
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <div class="card-title">
                                    <h6>Dasar Pembayaran</h6>
                                </div>
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Add customer-->
                                    <button @if ($rspp->oMaster)
                                        @else
                                        disabled
                                    @endif data-bs-toggle="modal" type="button" data-bs-target="#modalAturan"
                                        class="btn btn-primary">Tambah
                                    </button>
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="example2">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No Peraturan</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>


                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <tbody id="bodytabela">
                                        @foreach ($dpa as $item)
                                            <tr>
                                                <td>{{ $item->nomor }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td> <button type="button" onclick="hdp({{ $item->id }})"
                                                        class="btn btn-danger btn-sm"> cancel </button> </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->

                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-lg-10">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">Supplier & Pejabat Pembuat
                        Komitmen</a>


                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-10">
                                    <label for="" class="form-label">Supplier</label>
                                    <select class="form-select" name="supplier" id="select2" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option selected disabled>Pilih Supplier</option>
                                        @if ($rspp->oMaster)
                                            @foreach ($sup as $item)
                                                <option @if ($item->id == $rspp->oMaster->id_supplier) selected @endif
                                                    data-val="{{ $item }}" value="{{ $item->id }}">
                                                    {{ $item->nama }} | {{ $item->alamat }} | {{ $item->nama_rek }}
                                                    {{ $item->no_rek }}</option>
                                            @endforeach
                                        @else
                                            @foreach ($sup as $item)
                                                <option data-val="{{ $item }}" value="{{ $item->id }}">
                                                    {{ $item->nama }} | {{ $item->alamat }} | {{ $item->nama_rek }}
                                                    {{ $item->no_rek }}</option>
                                            @endforeach
                                        @endif


                                    </select>
                                </div>
                                <div id="infosup">
                                    @if ($rspp->oMaster)
                                        <label for="" class="form-label">Info Supplier</label>
                                        <table class="table table-striped table-info">
                                            <tr>
                                                <th style="width: 20%">Nama</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->sup->nama }}</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Alamat</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->sup->alamat }}</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Nama Rek</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->sup->nama_rek }}</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Nomor Rek</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->sup->no_rek }}</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">NPWP</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->sup->npwp }}</th>

                                            </tr>
                                        </table>
                                    @endif

                                </div>


                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-10">
                                    <label for="" class="form-label">Pejabat Pembuat Komitmen</label>
                                    <select class="form-select" name="pejabat" id="select2p" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option selected disabled>Pilih Pejabat Pembuat Komitmen</option>
                                        @if ($rspp->oMaster)
                                            @foreach ($pejabat as $item)
                                                <option @if ($item->id == $rspp->oMaster->ppk) selected @endif
                                                    data-val="{{ $item }}" value="{{ $item->id }}">
                                                    {{ $item->nama }} - {{ $item->nip }} </option>
                                            @endforeach
                                        @else
                                            @foreach ($pejabat as $item)
                                                <option data-val="{{ $item }}" value="{{ $item->id }}">
                                                    {{ $item->nama }} - {{ $item->nip }} </option>
                                            @endforeach
                                        @endif


                                    </select>
                                </div>
                                <div id="infopkk">
                                    @if ($rspp->oMaster)
                                        <label for="" class="form-label">Info Pejabat</label>

                                        <table class="table table-striped table-info">
                                            <tr>
                                                <th style="width: 20%">Nama</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->pejabatppk->nama }}</th>
                                            </tr>
                                            <tr>
                                                <th style="width: 20%">Nip</th>
                                                <th style="width: 1%">:</th>
                                                <th>{{ $rspp->oMaster->pejabatppk->nip }}</th>
                                            </tr>


                                        </table>
                                    @endif

                                </div>


                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-lg-10">
                    <a href="#" class="card-title  fw-bold  text-hover-primary fs-4">Akun Pajak</a>
                    <div class="col-xl-12 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <!--begin::Card header-->
                            <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                <div class="card-title">
                                    <h6>Akun Pajak</h6>
                                </div>
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Add customer-->
                                    <button data-bs-toggle="modal" type="button" data-bs-target="#modalSpp"
                                        class="btn btn-primary">Tambah
                                    </button>
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body pt-0">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="tablepajak">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>Kode</th>
                                            <th>Uraian</th>
                                            <th>Nilai</th>
                                            <th>Aksi</th>

                                        </tr>
                                        <!--end::Table row-->
                                    </thead>

                                    <!--end::Table head-->
                                    <!--begin::Table body-->

                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                            <!--end::Body-->
                        </div>
                    </div>

                </div>
                <div class="row g-5 g-lg-10">


                    <!--begin::Col-->
                    <div class="d-flex justify-content-between">
                        <a href="{{ url('spm') }}" type="button" class="btn btn-danger">Kembali</a>
                        <div>
                            @if ($rspp->status == 0)
                                <button type="button" class="btn btn-warning">Drafted</button>
                            @else
                                <button type="button" class="btn btn-warning">Fixed</button>
                                <a target="_blank" href="{{ url('spm/create/') . '/' . $rspp->id }}" type="button"
                                    class="btn btn-success">Detail</a>
                            @endif
                            <button type="button" id="submitsppp" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>


                </div>
            </form>
        </div>
        <!--end::Post-->
    </div>
    @include('spmv2.spm.includec.modal')
@endsection


@push('prepend-script')
@endpush

@push('addon-script')
    <script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>

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
        var arr = [];
        var darr = [];
        var total = 0;
        var prr = [];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#sp').on('change', function() {
            if (this.value == '300 - UP & GUP & TUP') {
                $("#jenisspp").val(2);
                $(".classbelgar").addClass('d-none')
                $(".jenisup").removeClass('d-none')


            } else {
                $("#jenisspp").val(1);
                $(".classbelgar").removeClass('d-none')
                $(".jenisup").addClass('d-none')

            }
        });

        function turnoff(id) {
            console.log(id, 'tes');
            // return 0;
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('spm.deletersppd') }}',
                data: {
                    id: id
                },
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
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


                        console.log(elem)
                        toastFun(2);
                    } else {
                        toastFun(1);
                        alert('berhasil menyimpan data');
                        // window.location.replace(url + '/spm/create/' + id.data.id);

                    }
                }
            })
        }
        $(document).ready(function() {

            $("#formspp").on('submit', function(id) {
                id.preventDefault();
                var data = $(this).serializeArray();

                data.push({
                    name: 'dasarpembayaran',
                    value: JSON.stringify(prr)
                });
                console.log(data);
                var akun = arr;
                $.LoadingOverlay("show");
                $.ajax({
                    url: '{{ route('spm.storeedit') }}',
                    data: data,
                    type: "POST",
                    success: function(id) {
                        console.log(id);
                        $.LoadingOverlay("hide");
                        if (id.status == 'error') {
                            var data = id.data;
                            var elem;
                            if (id.tipe) {
                                elem = id.pesan;
                            } else {
                                var resultk = Object.keys(data);

                                resultk.forEach(element => {
                                    if (element == 'pejabat') {
                                        $("[name='pejabat']").addClass('is-invalid')
                                        $("#select2p").select2();
                                    }

                                    if (element == 'supplier') {
                                        $("[name='supplier']").addClass('is-invalid')
                                        $("#select2").select2();
                                    }
                                    if (element == 'sp') {
                                        $("[name='sp']").addClass('is-invalid')
                                    }
                                    console.log(element)
                                });
                                var result = Object.keys(data).map((key) => [data[key]]);
                                elem =
                                    '<div><ul>';
                                result.forEach(function(data, r) {
                                    // console.log(r,'gakta')
                                    elem += '<li>' + data[0][0] + '</li>';
                                });
                                elem += '</ul></div>';
                            }


                            // return 0;



                            $("#tostb").html(elem);
                            toastFun(2);
                        } else {
                            toastFun(1);
                            alert('berhasil menyimpan data');
                            // window.location.replace(url + '/spm/create/' + id.data.id);

                        }
                    }
                })


            })
            $('#select2').select2();
            // $('#select2').select2('data', {id: '2', text: 'montres'});

            $('#select2pajakk').select2();

            $('#select2p').select2();
            tabelpajak = $("#tablepajak").DataTable({

                columnDefs: [{
                        targets: 0,
                        width: "2%",
                    },
                    {
                        targets: 1,
                        width: "40%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "10%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: url + "/admin/getpajak/" + "{{ $rspp->id }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'jumlah',
                        data: function(id) {
                            return id['o_pajak']['uraian']
                        }
                    }, {
                        nama: 'jumlah',
                        data: function(id) {
                            return idr(parseInt(id['jumlah']))
                        }
                    },
                    {
                        nama: 'aksi',
                        data: 'aksi'
                    },

                ],

            });
            tabel = $("#trabs").DataTable({
                "drawCallback": function(settings) {
                    var api = this.api();

                    $(".downrabakunn").trigger('click')
                    var n = api
                        .column(8)
                        .data()
                        .reduce(function(a, b) {
                            return parseInt(a) + parseInt(b);
                        }, 0);
                    total = n;
                    console.log(idr(n), 'total');
                },
                columnDefs: [{
                        targets: 0,
                        width: "2%",
                    },
                    {
                        targets: 1,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "15%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },
                    {
                        orderable: false,
                        targets: 4,
                        width: "15%",
                    },
                    {
                        orderable: false,
                        targets: 5,
                        width: "15%",
                    },
                    {
                        orderable: false,
                        targets: 6,
                        width: "15%",
                    },
                    {
                        orderable: false,
                        targets: 7,
                        width: "10%",
                    },
                    {
                        orderable: false,
                        visible: false,
                        targets: 8,

                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: url + "/spm/realrabakun/" + "{{ $rspp->id }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'coanya',
                        data: 'coanya'
                    }, {
                        nama: 'namanya',
                        data: 'namanya'
                    },
                    {
                        nama: 'pagunya',
                        data: 'pagunya'
                    },
                    {
                        nama: 'sisanya',
                        data: 'sisanya'
                    },
                    {
                        nama: 'realisasinya',
                        data: 'realisasinya'
                    },
                    {
                        nama: 'anggarannya',
                        data: function(d) {
                            return idr(d['anggarannya'])
                        }
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    },
                    {
                        nama: 'anggarannya',
                        data: 'anggarannya'

                    },
                ],

            });
            $('#trabs tbody').on('click', '.downrabakunn', function() {
                var tr = $(this).closest('tr');
                var rowt = tabel.row(tr);
                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    $(tr.nextUntil('.ada')).remove();
                } else {
                    $(tr).addClass('ada');

                    $(tr).after(formattabel(rowt.data()));
                }
            });
            susunrab = $("#susunrab").DataTable({
                "drawCallback": function(settings) {
                    var api = this.api();

                    $(".downrabakun").trigger('click')
                },
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "20%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "10%",

                    },
                    {
                        orderable: false,
                        targets: 4,
                        width: "10%",
                    },
                    {
                        orderable: false,
                        targets: 5,
                        width: "10%",

                    },
                    {
                        orderable: false,
                        targets: 6,

                        width: "10%",
                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('get.rabakun') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'coanya',
                        data: 'coanya'
                    }, {
                        nama: 'namanya',
                        data: 'namanya'
                    },
                    {
                        nama: 'pagunya',
                        data: 'pagunya'
                    },

                    {
                        nama: 'realisasinya',
                        data: 'realisasinya'
                    },
                    {
                        nama: 'sisanya',
                        data: 'sisanya'
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });
            $('#susunrab tbody').on('click', '.downrabakun', function() {
                var tr = $(this).closest('tr');
                var row = susunrab.row(tr);
                if ($(tr).hasClass('ada')) {
                    $(tr).removeClass('ada');
                    $(tr.nextUntil('.ada')).remove();
                } else {
                    $(tr).addClass('ada');

                    $(tr).after(format(row.data()));
                }
            });
        });

        //get datatable susunrab
        // if ($.fn.DataTable.isDataTable("#susunrab")) {
        //     $('#susunrab').DataTable().clear().destroy();
        // }
        function hdp(d) {
            $.LoadingOverlay("show");
            let id = '{{ Request::segment(4) }}';
            // alert(id);
            // return 1;
            $.ajax({
                url: '{{ route('cancel.dp') }}',
                data: {
                    dp: d,
                    id: id
                },
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

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


                        console.log(elem)
                        round_error_noti(elem);
                    } else {

                        alert('berhasil mencancel data');
                    }
                }
            })
        }

        function format(d) {
            // `d` is the original data object for the row
            var datarow = '';
            var nokro = 1;
            datarow += `<tr class='table-info table-sm' > 
                <th class="table-success" colspan="7">Detail Belanja</th></tr>`;
            if (d['m_detail'].length == 0) {
                datarow += `<tr class='table-info table-sm' > 
                <th class="table-danger text-center" colspan="7">Tidak ada detail RAB</th></tr>`;
            }
            console.log(d);
            d['m_detail'].forEach((id, key) => {
                var dj = JSON.stringify(id)
                var datarr = id;
                datarow += `<tr id='datarab-${nokro}' data-last='${((d['m_detail'].length - 1) == key  ) ? "1" : "0"}'  class='table-info table-sm' > 
                    <td class='pt-1 pb-1' colspan='1'> -> </td>

                    <td class='pt-1 pb-1' colspan='1'>${id['keterangan']} - ${id['unit']} </td>
                    <td class='pt-1 pb-1' colspan='1'>${id['volume']} ${id['satuan']} * ${idr(id['hargasatuan'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['realisasi'] ?? 0)} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['sisabiaya'])} </td>


                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                        <button onclick='ajukandetail(${JSON.stringify(id)},"${d['coanya']}","${d['namanya']}",${ JSON.stringify(d) })' class="btn btn-primary btn-sm">Ajukan</button>
             
               
                </ul> </td>
                </tr>`;
                nokro++;
            });


            return datarow;
        }

        function formattabel(d) {

            // `d` is the original data object for the row
            var datarow = '';
            var noft = 1;
            datarow += `<tr class='table-info ' > 
                <th class="table-success" colspan="8">Detail Belanja</th></tr>`;
            if (d['rsppd'].length == 0) {
                datarow += `<tr class='table-info ' > 
                <th class="table-danger text-center" colspan="8">Tidak ada detail RAB</th></tr>`;
            }
            d['rsppd'].forEach((id, key) => {
                console.log(id, 'reala');
                var dj = JSON.stringify(id)
                var datarr = id;
                datarow +=
                    `<tr id='dataft-${noft}' data-ft='${((d['rsppd'].length - 1) == key  ) ? "1" : "0"}'  class='table-info ' > 
                    <td class='pt-1 pb-1' colspan='1'> -> </td>

                    <td class='pt-1 pb-1' colspan='1'>${d['coanya']} </td>
                    <td class='pt-1 pb-1' colspan='1'>${id['rabdetail']['keterangan']} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['pagu'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['sisadana'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['rabdetail']['realisasi'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['sppini'])} </td>
                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                        <button onclick='turnoff(${id['id']})' type='button' class='btn btn-sm btn-danger'>Hapus </button>`;

                if ('{{ $rspp->isremun }}' == 1) {
                    if (id['o_pajak']) {
                        datarow +=
                            `<button onclick='pajakspp(${id['id']})' type='button' class='btn btn-sm btn-success'>Cek Pajak Remun </button>`;
                    } else {
                        datarow +=
                            `<button onclick='pajakspp(${id['id']})' type='button' class='btn btn-sm btn-primary'>Tambah Pajak Remun </button>`;
                    }

                } else {
                    datarow += `-`;
                }



                datarow += `</ul> </td>
                </tr>`;
                noft++;
            });


            return datarow;
        }

        function isremunn(id) {
            if ($('#isremun').is(':checked')) {
                funcremun(1);
            } else {
                funcremun(0);
            }
        }

        function funcremun(d) {
            $.LoadingOverlay("show");
            let did = '{{ Request::segment(4) }}';
            $.ajax({
                url: '{{ route('rsppd.post') }}',
                data: {
                    dp: d,
                    id: did
                },
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

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


                        console.log(elem)
                        round_error_noti(elem);
                    } else {
                        alert('berhasil mengubah data');
                    }
                }
            })
            window.location.replace(url + '/spm/edit/redirect/' + did);

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

        function pajakspp(id) {
            $.LoadingOverlay("show");
            // alert(id);
            // return 1;
            $.ajax({
                url: '{{ route('rsppd.pajak') }}',
                data: {
                    id: id
                },
                type: "GET",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#modalSpp").modal('show')
                    $("#totalrsppd").val(id.sppini)
                    $("#idrsppdpajak").val(id.id);
                    if (id.o_pajak) {
                        $("#select2pajakk").val(id.o_pajak.id_pajak).trigger('change');
                        $("#ppnrsppd").val(id.o_pajak.persen);
                        tabel.ajax.reload();
                    }

                }
            })
        }

        function deleteea(id) {
            console.log(id);
            delete prr[id];
            var filtered = prr.filter(function(el) {
                return el != null;
            });
            prr = filtered;
            dataAturan(prr)
        }

        function delpaj(id) {
            data = confirm("Klik Ok Untuk Melanjutkan");
            if (data) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.LoadingOverlay("show");

                $.ajax({
                    url: url + '/admin/delpajak/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            toastFun(1)
                            tabelpajak.ajax.reload();

                        } else {

                            toastFun(2)
                        }

                    }
                })

            }
        }

        function rupiahkeluard(id) {
            var rp = id.value;
            let sisa = $("#hsisa").val();
            let real = $("#realisasisn").val();
            if (parseInt(rp) > parseInt(sisa)) {
                alert('Melebihi batas sisa anggaran');
                id.value = sisa;
                $("#rupiahkeluar").val(idr(id.value))

            } else {
                $("#rupiahkeluar").val(idr(rp))
            }
            $("#realisasiini").val(idr(parseInt(id.value) + parseInt(real)))
            $("#sisaini").val(idr(sisa - id.value))
        }



        function dataAturan(id) {
            var html = '';
            var no = 1;
            id.forEach((element, key) => {
                html += `<tr> 
                     <td> ${element.nomor} </td>
                     <td> ${element.tanggal} </td>
                     <td> <button onclick="deleteea(${key})" class="btn btn-danger btn-sm"> Hapus </button> </td>
                    </tr>`;
            });
            $("#bodytabela").html(html);
        }

        function ajukan(id, coa) {
            console.log(id, coa);
            $("#modalAjuan").modal('show')
            $("#hanggaran").val(id.biaya);
            $("#ida").val(id.id)
            $("#coa").val(coa);
            $("#akun").val(id.kode_akun + ' ' + id.nama_akun);
            $("#anggaran").val(idr(id.biaya));
        }

        function ajukandetail(id, coa, akun, item) {
            console.log(item, 'airsof')
            $("#editdatad").trigger('reset');
            $("#totalpagud").val(item.biaya)
            $("#pagubelanja").val(id.biaya)
            $("#sisabelanja").val(id.sisabiaya)
            $("#realisasirab").val(idr(id.realisasi));
            $("#realisasisn").val(id.realisasi);

            $("#modalAjuand").modal('show')

            $("#hanggarand").val(id.biaya);
            $("#anggarand").val(idr(id.biaya));
            $("#hsisa").val(id.sisabiaya);
            $("#sisa").val(idr(id.sisabiaya));
            $("#belanjad").val(id.keterangan);
            $("#idd").val(id.id)
            $("#idakun").val(id.id_rab_akun)
            $("#ida").val(item.id)



            $("#coad").val(coa);
            $("#akund").val(akun);

        }





        function ajuaturan(id) {
            var adaa = false;
            let iddp = id.id;
            // alert(iddp);
            // return 0;
            $.LoadingOverlay("show");
            let did = '{{ Request::segment(4) }}';
            // alert(id);
            // return 1;
            $.ajax({
                url: '{{ route('add.dp') }}',
                data: {
                    dp: iddp,
                    id: did
                },
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");

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


                        console.log(elem)
                        round_error_noti(elem);
                    } else {

                        alert('berhasil menambah data');
                    }
                }
            })

        }
        $("#saveDatad").on('click', function() {
            $("#editdatad").trigger('submit');
        });
        $("#editdatad").on('submit', function(idd) {
            var ada = false;
            var anggaran = $("#hanggaran").val();
            var id = $("#ida").val();
            var coa = $("#coa").val();
            var akun = $("#akun").val();

            var keluar = $("#pengeluarand").val();
            var sisa = $("#hsisa").val();
            var data = $(this).serialize();

            idd.preventDefault();

            if ((sisa - keluar) < 0) {
                alert('Anggaran Minus')
            } else {
                console.log(sisa, keluar);
                $.LoadingOverlay("show");
                $.ajax({
                    url: '{{ route('post.rabakun') }}',
                    data: new FormData(this),
                    type: "POST",
                    contentType: false,
                    processData: false,
                    success: function(id) {
                        console.log(id);
                        $.LoadingOverlay("hide");
                        tabel.ajax.reload();
                        susunrab.ajax.reload();

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


                            console.log(elem)
                            round_error_noti(elem);
                        } else {
                            $('#exampleLargeModal').modal('hide');


                        }
                        $("#modalAjuand").modal('hide');
                    }
                })

            }

        })



        $("#select2p").on('change', function() {
            var data = $(this).find(':selected').data('val')
            var html = ` <label for="" class="form-label">Info Pejabat</label>

<table class="table table-striped table-info">
    <tr>
        <th style="width: 20%">Nama</th>
        <th style="width: 1%">:</th>
        <th>${data.nama}</th>
    </tr>
    <tr>
        <th style="width: 20%">Nip</th>
        <th style="width: 1%">:</th>
        <th>${data.nip}</th>
    </tr>

</table>`;
            $("#infopkk").html(html);
        })
        $("#select2").on('change', function() {
            var data = $(this).find(':selected').data('val')
            var html = ` <label for="" class="form-label">Info Supplier</label>

<table class="table table-striped table-info">
    <tr>
        <th style="width: 20%">Nama</th>
        <th style="width: 1%">:</th>
        <th>${data.nama}</th>
    </tr>
    <tr>
        <th style="width: 20%">Alamat</th>
        <th style="width: 1%">:</th>
        <th>${data.alamat}</th>
    </tr>
    <tr>
        <th style="width: 20%">Nama Rek</th>
        <th style="width: 1%">:</th>
        <th>${data.nama_rek}</th>
    </tr>
    <tr>
        <th style="width: 20%">Nomor Rek</th>
        <th style="width: 1%">:</th>
        <th>${data.no_rek}</th>
    </tr>
    <tr>
        <th style="width: 20%">NPWP</th>
        <th style="width: 1%">:</th>
        <th>${data.npwp}</th>
    </tr>
</table>`;
            $("#infosup").html(html);
        });

        $("#select2pajakk").on('change', function() {
            var totalrsppd = $("#totalrsppd").val();
            var data = $(this).find(':selected').data('val')
            var html = ` <label for="" class="form-label">Info Akun Pajak</label>

                <table class="table table-striped table-info">
                    <tr>
                        <th style="width: 20%">Kode</th>
                        <th style="width: 1%">:</th>
                        <th>${data.kode}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%">Uraian</th>
                        <th style="width: 1%">:</th>
                        <th>${data.uraian}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%">Nilai</th>
                        <th style="width: 1%">:</th>
                        <th><input type="number" id="ppnrsppd" onkeyup="getPajak2(this)" class="form-control" name="nilai"></th>
                    </tr>
                    
                    <tr>
                        <th style="width: 20%">Jumlah Pajak</th>
                        <th style="width: 1%">:</th>
                        <th><input id="jumlah_pajak2" readonly type="text" class="form-control" name="jumlah_pajak"></th>
                    </tr>
                
                </table>`;
            $("#infopajakk").html(html);
        });
        $("#select2pajakku").on('change', function() {
            var data = $(this).find(':selected').data('val')
            var html = ` <label for="" class="form-label">Info Akun Pajak</label>

                <table class="table table-striped table-info">
                    <tr>
                        <th style="width: 20%">Kode</th>
                        <th style="width: 1%">:</th>
                        <th>${data.kode}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%">Uraian</th>
                        <th style="width: 1%">:</th>
                        <th>${data.uraian}</th>
                    </tr>
                    <tr>
                        <th style="width: 20%">Nilai</th>
                        <th style="width: 1%">:</th>
                        <th><input type="number" id="spppajaku"  onkeyup="getPajak3(this)" class="form-control" name="nilai"></th>
                    </tr>
                    
                    <tr>
                        <th style="width: 20%">Jumlah Pajak</th>
                        <th style="width: 1%">:</th>
                        <th><input id="jumlah_pajak3" readonly type="text" class="form-control" name="jumlah_pajak"></th>
                    </tr>
                
                </table>`;
            $("#infopajakku").html(html);
        });
        $("#submitsppp").on('click', function() {
            $("#formspp").trigger('submit');
        });
        $("#rsppdbtn").on('click', function() {
            $("#rsppdfrom").trigger('submit');
        });
        $("#rsppdbtnu").on('click', function() {
            $("#rsppdfromu").trigger('submit');
        });
        $("#submitbtnu").on('click', function() {
            $("#d").trigger('submit');
        });
        $("#rsppdfrom").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();


            console.log(data);
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rsppdpajak2.post') }}',
                data: data,
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    tabelpajak.ajax.reload();
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


                        console.log(elem)
                        toastFun(2);
                    } else {
                        toastFun(1);
                        alert('berhasil menyimpan data');
                        // window.location.replace(url + '/spm/create/' + id.data.id);

                    }
                }
            })


        })
        $("#rsppdfromu").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();


            console.log(data);
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('rsppdpajak2.edit') }}',
                data: data,
                type: "POST",
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    tabelpajak.ajax.reload();
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


                        console.log(elem)
                        toastFun(2);
                    } else {
                        toastFun(1);
                        alert('berhasil menyimpan data');
                        // window.location.replace(url + '/spm/create/' + id.data.id);

                    }
                }
            })


        })

        function getPajak(d) {
            var p = d.value;
            var total_pajak = 0.01 * p * parseInt(total);
            $("#jumlah_pajak").val(idr(parseInt(total_pajak)));
        }

        function getPajak2(d) {
            var p = d.value;
            var total_pajak = p;
            $("#jumlah_pajak2").val(idr(parseInt(total_pajak)));
        }

        function getPajak3(d) {
            var p = d.value;
            var total_pajak = p;
            $("#jumlah_pajak3").val(idr(parseInt(total_pajak)));
        }

        function updpaj(id) {
            $("#modalSppu").modal('show');
            $("#select2pajakku").val(id.id_pajak).trigger('change');
            $("#spppajaku").val(id.jumlah);
            $("#jumlah_pajak3").val(idr(parseInt(id.jumlah)))
            $("#rppsdpajaku").val(id.id);
            console.log(id);
        }

        function joinlex() {
            $("#formspp").on('submit', function(id) {
                id.preventDefault();
                var data = $(this).serializeArray();
                data.push({
                    name: 'akun',
                    value: JSON.stringify(arr)
                });
                data.push({
                    name: 'detail',
                    value: JSON.stringify(darr)
                });
                data.push({
                    name: 'dasarpembayaran',
                    value: JSON.stringify(prr)
                });
                console.log(data);
                var akun = arr;
                $.LoadingOverlay("show");
                $.ajax({
                    url: '{{ route('spm.storeedit') }}',
                    data: data,
                    type: "POST",
                    success: function(id) {
                        console.log(id);
                        $.LoadingOverlay("hide");
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


                            console.log(elem)
                            toastFun(2);
                        } else {
                            toastFun(1);
                            alert('berhasil menyimpan data');
                            window.location.replace(url + '/spm/create/' + id.data.id);

                        }
                    }
                })


            })
        }


        function idr(uang) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(uang);
        }
        $("#d").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/akun/edit') }}',
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


                        toastFun(0);

                    } else {
                        toastFun(1);
                        $('#modalAddu').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })
    </script>
@endpush
