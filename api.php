<?php
include "conn.php";
$action = empty($_REQUEST['action'])?"null":$_REQUEST['action'];

$responseArr = array(
	"code"=>200,
	"data"=>null,
	"msg"=>"数据获取成功",
	// "count"=>0 //总记录数
);
switch ($action) {
	case 'student':
	// 	$sql = "select count(id) as allnum from student";
	// 	$r = mysqli_query($conn, $sql);
	// 	$a = mysqli_fetch_assoc($r);
	// 	$responseArr["count"] = $a["allnum"];

	// 	$pageNum = empty($_REQUEST['pageNum'])?1:$_REQUEST['pageNum'];
	// 	$pageSize = empty($_REQUEST['pageSize'])?6:$_REQUEST['pageSize'];

		$sql = "select * from ".$action;
		$result = mysqli_query($conn,$sql);
		if( mysqli_num_rows($result)>0 ){
			$stdentlist = array();
			while( $row = mysqli_fetch_assoc($result) ){
				$stdentlist[]= $row;
			}
			//var_dump($stdentlist);
			$responseArr["data"] = $stdentlist;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die( json_encode($responseArr) );
		break;
	case 'news':
		$sql1 = "select * from ".$action;
		$result1 = mysqli_query($conn, $sql1);
		if( mysqli_num_rows($result1)>0 ){
			$newslist = array();
			while( $row1 = mysqli_fetch_assoc($result1) ){
				$newslist[]= $row1;
			}
			// var_dump($newslist);
			$responseArr["data"] = $newslist;
		}else{
			$responseArr["code"] = 207;
			$responseArr["msg"] = "暂无记录";
		}
		die( json_encode($responseArr) );
		break;	
	default:
		echo "请指定正确的参数";
		break;
}
?>
