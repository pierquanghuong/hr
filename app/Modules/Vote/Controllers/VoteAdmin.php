<?php

namespace Modules\Vote\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Modules\NhanVien\Models\NhanVienBuilder;
use App\Modules\Vote\Models\VoteBuilder;

class VoteAdmin extends BaseController
{
    protected $nhanvienBuilder;
    protected $voteBuilder;
    protected $view_folder = "Modules\\Vote\\Views\\admin\\";
    
    public function __construct()
    {
        $this->nhanvienBuilder = new NhanVienBuilder();
        $this->voteBuilder = new VoteBuilder();
    }
    
    /**
     * index render trang danh sách đề cử
     *
     * @return void
     */
    public function index()
    {
        $votes = $this->voteBuilder->getVotes();

        return view($this->view_folder . '/index', ['votes' => $votes]);
    }
}
