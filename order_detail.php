<?php
header('Content-Type:text/html;charset=utf-8');
require './init.php'; //项目初始化文件
require './user.php';
if($login){
$user_id = $userinfo['id'];
$order_id = input_get('order_id');
$sql = "SELECT o.id,g.title,g.id,g.price,o.totalprice,od.number FROM"
        . " `order` o,game g,`user` u,addr a,orderdetail od "
        . "WHERE u.id=od.user_id and o.id=od.order_id and g.id=od.game_id and a.id=od.addr_id "
        . "and u.id=$user_id and o.id=$order_id";
$orderdetail = db_fetch_all($sql);
$sql = "select totalprice from `order` where id = $order_id";
$totalprice = db_fetch_row($sql);
require './view/order_detail_html.php';
}else{
    alert_back("请登录后再操作");
}