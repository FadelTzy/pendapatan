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
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap gap-2">
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
                <h3 class="me-3 text-primary">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    Status : Draft
                    <!--end::Svg Icon-->
                </h3>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="#" class="btn btn-icon btn-color-success bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil005.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM16 13.5L12.5 13V10C12.5 9.4 12.6 9.5 12 9.5C11.4 9.5 11.5 9.4 11.5 10L11 13L8 13.5C7.4 13.5 7 13.4 7 14C7 14.6 7.4 14.5 8 14.5H11V18C11 18.6 11.4 19 12 19C12.6 19 12.5 18.6 12.5 18V14.5L16 14C16.6 14 17 14.6 17 14C17 13.4 16.6 13.5 16 13.5Z"
                                fill="currentColor" />
                            <rect x="11" y="19" width="10" height="2" rx="1"
                                transform="rotate(-90 11 19)" fill="currentColor" />
                            <rect x="7" y="13" width="10" height="2" rx="1"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->
                <!--begin::Button-->
                <a href="#" class="btn btn-icon btn-color-warning bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen005.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM12.5 18C12.5 17.4 12.6 17.5 12 17.5H8.5C7.9 17.5 8 17.4 8 18C8 18.6 7.9 18.5 8.5 18.5L12 18C12.6 18 12.5 18.6 12.5 18ZM16.5 13C16.5 12.4 16.6 12.5 16 12.5H8.5C7.9 12.5 8 12.4 8 13C8 13.6 7.9 13.5 8.5 13.5H15.5C16.1 13.5 16.5 13.6 16.5 13ZM12.5 8C12.5 7.4 12.6 7.5 12 7.5H8C7.4 7.5 7.5 7.4 7.5 8C7.5 8.6 7.4 8.5 8 8.5H12C12.6 8.5 12.5 8.6 12.5 8Z"
                                fill="currentColor" />
                            <rect x="7" y="17" width="6" height="2" rx="1"
                                fill="currentColor" />
                            <rect x="7" y="12" width="10" height="2" rx="1"
                                fill="currentColor" />
                            <rect x="7" y="7" width="6" height="2" rx="1"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
                <!--end::Button-->

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('content')
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <form id="formspp" action="">
                @csrf
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
                                    <input type="text" value="-" name="judul"
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
                                    <label for="exampleFormControlInput1" class="form-label">Jenis SPP</label>
                                    <select name="sp" required class="form-control form-sm form-control-solid"
                                        id="">
                                        <option selected disabled>Pilih Jenis SPP</option>
                                        @foreach ($sp as $item)
                                            <option value="{{ $item->nama }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Jenis Pembayaran</label>
                                    <input type="text" name="jp" value="Pengeluaran Anggaran"
                                        class="form-control form-sm form-control-solid" placeholder="Example input" />
                                </div>
                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Nomor</label>
                                    <input type="text" name="nomor" value="{{ $rspp->nomorspp }}"
                                        class="form-control form-sm form-control-solid" placeholder="" />
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                    <!--end::Col-->
                </div>
                <div class="row g-5 g-lg-10">
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
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="example">
                                    <!--begin::Table head-->
                                    <thead>
                                        <!--begin::Table row-->
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th>No</th>
                                            <th>COA</th>
                                            <th>Akun</th>
                                            <th>Anggaran</th>
                                            <th>Pagu</th>
                                            <th>Sisa</th>
                                            <th>Aksi</th>

                                        </tr>
                                        <!--end::Table row-->
                                    </thead>
                                    <tbody id="bodytabel">

                                    </tbody>
                                    <!--end::Table head-->
                                    <!--begin::Table body-->

                                </table>
                                <div class="table-responsive">
                                    <table id="trabs" class="table table-hover table-bordered" style="width:100%">
                                        <thead class="table-light">
                                            <tr>
                                                <th>No</th>
                                                <th>COA</th>
                                                <th>Akun</th>
                                                <th>Anggaran</th>
                                                <th>Pagu</th>
                                                <th>Sisa</th>
                                                <th>Realisasi</th>
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


                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-2">
                                    <label for="exampleFormControlInput1" class="form-label">Uraian Keperluan
                                        Belanja</label>
                                    <textarea name="uraian" id="" class="form-control" cols="30" rows="5"></textarea>
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
                                    <button data-bs-toggle="modal" type="button" data-bs-target="#modalAturan"
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


                    <div class="col-xl-6 mb-xl-10 col-sm-12">
                        <div class="card card-flush">
                            <!--begin::Body-->
                            <div class="card-body">

                                <div class="mb-10">
                                    <label for="" class="form-label">Supplier</label>
                                    <select class="form-select" name="supplier" id="select2" data-control="select2"
                                        data-placeholder="Select an option">
                                        <option selected disabled>Pilih Supplier</option>
                                        @foreach ($sup as $item)
                                            <option data-val="{{ $item }}" value="{{ $item->id }}">
                                                {{ $item->nama }} | {{ $item->alamat }} | {{ $item->nama_rek }}
                                                {{ $item->no_rek }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div id="infosup">

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
                                        @foreach ($pejabat as $item)
                                            <option data-val="{{ $item }}" value="{{ $item->id }}">
                                                {{ $item->nama }} - {{ $item->nip }} </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div id="infopkk">

                                </div>


                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
                <div class="row g-5 g-lg-10">


                    <!--begin::Col-->
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-danger">Kembali</button>
                        <div>
                            <button type="button" class="btn btn-warning">Draft</button>
                            <button type="button" id="submitspp" class="btn btn-primary">Simpan</button>
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

        var prr = [];
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#select2').select2();
            $('#select2p').select2();
            tabel = $("#trabs").DataTable({
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
                    {
                        orderable: false,
                        targets: 7,
                        width: "10%",
                    },

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: url + "/spm/realrabakun/" + "{{$rspp->id}}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'coanya',
                        data: 'coanya'
                    }, {
                        nama: 'nama',
                        data: 'nama'
                    },
                    {
                        nama: 'desc',
                        data: 'desc'
                    },

                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

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
                        nama: 'sisanya',
                        data: 'sisanya'
                    },
                    {
                        nama: 'realisasinya',
                        data: 'realisasinya'
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
                    $(tr.nextUntil('[role="row"]')).remove();
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

                    <td class='pt-1 pb-1' colspan='1'>${id['keterangan']} </td>
                    <td class='pt-1 pb-1' colspan='1'>${id['volume']} ${id['satuan']} * ${idr(id['hargasatuan'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['biaya'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['sisabiaya'])} </td>
                    <td class='pt-1 pb-1' colspan='1'> ${idr(id['realisasi'] ?? 0)} </td>


                    <td class='pt-1 pb-1'>   <ul class='list-inline mb-0'>
                 
              
                        <button onclick='ajukandetail(${JSON.stringify(id)},"${d['coanya']}","${d['namanya']}",${ JSON.stringify(d) })' class="btn btn-primary btn-sm">Ajukan</button>
             
               
                </ul> </td>
                </tr>`;
                nokro++;
            });


            return datarow;
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

        function deletee(id) {
            console.log(id);
            delete arr[id];
            var filtered = arr.filter(function(el) {
                return el != null;
            });
            arr = filtered;
            dataTable(arr)
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
        function rupiahkeluard(id) {
            var rp = id.value;
            let sisa = $("#hsisa").val();
            let real = $("#realisasisn").val();
            if (parseInt(rp) > parseInt(sisa)) {
                alert('Melebihi batas sisa anggaran');
                id.value = sisa;
                $("#rupiahkeluar").val(idr(id.value))

            }else{
                $("#rupiahkeluar").val(idr(rp))
            }
            $("#realisasiini").val(idr(parseInt(id.value) + parseInt(real)))
            $("#sisaini").val(idr(sisa - id.value))
        }
        function nightmare() {
            var html = '';
            var no = 1;
            console.log(arr, darr);
            arr.forEach((first, key) => {
                html += `<tr> 
                    <td> ${no++} </td>
                     <td> ${first.coa} </td>
                     <td> ${first.akun} </td>
                     <td> ${idr(first.keluar)} </td>
                     <td> ${idr(first.pagu)} </td>
                     <td> ${idr(first.pagu - first.keluar)} </td>

                     <td> <button onclick="deletee(${key})" class="btn btn-danger btn-sm"> Hapus </button> </td>
                    </tr>`;
                darr.forEach((element, key) => {
                    if (first.id == element.idakun) {
                        html += `<tr class='table-success'> 
                    <td> -> </td>
                     <td> ${element.keterangan} </td>
                     <td> ${element.volume} </td>
                     <td> ${idr(element.keluar)} </td>
                     <td> ${idr(element.pagu)} </td>
                     <td> ${idr(element.pagu - element.keluar)} </td>

                     <td> <button onclick="deleteed(${element.iddetail})" class="btn btn-danger btn-sm"> Hapus </button> </td>
                    </tr>`;
                    }

                })
            });
            $("#bodytabel").html(html);
        }

        function dataTable(id) {
            var html = '';
            var no = 1;
            id.forEach((element, key) => {
                html += `<tr> 
                    <td> ${no++} </td>
                     <td> ${element.coa} </td>
                     <td> ${element.akun} </td>
                     <td> ${idr(element.anggaran)} </td>
                     <td> ${idr(element.keluar)} </td>
                     <td> <button onclick="deletee(${key})" class="btn btn-danger btn-sm"> Hapus </button> </td>
                    </tr>`;
            });
            $("#bodytabel").html(html);
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
            console.log(item,'airsof')
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

            console.log(id);
            $("#modalAturan").modal('hide');
            prr.forEach(element => {
                if (element.nomor == id.nomor) {
                    adaa = 1;
                }
            });
            if (adaa) {
                console.log('ada nilainya')
            } else {

                var data = {
                    'nomor': id.nomor,
                    'id': id.id,
                    'tanggal': id.tanggal,
                };
                prr.push(data);
            }
            dataAturan(prr);
        }
        $("#saveDatad").on('click', function() {
            $("#editdatad").trigger('submit');
        });
        $("#editdatad").on('submit',function (idd) {
            var ada = false;
            var anggaran = $("#hanggaran").val();
            var id = $("#ida").val();
            var keluar = $("#pengeluaran").val();
            var coa = $("#coa").val();
            var akun = $("#akun").val();

            idd.preventDefault();
            var data = $(this).serialize();
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
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        console.log(elem)
                        round_error_noti(elem);
                    } else {
                        $('#exampleLargeModal').modal('hide');

                        tabel.ajax.reload();

                    }
                    $("#modalAjuand").modal('hide');
                }
            })
        })
        function saveData() {
        
            // arr.forEach(element => {
            //     if (element.id == id) {
            //         element.keluar = keluar;
            //         ada = 1;
            //     }
            // });
            // if (ada) {
            //     console.log('ada nilainya')
            // } else {
            //     var data = {
            //         'anggaran': anggaran,
            //         'id': id,
            //         'keluar': keluar,
            //         'coa': coa,
            //         'akun': akun
            //     };
            //     arr.push(data);
            // }
            // console.log(arr);
            // $("#pengeluaran").val(0);
            // $("#modalAjuan").modal('hide');

            // $("#modalAdd").modal('hide');
            // dataTable(arr);

        }

        function ubahAnggaran(idakun, keluar) {
            arr.forEach(element => {
                if (element.id == idakun) {
                    console.log(idakun, element.id, 'ini')
                    element.keluar = element.keluar - keluar;
                }
            });
        }

        function saveDatad() {
            var ada = false;
            var dada = false;

            var coa = $("#coad").val();
            var akun = $("#akund").val();
            var idakun = $("#ida").val();
            var pagu = $("#totalpagud").val();

            var volumeaju = $("#volumeaju").val();
            var keluar = $("#hpengeluarand").val();
            var total = $("#hanggarand").val();
            var belanja = $("#belanjad").val();
            var iddetail = $("#idd").val();
            var pagubelanja = $("#pagubelanja").val();


            darr.forEach(element => {
                if (element.iddetail == iddetail) {
                    element.volume = volumeaju;
                    ubahAnggaran(idakun, element.keluar);
                    element.keluar = keluar;
                    dada = 1;
                }
            });
            if (dada) {
                console.log('ada nilainya')
            } else {
                var ddata = {
                    'idakun': idakun,
                    'akun': akun,
                    'coa': coa,

                    'volume': volumeaju,
                    'iddetail': iddetail,
                    'keluar': keluar,
                    'keterangan': belanja,
                    'pagu': pagubelanja
                };
                darr.push(ddata);
            }

            arr.forEach(element => {
                if (element.id == idakun) {
                    ada = 1;
                    element.keluar = parseInt(element.keluar) + parseInt(keluar);
                }
            });
            if (ada) {
                console.log('ada nilainya')
            } else {

                var data = {
                    'id': idakun,
                    'keluar': keluar,
                    'coa': coa,
                    'akun': akun,
                    'pagu': pagu

                };
                arr.push(data);
            }

            nightmare();
            $("#pengeluaran").val(0);
            $("#modalAjuand").modal('hide');
            $("#modalAdd").modal('hide');
            // dataTable(arr);

        }
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
    <tr>
        <th style="width: 20%">Nama Rek</th>
        <th style="width: 1%">:</th>
        <th>Pejabat Pembuat Komitmen</th>
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
        })
        $(document).ready(function() {

        });
        $("#submitspp").on('click', function() {
            $("#formspp").trigger('submit');
        });
        $("#submitbtnu").on('click', function() {
            $("#d").trigger('submit');
        });
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
                url: '{{ route('spm.store') }}',
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
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
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
                        $("#listnotif").html(elem);
                        $("#listnotif").addClass('mt-2');
                        toastFun(0);

                    } else {
                        toastFun(1);
                        $('#modalAddu').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })

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
                    url: url + '/admin/akun/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {

                            tabel.ajax.reload();
                            toastFun(1);

                        } else {
                            toastFun(0);

                        }

                    }
                })

            }
        }
    </script>
@endpush
