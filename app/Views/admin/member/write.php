<?= $this->extend('admin/layout/master') ?>
<?= $this->section('content') ?>
<h1 class="page-header">회원등록</h1>
<?= form_open() ?>
<?= csrf_field() ?>
<div class="table">
    <table class="table">
        <tr>
            <td class="col-md-2 bg-info ">이메일</td>
            <td class="col-md-4 <?php if(isset($errors['email'])) : ?>has-error<?php endif; ?>">
                <input type="email" name="email" class="form-control"  placeholder="이메일" value="<?= set_value('email') ?>"><span class="text-left"><?= isset($errors['email'])? $errors['email']:'' ?></span>
            </td>
            <td class="col-md-2 bg-info">이름</td>
            <td class="col-md-4 <?php if(isset($errors['name'])) : ?>has-error<?php endif; ?>">
                <input type="text" name="name" class="form-control"  placeholder="이름" value="<?= set_value('name') ?>"><?= isset($errors['name'])? $errors['name']:'' ?>
            </td>
        </tr>
        <tr>
            <td class="col-md-2 bg-info">비밀번호</td>
            <td class="col-md-4 <?php if(isset($errors['password'])) : ?>has-error<?php endif; ?>">
                <input type="password" name="password" class="form-control"  placeholder="비밀번호" value="<?= set_value('password') ?>"><?= isset($errors['password'])? $errors['password']:'' ?>
            </td>
            <td class="col-md-2 bg-info">비밀번호 확인</td>
            <td class="col-md-4 <?php if(isset($errors['password_confirm'])) : ?>has-error<?php endif; ?>">
                <input type="password" name="password_confirm" class="form-control"  placeholder="비밀번호 확인" value="<?= set_value('password_confirm') ?>"><?= isset($errors['password_confirm'])? $errors['password_confirm']:'' ?>
           </td>
        </tr>
        <tr>
            <td class="col-md-2 bg-info">우편번호</td>
            <td class="col-md-10" colspan="3" ><input type="text" name="zipcode" class="form-control" placeholder="우편번호" style="width: 100px"></td>
        </tr>
        <tr style="border-bottom: gray solid 1px">
            <td class="col-md-2 bg-info">주소</td>
            <td class="col-md-4">
                <input type="text" name="address" class="form-control"  placeholder="주소">
            </td>
            <td class="col-md-2 bg-info">상세주소</td>
            <td class="col-md-4">
                <input type="text" name="address_detail" class="form-control"  placeholder="주소 상세">
            </td>
        </tr>
    </table>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="text-center">
           <input type="submit" class="btn btn-default" value="등록">
        </div>
    </div>
</div>
<?= form_close() ?>
<?= $this->endSection() ?>