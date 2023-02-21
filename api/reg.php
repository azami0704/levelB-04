<?php
include_once "./base.php";


$table=$_POST['table'];
$direct=strtolower($_POST['table']);
unset($_POST['table']);
if($direct=='goods'){
    $direct='th';
}


if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img']=$_FILES['img']['name'];
}

if(isset($_POST['pr'])){
    $_POST['pr']=serialize($_POST['pr']);
}

if(isset($_POST['total'])){
    $_POST['cart']=serialize($_SESSION['cart']);
    unset($_SESSION['cart']);
}


$$table->save($_POST);

?>