<?php

namespace App\Controllers;

use App\Libraries\Menu;

class HomeController extends BaseController
{
    public function index($role)
    {
        $userId = session()->get('user_id');
        $roles = session()->get('roles');

        if (!$userId || !$roles) {
            return redirect()->to('/no-access-page');
        }

        $menu = new Menu();
        $menuItems = $menu->getMenuItems($roles[0]); // Assuming primary role

        return view('backend/pages/home', ['menuItems' => $menuItems, 'role' => $role]);
    }
}
