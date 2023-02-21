<?php

// print_r($_SESSION);

if(!isset($_SESSION['member'])){
    to("?do=login");
}
if(!isset($_SESSION['cart'])){
?>
<h3>購物車是空的喔!</h3>
<div class="ct" style="padding: 8px;">
    <a href="?do=main"><img src="./icon/0411.jpg" alt=""></a>
</div>
<?php
}
if(isset($_SESSION['cart'])){
?>
<h2><?=$_SESSION['member']?>的購物車</h2>
<table style='margin:auto;width:90%;' class="cart-list">
    <tr class="tt ct">
        <td style='width:15%;'>編號</td>
        <td style='width:35%;'>商品名稱</td>
        <td style='width:10%;'>數量</td>
        <td style='width:10%;'>庫存量</td>
        <td style='width:10%;'>單價</td>
        <td style='width:10%;'>小計</td>
        <td style='width:10%;'>刪除</td>
    </tr>
    <?php
    $buyList=array_keys($_SESSION['cart']);
    foreach($buyList as $val){
        $good=$Goods->find($val);
        $qt=$_SESSION['cart'][$val];
        ?>
    <tr class="pp ct" data-id="<?=$good['id']?>">
        <td style='width:15%;'><?=$good['no']?></td>
        <td style='width:35%;'><?=$good['name']?></td>
        <td style='width:10%;'>
        <?=$qt?>
        </td>
        <td style='width:10%;'><?=$good['stock']?></td>
        <td style='width:10%;'><?=$good['price']?></td>
        <td style='width:10%;' class="qt"><?=$good['price']*$qt?></td>
        <td style='width:10%;'>
        <a href="#" class="del-btn">
            <img src="./icon/0415.jpg" alt="">
        </a>
        </td>
    </tr>
        <?php
    }
    ?>

</table>
<div class="ct" style="padding: 8px;">
    <a href="?do=main"><img src="./icon/0411.jpg" alt=""></a>
    <a href="?do=checkout" id="checkout"><img src="./icon/0412.jpg" alt=""></a>
</div>
<?php
}
?>
<script>
    $('.del-btn').click(function(){
        let data={table:'cart',id:$(this).closest('tr').data('id')};
        del.call(this,data);
    })


</script>



