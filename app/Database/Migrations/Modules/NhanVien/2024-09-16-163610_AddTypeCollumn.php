<?php

namespace App\Database\Migrations\Modules\NhanVien;

use CodeIgniter\Database\Migration;

class AddTypeCollumn extends Migration
{
    protected $table = 'hr_nhanvien';

    public function up()
    {
        $fields = [
            'nv_type' => [
                'type'       => 'ENUM',
                'constraint' => ['nhanvien', 'phongban'],
                'default'    => 'nhanvien',
            ],
        ];

        $this->forge->addColumn($this->table, $fields);
    }

    public function down()
    {
        $forge->dropColumn( $this->table, 'nv_type');
    }
}
