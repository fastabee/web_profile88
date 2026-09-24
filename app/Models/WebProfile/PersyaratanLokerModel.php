<?php

namespace App\Models\WebProfile;

use CodeIgniter\Model;

class PersyaratanLokerModel extends Model
{
    protected $table            = 'persyaratan_loker';
    protected $primaryKey       = 'idpersyaratan_loker';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'idloker',
        'persyaratan'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'idloker'      => 'required|is_natural_no_zero',
        'persyaratan'  => 'required'
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
     * Get persyaratan by lowongan ID
     */
    public function getPersyaratanByLoker($idloker)
    {
        return $this->where('idloker', $idloker)
                    ->orderBy('idpersyaratan_loker', 'ASC')
                    ->findAll();
    }

    /**
     * Delete all persyaratan by lowongan ID
     */
    public function deleteByLoker($idloker)
    {
        return $this->where('idloker', $idloker)->delete();
    }

    /**
     * Insert multiple persyaratan
     */
    public function insertMultiple($data)
    {
        return $this->insertBatch($data);
    }

    /**
     * Update persyaratan for a lowongan (delete old, insert new)
     */
    public function updatePersyaratanLoker($idloker, $persyaratanArray)
    {
        // Delete existing persyaratan
        $this->deleteByLoker($idloker);
        
        // Insert new persyaratan
        if (!empty($persyaratanArray)) {
            $data = [];
            foreach ($persyaratanArray as $persyaratan) {
                if (!empty($persyaratan)) {
                    $data[] = [
                        'idloker' => $idloker,
                        'persyaratan' => $persyaratan
                    ];
                }
            }
            
            if (!empty($data)) {
                return $this->insertBatch($data);
            }
        }
        
        return true;
    }

    /**
     * Get lowongan with persyaratan
     */
    public function getLokerWithPersyaratan($idloker)
    {
        $lokerModel = new LowonganKerjaModel();
        $loker = $lokerModel->find($idloker);
        
        if ($loker) {
            $loker['persyaratan_list'] = $this->getPersyaratanByLoker($idloker);
        }
        
        return $loker;
    }
}
