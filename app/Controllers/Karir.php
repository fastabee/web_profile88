<?php

namespace App\Controllers;

use App\Models\WebProfile\LowonganKerjaModel;

class Karir extends BaseController
{
    public function index()
    {
        $lokerModel = new LowonganKerjaModel();
        
        $data = [
            'lokerList' => $lokerModel->getActiveJobs()
        ];
        
        return view('karir', $data);
    }
}
