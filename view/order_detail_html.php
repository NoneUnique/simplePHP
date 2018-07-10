<!DOCTYPE html>
<html>
     <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>
    <body>
       <div class="row container-fluid">
            <div class="col-sm-3"><?php include 'user_aside.php'; ?></div>
            <div  class="col float-right"><br>
                <div class="row">
                    <div class="col-md-12 column">
                    <h1>&nbsp;</h1>
                        <h4>订单详情</h4>
                        <table class="table table-bordered">
                            <tbody class="bg-secondary">
                            <th>游戏名</th>
                            <th>单价</th>
                            <th>数量</th>
                            <th>单个总额</th>
                            </tbody>
                            <?php  foreach ($orderdetail as $v) {?>
                            <tr>
                                <td><a href="game_detail.php?id=<?php echo $v['id'] ;?>"><?php echo $v['title'];?></a></td>
                                <td><?php echo $v['price'];?></td>
                                 <td><?php echo $v['number'];?></td>
                                  <td><?php echo $v['price']*$v['number'];?></td>
                            </tr>  
                            <?php }?>
                             <tr><td colspan="4" align="right">总金额:<?php echo $totalprice['totalprice']."元";?></td></tr>
                        </table>
                        <p><a href="#" class="float-right" onclick="history.back();">返回上一级</a></p>
                    </div>
                </div>
            </div>
       </div>
       
    </body>
</html>
