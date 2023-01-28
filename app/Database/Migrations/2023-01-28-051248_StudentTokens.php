<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentTokens extends Migration
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
                    'type'       => 'VARCHAR',
                    'constraint' => '80',
                ],
                'token' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                ],
                'token_type' => [
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
        $this->forge->addForeignKey(
            ['student'], 
            'students', 
             ['email'], 
            'CASCADE', 
            'CASCADE',
            'id'
        );
        $this->forge->createTable('students_tokens');
    }

    public function down()
    {
        $this->forge->dropTable('students_tokens', true);
    }
}
