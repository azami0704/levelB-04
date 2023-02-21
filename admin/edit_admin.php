<?php
$table = "Admin";
$row=$$table->find($_GET['id']);
?>
<h2>修改管理帳號</h2>
<form action="" method="post" id="edit-reg">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="hidden" name="id" value="<?=$row['id']?>">
                <input type="hidden" name="table" value="<?=$table?>">
                <input type="text" name="ac" value="<?=$row['ac']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="pw" value="<?=$row['pw']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">管理</td>
            <td class="pp">
                <?php
                $prList=unserialize($row['pr']);
                ?>
                <div><input type="checkbox" name="pr[]" value="1" <?=in_array(1,$prList)?'checked':''?>>商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2" <?=in_array(2,$prList)?'checked':''?>>訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3" <?=in_array(3,$prList)?'checked':''?>>會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4" <?=in_array(4,$prList)?'checked':''?>>頁尾版權區管理</div>
                <div><input type="checkbox" name="pr[]" value="5" <?=in_array(5,$prList)?'checked':''?>>最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">修改</button>
        <button type="reset">重置</button>
    </div>
</form>
<script>
    $('#edit-reg').submit(function(e){
    e.preventDefault();
    save.call(this,'admin',true,'修改成功');
})
</script>
