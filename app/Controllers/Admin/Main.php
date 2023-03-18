<?php
namespace App\Controllers\Admin;

class Main extends AdminController
{
    public function index() {
        return view('admin/main');
    }
}