<?php

header('Content-Type:text/html;charset=utf-8');
require './init.php'; //项目初始化文件
$error = array(); //保存错误信息
error_reporting(E_ALL ^ E_DEPRECATED);
//当有表单提交时
if (!empty($_POST)) {

    //接收用户登录表单
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    //载入表单验证函数库，验证用户名和密码格式
    require './lib/check_form.lib.php';
    if (($result = checkUsername($username)) !== true)
        $error[] = $result;
    if (($result = checkPassword($password)) !== true)
        $error[] = $result;

    //表单验证通过，再到数据库中验证
    if (empty($error)) {
//SQL转义
        $username = mysql_real_escape_string($username);

        //根据用户名取出用户信息
        $sql = "select `id`,`password`,salt from `user` where `username`='$username'";
        if ($rst = mysql_query($sql)) {           //执行SQL，获得结果集
            $row = mysql_fetch_assoc($rst);     //处理结果集
            //计算密码的MD5
            $password = md5($row['salt'] . md5($password));
            //判断密码是否正确
            if ($password == $row['password']) {
                //判断用户是否勾选记住密码
                if (isset($_POST['auto_login']) && $_POST['auto_login'] == 'on') {
                    $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
                    $password_cookie = md5($row['password'] . md5($ua . $row['salt']));
                    $cookie_expire = time() + 2592000;
                    setcookie('username', $username, $cookie_expire);
                    setcookie('password', $password, $cookie_expire);
                }
                //欢迎登录！
                //登录成功，保存用户会话
                session_start();
                $_SESSION['userinfo'] = array(
                    'id' => $row['id'], //将用户id保存到SESSION
                    'username' => $username  //将用户名保存到SESSION
                );

                //登录成功，跳转到会员中心
                alert_back("登录成功");

                //终止脚本继续执行
                die;
            }
        }
        if($password!=$row['password'] ) alert_back("密码错误");
        $error = '用户名不存在或密码错误。';
        alert_back($error);
    }
}
//当Cookie存在登录状态时
if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];


    $username = mysql_real_escape_string($username);

    $sql = "select id, password, salt from user where username = $username";
    if ($rst = mysql_query($sql)) {
        $row = mysql_fetch_assoc($rst);
        //计算COOKIE密码
        $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
        $password_cookie = md5($row['password'] . md5($ua . $row['salt']));

        if ($password == $password_cookie) {
            header('Location: index.php');
            //登录成功，保存用户会话
            session_start();
            $_SESSION['userinfo'] = array(
                'id' => $row['id'], //将用户id保存到SESSION
                'username' => $username  //将用户名保存到SESSION
            );

            //登录成功，跳转到会员中心
            alert_back("登录成功");

                    //终止脚本继续执行
                    die;
        }
    }
}
//加载HTML模板文件
define('APP', 'itcast');

