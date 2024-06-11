<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $data = array(
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => password_hash('12345', PASSWORD_BCRYPT),
        );

        $this->db->table('user')->insert($data);
    }
}
