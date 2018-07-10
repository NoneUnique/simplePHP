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

        <div class="row container-fluid">
            <div class="col-sm-4"><?php include 'user_aside.php'; ?></div>
            <div  class="col float-right"><br>
                <h2>&nbsp;</h2>
                <div class=" text-muted border-bottom p-4">
                    <p class="float-right"><a  class="nav-link" href="#" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#add">添加</a></p>

                    <h3>收件地址</h3><hr>
                    <?php foreach ($user_addr as $v): ?>
                        <div class="col " >
                            <address class=" border">
                                <strong><?php echo $v['name'] ?></strong><p class="float-right">
                                    <a class="nav-link" href="#" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#edit<?php echo $v['id']; ?>">修改</a>
                                    &emsp;<a href="./user_del.php?table=addr&addid=<?php echo $v['id']; ?>">删除</a></p>
                                <p><?php echo $v['address'] ?></p>
                                <p>联系电话: <?php echo $v['phone'] ?></p>
                            </address>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="float-right m-4">
                    <?php echo $page_html ?>
                </div>
            </div> 
        </div>
        <?php foreach ($user_addr as $v): ?>
            <!---修改地址模态框--->
            <div class="modal fade" id="edit<?php echo $v['id']; ?>">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- 模态框头部 -->
                        <div class="modal-header">
                            <h4 class="modal-title">修改地址信息</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- 模态框主体 -->
                        <div class="modal-body">
                            <form method="post">
                                <div class="form-horizontal" id="edit_form">
                                    <table>
                                        <input type="hidden" name="addid" value="<?php echo $v['id']; ?>" /></td></tr>
                                        <tr><th>收件人：</th><td><input class="form-control" type="text" name="name" value="<?php echo $v['name']; ?>" /></td></tr>
                                        <tr><th>地址：</th><td><input class="form-control" name="address" type="text" value="<?php echo $v['address']; ?>"></td></tr>
                                        <tr><th>联系电话：</th><td><input class="form-control" name="phone" type="text" value="<?php echo $v['phone']; ?>"></td></tr>
                                        <tr><td colspan="2" class="td-btn"  align="center">
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
        <!---添加地址模态框--->
        <div class="modal fade" id="add">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- 模态框头部 -->
                    <div class="modal-header">
                        <h4 class="modal-title">添加收货地址</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- 模态框主体 -->
                    <div class="modal-body">
                        <form method="post" action="user_addr_add.php?user_id=<?php echo $userinfo['id']; ?>">
                            <div class="form-horizontal" id="login_form">
                                <table>
                                    <tr><th>收件人：</th><td><input class="form-control" type="text" name="name" value="" /></td></tr>
                                    <tr><th>地址：</th><td><input class="form-control" name="address" type="text" value=""></td></tr>
                                    <tr><th>联系电话：</th><td><input class="form-control" name="phone" type="text" value=""></td></tr>
                                    <tr><td colspan="2" class="td-btn" align="center">
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
    </body>
</html>
