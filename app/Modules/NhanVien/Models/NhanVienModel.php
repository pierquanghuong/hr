<?php

namespace Modules\NhanVien\Models;

use CodeIgniter\Model;

class NhanVienModel extends Model
{
    protected $table            = 'hr_nhanvien';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['id', 'hoten', 'phongban', 'mascan','nv_type', 'nv_point'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = ['hoten', 'phongban', 'mascan', 'nv_type', 'nv_point'];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
    
    /**
     * search function ho tro tim nhan vien
     *
     * @param  mixed $keyword
     * @return void
     */
    public function search($keyword)
    {
        return $this->like('hoten', $keyword) // Search by name
                    ->findAll();
    }
    
    /**
     * check_scan hamf kiem tra ma scan trung voi id
     *
     * @param  mixed $manv
     * @param  mixed $ma_scan
     * @return void
     */
    public function checkScan($manv, $mascan) 
    {
        $check = $this->where(['id' => $manv, 'mascan' => $mascan])->first();
        if (!$check) return false;
        return true;
    }
}