<?php

require './init.php'; //项目初始化文件
require './../lib/page_function.php';
$table = input_get('table');
if ($table == 'game') {
    require './view/game_add.php';
    if (!empty($_POST)) {
        $fields = array('price', 'describe', 'date', 'title');
        $values = array();
        foreach ($fields as $k => $v) {
            $data = isset($_POST[$v]) ? $_POST[$v] : '';
           $data = input_post($v); //接收$_POST数据
            $data = db_escape(filter($data)); //数据过滤
            if ($data == '') {
                alert_back($v . '字段不能为空');
            }
            $fields[$k] = "`$v`";
            $values[] = "'$data'";
        }
        $fields = implode(',', $fields);
        $values = implode(',', $values);
        
        $game_id = db_fetch_row("select max(id+1) from game");
           //上传图片
        if (!empty($_FILES['image'])) {
            $pic_info = $_FILES['image'];
            $pic_name = $_FILES['image']['name'];
            $ext = substr(strrchr($pic_name, '.'), 1);
            $new_file = $game_id['max(id+1)'] . '.' . $ext; //命名图像
            $filename = './../images/game/' . $new_file; //图像保存路径
            if (!move_uploaded_file($pic_info['tmp_name'], $filename)) {
                alert_back('图片上传失败');
                return FALSE;
            }
        }
        $image_str = "'$new_file'";
        $sql = "INSERT INTO `game` ($fields,image) values ($values,$image_str)";
        if ($res = db_query($sql)) {
            alert_back("提交成功！");
        } else {
            alert_back("提交失败！");
        }
    }
}
if ($table == 'news') {
    require './view/news_add.php';
    if (!empty($_POST)) {
        $fields = array('artical', 'date', 'title');
        $values = array();
        foreach ($fields as $k => $v) {
            $data = isset($_POST[$v]) ? $_POST[$v] : '';
           $data = input_post($v); //接收$_POST数据
            $data = db_escape(filter($data)); //数据过滤
            if ($data == '') {
                alert_back($v . '字段不能为空');
            }
            $fields[$k] = "`$v`";
            $values[] = "'$data'";
        }
        $fields = implode(',', $fields);
        $values = implode(',', $values);
        
        $news_id = db_fetch_row("select max(id+1) from news");
           //上传图片
        if (!empty($_FILES['image'])) {
            $pic_info = $_FILES['image'];
            $pic_name = $_FILES['image']['name'];
            $ext = substr(strrchr($pic_name, '.'), 1);
            $new_file = $news_id['max(id+1)'] . '.' . $ext; //命名图像
            $filename = './../images/news/' . $new_file; //图像保存路径
            if (!move_uploaded_file($pic_info['tmp_name'], $filename)) {
                alert_back('图片上传失败');
                return FALSE;
            }
        }
        $image_str = "'$new_file'";
        $sql = "INSERT INTO `news` ($fields,image) values ($values,$image_str)";
        if ($res = db_query($sql)) {
          alert_back("提交成功！");
        } else {
             alert_back("提交失败！");
        }
    }
}