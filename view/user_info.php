<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <?php foreach ($user_msg as $v): ?>
            <div class="row container-fluid">
                <div class="col-sm-4"><?php include 'user_aside.php'; ?></div>
                <div  class="col-sm-6"><br>
                    <h2>&nbsp;</h2>
                    <div class="info-box text-muted border-bottom p-4">
                        <p class="float-right"><a  class="nav-link" href="#" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#edit">修改</a></p>

                        <h3>用户中心</h3><hr>
                        <div class="col" >
                           <div class="info-box text-muted border-bottom p-4">
                                    <label class="pr-5 float-left"><kbd>昵称</kbd></label>
                                    <p class="pl-5"><?php echo $v['username']; ?></p>
                                </div>
                                <div class="info-box text-muted border-bottom p-4">
                                    <label class="pr-5 float-left"><kbd>邮箱</kbd></label>
                                    <p class="pl-5"><?php echo $v['email']; ?></p>
                                </div>
                              <div class="info-box text-muted border-bottom p-4">
                                    <label class="pr-5 float-left"><kbd>联系电话</kbd></label>
                                    <p class="pl-5"><?php echo substr_replace($v['phone'], '****',3,4); ?></p>
                                </div>
                                <div class="info-box text-muted border-bottom p-4">
                                    <label class="pr-5 float-left"><kbd>地址</kbd></label>
                                    <p class="pl-5"><?php echo $v['address']; ?></p>
                                </div> 
                        </div>
                    </div>
                </div> 
            </div>
            <!---修改用户信息模态框--->
            <div class="modal fade" id="edit">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- 模态框头部 -->
                        <div class="modal-header">
                            <h4 class="modal-title">修改个人信息</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- 模态框主体 -->
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-horizontal" id="login_form">
                                    <table>
                                        <tr><th>用户名：</th><td><input class="form-control" type="text" name="username" value="<?php echo $v['username']; ?>" /></td></tr>
                                        <tr><th>地址：</th><td><input class="form-control" name="address" type="text" value="<?php echo $v['address']; ?>"></td></tr>
                                        <tr><th>邮箱地址：</th><td><input class="form-control" name="email" type="text" value="<?php echo $v['email']; ?>"></td></tr>
                                        <tr><th>联系电话：</th><td><input class="form-control" name="phone" type="text" value="<?php echo $v['phone']; ?>"></td></tr>
                                        <tr class="mx-auto"><td colspan="2" align="center" >
                                                <input type="submit" value="保存资料" class="btn btn-info" />
                                                <input type="reset" value="重置" class="btn btn-info"  />
                                            </td></tr>
                                    </table>
                                </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>

    </body>
</html>
