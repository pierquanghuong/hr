<?php

namespace App\Filters\HrModule;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class CheckScan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        //check session - check nhan vien scan qr
        if (!session()->has('AuthNhanvien')) {
            return redirect('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}