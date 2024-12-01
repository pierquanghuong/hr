<?php

namespace App\Database\Migrations\Modules\Vote;

use CodeIgniter\Database\Migration;

class CreateVoteTable extends Migration
{
    protected $table = 'hr_vote';
    
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomineer' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'nominee' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'reason' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
            ],
            'award' => [
                'type' => 'INT',
                'constraint'     => 2,
            ],
            'status' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'default'       => 1,
            ],
            'note' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
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
        $this->forge->addForeignKey('hr_nhanvien', 'nomineer', 'id', 'CASCADE');
        $this->forge->addForeignKey('hr_nhanvien', 'nominee', 'id', 'CASCADE');
    }

    public function down()
    {
        $this->forge->dropForeignKey($this->table, 'nomineer');
        $this->forge->dropForeignKey($this->table, 'nominee');
        $this->forge->dropTable($this->table);
    }
}
