<?php

namespace App\Libraries;

use App\Models\UserRoleModel;
use App\Models\RolePermissionModel;

class RBAC
{
    protected $userRoleModel;
    protected $rolePermissionsModel;

    public function __construct()
    {
        $this->userRoleModel = new UserRoleModel();
        $this->rolePermissionsModel = new RolePermissionModel();
    }

    public function assignRoleToUser($userId, $roleId)
    {
        return $this->userRoleModel->insert(['user_id' => $userId, 'role_id' => $roleId]);
    }

    public function assignPermissionToRole($roleId, $permissionId)
    {
        return $this->rolePermissionsModel->insert(['role_id' => $roleId, 'permission_id' => $permissionId]);
    }

    public function checkUserPermission($userId, $permission)
    {

        $db = \Config\Database::connect();

        $query = $db->query("SELECT COUNT(*) as count FROM user_roles ur
                            JOIN role_permissions rp ON ur.role_id = rp.role_id
                            JOIN permissions p ON rp.permission_id = p.id
                            WHERE ur.user_id = ? AND p.permission_name = ?", [$userId, $permission]);

        $result = $query->getRow();

            return $result->count > 0;
    }
}
