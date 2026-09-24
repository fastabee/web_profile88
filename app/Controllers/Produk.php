<?php

namespace App\Controllers;

use App\Models\WebProfile\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $produkModel = new ProdukModel();
        
        $data['products'] = $produkModel->orderBy('idproduk', 'ASC')->findAll();
        
        return view('produk', $data);
    }
}
