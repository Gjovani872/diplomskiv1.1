<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\TeachersModel;

class TeachersController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new TeachersModel();
    }

    public function index()
    {
        $data['teachers'] = $this->model->findAll();
        return view('admin/teachers/index', $data);
    }

    public function create()
    {
        return view('admin/teachers/create');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $this->model->insert($data);
        return redirect()->to('/admin/teachers');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admin/teachers');
    }
}
