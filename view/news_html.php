<!DOCTYPE html>
<html>
    <head>
        <title>新闻资讯</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>
        <style>
            .img_new{max-width: 300px; max-height: 200px;}
        </style>
    </head>
    <body>
        <!-- 新闻资讯模块  -->
        <div class="container">
            <?php include './view/head.php'; ?>
         <ul class="nav float-sm-right">
            <?php $order_sort = ($order_sort=='desc'?'asc':'desc');?>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">排序</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?order=date&sort=<?php echo $order_sort; ?>">发表日期</a>
            </li>
        </ul>
            <h2 class=" text-info">新闻资讯</h2>    <hr>

            <div class="row border p-3">
                <?php if (empty($news_info)): ?>
                    <div>查询的结果不存在！</div>
                <?php else: foreach ($news_info as $news_v): ?>

                            <div class="col-sm-4 p-3 ">
                                <img src="images/news/<?php echo $news_v['id'] . '.jpg' ?>" alt="<?php echo $news_v['title'] ?>" class=" img-thumbnail img_news">
                            </div>
                            <div class="col-sm-8 border-bottom  p-3">
                                <h5><?php echo $news_v['title'] ?></h5>
                                <p><?php echo $news_v['date'] ?></p>
                                <p><?php echo $news_v['artical'] ?></p>
                            </div>
                    <?php endforeach;
                endif;
                ?>
            </div> 
            <div class="float-right">
                <?php echo $page_html ?>
            </div>
        </div> 

</body>
</html>