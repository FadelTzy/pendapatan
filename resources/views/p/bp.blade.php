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
                  Daftar Referensi
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
                        <h2 class="fw-bold">BUKU PEMBANTU {{ $rkakl->tahun_anggaran }}</h2>
                    </div>
                    <!--begin::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar d-flex justify-end">
                        <div class="input-group ">
                            <select name="bulan" class="form-control" id="pilihbulan">
                                <option disabled selected>Pilih Bulan</option>
                                <option @if ($bulan == '01') selected @endif value="01">Januari</option>
                                <option @if ($bulan == '02') selected @endif value="02">Februari</option>
                                <option @if ($bulan == '03') selected @endif value="03">Maret</option>
                                <option @if ($bulan == '04') selected @endif value="04">April</option>
                                <option @if ($bulan == '05') selected @endif value="05">Mei</option>
                                <option @if ($bulan == '06') selected @endif value="06">Juni</option>
                                <option @if ($bulan == '07') selected @endif value="07">Juli</option>
                                <option @if ($bulan == '08') selected @endif value="08">Agustus</option>
                                <option @if ($bulan == '09') selected @endif value="09">September</option>
                                <option @if ($bulan == '10') selected @endif value="10">Oktober</option>
                                <option @if ($bulan == '11') selected @endif value="11">November</option>
                                <option @if ($bulan == '12') selected @endif value="12">Desember</option>
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
                        <a href="{{url('cetak/buku-pembantu/').'?bulan='.$bulan}}" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Cetak Rincian
                            </a>
                          
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
                                <th>Kode</th>
                                <th>Jenis Akun</th>
                                <th>Total</th>

                                <th>Aksi</th>
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->
                        <tbody>
                            @foreach ($datax as $item)
                            @php
                                $no = 0;
                            @endphp
                                <tr>
                                    <td>{{$item->kode_akun}}</td>
                                    <td>{{$item->nama_akun}}</td>
                                    <td>@money(gettotalvalue($item->mBku),'IDR',true)</td>
                                    <td>
                                        <a href="{{url('cetak/buku-pembantu/').'/' . $item->id.'?bulan='.$bulan}}" target="_blank"  type="button" class="btn btn-warning btn-sm">Cetak</a>
                                    </td>
                                </tr>
                                @foreach ($item->mBku as $i)
                                <tr class="table-success">
                                    <td>{{$i->tanggal}}</td>
                                    <td>{{$i->uraian}}</td>
                                    <td>@money($i->nilai,'IDR',true)</td>
                                    <td>
                                       -
                                    </td>
                                </tr>
                                @endforeach
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
                    <h5 class="modal-title">Tambah Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabakun" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{$rkakl->id}}" name="id_revisi">
                        <input type="hidden" name="kode_akun" id="kode_akun">
                        <input type="hidden" name="nama_akun" id="nama_akun">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">Akun</label>
                                <div class="input-group">
                                    <select name="akun" class="form-control" id="rabakun">
                                        <option disabled selected>Pilih Akun</option>
                                        @foreach ($akun as $i)
                                            <option  value="{{ $i->id }}">
                                                {{ $i->kode }} - {{ $i->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group -->
                                <br>
                            
                                {{-- <label class="form-label">Unit Pemakai</label>
                                <div class="input-group">
                                    <select class="form-control" name="unit" id="">
                                        @foreach ($dunit as $item)
                                            <option value="{{$item->unit}}">{{$item->unit}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group --> --}}
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
    <div class="modal fade" id="modalro" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Detail Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabdetail" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{$rkakl->id}}" name="id_revisi">

                        <input type="hidden" id="id_rab_akun" name="id_rab_akun">

                        <div class="row">
                         
                            <br>
                          
                            <div class="col-md-12">
                                <label class="form-label">Detail Berkaitan</label>
                                <div class="input-group">
                                    <select class="form-control" name="unit" id="budadi">
                                    
                                    </select>
                                </div><!-- input-group -->
                            </div>
                 
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabdetail" type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalrou" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Detail</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formrabdetailu" class=" form-horizontal form-bordered">
                        @csrf
                        <input type="hidden" value="{{$rkakl->id}}" name="id_revisi">
                        <input type="hidden" id="eidu" name="id">

                  

                        <div class="row">
                         
                            <br>
                          
                            <div class="col-md-12">
                                <label class="form-label">Unit Pemakai</label>
                                <div class="input-group">
                                    <select class="form-control" name="unit" id="unitu">
                                        @foreach ($akun as $item)
                                            <option value="{{$item->unit}}">{{$item->unit}}</option>
                                        @endforeach
                                    </select>
                                </div><!-- input-group -->
                            </div>
                 
                            
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup Form</button>
                    <button id="btnrabdetailu" type="button" class="btn btn-primary">Simpan</button>
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
        $("#flexSwitchDefault").on('change',function () {
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
            if($(this).is(':checked')){
                $("#field").html(html);
                $("#labelcheck").html('Bercabang')
                panggilak();
            }else{
                $("#labelcheck").html('Tidak Bercabang') 
                $("#field").html('');

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
location.href = url + '/penerimaan/buku-pembantu?bulan=' + this.value;

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
