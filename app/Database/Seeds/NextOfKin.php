<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class NextOfKin extends Seeder
{
    public function run()
    {
        $data1 = [
            'student'              => 1,
            'next_of_kin_name'     => 'Firdausi Musa',
            'next_of_kin_phone'    => '07023908870',
            'next_of_kin_address'  => 'Naibawa Yan Awaki',
            'next_of_kin_relation' => 'Sister',
            'next_of_kin_email'    => 'firdausimusa@gmail.com',
        ];

        $this->db->table('next_of_kins')->insert($data1);

        $data2 = [
            'student'              => 5,
            'next_of_kin_name'     => 'Zailani Sani Umar',
            'next_of_kin_phone'    => '09075210202',
            'next_of_kin_address'  => 'Sharada Kwanar Freedom',
            'next_of_kin_relation' => 'Brother',
        ];

        $this->db->table('next_of_kins')->insert($data2);

        $data3   = [
            'student'              => 4,
            'next_of_kin_name'     => 'Umar Sunusi Maitalata',
            'next_of_kin_phone'    => '08098069816',
            'next_of_kin_address'  => 'No. 317 Dala Qtrs.',
            'next_of_kin_relation' => 'Brother',
            'next_of_kin_email'    => 'maitalata@gmail.com',
        ];

        $this->db->table('next_of_kins')->insert($data3);
    }
}
