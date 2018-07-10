<?php

header('Content-Type:text/html;charset=utf-8');
require './init.php'; //项目初始化文件
require './user.php';
require './lib/page_function.php'; //引入分页函数库
$user_msg = array();
if ($login) {
    $user_id = $userinfo['id'];
    $sql = "select * from user where id = $user_id";
    $user_msg = db_fetch_all($sql);
    //user_info处理
    if (input_get('name') == 'user') {
        if ($_POST) {
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
                header('Location: user_center.php?name=user' . alert_back("修改成功"));
                die;
            } else {
                alert_back('信息修改失败');
            }
        }
        require './view/user_info.php';
    }
    if (input_get('name') == 'address') {

        //函数：生成LIMIT SQL
        function make_limit_sql($page, $page_size) {
            if ($page < 1) {
                return 'limit 0,' . $page_size;
            } else
                return 'limit ' . (($page - 1) * $page_size) . ',' . $page_size;
        }

//分页功能
        $page_size = 9; //每页显示5条信息
        $page_count = db_fetch_column("select count(*) from addr where user_id=$user_id"); //查询所有记录条数
        $page_max = ceil($page_count / $page_size); //计算最大页码值
        $page = (int) input_get('page'); //获取当前访问的页码
        $page = max($page, 1); //页码值最小为1
        $page = min($page, $page_max); //页码值最大为$max_page
        $page_html = makePageHtml($page, $page_max); //调用函数生成分页链接
        $limit_sql = make_limit_sql($page, $page_size); //拼接SQL
        $sql = "select * from addr where user_id = $user_id $limit_sql";
        $user_addr = db_fetch_all($sql);
        if ($_POST) {
            //定义允许的字段
            $allow_fields = array('name', 'phone', 'address');
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
            $addr_id = input_post('addid');
            $sql = "update addr set $update_sql where id = $addr_id and user_id = $user_id";
            if ($res = db_query($sql)) {
                header('Location: user_center.php?name=address' . alert_back("修改成功"));
                die;
            } else {
                alert_back('信息修改失败');
            }
        }
        require './view/user_address.php';
    }
} else {
    echo '<script>alert("未登录");location.href="index.php"</script>';
}
