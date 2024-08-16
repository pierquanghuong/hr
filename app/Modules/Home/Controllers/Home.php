<?php

namespace Modules\Home\Controllers;

use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $folder_directory = "Modules\\Home\\Views\\";

    public function index()
    {
        return view($this->folder_directory . 'index');
    }
}