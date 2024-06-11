<?php

namespace App\Cells;

use App\Libraries\Menu;

class Sidebar
{
    public function render()
    {
        $userId = session()->get('user_id');
        $roles = session()->get('roles');

        if (!$userId || !$roles) {
            return '';
        }

        $menu = new Menu();
        $menuItems = $menu->getMenuItems($roles[0]); // Assuming primary role

        return view('backend/layout/inc/left-sidebar', ['menuItems' => $menuItems]);
    }
}
