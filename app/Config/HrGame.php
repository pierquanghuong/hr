<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class HrGame extends BaseConfig
{
    public array $phongban = [
        1 => 'TOM/LEG/IT',
        2 => 'P&S',
        3 => 'QA/QC/LAB',
        4 => 'SALES',
        5 => 'FIN',
        6 => 'HR-Admin',
        7 => 'CS',
        8 => 'MAR',
        9 => 'IPR',
        10 => 'PCO',
        12 => 'R&D',
    ];

    public $start = '2024-06-01 12:00:00';
    public $end = '2024-06-20 12:00:00';
    public $limit = 1;
    public $room_limit = 4;
    public $enable = true;
    public $datetimeFormat = [
        'db' => 'Y-m-d G:i:s',
        'display' => 'd-m-Y G:i:s',
    ] ;

    public $present_status = [
        0 => 'Không duyệt',
        1 => 'Chờ duyệt',
        2 => 'Đã Duyệt',
    ];

    public $awards = [
        0  => [
            'name' => 'Employee of the Year/Nhân viên của năm',
            'type' => 'nhanvien',
        ],
        1  => [
            'name' => 'Most Innovative Employee/Nhân viên có ý tưởng cải tiến nhất',
            'type' => 'nhanvien',
        ],
        2  => [
            'name' => 'Most Dedicated Employee/Nhân viên có ý tưởng cải tiến nhất',
            'type' => 'nhanvien',
        ],
        3  => [
            'name' => 'Most Innovative Employee/Nhân viên tận tâm nhất',
            'type' => 'nhanvien',
        ],
        4  => [
            'name' => 'Best Supportive Employee/Nhân viên hỗ trợ tốt nhất',
            'type' => 'nhanvien',
        ],
        5  => [
            'name' => 'Best Customer Care Employee/Nhân viên chăm sóc khách hàng tốt nhất',
            'type' => 'nhanvien',
        ],
        6  => [
            'name' => 'Most Self-Improved Employee/Nhân viên phát triển bản thân nhiều nhất',
            'type' => 'nhanvien',
        ],
        7  => [
            'name' => 'Most Innovative Employee/Người giải quyết vấn đề tốt nhất',
            'type' => 'nhanvien',
        ],
        8  => [
            'name' => 'Outstanding Team of the Year/Đội nhóm xuất sắc nhất năm',
            'type' => 'phongban',
        ],
        9  => [
            'name' => 'Most Innovative Team/Đội nhóm sáng tạo nhất ',
            'type' => 'phongban',
        ],
        10  => [
            'name' => 'Team Spirit Award/Tinh thần đồng đội',
            'type' => 'phongban',
        ],
        11  => [
            'name' => 'Revenue Breakthrough/Đột phá doanh thu',
            'type' => 'phongban',
        ],
        
    ];
}
