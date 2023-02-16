<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SessionPayments extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type'           => 'INT',
                    'unsigned'       => true,
                    'auto_increment' => true,
                ],
                'student' => [
                    'type'       => 'INT',
                    'unsigned'       => true,
                ],
                'year' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                ],
                'session' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                ],
                'payment_reference' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                ],
                'payment_status' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'updated_at' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'deleted_at' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
            ]
        );
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey(
            ['student'], 
            'students', 
             ['id'], 
            'CASCADE', 
            'CASCADE'
        );
        $this->forge->createTable('session_payments');
    }

    public function down()
    {
        $this->forge->dropTable('session_payments', true);
    }
}
