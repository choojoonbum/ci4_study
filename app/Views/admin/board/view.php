<?= $this->extend('admin/layout/master') ?>
<?= $this->section('content') ?>
<h1 class="page-header"><?= $title?></h1>
<div class="table">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th class="col-md-6"><?=$boardData['title']?></th>
            <th class="col-md-2"><?=$boardData['writer']?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="col-md-8" colspan="2">
                <p><?=$boardData['content']?></p>
                <?php if(!empty($imgData)) foreach ($imgData as $imgSrc) : ?>
                <img src="/imageRender/<?=$imgSrc['filename']?>"><br>
                <?php endforeach; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="text-right">
            <a href="/admin/board/create?board_id=<?=$boardData['board_id']?>&mode=reply&ref=<?=$boardData['ref']?>&step=<?=$boardData['step']?>&depth=<?=$boardData['depth']?>" type="button" class="btn btn-default">답글</a>
            <a href="/admin/board/update/<?=$boardData['idx']?>?board_id=<?=$boardData['board_id']?>" type="button" class="btn btn-default">수정</a>
            <button type="button" class="btn btn-default">삭제</button>
            <a href="/admin/board?board_id=<?=$boardData['board_id']?>" type="button" class="btn btn-default">리스트</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>