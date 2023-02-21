<h2 class="ct">訂單管理</h2>
<div class="wrap" style='margin:auto;width:90%;'>
    <table class="checkout pp">
        <tr>
            <td style='width:25%;' class="tt ct">訂單編號</td>
            <td style='width:15%;' class="tt ct">金額</td>
            <td style='width:15%;' class="tt ct">會員帳號</td>
            <td style='width:15%;' class="tt ct">姓名</td>
            <td style='width:15%;' class="tt ct">下單時間</td>
            <td class="tt ct">操作</td>
        </tr>
    <?php
    $table='Orders';
    $orders=$$table->all();
    foreach($orders as $order){
    ?>
        <tr class="ct" data-id="<?=$order['id']?>">
            <td>
                <a href="?do=order_detail&id=<?=$order['id']?>"><?=$order['no']?></a>
            </td>
            <td><?=$order['total']?></td>
            <td><?=$order['ac']?></td>
            <td><?=$order['name']?></td>
            <td><?=str_replace("-","/",$order['date'])?></td>
            <td>
                <button type="button" class="del-btn">刪除</button>
            </td>
        </tr>
        <?php
    }
        ?>
    </table>
</div>
<script>
        $('.del-btn').click(function(){
        let data={table:'<?=$table?>',id:$(this).closest('tr').data('id')};
        del.call(this,data);
    })

</script>



