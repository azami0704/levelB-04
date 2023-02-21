<?php
$table='Orders';
if(!isset($_SESSION['member'])){
    to("?do=login");
}
if(!isset($_SESSION['cart'])){
    echo "購物內無商品";
}
if(isset($_SESSION['cart'])){
    $user=$Member->find(['ac'=>$_SESSION['member']]);
?>
<h2 class="ct">填寫資料</h2>
<div class="wrap" style='margin:auto;width:90%;'>
<form action="" id='checkout-form'>
<table class="checkout pp">
    <tr>
        <input type="hidden" name="no" value="<?=date("Ymd").rand(100000,999999)?>">
        <input type="hidden" name="table" value="<?=$table?>">
        <input type="hidden" name="ac" value="<?=$user['ac']?>">
        <td style='width:30%;' class="tt ct">登入帳號</td>
        <td><?=$user['ac']?></td>
    </tr>
    <tr>
        <td style='width:30%;' class="tt ct">姓名</td>
        <td>
            <input type="text" name="name" value="<?=$user['name']?>">
        </td>
    </tr>
    <tr>
        <td style='width:30%;' class="tt ct">電子信箱</td>
        <td>
            <input type="text" name="email" value="<?=$user['email']?>">
        </td>
    </tr>
    <tr>
        <td style='width:30%;' class="tt ct">聯絡地址</td>
        <td>
            <input type="text" name="addr" value="<?=$user['addr']?>">
        </td>
    </tr>
    <tr>
        <td style='width:30%;' class="tt ct">聯絡電話</td>
        <td>
            <input type="text" name="tel" value="<?=$user['tel']?>">
        </td>
    </tr>
</table>
<table style='width: 100%;'>
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    $buyList=array_keys($_SESSION['cart']);
    $total=0;
    foreach($buyList as $val){
        $good=$Goods->find($val);
        $qt=$_SESSION['cart'][$val];
        $total+=$good['price']*$qt;
            ?>
        <tr class="pp ct">
            <td><?=$good['name']?></td>
            <td><?=$good['no']?></td>
            <td><?=$qt?></td>
            <td><?=$good['price']?></td>
            <td><?=$good['price']*$qt?></td>
        </tr>
    <?php
    }
    ?>
</table>
<input type="hidden" name="total" value="<?=$total?>">
<div class="tt ct">總價:<?=$total?></div>
<div class="ct" style="padding: 8px;">
    <button type="submit">確定送出</button>
    <button type="button" onclick="lof('?do=cart')">返回修改訂單</button>
</div>
</form>
</div>
<?php
}
?>
<script>
    $('#checkout-form').submit(function(e){
        e.preventDefault();
        save.call(this,'main',true,'訂購成功\n感謝你的選購');
    })
</script>



