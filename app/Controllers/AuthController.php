<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserRoleModel;

class AuthController extends BaseController
{
    public function login()
    {
        // Check if the user is already logged in
        if (session()->get('user_id')) {
            $roleName = session()->get('role_name');
            return redirect()->to("{$roleName}/home");
        }

        helper(['form']);
        return view('backend/pages/auth/login');
    }

    public function authenticate()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Get user roles
            $userRoleModel = new UserRoleModel();
            $roles = $userRoleModel->where('user_id', $user['id'])->findAll();

            // Store user info and roles in session
            session()->set('user_id', $user['id']);
            session()->set('roles', array_column($roles, 'role_id'));

            // Determine primary role and redirect
            $role = $roles[0]['role_id']; // Assuming each user has one primary role
            $roleName = $this->getRoleName($role);

            session()->set('role_name', $roleName);

            return redirect()->to("{$roleName}/home");
        }

        // Handle login failure
        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    private function getRoleName($roleId)
    {
        $roleNames = [
            1 => 'superadmin',
            2 => 'admin',
            3 => 'teacher',
            4 => 'student',
            5 => 'student_service',
        ];

        return $roleNames[$roleId] ?? 'unknown';
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
