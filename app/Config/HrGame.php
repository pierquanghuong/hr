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
}
