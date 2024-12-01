<?php

namespace Modules\NhanVien\Controllers;

use App\Controllers\BaseController;
use Modules\NhanVien\Models\NhanVienModel;

class NhanVien extends BaseController
{
    protected $folder_directory = "Modules\\NhanVien\\Views\\";
    protected $nhanVienModel;
    
    /**
     * __construct
     *
     * @param  mixed $nhanvien
     * @return void
     */
    public function __construct()
    {   
        $this->nhanVienModel = new NhanVienModel();
    }
    
    /**
     * index render trang tang qua
     *
     * @return void
     */
    public function index()
    {
        return view($this->folder_directory . 'index');
    }

     /**
      * search_ajax Ham lay du lieu ajax 
      *
      * @return void
      */
     public function search_ajax()
     {
        if ($this->request->isAJAX()) {
            $keyword = $this->request->getVar('q');
            $type = $this->request->getVar('t');
            // Fetch the search results
            $nhan_vien = $this->nhanVienModel->search($keyword, $type);
            return $this->response->setJSON($nhan_vien); // Return results as JSON
        }
        return $this->response->setStatusCode(404, 'Không tìm thấy dữ liệu');
     }
}