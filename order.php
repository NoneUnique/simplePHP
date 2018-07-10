<?php
require 'init.php';
require 'user.php';
require './lib/page_function.php'; //引入分页函数库
if ($login) {
    $user_id = $userinfo['id'];
//函数：生成LIMIT SQL
    function make_limit_sql($page, $page_size) {
        if ($page < 1) {
            return 'limit 0,' . $page_size;
        } else
            return 'limit ' . (($page - 1) * $page_size) . ',' . $page_size;
    }

    $page_size = 9; //每页显示5条信息
    $page_count = db_fetch_column("select count(*) from `order` where user_id=$user_id "
            . "and id in (select DISTINCT orderdetail.order_id from orderdetail)"); //查询所有记录条数
    $page_max = ceil($page_count / $page_size); //计算最大页码值
    $page = (int) input_get('page'); //获取当前访问的页码
    $page = max($page, 1); //页码值最小为1
    $page = min($page, $page_max); //页码值最大为$max_page
    $page_html = makePageHtml($page, $page_max); //调用函数生成分页链接
    $limit_sql = make_limit_sql($page, $page_size); //拼接SQL


    $sql = "select o.id as order_id,o.*,a.*  from `order` o,`addr` a,`user` u "
            . " where a.id=o.addr_id and u.id=o.user_id  and u.id=$user_id and o.id "
            . "in(select DISTINCT orderdetail.order_id from orderdetail) "
            . "order by order_id asc $limit_sql";
    $order = db_fetch_all($sql);
    if (input_get('action') == 'recv') {
        $order_id = input_get('order_id');
        $sql = "select send from `order` where id = $order_id";
        $rst = mysql_query($sql);
        $sql = "update  `order` set recv = 1 where id = $order_id";
        db_query($sql);
        alert_back("已确认收货");
    }
    require './view/order_html.php';
}else{
     echo '<script>alert("未登录");location.href="index.php"</script>';
}

