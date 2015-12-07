<!DOCTYPE html>
<html>
<html lang="zh-cn">
<meta charset="UTF-8">
<title>Bootstrap</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<!--mystyle-->
<link rel="stylesheet" href="css/mystyle.css"/>

</head>
<body class="loginpage">
<div class="signin-content">


    <div class="login-box">
        <h1>admin panel</h1>
        <div class="loginmsg">
        </div>
        <form action="index.php" method="post" name="form" onSubmit="return ck()">
            <!--用户名-->
            <div class="username">
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="usernameinner">
                    <input type="text" placeholder="username" name="username" id="username"  value="admin"/>
                </div>
            </div>

            <!--密码-->
            <div class="password">
                <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>
                <div class="passwordinner">
                    <input type="text" name="password" id="password" placeholder="password" value="admin" />
                </div>
            </div>
            <!--登录按钮-->
            <input type="submit" value="登 录" class="btn btn-primary submit"/>
        </form>

    </div>
</div>

<div class="container text-center">Copyright © 2015</div>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
    function ck(){
        var name=$('#username').val();
        var password=$('#password').val();

        if(name==""){
            $('.loginmsg').text("用户名不为空!");
            $('.loginmsg').show();
            return false;
        };
        if(password==""){
            $('.loginmsg').text("密码不为空!");
            $('.loginmsg').show();
            return false;
        };
      if(name!=="" && password!==""){
	  var result;
	  	$.ajax({
			url:"check_login.php",
			type:"post",
			data:{name:name,password:password},
			async:false,
			success:function(flag){
				result=flag;
			}
		});
			if(result=="no"){
				$('.loginmsg').text("用户名或密码错误!");
				$('.loginmsg').show();
				return false;
			}else{
				return true;
			}
		
	  }
    }
</script>
</body>
</html>