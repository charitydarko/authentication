<?php

namespace Authentication\Models;

use CodeIgniter\Model;

class RolePermissionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'role_permission';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\UniversalEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'role_id',
        'perm_cat_id',
        'can_view',
        'can_add',
        'can_edit',
        'can_delete',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'role_id' => 'permit_empty|numeric',
        'perm_cat_id' => 'permit_empty|numeric',
        'can_view' => 'permit_empty|numeric',
        'can_add' => 'permit_empty|numeric',
        'can_edit' => 'permit_empty|numeric',
        'can_delete' => 'permit_empty|numeric',
    ];
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
