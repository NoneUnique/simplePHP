<!DOCTYPE html>
<html>
    <head>
        <title>虚拟游戏</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>
    <style>
        .search-bar {
            position: relative;
            max-width: 400px;
            min-width: 200px;;
        }

        .search-bar input {
            width: 100%;
            height: 42px;
        }

        .search-bar button {
            height: 42px;
            width: 42px;
            cursor: pointer;
            position: absolute;
        }
        .search-bar input {
            border-radius: 5px;
            top: 0;
            right: 0;
        }
        .search-bar input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);  
    border-radius: 5px;  
        }
        .search-bar button {
            width: 60px;
            top: 0;
            right: 0;
        }
        .search-bar button:before {
            content: "搜索";
        }

    </style>
<body>

    <div class="container-fluid">
        <?php include './view/head.php'; ?>
         <ul class="nav float-sm-right">
            <?php $order_sort = ($order_sort=='desc'?'asc':'desc');?>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">排序</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?order=date&sort=<?php echo $order_sort; ?>">发行日期</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?order=title&sort=<?php echo $order_sort; ?>">名称</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?order=price&sort=<?php echo $order_sort; ?>">单价</a>
            </li>
        </ul>
        <h2 class=" text-info p-2">虚拟游戏</h2>
        <hr>
        <!--排序-->
        <form class="search-bar m-2 ">
            <input class="form-control" placeholder="请输入发行时间:xxxx 或 xxxx-xx" name="search" type="text" /><button class="btn btn-danger"  type="submit"></button>
        </form>

        <div class="row container-fluid mx-auto" >
            <?php if (empty($game_info)): ?>
                <div>查询的结果不存在！</div>
            <?php else: foreach ($game_info as $game_v): ?>
                    <div class="col-sm-4 ">
                        <img alt="<?php echo $game_v['title']; ?>" src="images/game/<?php echo $game_v['image'] ; ?>" class="img-thumbnail" />
                        <h5 class="text-nowrap" style="overflow: hidden; text-overflow:ellipsis;" >
                            <a href="game_detail.php?id=<?php echo $game_v['id'] ?>"
                               data-toggle="popover" 
                               data-trigger="hover" 
                               title="<?php echo $game_v['title']; ?>" 
                               data-content="<?php if (empty($game_v['describe'])) echo "暂无简介";
            echo $game_v['describe']; ?>">
        <?php echo $game_v['title']; ?>
                            </a>
                        </h5>
                        <p>发行时间<?php echo $game_v['date']; ?></p>
                          <p>单价:<?php echo $game_v['price']; ?>元</p>
                        <p>
                            <a class="link-warning" href="game_detail.php?id=<?php echo $game_v['id'] ?>">View details »</a>
                        </p>
                    </div>
                <?php
                endforeach;
            endif;
            ?>
            <script>
                $(document).ready(function () {
                    $('[data-toggle="popover"]').popover();
                });
            </script>
             
        </div>
          <div class="float-right">
                <?php echo $page_html ?>
          </div>
            </div>
</body>
</html>