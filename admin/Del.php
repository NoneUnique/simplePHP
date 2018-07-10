<?php
require './init.php'; //项目初始化文件
$table = input_get('table');
function del($table,$id){
    $sql = "delete from $table where  $id";
    db_query($sql);
}
if($table == 'user'){
    $user_id = input_get('user_id');
    del("`user`", "id = $user_id");
    del("`order`", "user_id = $user_id");
    del("orderdetail", "user_id = $user_id");
    del("addr", "user_id = $user_id");
    alert_back("删除成功");
}elseif($table=='game'){
    $game_id = input_get('game_id');
     del($table, "id = $game_id");
    alert_back("删除成功");
}elseif($table=='news'){
    $news_id = input_get('news_id');
     del($table, "id = $news_id");
    alert_back("删除成功");
}elseif($table=='order'){
    $order_id = input_get('orderid');
     del("`order`", "`id` = $order_id");
     del('orderdetail', "order_id = $order_id");
    alert_back("删除成功");
}


