<?php

namespace App\Controllers;

use App\Models\WebProfile\UserUmumModel;

class User extends BaseController
{
    public function index()
    {
        // Cek apakah sudah login
        if (session()->get('user_logged_in')) {
            return redirect()->to('/user/dashboard');
        }
        
        return view('User/login');
    }

    public function login()
    {
        $session = session();
        $userModel = new UserUmumModel();
        
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Validasi input
        if (empty($email) || empty($password)) {
            $session->setFlashdata('error', 'Email dan password harus diisi');
            return redirect()->to('/user')->withInput();
        }
        
        // Verifikasi login
        $user = $userModel->verifyLogin($email, $password);
        
        if (!$user) {
            $session->setFlashdata('error', 'Email atau password salah');
            return redirect()->to('/user')->withInput();
        }
        
        // Set session
        $sessionData = [
            'iduser_umum' => $user['iduser_umum'],
            'nama_user' => $user['nama_user'],
            'email' => $user['email'],
            'user_logged_in' => true
        ];
        
        $session->set($sessionData);
        
        return redirect()->to('/user/dashboard');
    }

    public function register()
    {
        $session = session();
        $userModel = new UserUmumModel();
        
        $validation = \Config\Services::validation();
        
        // Validation rules
        $rules = [
            'nama_user' => 'required|min_length[3]|max_length[255]',
            'email' => 'required|valid_email|max_length[255]|is_unique[user_umum.email]',
            'password' => 'required|min_length[6]',
            'password_confirm' => 'required|matches[password]'
        ];
        
        $messages = [
            'email' => [
                'is_unique' => 'Email sudah terdaftar, gunakan email lain'
            ],
            'password_confirm' => [
                'matches' => 'Konfirmasi password tidak cocok'
            ]
        ];
        
        $validation->setRules($rules, $messages);
        
        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            $session->setFlashdata('error', implode('<br>', $errors));
            return redirect()->to('/user')->withInput();
        }
        
        // Prepare data
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password') // Plain text
        ];
        
        // Skip model validation because we already validated
        $userModel->skipValidation(true);
        
        if ($userModel->insert($data)) {
            $session->setFlashdata('success', 'Registrasi berhasil! Silakan login dengan akun Anda.');
            return redirect()->to('/user');
        } else {
            $session->setFlashdata('error', 'Registrasi gagal. Silakan coba lagi.');
            return redirect()->to('/user')->withInput();
        }
    }

    public function dashboard()
    {
        $lokerModel = new \App\Models\WebProfile\LowonganKerjaModel();
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        $userModel = new UserUmumModel();
        
        $iduser = session()->get('iduser_umum');
        
        // Get statistics
        $totalLoker = $lokerModel->where('deleted', 0)->countAllResults();
        $lamaranList = $lamaranModel->getLamaranByUser($iduser);
        $totalLamaran = count($lamaranList);
        $lamaranPending = count(array_filter($lamaranList, function($l) { 
            return $l['status_lamaran'] == 'pending' || $l['status_lamaran'] == 'inreview'; 
        }));
        
        // Get user data
        $userData = $userModel->find($iduser);
        
        $data = [
            'pageTitle' => 'Dashboard',
            'totalLoker' => $totalLoker,
            'totalLamaran' => $totalLamaran,
            'lamaranPending' => $lamaranPending,
            'userData' => $userData,
            'body' => 'User/Dashboard/index'
        ];
        
        return view('template_user', $data);
    }

    public function profile()
    {
        $userModel = new UserUmumModel();
        $user = $userModel->find(session()->get('iduser_umum'));
        
        $data = [
            'pageTitle' => 'Edit Profil',
            'user' => $user,
            'body' => 'User/Profile/edit_profile'
        ];
        
        return view('template_user', $data);
    }

    public function updateProfile()
    {
        log_message('info', '=== START UPDATE PROFILE ===');
        
        $userModel = new UserUmumModel();
        $userId = session()->get('iduser_umum');
        
        log_message('info', 'User ID from session: ' . $userId);
        
        $user = $userModel->find($userId);
        
        if (!$user) {
            log_message('error', 'User not found with ID: ' . $userId);
            return redirect()->to('/user/profile')->with('error', 'User tidak ditemukan');
        }
        
        log_message('info', 'User found: ' . json_encode($user));

        $validation = \Config\Services::validation();
        
        // Validasi tanpa password jika tidak diisi
        $rules = [
            'nama_user' => 'required|max_length[255]',
            'email' => 'required|valid_email|max_length[255]',
            'pendidikan_terakhir' => 'permit_empty|max_length[255]',
            'instansi_pendidikan_terakhir' => 'permit_empty|max_length[255]',
            'foto_profile' => 'max_size[foto_profile,2048]|is_image[foto_profile]|mime_in[foto_profile,image/jpg,image/jpeg,image/png]',
            'scan_cv' => 'max_size[scan_cv,2048]|ext_in[scan_cv,pdf,doc,docx]',
            'scan_ijazah' => 'max_size[scan_ijazah,2048]|is_image[scan_ijazah]|mime_in[scan_ijazah,image/jpg,image/jpeg,image/png,application/pdf]',
            'scan_transkrip' => 'max_size[scan_transkrip,2048]|is_image[scan_transkrip]|mime_in[scan_transkrip,image/jpg,image/jpeg,image/png,application/pdf]',
            'scan_ktp' => 'max_size[scan_ktp,2048]|is_image[scan_ktp]|mime_in[scan_ktp,image/jpg,image/jpeg,image/png]'
        ];
        
        // Check if email changed, then add unique validation
        $newEmail = $this->request->getPost('email');
        if ($newEmail !== $user['email']) {
            log_message('info', 'Email changed from ' . $user['email'] . ' to ' . $newEmail . ', adding unique validation');
            $rules['email'] .= '|is_unique[user_umum.email]';
        } else {
            log_message('info', 'Email not changed, skipping unique validation');
        }

        $validation->setRules($rules);

        if (!$validation->withRequest($this->request)->run()) {
            $errors = $validation->getErrors();
            log_message('error', 'Validation failed: ' . json_encode($errors));
            return redirect()->back()->withInput()->with('error', implode('<br>', $errors));
        }
        
        log_message('info', 'Validation passed');

        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'email' => $this->request->getPost('email'),
            'nomor_hp' => $this->request->getPost('nomor_hp'),
            'pendidikan_terakhir' => $this->request->getPost('pendidikan_terakhir'),
            'instansi_pendidikan_terakhir' => $this->request->getPost('instansi_pendidikan_terakhir')
        ];
        
        log_message('info', 'Basic data to update: ' . json_encode($data));

        // Handle password jika diisi
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            log_message('info', 'Password will be updated');
            $data['password'] = $password; // Plain text
        }

        // Handle upload foto profile
        $fotoProfile = $this->request->getFile('foto_profile');
        log_message('info', 'Foto profile file check: ' . ($fotoProfile ? 'exists' : 'not exists'));
        
        if ($fotoProfile && $fotoProfile->isValid() && !$fotoProfile->hasMoved()) {
            log_message('info', 'Processing foto profile upload');
            
            try {
                // Create directory if not exists
                $uploadPath = FCPATH . 'uploads/profile';
                if (!is_dir($uploadPath)) {
                    log_message('info', 'Creating directory: ' . $uploadPath);
                    mkdir($uploadPath, 0755, true);
                }
                
                // Hapus foto lama
                if ($user['foto_profile'] && file_exists($uploadPath . '/' . $user['foto_profile'])) {
                    log_message('info', 'Deleting old foto profile: ' . $user['foto_profile']);
                    unlink($uploadPath . '/' . $user['foto_profile']);
                }
                
                $fotoName = $fotoProfile->getRandomName();
                log_message('info', 'Moving foto profile to: ' . $uploadPath . ' with name: ' . $fotoName);
                $fotoProfile->move($uploadPath, $fotoName);
                $data['foto_profile'] = $fotoName;
                log_message('info', 'Foto profile uploaded successfully');
            } catch (\Exception $e) {
                log_message('error', 'Error uploading foto profile: ' . $e->getMessage());
            }
        }

        // Handle upload scan_cv
        $scanCv = $this->request->getFile('scan_cv');
        if ($scanCv && $scanCv->isValid() && !$scanCv->hasMoved()) {
            log_message('info', 'Processing scan_cv upload');
            
            try {
                // Create directory if not exists
                $uploadPath = FCPATH . 'uploads/documents';
                if (!is_dir($uploadPath)) {
                    log_message('info', 'Creating directory: ' . $uploadPath);
                    mkdir($uploadPath, 0755, true);
                }
                
                if ($user['scan_cv'] && file_exists($uploadPath . '/' . $user['scan_cv'])) {
                    log_message('info', 'Deleting old scan_cv');
                    unlink($uploadPath . '/' . $user['scan_cv']);
                }
                
                $cvName = $scanCv->getRandomName();
                $scanCv->move($uploadPath, $cvName);
                $data['scan_cv'] = $cvName;
                log_message('info', 'scan_cv uploaded successfully: ' . $cvName);
            } catch (\Exception $e) {
                log_message('error', 'Error uploading scan_cv: ' . $e->getMessage());
            }
        }

        // Handle upload scan_ijazah
        $scanIjazah = $this->request->getFile('scan_ijazah');
        if ($scanIjazah && $scanIjazah->isValid() && !$scanIjazah->hasMoved()) {
            log_message('info', 'Processing scan_ijazah upload');
            
            try {
                // Create directory if not exists
                $uploadPath = FCPATH . 'uploads/documents';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                if ($user['scan_ijazah'] && file_exists($uploadPath . '/' . $user['scan_ijazah'])) {
                    unlink($uploadPath . '/' . $user['scan_ijazah']);
                }
                
                $ijazahName = $scanIjazah->getRandomName();
                $scanIjazah->move($uploadPath, $ijazahName);
                $data['scan_ijazah'] = $ijazahName;
                log_message('info', 'scan_ijazah uploaded successfully: ' . $ijazahName);
            } catch (\Exception $e) {
                log_message('error', 'Error uploading scan_ijazah: ' . $e->getMessage());
            }
        }

        // Handle upload scan_transkrip
        $scanTranskrip = $this->request->getFile('scan_transkrip');
        if ($scanTranskrip && $scanTranskrip->isValid() && !$scanTranskrip->hasMoved()) {
            log_message('info', 'Processing scan_transkrip upload');
            
            try {
                // Create directory if not exists
                $uploadPath = FCPATH . 'uploads/documents';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                if ($user['scan_transkrip'] && file_exists($uploadPath . '/' . $user['scan_transkrip'])) {
                    unlink($uploadPath . '/' . $user['scan_transkrip']);
                }
                
                $transkripName = $scanTranskrip->getRandomName();
                $scanTranskrip->move($uploadPath, $transkripName);
                $data['scan_transkrip'] = $transkripName;
                log_message('info', 'scan_transkrip uploaded successfully: ' . $transkripName);
            } catch (\Exception $e) {
                log_message('error', 'Error uploading scan_transkrip: ' . $e->getMessage());
            }
        }

        // Handle upload scan_ktp
        $scanKtp = $this->request->getFile('scan_ktp');
        if ($scanKtp && $scanKtp->isValid() && !$scanKtp->hasMoved()) {
            log_message('info', 'Processing scan_ktp upload');
            
            try {
                // Create directory if not exists
                $uploadPath = FCPATH . 'uploads/documents';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }
                
                if ($user['scan_ktp'] && file_exists($uploadPath . '/' . $user['scan_ktp'])) {
                    unlink($uploadPath . '/' . $user['scan_ktp']);
                }
                
                $ktpName = $scanKtp->getRandomName();
                $scanKtp->move($uploadPath, $ktpName);
                $data['scan_ktp'] = $ktpName;
                log_message('info', 'scan_ktp uploaded successfully: ' . $ktpName);
            } catch (\Exception $e) {
                log_message('error', 'Error uploading scan_ktp: ' . $e->getMessage());
            }
        }

        log_message('info', 'Final data to update: ' . json_encode($data));
        
        try {
            // Skip model validation because we already validated in controller
            $userModel->skipValidation(true);
            $result = $userModel->update($userId, $data);
            log_message('info', 'Update result: ' . ($result ? 'success' : 'failed'));
            
            if ($result) {
                // Update session nama_user jika berubah
                session()->set('nama_user', $data['nama_user']);
                log_message('info', 'Profile updated successfully');
                
                return redirect()->to('/user/profile')->with('success', 'Profil berhasil diupdate');
            } else {
                $modelErrors = $userModel->errors();
                log_message('error', 'Model update failed. Errors: ' . json_encode($modelErrors));
                return redirect()->back()->withInput()->with('error', 'Gagal mengupdate profil: ' . json_encode($modelErrors));
            }
        } catch (\Exception $e) {
            log_message('error', 'Exception during update: ' . $e->getMessage());
            log_message('error', 'Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
        
        log_message('info', '=== END UPDATE PROFILE ===');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user');
    }

    public function lowongan()
    {
        $lokerModel = new \App\Models\WebProfile\LowonganKerjaModel();
        
        $data = [
            'pageTitle' => 'Daftar Lowongan',
            'lokerList' => $lokerModel->getActiveJobs(),
            'body' => 'User/DaftarLowongan/list'
        ];
        
        return view('template_user', $data);
    }

    public function detailLowongan($id)
    {
        $lokerModel = new \App\Models\WebProfile\LowonganKerjaModel();
        $persyaratanModel = new \App\Models\WebProfile\PersyaratanLokerModel();
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        
        $loker = $lokerModel->getJobById($id);
        
        if (!$loker) {
            return redirect()->to('/user/lowongan')->with('error', 'Lowongan tidak ditemukan');
        }
        
        // Get persyaratan
        $persyaratanList = $persyaratanModel->getPersyaratanByLoker($id);
        
        // Check if user has already applied
        $hasApplied = $lamaranModel->hasApplied(session()->get('iduser_umum'), $id);
        
        $data = [
            'pageTitle' => 'Detail Lowongan',
            'loker' => $loker,
            'persyaratanList' => $persyaratanList,
            'hasApplied' => $hasApplied,
            'body' => 'User/DaftarLowongan/detail'
        ];
        
        return view('template_user', $data);
    }

    public function submitLamaran($idloker)
    {
        $userModel = new UserUmumModel();
        $lokerModel = new \App\Models\WebProfile\LowonganKerjaModel();
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        
        $iduser = session()->get('iduser_umum');
        
        // Check if loker exists
        $loker = $lokerModel->getJobById($idloker);
        if (!$loker) {
            return redirect()->to('/user/lowongan')->with('error', 'Lowongan tidak ditemukan');
        }
        
        // Check if user has already applied
        if ($lamaranModel->hasApplied($iduser, $idloker)) {
            return redirect()->to('/user/lowongan/' . $idloker)->with('error', 'Anda sudah melamar lowongan ini sebelumnya');
        }
        
        // Check if user has phone number
        $user = $userModel->find($iduser);
        if (empty($user['nomor_hp'])) {
            return redirect()->to('/user/lowongan/' . $idloker)->with('error', 'Anda harus melengkapi Nomor HP terlebih dahulu di Profil Anda');
        }
        
        // Create lamaran
        $data = [
            'iduser_umum' => $iduser,
            'loker_idloker' => $idloker,
            'status_lamaran' => 'pending'
        ];
        
        if ($lamaranModel->insert($data)) {
            return redirect()->to('/user/lowongan/' . $idloker)->with('success', 'Lamaran berhasil dikirim! Kami akan menghubungi Anda segera.');
        } else {
            return redirect()->to('/user/lowongan/' . $idloker)->with('error', 'Gagal mengirim lamaran. Silakan coba lagi.');
        }
    }

    public function lamaran()
    {
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        
        $data = [
            'pageTitle' => 'Lamaran Saya',
            'lamaranList' => $lamaranModel->getLamaranByUser(session()->get('iduser_umum')),
            'body' => 'User/DaftarLowongan/lamaran_saya'
        ];
        
        return view('template_user', $data);
    }

    public function detailLamaran($id)
    {
        $lamaranModel = new \App\Models\WebProfile\KirimLamaranModel();
        
        $lamaran = $lamaranModel->getLamaranWithDetails($id);
        
        if (!$lamaran || $lamaran['iduser_umum'] != session()->get('iduser_umum')) {
            return redirect()->to('/user/lamaran')->with('error', 'Lamaran tidak ditemukan');
        }
        
        $data = [
            'pageTitle' => 'Detail Lamaran',
            'lamaran' => $lamaran,
            'body' => 'User/DaftarLowongan/lamaran_saya_detail'
        ];
        
        return view('template_user', $data);
    }
}
