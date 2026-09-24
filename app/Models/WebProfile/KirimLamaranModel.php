<?php

namespace App\Models\WebProfile;

use CodeIgniter\Model;

class KirimLamaranModel extends Model
{
    protected $table            = 'kirim_lamaran';
    protected $primaryKey       = 'idkirim_lamaran';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'iduser_umum',
        'loker_idloker',
        'status_lamaran',
        'created_at',
        'updated_at'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'iduser_umum'    => 'required|is_natural_no_zero',
        'loker_idloker'  => 'required|is_natural_no_zero',
        'status_lamaran' => 'permit_empty|in_list[pending,inreview,diterima,ditolak]'
    ];
    
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Check if user has already applied for a job
     */
    public function hasApplied($iduser_umum, $loker_idloker)
    {
        return $this->where('iduser_umum', $iduser_umum)
                    ->where('loker_idloker', $loker_idloker)
                    ->first() !== null;
    }

    /**
     * Get lamaran by user
     */
    public function getLamaranByUser($iduser_umum)
    {
        return $this->select('kirim_lamaran.*, lowongan_kerja.judul_loker, lowongan_kerja.divisi, lowongan_kerja.sistem_kerja, lowongan_kerja.icon')
                    ->join('lowongan_kerja', 'lowongan_kerja.idloker = kirim_lamaran.loker_idloker')
                    ->where('kirim_lamaran.iduser_umum', $iduser_umum)
                    ->orderBy('kirim_lamaran.created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get lamaran with user details
     */
    public function getLamaranWithDetails($id)
    {
        return $this->select('kirim_lamaran.*, 
                             lowongan_kerja.judul_loker, lowongan_kerja.divisi, lowongan_kerja.sistem_kerja, lowongan_kerja.Penempatan, lowongan_kerja.icon,
                             user_umum.nama_user, user_umum.email, user_umum.nomor_hp, user_umum.pendidikan_terakhir, user_umum.instansi_pendidikan_terakhir,
                             user_umum.scan_cv, user_umum.scan_ijazah, user_umum.scan_transkrip, user_umum.scan_ktp, user_umum.foto_profile')
                    ->join('lowongan_kerja', 'lowongan_kerja.idloker = kirim_lamaran.loker_idloker')
                    ->join('user_umum', 'user_umum.iduser_umum = kirim_lamaran.iduser_umum')
                    ->where('kirim_lamaran.idkirim_lamaran', $id)
                    ->first();
    }

    /**
     * Get all lamaran for admin
     */
    public function getAllLamaran()
    {
        return $this->select('kirim_lamaran.*, 
                             lowongan_kerja.judul_loker, lowongan_kerja.divisi,
                             user_umum.nama_user, user_umum.email, user_umum.nomor_hp')
                    ->join('lowongan_kerja', 'lowongan_kerja.idloker = kirim_lamaran.loker_idloker')
                    ->join('user_umum', 'user_umum.iduser_umum = kirim_lamaran.iduser_umum')
                    ->orderBy('kirim_lamaran.created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Count lamaran by status
     */
    public function countByStatus($status)
    {
        return $this->where('status_lamaran', $status)->countAllResults();
    }
}
