<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../css/bootstrap.min.css">
        <script src="./../js/jquery.min.js"></script>
        <script src="./../js/popper.min.js"></script>
        <script src="./../js/bootstrap.min.js"></script>
        <style>
            .text-light{
                cursor: pointer;
            }
            #tog a{color: #fff3cd;}
        </style>
    </head>
    <body>
        <div class="row bg-secondary col-sm-3" style="min-height: 600px;">
            <div class=" flex-column  p-4  mr-5">
                <p class="text-light ml-5">系统管理</p><hr class="ml-5 mr-5">
                <p class="text-light ml-5 text" >新闻管理</p>
                <div id="tog">
                    <small>
                    <p><a href="test.php?table=news" class="ml-5 " >查看详情</a></p>
                    <p><a href="Add.php?table=news"  class="ml-5" >添加</a></p>
                    </small>
                </div>

                <p class="text-light ml-5 text">游戏管理</p>
                 <div id="tog">
                     <small>
                    <p><a href="test.php?table=game" class="ml-5 " >查看详情</a></p>
                    <p><a href="Add.php?table=game"  class="ml-5" >添加</a></p>
                     </small>
                </div>
                <p class="text-light ml-5 text">用户管理</p>
                 <div id="tog">
                     <small>
                    <p><a href="test.php?table=user" class="ml-5 " >查看详情</a></p>
                    <p><a href="./../user_register.php"  class="ml-5" >添加</a></p>
                     </small>
                </div>
                <p class="text-light ml-5 text">订单管理</p>
                 <div id="tog">
                     <small>
                    <p><a href="test.php?table=order" class="ml-5 " >查看详情</a></p>
                     </small>
                </div>
            </div>
        </div>
            <script>
                $("div[id='tog']").hide();
                $(".text").click(function () {
                    $(this).next().toggle("500");
                });

            </script>
    </body>
</html>
