<?php
	header("Content-Type:text/html;charset=utf-8");
	error_reporting(E_ALL^ E_NOTICE);	//关闭非致命的提示 
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login = $_POST['login'];
	
	if($_COOKIE['logonid']!=NULL){
		echo "<script>alert('".$_COOKIE['logonid']."已登录无需再登录,欢迎回来！')</script>";
		Header("Location: index.html");
		exit();
	}
	
	if($login){
		if(!$username or !$password)
			echo "<script>alert('请输入用户名和密码！')</script>";
		else{
			require ('api/config.php');
			$password = md5($password);
			$sql = mysqli_query($conn,"SELECT state FROM users WHERE name LIKE '$username'");
			$user = mysqli_fetch_array($sql);
			if($user){
				echo "<script>alert('该用户名已被注册了！')</script>";
			}else{
				$sql="INSERT INTO users (name,pass) VALUES('$username','$password')";
				$userif = mysqli_query($conn,$sql);
				if($userif){
					 setcookie("logonid", $username, time()+3600*24*10,'/');
					 echo "<script>alert('登录成功，".$username."欢迎回来！');</script>";
					 Header("Location: index.html");
					 exit();
				}
				else
					echo "<script>alert('注册失败，请重新尝试！')</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/login.css" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<style>
li{
	list-style: none;
}
</style>
<body>
<div id="app">
	<div class="top ce b00f">
		<h1 class="title">login / 注册</h1>
	</div>
	<div class="main ce">
		<form action="zhuce.php" method="post">
			<li><input type="text" name="username"></li>
			<li><input type="password" name="password"></li>
			<li><input type="submit" name="login" value="Login"/></li>
		</form>
		<a href="login.php">有账号，登录</a>
	</div>
</div>
</body>
</html>