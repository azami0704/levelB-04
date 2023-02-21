<?php
if(!empty($_POST)){
    $Bottom->save(['text'=>$_POST['text'],'id'=>1]);
}
?>

<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bottom" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="text" value="<?=$Bottom->find(1)['text']?>" style="width:90%;">
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">編輯</button>
        <button type="reset">重置</button>
    </div>
</form>