<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="./css/bootstrap.min.css">
        <script src="./js/jquery.min.js"></script>
        <script src="./js/popper.min.js"></script>
        <script src="./js/bootstrap.min.js"></script>

        <script type="text/javascript">
	//检查两次输入密码是否一致
	function checkForm(){
		var pw1 = document.getElementById("pw1").value;
		var pw2 = document.getElementById("pw2").value;
		if(pw1 !== pw2){
			alert('两次输入密码不一致！');
			return false;
		}
		return true;
	}
    </script>
    </head>
    <body >
        <?php include './view/head.php';?>
        <center>
            <div class="container p-3"  >
                <form class="form-horizontal" action="./user_register.php" method="post" onsubmit="return checkForm()">
                    <table class="table table-bordered text-center" >
                        <tr>
                            <td>用户名</td>
                            <td><input class="col-md-8  form-control" type="text" name="username" value=""></td>
                        </tr>

                        <tr>
                            <td>密&emsp;&emsp;码</td>
                            <td><input id="pw1" class="col-md-8 form-control" type="password" name="password" value=""></td>
                        </tr>
                        
                        <tr>
                            <td>确认密码</td>
                            <td><input id="pw2" class="col-md-8  form-control" type="password" name="password" value=""></td>
                        </tr>

                        <tr>
                            <td>电子邮件</td>
                            <td><input class="col-md-8  form-control" type="text" name="email" value=""></td>
                        </tr>

                        <tr>
                            <td>联系电话</td>
                            <td><input class="col-md-8  form-control" type="text" name="phone" value=""></td>
                        </tr>

                        <tr>
                            <td>家庭住址</td>
                            <td><input class="col-md-8 form-control" type="text" name="address" value=""></td>
                        </tr>

                        <tr>
                            <td colspan="2" align="center">
                                <input class="btn btn-info "  type="submit" value="提交注册"/>
                                <input class="btn btn-info " type="reset" value="重置"/>
                            </td>
                        </tr>
                    </table>
                    <script>
             <?php if(!empty($error)): ?>
                alert("<?php foreach($error as $v) echo "$v"; ?>");
           <?php endIf; ?>   
             </script>
                </form>
                
            </div>
        </center>
               <?php include 'footer.php';?>
    </body>
</html>

