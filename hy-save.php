<?php
	$yj = $_REQUEST["yj"];
	$nc = $_REQUEST["nc"];
	$password = $_REQUEST["password"];
	$ts = $_REQUEST["ts"];
	$da = $_REQUEST["da"];
	$kid = $_POST["kid"];
	$str1 = "数据更新成功";
	$str2 = "数据更新失败";
	$url = "hy-xiugai.php";
	$kid = $_POST["kid"];
	$sql1 = "update user set email='{$yj}',name='{$nc}',password='{$password}',question='{$ts}',answer='{$da}' where id='{$kid}'";

	include ('conn.php');
	//执行SQL语句
	$result = mysqli_query($conn,$sql1);

	//输出数据
	if ($result) {
		echo "<script>alert('$str1');</script>";
		header("Refresh:1;url={$url}");
	}else{
		echo "$str2".mysqli_error($conn);
	}

	//关闭数据库
	mysqli_close($conn);
?>
