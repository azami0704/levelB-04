<?php
include_once "base.php";


if(isset($_SESSION['cart'][$_GET['id']])){
    $_SESSION['cart'][$_GET['id']]+=$_GET['num'];
}else{
    $_SESSION['cart'][$_GET['id']]=$_GET['num'];
}

if(!isset($_SESSION['member'])){
    to("../index.php?do=login");
}else{
    to("../index.php?do=cart");
}

?>