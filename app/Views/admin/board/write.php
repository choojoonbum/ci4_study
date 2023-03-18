<?= $this->extend('admin/layout/master') ?>
<?= $this->section('content') ?>
<h1 class="page-header">공지사항</h1>
<div class="row placeholders">
    <form class="form-horizontal" method="post" action="/admin/board/store" enctype="multipart/form-data" >
        <?= !empty($hiddens) ? form_hidden($hiddens) : '' ?>
        <?= csrf_field() ?>
        <div class="form-group <?php if($validation->hasError('writer')) : ?>has-error<?php endif; ?>">
            <label for="input-writer" class="col-sm-2 control-label">작성자</label>
            <div class="col-sm-10">
                <input type="text" name="writer" class="form-control" id="input-writer" value="<?= set_value('writer',$boardData['writer'] ?? '') ?>">
                <div class="text-left"><?=$validation->getError('writer')?></div>
            </div>
        </div>
        <div class="form-group <?php if($validation->hasError('title')) : ?>has-error<?php endif; ?>">
            <label for="input-title" class="col-sm-2 control-label">제목</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="input-title" value="<?= set_value('title',$boardData['title'] ?? '') ?>">
                <div class="text-left"><?=$validation->getError('title')?></div>
            </div>
        </div>
        <div class="form-group <?php if($validation->hasError('content')) : ?>has-error<?php endif; ?>"">
            <label for="textarea-content" class="col-sm-2 control-label">내용</label>
            <div class="col-sm-10">
                <textarea name="content" class="form-control" rows="10" id="textarea-content"><?= set_value('content',$boardData['content'] ?? '') ?></textarea>
                <div class="text-left"><?=$validation->getError('content')?></div>
            </div>
        </div>
        <div class="form-group <?php if($validation->hasError('attach')) : ?>has-error<?php endif; ?>">
            <label for="file-title" class="col-sm-2 control-label">파일첨부</label>
            <div class="col-sm-10">
                <input type="file" name="attach" class="form-control" id="file-title" >
                <div class="text-left"><?=$validation->getError('attach')?></div>
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">등록/수정하기</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>