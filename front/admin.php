<?php
$table='Admin';
$direct=strtolower($table);
?>
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
