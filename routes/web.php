<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Http\Controllers\PejabatController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DasarPembayaranController;
use App\Http\Controllers\CaraBayarController;
use App\Http\Controllers\JenisspmController;
use App\Http\Controllers\JenisPembayaranController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AsalPenerimaanController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KroController;
use App\Http\Controllers\RoController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\SubkomponenController;
use App\Http\Controllers\RkaklController;
use App\Http\Controllers\RabController;
use App\Http\Controllers\JenisBelanjaController;
use App\Http\Controllers\rab;
use App\Http\Controllers\RiwayatRevisiController;
use App\Http\Controllers\SpmController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\PajakController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RsppController;
use App\Http\Controllers\cancelation;
use App\Http\Controllers\cetak;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\penerimaan;
Route::get('/updateapp', function()
{
    Artisan::call('dump-autoload');
    echo 'dump-autoload complete';
});
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('spmv2', [Admin::class, 'index1']);
Route::post('sanggar', [rab::class, 'sanggar'])->name('singgar');
Route::prefix('spm')->group(function () {
    Route::get('/', [SpmController::class, 'indexv2'])->name('spm.index');
    Route::get('/getbytahun/{id}', [SpmController::class, 'getbytahun']);
    Route::get('/createspm', [SpmController::class, 'redirect'])->name('create.spm');

    Route::get('/create/redirect/{id}', [SpmController::class, 'create'])->name('spm.create');
    Route::get('/edit/redirect/{id}', [SpmController::class, 'edit'])->name('spm.edit');

    Route::get('/create/{id}', [SpmController::class, 'show']);
    Route::get('/create/{id}/cetakspp', [SpmController::class, 'cetakspp']);
    Route::get('/create/{id}/cetakspm', [SpmController::class, 'cetakspm']);
    Route::get('/create/{id}/cetaksp2d', [SpmController::class, 'cetaksp2d']);
    Route::get('/create/{id}/{di}/cetakpajak', [SpmController::class, 'cetakpajak']);
    Route::get('/create/{id}/cetakrkakl', [SpmController::class, 'cetakrkakl']);
    Route::get('/create/{id}/cetakallunit/{all}', [SpmController::class, 'cetakunit']);

    Route::post('/create', [SpmController::class, 'store'])->name('spm.store');
    Route::post('/create/edited', [SpmController::class, 'storeedit'])->name('spm.storeedit');

    Route::get('/realrabakun/{id}', [SpmController::class, 'realrabakun']);

    Route::get('/getrabakun', [SpmController::class, 'getrabakun'])->name('get.rabakun');

    Route::post('/postrab', [RabController::class, 'postrab'])->name('post.rabakun');
    //spm
    Route::post('/delete/spm', [RsppController::class, 'deletersppd'])->name('spm.deletersppd');
    Route::get('/get-rsppd', [RsppController::class, 'getrsppd'])->name('rsppd.pajak');
    Route::post('/post-isremun', [RsppController::class, 'postisremun'])->name('rsppd.post');
    // Route::post('/post-pajak/rspp', [RsppController::class, 'pajakrspp'])->name('rsppdpajak.post');
    Route::post('/post-pajak/rspp', [RsppController::class, 'pajakrspp'])->name('rsppdpajak2.post');
    Route::post('/post-pajak/rsppu', [RsppController::class, 'pajakrsppu'])->name('rsppdpajak2.edit');


});
Route::prefix('rkakl')->group(function () {
    Route::get('/dashboard', [SpmController::class, 'dashboard'])->name('rkakl.dashboard');

    Route::get('akun-realisasi', [AkunController::class, 'high'])->name('akun.realisasi');

    Route::get('akun-realisasi/{unit}', [AkunController::class, 'akunrabunit']);

    Route::get('akun', [AkunController::class, 'indexv2'])->name('akun.indexv2');
    Route::post('akun-detail', [AkunController::class, 'postdetail'])->name('akun.detailp');
    Route::post('akun-detail/edit', [AkunController::class, 'editdetail'])->name('akun.detaile');
    Route::delete('akun-detail/delete/{id}', [AkunController::class, 'deletedetail'])->name('akun.detaild');

    Route::get('kegiatan', [KegiatanController::class, 'indexv2'])->name('kegiatan.indexv2');

    Route::get('data-rkakl', [RkaklController::class, 'indexv2'])->name('rkakl.indexv2');
    Route::get('data-rkakl/revisi/{id}', [RiwayatRevisiController::class, 'getrevisi']);
    Route::post('data-rkakl/status-revisi', [RiwayatRevisiController::class, 'poststatusrevisi']);
  //kompnen
  Route::post('data-rkakl/komponen', [rab::class, 'storekom'])->name('rabkom.store');
  Route::delete('data-rkakl/komponen/{id}', [rab::class, 'destroykom'])->name('rabkom.destroy');

  //subkompnen
  Route::post('data-rkakl/subkomponen', [rab::class, 'storesubkom'])->name('rabsubkom.store');
  Route::delete('data-rkakl/subkomponen/{id}', [rab::class, 'destroysubkom'])->name('rabsubkom.destroy');

  //akun
  Route::post('data-rkakl/jenis-belanja', [rab::class, 'storeakun'])->name('rabakun.store');
  Route::delete('data-rkakl/jenis-belanja/{id}', [rab::class, 'destroyakun'])->name('rabakun.destroy');

  //detail
  Route::post('data-rkakl/jenis-belanja/detail', [rab::class, 'storedetail'])->name('rabdetail.store');
  Route::post('data-rkakl/jenis-belanja/detail/update', [rab::class, 'updatedetail'])->name('rabdetail.update');

  Route::delete('data-rkakl/jenis-belanja/detail/{id}', [rab::class, 'destroydetail'])->name('rabdetail.destroy');

  //cabang
  Route::post('data-rkakl/jenis-belanja/cabang', [rab::class, 'storecabang'])->name('rabcabang.store');
  Route::delete('data-rkakl/jenis-belanja/cabang/{id}', [rab::class, 'destroycabang'])->name('rabcabang.destroy');
  

});

// Route::get('spmv2', function () {
//     return view('welcome1');
// });
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('pembayaran')->group(function () {
        Route::get('/', [PembayaranController::class, 'index'])->name('bayar.index');
        Route::post('/importdong', [PembayaranController::class, 'store'])->name('importdong');


    });
    Route::prefix('penerimaan')->group(function () {
        Route::get('/', [penerimaan::class, 'index'])->name('p.index');

        Route::get('/referensi', [penerimaan::class, 'referensi'])->name('p.referensi');
        Route::get('/buku-pembantu', [penerimaan::class, 'bp'])->name('p.bp');
        Route::get('/buku-pembantu', [penerimaan::class, 'bp'])->name('p.bp');
        Route::get('/akun-pendapatan', [penerimaan::class, 'ap'])->name('p.ap');

        Route::get('/buku-kas-umum', [penerimaan::class, 'bku'])->name('p.bku');
        Route::get('/lpj', [penerimaan::class, 'lpj'])->name('p.lpj');
        Route::get('/pengesahan', [penerimaan::class, 'pengesahan'])->name('pengesahan');
        Route::get('/rincian-pengesahan', [penerimaan::class, 'rpengesahan'])->name('r.pengesahan');

        Route::post('/bku-post', [penerimaan::class, 'bkup'])->name('p.bkup');
        Route::post('/bku-post/edit', [penerimaan::class, 'bkue'])->name('p.bkupu');
        Route::post('/bku-post/rekap', [penerimaan::class, 'rekapp'])->name('p.rekapp');
        Route::post('/bku-post/sahkan', [penerimaan::class, 'sahkan'])->name('p.sahkan');

        Route::delete('/bku-post/delete/{id}', [penerimaan::class, 'bkud'])->name('p.bkud');

        
        Route::get('/get-bku/{id}', [penerimaan::class, 'getDatabku']);

        Route::get('/referensi/sync/{id}', [penerimaan::class, 'syncref']);
        Route::get('/detail-referensi/{id}', [penerimaan::class, 'dreferensi']);
    });
    Route::prefix('cetak')->group(function () {
        Route::get('/buku-kas-umum', [cetak::class, 'bku']); //done
        Route::get('/referensi', [cetak::class, 'referensi']); //done
        Route::get('/buku-pembantu', [cetak::class, 'bp']); //done
        Route::get('/buku-pembantu/{id}', [cetak::class, 'bpd']); //done
        Route::get('/pengesahan', [cetak::class, 'pengesahan']); //done
        Route::get('/rincian-pengesahan', [cetak::class, 'rp']); //done
        Route::get('/lpj', [cetak::class, 'lpj']);
    });
    //cancelation
    Route::prefix('cancel')->group(function () {

        Route::post('dasar-pembayaran', [cancelation::class, 'cancel'])->name('cancel.dp');
    });
    Route::prefix('add')->group(function () {

        Route::post('dasar-pembayaran', [cancelation::class, 'add'])->name('add.dp');
    });

    Route::prefix('admin')->group(function () {

        //user
        Route::get('/users', [Admin::class, 'userindex'])->name('users.index');
        Route::post('/users', [Admin::class, 'userstore'])->name('users.store');
        Route::delete('/users/{id}', [Admin::class, 'userdestroy'])->name('users.destroy');
        Route::post('/users/edit', [Admin::class, 'userupdate'])->name('users.update');
        //revisi
        Route::post('data-rkakl/revisi/', [RiwayatRevisiController::class, 'store'])->name('revisi.store');
        Route::delete('data-rkakl/revisi/{id}', [RiwayatRevisiController::class, 'destroy']);

        //Jenis Belanja
        Route::resource('jenis-belanja', JenisBelanjaController::class);
        //rab
        Route::post('/rkakl/rab', [RabController::class, 'store'])->name('rab.store');
        Route::post('/rkakl/rab/akun', [RabController::class, 'storejenisakun'])->name('rab.storejenisakun');
        Route::delete('/rkakl/rab/{id}', [RabController::class, 'destroy'])->name('rab.destroy');
        Route::post('/rkakl/rab/edit', [RabController::class, 'update'])->name('rab.update');
        //rkakl
        Route::get('/rkakl-check/{id}', [RkaklController::class, 'check'])->name('rkakl.check');
        Route::get('/rkakl', [RkaklController::class, 'index'])->name('rkakl.index');
        Route::get('/rkakl/{id}', [RkaklController::class, 'create']);
        Route::post('/rkakl', [RkaklController::class, 'store'])->name('rkakl.store');
        Route::delete('/rkakl/{id}', [RkaklController::class, 'destroy'])->name('rkakl.destroy');
        Route::post('/rkakl/edit', [RkaklController::class, 'update'])->name('rkakl.update');
        //akun
        Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
        Route::post('/akun', [AkunController::class, 'store'])->name('akun.store');
        Route::delete('/akun/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
        Route::post('/akun/edit', [AkunController::class, 'update'])->name('akun.update');

        //kegiatan
        Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
        Route::post('/kegiatan', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        Route::post('/kegiatan/edit', [KegiatanController::class, 'update'])->name('kegiatan.update');
        //kegiatan
        Route::get('/kro', [KroController::class, 'index'])->name('kro.index');
        Route::post('/kro', [KroController::class, 'store'])->name('kro.store');
        Route::delete('/kro/{id}', [KroController::class, 'destroy'])->name('kro.destroy');
        Route::post('/kro/edit', [KroController::class, 'update'])->name('kro.update');
        //ro
        Route::get('/ro', [RoController::class, 'index'])->name('ro.index');
        Route::post('/ro', [RoController::class, 'store'])->name('ro.store');
        Route::delete('/ro/{id}', [RoController::class, 'destroy'])->name('ro.destroy');
        Route::post('/ro/edit', [RoController::class, 'update'])->name('ro.update');
        //komponen
        Route::get('/komponen', [KomponenController::class, 'index'])->name('komponen.index');
        Route::post('/komponen', [KomponenController::class, 'store'])->name('komponen.store');
        Route::delete('/komponen/{id}', [KomponenController::class, 'destroy'])->name('komponen.destroy');
        Route::post('/komponen/edit', [KomponenController::class, 'update'])->name('komponen.update');
        //subkomponen
        Route::get('/subkomponen', [SubkomponenController::class, 'index'])->name('subkomponen.index');
        Route::post('/subkomponen', [SubkomponenController::class, 'store'])->name('subkomponen.store');
        Route::delete('/subkomponen/{id}', [SubkomponenController::class, 'destroy'])->name('subkomponen.destroy');
        Route::post('/subkomponen/edit', [SubkomponenController::class, 'update'])->name('subkomponen.update');
        //SPM
        Route::get('/getsupplier/{id}', [SppController::class, 'getsupplier']);

        Route::get('/spp', [SppController::class, 'index'])->name('spp.index');
        Route::get('/daftar', [SppController::class, 'list'])->name('spp.list');

        Route::post('/spp', [SppController::class, 'store'])->name('spp.store');
        Route::get('/spp/cetak/{id}', [SppController::class, 'cetak'])->name('spp.cetak');
        Route::get('/spp/{id}', [SppController::class, 'cetakdokumen']);
        Route::get('/spm/{id}', [SppController::class, 'cetakspm']);
        Route::get('/sp2d/{id}', [SppController::class, 'cetaksp2d']);

        Route::delete('/spp/{id}', [SppController::class, 'destroy'])->name('spp.destroy');
        Route::post('/spp/edit', [SppController::class, 'update'])->name('spp.update');
        //pajak
        Route::get('/data-pajak', [PajakController::class, 'index'])->name('pajak.index');
        Route::post('/data-pajak', [PajakController::class, 'store'])->name('pajak.store');
        Route::delete('/data-pajak/{id}', [PajakController::class, 'destroy'])->name('pajak.destroy');
        Route::post('/data-pajak/edit', [PajakController::class, 'update'])->name('pajak.update');
        Route::get('/getpajak/{id}', [PajakController::class, 'getpajak'])->name('pajak.get');
        Route::delete('/delpajak/{id}', [PajakController::class, 'delpajak'])->name('pajak.del');

        //Kewenangan
        Route::get('/kewenangan-pelaksanaan', [KewenanganPelaksanaanController::class, 'index'])->name('kw.index');
        Route::post('/kewenangan-pelaksanaan', [KewenanganPelaksanaanController::class, 'store'])->name('kw.store');
        Route::delete('/kewenangan-pelaksanaan/{id}', [KewenanganPelaksanaanController::class, 'destroy'])->name('kw.destroy');
        Route::post('/kewenangan-pelaksanaan/edit', [KewenanganPelaksanaanController::class, 'update'])->name('kw.update');
        //Asal Penerimaan
        Route::get('/asal-penerimaan', [AsalPenerimaanController::class, 'index'])->name('ap.index');
        Route::post('/asal-penerimaan', [AsalPenerimaanController::class, 'store'])->name('ap.store');
        Route::delete('/asal-penerimaan/{id}', [AsalPenerimaanController::class, 'destroy'])->name('ap.destroy');
        Route::post('/asal-penerimaan/edit', [AsalPenerimaanController::class, 'update'])->name('ap.update');
        //supplier
        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
        Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
        Route::post('/supplier/excel', [SupplierController::class, 'upload'])->name('supplier.upload');
        Route::delete('/supplier/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
        Route::post('/supplier/edit', [SupplierController::class, 'update'])->name('supplier.update');
        //pejabat
        Route::get('/pejabat', [PejabatController::class, 'pejabat'])->name('pejabat.index');
        Route::post('/pejabat', [PejabatController::class, 'store'])->name('pejabat.store');
        Route::delete('/pejabat/{id}', [PejabatController::class, 'destroy'])->name('pejabat.destroy');
        Route::post('/pejabat/edit', [PejabatController::class, 'update'])->name('pejabat.update');
        //settiing
        Route::get('/setting', [SettingController::class, 'setting'])->name('setting.index');
        Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
        Route::delete('/setting/{id}', [SettingController::class, 'destroy'])->name('setting.destroy');
        Route::post('/setting/edit', [SettingController::class, 'update'])->name('setting.update');
        //dasar pembayaran
        Route::get('/dasar-pembayaran', [DasarPembayaranController::class, 'index'])->name('dp.index');
        Route::post('/dasar-pembayaran', [DasarPembayaranController::class, 'store'])->name('dp.store');
        Route::delete('/dasar-pembayaran/{id}', [DasarPembayaranController::class, 'destroy'])->name('dp.destroy');
        Route::post('/dasar-pembayaran/edit', [DasarPembayaranController::class, 'update'])->name('dp.update');

        //cara bayar
        Route::get('/cara-bayar', [CaraBayarController::class, 'index'])->name('cb.index');
        Route::post('/cara-bayar', [CaraBayarController::class, 'store'])->name('cb.store');
        Route::delete('/cara-bayar/{id}', [CaraBayarController::class, 'destroy'])->name('cb.destroy');
        Route::post('/cara-bayar/edit', [CaraBayarController::class, 'update'])->name('cb.update');
        //Jenis SPM
        Route::get('/jenis-spm', [JenisspmController::class, 'index'])->name('js.index');
        Route::post('/jenis-spm', [JenisspmController::class, 'store'])->name('js.store');
        Route::delete('/jenis-spm/{id}', [JenisspmController::class, 'destroy'])->name('js.destroy');
        Route::post('/jenis-spm/edit', [JenisspmController::class, 'update'])->name('js.update');
        //Jenis pembayaran
        Route::get('/jenis-pembayaran', [JenisPembayaranController::class, 'index'])->name('jp.index');
        Route::post('/jenis-pembayaran', [JenisPembayaranController::class, 'store'])->name('jp.store');
        Route::delete('/jenis-pembayaran/{id}', [JenisPembayaranController::class, 'destroy'])->name('jp.destroy');
        Route::post('/jenis-pembayaran/edit', [JenisPembayaranController::class, 'update'])->name('jp.update');
        //sifat pembayaran
        Route::get('/data-unit', [UnitController::class, 'index'])->name('unit.index');
        Route::post('/data-unit', [UnitController::class, 'store'])->name('unit.store');
        Route::delete('/data-unit/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');
        Route::post('/data-unit/edit', [UnitController::class, 'update'])->name('unit.update');
    

        Route::get('/', [Admin::class, 'index']);
        Route::get('dashboard', [Admin::class, 'index'])->name('admin.index');
    });
});
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';
