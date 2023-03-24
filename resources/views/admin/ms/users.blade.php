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
                        <li class="breadcrumb-item active" aria-current="page">Data Unit</li>
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
                            <label class="form-label">Nama</label>
                            <div class="input-group">
                                <input type="text" name="nama" placeholder="Input Nama" class="form-control" />

                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <input type="text" name="username" placeholder="Input Username" class="form-control" />

                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" placeholder="Input Email" class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Permission</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked value="1" name="spp" id="flexspp">
                                <label class="form-check-label" for="flexspp">
                                    Cetak SPP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked value="1" name="spm" id="flexspm">
                                <label class="form-check-label" for="flexspm">
                                    Cetak SPM
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="sp2d" id="flexsp2d">
                                <label class="form-check-label" for="flexsp2d">
                                    Cetak SP2D
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="pajak" id="flexpajak">
                                <label class="form-check-label" for="flexpajak">
                                    Cetak Pajak
                                </label>
                            </div>
                            <br>
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="text" value="12345" name="password" placeholder="Input Password" class="form-control" />
                            </div><!-- input-group -->
                            <br>

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
                            <label class="form-label">Nama</label>
                            <div class="input-group">
                                <input type="text" name="nama" id="namau" placeholder="Input Nama" class="form-control" />

                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Username</label>
                            <div class="input-group">
                                <input type="text" name="username" id="usernameu" placeholder="Input Username" class="form-control" />

                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Email</label>
                            <div class="input-group">
                                <input type="email" name="email" id="emailu" placeholder="Input Email" class="form-control" />
                            </div><!-- input-group -->
                            <br>
                            <label class="form-label">Permission</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked value="1" name="spp" id="flexsppu">
                                <label class="form-check-label" for="flexsppu">
                                    Cetak SPP
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" checked value="1" name="spm" id="flexspmu">
                                <label class="form-check-label" for="flexspmu">
                                    Cetak SPM
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="sp2d" id="flexsp2du">
                                <label class="form-check-label" for="flexsp2du">
                                    Cetak SP2D
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="pajak" id="flexpajaku">
                                <label class="form-check-label" for="flexpajaku">
                                    Cetak Pajak
                                </label>
                            </div>
                            <br>
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="text" name="password" placeholder="Input Password Baru" class="form-control" />
                            </div><!-- input-group -->
                            <br>

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
            <h6 class="mb-0 text-uppercase">Manajemen Data Users </h6>
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                data-bs-target="#exampleLargeModal" class="btn btn-sm btn-success">Tambah Data <i
                    class="bx bx-folder-plus"></i></button>
        </div>

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-hover table-bordered" style="width:100%">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Permission</th>
                                <th>Created At</th>
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
        jQuery(document).ready(function() {

            tabel = $("#example").DataTable({
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


                ],
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.index') }}",
                },
                columns: [{
                        nama: 'DT_RowIndex',
                        data: 'DT_RowIndex'
                    }, {
                        nama: 'name',
                        data: 'name'
                    },
                    {
                        nama: 'username',
                        data: 'username'
                    },
                    {
                        nama: 'permisinya',
                        data: 'permisinya'
                    },
                    {
                        nama: 'tanggalnya',
                        data: 'tanggalnya'
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
                    url: url + '/admin/users/' + id,
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
                url: '{{ route('users.store') }}',
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
                url: '{{ url('admin/users/edit') }}',
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
                        round_error_noti(elem);

                    } else {
                        round_success_noti();
                        $('#exampleLargeModalu').modal('hide');

                        tabel.ajax.reload();

                    }
                }
            })


        })

        function staffupd(id) {
            $('#exampleLargeModalu').modal('show');

            $("#idu").val(id.id);
            $("#namau").val(id.name);
            $("#usernameu").val(id.username);
            $("#emailu").val(id.email);
            $("#flexsppu").prop('checked', id.spp);
            $("#flexspmu").prop('checked', id.spm);
            $("#flexsp2du").prop('checked', id.sp2d);
            $("#flexpajaku").prop('checked', id.pajak);







        }
    </script>
@endpush
