<?php
	$conn = mysqli_connect("localhost","root","");
	//2.选择需要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");
	//执行查询email的sql
	$yj = $_REQUEST["yj"];
	$sql = "select * from user where email = '{$yj}'";
	$result = mysqli_query($conn,$sql);
	if (mysqli_num_rows($result)>0) {
		echo "error";
	}else{
		echo "ok";
	}
	//关闭数据库
	mysqli_close($conn);
?>