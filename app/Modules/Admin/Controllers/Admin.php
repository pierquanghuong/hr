<?php

namespace Modules\Admin\Controllers;

use App\Controllers\BaseController;
use Config\Auth;

class Admin extends BaseController
{
    protected $folder_directory = "Modules\\Admin\\Views\\";

    public function index()
    {
        $data = [
            'title' => 'Bảng Điều Khiển'
        ];
        return view($this->folder_directory . 'index', $data);
    }
}