<?php
namespace App\Service;

class MemberService {

    protected $memberModel;
    protected $request;

    public function __construct()
    {
        $this->memberModel = model('MemberModel');
        $this->request = service('request');
    }

    public function loginProcess() {
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');
        $memberData = $this->memberModel->get($email);
        $hashPassword = $memberData['password'];
        if (password_verify($password, $hashPassword)) {
            unset($memberData['password']);
            $memberData['isLogin'] = true;
            session()->set($memberData);
            return true;
        } else {
            return false;
        }
    }

}