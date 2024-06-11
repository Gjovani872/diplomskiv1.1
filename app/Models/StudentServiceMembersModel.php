<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentServiceMembersModel extends Model
{
    protected $table = 'student_service_members';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'position'];
}
