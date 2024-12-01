<?php

namespace App\Modules\QuaTang\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use Modules\NhanVien\Models\NhanVienModel;
use Modules\QuaTang\Models\QuaTangModel;
use App\Modules\QuaTang\Models\Support;

class HrGameAdmin extends BaseController
{
    protected $quatangModel;
    protected $nhanvienModel;
    protected $presentSupport;
    
    protected $folder_directory = "Modules\\QuaTang\\Views\\admin\\";

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        // Load the model
        $this->quatangModel = new QuaTangModel();
        $this->nhanvienModel = new NhanVienModel();
        $this->presentSupport = new Support();
    }
    
    /**
     * index render trang index
     *
     * @return void
     */
    public function index()
    {   
        $start = service('settings')->get('HrGame.start');
        $end = service('settings')->get('HrGame.end');
        helper('hr');

        /**
         * Tìm kiếm bằng datetime ranger
         */
        $date_range = (string)$this->request->getGet('daterange');
        if ($date_range) {
            list($start, $end) = explode(' - ', $date_range);
            $start = to_dbdatetime($start, setting('HRGame.datetimeFormat')['display']);
            $end = to_dbdatetime($end, setting('HRGame.datetimeFormat')['display']);
        } 
        //Lấy dữ liệu
        $list_quatang = $this->presentSupport->getPresent($start, $end);
        $count_quatang = $this->presentSupport->countPresent($start, $end);
        $time_label = '- từ: ' . to_display_datetime($start) . ' đến ' . to_display_datetime($end);
        
        return view($this->folder_directory . 'index', ['quatang' => $list_quatang, 
                                                        'count_quatang' => $count_quatang,
                                                        'time_label' => $time_label, 
                                                ]);
    }
    
    /**
     * edit render edit page
     *
     * @param  mixed $id
     * @return void
     */
    public function edit($id)
    {
        $quatang = $this->presentSupport->getOne($id);
        if ($quatang) {
            $present_status_list = setting('HrGame.present_status');
            return view($this->folder_directory . 'edit', ['present' => $quatang, 'present_status_list' => $present_status_list]);
        }
        return view('errors/html/error_404',['message' => 'Quà tặng không tồn tại!']);
    }

    public function store()
    {
        if (! $this->request->is('post')) {
            return view($this->folder_directory . 'index');
        }
        $data = $this->request->getPost(['id', 'status', 'note']);
        $this->quatangModel
            ->where('id', $data['id'])
            ->set($data)
            ->update();
            return redirect()->to('/admin/hr-game');
    }
    
    /**
     * statistic trang thống kê hr game
     *
     * @return void
     */
    public function statistic()
    {
        //lay tat ca phong ban từ config HrGame
        $phongban = service('settings')->get('HrGame.phongban');
        $start = service('settings')->get('HrGame.start');
        $end = service('settings')->get('HrGame.end');
        $chart_phongban = [];
        helper('hr');

        //lấy count theo phong ban
        foreach ($phongban as $phong) {
            $count_by_phongban = $this->presentSupport->countByPhongban($phong, $start, $end);

            if ($count_by_phongban > 0) {
                $chart_phongban[$phong] = $count_by_phongban;
            }
        }
        
        //setup chart top nv
        $top_nhanvien = $this->presentSupport->getTopNhanVien(5, $start, $end);
        $chart_top_nhanvien = [];
        if ($top_nhanvien) {
            foreach ($top_nhanvien as $nhanvien) {
                $chart_top_nhanvien[$nhanvien->nguoinhan] = (int)$nhanvien->count;
            }
        }

        $time_label = 'Trong thời gian: ' . to_display_datetime($start) . ' đến ' . to_display_datetime($end);
        return view($this->folder_directory . 'statistic', [
                            'phongban' => $chart_phongban,
                            'top_nhanvien' => $chart_top_nhanvien,
                            'time_label' => $time_label,
                        ]);
    }
    
    /**
     * settings render trang hr-game settings
     *
     * @return void
     */
    public function settings()
    {
        //Xu ly ngay thang de hien thi
        $start_time = to_display_datetime(service('settings')->get('HrGame.start'));
        $end_time = to_display_datetime(service('settings')->get('HrGame.end'));

        $game_setting = [
            'start_time' => $start_time,
            'end_time' => $end_time,
            'limit' =>service('settings')->get('HrGame.limit'),
            'room_limit' => service('settings')->get('HrGame.room_limit'),
            'enable' =>service('settings')->get('HrGame.enable'),
        ];
        
        return view($this->folder_directory . 'settings', ['data' => $game_setting]);
    }
    
    /**
     * storeSetting store hr-game setting
     *
     * @return void
     */
    public function storeSettings()
    {
        if (! $this->request->is('post')) {
            return view($this->folder_directory . 'index');
        }

        // Define validation rules
        $rules = ([
            'game-end' => [
                'label' => 'Bắt đầu từ',
                'rules'  => 'required',
                'errors'=> 'Trường {field} không được trống, và định dạng ngày tháng'
            ],
            'game-start' => [
                'label' => 'Bắt đầu từ',
                'rules'  => 'required',
                'errors'=> 'Trường {field} không được trống, và định dạng ngày tháng'
            ],
            'game-limit'    => [
                'label' => 'Số lần tặng quà',
                'rules'  => 'required|integer',
                'errors'    => '{field} phải là số'
            ],
            'room-limit'    => [
                'label' => 'Số lần tặng của phòng ban',
                'rules'  => 'required|integer',
                'errors'    => '{field} phải là số'
            ],
        ]);

        $data = $this->request->getPost(array_keys($rules));

        if (! $this->validateData($data, $rules)) {
            return redirect()->to('/admin/hr-game/settings')
                            ->withInput()
                            ->with('message', 'Sảy ra lỗi nhập liệu!');
        }
        
        // convert time to db time
        $db_time_start = to_dbdatetime($this->request->getPost('game-start'));
        $db_time_end = to_dbdatetime($this->request->getPost('game-end'));

        //luu setting vào db
        service('settings')->set('HrGame.start', $db_time_start);
        service('settings')->set('HrGame.end', $db_time_end);
        service('settings')->set('HrGame.limit', $this->request->getPost('game-limit'));
        service('settings')->set('HrGame.room_limit', $this->request->getPost('room-limit'));
        if ($this->request->getPost('game-enable')) {
            service('settings')->set('HrGame.enable', true);
        } else {
            service('settings')->set('HrGame.enable', false);
        }

        return redirect()->to('/admin/hr-game/settings')->with('message', 'Lưu cấu hình thành công!');
    }
}