<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\WebProfile\ProdukModel;

class Produk extends BaseController
{
    protected $produkModel;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
    }

    public function index()
    {
        $data = [
            'pageTitle' => 'Kelola Produk',
            'produkList' => $this->produkModel->orderBy('idproduk', 'DESC')->findAll(),
            'body' => 'Admin/Pengaturan/tampilan_produk'
        ];

        return view('template_admin', $data);
    }

    public function create()
    {
        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'nama_produk' => 'required|max_length[255]',
            'tipe' => 'required|in_list[SKM,SKT]',
            'foto' => 'uploaded[foto]|max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Handle upload foto
        $foto = $this->request->getFile('foto');
        $fotoName = null;
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $fotoName = $foto->getRandomName();
            $foto->move('foto_produk', $fotoName);
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'slogan' => $this->request->getPost('slogan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tipe' => $this->request->getPost('tipe'),
            'karakter' => $this->request->getPost('karakter'),
            'aroma' => $this->request->getPost('aroma'),
            'foto' => $fotoName
        ];

        if ($this->produkModel->insert($data)) {
            return redirect()->to('/admin/produk')->with('success', 'Produk berhasil ditambahkan');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan produk');
        }
    }

    public function update($id)
    {
        $produk = $this->produkModel->find($id);
        
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan');
        }

        $validation = \Config\Services::validation();
        
        $validation->setRules([
            'nama_produk' => 'required|max_length[255]',
            'tipe' => 'required|in_list[SKM,SKT]',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'slogan' => $this->request->getPost('slogan'),
            'keterangan' => $this->request->getPost('keterangan'),
            'tipe' => $this->request->getPost('tipe'),
            'karakter' => $this->request->getPost('karakter'),
            'aroma' => $this->request->getPost('aroma')
        ];

        // Handle upload foto baru
        $foto = $this->request->getFile('foto');
        
        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus foto lama
            if ($produk['foto'] && file_exists('foto_produk/' . $produk['foto'])) {
                unlink('foto_produk/' . $produk['foto']);
            }
            
            $fotoName = $foto->getRandomName();
            $foto->move('foto_produk', $fotoName);
            $data['foto'] = $fotoName;
        }

        if ($this->produkModel->update($id, $data)) {
            return redirect()->to('/admin/produk')->with('success', 'Produk berhasil diupdate');
        } else {
            return redirect()->back()->withInput()->with('error', 'Gagal mengupdate produk');
        }
    }

    public function delete($id)
    {
        $produk = $this->produkModel->find($id);
        
        if (!$produk) {
            return redirect()->to('/admin/produk')->with('error', 'Produk tidak ditemukan');
        }

        // Hapus foto
        if ($produk['foto'] && file_exists('foto_produk/' . $produk['foto'])) {
            unlink('foto_produk/' . $produk['foto']);
        }

        if ($this->produkModel->delete($id)) {
            return redirect()->to('/admin/produk')->with('success', 'Produk berhasil dihapus');
        } else {
            return redirect()->to('/admin/produk')->with('error', 'Gagal menghapus produk');
        }
    }
}
