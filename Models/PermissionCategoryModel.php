<?php

namespace Authentication\Models;

use CodeIgniter\Model;

class PermissionCategoryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'permission_category';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'App\Entities\UniversalEntity';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'perm_group_id',
        'name',
        'short_code',
        'enable_view',
        'enable_add',
        'enable_edit',
        'enable_delete',
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
        'perm_group_id' => 'required|numeric',
        'name' => 'required|max_length[100]',
        'short_code' => 'required|max_length[100]',
        'enable_view' => 'numeric',
        'enable_add' => 'numeric',
        'enable_edit' => 'numeric',
        'enable_delete' => 'numeric'
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
