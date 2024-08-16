<?php

namespace Modules\QuaTang\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Modules\QuaTang\Models\QuaTangModel;
use Modules\NhanVien\Models\NhanVienModel;
use Psr\Log\LoggerInterface;

class QuaTang extends BaseController
{
    protected $folder_directory = "Modules\\QuaTang\\Views\\";

    protected $quaTangModel;

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Load the model
        $this->quaTangModel = new QuaTangModel();
    }

        
    /**
     * intro render trang intro - gioi thieu hr game
     *
     * @return void
     */
    public function intro()
    {
        return view($this->folder_directory . 'intro');
    }
    
    /**
     * index trang tạng quà
     *
     * @param  mixed $seg1 nguoitang
     * @param  mixed $seg2 nguoinhan
     * @return string
     */
    public function index($seg1  = false, $seg2  = false): string
    {
        $data = [
            'nguoitang' => $seg1,
            'mascan' => $seg2,
        ];
        
        $nhanvienModel = new NhanVienModel();
        $check_scan = $nhanvienModel->checkScan($seg1, $seg2);
       
        if (!$check_scan) {
            return view($this->folder_directory . 'scan-fail');
        }
            
        return view($this->folder_directory . 'index', $data);
    }
    
    /**
     * store luu qua tang
     *
     * @return void
     */
    public function store()
    {
        if (! $this->request->is('post')) {
            return view($this->folder_directory . 'index');
        }
        $rules = [
            'nguoitang' => 'required',
            'nguoinhan' => 'required',
            'ly_do' => 'required',
        ];
        $data = $this->request->getPost(array_keys($rules));

        //validate data
        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('game-error', 'Bạn chưa chọn người nhận!');
        }

        //kiểm tra người tặng quà cho chính mình
        if ($data['nguoitang'] == $data['nguoinhan']) {
            return redirect()->back()->withInput()->with('game-error', 'Bạn không thể tặng quà cho mình!');
        }
        $validData = $this->validator->getValidated();

        //Luu db quà tặng
        $this->quaTangModel->insert($validData);
        $nhanvienModel = new NhanVienModel();
        $nguoinhan = $nhanvienModel->where('id', $validData['nguoinhan'])->first();
        
        return view( $this->folder_directory . 'thankyou', ['nguoinhan' => $nguoinhan['hoten']]);
    }
    
}