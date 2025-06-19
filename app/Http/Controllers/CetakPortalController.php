<?php

namespace App\Http\Controllers;

use App\Models\Transaksi\Portal_request;
use App\Models\Transaksi\Portal_request_detail;
use App\Models\Transaksi\Portal_request_detail_log;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\ItemNotFoundException;

class CetakPortalController extends Controller
{
    //

    public function cetak_portal($id)
    {
        $data = Portal_request::find($id);
        $data_detail = Portal_request_detail::where('portal_request_id', $id)->get();
        //dd($data);

        $pdf = new Fpdf();
        //$pdf->SetMargins(5, 5, 5);
        $pdf->SetTitle('Purchase Request -' . $data->nomor_pr);
        $pdf->SetAutoPageBreak(false);
        //$pdf->AddPage("L", ['320', '215']);
        $pdf->AddPage("L", "A4");
        // $pdf->Image($desain_template, 0, 0, 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        // //nama peserta 
        $pdf->text(10, 20, "PT BUNDA MEDIKA DEWATA");
        $pdf->SetFont('Arial', '', 11);
        $pdf->text(10, 25, "Jl. Gatot Subroto Barat No. 455X");
        $pdf->text(10, 30, "Denpasar - Bali, 80561");
        // //lokasi 
        $pdf->SetFont('Arial', 'B', 11);
        $pdf->text(110, 20, "PERMINTAAN PEMBELIAN");
        $pdf->text(113, 25, "PURCHASING REQUEST");
        // $pdf->ln();

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->text(210, 20, "Alamat Kantor & Pengiriman Barang :");
        $pdf->text(210, 25, "BIC Clinic");
        $pdf->text(210, 30, "Jl. Gatot Subroto Barat No. 455X");
        $pdf->text(210, 35, "Denpasar - Bali, 80561");
        $pdf->text(210, 40, "Telp : 0817378911");

        $pdf->text(10, 50, "Nomor PR :" . $data->nomor_pr);
        $pdf->text(10, 55, "Tgl Request :" . tgl_indo($data->tgl_request));
        $pdf->text(10, 60, "User Request :" . get_nama_user($data->users_id));

        $pdf->text(190, 60, "Vendor/Suplier :" . $data->portal_vendor->nama_vendor);
        $tinggi = $pdf->GetY();
        $pdf->SetXY(10, 70);
        $pdf->Cell(10, 6, "No", 1);
        $pdf->Cell(110, 6, "Nama Barang", 1);
        $pdf->Cell(15, 6, "Qty", 1, 0, 'C');
        $pdf->Cell(35, 6, "Harga", 1, 0, 'R');
        $pdf->Cell(35, 6, "Diskon", 1, 0, 'R');
        $pdf->Cell(35, 6, "Harga Net", 1, 0, 'R');
        $pdf->Cell(35, 6, "Total", 1, 0, 'R');
        $pdf->SetFont('Arial', '', 10);
        $no = 1;
        $pdf->Ln();
        foreach ($data_detail as $item) {
            $pdf->Cell(10, 6, $no,   1);
            $pdf->Cell(110, 6, $item->nama_barang, 1);
            $pdf->Cell(15, 6, $item->qty,  1, 0, 'C');
            $pdf->Cell(35, 6, rupiah($item->harga_satuan),   1, 0, 'R');
            $pdf->Cell(35, 6, rupiah($item->discount), 1, 0, 'R');
            $pdf->Cell(35, 6, rupiah($item->harga_net),  1, 0, 'R');
            $pdf->Cell(35, 6, rupiah($item->total_harga),  1, 0, 'R');
            $pdf->ln();
            $no++;
        }
        $pdf->Cell(10, 6, "", 0);
        $pdf->Cell(110, 6, "", 0);
        $pdf->Cell(15, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "Total Harga", 1, 0, 'R');
        $pdf->Cell(35, 6, rupiah($data->sub_total), 1, 0, 'R');
        $pdf->ln();
        $pdf->Cell(10, 6, "", 0);
        $pdf->Cell(110, 6, "", 0);
        $pdf->Cell(15, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "Diskon", 1, 0, 'R');
        $pdf->Cell(35, 6, rupiah($data->diskon), 1, 0, 'R');
        $pdf->ln();
        $pdf->Cell(10, 6, "", 0);
        $pdf->Cell(110, 6, "", 0);
        $pdf->Cell(15, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "Sub Total", 1, 0, 'R');
        $pdf->Cell(35, 6, rupiah($data->sub_total - $data->diskon), 1, 0, 'R');
        $pdf->ln();
        $pdf->Cell(10, 6, "", 0);
        $pdf->Cell(110, 6, "", 0);
        $pdf->Cell(15, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "PPN 11%", 1, 0, 'R');
        $pdf->Cell(35, 6, rupiah($data->ppn), 1, 0, 'R');
        $pdf->ln();
        $pdf->Cell(10, 6, "", 0);
        $pdf->Cell(110, 6, "", 0);
        $pdf->Cell(15, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "", 0);
        $pdf->Cell(35, 6, "Grand Total", 1, 0, 'R');
        $pdf->Cell(35, 6, rupiah($data->grand_total), 1, 0, 'R');


        $pdf->ln();
        $pdf->Cell(70, 8, "Note :" . $data->description);
        $pdf->ln();
        $pdf->ln();
        $pdf->Cell(55, 6, "Requestor", 0);
        if ($data->non_purchasing == 'N') {
            $pdf->Cell(45, 6, "Purchasing", 0);
        } else {
            $pdf->Cell(45, 6, "Finance Spv/Staff", 0);
        }

        $pdf->Cell(45, 6, "Kabid", 0);
        $pdf->Cell(45, 6, "Finance Head", 0);
        $pdf->Cell(45, 6, "Direktur", 0);
        $pdf->ln();
        $pdf->ln();
        $pdf->ln();
        $pdf->ln();
        $pdf->Cell(55, 6, get_nama_user($data->users_id), 0);
        $pdf->Cell(45, 6, "", 0);
        $pdf->Cell(45, 6, "", 0);
        $pdf->Cell(45, 6, "Pramaditya Suryawan", 0);
        $pdf->Cell(45, 6, "dr. Basilius Beni Rutantia Djati, MARS. M.H", 0);

        $pdf->Output();
        exit;
    }

    public function cetak_portal_log_data($id)
    {
        $data = Portal_request::find($id);
        $data_detail = Portal_request_detail_log::where('portal_request_id', $id)->get();
        // dd($data_detail);

        $pdf = new Fpdf();
        //$pdf->SetMargins(5, 5, 5);
        $pdf->SetTitle('Purchase Request -' . $data->nomor_pr);
        $pdf->SetAutoPageBreak(false);
        //$pdf->AddPage("L", ['320', '215']);
        $pdf->AddPage("L", "A4");
        // $pdf->Image($desain_template, 0, 0, 0, 0);
        $pdf->SetFont('Arial', 'B', 12);
        // //nama peserta 
        $pdf->text(10, 15, "PT BUNDA MEDIKA DEWATA");
        $pdf->SetFont('Arial', '', 6);
        $pdf->text(10, 18, "Jl. Gatot Subroto Barat No. 455X");
        $pdf->text(10, 21, "Denpasar - Bali, 80561");

        $pdf->text(10, 30, "Nomor PR :" . $data->nomor_pr);
        $pdf->text(10, 33, "Tgl Request :" . tgl_indo($data->tgl_request));
        $pdf->text(10, 36, "User Request :" . get_nama_user($data->users_id));
        $pdf->text(10, 45, "LOG DATA");
        $pdf->text(190, 36, "Vendor/Suplier :" . $data->portal_vendor->nama_vendor);
        $tinggi = $pdf->GetY();
        $pdf->SetXY(10, 50);
        $pdf->Cell(5, 5, "No", 1);
        $pdf->Cell(60, 5, "Nama Barang", 1);
        $pdf->Cell(5, 5, "Qty", 1, 0, 'C');
        $pdf->Cell(18, 5, "Harga", 1, 0, 'R');
        $pdf->Cell(15, 5, "Diskon", 1, 0, 'R');
        $pdf->Cell(18, 5, "Harga Net", 1, 0, 'R');
        $pdf->Cell(20, 5, "Total", 1, 0, 'R');
        $pdf->Cell(60, 5, "Keterangan", 1, 0, 'L');
        $pdf->Cell(17, 5, "Proses", 1, 0, 'R');
        $pdf->Cell(40, 5, "User", 1, 0, 'L');
        $pdf->Cell(25, 5, "Tgl Update",  1, 0, 'R');
        $pdf->SetFont('Arial', '', 6);
        $no = 1;
        $pdf->Ln();
        foreach ($data_detail as $item) {
            $pdf->Cell(5, 5, $no,   1);
            $pdf->Cell(60, 5, $item->nama_barang, 1);
            $pdf->Cell(5, 5, $item->qty,  1, 0, 'C');
            $pdf->Cell(18, 5, $item->harga_satuan,   1, 0, 'R');
            $pdf->Cell(15, 5, $item->discount, 1, 0, 'R');
            $pdf->Cell(18, 5, $item->harga_net,  1, 0, 'R');
            $pdf->Cell(20, 5, $item->total_harga,  1, 0, 'R');
            $pdf->Cell(60, 5, $item->keterangan,  1, 0, 'L');
            $pdf->Cell(17, 5, $item->status_proses,  1, 0, 'R');
            $pdf->Cell(40, 5, get_nama_user($item->users_id),  1, 0, 'L');
            $pdf->Cell(25, 5, $item->updated_at,   1);
            $pdf->ln();
            $no++;
        }
        // $pdf->Cell(10, 5, "", 0);
        // $pdf->Cell(100, 5, "", 0);
        // $pdf->Cell(15, 5, "", 0);
        // $pdf->Cell(20, 5, "", 0);
        // $pdf->Cell(20, 5, "", 0);
        // $pdf->Cell(20, 5, "Total Harga", 1, 0, 'R');
        // $pdf->Cell(20, 5, $data->sub_total, 1, 0, 'R');
        $pdf->ln();

        $pdf->Output();
        exit;
    }
}