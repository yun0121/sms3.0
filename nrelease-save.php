<?php
	$bt = $_POST["bt"];
	$jt = $_POST["jt"];
	$zz = $_POST["zz"];
	$sj = $_POST["sj"];
	$nr = $_POST["nr"];
	$lm = $_POST["lm"];
	$hc = time();
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/pjpeg"))
		|| ($_FILES["file"]["type"] == "video/mp4")
		&& ($_FILES["file"]["size"] < 10241000)){
		if ($_FILES["file"]["error"] > 0){
  		echo "错误: " . $_FILES["file"]["error"] . "<br />";
  	}else{
  		 //重新给上传的文件名,增加一个年月日时分秒的前缀,并且加上他的保存路径
		 $filename = "upload/".date('YmdHis').$_FILES["file"]["name"];
		 //move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
		 move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
	}
}else{
	$filename = $_POST["tp"];
}
	echo $bt."</br>";	
	echo $jt."</br>";
	echo $zz."</br>";
	echo $sj."</br>";
	echo $nr."</br>";
	echo $lm."</br>";
	echo $hc."</br>";
	if ($action == "add") {
		$str1 = "数据添加成功!";
		$str2 = "数据添加失败!";
		$url = "nrelease.php";
		$sql1 = "insert into news(标题,肩题,图片,内容,发布时间,创建时间,usernd,columind) value('$bt','$jt','$filename','$nr','$sj','$hc','$zz','$lm')";
	}else if ($action == "update") {
		$str1 = "数据更新成功";
		$str2 = "数据更新失败";
		$url = "nrelease-xiugai.php";
		$kid = $_POST["kid"];
		$sql1 = "update news set 标题='{$bt}',肩题='{$jt}',图片='{$filename}',内容='{$nr}',发布时间='{$sj}',usernd='{$zz}',columind='{$lm}' where id='{$kid}'";
	}
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