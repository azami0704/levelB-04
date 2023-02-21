<?php
include_once "./base.php";

if(isset($_GET['table'])){
    $table=$_GET['table'];
    $direct=strtolower($_GET['table']);
    if($direct=='goods'){
        $direct='th';
    }
    if($_GET['main']){
        $$table->del(['main'=>$_GET['main']]);
    }
    $$table->del($_GET['id']);
    to("../admin.php?do=$direct");
}

if($_POST['table']=='cart'){
    unset($_SESSION['cart'][$_POST['id']]);
}

if($_POST['table']=='Orders'){
    $table=$_POST['table'];
    $$table->del($_POST['id']);
}

?>