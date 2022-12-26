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
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '45',
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
                'address' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => true,
                ],
                'gender' => [
                    'type' => 'enum',
                    'constraint' => ['Male', 'Female'],
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
                ],
                'religion' => [
                    'type' => 'enum',
                    'constraint' => ['Islam', 'Christianity', 'Other'],
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
        $this->forge->addUniqueKey(['registration_number', 'email']);
        $this->forge->createTable('students');
    }

    public function down()
    {
        $this->forge->dropTable('students', true);
    }
}
