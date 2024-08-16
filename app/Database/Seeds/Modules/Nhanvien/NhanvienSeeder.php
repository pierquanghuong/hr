<?php

namespace App\Database\Seeds\Modules\Nhanvien;

use CodeIgniter\Database\Seeder;

class NhanvienSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'hoten' => 'Đoàn Thanh Bình',
                'phongban' => 'Nhân Sự',
                'mascan' => md5(rand(10,100)),
                'created_at' => date('Y-m-d H:i:s'), // Current timestamp
                'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
            ],
            [
                'hoten' => 'Đoàn Minh Sự',
                'phongban' => 'Nhân Sự',
                'mascan' => md5(rand(10,100)),
                'created_at' => date('Y-m-d H:i:s'), // Current timestamp
                'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
            ],
            [
                'hoten' => 'Vũ Ngọc Thế',
                'phongban' => 'Hành Chính',
                'mascan' => md5(rand(10,100)),
                'created_at' => date('Y-m-d H:i:s'), // Current timestamp
                'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
            ],
            [
                'hoten' => 'Vũ Hồng Hạnh',
                'phongban' => 'Kế Toán',
                'mascan' => md5(rand(10,100)),
                'created_at' => date('Y-m-d H:i:s'), // Current timestamp
                'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
            ],
            [
                'hoten' => 'Trần Quang Ninh',
                'phongban' => 'Marketing',
                'mascan' => md5(rand(10,100)),
                'created_at' => date('Y-m-d H:i:s'), // Current timestamp
                'updated_at' => date('Y-m-d H:i:s'), // Current timestamp
            ],
        ];

        // Using Query Builder to insert data
        $this->db->table('hr_nhanvien')->insertBatch($data);
    }
}
