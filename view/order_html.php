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
    </head>
    <body>
        <div class="row container-fluid">
            <div class="col-sm-3"><?php include 'user_aside.php'; ?></div>
            <div  class="col float-right"><br>
                <div class="row">
                    <div class="col-md-12 column">
                        <h1>&nbsp;</h1>
                        <h4>我的订单</h4>
                        <table class="table table-bordered">
                            <tbody class="bg-secondary">
                            <th >订单ID</th>
                            <th>总金额</th>
                            <th>收货人</th>
                            <th>联系电话</th>
                            <th>收货地址</th>
                            <th>订单状态</th>
                            <th>订单详情</th>
                            <th>确认收货</th>
                             <th>删除</th>
                            </tbody>
                            <?php
                            if (empty($order)) {
                                echo '<tr><th colspan=9>暂无订单</th></tr>';
                            } else {
                                foreach ($order as $v) {
                                    ?>
                                    <tr>
                                        <td><?php echo $v['order_id']; ?></td>
                                        <td><?php echo $v['totalprice']; ?></td>
                                        <td><?php echo $v['name']; ?></td>
                                        <td><?php echo substr_replace($v['phone'], '****', 3, 4); ?></td>
                                        <td><?php echo $v['address']; ?></td>
                                        <?php if ($v['send']=='') echo '<td>未发货</td>'; else echo '<td>已发货</td>';?>
                                        <td><a href="order_detail.php?order_id=<?php echo $v['order_id'] ?>">订单详情</a></td>
                                       <?php if ($v['recv']=='') echo "<td><a href='?action=recv&order_id= ". $v['order_id']."'>确认收货</a></td>"; else echo '<td>已收货</td>';?>
                                        <td><a href="user_del.php?table=order&addid=<?php echo $v['order_id'];?>">删除</a></td>
                                    </tr>
                                <?php }
                            }
                            ?>
                        </table>
                    </div>
                    <div align="center">
<?php echo $page_html ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
