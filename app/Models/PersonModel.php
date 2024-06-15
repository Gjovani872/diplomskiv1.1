<?php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'jmbg', 'first_name', 'last_name', 'phone_number', 'enrolledAt', 'updatedAt', 'user_id'
    ];
}
