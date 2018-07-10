<!DOCTYPE html>
<html>
    <head>
        <title>首页</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
    </head>
    <style>
        .carousel-inner img { width: 100%;height: auto; max-height: 520px;  }
        .img_new{max-width: 300px; max-height: 200px;}
    </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="section1" class="mt4">
        <?php include './view/header.php'; ?>
        <div id="index" class="carousel slide pb-3" data-ride="carousel">
            <!-- 指示符 -->
            <ul class="carousel-indicators">
                <li data-target="#index" data-slide-to="0" class="active"></li>
                <li data-target="#index" data-slide-to="1"></li>
                <li data-target="#index" data-slide-to="2"></li>
            </ul>

            <!-- 轮播图片 -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/bg.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/bg2.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/bg3.jpg">
                </div>
            </div>

            <!-- 左右切换按钮 -->
            <a class="carousel-control-prev" href="#index" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#index" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
    <div id="" class="container">
        <!-- 虚拟游戏模块  -->
        <div id="section2">
            <h1>&nbsp;</h1>
            <a href="game.php" class="text-danger float-right" >更多游戏</a>
            <h2 class=" text-info">虚拟游戏</h2>    <hr>
            <div class="row clearfix">
                <?php if (empty($game_info)): ?>
                    <div>查询的结果不存在！</div>
                <?php else: foreach ($game_info as $game_v): ?>
                        <div class="col-sm-4">
                            <img alt="<?php echo $game_v['title']; ?>" 
                                 src="images/game/<?php echo $game_v['image']; ?>" 
                                 class="img-thumbnail" />
                            <h5 class="text-nowrap" style="overflow: hidden; text-overflow:ellipsis;" >
                                <a href="game_detail.php?id=<?php echo $game_v['id']; ?>"
                                   data-toggle="popover" 
                                   data-trigger="hover" 
                                   title="<?php echo $game_v['title']; ?>" 
                                   data-content="<?php if (empty($game_v['describe']))
                    echo "暂无简介";
                echo $game_v['describe'];
                        ?>">
        <?php echo $game_v['title']; ?></a>
                            </h5>
                            <p> <a class="link-warning" href="game_detail.php?id=<?php echo $game_v['id']; ?>">View details »</a></p>
                        </div>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
                <script>
                    $(document).ready(function () {
                        $('[data-toggle="popover"]').popover();
                    });
                </script>
                <!-- 新闻资讯模块  -->
                <div id="section3">
                    <h1>&nbsp;</h1>
                    <a href="news.php" class=" text-danger float-right">更多资讯</a>
                    <h2 class=" text-info">新闻资讯</h2>    <hr>
                    <div class="row border p-3 mx-auto">
                        <?php if (empty($news_info)): ?>
                            <div>查询的结果不存在！</div>
                        <?php else: foreach ($news_info as $v): ?>
                                <div class="col-sm-4 p-3 ">
                                    <img src="./images/news/<?php echo $v['id'] . '.jpg' ?>" alt="<?php echo $v['title'] ?>" class=" img-thumbnail img_news">
                                </div>
                                <div class="col-sm-8 border-bottom  p-3">
                                    <h5><?php echo $v['title'] ?></h5>

                                    <p><?php echo $v['date'] ?></p>
                                    <p><?php echo $v['artical'] ?></p>
                                </div>

                                <?php endforeach; ?>
                        <?php endif; ?>
                        </div> 
                    </div>
                </div>
        </div>
<?php include 'footer.php'; ?>
</body>
</html>