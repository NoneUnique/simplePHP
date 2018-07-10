<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../css/bootstrap.min.css">
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
        <style>
            body{min-width: 970px;}
        </style>
    </head>
        </style>
    <body class="bg-dark">
        <div class="container-fluid  row">
            <?php include 'admin_navbar.php'; ?>
            <div class="col mx-auto text-light">
                <div class="col">
                    <ul class="nav float-sm-right">
                        <?php $order_sort = ($order_sort == 'desc' ? 'asc' : 'desc'); ?>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">排序</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?table=news&order=date&sort=<?php echo $order_sort; ?>">发表日期</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="?table=news&order=title&sort=<?php echo $order_sort; ?>">文章标题</a>
                        </li>
                    </ul>
                    <h2 class=" text-info">新闻资讯</h2>    <hr>

                    <div class="row border p-3">
                        <?php if (empty($info)): ?>
                            <div>查询的结果不存在！</div>
                        <?php else: foreach ($info as $v): ?>

                                <div class="col-sm-4 p-3 ">
                                    <img src="../images/news/<?php echo $v['id'] . '.jpg' ?>" alt="<?php echo $v['title'] ?>" class=" img-thumbnail img_news">
                                </div>
                                <div class="col-sm-8 border-bottom  p-3">
                                    <p class="float-right">
                                        <a class="link-warning" href="?table=news" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#edit<?php echo $v['id']; ?>">修改</a>
                                        <a href="Del.php?table=news&news_id=<?php echo $v['id']; ?>">删除</a></p>
                                    <h5><?php echo $v['title'] ?></h5>

                                    <p><?php echo $v['date'] ?></p>
                                    <p><?php echo $v['artical'] ?></p>
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
                                        <input type="hidden" name="news_id" value="<?php echo $v['id']; ?>" /></td></tr>
                                        <tr><th>图片：</th><td><input class="form-control" type="file" name="image" value="<?php echo $v['image'] ?>"/></td></tr>
                                        <tr><th>标题：</th><td><input class="form-control" type="text" name="title" value="<?php echo $v['title']; ?>" /></td></tr>
                                        <tr><th>发行日期：</th><td><input class="form-control" name="date" type="text" value="<?php echo $v['date']; ?>"></td></tr>
                                        <tr><th>简介：</th><td><textarea class="form-control" name="artical" type="text" value=""><?php echo $v['artical']; ?></textarea></td></tr>
                                                    <tr class="mx-auto">
                                                        <td colspan="2" align="center" >
                                                            <input type="submit" value="保存资料" class="btn btn-info" />
                                                            <input type="reset" value="重置" class="btn btn-info"  />
                                                        </td>
                                                       </tr>
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
