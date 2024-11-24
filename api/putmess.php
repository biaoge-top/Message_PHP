<?php
	header("Content-Type:text/html;charset=utf-8");
	error_reporting(E_ALL^ E_NOTICE);	//关闭非致命的提示 
	
	$data = json_decode(file_get_contents("php://input"), true);
	
	if($_COOKIE['logonid']!=NULL){
		$user = $_COOKIE['logonid'];
	}
	
	$msg = $data['msg'];
	$back = $data['back'];
	
	if($msg==NULL or $back==NULL) echo json_encode(array('state'=>'400','msg'=>'输入为空！'),JSON_UNESCAPED_UNICODE);
	else if($user==NULL) echo json_encode(array('state'=>'302','msg'=>'请先登录！','url'=>'login.php'),JSON_UNESCAPED_UNICODE);
	else{
		require ('config.php');
		$time = date("Y-m-d H:i");	//时间
		$ips = $_SERVER["REMOTE_ADDR"];//IP地址
		$sql="INSERT INTO mess (name,msg,time,back) VALUES('$user','$msg','$time','$back')";
		$messif = mysqli_query($conn,$sql);
		if($messif)
			echo json_encode(array('state'=>'200','msg'=>'留言成功！'),JSON_UNESCAPED_UNICODE);
		else
			echo json_encode(array('state'=>'400','msg'=>'留言失败！'),JSON_UNESCAPED_UNICODE);
		
	}

?>