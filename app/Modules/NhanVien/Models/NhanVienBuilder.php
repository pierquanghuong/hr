<?php

namespace App\Modules\NhanVien\Models;

use CodeIgniter\Model;

class NhanVienBuilder extends Model
{
    protected $table_nhanvien  = 'hr_nhanvien';
    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table_nhanvien);
    }
    
    /**
     * deleteAllRow hàm drop table nhan vien - sử dung để import dữ liệu
     *
     * @return void
     */
    public function deleteAllRow()
    {
        return $this->builder->truncate();
    }
}
