<?php

namespace App\Modules\QuaTang\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class Support extends Model
{
    protected $table_nhanvien  = 'hr_nhanvien';
    protected $table_quatang   = 'hr_quatang';
    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table_quatang);
    }

        
    /**
     * getPresent Lay danh sach qua tang theo thoi gian
     *
     * @param  mixed $time_start
     * @param  mixed $time_end
     * @return void
     */
    public function getPresent($time_start = null, $time_end = null)
    {
        $this->builder->select('
        hr_quatang.*, 
        nguoitang.hoten as tennguoitang,
        nguoitang.phongban as phongnguoitang,
        nguoinhan.hoten as tennguoinhan,
        nguoinhan.phongban as phongnguoinhan');

        $this->builder->join('hr_nhanvien as nguoitang', 'hr_quatang.nguoitang = nguoitang.id');
        $this->builder->join('hr_nhanvien as nguoinhan', 'hr_quatang.nguoinhan = nguoinhan.id');
        
        //check nếu gan thoi gian
        if ($time_start && $time_end) {  
            $this->builder->where($this->table_quatang . '.created_at >=', $time_start);
            $this->builder->where($this->table_quatang . '.created_at <=' , $time_end);
        }

        $this->builder->orderBy($this->table_quatang . '.id', 'DESC');
        $query = $this->builder->get();

        return $query->getResult();
    }

    /**
     * getOne Lấy qua tang theo id
     *
     * @param  mixed $id
     * @return void
     */
    public function getOne($id)
    {
        $this->builder->select(
                        'hr_quatang.*, 
                        nguoitang.hoten as tennguoitang,
                        nguoitang.phongban as phongnguoitang,
                        nguoinhan.hoten as tennguoinhan,
                        nguoinhan.phongban as phongnguoinhan');

        $this->builder->join('hr_nhanvien as nguoitang', 'hr_quatang.nguoitang = nguoitang.id');
        $this->builder->join('hr_nhanvien as nguoinhan', 'hr_quatang.nguoinhan = nguoinhan.id');
        $this->builder->where(['hr_quatang.id' => $id, 'hr_quatang.deleted_at' => null]);
        
        $query = $this->builder->get();
        return $query->getRow();
    }
    
    /**
     * countPresent đếm số quà tặng
     *
     * @return void
     */
    public function countPresent($time_start = null, $time_end= null)
    {
         //check nếu gan thoi gian
        if ($time_start && $time_end) {  
            $this->builder->where($this->table_quatang . '.created_at >=', $time_start);
            $this->builder->where($this->table_quatang . '.created_at <=' , $time_end);
        }
        return $this->builder->countAllResults();
    }

    public function countByPhongban($phongban, $time_start = null, $time_end= null)
    {
        $this->builder->join($this->table_nhanvien, 'nguoinhan = hr_nhanvien.id');
        $this->builder->where('hr_nhanvien.phongban', $phongban);

        //check nếu gan thoi gian
       //check nếu gan thoi gian
       if ($time_start && $time_end) {  
            $this->builder->where($this->table_quatang . '.created_at >=', $time_start);
            $this->builder->where($this->table_quatang . '.created_at <=' , $time_end);
        }

        $count = $this->builder->countAllResults();
        return $count;
    }
      
    /**
     * getTopNhanVien
     *
     * @param  mixed $top top number
     * @param  mixed $time_start thoi gian bat dau 
     * @param  mixed $time_end thoi gian ket thuc
     * @return array
     */
    public function getTopNhanVien(int $top = 5, string $time_start = null, string $time_end= null) : array
    {
        $this->builder->select('hr_nhanvien.hoten as nguoinhan, COUNT(*) AS count');
        $this->builder->join($this->table_nhanvien, 'nguoinhan = hr_nhanvien.id');

        //check nếu gan thoi gian
        if ($time_start && $time_end) {  
            $this->builder->where($this->table_quatang . '.created_at >=', $time_start);
            $this->builder->where($this->table_quatang . '.created_at <=' , $time_end);
        }
        $this->builder->groupBy('hr_quatang.nguoinhan');
        $this->builder->orderBy('count', 'DESC');
        $this->builder->limit($top);
        
        $query = $this->builder->get();
        return $query->getResult();
    }
}
