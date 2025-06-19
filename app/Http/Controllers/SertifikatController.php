<?php

namespace App\Http\Controllers;

use App\Models\Admin\Pelatihan_sertifikat;
use App\Models\Admin\Pelatihan_user_sertifikat;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use SebastianBergmann\Template\Template;

class SertifikatController extends Controller
{
    //
    public function review_sertifikat($id)
    {
        $template = Pelatihan_sertifikat::find($id);
        $desain_template = 'storage/' . $template->photo;

        $pdf = new Fpdf();
        //$pdf->SetMargins(5, 5, 5);
        $pdf->SetTitle('Sertifikat -' . $template->pelatihan->nama_pelatihan);
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage("L", ['320', '215']);
        // $pdf->AddPage("L", "A4");
        $pdf->Image($desain_template, 0, 0, 0, 0);
        $pdf->SetFont('Arial', 'B', 18);
        //nama peserta
        $pdf->text($template->lokasi_y, $template->lokasi_x, "NAMA PESERTA");
        //lokasi 
        $pdf->ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->text($template->acc1_y, $template->acc1_x, $template->pelatihan->nama_pelatihan);
        $pdf->text($template->acc2_y, $template->acc2_x, tgl_indo(date('Y-m-d')));
        // $pdf->Cell(-30, 180, "Kelas Pelatihan", 0, "", "R");
        // $pdf->Cell(-10, 200, "Tanggal", 0, "", "R");
        // $pdf->Cell(-40, 310, "Acc1", 0, "", "R");
        $pdf->Output();
        exit;
    }

    public function view_sertifikat($id)
    {
        $template = Pelatihan_user_sertifikat::where('pelatihan_user_id', $id)->first();
        $desain_template = 'storage/' . $template->photo;

        $pdf = new Fpdf();
        //$pdf->SetMargins(5, 5, 5);
        $pdf->SetTitle('Sertifikat -' . $template->lokasi);
        $pdf->SetAutoPageBreak(false);
        $pdf->AddPage("L", ['320', '215']);
        // $pdf->AddPage("L", "A4");
        $pdf->Image($desain_template, 0, 0, 0, 0);
        $pdf->SetFont('Arial', 'B', 18);
        //nama peserta
        $pdf->text($template->lokasi_y, $template->lokasi_x, $template->nama_user);
        //lokasi 
        $pdf->ln();
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->text($template->acc1_y, $template->acc1_x, $template->lokasi);
        $pdf->text($template->acc2_y, $template->acc2_x, tgl_indo($template->created_at));
        // $pdf->Cell(-30, 180, "Kelas Pelatihan", 0, "", "R");
        // $pdf->Cell(-10, 200, "Tanggal", 0, "", "R");
        // $pdf->Cell(-40, 310, "Acc1", 0, "", "R");
        $pdf->Output();
        exit;
    }
}