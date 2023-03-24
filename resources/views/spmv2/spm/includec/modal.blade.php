<div class="modal fade" tabindex="-1" id="modalAdd">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Data</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

           
                <div class="table-responsive">
                    <table id="susunrab" class="table">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800">
                                <th>No</th>
                                <th>COA</th>
                                <th>Kode Akun</th>
                                <th>Pagu</th>
                                <th>Realisasi</th>
                                <th>Sisa </th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal fade" tabindex="-1" id="modalSpp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Akun Pajak</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="rsppdfrom" action="">
                    <input type="hidden" id="idrsppdpajak" name="idrsppd">
                    <input type="hidden" value="{{ Request::segment(4) }}" id="idspppajak" name="idspp">
                    <input type="hidden" id="totalrsppd" name="totalrsppd">
                    <label for="" class="form-label">Akun Pajak</label>
                    <select class="form-select" name="pajak" id="select2pajakk" data-control="select2"
                        data-placeholder="Select an option">
                        <option selected disabled>Pilih Akun Pajak</option>
                        @foreach ($pajak as $item)
                            <option data-val="{{ $item }}" value="{{ $item->id }}">
                                {{ $item->kode }} - {{ $item->uraian }} </option>
                        @endforeach

                    </select>
                    <div id="infopajakk">

                    </div>
                </form>
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button id="rsppdbtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>

            </div>
        </div>
    </div>
</div> --}}
<div class="modal fade" tabindex="-1" id="modalSpp">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Akun Pajak</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="rsppdfrom" action="">
                    <input type="hidden" value="{{ Request::segment(4) }}" id="idspppajak" name="idspp">
                    <label for="" class="form-label">Akun Pajak</label>
                    <select class="form-select" name="pajak" id="select2pajakk" data-control="select2"
                        data-placeholder="Select an option">
                        <option selected disabled>Pilih Akun Pajak</option>
                        @foreach ($pajak as $item)
                            <option data-val="{{ $item }}" value="{{ $item->id }}">
                                {{ $item->kode }} - {{ $item->uraian }} </option>
                        @endforeach

                    </select>
                    <div id="infopajakk">

                    </div>
                </form>
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button id="rsppdbtn" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modalSppu">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit Akun Pajak</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <form id="rsppdfromu" action="">
                    <input type="hidden" name="id" id="rppsdpajaku">
                    <input type="hidden" value="{{ Request::segment(4) }}" id="idspppajak" name="idspp">
                    <label for="" class="form-label">Akun Pajak</label>
                    <select class="form-select" name="pajak" id="select2pajakku" data-control="select2"
                        data-placeholder="Select an option">
                        <option selected disabled>Pilih Akun Pajak</option>
                        @foreach ($pajak as $item)
                            <option data-val="{{ $item }}" value="{{ $item->id }}">
                                {{ $item->kode }} - {{ $item->uraian }} </option>
                        @endforeach

                    </select>
                    <div id="infopajakku">

                    </div>
                </form>
            
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button id="rsppdbtnu" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Simpan</button>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modalAturan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Tambah Data</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            @php $no = 1 @endphp
                            <tr class="fw-bolder fs-6 text-gray-800">
                                <th>No</th>
                                <th>Nomor Peratuan</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dp as $item)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <th>{{ $item->nomor }}</th>
                                    <th>{{ $item->tanggal }} </th>
                                    <th><button onclick="ajuaturan({{ $item }})"
                                            class="btn btn-primary btn-sm">Pilih</button></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modalAjuan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pengajuan Anggaran</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <form id="d" class=" form-horizontal form-bordered">
                    @csrf
                    <label class="form-label">COA</label>
                    <div class="input-group">
                        <input type="text" name="coa" id="coa" placeholder="Input coa"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <label class="form-label">Akun</label>
                    <div class="input-group">
                        <input type="text" name="akun" id="akun" placeholder="Input akun"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <input type="hidden" name="id" id="ida">
                    <label class="form-label">Jumlah Anggaran</label>
                    <div class="input-group">
                        <input type="hidden" name="hanggaran" id="hanggaran">
                        <input type="text" name="anggaran" id="anggaran" placeholder="Input Anggaran"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <label class="form-label">Pengeluaran</label>
                    <div class="input-group">
                        <input type="text" name="pengeluaran" id="pengeluaran" placeholder="Input pengeluaran"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="submitanggaran" onclick="saveData()" type="button"
                    class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" id="modalAjuand">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pengajuan Anggaran</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-1"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                <form id="editdatad" class=" form-horizontal form-bordered">
                    @csrf
                    <input type="hidden" name="sisabelanja" id="sisabelanja">
                    <input type="hidden" name="pagubelanja" id="pagubelanja">
                    <input type="hidden" name="totalpagud" id="totalpagud">
                    <input type="hidden" name="id_riwayatspp" value="{{$rspp->id}}">
                    <div class="input-group">
                        <input type="hidden" name="coa" id="coad" placeholder="Input coa"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <label class="form-label">Akun</label>
                    <div class="input-group">
                        <input type="text" name="akun" readonly id="akund" placeholder="Input akun"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <label class="form-label">Keterangan Belanja</label>
                    <div class="input-group">
                        <input type="text" name="belanja" id="belanjad" readonly placeholder="Input"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <label class="form-label">Total Anggaran</label>
                    <div class="input-group">
                        <input type="hidden" name="hanggaran" id="hanggarand">
                        <input type="text" name="anggaran" id="anggarand" placeholder="Input Anggaran"
                            class="form-control" />
                    </div><!-- input-group -->
                    <br>
                    <input type="hidden" name="idakun" id="idakun">

                    <input type="hidden" name="iddetail" id="idd">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Sisa </label>
                            <div class="input-group">
                                <input type="hidden" name="hsisa" id="hsisa">
                                <input type="text" name="sisa" id="sisa" placeholder="Input Sisa"
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Sisa Ini </label>
                            <div class="input-group">
                                <input type="text"  id="sisaini" placeholder="Input"
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                   

                    </div>
                    <br>

                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Realisasi </label>
                            <div class="input-group">
                                <input type="hidden"  id="realisasisn">
                                <input type="text" disabled name="realisasis" id="realisasirab" 
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Realisasi Ini</label>
                            <div class="input-group">
                                <input type="text" readonly id="realisasiini"
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                   

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Nilai</label>
                            <div class="input-group">
                                <input type="text" id="pengeluarand" name="pengeluaran" onkeyup="rupiahkeluard(this)" placeholder="Input pengeluaran"
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label class="form-label">Rp Pengeluaran</label>
                            <div class="input-group">
                                <input type="text" readonly id="rupiahkeluar" placeholder="Input pengeluaran"
                                    class="form-control" />
                            </div><!-- input-group -->
                        </div>
                    </div>

                    <br>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button id="saveDatad"  type="button"
                    class="btn btn-primary">Save</button>
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
        <div class="toast-body" id="tostb">
            Gagal Menambah Data
        </div>
    </div>
</div>
