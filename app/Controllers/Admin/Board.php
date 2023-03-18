<?php
namespace App\Controllers\Admin;

use Config\Services;

class Board extends AdminController
{
    protected $helpers = ['form'];
    protected $model;
    protected $boardId;

    public function __construct()
    {
        $this->model = model('BoardModel');
        $this->boardId = service('request')->getVar('board_id');
    }

    public function index() {

        $boardData = $this->model->where('board_id',$this->boardId)->orderBy('ref DESC, step ASC')->paginate(10);
        $data = [
            'boardId' => $this->boardId,
            'boardData' => $boardData,
            'title'     => '공지사항',
            'pager' => $this->model->pager,
        ];
        return view('admin/board/list',$data);
    }

    public function create() {

        $ref = 0;
        $step = 0;
        $depth = 0;
        $boardData = array();
        if ($this->request->getGet('mode') == 'reply') {
            $ref = $this->request->getGet('ref');
            $step = $this->request->getGet('step') + 1;
            $depth = $this->request->getGet('depth') + 1;
            $boardData['title'] = '[Re] ';
        }
        $hiddens = ['board_id'  => $this->boardId,'mode'  => 'create','ref' => $ref,'step' => $step,'depth' => $depth];
        $data = [
            'hiddens' => $hiddens,
            'title'     => '공지사항',
            'boardData' => $boardData,
            'validation' => Services::validation(),
        ];

        return view('admin/board/write',$data);
    }

    public function update($id) {
        $boardData = $this->model->find($id);
        $hiddens = [
            'board_id'  => $this->boardId,
            'idx'  => $boardData['idx'],
            'mode'  => 'update',
        ];
        $data = [
            'hiddens' => $hiddens,
            'boardData' => $boardData,
            'validation' => Services::validation(),
        ];
        return view('admin/board/write',$data);
    }

    public function view($id) {
        $boardData = $this->model->find($id);
        $imgData = model('ImageModel')->where(['board_idx' => $id])->findAll();
        $data = [
            'imgData' => $imgData,
            'boardData' => $boardData,
            'title'     => '공지사항',
        ];
        return view('admin/board/view',$data);
    }

    public function delete($id) {
        $this->model->delete($id);
        return redirect()->to('/admin/board');
    }

    public function store() {

        if (! $this->validate('boardRules')) {
            return view('admin/board/write', [
                'validation' => $this->validator,
            ]);
        }

        if ($this->request->getPost('mode') == 'create' && $this->request->getPost('ref') > 0) { // 답글 디비 저장 전 정렬 로직 처리
            $setReplayUpdate = [
                'ref' => $this->request->getPost('ref'),
                'step >=' => $this->request->getPost('step'),
            ];
            $this->model->where($setReplayUpdate)->set('step','step+1',false)->update();
        }

        $this->model->save($this->request->getPost());

        if ($this->request->getPost('mode') == 'create') {
            $boardIdx = $this->model->getInsertID();
            if ($this->request->getPost('ref') == 0){ // 원글 디비 저장 후 그룹번호 처리
                $updateRef = [
                    'idx' => $boardIdx,
                    'ref' => $boardIdx
                ];
                $this->model->save($updateRef);
            }
        } else {
            $boardIdx = $this->request->getPost('idx');
        }

        $img = $this->request->getFile('attach');
        if ($img->isValid() && $this->validate('attachRules') && !$img->hasMoved()) {
            $imageData = [
                'board_idx' => $boardIdx,
                'filename' => $img->store(),
                'regdate' => date("Y-m-d H:i:s")
            ];
            model('ImageModel')->insert($imageData);
        }

        return redirect()->to('/admin/board?board_id='.$this->request->getPost('board_id'));
    }
}
