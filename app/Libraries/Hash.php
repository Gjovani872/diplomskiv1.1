<?php

namespace App\Libraries;

class Hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    public static function check($password, $db_hash)
    {
        if (password_verify($password, $db_hash)) {
            return 1;
        } else {
            return 0;
        }
    }
}
