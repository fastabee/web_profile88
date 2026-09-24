<?php

namespace App\Models\HRIS;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $DBGroup = 'hris';
    protected $table = 'pegawai';
    protected $primaryKey = 'idpegawai';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'kode_pegawai',
        'nama_pegawai',
        'nik',
        'nkk',
        'provinsi',
        'id_provinsi',
        'kabupaten',
        'id_kabupaten',
        'kecamatan',
        'id_kecamatan',
        'desa',
        'id_desa',
        'dusun',
        'rt',
        'rw',
        'telepon',
        'tempat_lahir',
        'tanggal_lahir',
        'jenjang_pendidikan',
        'jurusan',
        'golongan_darah',
        'jenis_kelamin',
        'status_pernikahan',
        'nama_ayah',
        'nama_ibu',
        'nama_suami_istri',
        'tanggal_masuk',
        'jabatan',
        'tipe_pegawai',
        'departemen',
        'idsubdepartemen',
        'bpjs_kesehatan',
        'bpjs_ketenagakerjaan',
        'npwp',
        'tanggal_keluar',
        'email',
        'password',
        'waktu_kerja',
        'tipe_payroll',
        'unit_idunit',
        'status_pegawai',
        'deleted',
        'fotoktp',
        'fotopegawai',
        'fotokk',
        'tanggal_pkwt',
        'penempatan',
        'nama_pipil'
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
    protected $validationRules = [];
    protected $validationMessages = [];
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
}
