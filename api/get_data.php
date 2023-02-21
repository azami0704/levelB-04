<?php
include_once "./base.php";


$table=$_GET['table'];
$direct=strtolower($_GET['table']);


echo json_encode($Th->all(['main'=>$_GET['main']]));