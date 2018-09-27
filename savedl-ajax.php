<?php
	session_start();
	//创建连接
	include("conn.php");
	//选择要操作的数据库
	mysqli_select_db($conn,"student_dbs");
	$yj = $_REQUEST["yj"];
	$password = $_REQUEST["password"];
	$responseArr = array(
		"code" => 200,
		"msg" => "登录成功"
		);
	//首先根据用户提交的邮件查询,如果至少一条记录,则邮箱正确否则邮箱不正确
	$sql1 = "select * from user where email='{$yj}'";
	$result = mysqli_query($conn, $sql1);
	if( mysqli_num_rows($result)>0){
	    //提示邮箱正确
	    //如果邮箱正确，再判断用户提交的密码和上一步查询到密码是否相等，相等则密码正确，否则密码不正确	    
	    	$arr = mysqli_fetch_assoc($result);	
	    	if( $password == $arr["password"]){
	    		//密码也对上了 
				//创建一个session，键为usname,值为$mail
				$_SESSION['usemail'] = $arr["email"];
				$_SESSION['usname'] = $arr["name"];
				$_SESSION['usid'] = $arr["id"];

	    	}else{
	    		//邮件对但密码不对
	    		$responseArr["code"] = 20001;
	    		$responseArr["msg"] = "密码错误";
	    	}
	    }else{
	    	//邮箱不存在
	    	$responseArr["code"] = 20004;
	    	$responseArr["msg"] = "邮件不存在";	    	
	    }
	 // print_r( $result);
	// print_r( $responseArr );
	echo json_encode($responseArr);
	//设置读取数据库的编码,不然显示汉字为乱码
	mysqli_query($conn,"set names utf8");

	//执行SQL语句
	
	//输出数据
	// var_dump($result);
	// if (mysqli_num_rows($result)>0){
	// 	$_SESSION['usname'] = $yj;
	// 	echo "ok";
	// }else{
	// 	echo "error";
	// }
//关闭数据库
mysqli_close($conn);
?>