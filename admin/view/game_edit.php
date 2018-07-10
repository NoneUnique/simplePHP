<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>虚拟游戏</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../css/bootstrap.min.css">
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
    </head>

    <style>

    </style>
    <body class="bg-dark">
        <div class="container-fluid  row">
            <?php include 'admin_navbar.php'; ?>
            <div class="col mx-auto">
                <!--排序-->
                <ul class="nav float-sm-right">
                    <?php $order_sort = ($order_sort == 'desc' ? 'asc' : 'desc'); ?>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">排序</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php?table=game&order=date&sort=<?php echo $order_sort; ?>">发行日期</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php?table=game&order=title&sort=<?php echo $order_sort; ?>">名称标题</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="test.php?table=game&order=price&sort=<?php echo $order_sort; ?>">价格</a>
                    </li>
                </ul>
                <h2 class=" text-info p-2">虚拟游戏</h2>
                <hr>

                <div class=" container" >
                    <?php if (empty($info)): ?>
                        <div>查询的结果不存在！</div>
                    <?php else: foreach ($info as $v): ?>
                            <div class="col mt4 ">
                                <table class="table text-light table-bordered">
                                    <tbody>
                                        <tr class="">
                                            <td rowspan="3" ><img alt="<?php echo $v['title']; ?>" src="../images/game/<?php echo $v['image']; ?>" class="">  </td>
                                        </tr>
                                        <tr class="col-5 mx-auto">
                                            <td><?php echo $v['title']; ?></td>
                                            <td>发行时间<?php echo $v['date']; ?> </td>
                                            <td>价格<?php echo $v['price']; ?></td>
                                            <td rowspan="2" >
                                                <a class="link-warning" href="?table=game" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#edit<?php echo $v['id']; ?>">修改</a>
                                                <br><br>
                                                <a href="Del.php?table=game&game_id=<?php echo $v['id']; ?>">删除</a>
                                            </td>
                                        </tr>
                                        <tr class="col-4">
                                            <td colspan="3">简介&emsp;<?php echo $v['describe'] ?> </td>
                                        </tr>
                                    </tbody>
                                </table>			
                            </div>
                        <?php endforeach; ?>
                        <div class="float-right">
                            <?php echo $page_html ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!---修改游戏信息模态框--->
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
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-horizontal" id="login_form">
                                    <table>
                                        <input type="hidden" name="game_id" value="<?php echo $v['id']; ?>" /></td></tr>
                                        <tr><th>图片：</th><td><input class="form-control" type="file" name="image" value="<?php echo $v['image'] ?>"/></td></tr>
                                        <tr><th>标题：</th><td><input class="form-control" type="text" name="title" value="<?php echo $v['title']; ?>" /></td></tr>
                                        <tr><th>价格：￥</th><td><input class="form-control" name="price" type="text" value="<?php echo $v['price']; ?>"></td></tr>
                                        <tr><th>简介：</th><td><textarea class="form-control" name="describe" type="text" value=""><?php echo $v['describe']; ?></textarea></td></tr>
                                                    <tr><th>发行日期：</th><td><input class="form-control" name="date" type="text" value="<?php echo $v['date']; ?>"></td></tr>
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