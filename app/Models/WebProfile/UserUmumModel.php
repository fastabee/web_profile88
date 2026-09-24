<?php

namespace App\Models\WebProfile;

use CodeIgniter\Model;

class UserUmumModel extends Model
{
    protected $table            = 'user_umum';
    protected $primaryKey       = 'iduser_umum';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'nama_user',
        'email',
        'password',
        'nomor_hp',
        'tanggal_lahir',
        'tempat_lahir',
        'domisili',
        'pendidikan_terakhir',
        'instansi_pendidikan_terakhir',
        'scan_cv',
        'scan_ijazah',
        'scan_transkrip',
        'scan_ktp',
        'foto_profile'
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
        'nama_user'                      => 'required|max_length[255]',
        'email'                          => 'required|valid_email|max_length[255]|is_unique[user_umum.email,iduser_umum,{iduser_umum}]',
        'password'                       => 'required|min_length[6]',
        'nomor_hp'                       => 'permit_empty|max_length[20]|numeric',
        'tanggal_lahir'                  => 'permit_empty|valid_date',
        'tempat_lahir'                   => 'permit_empty|max_length[255]',
        'domisili'                       => 'permit_empty|max_length[255]',
        'pendidikan_terakhir'            => 'permit_empty|max_length[255]',
        'instansi_pendidikan_terakhir'   => 'permit_empty|max_length[255]',
        'scan_cv'                        => 'permit_empty',
        'scan_ijazah'                    => 'permit_empty',
        'scan_transkrip'                 => 'permit_empty',
        'scan_ktp'                       => 'permit_empty',
        'foto_profile'                   => 'permit_empty'
    ];
    
    protected $validationMessages   = [
        'email' => [
            'is_unique' => 'Email sudah terdaftar, gunakan email lain.'
        ]
    ];
    
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
     * Verify user login (plain text password)
     */
    public function verifyLogin($email, $password)
    {
        $user = $this->where('email', $email)->first();
        
        if (!$user) {
            return false;
        }
        
        // Plain text password comparison
        if ($password === $user['password']) {
            return $user;
        }
        
        return false;
    }

    /**
     * Get user by email
     */
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    /**
     * Update user profile
     */
    public function updateProfile($id, $data)
    {
        // Remove password from update if empty
        if (isset($data['password']) && empty($data['password'])) {
            unset($data['password']);
        }
        
        return $this->update($id, $data);
    }

    /**
     * Check if email exists
     */
    public function emailExists($email, $excludeId = null)
    {
        $builder = $this->where('email', $email);
        
        if ($excludeId) {
            $builder->where('iduser_umum !=', $excludeId);
        }
        
        return $builder->countAllResults() > 0;
    }
}
