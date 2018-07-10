<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>订单管理</title>
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
            <h2 class=" text-info p-2">用户订单</h2>
            <hr>
            <div class=" container" >
                <?php if (empty($info)): ?>
                    <div class="text-light">查询的结果不存在！</div>
                <?php else: ?>
                    <div class="col mt4 ">
                        <table class="table text-light table-bordered">
                            <tbody class="bg-secondary">
                            <th >订单ID</th>
                            <th>用户</th>
                            <th>总金额</th>
                            <th>收货人</th>
                            <th>联系电话</th>
                            <th>收货地址</th>
                            <th>订单状态</th>
                            <th>订单详情</th>
                            <th>确认收货</th>
                             <th>操作</th>
                            </tbody>

                            <?php foreach ($info as $v): ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $v['order_id'] ?></td>
                                        <td><?php echo $v['username'] ?></td>
                                        <td><?php echo $v['totalprice'] ?></td>
                                        <td><?php echo $v['name'] ?></td>
                                        <td><?php echo substr_replace($v['phone'], '****', 3, 4); ?></td>
                                        <td><?php echo $v['address'] ?></td>
                                        <?php if ($v['send'] == '') echo "<td><a href='?table=order&action=send&order_id=" . $v['order_id'] . "'>未发货</a></td>";
                                        else echo '<td>已发货</td>'; ?>
                                        <td><a href="order_detail.php?user_id=<?php echo $v['user_id']; ?>&order_id=<?php echo $v['order_id'] ?>">查看订单</a></td>
                                        <?php if ($v['recv'] == '')
                                            echo "<td>未收货</a></td>";
                                        else
                                            echo '<td>已收货</td>';
                                        ?>
                                        <td> <a href="Del.php?table=order&orderid=<?php echo $v['id']; ?>">删除</a></td>
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
</body>
</html>
