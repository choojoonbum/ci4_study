<?php
namespace App\Controllers\Admin;

class Members extends AdminController
{
    protected $model;

    public function __construct()
    {
        $this->model = model('MemberModel');
    }

    public function index() {
        return view('admin/member/write');
    }

    public function create() {
        return view('admin/member/write');
    }

    public function store() {
        if ($this->model->save($this->request->getPost()) === false) {
            return view('admin/member/write', ['errors' => $this->model->errors()]);
        }

        session()->setFlashdata('message', '회원등록에 성공하였습니다.');
        return redirect()->to('/admin/member/create');
    }
}