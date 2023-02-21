<?php
$cate=$_GET['cate']??0;
if($cate==0){
    $goods=$Goods->all(['sh'=>1]);
    $nav='全部商品';
}else{
    $isMain=($Th->find($cate)['main'])==0?1:0;
    if($isMain){
        $goods=$Goods->all(['main'=>$cate,'sh'=>1]);
        $nav=$Th->find($cate)['name'];
    }else{
        $goods=$Goods->all(['sub'=>$cate,'sh'=>1]);
        $sub=$Th->find($cate);
        $main=$Th->find($sub['main'])['name'];
        $nav="$main>{$sub['name']}";
    }
}

?>
<h2><?=$nav?></h2>
<div class="wrap">
<?php
foreach ($goods as $good){
?>
            <div class="goods-item pp">
                <div class="pic">
                    <a href='?do=info&id=<?=$good['id']?>'>
                    <img src="./upload/<?=$good['img']?>" alt="" style='width:200px;margin:auto;'>
                </a>
                </div>
                <table>
                    <tr class="tt ct">
                        <td>
                            <?=$good['name']?>
                        </td>
                    </tr>
                    <tr>
                        <td>價格:<?=$good['price']?><a href='./api/cart.php?id=<?=$good['id']?>&num=1' style='float:right;'><img src='./icon/0402.jpg'></a></td>
                    </tr>
                    <tr>
                        <td>規格:<?=$good['spec']?></td>
                    </tr>
                    <tr>
                        <td>簡介:<?=$good['intro']?></td>
                    </tr>
                </table>
            </div>
            <?php
}
?>
</div>