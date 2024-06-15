<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\CIAuth;
use App\Models\PersonModel;
use App\Models\StudentModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AdminController extends BaseController
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Admin Dashboard',
        ];
        return view('backend/pages/admin/admin_home', $data);
    }

    public function logoutHandler()
    {
        CIAuth::forget();
        return redirect()->route('admin.login.form')->with('fail', 'You are logged out');
    }


    public function addStudentForm()
    {
        return view('backend/pages/admin/add-student');
    }

    public function addStudent()
    {
        $validation = \Config\Services::validation();


        if (!in_array(session()->get('role_name'), ['admin', 'superadmin'])) {
            return redirect()->to('/no-access-page')->with('error', 'You do not have permission to access this page.');
        }
        // Define validation rules
        $validation->setRules([
            'jmbg' => 'required|exact_length[13]|is_unique[person.jmbg]',
            'first_name' => 'required|max_length[50]',
            'last_name' => 'required|max_length[50]',
            'phone_number' => 'required|max_length[50]',
            'enrolledAt' => 'required|valid_date',
            'index_no' => 'required|is_unique[student.index_no]',
            'st_isActive' => 'required|in_list[0,1]',
            'st_hasPaidSemester' => 'required|in_list[0,1]',
            'st_semesterYear' => 'required|integer',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }


        $userModel = new UserModel();
        // $currentDate = date('Y-m-d H:i:s');
        // $name = lcfirst($this->request->getPost('first_name')[0]) . '_' . lcfirst($this->request->getPost('last_name')[0]);

        $firstName = $this->request->getPost('first_name');
        $lastName = $this->request->getPost('last_name');

        // Ensure the POST data is not null and is a string
        if (is_string($firstName) && is_string($lastName)) {
            $username = lcfirst($firstName) . '_' . lcfirst($lastName);
        } else {
            // Handle the error appropriately, e.g., set a default value or throw an error
            $username = 'default_username'; // Example default value
        }

        /** you need to make an email field inside the view of this controller, and you also need to validate the email here,
         * the one you get from post
         */
        $userData = [
            'username' => $username,
            'password' => $this->request->getPost('first_name'),
            'email' => 'gjovicotaj3@gmail.com',
            'created_at' => '2024-06-07 12:19:41'
        ];
        $userModel->save($userData);
        $userModelID = $userModel->getInsertID();



        // Save to person table
        $personModel = new PersonModel();
        // $currentDate = date('Y-m-d H:i:s');
        $personData = [
            'jmbg' => $this->request->getPost('jmbg'),
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'enrolledAt' => $this->request->getPost('enrolledAt'),
            'user_id' => $userModelID, // assuming the admin user is adding the student
        ];
        $personModel->save($personData);
        $personId = $personModel->getInsertID();

        // Save to student table
        $studentModel = new StudentModel();
        $studentData = [
            'index_no' => $this->request->getPost('index_no'),
            'st_isActive' => $this->request->getPost('st_isActive'),
            'st_hasPaidSemester' => $this->request->getPost('st_hasPaidSemester'),
            'st_semesterYear' => $this->request->getPost('st_semesterYear'),
            'person_id' => $personId,
        ];
        $studentModel->save($studentData);
        // add an if to check for this can only be done by admin and superadmin roles
        return redirect()->to(session()->get('role_name') . '/home')->with('success', 'Student added successfully.');
    }


    public function showStudents()
    {
        // Check if the user is admin, superadmin, or student_service
        if (!in_array(session()->get('role_name'), ['admin', 'superadmin', 'student_service'])) {
            return redirect()->to('/no-access-page')->with('error', 'You do not have permission to access this page.');
        }

        $studentModel = new StudentModel();
        $personModel = new PersonModel();

        $students = $studentModel->select('student.*, person.first_name, person.last_name, person.phone_number, person.jmbg, person.enrolledAt')
            ->join('person', 'student.person_id = person.id')
            ->findAll();

        $data = [
            'pageTitle' => 'Student List',
            'students' => $students
        ];

        return view('backend/pages/admin-superadmin-st_service/show_students', $data);
    }
}
