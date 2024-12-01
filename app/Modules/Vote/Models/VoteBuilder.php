<?php

namespace App\Modules\Vote\Models;

use CodeIgniter\Model;

class VoteBuilder extends Model
{
    protected $table  = 'hr_vote';
    protected $db;
    protected $builder;

    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }
    
    /**
     * getVote lay danh sach de cu
     *
     * @param  mixed $time_start thoi gian bat dau
     * @param  mixed $time_end thoi gian ket thuc
     * @return void
     */
    public function getVotes($time_start = null, $time_end = null)
    {
        $this->builder->select('
            hr_vote.*, 
            nomineer.hoten as nomineer_name,
            nomineer.phongban as nomineer_room,
            nominee.hoten as nominee_name,
            nominee.phongban as nominee_room'
        );

        $this->builder->join('hr_nhanvien as nomineer', 'hr_vote.nomineer = nomineer.id');
        $this->builder->join('hr_nhanvien as nominee', 'hr_vote.nominee = nominee.id');
        
        //check nếu gan thoi gian
        if ($time_start && $time_end) {  
            $this->builder->where($this->table . '.created_at >=', $time_start);
            $this->builder->where($this->table . '.created_at <=' , $time_end);
        }

        $this->builder->orderBy($this->table . '.id', 'DESC');
        $query = $this->builder->get();

        return $query->getResult();
    }
    
    /**
     * getVotebyID 
     *
     * @param  mixed $id
     * @return void
     */
    public function getVotebyID(int $id)
    {
        $this->builder->select('
            hr_vote.*, 
            nomineer.hoten as nomineer_name,
            nomineer.phongban as nomineer_room,
            nominee.hoten as nominee_name,
            nominee.phongban as nominee_room'
        );

        $this->builder->join('hr_nhanvien as nomineer', 'hr_vote.nomineer = nomineer.id');
        $this->builder->join('hr_nhanvien as nominee', 'hr_vote.nominee = nominee.id');

        $this->builder->where(['hr_vote.id' => $id, 'hr_vote.deleted_at' => null]);

        $query = $this->builder->get();
        return $query->getRow();
    }
    
    /**
     * getVotesbyEmployer
     *
     * @param  mixed $nomineer
     * @return void
     */
    public function getVotesbyEmployer(int $nomineer)
    {
        $this->builder->select('
            hr_vote.*, 
            nomineer.hoten as nomineer_name,
            nomineer.phongban as nomineer_room,
            nominee.hoten as nominee_name,
            nominee.phongban as nominee_room'
        );

        $this->builder->join('hr_nhanvien as nomineer', 'hr_vote.nomineer = nomineer.id');
        $this->builder->join('hr_nhanvien as nominee', 'hr_vote.nominee = nominee.id');

        $this->builder->where(['hr_vote.nomineer' => $nomineer, 'hr_vote.deleted_at' => null]);

        $query = $this->builder->get();
        return $query->getResult();
    }
    
    /**
     * checkNomineerVoteAward kiem tra nhan vien da de cu giai chua
     *
     * @param  mixed $nvID
     * @param  mixed $award
     * @return int
     */
    public function checkNomineerVoteAward(int $nvID, int $award) : int
    {
        $this->builder->where(['hr_vote.nomineer' => $nvID, 'hr_vote.award' => $award]);
        return  $this->builder->countAllResults();
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
