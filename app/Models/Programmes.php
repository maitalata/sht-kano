<?php

namespace App\Models;

use CodeIgniter\Model;

class Programmes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'programmes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = \App\Entities\Programmes::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'parent_school',
        'campus',
        'school',
        'programme',
        'category',
        'application_fee',
        'is_open',
        'has_daily_quota',
        'quota_per_day',
        'closing_on',
        'breakpoints',
        'daily_countdown',
        'daily_countdown',
        'pass_mark',
        'course_duration',
        'admitted',
        'tier'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
