<?php
	$yj = $_POST["yj"];
	$nc = $_POST["nc"];
	$password = $_POST["password"];
	$repassword = $_POST["repassword"];
	$yzm = $_POST["yzm"];
	$ts = $_POST["ts"];
	$da = $_POST["da"];
	echo $yj;
	echo $nc;
	echo $password;
	echo $repassword;
	echo $yzm;
	echo $ts;
	echo $da;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "index2.php";
		$sql1 = "INSERT INTO `user`(`email`, `name`, `password`, `question`, `answer`) VALUES ('$yj','$nc','$password','$ts','$da')";
	}
	//创建连接
	include("conn.php");
	//选择要操作的数据库
	mysqli_select_db($conn,"user");
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	// var_dump($result);
	if ($result) {
		echo "<script>alert('{$str1}')</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "{$str2}";
	}
//关闭数据库
mysqli_close($conn);
?>