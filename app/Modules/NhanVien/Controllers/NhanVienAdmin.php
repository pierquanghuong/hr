<?php

namespace App\Modules\NhanVien\Controllers;

use App\Controllers\BaseController;
use Modules\NhanVien\Models\NhanVienModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Modules\NhanVien\Models\NhanVienBuilder;

class NhanVienAdmin extends BaseController
{
    protected $view_folder_directory = "Modules\\NhanVien\\Views\\admin\\";
    protected $nhanVienModel;
    protected $nhanvienBuilder;
    
    /**
     * __construct
     *
     * @param  mixed $nhanvien
     * @return void
     */
    public function __construct()
    {   
        $this->nhanVienModel = new NhanVienModel();
        $this->nhanvienBuilder = new NhanVienBuilder();
    }
        
    /**
     * index render trang index admin
     *
     * @return void
     */
    public function index()
    {
        $danhsach_nhanvien = $this->nhanVienModel->orderBy('id', 'DESC')->findAll();
        return view($this->view_folder_directory . 'index', ['data' => $danhsach_nhanvien]);
    }
    
    /**
     * import render trang import nhân viên
     *
     * @return void
     */
    public function import()
    {
        $phongban = config('HrGame')->phongban;
        return view($this->view_folder_directory . 'import', ['phongban' => $phongban]);
    }
    
    /**
     * store thêm 1 nhân viên từ form
     *
     * @return void
     */
    public function store()
    {
        if (! $this->request->is('post')) {
            return view($this->view_folder_directory . 'index');
        }

        $rules = [
            'hoten' => 'required',
            'phongban' => 'required',
            'mascan' => 'required',
            'nv_type' => 'required',
        ];
        $data = $this->request->getPost(array_keys($rules));

        //validate data
        if (! $this->validateData($data, $rules)) {
            return redirect()->back()->withInput()->with('message', 'Bạn chưa nhập đúng dữ liệu!');
        }

        $validData = $this->validator->getValidated();

        //Luu db quà tặng
        $this->nhanVienModel->insert($validData);
        
        return redirect()->back()->withInput()->with('message', 'Tạo nhân viên thành công');
    }
    
    /**
     * postImport Thực hiện nhập dữ liệu excel
     *
     * @return void
     */
    public function postImport()
    {
        $phongban = config('HrGame')->phongban;
        $file = $this->request->getFile('excel_file'); // Get the uploaded file

        if ($file->isValid() && !$file->hasMoved()) {
            $spreadsheet = new Spreadsheet();
            $reader = new Xlsx();
            $spreadsheet = $reader->load($file->getTempName()); // Load the file

            $worksheet = $spreadsheet->getActiveSheet();
            $data = $worksheet->toArray(); // Convert to array

            // Process data
            foreach ($data as $row) {
                // Example: Assuming the columns are id, name, email
                $data = [
                    'hoten'    => $row[1],
                    'phongban'  => $row[2],
                    'mascan' => $row[3],
                ];

                // Insert or update the database as needed
                $this->nhanVienModel->insert($data);
            }

            return view($this->view_folder_directory . 'import', ['message' => 'Nhập dữ liệu thành công']);
        }

        return view($this->view_folder_directory . 'import', 
                        ['message'=> 'Nhập dữ liệu lỗi', 'phongban' => $phongban
                    ]);
    }
    
    /**
     * resetNvData Hàm xóa dữ liệu toàn bộ nhân vien - sử dụng test import
     *
     * @return void
     */
    public function resetNvData()
    {
        if ($this->nhanvienBuilder->deleteAllRow()) {
            return view($this->view_folder_directory . 'import', ['message' => 'Xóa dữ liệu thành công! vui lòng import']);
        }
        return view($this->view_folder_directory . 'import', ['message' => 'Có lỗi trong quá trình xóa dữ liệu']);
    }
}
