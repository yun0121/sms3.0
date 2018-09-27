<?php
	//创建连接
	include("conn.php");
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	$yj = $_REQUEST["yj"];
	$nc = $_REQUEST["nc"];
	$password = $_REQUEST["password"];
	$ts = $_REQUEST["ts"];
	$da = $_REQUEST["da"];
	$sql1 = "INSERT INTO `user`(`email`, `name`, `password`, `question`, `answer`) VALUES ('$yj','$nc','$password','$ts','$da')";
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	//输出数据
	if ($result) {
		echo "ok";
	}else{
		echo "error";
	}
//关闭数据库
mysqli_close($conn);
?>