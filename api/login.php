<?php
include_once "./base.php";

$table=$_POST['table'];
$mem=strtolower($_POST['table']);
unset($_POST['table']);

if(!isset($_POST['pw'])){
    echo $$table->count($_POST);
}else{
    if($$table->count($_POST)==1){
        $_SESSION[$mem]=$_POST['ac'];
    }
    echo $$table->count($_POST);
}

?>