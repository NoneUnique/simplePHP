<?php
header('Content-Type:text/html;charset=utf-8');
require './init.php'; //项目初始化文件
require './user.php';
//函数：生成LIMIT SQL
function make_limit_sql($page,$page_size){
	return 'limit '.(($page-1)*$page_size).','.$page_size;
}
//分页功能
$page_size = 6; //每页显示5条信息
//准备SQL语句
$sql_game = "select * from game  limit 6";
$sql_news = "select * from news   limit 5";
//获取员工信息数据
$game_info = db_fetch_all($sql_game);
$news_info = db_fetch_all($sql_news);


require './view/index_html.php';