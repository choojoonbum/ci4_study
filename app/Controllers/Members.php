<?php
namespace App\Controllers;

use Config\Services;

class Members extends BaseController
{
    public function login() {
        if (session()->get('isLogin')) {
            session()->setFlashdata('message', '현재 로그인이 되어 있습니다.');
            return redirect()->to('/');
        }
        return view('member/login',['validation' => Services::validation()]);
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('member/login');
    }

    public function auth() {
        $memberService = service('memberService');
        if (! $this->validate('loginRules')) {
            return view('member/login', [
                'validation' => $this->validator,
            ]);
        }
        if (!$memberService->loginProcess()){            
            session()->setFlashdata('message', '로그인 실패');
            return view('member/login');
        } else {
            session()->setFlashdata('message', '로그인 성공.');
            if (session()->get('level') < 90) {
                return redirect()->to('/');
            } else {
                return redirect()->to('admin');
            }
        }

    }

}