<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use App\Models\UserRoleModel;

class RBACFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/no-access-page')->with('error', 'You must be logged in to access this page.');
        }

        $role = $arguments[0] ?? null; // Get the role from the arguments

        log_message('info', $role);

        if ($role && !$this->hasRole($userId, $role)) {
            return redirect()->to('/no-access-page')->with('error', 'You do not have permission to access this page.');
        }
        return;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }

    private function hasRole($userId, $roleName)
    {
        $roleModel = new UserRoleModel();
        $roles = $roleModel->where('user_id', $userId)->findAll();
        $roleNames = [
            1 => 'superadmin',
            2 => 'admin',
            3 => 'teacher',
            4 => 'student',
            5 => 'student_service',
        ];

        foreach ($roles as $role) {
            if ($roleNames[$role['role_id']] === $roleName) {
                return true;
            }
        }

        return false;
    }
}
