<?php
require 'init.php';
require 'user.php';
$addr_id = input_post("addr_id");
$user_id = $userinfo['id'];
$totalprice = input_get("totalprice");
if(empty($addr_id)){
  echo '<script>alert("前往添加收货地址");location.href="user_center.php?name=address"</script>';
}
if($totalprice==0){
    alert_back("购物车没有商品,请购买后再提交");
}else{
$sql_order = "insert into `order` (`user_id`,`ispay`,`totalprice`,`addr_id`) "
        . "values ($user_id,1,$totalprice,$addr_id)";
if(db_query($sql_order)){
    $order_id =db_fetch_row("select max(id) from `order`") ;
foreach ($_SESSION['cart'] as $cart ) {
    if(!empty($cart['id'])){
    $insert_order = "insert into `orderdetail` "
        . "(`user_id`,`order_id`,`number`,`game_id`,`addr_id`) values ('$user_id','{$order_id['max(id)']}','{$cart['number']}','{$cart['id']}','$addr_id')";
    db_query($insert_order);
    }
}
   unset($_SESSION['cart']);
     echo "<script>location='order.php';</script>";
}
}