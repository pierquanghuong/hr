<?php

namespace App\Modules\Admin\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Setting extends BaseController
{
    protected $view_folder_directory = "Modules\\Admin\\Views\\";
    
    public function index()
    {
        return view($this->view_folder_directory . 'setting');
    }
}
