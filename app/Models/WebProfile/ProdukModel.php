<?php

namespace App\Models\WebProfile;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'produk';
    protected $primaryKey = 'idproduk';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_produk',
        'slogan',
        'keterangan',
        'tipe',
        'karakter',
        'aroma',
        'foto'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [
        'nama_produk' => 'required|max_length[255]',
        'tipe' => 'in_list[SKM,SKT]'
    ];
    
    protected $validationMessages = [
        'nama_produk' => [
            'required' => 'Nama produk harus diisi',
            'max_length' => 'Nama produk maksimal 255 karakter'
        ],
        'tipe' => [
            'in_list' => 'Tipe harus SKM atau SKT'
        ]
    ];
    
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    /**
     * Get produk by tipe
     *
     * @param string $tipe 'SKM' or 'SKT'
     * @return array
     */
    public function getProdukByTipe($tipe)
    {
        return $this->where('tipe', $tipe)->findAll();
    }

    /**
     * Get all produk SKM
     *
     * @return array
     */
    public function getProdukSKM()
    {
        return $this->where('tipe', 'SKM')->findAll();
    }

    /**
     * Get all produk SKT
     *
     * @return array
     */
    public function getProdukSKT()
    {
        return $this->where('tipe', 'SKT')->findAll();
    }

    /**
     * Search produk by name
     *
     * @param string $keyword
     * @return array
     */
    public function searchProduk($keyword)
    {
        return $this->like('nama_produk', $keyword)
                    ->orLike('slogan', $keyword)
                    ->orLike('keterangan', $keyword)
                    ->findAll();
    }
}
