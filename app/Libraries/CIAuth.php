<?php

namespace App\Libraries;

class CIAuth
{

    //sets the current session of the user
    public static function setCIAuth($result, $username, $password, $roles, $user)
    {
        $session = session();
        $array = ['logged_in' => true];
        $userdata = $result;
        $session->set('userdata', $userdata);
        $session->set($array);
        $session->set('user_id', $user['id']);
        $session->set('roles', array_column($roles, 'role_id'));
    }

    // returns authenticated admin id value
    public static function id() //when we would check this maybe we would make an assumption that the user has already logged in, thus we check his has(logged_in) value
    {
        $session = session();
        if ($session->has('logged_in')) {
            if ($session->has('userdata')) {
                return $session->get('userdata')['id'];
            } else {
                return null;
            }
        } else {
            return null;
        }
    }

    public static function check()
    {
        $session = session();
        return $session->has('logged_in');
    }

    public static function forget()
    {
        $session = session();
        $session->remove('logged_in');
        $session->remove('userdata');
        session()->destroy();
    }

    public static function user()
    {
        $session = session();
        if ($session->has('logged_in')) {

            if ($session->has('userdata')) {
                return $session->get('userdata');
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
