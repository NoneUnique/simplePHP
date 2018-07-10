<?php
require 'init.php';
session_start();
$id = input_get('id');
$action = input_get('action');
if ($action=='del') {
    unset($_SESSION['cart'][$id]);
     echo "<script>location='shopCart.php';</script>";
}elseif($action=='delAll'){
    $_SESSION['cart']=array();
     echo "<script>location='shopCart.php';</script>";
}elseif($action=='add'){
    $_SESSION['cart'][$id]['number']++;
    if($_SESSION['cart'][$id]['number']>999) {
        $_SESSION['cart'][$id]['number']=999;
    }
     echo "<script>location='shopCart.php';</script>";
}elseif($action=='sub'){
    $_SESSION['cart'][$id]['number']--;
    if($_SESSION['cart'][$id]['number']<1){
        $_SESSION['cart'][$id]['number']=1;
    }
     echo "<script>location='shopCart.php';</script>";
}


