<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSessionTable extends Migration
{
    public function up()
    {
        $this->forge->dropTable('ci_sessions', TRUE);
        $ci_sessions = '`id` VARCHAR(128) NOT NULL,
        `ip_address` VARCHAR(45) NOT NULL,
        `timestamp` int(10) UNSIGNED DEFAULT 0 NOT NULL,
        `data` BLOB NOT NULL,
        KEY `ci_sessions_timestamp` (`timestamp`)';
        
        $this->forge->addField($ci_sessions);
        unset($ci_sessions);
        $this->forge->createTable('ci_sessions', TRUE);
    }

    public function down()
    {
        //
        $this->forge->dropTable('ci_sessions', TRUE);
    }
}
