<?php

$good=$Goods->find($_GET['id']);
?>
<h2><?=$good['name']?></h2>
<div class="goods-item pp">
    <div class="pic">
        <img src="./upload/<?=$good['img']?>" alt="" style='width:100%;margin:auto;'>
    </div>
    <table>
        <tr>
            <td>
                分類:<?=$Th->find($good['main'])['name']?>><?=$Th->find($good['sub'])['name']?>
            </td>
        </tr>
        <tr>
            <td>
                編號:<?=$good['no']?>
            </td>
        </tr>
        <tr>
            <td>價格:<?=$good['price']?></td>
        </tr>
        <tr>
            <td>詳細說明:<?=$good['intro']?></td>
        </tr>
        <tr>
            <td>庫存:<?=$good['stock']?></td>
        </tr>
    </table>
</div>
<div class="tt info-footer">
    購買數量:
<input type="number" name="stock" value="1" style="width:50px;">
<a href="#" style='float:right;' class="buy-btn"><img src='./icon/0402.jpg'></a>
</div>
<div class="ct">
    <button type="button" onclick="re()">返回</button>
</div>
<script>
    $('.buy-btn').click(function(e){
        let num=$(this).prev().val();
        location.href=`./api/cart.php?id=<?=$good['id']?>&num=${num}`;
    })
</script>

