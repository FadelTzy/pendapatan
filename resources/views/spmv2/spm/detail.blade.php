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
                <a href="#" class="btn btn-icon btn-color-primary bg-body w-35px h-35px w-lg-40px h-lg-40px me-3"
                    data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                    <span class="svg-icon svg-icon-2 svg-icon-md-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM11.7 17.7L16 14C16.4 13.6 16.4 12.9 16 12.5C15.6 12.1 15.4 12.6 15 13L11 16L9 15C8.6 14.6 8.4 14.1 8 14.5C7.6 14.9 8.1 15.6 8.5 16L10.3 17.7C10.5 17.9 10.8 18 11 18C11.2 18 11.5 17.9 11.7 17.7Z"
                                fill="currentColor" />
                            <path
                                d="M10.4343 15.4343L9.25 14.25C8.83579 13.8358 8.16421 13.8358 7.75 14.25C7.33579 14.6642 7.33579 15.3358 7.75 15.75L10.2929 18.2929C10.6834 18.6834 11.3166 18.6834 11.7071 18.2929L16.25 13.75C16.6642 13.3358 16.6642 12.6642 16.25 12.25C15.8358 11.8358 15.1642 11.8358 14.75 12.25L11.5657 15.4343C11.2533 15.7467 10.7467 15.7467 10.4343 15.4343Z"
                                fill="currentColor" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
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
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                    <!--begin::Card-->
                    <div class="card card-flush pt-3 mb-5 mb-xl-10">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2 class="fw-bold">Pengajuan SPP</h2>
                            </div>
                            <!--begin::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar d-flex justify-content-between">
                                <a target="_blank" style="margin-right: 8px"
                                    href="{{ url('spm/create/') . '/' . Request::segment(3) . '/' . 'cetakspp' }}"
                                    class="btn @if (Auth::user()->spp) @else
                                disabled @endif btn-light-primary">
                                    @if (Auth::user()->spp)
                                        Cetak SPP
                                    @else
                                        Tidak Dapat Cetak SPP
                                    @endif
                                </a>
                                <a target="_blank" style="margin-right: 8px"
                                    href="{{ url('spm/create/') . '/' . Request::segment(3) . '/' . 'cetakspm' }}"
                                    class="btn @if (Auth::user()->spm) @else
                                    disabled @endif  btn-light-success">
                                    @if (Auth::user()->spm)
                                        Cetak SPM
                                    @else
                                        Tidak Dapat Cetak SPM
                                    @endif
                                </a>
                                <a target="_blank" style="margin-right: 8px"
                                    href="{{ url('spm/create/') . '/' . Request::segment(3) . '/' . 'cetaksp2d' }}"
                                    class="btn @if (Auth::user()->sp2d) @else
                                    disabled @endif  btn-light-warning">
                                    @if (Auth::user()->sp2d)
                                        Cetak SP2D
                                    @else
                                        Tidak Dapat Cetak SP2D
                                    @endif
                                </a>
                                @if (count($pajak) == 1)
                                    <a target="_blank"
                                        href="{{ url('spm/create/') . '/' . Request::segment(3) . '/' . $pajak[0]->id . '/' . 'cetakpajak' }}"
                                        class="btn @if (Auth::user()->pajak) @else
                                    disabled @endif  btn-light-danger">
                                        @if (Auth::user()->pajak)
                                            Cetak Pajak
                                        @else
                                            Tidak Dapat Cetak Pajak
                                        @endif
                                    </a>
                                @endif

                                @if (count($pajak) > 1)
                                    <div class="dropdown">
                                        <button class="btn btn-light-danger dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Cetak Akun Pajak
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach ($pajak as $item)
                                                <li><a target="_blank"
                                                        href="{{ url('spm/create/') . '/' . Request::segment(3) . '/' . $item->id . '/' . 'cetakpajak' }}"
                                                        class="dropdown-item" href="#">Pajak
                                                        {{ $item->oPajak->kode }}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                @endif

                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-3">
                            <!--begin::Section-->
                            <div class="mb-10">
                                <!--begin::Title-->
                                <h2 class="mb-4">Tanggal Proses {{ $rs->proses }}</h2>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="d-flex flex-wrap py-5">
                                    <!--begin::Row-->
                                    <div class="flex-equal me-5">
                                        <!--begin::Details-->
                                        <table class="table fs-6 fw-semibold gs-0 gy-2 gx-2 m-0">
                                            @php
                                                $b = 0;
                                            @endphp
                                            @foreach ($rsp as $item)
                                                @php
                                                    $b += $item->sppini;
                                                @endphp
                                            @endforeach
                                            <!--begin::Row-->
                                            <tr>
                                                <td class="text-gray-400 min-w-200px w-200px">Pembayaran yang diminta</td>
                                                <td class="text-gray-800 min-w-200px">
                                                    @if ($rs->jenis == 2)
                                                    <a href="#"
                                                    class="text-gray-800 text-hover-primary">: @money($rs->oUp->nilai ?? 0, 'IDR', 'false')</a>
                                                       @else 
                                                       <a href="#"
                                                       class="text-gray-800 text-hover-primary">: @money($b, 'IDR', 'false')</a>
                                                       @endif
                                                </td>
                                            </tr>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <tr>
                                                <td class="text-gray-400">Keperluan</td>
                                                <td class="text-gray-800">: {{ $rs->uraian }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-400">Jenis Belanja</td>
                                                <td class="text-gray-800">: Belanja Barang</td>
                                            </tr>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <tr>
                                                <td class="text-gray-400">Atas Nama</td>
                                                <td class="text-gray-800">: {{ $rm->sup->nama }}</td>
                                            </tr>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <tr>
                                                <td class="text-gray-400">Alamat</td>
                                                <td class="text-gray-800">: {{ $rm->sup->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-gray-400">Jenis SPP</td>
                                                <td class="text-gray-800">: {{ $rm->sifat_pembayaran }}</td>
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
                            <!--begin::Section-->
                            <div class="mb-0">
                                <!--begin::Title-->
                                <h5 class="mb-4">Penjelasan:</h5>
                                <!--end::Title-->
                                <!--begin::Product table-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-4 mb-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr
                                                class="border-bottom border-gray-200 text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="">Akun</th>
                                                <th class="">Pagu</th>
                                                <th class="">SPP Sekarang</th>
                                                <th class="">SD Sekarang</th>
                                                <th class="">Sisa</th>

                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-semibold text-gray-800">
                                            @php
                                                $tpagu = 0;
                                                $tsek = 0;
                                                $tsd = 0;
                                                $tsisa = 0;
                                                
                                            @endphp
                                            @if ($rs->jenis == 2)
                                            <td>{{$rs->oUp->akun}}</td>
                                            <td>@money($rs->oRevisi->anggaran, 'idr', 'false')</td>
                                            <td>@money($rs->oUp->nilai, 'idr', 'false')</td>
                                            <td>@money($rs->oUp->nilai, 'idr', 'false')</td>
                                            <td>@money($rs->oRevisi->anggaran -$rs->oUp->nilai, 'idr', 'false')</td>
                                            @else
                                            @foreach ($rsp as $item)
                                                <tr>
                                                    @php
                                                        
                                                        $kodek = explode(' - ', $item->akun->oRabsub->oKom->oRo->oKros->nama_kegiatan)[0];
                                                        
                                                        $kodekro = explode(' - ', $item->akun->oRabsub->oKom->oRo->oKros->nama_kro)[0];
                                                    @endphp
                                                    <td>{{ $kodek }}.{{ $kodekro }}.{{ $item->akun->kode_akun }}
                                                    </td>
                                                    <td>@money($item->pagu, 'idr', 'false')</td>
                                                    @php
                                                        $tpagu += $item->pagu;
                                                        $tsek += $item->sppini;
                                                        $tsd += $item->sppini + $item->spplalu;
                                                        $tsisa += $item->sisadana;
                                                        
                                                    @endphp
                                                    <td>@money($item->sppini, 'idr', 'false')</td>
                                                    <td>@money($item->sppini + $item->spplalu, 'idr', 'false')</td>
                                                    <td>@money($item->sisadana, 'idr', 'false')</td>

                                                </tr>
                                            @endforeach
                                            
                                            <tr>
                                                <td>Total</td>
                                                <td>@money($tpagu, 'idr', 'false')</td>
                                                <td>@money($tsek, 'idr', 'false')</td>
                                                <td>@money($tsd, 'idr', 'false')</td>
                                                <td>@money($tsisa, 'idr', 'false')</td>

                                            </tr>
                                            @endif

                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Product table-->
                            </div>
                            <!--end::Section-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->


                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                    <!--begin::Card-->
                    <div class="card card-flush mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary"
                        data-kt-sticky-offset="{default: false, lg: '200px'}"
                        data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto"
                        data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>Informasi DIPA</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::More options-->
                                <a href="{{url('spm/edit/redirect/') .'/' . Request::segment(3)}}" class="btn btn-sm btn-light btn-icon" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
                                    <i class="fa fa-edit"></i>
                                    <!--end::Svg Icon-->
                                </a>

                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 fs-6">
                            <!--begin::Section-->
                            <div class="mb-5">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">

                                    <!--begin::Info-->
                                    <div class="d-flex flex-column">
                                        <!--begin::Name-->
                                        <a href="#"
                                            class="fs-4 fw-bold text-gray-900 text-hover-primary me-2">{{ $rs->no_dipa }}</a>
                                        <!--end::Name-->
                                        <!--begin::Email-->
                                        <a href="#"
                                            class="fw-semibold text-gray-600 text-hover-primary">{{ $rs->tanggal_dipa }}</a>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Info-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Seperator-->
                            <div class="separator separator-dashed mb-7"></div>
                            <!--end::Seperator-->
                            <!--begin::Section-->
                            <div class="mb-5">
                                <!--begin::Title-->
                                <h5 class="mb-3">Nomor</h5>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="mb-0">
                                    <!--begin::Plan-->
                                    <!--end::Plan-->
                                    <!--begin::Price-->
                                    <span class="fw-semibold text-gray-600">{{ $rs->nomorspp }}</span>
                                    <!--end::Price-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Seperator-->
                            <div class="separator separator-dashed mb-5"></div>
                            <!--end::Seperator-->
                            <!--begin::Section-->
                            <div class="mb-5">
                                <!--begin::Title-->
                                <h5 class="mb-4">Satker</h5>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="mb-0">
                                    <!--begin::Card info-->
                                    <div class="fw-semibold text-gray-600 d-flex align-items-center">{{ $set->satker }}
                                        ({{ $set->kode_satker }})

                                    </div>
                                    <!--end::Card info-->
                                    <!--begin::Card expiry-->
                                    <!--end::Card expiry-->
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Section-->
                            <!--begin::Seperator-->
                            <div class="separator separator-dashed mb-7"></div>
                            <!--end::Seperator-->
                            <!--begin::Section-->
                            <div class="mb-10">
                                <!--begin::Title-->
                                <!--end::Title-->
                                <!--begin::Details-->
                                <h5 class="mb-2">Penguji SPP / Penerbit SPP</h5>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="mb-4">
                                    <!--begin::Card info-->
                                    <div class="fw-semibold text-gray-600 d-flex align-items-center">{{ $set->penerbit }}

                                    </div>

                                </div>
                                <h5 class="mb-2">Pembuat Komitmen</h5>
                                <!--end::Title-->
                                <!--begin::Details-->
                                <div class="mb-0">
                                    <!--begin::Card info-->
                                    <div class="fw-semibold text-gray-600 d-flex align-items-center">
                                        {{ $rm->pejabatppk->nama }}

                                    </div>

                                </div>

                            </div>
                            <!--end::Section-->
                            <!--begin::Actions-->
                            <div class="mb-0">
                                <a href="add.html" class="badge badge-warning" id="kt_subscriptions_create_button">Status
                                    : Pengajuan
                                </a>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Post-->
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
    <!--end::Toast-->
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

        $(document).ready(function() {
            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "10%",

                    },
                    {
                        orderable: false,

                        targets: 2,
                        width: "40%",

                    },
                    {
                        orderable: false,

                        targets: 3,
                        width: "15%",

                    },


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('akun.indexv2') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'kode',
                        data: 'kode'
                    },
                    {
                        nama: 'nama',
                        data: 'nama'
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });
            const filterSearch = document.querySelector('[data-kt-docs-table-filter="search"]');
            filterSearch.addEventListener('keyup', function(e) {
                tabel.search(e.target.value).draw();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('')
                }
            });
            $('[name="startDate"]').flatpickr({
                enableTime: !0,
                dateFormat: "d-m-Y"
            });
            $('[name="endDate"]').flatpickr({
                enableTime: !0,
                dateFormat: "d-m-Y"
            });
        });
        $("#submitbtn").on('click', function() {
            $("#tambahdata").trigger('submit');
        });
        $("#submitbtnu").on('click', function() {
            $("#editdata").trigger('submit');
        });
        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('akun.store') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    console.log(id);
                    $.LoadingOverlay("hide");
                    $("#tambahdata").trigger('reset');
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
                        $('#modalAdd').modal('hide');
                        toastFun(1);
                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#editdata").on('submit', function(id) {
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

        function staffupd(id) {
            $('#modalAddu').modal('show');
            $("#idu").val(id.id);
            $("#namau").val(id.nama);
            $("#kodeu").val(id.kode);
        }
    </script>
@endpush
