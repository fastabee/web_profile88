<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebProfile\LowonganKerjaModel;
use App\Models\WebProfile\PersyaratanLokerModel;

class Loker extends BaseController
{
    protected $lokerModel;
    protected $persyaratanModel;

    public function __construct()
    {
        $this->lokerModel = new LowonganKerjaModel();
        $this->persyaratanModel = new PersyaratanLokerModel();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kelola Lowongan Kerja',
            'lokerList' => $this->lokerModel->orderBy('idloker', 'DESC')->findAll(),
            'body' => 'Admin/Loker/daftar_loker'
        ];

        return view('template_admin', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'judul_loker' => 'required|max_length[255]',
            'divisi' => 'permit_empty|max_length[255]',
            'sistem_kerja' => 'permit_empty|in_list[Full-Time,Contract,Freelance,Part-Time]',
            'Penempatan' => 'permit_empty|max_length[255]',
            'active_until' => 'permit_empty|valid_date',
            'icon' => 'permit_empty|max_length[50]',
            'foto_pamflet' => 'max_size[foto_pamflet,2048]|is_image[foto_pamflet]|mime_in[foto_pamflet,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $validation->getErrors()));
        }

        // Handle upload foto_pamflet
        $fotoPamflet = $this->request->getFile('foto_pamflet');
        $fotoPamfletName = null;
        
        if ($fotoPamflet && $fotoPamflet->isValid() && !$fotoPamflet->hasMoved()) {
            $fotoPamfletName = $fotoPamflet->getRandomName();
            $fotoPamflet->move('foto_loker', $fotoPamfletName);
        }

        $data = [
            'judul_loker' => $this->request->getPost('judul_loker'),
            'keterangan_singkat' => $this->request->getPost('keterangan_singkat'),
            'keterangan_lengkap' => $this->request->getPost('keterangan_lengkap'),
            'divisi' => $this->request->getPost('divisi'),
            'sistem_kerja' => $this->request->getPost('sistem_kerja'),
            'Penempatan' => $this->request->getPost('Penempatan'),
            'active_until' => $this->request->getPost('active_until'),
            'icon' => $this->request->getPost('icon'),
            'foto_pamflet' => $fotoPamfletName,
            'deleted' => 0
        ];

        if ($idloker = $this->lokerModel->insert($data)) {
            // Save persyaratan
            $persyaratanArray = $this->request->getPost('persyaratan');
            if (!empty($persyaratanArray)) {
                $this->persyaratanModel->updatePersyaratanLoker($idloker, $persyaratanArray);
            }
            
            return redirect()->to('/admin/loker')->with('success', 'Lowongan kerja berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan lowongan kerja');
        }
    }

    public function update($id)
    {
        $loker = $this->lokerModel->find($id);
        
        if (!$loker) {
            return redirect()->to('/admin/loker')->with('error', 'Lowongan tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'judul_loker' => 'required|max_length[255]',
            'divisi' => 'permit_empty|max_length[255]',
            'sistem_kerja' => 'permit_empty|in_list[Full-Time,Contract,Freelance,Part-Time]',
            'Penempatan' => 'permit_empty|max_length[255]',
            'active_until' => 'permit_empty|valid_date',
            'icon' => 'permit_empty|max_length[50]',
            'foto_pamflet' => 'max_size[foto_pamflet,2048]|is_image[foto_pamflet]|mime_in[foto_pamflet,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('error', implode('<br>', $validation->getErrors()));
        }

        $data = [
            'judul_loker' => $this->request->getPost('judul_loker'),
            'keterangan_singkat' => $this->request->getPost('keterangan_singkat'),
            'keterangan_lengkap' => $this->request->getPost('keterangan_lengkap'),
            'divisi' => $this->request->getPost('divisi'),
            'sistem_kerja' => $this->request->getPost('sistem_kerja'),
            'Penempatan' => $this->request->getPost('Penempatan'),
            'active_until' => $this->request->getPost('active_until'),
            'icon' => $this->request->getPost('icon')
        ];

        // Handle upload foto_pamflet baru
        $fotoPamflet = $this->request->getFile('foto_pamflet');
        
        if ($fotoPamflet && $fotoPamflet->isValid() && !$fotoPamflet->hasMoved()) {
            // Hapus foto lama
            if ($loker['foto_pamflet'] && file_exists('foto_loker/' . $loker['foto_pamflet'])) {
                unlink('foto_loker/' . $loker['foto_pamflet']);
            }
            
            $fotoPamfletName = $fotoPamflet->getRandomName();
            $fotoPamflet->move('foto_loker', $fotoPamfletName);
            $data['foto_pamflet'] = $fotoPamfletName;
        }

        if ($this->lokerModel->update($id, $data)) {
            // Update persyaratan
            $persyaratanArray = $this->request->getPost('persyaratan');
            $this->persyaratanModel->updatePersyaratanLoker($id, $persyaratanArray);
            
            return redirect()->to('/admin/loker')->with('success', 'Lowongan kerja berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate lowongan kerja');
        }
    }

    public function delete($id)
    {
        $loker = $this->lokerModel->find($id);
        
        if (!$loker) {
            return redirect()->to('/admin/loker')->with('error', 'Lowongan tidak ditemukan');
        }

        // Soft delete
        if ($this->lokerModel->softDelete($id)) {
            return redirect()->to('/admin/loker')->with('success', 'Lowongan kerja berhasil dihapus');
        } else {
            return redirect()->to('/admin/loker')->with('error', 'Gagal menghapus lowongan kerja');
        }
    }

    public function restore($id)
    {
        $loker = $this->lokerModel->find($id);
        
        if (!$loker) {
            return redirect()->to('/admin/loker')->with('error', 'Lowongan tidak ditemukan');
        }

        if ($this->lokerModel->restore($id)) {
            return redirect()->to('/admin/loker')->with('success', 'Lowongan kerja berhasil dipulihkan');
        } else {
            return redirect()->to('/admin/loker')->with('error', 'Gagal memulihkan lowongan kerja');
        }
    }

    public function getPersyaratan($id)
    {
        $persyaratan = $this->persyaratanModel->getPersyaratanByLoker($id);
        return $this->response->setJSON($persyaratan);
    }
}
