<?php
	$kcname = $_POST["kcname"];
	$kcTime = $_POST["kcTime"];
	//如果是录入页面提交,那么$action等于add;
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "index2.php";
		$sql1 = "insert into course(课程名,时间) value('$kcname','$kcTime')";
	}else if($action == "update"){
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "kc-xiugai.php";
		$kid = $_POST["kid"];
		$sql1 = "update course set 课程名 = '{$kcname}',时间='{$kcTime}' where 课程编号={$kid}";
	}else{
		die("请选择操作方法");
	}
	echo $kcname;
	echo $kcTime;
	//创建连接
	include("conn.php");

	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
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