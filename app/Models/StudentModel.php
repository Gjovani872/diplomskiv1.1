<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'index_no', 'st_isActive', 'st_hasPaidSemester', 'st_semesterYear', 'person_id'
    ];
}
