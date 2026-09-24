<?php

namespace App\Models\WebProfile;

use CodeIgniter\Model;

class LowonganKerjaModel extends Model
{
    protected $table            = 'lowongan_kerja';
    protected $primaryKey       = 'idloker';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'judul_loker',
        'keterangan_singkat',
        'keterangan_lengkap',
        'divisi',
        'sistem_kerja',
        'Penempatan',
        'icon',
        'foto_pamflet',
        'active_until',
        'deleted'
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
        'judul_loker'          => 'required|max_length[255]',
        'keterangan_singkat'   => 'permit_empty',
        'keterangan_lengkap'   => 'permit_empty',
        'divisi'               => 'permit_empty|max_length[255]',
        'sistem_kerja'         => 'permit_empty|in_list[Full-Time,Contract,Freelance,Part-Time]',
        'Penempatan'           => 'permit_empty|max_length[255]',
        'icon'                 => 'permit_empty|max_length[50]',
        'foto_pamflet'         => 'permit_empty',
        'active_until'         => 'permit_empty|valid_date',
        'deleted'              => 'permit_empty|in_list[0,1]'
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
     * Get active job postings (deleted = 0 and active_until >= today)
     */
    public function getActiveJobs()
    {
        return $this->where('deleted', 0)
                    ->where('active_until >=', date('Y-m-d'))
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Get job by ID if not deleted
     */
    public function getJobById($id)
    {
        return $this->where('idloker', $id)
                    ->where('deleted', 0)
                    ->first();
    }

    /**
     * Soft delete by setting deleted = 1
     */
    public function softDelete($id)
    {
        return $this->update($id, ['deleted' => 1]);
    }

    /**
     * Restore soft deleted job
     */
    public function restore($id)
    {
        return $this->update($id, ['deleted' => 0]);
    }
}
