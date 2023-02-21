<?php
$table = "Admin";
?>
<h2>新增管理帳號</h2>
<form action="" method="post" id="admin-reg">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="hidden" name="table" value="<?=$table?>">
                <input type="text" name="ac">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="pw">
            </td>
        </tr>
        <tr>
            <td class="tt ct">管理</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4">頁尾版權區管理</div>
                <div><input type="checkbox" name="pr[]" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">新增</button>
        <button type="reset">重置</button>
    </div>
</form>
<script>
    $('#admin-reg').submit(function(e){
    e.preventDefault();
    save.call(this,'admin',true,'新增成功');
})
</script>