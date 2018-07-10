<!DOCTYPE html>
<html>
    <head>
        <title>游戏添加</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
        <style>
            form .form-control{background-color: #e5e6e6}
        </style>
    </head>
    <body>
        <div class="container-fluid  row">
            <?php include 'admin_navbar.php'; ?>
            <div class="col bg-dark  text-light">
                <form method="post" class="active mx-auto" action="" enctype="multipart/form-data">
                    <div class="form-horizontal" >
                        <table class="p-4">
                            <tr><th>图片：</th><td><input class=" btn m-3" type="file" name="image" value="<?php // echo $v['image']     ?>"/></td></tr>
                            <tr><th>标题：</th><td><input class="form-control  text-dark m-3" type="text" name="title" value="<?php // echo $v['title'];     ?>" /></td></tr>
                            <tr><th>价格：￥</th><td><input class="form-control m-3" name="price" type="text" value="<?php // echo $v['price'];     ?>"></td></tr>
                            <tr><th>发行日期：</th><td><input class="form-control m-3" name="date" type="text" value="<?php // echo $v['date'];     ?>"></td></tr>
                            <tr><th>简介：</th><td colspan="8"><textarea class="form-control m-3" name="describe" type="text" rows="5" value=""><?php // echo $v['describe'];     ?></textarea></td></tr>

                            <tr class="mx-auto m-1"><td colspan="2" align="center" >
                                    <input type="submit" value="保存资料" class="btn btn-info" />
                                    <input type="reset" value="重置" class="btn btn-info"  />
                                </td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
