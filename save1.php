<?php
	$bh = $_POST["bh"];
	$bh1 = strtoupper($bh);
	echo $bh1;
	$bz = $_POST["bz"];
	$js = $_POST["js"];
	$bzr = $_POST["bzr"];
	$bjkh = $_POST["bjkh"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "index3.php";
		$sql1 = "insert into banji(班号,班长,教室,班主任,班级口号) value('$bh1','$bz','$js','$bzr','$bjkh')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "bj.xiugai.php";
		$kid = $_POST["kid"];
		$sql1 = "update banji set 班号='{$bh1}',班长='{$bz}',教室='{$js}',班主任 ='{$bzr}',班级口号='{$bjkh}' where 班号='{$kid}'";
	}else{
		die("请选择操作方法");
	}
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