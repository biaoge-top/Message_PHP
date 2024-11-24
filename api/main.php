<?php
	header("Content-Type:text/html;charset=utf-8");
	error_reporting(E_ALL^ E_NOTICE);	//关闭非致命的提示 
	
	if($_COOKIE['logonid']!=NULL){
		$user=$_COOKIE['logonid'];
	}
	
	require ('config.php');
	//SELECT name,msg,time FROM mess WHERE state = 2
	
	$sql="SELECT id,name,msg,time,back FROM mess WHERE state = 2";
	$messs = mysqli_query($conn, $sql);
	 
	if (mysqli_num_rows($messs) > 0) {
	    // 输出数据
		$mess_list= [];
		$i = 0;
	    while($messlist = mysqli_fetch_assoc($messs)) {
	        $name = $messlist['name'];
	        $msg = $messlist['msg'];
	        $time = $messlist['time'];
	        $back = $messlist['back'];
			$id = $messlist['id'];
	        
	        $mess_list[$i] = array(
	        	"id" => $id,
				"name" => $name,
	        	"msg" => $msg,
	        	"time" => $time,
	        	"back" => $back
	        );   
			$i++;
	    }
		echo json_encode(array('state'=>'200','user'=>$user,'messlist'=>$mess_list),JSON_UNESCAPED_UNICODE);
	} else {
	    echo json_encode(array('state'=>'400','user'=>$user,'msg'=>'未查询到数据！'),JSON_UNESCAPED_UNICODE);
		exit;
	}
?>
