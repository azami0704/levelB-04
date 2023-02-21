<h2>第一次購物</h2>
<?php
$table='Member';
$direct=strtolower($table);
?>
<a href="?do=reg">
    <img src="./icon/0413.jpg" alt="">
</a>
<h2>會員登入</h2>
<form action="" method="post"id="login">
    <table class="all">
        <tr>
            <input type="hidden" name="table" value="<?=$table?>">
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="text" name="ac" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="pw" style="width:90%;">
            </td>
        </tr>
        <tr>
            <td class="tt ct">驗證碼</td>
            <td class="pp">
                <span id="captcha"></span>
                <input type="text" style="width:90%;" id="aws">
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">確認</button>
    </div>
</form>