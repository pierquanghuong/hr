<?php

namespace App\Database\Migrations\Modules\NhanVien;

use CodeIgniter\Database\Migration;

class AddPointCollumn extends Migration
{
    protected $table = 'hr_nhanvien';

    public function up()
    {
        //
        $fields = [
            'nv_point' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'default'       => 0,
            ],
        ];

        $this->forge->addColumn($this->table, $fields);
    }

    public function down()
    {
        //
        $this->forge->dropColumn( $this->table, 'nv_point');
    }
}
