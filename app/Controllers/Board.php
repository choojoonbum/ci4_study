<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\BoardModel;

class Board extends BaseController
{
    public function index() {
        return view('board/write');
    }

    public function create() {
        return view('board/write');
    }

    public function store() {

        $board = model(BoardModel::class);
        $data = [
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            //'category_idx' => $this->request->getPost('category_idx'),
        ];

        $board->insert($data);

    }
}