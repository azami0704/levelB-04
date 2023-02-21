<?php


?>
<h2 class="ct">訂單管理</h2>
<div class="wrap" style='margin:auto;width:90%;'>
    <table class="checkout pp">
    <?php
    $table='Orders';
    $order=$$table->find($_GET['id']);
    ?>
        <tr>
            <td style='width:30%;' class="tt ct">會員帳號</td>
            <td><?=$order['ac']?></td>
        </tr>
        <tr>
            <td style='width:30%;' class="tt ct">姓名</td>
            <td>
                <input type="text" name="name" value="<?=$order['name']?>">
            </td>
        </tr>
        <tr>
            <td style='width:30%;' class="tt ct">電子信箱</td>
            <td>
                <input type="text" name="email" value="<?=$order['email']?>">
            </td>
        </tr>
        <tr>
            <td style='width:30%;' class="tt ct">聯絡地址</td>
            <td>
                <input type="text" name="addr" value="<?=$order['addr']?>">
            </td>
        </tr>
        <tr>
            <td style='width:30%;' class="tt ct">聯絡電話</td>
            <td>
                <input type="text" name="tel" value="<?=$order['tel']?>">
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
        $cartList=unserialize($order['cart']);
        $goodList=array_keys($cartList);
        foreach($goodList as $val){
            $goods=$Goods->find($val);
                ?>
            <tr class="pp ct">
                <td><?=$goods['name']?></td>
                <td><?=$goods['no']?></td>
                <td><?=$cartList[$val]?></td>
                <td><?=$goods['price']?></td>
                <td><?=$goods['price']*$cartList[$val]?></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="tt ct">總價:<?=$order['total']?></div>
    <div class="ct" style="padding: 8px;">
        <button type="button" onclick="lof('?do=order')">返回</button>
    </div>
</div>
<script>

</script>



