<?php
/**
 * AllSeeders.php
 * File containing all the project seeders
 * php version 7.4.21
 * 
 * @category Seeders
 * @package  App\Database\Seeder
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  Digitaly Proprietory License
 * @link     https://cbt.dgtlytech.com
 */
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
/**
 * Administrator's seeder Migration class
 * 
 * @category Seeders
 * @package  App\Database\Seeder
 * @author   Umar Sunusi Maitalata <maitalata@gmail.com>
 * @license  Digitaly Proprietory License
 * @link     https://cbt.dgtlytech.com
 */
class AllSeeder extends Seeder
{
    /**
     * CaLl and run all the seeders
     *
     * @return void
     */
    public function run()
    {
        $this->call('Student');
    }
}
