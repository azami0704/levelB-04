<?php
$table = "Goods";
$row = $$table->find($_GET['id']);
?>
<h2>編輯商品</h2>
<form action="./api/add_goods.php" method="post" id="add-goods" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <input type="hidden" name="table" value="<?= $table ?>">
                <select name="main">
                    <?php
                    $mains = $Th->all(['main' => 0]);
                    foreach ($mains as $main) {
                        $mainSelected=$main['id']==$row['main']?'selected':'';
                        echo "<option value='{$main['id']}' $mainSelected>{$main['name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="sub" id="sub">
                    <?php
                    if ($Th->count(['main' => $row['main']]) == 0) {
                        echo "<option value='' disable >無子分類</option>";
                    } else {
                        $subs = $Th->all(['main' => $row['main']]);
                        foreach ($subs as $sub) {
                            $subSelected=$sub['id']==$row['sub']?'selected':'';
                            echo "<option value='{$sub['id']}' $subSelected>{$sub['name']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                <?= $row['no'] ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" value="<?= $row['name'] ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" value="<?= $row['price'] ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec" value="<?= $row['spec'] ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" value="<?= $row['stock'] ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <input type="file" name="img">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea type="text" name="intro" style="width:270px;height:133px;resize:none;" ><?= $row['intro'] ?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">修改</button>
        <button type="reset">重置</button>
        <button type="button" onclick="re()">返回</button>
    </div>
</form>
<script>
        $('[name="main"]').change(function(){
        $.get("./api/get_data.php",{table:'<?=$table?>',main:$(this).val()})
        .done(res=>{
            let data=JSON.parse(res);
            let str='';
            $(data).each((_,item)=>{
                str+=`<<option value='${item.id}'>${item.name}</option>>`;
            })
            $('#sub').html(str);
        })
    })
    $('#add-goods').on('submit',function(e){
        e.preventDefault();
        formWithFiles.call(this);
    });
</script>