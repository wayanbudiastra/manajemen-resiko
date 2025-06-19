<?php

use App\Models\Admin\Pelatihan_materi;
use App\Models\Admin\Pelatihan_sertifikat;
use App\Models\Admin\Pelatihan_soal;
use App\Models\Admin\Pelatihan_user;
use App\Models\Admin\Pelatihan_user_log;
use App\Models\Admin\Pelatihan_user_log_materi;
use App\Models\Admin\Pelatihan_user_log_soal;
use App\Models\Admin\Portal_unit;
use App\Models\Admin\Portal_user_unit_level_mapping;
use App\Models\Insiden\Insiden_kategori_medis;
use App\Models\Insiden\Insiden_kategori_nonmedis;
use App\Models\Insiden\Insiden_medis_request;
use App\Models\Insiden\Insiden_nonmedis_request;
use App\Models\Insiden\Insiden_unit_terkait_medis;
use App\Models\Insiden\Insiden_unit_terkait_nonmedis;
use App\Models\Insiden\Insiden_unit_user;
use App\Models\Risk\Risk_register_pelaporan;
use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_proses;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;


function status_draf($id){
        $total = 0;
        $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',1)->count();
        $insiden_non_medis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',1)->count();
        $total = $insiden_medis + $insiden_non_medis;

        return $total;
}

function status_open($id){
    $total = 0;
    $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',2)->count();
    $insiden_non_medis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',2)->count();
    $total = $insiden_medis + $insiden_non_medis;

    return $total;
}

function status_pending($id){
    $total = 0;
    $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',3)->count();
    $insiden_non_medis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',3)->count();
    $total = $insiden_medis + $insiden_non_medis;

    return $total;
}

function status_close($id){
    $total = 0;
    $insiden_medis = Insiden_medis_request::where('users_id',$id)->where('insiden_status_id',4)->count();
    $insiden_non_medis = Insiden_nonmedis_request::where('users_id',$id)->where('insiden_status_id',4)->count();
    $total = $insiden_medis + $insiden_non_medis;

    return $total;
}
function tgl_indo($tgl)
{
    $date = date('Y-m-d', strtotime($tgl));
    if ($date == '0000-00-00')
        return 'Tanggal Kosong';
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);

    switch ($bln) {
        case 1: {
                $bln = 'Januari';
            }
            break;
        case 2: {
                $bln = 'Februari';
            }
            break;
        case 3: {
                $bln = 'Maret';
            }
            break;
        case 4: {
                $bln = 'April';
            }
            break;
        case 5: {
                $bln = 'Mei';
            }
            break;
        case 6: {
                $bln = "Juni";
            }
            break;
        case 7: {
                $bln = 'Juli';
            }
            break;
        case 8: {
                $bln = 'Agustus';
            }
            break;
        case 9: {
                $bln = 'September';
            }
            break;
        case 10: {
                $bln = 'Oktober';
            }
            break;
        case 11: {
                $bln = 'November';
            }
            break;
        case 12: {
                $bln = 'Desember';
            }
            break;
        default: {
                $bln = 'UnKnown';
            }
            break;
    }
    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0: {
                $hari = 'Minggu';
            }
            break;
        case 1: {
                $hari = 'Senin';
            }
            break;
        case 2: {
                $hari = 'Selasa';
            }
            break;
        case 3: {
                $hari = 'Rabu';
            }
            break;
        case 4: {
                $hari = 'Kamis';
            }
            break;
        case 5: {
                $hari = "Jum'at";
            }
            break;
        case 6: {
                $hari = 'Sabtu';
            }
            break;
        default: {
                $hari = 'UnKnown';
            }
            break;
    }
    //  $tanggalIndonesia = "Hari ".$hari.", Tanggal ".$tgl . " " . $bln . " " . $thn;
    $tanggalIndonesia = $tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}

function hitung_usia($tgl)
{
    $tgl_lahir = date($tgl);
    $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
    $date2 = new DateTime(date('Y-m-d'));
    $interval = $date1->diff($date2);
    $usia = $interval->y . " tahun " . $interval->m . " bulan " . $interval->d . " hari ";
    return $usia;
}

function ambil_photo($id)
{
    // $data = Perawat::where('users_id', $id)->first();
    // $photo = "";
    // if ($data) {
    //     $photo = $data->photo_profile;
    // }
    $photo = "";
    return $photo;
}

function get_unit_user($id){
    $data = Insiden_unit_user::where('users_id',$id)->first();
if($data){
    $id = $data->insiden_unit_id;
}else{
    $id = null;
}

    return $id;
}

function get_periode(){
   $tahun = date("Y");
   $bulan = date("m");
   $periode = $tahun.''.$bulan;
   return $periode;    
}

function get_periode_laporan($data){
   
   $tahun = substr($data,0,4);
   $bulan = substr($data,4,2);
if($bulan=="01"){
$nama_bulan = "Januari";
}elseif($bulan=="02"){
$nama_bulan = "Februari";
}elseif($bulan=="03"){
$nama_bulan = "Maret";
}elseif($bulan=="04"){
$nama_bulan = "April";
}elseif($bulan=="05"){
$nama_bulan = "Mei";
}elseif($bulan=="06"){
$nama_bulan = "Juni";
}elseif($bulan=="07"){
$nama_bulan = "Juli";
}elseif($bulan=="08"){
$nama_bulan = "Agustus";
}elseif($bulan=="09"){
$nama_bulan = "Setember";
}elseif($bulan=="10"){
$nama_bulan = "Oktober";
}elseif($bulan=="11"){
$nama_bulan = "November";
}elseif($bulan=="12"){
$nama_bulan = "Desember";
}
   $periode = $nama_bulan .' '.$tahun;
   return $periode;    
}


function rekap_risk_unit($unit,$tahun,$bulan,$grade){
$total = 0;
$data = Risk_register_pelaporan::where('unit_id',$unit)->where('periode_laporan',$tahun.''.$bulan)->where('matrik_kontrol_grade',$grade)->where('posting','Y')->count();
if($data > 0){
    $total = $data;
}
return $total;
}

function rekap_risk_unit_total($unit,$tahun,$bulan){
$total = 0;
$data = Risk_register_pelaporan::where('unit_id',$unit)->where('periode_laporan',$tahun.''.$bulan)->where('posting','Y')->count();
if($data > 0){
    $total = $data;
}
return $total;
}

function rekap_risk_unit_all($tahun,$bulan,$grade){
$total = 0;
$data = Risk_register_pelaporan::where('periode_laporan',$tahun.''.$bulan)->where('matrik_kontrol_grade',$grade)->where('posting','Y')->count();
if($data > 0){
    $total = $data;
}
return $total;
}

function rekap_risk_unit_total_all($tahun,$bulan){
$total = 0;
$data = Risk_register_pelaporan::where('periode_laporan',$tahun.''.$bulan)->where('posting','Y')->count();
if($data > 0){
    $total = $data;
}
return $total;
}

function get_total_materi($id)
{
    $total = 0;
    $data = Pelatihan_materi::where('pelatihan_id', $id)->count();
    if ($data > 0) {
        $total = $data;
    }
    return $total;
}

function get_total_soal($id)
{
    $total = 0;
    $data = Pelatihan_soal::where('pelatihan_id', $id)->count();
    if ($data > 0) {
        $total = $data;
    }
    return $total;
}

function get_total_user($id)
{
    $total = 0;
    $data = Pelatihan_user::where('pelatihan_id', $id)->count();
    if ($data > 0) {
        $total = $data;
    }
    return $total;
}

function get_total_sertifikat($id)
{
    $total = 0;
    $data = Pelatihan_sertifikat::where('pelatihan_id', $id)->count();
    if ($data > 0) {
        $total = $data;
    }
    return $total;
}

function cek_kunci_jawaban($soal_id, $jawaban)
{
    $soal = Pelatihan_soal::find($soal_id);
    $kunci_jawaban = $soal->kunci_jawaban;

    if ($kunci_jawaban == $jawaban) {
        $hasil = 'true';
    } else {
        $hasil = 'false';
    }
    return $hasil;
}

function cek_bobot($soal_id)
{
    $soal = Pelatihan_soal::find($soal_id);
    $bobot = $soal->bobot;
    return $bobot;
}

function get_kunci_jawaban($id)
{
    $data = Pelatihan_soal::find($id);
    return $data->kunci_jawaban;
}

function get_jawaban_yang_benar($id)
{
    $data = Pelatihan_soal::find($id);
    if ($data->kunci_jawaban == 'A') {
        $jawaban = $data->jawaban_a;
    } elseif ($data->kunci_jawaban == 'B') {
        $jawaban = $data->jawaban_b;
    } elseif ($data->kunci_jawaban == 'C') {
        $jawaban = $data->jawaban_c;
    } else {
        $jawaban = $data->jawaban_d;
    }
    return $jawaban;
}





function insiden_unit_user($id)
{
    $data = Insiden_unit_user::where('users_id', $id)->first();
    $insiden_unit = [];
    if ($data) {
        $insiden_unit = [
            "nama_insiden_unit" => $data->insiden_unit->nama_insiden_unit,
            "insiden_unit_id" => $data->insiden_unit_id
        ];
    } else {
        $insiden_unit = [
            "nama_insiden_unit" => "-",
            "insiden_unit_id" => "-"
        ];
    }
    return $insiden_unit;
}

function insiden_level_user($id)
{
    $data = Insiden_unit_user::where('users_id', $id)->first();
    $insiden_level = [];
    if ($data) {
        $insiden_level = [
            "nama_insiden_level" => $data->insiden_level->nama_insiden_level,
            "insiden_level_id" => $data->insiden_level_id,
            "mapping_id" => $data->id,
        ];
    } else {
        $insiden_level = [
            "nama_insiden_level" => "-",
            "insiden_level_id" => "",
            "mapping_id" => ""
        ];
    }
    return $insiden_level;
}


function maxno_nonmedis()
{
    $q = Insiden_nonmedis_request::max('nomor_insiden');
    $kd = "";
    if ($q != "") {
        $tmp = ((int)$q) + 1;
        $d = sprintf("%06s", $tmp);
        $kd = $d;
    } else {
        $kd = "000001";
    }
    return $kd;
}



function maxno_medis()
{
    $q = Insiden_nonmedis_request::max('nomor_insiden');
    $kd = "";
    if ($q != "") {
        $tmp = ((int)$q) + 1;
        $d = sprintf("%06s", $tmp);
        $kd = $d;
    } else {
        $kd = "000001";
    }
    return $kd;
}
function get_nama_user($id)
{
    $data = User::find($id);
    $full_name = '-';
    if ($data) {
        $full_name = $data->first_name . ' ' . $data->last_name;
    }

    return $full_name;
}

function rekap_data_ktd($tahun,$bulan){
   
    $umum = Insiden_nonmedis_request::where('insiden_jenis_id',1)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    $medis = Insiden_medis_request::where('insiden_jenis_id',1)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    return $umum + $medis;
}

function rekap_data_ktc($tahun,$bulan){
   
    $umum = Insiden_nonmedis_request::where('insiden_jenis_id',2)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    $medis = Insiden_medis_request::where('insiden_jenis_id',2)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    return $umum + $medis;
}

function rekap_data_knc($tahun,$bulan){
   
    $umum = Insiden_nonmedis_request::where('insiden_jenis_id',3)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    $medis = Insiden_medis_request::where('insiden_jenis_id',3)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    return $umum + $medis;
}

function rekap_data_kpcs($tahun,$bulan){
   
    $umum = Insiden_nonmedis_request::where('insiden_jenis_id',4)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    $medis = Insiden_medis_request::where('insiden_jenis_id',4)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    return $umum + $medis;
}

function rekap_data_sentinel($tahun,$bulan){
   
    $umum = Insiden_nonmedis_request::where('insiden_jenis_id',5)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    $medis = Insiden_medis_request::where('insiden_jenis_id',5)->whereYear('tgl_insiden', $tahun)->whereMonth('tgl_insiden', $bulan)->count();
    return $umum + $medis;
}

function rekap_insiden_jenis_medis($id,$tahun){
    
    $data = Insiden_medis_request::where('insiden_jenis_id',$id)->whereYear('tgl_insiden', $tahun)->count();
    return $data;
}

function rekap_insiden_jenis_nonmedis($id,$tahun){
    
    $data = Insiden_nonmedis_request::where('insiden_jenis_id',$id)->whereYear('tgl_insiden', $tahun)->count();
    return $data;
}

function get_nama_unit($id)
{
    $data = Portal_unit::find($id);
    $full_name = $data->nama_unit;
    return $full_name;
}

function get_unit_non_medis($id)
{
    $data = Insiden_unit_terkait_nonmedis::where('insiden_nonmedis_request_id', $id)->get();
    return $data;
}

function get_unit_medis($id)
{
    $data = Insiden_unit_terkait_medis::where('insiden_medis_request_id', $id)->get();
    return $data;
}

function get_kategori_non_medis($id)
{
    $data = Insiden_kategori_nonmedis::where('insiden_nonmedis_request_id', $id)->get();
    return $data;
}

function get_kategori_medis($id)
{
    $data = Insiden_kategori_medis::where('insiden_medis_request_id', $id)->get();
    return $data;
}

function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}

function id_encrypt($id)
{
    $idx = Crypt::encrypt($id);
    return $idx;
}

function get_status_request_portal($id)
{
    $data = Portal_request_proses::where('portal_request_id', $id)->get();
    $status = 'draft';
    if ($data->count() > 0) {
        $status = 'posting';
    }
    //jika status posting maka requestor sudah melakukan posting
    return $status;
}

function get_nama_user_pic_insiden($id)
{
    if ($id == '') {
        $full_name = '';
    } else {
        $data = User::find($id);
        $full_name = $data->first_name . ' ' . $data->last_name;
    }

    return $full_name;
}

function enkerip_data($id)
{

    $enkrip = Crypt::encrypt($id);

    return $enkrip;
}

function rekap_insiden_medis($id,$data_tahun){

    if($data_tahun ==''){
        $tahun = date("Y");
    }else{
        $tahun = $data_tahun;
    }
  
    $hasil = 0;
    $data = Insiden_unit_terkait_medis::where('insiden_unit_id',$id)->whereYear('created_at',$tahun)->count();
    if($data){
        $hasil = $data;
    }
    return $hasil;
    
}

function rekap_insiden_unit_medis($id,$data_tahun){

    if($data_tahun ==''){
        $tahun = date("Y");
    }else{
        $tahun = $data_tahun;
    }
  
    $hasil = 0;
    $data = Insiden_medis_request::where('insiden_unit_id',$id)->whereYear('tgl_insiden',$tahun)->count();
    if($data){
        $hasil = $data;
    }
    return $hasil;
    
}

function rekap_insiden_nonmedis($id,$data_tahun){

    if($data_tahun ==''){
        $tahun = date("Y");
    }else{
        $tahun = $data_tahun;
    }
    $hasil = 0;
    
    $data = Insiden_unit_terkait_nonmedis::where('insiden_unit_id',$id)->whereYear('created_at', $tahun)->count();
    if($data){
        $hasil = $data;
    }
    return $hasil;
    
}

function rekap_insiden_unit_nonmedis($id,$data_tahun){

    if($data_tahun ==''){
        $tahun = date("Y");
    }else{
        $tahun = $data_tahun;
    }
    $hasil = 0;
    
    $data = Insiden_nonmedis_request::where('insiden_unit_id',$id)->whereYear('tgl_insiden', $tahun)->count();
    if($data){
        $hasil = $data;
    }
    return $hasil;
    
}

