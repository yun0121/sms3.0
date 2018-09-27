<?php
//创建连接
include("conn.php");

//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码,不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
//执行SQL语句
$sql = "delete from banji where 班号='{$_GET['kid']}'";
echo($sql);
$result = mysqli_query($conn,$sql);
if ($result) {
		echo "<script>alert('数据删除成功')</script>";
		//暂停
		header("Refresh:0.2;url=bj.xiugai.php");
	}else{
		echo "数据删除失败".mysqli_error($conn);
	}
//关闭数据库
mysqli_close($conn);
?>