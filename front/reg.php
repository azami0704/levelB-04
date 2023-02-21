<h2>會員註冊</h2>
<?php
$table='Member';
$direct=strtolower($table);
?>
<form action="" method="post" id="reg">
    <table class="all">
        <tr>
            <input type="hidden" name="table" value="<?=$table?>">
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="text" name="ac" style="width:90%;">
                <button type="button" onclick="checkAcc()">檢測帳號</button>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="pw" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp">
                <input type="text" name="tel" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp">
                <input type="text" name="addr" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" style="width:90%;">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="table" value="<?=$table?>">
        <button type="submit">註冊</button>
        <button type="reset">重置</button>
    </div>
</form>
<script>
    $('#reg').submit(function(e){
    e.preventDefault();
    reg.call(this,'註冊成功','login');
})
</script>