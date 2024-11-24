<?php
	header("Content-Type:text/html;charset=utf-8");
	error_reporting(E_ALL^ E_NOTICE);	//关闭非致命的提示 
	
	$data = json_decode(file_get_contents("php://input"), true);
	
	if($_COOKIE['logonid']!=NULL){
		$user=$_COOKIE['logonid'];
	}
	
	
	$id = $data['id'];
	
	if(!$id)
		echo json_encode(array('state'=>'400','msg'=>"留言不存在！"),JSON_UNESCAPED_UNICODE);
	else if(!$user)
		echo json_encode(array('state'=>'400','msg'=>"删除需要登录！"),JSON_UNESCAPED_UNICODE);
	else{
		//删除id
		require ('config.php');
		mysqli_query($conn,"DELETE FROM mess WHERE id='$id' and name='$user';");
		
		$sql = mysqli_query($conn,"SELECT state FROM mess WHERE id='$id'");
		$mess = mysqli_fetch_array($sql);
		// echo $mess['state'];
		if(!$mess['state'])
			echo json_encode(array('state'=>'200','msg'=>"留言已删除！"),JSON_UNESCAPED_UNICODE);
		else
			echo json_encode(array('state'=>'400','msg'=>"您不是该用户，无法删除！"),JSON_UNESCAPED_UNICODE);
	}
?>