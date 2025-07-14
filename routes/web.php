<?php

use App\Http\Controllers\Auth\GantiPasswordController;
use App\Http\Controllers\CetakInsidenController;
use App\Http\Controllers\CetakPortalController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\RekapExcelController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\ValidasiDataRekapController;
use App\Http\Controllers\ValidasiUnitController;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisDokument;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisEdit;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisKategori;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisLanjut;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisUnitTerkait;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenMedisView;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisDokument;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisEdit;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisKategori;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisLanjut;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisUnitTerkait;
use App\Http\Livewire\Admin\Dashboard\AdminInsidenNonMedisView;
use App\Http\Livewire\Admin\Dashboard\DashboardAdmin;
use App\Http\Livewire\Admin\Insiden\Jenis\InsidenJenisEdit;
use App\Http\Livewire\Admin\Insiden\Jenis\InsidenJenisIndex;
use App\Http\Livewire\Admin\Insiden\KategoriInsiden\InsidenKategoriEdit;
use App\Http\Livewire\Admin\Insiden\KategoriInsiden\InsidenKategoriIndex;
use App\Http\Livewire\Admin\Insiden\Ruangan\InsidenRuanganEdit;
use App\Http\Livewire\Admin\Insiden\Ruangan\InsidenRuanganIndex;
use App\Http\Livewire\Admin\Insiden\Status\InsidenStatusEdit;
use App\Http\Livewire\Admin\Insiden\Status\InsidenStatusIndex;
use App\Http\Livewire\Admin\Insiden\Unit\InsidenUnitEdit;
use App\Http\Livewire\Admin\Insiden\Unit\InsidenUnitIndex;
use App\Http\Livewire\Admin\Insiden\UserUnitInsiden\UserUnitInsidenEdit;
use App\Http\Livewire\Admin\Insiden\UserUnitInsiden\UserUnitInsidenIndex;
use App\Http\Livewire\Admin\InsidenRekap\InsidenRekapHistory;
use App\Http\Livewire\Admin\InsidenRekap\InsidenRekapHistoryMedis;
use App\Http\Livewire\Admin\InsidenRekap\InsidenRekapIndex;
use App\Http\Livewire\Admin\InsidenRekap\InsidenRekapIndexBarchart;
use App\Http\Livewire\Admin\InsidenRekap\InsidenRekapIndexBarchartTotal;
use App\Http\Livewire\Admin\InsidenRekap\RekapMedisIndex;
use App\Http\Livewire\Admin\InsidenRekap\RekapNonMedisIndex;
use App\Http\Livewire\Admin\InsidenRekapDetail\InsidenRekapMedisPeriode;
use App\Http\Livewire\Admin\InsidenRekapDetail\InsidenRekapMedisStatus;
use App\Http\Livewire\Admin\InsidenRekapDetail\InsidenRekapNonMedisPeriode;
use App\Http\Livewire\Admin\InsidenRekapDetail\InsidenRekapNonMedisStatus;
use App\Http\Livewire\Admin\InsidenRekapJenis\InsidenRekapJenisBarchart;
use App\Http\Livewire\Admin\InsidenRekapJenis\InsidenRekapJenisBulanBarchart;
use App\Http\Livewire\Admin\InsidenRekapJenis\InsidenRekapJenisIndex;
use App\Http\Livewire\Admin\InsidenRekapTotal\InsidenRekapTotalBarchart;
use App\Http\Livewire\Admin\InsidenRekapTotal\InsidenRekapTotalBrarchartGabungan;
use App\Http\Livewire\Admin\InsidenRekapTotal\InsidenRekapTotalIndex;
use App\Http\Livewire\Admin\InsidenRekapUnit\InsidenRekapUnitIndex;
use App\Http\Livewire\Admin\InsidenRekapUnit\InsidenRekapUnitIndexBarchart;
use App\Http\Livewire\Admin\InsidenRekapUnit\InsidenRekapUnitIndexBarchartTotal;
use App\Http\Livewire\Admin\InsidenRekapUser\InsidenRekapUserBarchart;
use App\Http\Livewire\Admin\InsidenRekapUser\InsidenRekapUserBarchartTotal;
use App\Http\Livewire\Admin\InsidenRekapUser\InsidenRekapUserIndex;
use App\Http\Livewire\Admin\MasterProfileResiko\MasterEdit;
use App\Http\Livewire\Admin\MasterProfileResiko\MasterGrade;
use App\Http\Livewire\Admin\MasterProfileResiko\MasterIndex;
use App\Http\Livewire\Admin\PortalMapping\PortalUserMappingEdit;
use App\Http\Livewire\Admin\PortalMapping\PortalUserMappingIndex;
use App\Http\Livewire\Admin\Report\RekapTotalInsiden;
use App\Http\Livewire\Admin\RiskDeadline\MonitoringDeadlineIndex;
use App\Http\Livewire\Admin\RiskEvaluasi\RiskEvaluasiIndex;
use App\Http\Livewire\Admin\RiskEvaluasi\RiskEvaluasiUpdate;
use App\Http\Livewire\Admin\RiskKategori\RiskKategoriIndex;
use App\Http\Livewire\Admin\RiskKategori\RiskKategoriUpdate;
use App\Http\Livewire\Admin\RiskRekapGrade\RiskRekapGradeDetail;
use App\Http\Livewire\Admin\RiskRekapGrade\RiskRekapGradeIndex;
use App\Http\Livewire\Admin\RiskRekapUnit\RiskRekapUnitIndex;
use App\Http\Livewire\Admin\RiskVerifikasi\RiskVerifikasiIndex;
use App\Http\Livewire\Admin\RiskVerifikasi\RiskVerifikasiUnit;
use App\Http\Livewire\Admin\Setting\PortalKabid\PortalKabidEdit;
use App\Http\Livewire\Admin\Setting\PortalKabid\PortalKabidIndex;
use App\Http\Livewire\Admin\Setting\PortalKabid\PortalKabidUser;
use App\Http\Livewire\Admin\Setting\PortalUnit\PortalUnitEdit;
use App\Http\Livewire\Admin\Setting\PortalUnit\PortalUnitIndex;
use App\Http\Livewire\Admin\Setting\PortalVendor\PortalVendorEdit;
use App\Http\Livewire\Admin\Setting\PortalVendor\PortalVendorIndex;
use App\Http\Livewire\Admin\Setting\UserIndex;
use App\Http\Livewire\Cetak\InsidenMedis;
use App\Http\Livewire\ChartComponent;
use App\Http\Livewire\InsidenUnit\InsidenUnitIndex as InsidenUnitInsidenUnitIndex;
use App\Http\Livewire\InsidenUnit\InsidenUserPicIndex;
use App\Http\Livewire\InsidenUnit\Unit\InsidenUnitMedisView;
use App\Http\Livewire\InsidenUnit\Unit\InsidenUnitNonMedisView;
use App\Http\Livewire\InsidenUnit\User\InsidenUserMedisLanjut;
use App\Http\Livewire\InsidenUnit\User\InsidenUserMedisView;
use App\Http\Livewire\InsidenUnit\User\InsidenUserNonMedisLanjut;
use App\Http\Livewire\InsidenUnit\User\InsidenUserNonMedisView;
use App\Http\Livewire\Pmkp\PedomanView;
use App\Http\Livewire\Pmkp\PedomanViewAdmin;
use App\Http\Livewire\User\Dashboard\HomeDirektur;
use App\Http\Livewire\User\Dashboard\HomeIndex;
use App\Http\Livewire\User\Dashboard\HomeKabid;
use App\Http\Livewire\User\Dashboard\HomePurchasing;
use App\Http\Livewire\User\Dashboard\HomeRequestor;
use App\Http\Livewire\User\Dashboard\HomeViewStatusInsiden;

use App\Http\Livewire\User\History\HistoryUserIndex;
use App\Http\Livewire\User\History\RequestHistoryIndex;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisDokument;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisUnitTerkait;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisEdit;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisIndex;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisKategori;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisLanjut;
use App\Http\Livewire\User\InsidenMedis\InsidenMedisView;
use App\Http\Livewire\User\InsidenMedis\InsidenViewGrading;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisDokument;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisKategori;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisEdit;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisIndex;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisLanjut;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisUnitTerkait;
use App\Http\Livewire\User\InsidenNonMedis\InsidenNonMedisView;
use App\Http\Livewire\User\InsidenNonMedis\InsidenViewGradingUmum;
use App\Http\Livewire\User\Kabid\PortalKabidIndex as KabidPortalKabidIndex;
use App\Http\Livewire\User\Kabid\PortalKabidListDetail;
use App\Http\Livewire\User\Kabid\PortalKabidListHistory;
use App\Http\Livewire\User\PelaporanRiskRegister\PelaporanRiskRegisterIndex;
use App\Http\Livewire\User\PelaporanRiskRegister\PelaporanRiskRegisterValidasi;
use App\Http\Livewire\User\ProfilResiko\PanduanGradeIndex;
use App\Http\Livewire\User\ProfilResiko\ProfilResikoEdit;
use App\Http\Livewire\User\ProfilResiko\ProfilResikoGrading;
use App\Http\Livewire\User\ProfilResiko\ProfilResikoIndex;
use App\Http\Livewire\User\RiskRegisterRekap\RiskRegisterMonitoringData;
use App\Http\Livewire\User\RiskRegisterRekap\RiskRegisterMonitoringEvaluasi;
use App\Http\Livewire\User\RiskRegisterRekap\RiskRegisterRekapEvaluasi;
use App\Http\Livewire\User\RiskRegisterRekap\RiskRegisterRekapIndex;
use App\Http\Livewire\User\Sertifikat\SertifikatUserEdit;
use App\Http\Livewire\User\Sertifikat\SertifikatUserIndex;
use App\Http\Livewire\User\UnitInsidenMedis\UnitMedisIndex;
use App\Http\Livewire\User\UnitInsidenNonMedis\UnitNonMedisIndex;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login-new');
});

Route::get('/ganti-password', function () {
    return view('auth.ganti-password');
})->name('ganti.password');

Route::post('/update-password', [GantiPasswordController::class, 'index'])->name('update.password');

Route::middleware(['auth', 'aktifuser:Y','checkunit'])->group(function () {
    Route::get('/insiden-user-pic-index', InsidenUserPicIndex::class)->name('insiden.user.pic.index');
    Route::get('/dashboard', [DashboardUserController::class, 'index'])->name('dashboard');
    Route::get('/validasi-portal-unit', [ValidasiUnitController::class, 'index'])->name('validasi.unit');
    Route::get('/dashboard-requestor', HomeRequestor::class)->name('dashboard.requestor');
    Route::get('/dashboard-purchasing', HomePurchasing::class)->name('dashboard.purchasing');
    Route::get('/dashboard-kabid', HomeKabid::class)->name('dashboard.kabid');
    Route::get('/dashboard-direktur', HomeDirektur::class)->name('dashboard.direktur');
    //Route::get('/home-insiden-status/{param?}', HomeInsidenStatus::class)->name('home.insiden.status');
    Route::get('/home-insiden-status/{param?}', HomeViewStatusInsiden::class)->name('home.insiden.status');

    Route::get('/user-sertifikat-index', SertifikatUserIndex::class)->name('user.sertifikat.index');
    Route::get('/user-sertifikat-edit/{param?}', SertifikatUserEdit::class)->name('user.sertifikat.edit');
    Route::get('/user-history-index', HistoryUserIndex::class)->name('user.history.index');


   
    Route::get('/portal-user-request-history/{param?}', RequestHistoryIndex::class)->name('user.request.history');

    Route::get('/portal-request-kabid-list', KabidPortalKabidIndex::class)->name('user.kabid.list');
    Route::get('/portal-kabid-list-detail/{param?}', PortalKabidListDetail::class)->name('user.kabid.list.detail');
    Route::get('/portal-kabid-list-history/{param?}', PortalKabidListHistory::class)->name('user.kabid.list.history');

  

    Route::get('/cetak-insiden-medis/{id}', [CetakInsidenController::class, 'insiden_medis'])->name('cetak.medis');
    Route::get('/cetak-insiden-nonmedis/{id}', [CetakInsidenController::class, 'insiden_nonmedis'])->name('cetak.nonmedis');


    Route::get('/cetak-data-insiden/{param?}', InsidenMedis::class)->name('cetak.insiden.medis');
    Route::get('/insiden-non-medis-index', InsidenNonMedisIndex::class)->name('insiden.nonmedis.index');
    Route::get('/insiden-non-medis-lanjut/{param?}', InsidenNonMedisLanjut::class)->name('insiden.nonmedis.lanjut');
    Route::get('/insiden-non-medis-unit/{param?}', InsidenNonMedisUnitTerkait::class)->name('insiden.nonmedis.unit');
    Route::get('/insiden-non-medis-kategori/{param?}', InsidenNonMedisKategori::class)->name('insiden.nonmedis.kategori');
    Route::get('/insiden-non-medis-edit/{param?}', InsidenNonMedisEdit::class)->name('insiden.nonmedis.edit');
    Route::get('/insiden-non-medis-view/{param?}', InsidenNonMedisView::class)->name('insiden.nonmedis.view');
    Route::get('/insiden-non-medis-grade', InsidenViewGradingUmum::class)->name('insiden.nonmedis.grade');
    Route::get('/insiden-non-medis-dokument/{param?}', InsidenNonMedisDokument::class)->name('insiden.nonmedis.dokument');

    Route::get('/insiden-pic-medis-lanjut/{param?}', InsidenUserMedisLanjut::class)->name('insiden.pic.medis.lanjut');
    Route::get('/insiden-pic-medis-view/{param?}', InsidenUserMedisView::class)->name('insiden.pic.medis.view');
    Route::get('/insiden-pic-nonmedis-lanjut/{param?}', InsidenUserNonMedisLanjut::class)->name('insiden.pic.nonmedis.lanjut');
    Route::get('/insiden-pic-nonmedis-view/{param?}', InsidenUserNonMedisView::class)->name('insiden.pic.nonmedis.view');

    Route::get('/risk-register-profil-index', ProfilResikoIndex::class)->name('rsik.register.profil.index');
    Route::get('/risk-register-panduan-index', PanduanGradeIndex::class)->name('rsik.register.panduan.index');
    Route::get('/risk-register-profil-edit/{param?}', ProfilResikoEdit::class)->name('rsik.register.profil.edit');
    Route::get('/risk-register-profil-grade/{param?}', ProfilResikoGrading::class)->name('rsik.register.profil.grade');

    Route::get('/risk-register-pelaporan-index', PelaporanRiskRegisterIndex::class)->name('rsik.register.pelaporan.index');
    Route::get('/risk-register-pelaporan-validasi/{param?}', PelaporanRiskRegisterValidasi::class)->name('rsik.register.pelaporan.validasi');
 
    Route::get('/risk-register-rekap-unit-index', RiskRegisterRekapIndex::class)->name('risk.register.rekap.unit.index'); 
    Route::get('/risk-register-rekap-evaluasi-unit-index', RiskRegisterRekapEvaluasi::class)->name('risk.register.rekap.evaluasi.unit.index'); 
    Route::get('/risk-register-rekap-monitoring-unit-index', RiskRegisterMonitoringEvaluasi::class)->name('risk.register.rekap.monitoring.unit.index'); 
    Route::get('/risk-register-rekap-monitoring-unit-data/{param1?}/{param2?}', RiskRegisterMonitoringData::class)->name('risk.register.rekap.monitoring.unit.data'); 


    Route::get('/insiden-medis-unit/{param?}', InsidenMedisUnitTerkait::class)->name('insiden.medis.unit');
    Route::get('/insiden-medis-kategori/{param?}', InsidenMedisKategori::class)->name('insiden.medis.kategori');
    Route::get('/insiden-medis-edit/{param?}', InsidenMedisEdit::class)->name('insiden.medis.edit');
    Route::get('/insiden-medis-view/{param?}', InsidenMedisView::class)->name('insiden.medis.view');
    Route::get('/insiden-medis-dokument/{param?}', InsidenMedisDokument::class)->name('insiden.medis.dokument');
    Route::get('/insiden-medis-grade', InsidenViewGrading::class)->name('insiden.medis.grade');

    Route::get('/insiden-user-unit-index', InsidenUnitInsidenUnitIndex::class)->name('insiden.user.unit.index');
    Route::get('/insiden-unit-nonmedis-index', UnitNonMedisIndex::class)->name('insiden.unit.nonmedis.index');
    Route::get('/insiden-unit-terkait-medis-view/{param?}', InsidenUnitMedisView::class)->name('insiden.unit.terkait.medis.view');
    Route::get('/insiden-unit-terkait-nonmedis-view/{param?}', InsidenUnitNonMedisView::class)->name('insiden.unit.terkait.nonmedis.view');

    Route::get('/user-pedoman', PedomanView::class)->name('pedoman.insiden');

    Route::get('/chart', ChartComponent::class)->name('chart');
});


Route::middleware(['auth', 'cekadmin:Y', 'aktifuser:Y'])->group(function () {
    Route::get('/dashboard-admin', DashboardAdmin::class)->name('dashboard.admin');
    Route::get('/admin-pedoman', PedomanViewAdmin::class)->name('pedoman.admin');
    Route::get('/admin-medis-lanjut/{param?}', AdminInsidenMedisLanjut::class)->name('admin.medis.lanjut');
    Route::get('/admin-medis-unit/{param?}', AdminInsidenMedisUnitTerkait::class)->name('admin.medis.unit');
    Route::get('/admin-medis-kategori/{param?}', AdminInsidenMedisKategori::class)->name('admin.medis.kategori');
    Route::get('/admin-medis-edit/{param?}', AdminInsidenMedisEdit::class)->name('admin.medis.edit');
    Route::get('/admin-medis-view/{param?}', AdminInsidenMedisView::class)->name('admin.medis.view');
    Route::get('/admin-medis-dokument/{param?}', AdminInsidenMedisDokument::class)->name('admin.medis.dokument');

    Route::get('/admin-non-medis-lanjut/{param?}', AdminInsidenNonMedisLanjut::class)->name('admin.nonmedis.lanjut');
    Route::get('/admin-non-medis-unit/{param?}', AdminInsidenNonMedisUnitTerkait::class)->name('admin.nonmedis.unit');
    Route::get('/admin-non-medis-kategori/{param?}', AdminInsidenNonMedisKategori::class)->name('admin.nonmedis.kategori');
    Route::get('/admin-non-medis-edit/{param?}', AdminInsidenNonMedisEdit::class)->name('admin.nonmedis.edit');
    Route::get('/admin-non-medis-view/{param?}', AdminInsidenNonMedisView::class)->name('admin.nonmedis.view');
    Route::get('/admin-non-medis-dokument/{param?}', AdminInsidenNonMedisDokument::class)->name('admin.nonmedis.dokument');
    
    Route::get('/admin-user-akses', UserIndex::class)->name('user.akses.index');

    Route::get('/admin-portal-unit', PortalUnitIndex::class)->name('portal.unit.index');
    Route::get('/admin-portal-unit-edit/{param?}', PortalUnitEdit::class)->name('portal.unit.edit');

    Route::get('/admin-portal-kabid', PortalKabidIndex::class)->name('portal.kabid.index');
    Route::get('/admin-portal-kabid-edit/{param?}', PortalKabidEdit::class)->name('portal.kabid.edit');
    Route::get('/admin-portal-kabid-user/{param?}', PortalKabidUser::class)->name('portal.kabid.user');

    Route::get('/admin-insiden-unit-mapping', UserUnitInsidenIndex::class)->name('insiden.unit.mapping.index');
    Route::get('/admin-insiden-unit-mapping-edit/{param?}', UserUnitInsidenEdit::class)->name('insiden.unit.mapping.edit');

    Route::get('/admin-insiden-ruangan', InsidenRuanganIndex::class)->name('insiden.ruangan.index');
    Route::get('/admin-insiden-ruangan-edit/{param?}', InsidenRuanganEdit::class)->name('insiden.ruangan.edit');

    Route::get('/admin-insiden-unit', InsidenUnitIndex::class)->name('insiden.unit.index');
    Route::get('/admin-insiden-unit-edit/{param?}', InsidenUnitEdit::class)->name('insiden.unit.edit');

    Route::get('/admin-insiden-jenis', InsidenJenisIndex::class)->name('insiden.jenis.index');
    Route::get('/admin-insiden-jenis-edit/{param?}', InsidenJenisEdit::class)->name('insiden.jenis.edit');

    Route::get('/admin-insiden-status', InsidenStatusIndex::class)->name('insiden.status.index');
    Route::get('/admin-insiden-status-edit/{param?}', InsidenStatusEdit::class)->name('insiden.status.edit');

    Route::get('/admin-resiko-kategori', RiskKategoriIndex::class)->name('resiko.kategori.index');
    Route::get('/admin-resiko-kategori-edit/{param?}', RiskKategoriUpdate::class)->name('resiko.kategori.edit');

    Route::get('/admin-resiko-evaluasi', RiskEvaluasiIndex::class)->name('resiko.evaluasi.index');
    Route::get('/admin-resiko-evaluasi-edit/{param?}', RiskEvaluasiUpdate::class)->name('resiko.evaluasi.edit');
    
    Route::get('/admin-resiko-grade-rekap', RiskRekapGradeIndex::class)->name('resiko.grade.rekap.index');
     Route::get('/admin-resiko-grade-rekap-detail/{param?}', RiskRekapGradeDetail::class)->name('resiko.grade.rekap.detail');
    Route::get('/admin-resiko-unit-rekap', RiskRekapUnitIndex::class)->name('resiko.unit.rekap.index');

 Route::get('/admin-resiko-unit-deadline', MonitoringDeadlineIndex::class)->name('resiko.unit.deadline.index');
    

    Route::get('/admin-resiko-master', MasterIndex::class)->name('resiko.master.index');
    Route::get('/admin-resiko-master-edit/{param?}', MasterEdit::class)->name('resiko.master.edit');
    
    Route::get('/admin-resiko-master-grade/{param?}', MasterGrade::class)->name('resiko.master.grade');
    

     Route::get('/admin-resiko-verifikasi', RiskVerifikasiIndex::class)->name('resiko.verifikasi.index');
     Route::get('/admin-resiko-verifikasi-unit/{param?}', RiskVerifikasiUnit::class)->name('resiko.verifikasi.unit');

    Route::get('/admin-portal-vendor', PortalVendorIndex::class)->name('portal.vendor.index');
    Route::get('/admin-portal-vendor-edit/{param?}', PortalVendorEdit::class)->name('portal.vendor.edit');

    Route::get('/insiden-rekap-index', InsidenRekapIndex::class)->name('insiden.rekap.index');
    Route::get('/insiden-rekap-index-barchart/{param?}', InsidenRekapIndexBarchart::class)->name('insiden.rekap.index.barchart');
    Route::get('/insiden-rekap-index-barchart-total/{param?}', InsidenRekapIndexBarchartTotal::class)->name('insiden.rekap.index.barchart.total');
    Route::get('/insiden-rekap-data-unit-excel/{param?}', [RekapExcelController::class, 'rekap_insiden_unit'])->name('insiden.rekap.index.unit.excel');
    Route::get('/insiden-rekap-data-medis-periode/{param?}', [RekapExcelController::class, 'rekap_insiden_medis_periode'])->name('insiden.rekap.index.medis.periode.excel');
    Route::get('/insiden-rekap-data-nonmedis-periode/{param?}', [RekapExcelController::class, 'rekap_insiden_nonmedis_periode'])->name('insiden.rekap.index.nonmedis.periode.excel');

    Route::get('/insiden-rekap-unit-index', InsidenRekapUnitIndex::class)->name('insiden.rekap.unit.index');
    Route::get('/insiden-rekap-unit-barchart/{param?}', InsidenRekapUnitIndexBarchart::class)->name('insiden.rekap.unit.barchart');
    Route::get('/insiden-rekap-unit-barchart-total/{param?}', InsidenRekapUnitIndexBarchartTotal::class)->name('insiden.rekap.unit.barchart.total');
    Route::get('/insiden-rekap-data-unit-excel/{param?}', [RekapExcelController::class, 'rekap_insiden_unit'])->name('insiden.rekap.index.unit.excel');
    Route::get('/insiden-rekap-data-medis-periode/{param?}', [RekapExcelController::class, 'rekap_insiden_medis_periode'])->name('insiden.rekap.index.medis.periode.excel');

    Route::get('/insiden-rekap-medis', RekapMedisIndex::class)->name('insiden.rekap.medis');
    Route::get('/insiden-rekap-nonmedis', RekapNonMedisIndex::class)->name('insiden.rekap.nonmedis');
    Route::get('/insiden-rekap-history', InsidenRekapHistory::class)->name('insiden.rekap.history');
    Route::get('/insiden-rekap-history-medis', InsidenRekapHistoryMedis::class)->name('insiden.rekap.history.medis');

    Route::get('/insiden-rekap-medis-status/{param?}/{param1?}', InsidenRekapMedisStatus::class)->name('insiden.rekap.medis.status');
    Route::get('/insiden-rekap-nonmedis-status/{param?}/{param1?}', InsidenRekapNonMedisStatus::class)->name('insiden.rekap.nonmedis.status');
    Route::get('/insiden-rekap-nonmedis-periode/{param?}/{param1?}', InsidenRekapNonMedisPeriode::class)->name('insiden.rekap.nonmedis.periode');
    Route::get('/insiden-rekap-medis-periode/{param?}/{param1?}', InsidenRekapMedisPeriode::class)->name('insiden.rekap.medis.periode');

    Route::get('/admin-rekap-total-insiden', InsidenRekapTotalIndex::class)->name('insiden.rekap.total.index');
    Route::get('/admin-rekap-total-insiden-barchart/{param?}', InsidenRekapTotalBarchart::class)->name('insiden.rekap.total.barchart');
    Route::get('/admin-rekap-total-insiden-barchart-gabungan/{param?}', InsidenRekapTotalBrarchartGabungan::class)->name('insiden.rekap.total.barchart.gabungan');

    // Route::get('/validasi-medis', [ValidasiDataRekapController::class, 'rekap_medis'])->name('validasi.rekap.medis');
    // Route::get('/validasi-nonmedis', [ValidasiDataRekapController::class, 'rekap_nonmedis'])->name('validasi.rekap.nonmedis');

    Route::get('/admin-insiden-total-user', InsidenRekapUserIndex::class)->name('insiden.rekap.user.total.index');
    Route::get('/admin-insiden-total-user-grafik/{param?}', InsidenRekapUserBarchart::class)->name('insiden.rekap.user.total.grafik');
    Route::get('/admin-insiden-total-user-grafik-total/{param?}', InsidenRekapUserBarchartTotal::class)->name('insiden.rekap.user.total.grafik.total');

    Route::get('/admin-insiden-total-jenis', InsidenRekapJenisIndex::class)->name('insiden.rekap.jenis.total.index');
    Route::get('/admin-insiden-total-jenis-grafik/{param?}', InsidenRekapJenisBarchart::class)->name('insiden.rekap.jenis.total.grafik');
    Route::get('/admin-insiden-total-jenis-grafik-total/{param?}', InsidenRekapJenisBulanBarchart::class)->name('insiden.rekap.jenis.total.grafik.bulan');


});


require __DIR__ . '/auth.php';
