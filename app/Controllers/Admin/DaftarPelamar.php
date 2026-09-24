<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebProfile\LowonganKerjaModel;
use App\Models\WebProfile\KirimLamaranModel;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

class DaftarPelamar extends BaseController
{
    protected $lokerModel;
    protected $lamaranModel;

    public function __construct()
    {
        $this->lokerModel = new LowonganKerjaModel();
        $this->lamaranModel = new KirimLamaranModel();
    }

    public function index()
    {
        // Get all lowongan with pelamar count
        $lokerList = $this->lokerModel
            ->select('lowongan_kerja.*, COUNT(kirim_lamaran.idkirim_lamaran) as jumlah_pelamar')
            ->join('kirim_lamaran', 'kirim_lamaran.loker_idloker = lowongan_kerja.idloker', 'left')
            ->where('lowongan_kerja.deleted', 0)
            ->groupBy('lowongan_kerja.idloker')
            ->orderBy('lowongan_kerja.created_at', 'DESC')
            ->findAll();

        $data = [
            'pageTitle' => 'Daftar Pelamar',
            'lokerList' => $lokerList,
            'body' => 'Admin/DaftarPelamar/list'
        ];

        return view('template_admin', $data);
    }

    public function detail($idloker)
    {
        $loker = $this->lokerModel->find($idloker);
        
        if (!$loker) {
            return redirect()->to('/admin/pelamar')->with('error', 'Lowongan tidak ditemukan');
        }

        // Get all pelamar for this lowongan
        $pelamarList = $this->lamaranModel
            ->select('kirim_lamaran.*, 
                     user_umum.nama_user, user_umum.email, user_umum.nomor_hp, 
                     user_umum.tanggal_lahir, user_umum.tempat_lahir, user_umum.domisili,
                     user_umum.pendidikan_terakhir, user_umum.instansi_pendidikan_terakhir,
                     user_umum.scan_cv, user_umum.scan_ijazah, user_umum.scan_transkrip, 
                     user_umum.scan_ktp, user_umum.foto_profile')
            ->join('user_umum', 'user_umum.iduser_umum = kirim_lamaran.iduser_umum')
            ->where('kirim_lamaran.loker_idloker', $idloker)
            ->orderBy('kirim_lamaran.created_at', 'DESC')
            ->findAll();

        $data = [
            'pageTitle' => 'Daftar Pelamar - ' . $loker['judul_loker'],
            'loker' => $loker,
            'pelamarList' => $pelamarList,
            'body' => 'Admin/DaftarPelamar/detail'
        ];

        return view('template_admin', $data);
    }

    public function updateStatus()
    {
        $idlamaran = $this->request->getPost('idlamaran');
        $status = $this->request->getPost('status');

        if ($this->lamaranModel->update($idlamaran, ['status_lamaran' => $status])) {
            return $this->response->setJSON(['success' => true, 'message' => 'Status berhasil diupdate']);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Gagal update status']);
        }
    }

    public function cetak($idlamaran)
    {
        $lamaran = $this->lamaranModel->getLamaranWithDetails($idlamaran);

        if (!$lamaran) {
            return redirect()->to('/admin/pelamar')->with('error', 'Lamaran tidak ditemukan');
        }

        $data = [
            'lamaran' => $lamaran,
        ];

        $html = view('Admin/DaftarPelamar/cetak_dokumen_pelamar', $data);

        $mpdf = new Mpdf([
            'tempDir' => WRITEPATH . 'cache',
            'mode' => 'utf-8',
            'format' => 'A4',
            'margin_left' => 12,
            'margin_right' => 12,
            'margin_top' => 12,
            'margin_bottom' => 12,
        ]);

        $mpdf->WriteHTML($html);

        $filename = 'Dokumen_Pelamar_' . preg_replace('/[^A-Za-z0-9_\-]/', '_', $lamaran['nama_user']) . '.pdf';
        $pdfContent = $mpdf->Output('', Destination::STRING_RETURN);

        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
            ->setBody($pdfContent);
    }

    public function cetakDokumen($idlamaran)
    {
        return $this->cetak($idlamaran);
    }
}
