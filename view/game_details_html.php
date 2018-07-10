<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>

</head>
<body>
    <?php include './view/head.php'; ?>
    <center>
        <?php foreach ($game_detail as $v): ?>
            <div class="container">
                <ol class="breadcrumb" style="margin-bottom: 5px; background-color: white;">
                    <li><a href="#">虚拟游戏</a>&emsp;/&emsp;</li>
                    <li class="active"><?php echo $v['title']; ?></a></li>
                </ol>
                <div class="row">
                    <div class="col-md-12 column">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td rowspan="5" >
                                        <img alt="<?php echo $v['title']; ?>" src="images/game/<?php echo $v['image']; ?>" class="img-thumbnail h-75" />
                                    </td>
                                </tr>
                                <tr><td><?php echo $v['title']; ?> </td></tr>
                                <tr><td><?php echo $v['date']; ?></td></tr>
                                <tr> <td><?php if (empty($v['price'])) echo '免费';else echo "￥" . $v['price']; ?></td></tr>
                                <tr> <td>简介描述    <?php if (empty($v['describe'])) echo '暂无简介';  echo $v['describe']; ?> </td></tr>
                                <tr>
                                    <td colspan="3" align="center">
                                        <a type="button" class="btn btn-success" name="Submit" href="shopCart.php?id=<?php echo $v['id']?>">添加到购物车</a>
                                    </td>
                                </tr>
                                <tr><td colspan="3" align="right"><a href="#" onclick="history.back();">返回上一级</a></td></tr>
                            </tbody>
                        </table>			
                    </div>
                </div>
               
<?php endforeach; ?>
    </center>
</body>
</html>