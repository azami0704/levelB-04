<?php
$table = "Goods";
?>
<h2>新增商品</h2>
<form action="./api/add_goods.php" method="post" id="add-goods" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <input type="hidden" name="no" value="<?=rand(100000,999999)?>">
                <input type="hidden" name="table" value="<?=$table?>">
                <select name="main" >
                    <?php
                    $mains=$Th->all(['main'=>0]);
                    foreach($mains as $main){
                        echo "<option value='{$main['id']}'>{$main['name']}</option>";
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
                    if($Th->count(['main'=>$Th->min('id',1)])==0){
                        echo "<option value='' disable >無子分類</option>";
                    }else{
                        $subs=$Th->all(['main'=>$Th->min('id',1)]);
                        foreach($subs as $sub){
                            echo "<option value='{$sub['id']}'>{$sub['name']}</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                完成分類後自動分類
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock">
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
                <textarea type="text" name="intro" style="width:270px;height:133px;resize:none;"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <button type="submit">新增</button>
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
    })
</script>
