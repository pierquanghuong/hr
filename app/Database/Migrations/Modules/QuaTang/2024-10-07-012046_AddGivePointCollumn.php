<?php

namespace App\Database\Migrations\Modules\QuaTang;

use CodeIgniter\Database\Migration;

class AddGivePointCollumn extends Migration
{
    protected $table = "hr_quatang";
    public function up()
    {
        //
        $fields = [
            'give_point' => [
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
        $this->forge->dropColumn( $this->table, 'give_point');
    }
}
