<?php

require './init.php'; //项目初始化文件
require './../lib/page_function.php';
//if($admin_login){
$table = input_get('table');

//函数：生成排序SQL
function make_sort_sql($order, $sort) {
    //允许排序的字段
    $fields = array('date','title','price','artical','address','username');
    //判断$order是否存在于合法字段列表中
    if (in_array($order, $fields)) {
        //判断$sort是否为合法值
        if (in_array($sort, array('asc', 'desc'))) {
            return "order by `$order` $sort";
        }
    }
    return '';
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

if (empty($table)) $table = 'user';
//分页功能
$page_size = 5; //每页显示5条信息
$page_count = db_fetch_column("select count(*) from `$table`"); //查询所有记录条数
$page_max = ceil($page_count / $page_size); //计算最大页码值
$page = (int) input_get('page'); //获取当前访问的页码
$page = max($page, 1); //页码值最小为1
$page = min($page, $page_max); //页码值最大为$max_page
$page_html = makePageHtml($page, $page_max); //调用函数生成分页链接
$limit_sql = make_limit_sql($page, $page_size); //拼接SQL


if (input_get('table') == 'user') {//用户版块
    $sql = "select * from user $order_sql $limit_sql";
    $info = db_fetch_all($sql);
    if ($_POST) {
        $user_id = input_post('user_id');
        //定义允许的字段
        $allow_fields = array('username', 'phone', 'email', 'address');
        //获取用户更新数据表单
        $update = array();
        foreach ($allow_fields as $v) {
            $data = input_post($v); //接收$_POST数据
            $data = db_escape(filter($data)); //数据过滤
            if ($data == '') {
                alert_back($v . '字段不能为空');
            }
            //把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
            $update[] = "`$v`='$data'";
        }
        //把$update数组元素使用逗号连接
        $update_sql = implode(',', $update);
        $sql = "update user set $update_sql where id=$user_id";

        if ($res = db_query($sql)) {
            alert_back($sql);
            header('Location: test.php?table=user' . alert_back("修改成功"));
            die;
        } else {
            alert_back('信息修改失败');
        }
    }
    require './view/user_edit.php';
}
if (input_get('table') == 'game') {//游戏板块
    $sql = "select * from game  $order_sql $limit_sql";
    $info = db_fetch_all($sql);
    if ($_POST) {
        $game_id = input_post('game_id');
        //定义允许的字段
        $allow_fields = array('price', 'describe', 'date', 'title');
        //获取用户更新数据表单
        $update = array();
        foreach ($allow_fields as $v) {
            $data = input_post($v); //接收$_POST数据
            $data = db_escape(filter($data)); //数据过滤
            if ($data == '') {
                alert_back($v . '字段不能为空');
            }
            //把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
            $update[] = "`$v`='$data'";
        }
        //上传图片
        if (!empty($_FILES['image'])) {
            $pic_info = $_FILES['image'];
            $pic_name = $_FILES['image']['name'];
            $ext = substr(strrchr($pic_name, '.'), 1);
            $new_file = $game_id . '.' . $ext; //命名图像
            $filename = './../images/game' . $new_file; //图像保存路径
            if (!move_uploaded_file($pic_info['tmp_name'], $filename)) {
                alert_back('图片上传失败');
                return FALSE;
            }
        }
        $image_str = "'$new_file'";
        //把$update数组元素使用逗号连接
        $update_sql = implode(',', $update);
        $sql = "update game set $update_sql,image=$image_str where id=$game_id";
        if ($res = db_query($sql)) {
             echo '<script>alert("提交成功！");location.href="test.php?table=game"</script>';
        } else {
            alert_back('信息修改失败');
        }
    }
    require './view/game_edit.php';
}
if (input_get('table') == 'news') {//新闻版块
    $sql = "select * from news $order_sql $limit_sql";
    $info = db_fetch_all($sql);
    if ($_POST) {
        //定义允许的字段
        $allow_fields = array('title', 'artical', 'date');
        //获取用户更新数据表单
        $update = array();
        foreach ($allow_fields as $v) {
            $data = input_post($v); //接收$_POST数据
            $data = db_escape(filter($data)); //数据过滤
            if ($data == '') {
                alert_back($v . '字段不能为空');
            }
            //把键和值按照sql更新语句中的语法要求连接，并存入到$update数组中
            $update[] = "`$v`='$data'";
        }
        //把$update数组元素使用逗号连接
        $update_sql = implode(',', $update);
        $news_id = input_post('news_id');
        if (!empty($_FILES['image'])) {
            $pic_info = $_FILES['image'];
            $pic_name = $_FILES['image']['name'];
            $ext = substr(strrchr($pic_name, '.'), 1);
            $new_file = $news_id . '.' . $ext; //命名图像
            $filename = './../images/news/' . $new_file; //图像保存路径
            if (!move_uploaded_file($pic_info['tmp_name'], $filename)) {
                alert_back('图片上传失败');
                return FALSE;
            }
        }
        $image_str = " '$new_file'";
        $sql = "update news set $update_sql ,image=$image_str where id = $news_id";
        if ($res = db_query($sql)) {
             echo '<script>alert("提交成功！");location.href="test.php?table=news"</script>';
            die;
        } else {
            alert_back('信息修改失败');
        }
    }
    require './view/news_edit.php';
}
if (input_get('table') == 'order') {//订单版块
    $uid = input_get('user_id');
    if (!empty($uid))
        $usere = "and u.id = $uid";
    else
        $usere = '';
    
    $sql = "select DISTINCT o.id AS order_id ,o.*,a.`name`,a.address,a.phone,u.username,u.id as user_id,od.addr_id "
            . "FROM `order` o,addr a,`user` u ,orderdetail od "
            . "where o.addr_id=a.id  "
            . "and od.addr_id=o.addr_id and od.user_id=u.id and od.addr_id=a.id  $usere  "
            . "and o.id in (select DISTINCT orderdetail.order_id from orderdetail) order by order_id asc $limit_sql";

    $info = db_fetch_all($sql);
    if (input_get('action') == 'send') {
        $order_id = input_get('order_id');
        $sql = "update  `order` set send = 1 where id = $order_id";
        db_query($sql);
        alert_back("已确认收货");
    }
    require './view/order_edit.php';
}
//}  
require_once './view/admin_navbar.php';
