<?php
$table = "Th";

?>
<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big">
    <button type="text" id="add-main-btn">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="" id="big_list">
        <?php
        $ths = $$table->all(['main' => 0]);
        foreach ($ths as $th) {
            echo "<option value='{$th['id']}'>{$th['name']}</option>";
        }
        ?>
    </select>
    <input type="text" name="mid">
    <button type="text" id="add-mid-btn">新增</button>
</div>
<form action="">
    <table class="all">
        <?php
        
        $rows = $$table->all(['main' => 0]);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="tt ct"><?= $row['name'] ?></td>
                <td class="tt ct">
                    <button type="button" class="edit-th-btn" data-id='<?= $row['id'] ?>'>修改</button>
                    <button type="button" onclick="lof('./api/del_mem.php?table=<?=$table?>&id=<?=$row['id']?>&main=<?=$row['id']?>')">刪除</button>
                </td>
            </tr>
            <?php
            if($$table->count(['main' => $row['id']])!=0){
            $subs = $$table->all(['main' => $row['id']]);
            foreach ($subs as $sub) {
            ?>
                <tr>
                    <td class="tt pp ct"><?= $sub['name'] ?></td>
                    <td class="tt pp ct">
                        <button type="button" class="edit-th-btn" data-id='<?= $sub['id'] ?>'>修改</button>
                        <button type="button" onclick="lof('./api/del_mem.php?table=<?=$table?>&id=<?=$sub['id']?>')">刪除</button>
                    </td>
                </tr>
        <?php
            }
        }}
        ?>
    </table>
</form>
<h2 class="ct">商品管理</h2>
<button type="text" onclick="lof('?do=add_goods')">新增商品</button>
<table class="all">
    <tr class="tt ct">
        <td style="min-width:30%;">編號</td>
        <td style="min-width:30%;">商品</td>
        <td style="min-width:10%;">庫存</td>
        <td style="min-width:20%;">狀態</td>
        <td style="min-width:20%;">操作</td>
    </tr>
    <?php
    $goods=$Goods->all();
    foreach($goods as $good){
        ?>
        <tr class="pp ct" data-id="<?=$good['id']?>">
        <td><?=$good['no']?></td>
        <td><?=$good['name']?></td>
        <td><?=$good['stock']?></td>
        <td><?=$good['sh']==1?'販售中':'已下架'?></td>
        <td style="display:flex;flex-wrap:wrap;">
            <button type="button" style="width:40px;padding:1px;" onclick="lof('?do=edit_goods&table=Goods&id=<?=$good['id']?>')">修改</button>
            <button style="width:40px;padding:1px;" type="button" onclick="lof('./api/del_mem.php?table=Goods&id=<?=$good['id']?>')">刪除</button>
            <button type="button" style="width:40px;padding:1px;" onclick="on(this)">上架</button>
            <button type="button" style="width:40px;padding:1px;" onclick="off(this)">下架</button>
        </td>
    </tr> 
        <?php
    }
    ?>
</table>
<script>
    let data = {};
    function addTh(name) {
    data['table'] = '<?= $table ?>';
    data['name'] = name||$(this).prev().val();
    $.post("./api/reg.php", data)
        .done((res) => {
            location.reload();
        })
    }

    function editTh(id,name){
        data['id']=id;
        addTh(name);
    }


    $('#add-main-btn').on('click', function(){
        addTh.call(this);
    });
    
    $('#add-mid-btn').on('click', function() {
        data = {};
        data['main'] = $('#big_list').val();
        addTh.call(this);
    });

    $('.edit-th-btn').on('click',function(){
        const id=$(this).data('id');
        const name=prompt('請輸入分類名稱',$(this).parent().prev().text());
        name && editTh(id,name);
    })
    function changeState(id,sh){
        data['table']="Goods";
        data['id']=id;
        data['sh']=sh;
        $.post("./api/reg.php",data)
        .done(res=>{
            location.reload();
        })
    }

    function on(dom){
        changeState($(dom).closest('tr').data('id'),1);
    }

    function off(dom){
        changeState($(dom).closest('tr').data('id'),0);
    }
</script>