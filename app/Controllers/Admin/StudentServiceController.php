<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\StudentServiceMembersModel;

class StudentServiceMembersController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new StudentServiceMembersModel();
    }

    public function index()
    {
        $data['members'] = $this->model->findAll();
        return view('admin/student_service_members/index', $data);
    }

    public function create()
    {
        return view('admin/student_service_members/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to('/admin/student_service_members');
    }

    public function edit($id)
    {
        $data['member'] = $this->model->find($id);
        return view('admin/student_service_members/edit', $data);
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->model->update($id, $data);
        return redirect()->to('/admin/student_service_members');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/student_service_members');
    }
}
