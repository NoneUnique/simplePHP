<?php

require './init.php'; //项目初始化文件
require './user.php';
require './lib/page_function.php'; //引入分页函数库
//函数：生成排序SQL

function make_sort_sql($order, $sort) {
    //允许排序的字段
    $fields = array('title', 'date', 'price');
    //判断$order是否存在于合法字段列表中
    if (in_array($order, $fields)) {
        //判断$sort是否为合法值
        if (in_array($sort, array('asc', 'desc'))) {
            return "order by `$order` $sort";
        }
    }
    return '';
}

////函数：生成搜索SQL
function make_search_sql($keyword) {
    $keyword = db_escape(filter($keyword));
    return "where  date like '%$keyword%'";
}

//函数：生成LIMIT SQL
function make_limit_sql($page, $page_size) {
    if ($page < 1) {
        return 'limit 0,' . $page_size;
    } else
        return 'limit ' . (($page - 1) * $page_size) . ',' . $page_size;
}

////排序功能
$order = input_get('order');
$order_sort = input_get('sort');
$order_sql = make_sort_sql($order, $order_sort);  //生成排序SQL
////搜索功能
$search = input_get('search');
$where_sql = $search ? make_search_sql($search) : '';

//分页功能
$page_size = 9; //每页显示5条信息
$page_count = db_fetch_column("select count(*) from game $where_sql"); //查询所有记录条数
$page_max = ceil($page_count / $page_size); //计算最大页码值
$page = (int) input_get('page'); //获取当前访问的页码
$page = max($page, 1); //页码值最小为1
$page = min($page, $page_max); //页码值最大为$max_page
$page_html = makePageHtml($page, $page_max); //调用函数生成分页链接
$limit_sql = make_limit_sql($page, $page_size); //拼接SQL
//准备SQL语句
$sql = "select * from game  $where_sql $order_sql $limit_sql";

//获取员工信息数据
$game_info = db_fetch_all($sql);
//echo $sql;
//加载视图页面，显示数据
require './view/game_html.php';


