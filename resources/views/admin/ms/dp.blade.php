@extends('base')
@section('css')
    <link href="{{ asset('v/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('v/assets/plugins/notifications/css/lobibox.min.css') }}" />
@endsection
@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Master Data</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Dasar Pembayaran</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->
        <div class="modal fade" id="exampleLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="tambahdata" class=" form-horizontal form-bordered">
                            @csrf
                            <label class="form-label">Nomor Peraturan</label>
                            <div class="input-group">
                                <input type="text" name="nomor" placeholder="Input Nomor Peraturan" class="form-control" />

                            </div><!-- input-group -->

                            <br>
                            <label class="form-label">Tanggal Peraturan</label>
                            <div class="input-group">
                                <input type="text" name="tanggal" placeholder="Input Tanggal Peraturan" class="form-control" />

                            </div><!-- input-group -->

                            <br>
                            <label class="form-label">File </label>
                            <div class="input-group">
                                <input type="file" id="fileP" name="file" placeholder="Input Jabatan"
                                    class="form-control" />

                            </div><!-- input-group -->
                            <div class="d-none" id="infoimage"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtn" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleLargeModalu" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form id="editdata" class=" form-horizontal form-bordered">
                            @csrf
                            <input type="hidden" name="id" id="idu">
                            <label class="form-label">Nomor Peraturan</label>
                            <div class="input-group">
                                <input type="text" id="nomoru" name="nomor" placeholder="Input Nama" class="form-control" />

                            </div><!-- input-group -->


                            <br>
                            <label class="form-label">Tanggal Peraturan</label>
                            <div class="input-group">
                                <input type="text" id="tanggalu" name="tanggal" placeholder="Input Nama" class="form-control" />

                            </div><!-- input-group -->


                            <br>
                            <label class="form-label">File </label>
                            <div class="input-group">
                                <input type="file" id="filePu" name="file" placeholder="Input Jabatan"
                                    class="form-control" />

                            </div><!-- input-group -->
                            <div id="justtag"></div>
                            <div class="d-none" id="infoimageu"></div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button id="submitbtnu" type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div style="vertical-align: bottom" class="d-flex justify-content-between">
            <h6 class="mb-0 text-uppercase">Manajemen Data Dasar Pembayaran </h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleLargeModal"
                class="btn btn-sm btn-success">Tambah Data <i class="bx bx-folder-plus"></i></button>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nomor Peraturan</th>
                                <th>Tanggal</th>
                                <th>File</th>

                                <th>Aksi</th>
                            </tr>
                        </thead>


                    </table>
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
@push('js')
    <!--notification js -->
    <script src="{{ asset('v/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/notifications/js/notifications.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/notifications/js/notification-custom-script.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('v/assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        ">
    </script>
    <script>
        function bytesToSize(bytes) {
            var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
            if (bytes == 0) return '0 Byte';
            var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
            return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }
        fileP.onchange = evt => {
            const [file] = fileP.files
            if (file) {
                $("#infoimage").removeClass("d-none").html('File Size: ' + bytesToSize(fileP.files[0].size))
            }
        }
        filePu.onchange = evt => {
            const [file] = filePu.files
            if (file) {
                $("#infoimageu").removeClass("d-none").html('File Size: ' + bytesToSize(filePu.files[0].size))
            }
            $("#btndelim").hide();
        }

        jQuery(document).ready(function() {

            tabel = $("#example").DataTable({
                columnDefs: [{
                        targets: 0,
                        width: "1%",
                    },
                    {
                        targets: 1,
                        width: "40%",

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

                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dp.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'nomor',
                        data: 'nomor'
                    },
                    {
                        nama: 'tanggal',
                        data: 'tanggal'
                    },
                    {
                        nama: 'fileb',
                        data: 'fileb'
                    },
                    {
                        name: 'aksi',
                        data: 'aksi',
                    }
                ],

            });



        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var url = window.location.origin;

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
                    url: url + '/admin/dasar-pembayaran/' + id,
                    type: "delete",
                    success: function(e) {
                        $.LoadingOverlay("hide");
                        if (e == 'success') {
                            round_success_noti('Berhasil menghapus data');

                            tabel.ajax.reload();

                        } else {

                            round_error_noti('Gagal menghapus data');
                        }

                    }
                })

            }
        }
        $("#submitbtn").on('click', function() {
            $("#tambahdata").trigger('submit');
        });

        $("#tambahdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ route('dp.store') }}',
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
                        round_error_noti(elem);
                    } else {
                        $('#exampleLargeModal').modal('hide');
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })
        $("#submitbtnu").on('click', function() {
            $("#editdata").trigger('submit');
        });

        $("#editdata").on('submit', function(id) {
            id.preventDefault();
            var data = $(this).serialize();
            $.LoadingOverlay("show");
            $.ajax({
                url: '{{ url('admin/dasar-pembayaran/edit') }}',
                data: new FormData(this),
                type: "POST",
                contentType: false,
                processData: false,
                success: function(id) {
                    $('#myModalu').modal('hide');
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
                        round_error_noti(elem);

                    } else {
                        round_success_noti();

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function staffupd(id) {
            $('#exampleLargeModalu').modal('show');

            $("#idu").val(id.id);
            $("#namau").val(id.nama);
            $("#nomoru").val(id.nomor);
            $("#tanggalu").val(id.tanggal);


            if (id.file != null) {
                var html =
                    `<iframe src="${url + '/gambar/dp/' + id.file}"
                                  width="100%" height="40vh" class="img-thumbnail mt-1" id="previewu" alt=""></iframe`;

                $("#justtag").html(html);
            } else {
                var html = `<p>File belum ada</p>`;
                $("#justtag").html(html);

            }

        }
    </script>
@endpush
