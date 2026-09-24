<?php

namespace App\Controllers;

use App\Models\HRIS\PegawaiModel;

class Admin extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (session()->get('logged_in')) {
            return redirect()->to('/admin/dashboard');
        }
        
        return view('Admin/login');
    }

    public function login()
    {
        $session = session();
        $pegawaiModel = new PegawaiModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validasi input
        if (empty($email) || empty($password)) {
            $session->setFlashdata('error', 'Email dan password harus diisi');
            return redirect()->to('/admin')->withInput();
        }
        
        // Cari pegawai berdasarkan email
        $pegawai = $pegawaiModel->where('email', $email)
                                ->where('deleted', 0)
                                ->first();
        
        if (!$pegawai) {
            $session->setFlashdata('error', 'Email atau password salah');
            return redirect()->to('/admin')->withInput();
        }
        
        // Verifikasi password (plain text comparison)
        if ($password !== $pegawai['password']) {
            $session->setFlashdata('error', 'Email atau password salah');
            return redirect()->to('/admin')->withInput();
        }
        
        // Set session
        $sessionData = [
            'idpegawai' => $pegawai['idpegawai'],
            'kode_pegawai' => $pegawai['kode_pegawai'],
            'nama_pegawai' => $pegawai['nama_pegawai'],
            'email' => $pegawai['email'],
            'jabatan' => $pegawai['jabatan'],
            'logged_in' => true
        ];
        
        $session->set($sessionData);
        
        // Check if there's a redirect URL
        $redirectUrl = $session->get('redirect_url');
        if ($redirectUrl) {
            $session->remove('redirect_url');
            return redirect()->to($redirectUrl);
        }
        
        return redirect()->to('/admin/dashboard');
    }

    public function dashboard()
    {
        // Load models
        $lokerModel = new \App\Models\WebProfile\LowonganKerjaModel();
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        $produkModel = new \App\Models\WebProfile\ProdukModel();
        
        // Get statistics
        $totalLoker = $lokerModel->where('deleted', 0)->countAllResults();
        
        // Count active jobs (active_until >= today)
        $totalLokerAktif = $lokerModel
            ->where('deleted', 0)
            ->where('active_until >=', date('Y-m-d'))
            ->countAllResults();
        
        $totalPelamar = $lamaranModel->countAllResults();
        $totalProduk = $produkModel->countAllResults(); // No deleted column
        
        // Get pending applications count
        $pelamarPending = $lamaranModel->where('status_lamaran', 'pending')->countAllResults();
        $pelamarDiterima = $lamaranModel->where('status_lamaran', 'diterima')->countAllResults();
        
        // Get recent applications (last 5)
        $recentApplications = $lamaranModel
            ->select('kirim_lamaran.*, user_umum.nama_user, lowongan_kerja.judul_loker')
            ->join('user_umum', 'user_umum.iduser_umum = kirim_lamaran.iduser_umum')
            ->join('lowongan_kerja', 'lowongan_kerja.idloker = kirim_lamaran.loker_idloker')
            ->orderBy('kirim_lamaran.created_at', 'DESC')
            ->limit(5)
            ->findAll();
        
        $data = [
            'pageTitle' => 'Dashboard',
            'body' => 'Admin/Dashboard/index',
            'totalLoker' => $totalLoker,
            'totalLokerAktif' => $totalLokerAktif,
            'totalPelamar' => $totalPelamar,
            'totalProduk' => $totalProduk,
            'pelamarPending' => $pelamarPending,
            'pelamarDiterima' => $pelamarDiterima,
            'recentApplications' => $recentApplications
        ];
        
        return view('template_admin', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin');
    }
}
