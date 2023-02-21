<?php
$table="Admin";

?>
<button type="button" onclick="lof('?do=new_admin')">新增管理員</button>
<form action="" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="tt ct">密碼</td>
            <td class="tt ct">管理</td>
        </tr>
        <?php
        $rows=$$table->all();
        foreach($rows as $row){
            ?>
            <tr>
            <td class="pp ct">
                <?=$row['ac']?>
            </td>
            <td class="pp ct">
                <?=str_repeat('*',strlen($row['pw']));?>
            </td>
            <td class="pp ct">
                <?php
                if($row['ac']!='admin'){
                    ?>
                    <button type="button" onclick="lof('?do=edit_admin&id=<?=$row['id']?>')">修改</button>
                     <button type="button" onclick="lof('./api/del_mem.php?table=<?=$table?>&id=<?=$row['id']?>')">刪除</button>
                    <?php
                }else{
                    ?>
                    此帳號為最高權限
                    <?php
                }
                ?>
            </td>
        </tr>
            <?php
        }
        ?>

    </table>
</form>