<?php
//用户编辑功能
require './init.php'; //项目初始化文件

$user_id = (int)input_get('user_id');

//表单处理
if($_POST){
	//定义允许的字段
	$fields = array('name','phone','address');
	$values = array(); 
	foreach($fields as $k=>$v){
		$data = input_post($v); //接收$_POST数据
		$data = db_escape(filter($data)); //数据过滤
		if($data==''){ 
			alert_back($v.'字段不能为空');
		}
		$fields[$k] = "`$v`";  //把字段使用反引号包裹
		$values[] = "'$data'"; //把值使用单引号包裹
	}
	$fields = implode(',', $fields);
	$values = implode(',', $values);
	$sql = "insert into addr ($fields,`user_id`) values ($values,$user_id)";
	//执行SQL
	if($res = db_query($sql)){
		header('Location: user_center.php?name=address'. alert_back("添加成功"));
		die;
	}else{
		alert_back('信息添加失败');
	}
}
//获取原来的信息
$sql = "select * from addr where user_id=$user_id";
$user_addr = db_fetch_row($sql);


//加载视图页面，显示数据
require './view/user_address.php';

