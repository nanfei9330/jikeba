<?php
session_start();
if($_SESSION['admin']){
echo "<script>window.location='index.php'</script>";
};
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Bootstrap
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" type="text/css"><!--mystyle-->
        <link rel="stylesheet" href="css/mystyle.css" type="text/css">
    </head>
    <body class="loginpage">
        <div class="signin-content">
            <div class="login-box">
                <h1>
                    admin panel
                </h1>
                <div class="loginmsg"></div>
                <form action="index.php" method="post" name="form" onSubmit="return ck()">
                    <!--用户名-->
                    <div class="username">
                        <div class="usernameinner">
                            <input type="text" placeholder="username" name="username" id="username" value="admin">
                        </div>
                    </div><!--密码-->
                    <div class="password">
                        <div class="passwordinner">
                            <input type="text" name="password" id="password" placeholder="password" value="admin">
                        </div>
                    </div><!--登录按钮-->
                    <input type="submit" value="登 录" class="btn btn-primary submit">
                </form>
            </div>
        </div>
        <div class="container text-center">
            Copyright © 2015
        </div><script src="js/jquery.js" type="text/javascript">
</script><script src="js/bootstrap.min.js" type="text/javascript">
</script><script type="text/javascript" src="js/module/login.js">
</script>
    </body>
</html>