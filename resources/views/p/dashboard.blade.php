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
            {{-- <div class="row g-5 g-xl-10" data-select2-id="select2-data-151-8boo">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Engage widget 1-->
                    <div class="card h-md-100">
                        <!--begin::Body-->
                        <div class="card-body d-flex flex-column flex-center">
                            <!--begin::Heading-->
                            <div class="mb-2">
                                <!--begin::Title-->
                                <h1 class="fw-semibold text-gray-800 text-center lh-lg">Selamat Datang di
                                    <br>SIMENKEU UNM <br>
                                    <span class="fw-bolder">Buat SPP Baru</span>
                                </h1>
                                <!--end::Title-->
                                <!--begin::Illustration-->
                                <div class="py-10 text-center">
                                    <img src="{{ asset('assets/media/svg/illustrations/easy/2.svg') }}"
                                        class="theme-light-show w-200px" alt="">
                                    <img src="{{ asset('assets/media/svg/illustrations/easy/2-dark.svg') }}"
                                        class="theme-dark-show w-200px" alt="">
                                </div>
                                <!--end::Illustration-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Links-->
                            <div class="text-center mb-1">
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-primary me-2" data-bs-target="#kt_modal_create_app"
                                    data-bs-toggle="modal">Add New</a>
                                <!--end::Link-->
                                <!--begin::Link-->
                                <a class="btn btn-sm btn-light"
                                    href="/metronic8/demo20/../demo20/account/settings.html">Riwayat SPP</a>
                                <!--end::Link-->
                            </div>
                            <!--end::Links-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 1-->
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-xl-8" data-select2-id="select2-data-150-9fnr">
                    <!--begin::Table Widget 4-->
                    <div class="card card-flush h-xl-100">
                        <!--begin::Card header-->
                        <div class="card-header pt-7">
                            <!--begin::Title-->
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">My Sales in Details</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Avg. 57 orders per day</span>
                            </h3>
                            <!--end::Title-->
                            <!--begin::Actions-->
                            <div class="card-toolbar">
                                <!--begin::Filters-->
                                <div class="d-flex flex-stack flex-wrap gap-4">
                                    <!--begin::Destination-->
                                    <div class="d-flex align-items-center fw-bold">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Cateogry</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-select2-id="select2-data-7-9934" tabindex="-1" aria-hidden="true"
                                            data-kt-initialized="1">
                                            <option></option>
                                            <option value="Show All" selected="selected"
                                                data-select2-id="select2-data-9-g4c0">Show All</option>
                                            <option value="a">Category A</option>
                                            <option value="b">Category A</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap5"
                                            dir="ltr" data-select2-id="select2-data-8-1iz9"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-graY-800 fs-base lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-7hva-container"
                                                    aria-controls="select2-7hva-container"><span
                                                        class="select2-selection__rendered" id="select2-7hva-container"
                                                        role="textbox" aria-readonly="true" title="Show All">Show
                                                        All</span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Destination-->
                                    <!--begin::Status-->
                                    <div class="d-flex align-items-center fw-bold"
                                        data-select2-id="select2-data-149-3boa">
                                        <!--begin::Label-->
                                        <div class="text-gray-400 fs-7 me-2">Status</div>
                                        <!--end::Label-->
                                        <!--begin::Select-->
                                        <select
                                            class="form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto select2-hidden-accessible"
                                            data-control="select2" data-hide-search="true"
                                            data-dropdown-css-class="w-150px" data-placeholder="Select an option"
                                            data-kt-table-widget-4="filter_status" data-select2-id="select2-data-10-aec3"
                                            tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                                            <option data-select2-id="select2-data-155-o6gx"></option>
                                            <option value="Show All" selected="selected"
                                                data-select2-id="select2-data-12-9ol3">Show All</option>
                                            <option value="Shipped" data-select2-id="select2-data-156-gmbl">Shipped
                                            </option>
                                            <option value="Confirmed" data-select2-id="select2-data-157-zfm1">Confirmed
                                            </option>
                                            <option value="Rejected" data-select2-id="select2-data-158-kyau">Rejected
                                            </option>
                                            <option value="Pending" data-select2-id="select2-data-159-67i8">Pending
                                            </option>
                                        </select><span
                                            class="select2 select2-container select2-container--bootstrap5 select2-container--below"
                                            dir="ltr" data-select2-id="select2-data-11-xctm"
                                            style="width: 100%;"><span class="selection"><span
                                                    class="select2-selection select2-selection--single form-select form-select-transparent text-dark fs-7 lh-1 fw-bold py-0 ps-3 w-auto"
                                                    role="combobox" aria-haspopup="true" aria-expanded="false"
                                                    tabindex="0" aria-disabled="false"
                                                    aria-labelledby="select2-9u8b-container"
                                                    aria-controls="select2-9u8b-container"><span
                                                        class="select2-selection__rendered" id="select2-9u8b-container"
                                                        role="textbox" aria-readonly="true" title="Show All">Show
                                                        All</span><span class="select2-selection__arrow"
                                                        role="presentation"><b
                                                            role="presentation"></b></span></span></span><span
                                                class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Status-->
                                    <!--begin::Search-->
                                    <div class="position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                        <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                    height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                    fill="currentColor"></rect>
                                                <path
                                                    d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-table-widget-4="search"
                                            class="form-control w-150px fs-7 ps-12" placeholder="Search">
                                    </div>
                                    <!--end::Search-->
                                </div>
                                <!--begin::Filters-->
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-2">
                            <!--begin::Table-->
                            <div id="kt_table_widget_4_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer"
                                        id="kt_table_widget_4_table">
                                        <!--begin::Table head-->
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                                <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 102.118px;">Order ID</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.309px;">Created</th>
                                                <th class="text-end min-w-125px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 127.795px;">Customer</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.309px;">Total</th>
                                                <th class="text-end min-w-100px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 102.309px;">Profit</th>
                                                <th class="text-end min-w-50px sorting_disabled" rowspan="1"
                                                    colspan="1" style="width: 91.25px;">Status</th>
                                                <th class="text-end sorting_disabled" rowspan="1" colspan="1"
                                                    style="width: 25.7292px;"></th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody class="fw-bold text-gray-600">








                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#XGY-346</a>
                                                </td>
                                                <td class="text-end">7 min ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Albert
                                                        Flores</a>
                                                </td>
                                                <td class="text-end">$630.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$86.70</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#YHD-047</a>
                                                </td>
                                                <td class="text-end">52 min ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Jenny
                                                        Wilson</a>
                                                </td>
                                                <td class="text-end">$25.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$4.20</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-primary">Confirmed</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SRR-678</a>
                                                </td>
                                                <td class="text-end">1 hour ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Robert
                                                        Fox</a>
                                                </td>
                                                <td class="text-end">$1,630.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$203.90</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-warning">Pending</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#PXF-534</a>
                                                </td>
                                                <td class="text-end">3 hour ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Cody
                                                        Fisher</a>
                                                </td>
                                                <td class="text-end">$119.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$12.00</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#XGD-249</a>
                                                </td>
                                                <td class="text-end">2 day ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Arlene
                                                        McCoy</a>
                                                </td>
                                                <td class="text-end">$660.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$52.26</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="even">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SKP-035</a>
                                                </td>
                                                <td class="text-end">2 day ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Eleanor
                                                        Pena</a>
                                                </td>
                                                <td class="text-end">$290.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$29.00</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-danger">Rejected</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="odd">
                                                <td>
                                                    <a href="/metronic8/demo20/../demo20/apps/ecommerce/catalog/edit-product.html"
                                                        class="text-gray-800 text-hover-primary">#SKP-567</a>
                                                </td>
                                                <td class="text-end">7 min ago</td>
                                                <td class="text-end">
                                                    <a href="#" class="text-gray-600 text-hover-primary">Dan
                                                        Wilson</a>
                                                </td>
                                                <td class="text-end">$590.00</td>
                                                <td class="text-end">
                                                    <span class="text-gray-800 fw-bolder">$50.00</span>
                                                </td>
                                                <td class="text-end">
                                                    <span class="badge py-3 px-4 fs-7 badge-light-success">Shipped</span>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-light btn-active-light-primary toggle h-25px w-25px"
                                                        data-kt-table-widget-4="expand_row">
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-off">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.5" x="11" y="18"
                                                                    width="12" height="2" rx="1"
                                                                    transform="rotate(-90 11 18)" fill="currentColor">
                                                                </rect>
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr089.svg-->
                                                        <span class="svg-icon svg-icon-3 m-0 toggle-on">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="6" y="11" width="12"
                                                                    height="2" rx="1" fill="currentColor">
                                                                </rect>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <div class="row">
                                    <div
                                        class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                    </div>
                                    <div
                                        class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                    </div>
                                </div>
                            </div>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Table Widget 4-->
                </div>
                <!--end::Col-->
            </div> --}}
            <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
      

                <!--begin::Col-->
                <div class="col-xl-12">
                    <!--begin::Engage widget 9-->
                    <div class="card h-lg-100" style="background: linear-gradient(112.14deg, #FF8A00 0%, #E96922 100%)">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Row-->
                            <div class="row align-items-center">
                                <!--begin::Col-->
                                <div class="col-sm-7 pe-0 mb-5 mb-sm-0">
                                    <!--begin::Wrapper-->
                                    <div class="d-flex justify-content-between h-100 flex-column pt-xl-5 pb-xl-2 ps-xl-7">
                                        <!--begin::Container-->
                                        <div class="mb-7">
                                            <!--begin::Title-->
                                            <div class="mb-6">
                                                <h3 class="fs-2x fw-semibold text-white">Selamat Datang di SEPADAN</h3>
                                                <span class="fw-semibold text-white opacity-75">Sistem Pelaporan Pendapatan UNM</span>
                                            </div>
                                            <!--end::Title-->

                                            <!--begin::Items-->
                                            <div class="d-flex align-items-center flex-wrap d-grid gap-2 ">
                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center me-5 me-xl-13">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px symbol-circle me-3">
                                                        <span class="symbol-label"
                                                            style="background: rgba(255, 255, 255, 0.15);">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs042.svg-->
                                                            <span class="svg-icon svg-icon-4 svg-icon-white"><svg
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M18 21.6C16.6 20.4 9.1 20.3 6.3 21.2C5.7 21.4 5.1 21.2 4.7 20.8L2 18C4.2 15.8 10.8 15.1 15.8 15.8C16.2 18.3 17 20.5 18 21.6ZM18.8 2.8C18.4 2.4 17.8 2.20001 17.2 2.40001C14.4 3.30001 6.9 3.2 5.5 2C6.8 3.3 7.4 5.5 7.7 7.7C9 7.9 10.3 8 11.7 8C15.8 8 19.8 7.2 21.5 5.5L18.8 2.8Z"
                                                                        fill="currentColor"></path>
                                                                    <path opacity="0.3"
                                                                        d="M21.2 17.3C21.4 17.9 21.2 18.5 20.8 18.9L18 21.6C15.8 19.4 15.1 12.8 15.8 7.8C18.3 7.4 20.4 6.70001 21.5 5.60001C20.4 7.00001 20.2 14.5 21.2 17.3ZM8 11.7C8 9 7.7 4.2 5.5 2L2.8 4.8C2.4 5.2 2.2 5.80001 2.4 6.40001C2.7 7.40001 3.00001 9.2 3.10001 11.7C3.10001 15.5 2.40001 17.6 2.10001 18C3.20001 16.9 5.3 16.2 7.8 15.8C8 14.2 8 12.7 8 11.7Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <a href="/metronic8/demo20/../demo20/pages/user-profile/projects.html"
                                                            class="text-white text-opacity-75 fs-8">Tahun Berjalan</a>
                                                        <span class="fw-bold text-white fs-7 d-block">2023</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->

                                                <!--begin::Item-->
                                                <div class="d-flex align-items-center">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-30px symbol-circle me-3">
                                                        <span class="symbol-label"
                                                            style="background: rgba(255, 255, 255, 0.15);">
                                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                            <span class="svg-icon svg-icon-4 svg-icon-white"><svg
                                                                    width="24" height="24" viewBox="0 0 24 24"
                                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                    <path opacity="0.3"
                                                                        d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                                        fill="currentColor"></path>
                                                                    <path
                                                                        d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                                        fill="currentColor"></path>
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->
                                                        </span>
                                                    </div>
                                                    <!--end::Symbol-->

                                                    <!--begin::Info-->
                                                    <div class="m-0">
                                                        <a href="/metronic8/demo20/../demo20/apps/user-management/users/list.html"
                                                            class="text-white text-opacity-75 fs-8">Bulan Berjalan</a>
                                                        <span class="fw-bold text-white fs-7 d-block">Maret</span>
                                                    </div>
                                                    <!--end::Info-->
                                                </div>
                                                <!--end::Item-->
                                            </div>
                                            <!--end::Items-->
                                        </div>
                                        <!--end::Container-->

                                        <!--begin::Action-->
                                        <div class="m-0">
                                            <a href="#"
                                                class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold"
                                                data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                                                 Buku Kas <i class="fa fa-plus"></i>
                                            </a>
                                            <a href="#"
                                            class="btn btn-color-white bg-white bg-opacity-15 bg-hover-opacity-25 fw-semibold"
                                            data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">
                                            Referensi <i class="fa fa-plus"></i>

                                        </a>
                                        </div>
                                        <!--begin::Action-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--begin::Col-->

                                <!--begin::Col-->
                                <div class="col-sm-5">
                                    <!--begin::Illustration-->
                                    <img src="{{asset('')}}/sepadan2.png"
                                        class="h-200px h-lg-150px my-n6" alt="">
                                    <!--end::Illustration-->
                                </div>
                                <!--begin::Col-->
                            </div>
                            <!--begin::Row-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Engage widget 9-->

                </div>
                <!--end::Col-->
            </div>
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
