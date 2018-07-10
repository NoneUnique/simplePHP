<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <!-- Brand -->
    <a class="navbar-brand"  href="#">虚拟现实</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse  justify-content-end" id="collapsibleNavbar">
        <ul id="headtab" class="navbar-nav">
            <li class="nav-item ">
                <a class="nav-link" href="./index.php">首页</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./game.php">VR游戏</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="./news.php">VR动态</a>
            </li>   
            <?php if ($login): ?>
                <!--                如果已登录,显示用户名,否则显示登录-->
                <li class="nav-item"><a class="nav-link" href="./user_center.php?name=user"><?php echo $userinfo['username']; ?></a></li>
                <!-- 用于打开模态框 -->
            <?php else: ?>
                <a  class="nav-link" href="#" role="dialog" data-backdrop="false" data-toggle="modal" data-target="#myModal">
                    登录/注册
                </a>
                <!-- 模态框 -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- 模态框头部 -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- 模态框主体 -->
                            <div class="modal-body">
                                <form method="post" action="./user_login.php" >
                                    <div class="form-horizontal" id="login_form">
                                        <h3 class="form-title">LOGIN</h3>
                                        <div class="form-group">
                                            <input class="form-control required" type="text" placeholder="username" name="username" id="username" name="username" autofocus="autofocus" maxlength="20"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control required" type="password" placeholder="password" name="password" id="password" name="password" maxlength="8"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="checkbox">
                                                <input type="checkbox" name="auto_login" value="on" >&emsp;记住我
                                            </label>
                                            <button type="submit" class="btn btn-success  float-right" name="submit">登录</button>
                                        </div>
                                    </div>
                            </div>
                            <!-- 模态框底部 -->
                            <div class="modal-footer">
                                <p>没有账号,前往<a href="./user_register.php">注册</a></p>
                            </div>
                        </div>
                    </div>
                    </form>
                </div><!-- 模态框结束  -->
<?php endif; ?>


            </li>
        </ul> 
    </div> 
</nav>
<h1>&nbsp;</h1>
