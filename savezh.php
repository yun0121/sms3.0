<?php
	session_start();
	$yj1 = $_POST["yj1"];
	$ts1 = $_POST["ts1"];
	$da1 = $_POST["da1"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$url = "index1.php";
		$sql1 = "select * from user where email='{$yj1}' and question = '{$ts1}' and answer = '{$da1}'";
	}
	//创建连接
	include("conn.php");
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);
	//输出数据
	// var_dump($result);
	if (mysqli_num_rows($result)>0){
		$arr = mysqli_fetch_assoc($result);
		$_SESSION['usname'] = $arr["name"];
		echo "<script>alert('登录成功')</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "登录失败";
	}
//关闭数据库
mysqli_close($conn);
?>