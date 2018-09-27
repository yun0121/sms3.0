<?php
	$xh1 = $_POST["xh1"];
	$kc = $_POST["kc"];
	$cj = $_POST["cj"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	echo $xh1;
	echo $kc;
	echo $cj;
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "index5.php";
		$sql1 = "insert into xuanxiu(学号,课程编号,成绩) value('$xh1','$kc','$cj')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "xx.xiugai.php";
		$kid = $_POST["kid"];
		$sql1 = "update xuanxiu set 学号='{$xh1}',课程编号='{$kc}',成绩 ='{$cj}' where id='{$kid}'";
	};
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