<?php

namespace Modules\Home\Controllers;

use App\Controllers\BaseController;
use Modules\NhanVien\Models\NhanVienModel;


class Home extends BaseController
{
    protected $folder_directory = "Modules\\Home\\Views\\";

    protected $nhanvienModel;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->nhanvienModel = new NhanVienModel();
    }
    
    /**
     * index render trang sau khi quét mã QR 
     * người dùng phải scan mã qr để truy cập vào trang
     * @param  mixed $seg1 
     * @param  mixed $seg2
     * @return string
     */
    public function index($seg1  = false, $seg2  = false)
    {   
        //reset session khi vào homepage
        $session = session();
        $session->remove('AuthNhanvien');
        
        //check nguoi dung scan tu qr
        $ID = $seg1;
        $ma_nhanvien = $seg2;
        
        $check_scan = $this->nhanvienModel->checkScan($ID, $ma_nhanvien);
        if (! $check_scan) {
            return view($this->folder_directory . 'scan-fail', ['msg' => 'Vui lòng scan Mã Qr của bạn']);
        }
        //lấy thông tin nhân viên
        $nhanvien = $this->nhanvienModel->where('id', $ID)->first();
        //luu sesion thông tin nhân vien đã scan
       
        $session->set('AuthNhanvien', $nhanvien);

        return view($this->folder_directory . 'index');
    }
}