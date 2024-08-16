<?php

namespace App\Modules\QuaTang\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\HTTP\RequestInterface;
use Psr\Log\LoggerInterface;
use Modules\QuaTang\Models\QuaTangModel;
use Modules\NhanVien\Models\NhanVienModel;
use App\Modules\QuaTang\Models\Support;

class ApiQuaTang extends BaseController
{
    protected $quatangModel;
    protected $nhanvienModel;
    protected $presentSupport;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Load the model
        $this->quatangModel = new QuaTangModel();
        $this->nhanvienModel = new NhanVienModel();
        $this->presentSupport = new Support();
    }

    public function getTop($seg1 = 5)
    {
        if ($this->request->isAJAX()) {
            $nhan_vien = $this->presentSupport->getTopNhanVien($seg1);
            return $this->response->setJSON($nhan_vien); // Return results as JSON
        }
        return $this->response->setStatusCode(404, 'Không tìm thấy dữ liệu');
    }
}
  