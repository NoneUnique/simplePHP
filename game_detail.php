<?php
require './user.php';
require './init.php'; //项目初始化文件
$id = (int)input_get('id');
$sql = "select * from game where id=$id";
$game_detail = db_fetch_all($sql);
 //加载视图页面，显示数据
define('APP', 'itcast');
require './view/game_details_html.php';