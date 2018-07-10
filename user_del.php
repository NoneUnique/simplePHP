<?php
require './init.php'; //项目初始化文件
$table = input_get('table');
$id = (int) input_get('addid');
if($table=='addr') {
    $sql = "update addr set user_id = null where id = $id";
    db_query($sql);
    header('Location:user_center.php?name=address');
}elseif($table=='order'){
      $sql = "update `order` set user_id = null where id = $id";
      db_query($sql);
    header('Location:order.php');
}

