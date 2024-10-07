<?php

namespace Modules\QuaTang\Controllers;

use App\Controllers\BaseController;
use App\Modules\QuaTang\Models\Support;
use Modules\QuaTang\Models\QuaTangModel;
use Modules\NhanVien\Models\NhanVienModel;

class QuaTang extends BaseController
{
    protected $folder_directory = "Modules\\QuaTang\\Views\\";

    protected $quaTangModel;

    protected $quatangSupport;

    protected $nhanvienModel;

    public function __construct()
    {
        $this->quaTangModel = new QuaTangModel();
        $this->quatangSupport = new Support();
        $this->nhanvienModel = new NhanVienModel();
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
            'nv_type' => '',
        ];
        
        //check nguoi dung scan tu qr
        $check_scan = $this->nhanvienModel->checkScan($seg1, $seg2);
        if (! $check_scan) {
            return view($this->folder_directory . 'scan-fail', ['msg' => 'Vui lòng scan Mã Qr của bạn']);
        }

        //check game setting
        $check_game_setting = $this->quatangSupport->check_game_settings();
        if (!$check_game_setting['code']) {
            return view($this->folder_directory . 'scan-fail', ['msg' => $check_game_setting['msg']]);
        }

        $nguoitang = $this->nhanvienModel->where('id', $data['nguoitang'])->first();
        $check_limit = $this->quatangSupport->check_give_limit($nguoitang['id'], $nguoitang['nv_type']);
        if (! $check_limit) {
            return view($this->folder_directory . 'scan-fail', ['msg' => 'Bạn đã sử dụng hết quà tặng!']);
        }

        $data['nvtype'] = $nguoitang['nv_type'];

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

        //validate data
        $rules = [
            'nguoitang' => 'required',
            'nguoinhan' => 'required',
            'ly_do' => 'required',
        ];
        $data = $this->request->getPost(array_keys($rules));
        $point = 1;

        // kiểm tra điểm
        if ($this->request->getPost('point') !== null) {
            $point = $this->request->getPost('point');
        }

        // validate dữ liệu
        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('msg', 'Bạn chưa chọn người nhận!');
        }

        $validData = $this->validator->getValidated();
        $validData['give_point'] = $point;
       
        //check tang qua chinh minh
        $check_give_self = $this->quatangSupport->check_give_self($validData['nguoitang'], $validData['nguoinhan']);
        if (! $check_give_self) {
            return redirect()->back()->withInput()->with('msg', 'Không thể tự tặng quà cho bạn!');
        }

        // insert du lieu tang qua// lay du lieu ra view
        $nguoinhan = $this->nhanvienModel->where('id', $validData['nguoinhan'])->first();
        if ($nguoinhan['nv_type'] != 'phongban') {
            $validData['give_point'] = 1;
        }
        $this->quaTangModel->insert($validData);

        //cap nhat point nguoi tang
        $nguoitang = $this->nhanvienModel->where('id', $validData['nguoitang']);
        $new_point = $point + $nguoitang->nv_point;
        $nguoitang->update($validData['nguoitang'], ['nv_point' => $new_point]);
        
        return view( $this->folder_directory . 'thankyou', ['nguoinhan' => $nguoinhan['hoten']]);
    }
}