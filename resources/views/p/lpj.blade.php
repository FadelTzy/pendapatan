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
                @if ($rekapan)
                <a href="{{url('cetak/lpj/').'?bulan='.$bulan}}" class="pl-1 btn btn-white btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                  Cetak
                    <!--end::Svg Icon-->
                </a>
                @if ($saldoakhir)
                <a href="{{url('cetak/lpj/').'?bulan='.$bulan}}" class="pl-1 btn btn-white btn-sm">
                    <!--begin::Svg Icon | path: icons/duotune/files/fil008.svg-->
                  Cetak
                    <!--end::Svg Icon-->
                </a>
                @else
                Data bulan kemarin tidak memiliki rekapan
                @endif
          
                @else
                Data bulan {{$datee }} {{$rkakl->tahun_anggaran}} belum direkap 
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
                        <h2 class="fw-bold">LAPORAN PERTANGGUNGJAWABAN BENDAHARA PENDAPATAN PERIODE {{ $datee }}  {{ $rkakl->tahun_anggaran }}</h2>
                      

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
                                    <tr>
                                        <td class="text-gray-400">ALAMAT DAN TELP</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800"> JL. AP. PETTARANI</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">TAHUN ANGGARAN</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800"> 2022</td>
                                    </tr>
                                    <tr>
                                        <td class="text-gray-400">KPPN</td>
                                        <td style="width: 5%">:</td>

                                        <td class="text-gray-800"> MAKASSAR 1(054)                                        </td>
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
                        <h4 class="fw-bold">I Keadaan Pembukuan bulan pelaporan dengan saldo akhir pada BKU sebesar</h4>
                        <h4>dan Nomor Bukti Terakhir Nomor 
                        </h4>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
               
                          
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                @php
                $n = ($saldoakhir->nilai ?? 0) + $pemasukan - $pengeluaran;
            @endphp
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm table-bordered align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>No</th>
                                <th>Jenis Buku Pembantu</th>
                                <th>Saldo Awal</th>
                                <th>Penambahan</th>
                                <th>Pengurangan</th>
                                <th>Saldo Akhir</th>

                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->

                        <tbody>
                            <tr>
                                <td>A</td>
                                <td>BP Kas</td>
                                <td>@money($saldoakhir->nilai ?? 0,'IDR',true)</td>
                                <td>@money($pemasukan,'IDR',true)</td>
                                <td>@money($pengeluaran,'IDR',true)</td>
                                <td>@money($n,'IDR',true)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>1. BP Kas ( Tunai dan Bank )</td>
                                <td>@money($saldoakhir->nilai ?? 0,'IDR',true)</td>
                                <td>@money($pemasukan,'IDR',true)</td>
                                <td>@money($pengeluaran,'IDR',true)</td>
                                <td>@money($n,'IDR',true)</td>
                            </tr>
                            <tr>
                                <td>B</td>
                                <td>Buku Pembantu</td>
                                <td>@money($saldoakhir->nilai ?? 0,'IDR',true)</td>
                                <td>@money($pemasukan,'IDR',true)</td>
                                <td>@money($pengeluaran,'IDR',true)</td>
                                <td>@money($n,'IDR',true)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>1. Buku Pembantu PNBP</td>
                                <td>@money($saldoakhir->nilai ?? 0,'IDR',true)</td>
                                <td>@money($pemasukan,'IDR',true)</td>
                                <td>@money($pengeluaran,'IDR',true)</td>
                                <td>@money($n,'IDR',true)</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>2. Buku Pembantu Lain-Lain</td>
                                <td>@money(0,'IDR',true)</td>
                                <td>@money(0,'IDR',true)</td>
                                <td>@money(0,'IDR',true)</td>
                                <td>@money(0,'IDR',true)</td>
                            </tr>
                        </tbody>
                     
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <br>
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <h4 class="fw-bold">II Keadaan Kas pada akhir bulan Pelaporan

                        </h4>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
               
                          
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th style="width: 40%">1. Uang Tunai di Brankas </th>
                                <th style="width: 5%">:</th>
                                <th>@money(0,'IDR',true)</th>
                     
                            </tr>
                            <tr style="border-bottom: 1px solid black" class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>2. Uang di Rekening Bank ( Terlampir Daftar Rincian Kas Di Rekening )
                                </th>
                                <th style="width: 5%">:</th>
                                <th>@money($n,'IDR',true)</th>
                     
                            </tr>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>3. Jumlah Kas
                                </th>
                                <th style="width: 5%">:</th>
                                <th>@money($n,'IDR',true)</th>
                     
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->

                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <div class="card card-flush">
                <!--begin::Card header-->
                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <!--begin::Search-->
                        <h4 class="fw-bold">III Selisih Kas


                        </h4>
                        <!--end::Search-->
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <!--begin::Add customer-->
               
                          
                        <!--end::Add customer-->
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Table-->
                    <table class="table table-hover table-sm align-middle table-row-dashed fs-6 gy-5"
                        id="example">
                        <!--begin::Table head-->
                        <thead>
                            <!--begin::Table row-->
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th style="width: 40%">1. Saldo Akhir BP Kas (I.A 1 Kolom (6)
                                </th>
                                <th style="width: 5%">:</th>
                                <th>@money($n,'IDR',true)</th>
                     
                            </tr>
                            <tr style="border-bottom: 1px solid black" class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>2. Jumlah Kas (II.3)

                                </th>
                                <th style="width: 5%">:</th>
                                <th>@money($n,'IDR',true)</th>
                     
                            </tr>
                            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                <th>3. Selisih Kas
                                </th>
                                <th style="width: 5%">:</th>
                                <th>@money(0,'IDR',true)</th>
                     
                            </tr>
                            <!--end::Table row-->
                        </thead>
                        <!--end::Table head-->
                        <!--begin::Table body-->

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
location.href = url + '/penerimaan/lpj?bulan=' + this.value;

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
