<?php

namespace App\Database\Migrations\Modules\QuaTang;

use CodeIgniter\Database\Migration;

class AddStatusCollumn extends Migration
{
    protected $table = "hr_quatang";
    public function up()
    {
        $fields = [
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
        ];
        $this->forge->addColumn($this->table, $fields);
    }

    public function down()
    {
        $this->forge->dropColumn( $this->table, 'status');
        $this->forge->dropColumn( $this->table, 'note');
    }
}