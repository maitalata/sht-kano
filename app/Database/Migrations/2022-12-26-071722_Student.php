<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Student extends Migration
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
                'registration_number' => [
                    'type'       => 'VARCHAR',
                    'constraint'       => '45',
                ],
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'fullname' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '80',
                ],
                'phone' => [
                    'type' => 'VARCHAR',
                    'constraint' => '20',
                    'null' => true,
                ],
                'password' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'null' => true,
                ],
                'address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
                ],
                'gender' => [
                    'type' => 'enum',
                    'constraint' => ['Male', 'Female'],
                    'null' => true,
                ],
                'date_of_birth' => [
                    'type' => 'DATE',
                    'null' => true,
                ],
                'indigeneship' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'local_government' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'ward' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'marital_status' => [
                    'type' => 'enum',
                    'constraint' => ['Single', 'Married', 'Widowed', 'Divorced'],
                    'null' => true,
                ],
                'religion' => [
                    'type' => 'enum',
                    'constraint' => ['Islam', 'Christianity', 'Other'],
                    'null' => true,
                ],
                'department' => [
                    'type' => 'VARCHAR',
                    'constraint' => '88',
                    'null' => true,
                ],
                'level' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
                    'null' => true,
                ],
                'session_fee' => [
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
        $this->forge->addKey(['registration_number', 'email'], false, true);
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students', true);
    }
}
