<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExaminationActivity extends Migration
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
                'year' => [
                    'type'       => 'INT',
                    'unsigned'       => true,
                ],
                'semester' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
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
        $this->forge->createTable('examination_acitivity');
    }

    public function down()
    {
        $this->forge->dropTable('examination_acitivity', true);
    }
}
