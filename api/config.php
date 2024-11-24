<?php
	header("Content-Type:text/html;charset=utf-8");
	error_reporting(E_ALL^ E_NOTICE);	//关闭非致命的提示 
	date_default_timezone_set("PRC");
	//error_reporting(0);	//关闭全部报错！
    //数据库信息
    $dbsql=array(
        'host' => 'localhost',	//IP地址
        'port' => 3306,			//mysql端口（默认）
        'user' => 'root',		//数据库用户名
        'pwd' => '',			//数据库密码
        'dbname' => 'message'		//数据库名
    );
    //连接数据库
    $conn=mysqli_connect($dbsql['host'],$dbsql['user'],$dbsql['pwd']); 
    if(!$conn){
	echo json_encode(array('state'=>'400','msg'=>'数据库连接失败'),JSON_UNESCAPED_UNICODE);
	exit;
	}
    mysqli_select_db($conn,$dbsql['dbname']);
    $conn->query("set names utf8");

?>