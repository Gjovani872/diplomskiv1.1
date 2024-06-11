<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Libraries\Hash;
use App\Models\User;
use App\Models\UserModel;
use App\Models\UserRoleModel;

class AuthController extends BaseController
{
    protected $helpers = ['url', 'form'];

    public function loginForm()
    {
        $data = [
            'pageTitle' => 'Login',
            'validation' => null
        ];

        return view('backend/pages/auth/login', $data);
        //
    }

    public function loginHandler()
    {
        $fieldType = filter_var($this->request->getVar('login_id'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if ($fieldType == 'email') {
            $isValid = $this->validate([
                'login_id' => [
                    'rules' => 'required|valid_email|is_not_unique[user.email]',
                    'errors' => [
                        'required' => 'Email is required',
                        'valid_email' => 'Please check the email field. It is required',
                        'is_not_unqiue' => 'Email does not exist'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'The password needs to be at least 5 characters long!',
                        'max_length' => 'The password cannot be longer than 45 characters!'
                    ]
                ]
            ]);
        } else {
            $isValid = $this->validate([
                'login_id' => [
                    'rules' => 'required|is_not_unique[user.username]',
                    'errors' => [
                        'required' => 'Username is required',
                        'is_not_unqiue' => 'Username does not exist'
                    ]
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[45]',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'The password needs to be at least 5 characters long!',
                        'max_length' => 'The password cannot be longer than 45 characters!'
                    ]
                ]
            ]);
        }
        // $enteredPassword = $this->request->getVar('password');
        if (!$isValid) {
            return view('backend/pages/auth/login', [
                'pageTitle' => 'Login',
                'validation' => $this->validator
            ]);
        } else {
            $user = new UserModel();
            $userInfo = $user->where($fieldType, $this->request->getVar('login_id'))->first();
            var_dump($userInfo);
            var_dump($user['id']); //ktu isht problemi te $user['id'] smunet mu perdor si objekt dicka
            $userRoleModel = new UserRoleModel();
            $roles = $userRoleModel->where('user_id', $user['id'])->findAll();


            $username = $this->request->getPost('login_id');
            $password = $this->request->getPost('password');

            $enteredPassword = $this->request->getVar('password');
            $storedPasswordHash = $userInfo['password'];


            $check_password = Hash::check($enteredPassword, $storedPasswordHash);



            if (!$check_password) {
                return redirect()->route('admin.login.form')->with('fail', $fieldType)->withInput();
                d($storedPasswordHash);
            } else {
                CIAuth::setCIAuth($userInfo, $username, $password, $roles, $user);
                return redirect()->route('admin.home');
            }
        }
    }
}
