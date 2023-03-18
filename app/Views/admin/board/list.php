<?= $this->extend('admin/layout/master') ?>
<?= $this->section('content') ?>
<h1 class="page-header"><?= $title ?></h1>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th class="col-md-1">번호</th>
            <th class="col-md-6">제목</th>
            <th class="col-md-2">작성자</th>
            <th class="col-md-2">작성일</th>
            <th class="col-md-1">삭제</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(!empty($boardData)){
            foreach($boardData as $key => $value){
        ?>
        <tr>
            <td><?=$value['idx']?></td>
            <td style="text-indent: <?= ($value['depth'] * 25)?>px"><?=anchor('/admin/board/view/'.$value['idx'],$value['title'])?></td>
            <td><?=$value['writer']?></td>
            <td><?=$value['created_at']?></td>
            <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-board-id="<?=$value['idx']?>">삭제하기</button></td>
        </tr>
<?php }
            }
                ?>
        </tbody>
    </table>
    <div class="text-center"><?= $pager->links() ?></div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="text-right">
            <a href="/admin/board/create?board_id=<?=$boardId?>" type="button" class="btn btn-default">등록하기</a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var board_id = button.data('board-id')
        var modal = $(this)
        modal.find('.modal-title').text('게시글 삭제')
        modal.find('.modal-body').text('게시글을 삭제하시겠습니까? 삭제 후 복구는 불가합니다.')
        modal.find('.exec').click(function() {
            location.href='/admin/board/delete/'+board_id;
        });
    })
</script>
<?= $this->endSection() ?>
