<?php
$table="Member";
$direct=strtolower($table);
?>
<button type="button" onclick="lof('?do=new_admin')">新增管理員</button>
<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">姓名</td>
            <td class="tt ct">會員帳號</td>
            <td class="tt ct">註冊日期</td>
            <td class="tt ct">操作</td>
        </tr>
        <?php
        $rows=$$table->all();
        foreach($rows as $row){
            ?>
            <tr>
            <td class="pp ct">
                <?=$row['name']?>
            </td>
            <td class="pp ct">
                <?=$row['ac']?>
            </td>
            <td class="pp ct">
                <?=str_replace('-','/',$row['reg_date'])?>
            </td>
            <td class="pp ct">
                <button type="button" onclick="lof('?do=edit_mem&id=<?=$row['id']?>')">修改</button>
                <button type="button" onclick="lof('./api/del_mem.php?table=<?=$table?>&id=<?=$row['id']?>')">刪除</button>
            </td>
        </tr>
            <?php
        }
        ?>

    </table>
</form>
