<?php

namespace App\Libraries;

class Menu
{
    protected $menus = [
        'superadmin' => [
            'Dashboard' => '/superadmin/dashboard',
            'Manage Users' => '/superadmin/manage_users',
            'Settings' => [
                'link' => '/superadmin/settings',
                'submenu' => [
                    'General' => '/superadmin/settings/general',
                    'Security' => '/superadmin/settings/security',
                ]
            ],
        ],
        'admin' => [
            'Dashboard' => '/admin/dashboard',
            'Manage Courses' => '/admin/manage_courses',
            'Reports' => '/admin/reports',
        ],
        'teacher' => [
            'Dashboard' => '/teacher/dashboard',
            'My Classes' => '/teacher/classes',
            'Attendance' => '/teacher/attendance',
        ],
        'student' => [
            'Dashboard' => '/student/dashboard',
            'My Courses' => '/student/courses',
            'Grades' => '/student/grades',
        ],
        'student_service' => [
            'Dashboard' => '/student_service/dashboard',
            'Student Requests' => '/student_service/requests',
        ],
    ];

    public function getMenuItems($roleId)
    {
        $roleName = $this->getRoleName($roleId);
        return $this->menus[$roleName] ?? [];
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

        return $roleNames[$roleId] ?? null;
    }



    // protected $menus = [
    //     'superadmin' => [
    //         'Dashboard' => '/superadmin/dashboard',
    //         'Manage Users' => '/superadmin/users',
    //         'Settings' => '/superadmin/settings',
    //     ],
    //     'admin' => [
    //         'Dashboard' => '/admin/dashboard',
    //         'Manage Courses' => '/admin/courses',
    //         'Reports' => '/admin/reports',
    //     ],
    //     'teacher' => [
    //         'Dashboard' => '/teacher/dashboard',
    //         'My Classes' => '/teacher/classes',
    //         'Attendance' => '/teacher/attendance',
    //     ],
    //     'student' => [
    //         'Dashboard' => '/student/dashboard',
    //         'My Courses' => '/student/courses',
    //         'Grades' => '/student/grades',
    //     ],
    //     'student_service' => [
    //         'Dashboard' => '/student_service/dashboard',
    //         'Student Requests' => '/student_service/requests',
    //     ],
    // ];

    // public function getMenuItems($roles)
    // {
    //     $menuItems = [];

    //     foreach ($roles as $role) {
    //         $roleName = $this->getRoleName($role);
    //         if (isset($this->menus[$roleName])) {
    //             $menuItems = array_merge($menuItems, $this->menus[$roleName]);
    //         }
    //     }

    //     return $menuItems;
    // }

    // private function getRoleName($roleId)
    // {
    //     $roleNames = [
    //         1 => 'superadmin',
    //         2 => 'admin',
    //         3 => 'teacher',
    //         4 => 'student',
    //         5 => 'student_service',
    //     ];

    //     return $roleNames[$roleId] ?? null;
    // }

}
