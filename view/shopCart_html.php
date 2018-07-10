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
        <div class="container-fluid">
        <?php include './view/head.php'; ?>
          <div class="row">
                    <div class="col-md-12 column">
                        <h4>我的购物车</h4>
                        <table class="table table-bordered">
                            <tbody class="bg-secondary">
                                        <th >名称</th>
                                        <th >数量</th>
                                        <th >总价</th>
                                        <th colspan="2">操作</th>
                            </tbody>
                            
                            <?php
                            $tot=0;
                            foreach ($_SESSION['cart'] as $cart) { 
                               if(!empty($cart['id'])) {
                                  $tot += $cart['price']* $cart['number'];?>
                                <tr>
                                    <td><?php echo $cart['title'];?></td>
                                    <td>
                                        <a href="shopCartCl.php?action=sub&id=<?php echo $cart['id'];?>" class="btn btn-danger" >-</a>
                                        <?php echo $cart['number'];?>
                                         <a href="shopCartCl.php?action=add&id=<?php echo $cart['id'];?>"  class="btn btn-danger">+</a>
                                    </td>
                                    <td><?php echo $cart['price']*$cart['number'];?></td>
                                    <td colspan="2" ><a href="shopCartCl.php?action=del&id=<?php echo $cart['id'];?>">删除</a></td>
                                </tr>
                               
                               <?php } }?>
                                 <tr>
                                    <td><a href="game.php" >继续购物</a></td>
                                    <td><a href="shopCartCl.php?action=delAll" >清空购物车</a></td>
                                    <td colspan="2">总合计:<?php echo $tot .'元'?></td>
                                </tr>
                        </table>
                        <form method="post" action="shopCommit.php?totalprice=<?php echo $tot?>">
                        <table class="table table-bordered">
                            <h4>选择收货地址</h4>
                            <tbody>
                                <th>选择</th>
                                <th>收货人</th>
                                <th>收货电话</th>
                                <th>收货地址</th>
                            </tbody>
                            <?php
                            $i=0;
                            foreach ($addr_list as $v){?>
                            <tr>
                                <?php if($i==0){
                                    echo "<td><input type='radio'checked name='addr_id' value='". $v['id']."'></td>";
                                    $i++;
                                }else{ 
                                    echo "<td><input type='radio' name='addr_id' value='". $v['id']."'></td>";
                                }?>
                                <td><?php echo $v['name'];?></td>
                                <td><?php echo $v['phone'];?></td>
                                <td><?php echo $v['address'];?></td>
                            </tr>
                            <?php }?>
                           
                        </table>
                            
                            <div><input type="submit" value="提交订单" class="btn btn-info float-right"></div>
                        </form>
                        <div align="center">
                <?php echo $page_html ?>
          </div>
                    </div>
                </div>
        </div>
    </body>
</html>
