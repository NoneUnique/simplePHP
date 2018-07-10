<!DOCTYPE html>
<html>
    <head>
        <title>用户管理</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../css/bootstrap.min.css">
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
    </head>
</style>
<body class="bg-dark">
    <div class="container-fluid  row">
        <?php include 'admin_navbar.php'; ?>
        <div class="col mx-auto">
            <ul class="nav float-sm-right">
                <?php $order_sort = ($order_sort == 'desc' ? 'asc' : 'desc'); ?>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">排序</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?table=user&order=address&sort=<?php echo $order_sort; ?>">地址</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?table=user&order=username&sort=<?php echo $order_sort; ?>">名称</a>
                </li>
            </ul>
            <h2 class=" text-info p-2">虚拟游戏</h2>
            <hr>
            <div class=" container" >
                <?php if (empty($info)): ?>
                    <div>查询的结果不存在！</div>
                <?php else: ?>
                    <div class="col mt4 ">
                        <table class="table text-light table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>用户名</th>
                                    <th>地址</th>
                                    <th>号码</th>
                                    <th>邮箱</th>
                                    <th>查看订单</th>
                                    <th colspan="2">操作</th>
                                </tr>
                            </thead>

                            <?php foreach ($info as $v): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $v['id'] ?></td>
                                        <td><?php echo $v['username'] ?></td>
                                        <td><?php echo $v['address'] ?></td>
                                        <td><?php echo substr_replace($v['phone'], '****', 3, 4); ?></td>
                                        <td><?php echo $v['email'] ?></td>
                                        <td><a href="test?table=order&user_id=<?php echo $v['id']; ?>">查看订单</a></td>
                                        <td><a class="link-warning" href="?table=user" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#edit<?php echo $v['id']; ?>">修改</a>
                                            <a href="Del.php?table=user&user_id=<?php echo $v['id']; ?>">删除</a></td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>			
                    </div>
                        <div class="float-right">
                            <?php echo $page_html ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!---修改用户信息模态框--->
    <?php foreach ($info as $v): ?>
        <div class="modal fade" id="edit<?php echo $v['id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- 模态框头部 -->
                    <div class="modal-header">
                        <h4 class="modal-title">修改游戏信息</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- 模态框主体 -->
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-horizontal" id="login_form">
                                <table>
                                    <input type="hidden" name="user_id" value="<?php echo $v['id']; ?>" /></td></tr>
                                   <!--<tr><th>图片：</th><td><input class="form-control" type="file" name="image" /></td></tr>-->
                                    <tr><th>用户名：</th><td><input class="form-control" type="text" name="username" value="<?php echo $v['username']; ?>" /></td></tr>
                                    <tr><th>邮箱：</th><td><input class="form-control" name="email" type="text" value="<?php echo $v['email']; ?>"></td></tr>
                                    <tr><th>地址：</th><td><textarea class="form-control" name="address" type="text" value=""><?php echo $v['address']; ?></textarea></td></tr>
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
