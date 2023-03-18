<?php
helper('form');
echo $this->extend('layout/master');
echo $this->section('content');
?>

<h2> 메뉴얼 등록</h2>
<hr>
<?php
echo session()->getFlashdata('error');
echo service('validation')->listErrors();
echo form_open('board/create');
echo csrf_field();
?>
<div class="form-group">
    <label for="exampleFormControlInput1">제목</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="" value="<?= set_value('title'); ?>">
</div>
<div class="form-group">
    <label for="exampleFormControlTextarea1">내용</label>
    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="10"><?= set_value('content'); ?></textarea>
</div>
<button type="submit" class="btn btn-primary">등록</button>
<?= form_close() ?>

<?= $this->endSection() ?>
