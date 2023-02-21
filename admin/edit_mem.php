<?php
$table = "Member";
$row=$$table->find($_GET['id']);
?>
<h2>修改會員帳號</h2>
<form action="" method="post" id="edit-mem">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="hidden" name="table" value="<?=$table?>">
                <?=$row['ac']?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?=str_repeat('*',strlen($row['pw']))?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" value="<?=$row['name']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" value="<?=$row['email']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp">
                <input type="text" name="addr" value="<?=$row['addr']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp">
                <input type="text" name="tel" value="<?=$row['tel']?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">編輯</button>
        <button type="reset">重置</button>
        <button type="button" onclick="history.go(-1)">取消</button>
    </div>
</form>
<script>
    $('#edit-mem').submit(function(e){
    e.preventDefault();
    save.call(this,'member',true,'修改成功');
})
</script>
