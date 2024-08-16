<?php

namespace App\Database\Migrations\Modules\QuaTang;

use CodeIgniter\Database\Migration;

/**
 * CreateQuaTangTable tao bang qua tang
 */
class CreateQuaTangTable extends Migration
{
    protected $table = 'hr_quatang';

    public function up()
    {
         //
         $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nguoitang' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'nguoinhan' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'ly_do' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at'=> [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable($this->table);
        //create foreign key to nhan vien
        $this->forge->addForeignKey('hr_nhanvien', 'nguoitang', 'id', 'CASCADE');
        $this->forge->addForeignKey('hr_nhanvien', 'nguoinhan', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey($this->table, 'nguoitang');
        $this->forge->dropForeignKey($this->table, 'nguoinhan');
        $this->forge->dropTable($this->table);
    }
}
