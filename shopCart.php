<?php
require './init.php'; //项目初始化文件
require './user.php';
require './lib/page_function.php'; //引入分页函数库
if($login){
$id = (int) input_get('id') ;
$user_id = (int) input_get('user_id') ;
$sql = "select * from game where id = $id";
$rst = mysql_query($sql);
$shopInfo = mysql_fetch_assoc($rst);
$_SESSION['cart'][$id]  = $shopInfo;
$_SESSION['cart'][$id]['number'] =1;


//地址
//函数：生成LIMIT SQL
function make_limit_sql($page,$page_size){
    if($page<1){
        return 'limit 0,'.$page_size;
    }else
	return 'limit '.(($page-1)*$page_size).','.$page_size;
}
$user_id = $userinfo['id'];

$page_size = 2; //每页显示5条信息
$page_count = db_fetch_column("select count(*) from `addr` where user_id=$user_id"); //查询所有记录条数
$page_max = ceil($page_count/$page_size); //计算最大页码值
$page = (int)input_get('page'); //获取当前访问的页码
$page = max($page,1); //页码值最小为1
$page = min($page,$page_max); //页码值最大为$max_page
$page_html = makePageHtml($page,$page_max); //调用函数生成分页链接
$limit_sql = make_limit_sql($page,$page_size); //拼接SQL


$sql_addr = "select * from addr where user_id = $user_id $limit_sql";
$addr_list = db_fetch_all($sql_addr);
require './view/shopCart_html.php';
} else {
    alert_back("请先登录");
}