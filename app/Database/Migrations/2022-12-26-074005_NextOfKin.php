<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class NextOfKin extends Migration
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
                'next_of_kin_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
                ],
                'next_of_kin_phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
                ],
                'next_of_kin_address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
                ],
                'next_of_kin_relation' => [
                    'type' => 'enum',
                    'constraint' => [
                        'Brother', 
                        'Sister', 
                        'Father', 
                        'Mother', 
                        'Son', 
                        'Daughter',
                        'Niece',
                        'Nephew',
                        'Husband',
                        'Grandfather',
                        'Grandmother',
                        'Uncle',
                        'Aunt'
                    ],
                ],
                'next_of_kin_email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
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
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey(
            'student', 
            'students', 
            'id', 
            'CASCADE', 
            'CASCADE'
        );
        $this->forge->createTable('next_of_kins');
    }

    public function down()
    {
        $this->forge->dropTable('next_of_kins', true);
    }
}
