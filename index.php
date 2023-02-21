<?php
include_once "./api/base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/js.js"></script>
</head>

<body>
        <iframe name="back" style="display:none;"></iframe>
        <div id="main">
                <div id="top">
                        <a href="index.php">
                                <img src="./icon/0416.jpg" style='width:45%;'>
                        </a>
                        <div style="padding:10px;float:right;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=cart">購物車</a> |
                                <?php
                                if (!isset($_SESSION['member'])) {
                                ?>
                                        <a href="?do=login">會員登入</a> |
                                <?php
                                } else {
                                ?>
                                        <a href="./api/logout.php?do=logout&table=member" style="color:#f00;">會員登出</a>
                                <?php
                                }
                                if (!isset($_SESSION['admin'])) {
                                ?>
                                        <a href="?do=admin">管理登入</a> |
                                <?php
                                } else {
                                ?>
                                        <a href="admin.php">返回管理後台</a> |
                                <?php
                                }
                                ?>
                        </div>
                        <marquee behavior="" direction="">年終特賣會開跑了&nbsp;&nbsp;情人節特惠活動</marquee>
                        <!-- 情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~ -->
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <a href="?do=goods&cate=0">全部商品(<?=$Goods->count(['sh'=>1])?>)</a>
                        <?php
                        $mains=$Th->all(['main'=>0]);
                        foreach($mains as $main){
                                $goodsNum=$Goods->count(['main'=>$main['id']]);
                                echo "<div class='main-btn'><a href='?do=goods&cate={$main['id']}'>{$main['name']}($goodsNum)</a>";
                                $subs=$Th->all(['main'=>$main['id']]);
                                echo "<div class='sub'>";
                                foreach($subs as $sub){
                                        $goodsNum=$Goods->count(['sub'=>$sub['id']]);
                                        echo "<a href='?do=goods&cate={$sub['id']}'>{$sub['name']}($goodsNum)</a>";
                                }
                                echo "</div>";
                                echo "</div>";
                        }
                        
                        ?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                        <?php
                        $do = $_GET['do'] ?? 'main';
                        $file = "./front/$do.php";
                        if (file_exists($file)) {
                                include $file;
                        } else {
                                include "./front/main.php";
                        }
                        ?>
                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        <?= $Bottom->find(1)['text'] ?> </div>
        </div>
        <script src="./js/all.js"></script>
        <script>
                $('.main-btn').children().children().hide();
                $('.main-btn').hover(function(){
                        $(this).children().children().show();
                },function(){
                        $('.main-btn').children().children().hide();
                })
        </script>
</body>

</html>