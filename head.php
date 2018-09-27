	<?php session_start(); 
	if(empty($_SESSION['usname'])){
		header("Refresh:1;url=indexdl.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<link rel="stylesheet" href="default.css" type="text/css" />
	<style>
		*{
			margin:0;
			padding:0;
		}
		#box{
			width:1300px;
			height: 600px;
			margin:0 auto;
			border:1px solid;
			background-color: rgb(242,242,242);
		}
		.topnav{
			height: 55px;
			background-color: blue;
		}
		.text{
			width: 270px;
			height: 55px;
			margin:0 auto;
		}
		h1{
			color:#fff;
			font-family:宋体;
			line-height: 55px;
		}4
		.sui-layout .content{
			width: 800px;
			margin-left: 404px;
		}
		.sui-container{
			margin-top: 50px;
		}
		.sui-layout{
			width: 1300px;
		}
		#box1{
			width: 200px;
			height: 20px;
			position: absolute;
			left: 510px;
			bottom: 49px;
			border:1px solid red;
			color:red;
		}
		.content .inner li{
			display: inline-block;
			width: 270px;
			/*background-color: rgb(255,255,255);*/
			height: 262px;
			margin: 47px;
			float: left;
		}
		.content .inner li .block{
			font-size: 100%;
			margin-bottom: 5px;
		}
		.content .inner li .block .img{
			width: 244px;
			height: 147px;
		}
		.content .inner li .dat{
			height: 15px;
			font-size: 100%;
			color: #f7931e;
		}
		.content .inner li .tit a{
			color: #3e3a39;
			overflow: hidden;
		}
		.content .inner li .tit h2{
			font-size: 1em;
			font-weight: normal;
			cursor:pointer;
		}
		.content .inner li .dig{
			color: #b3b3b3;
			overflow: hidden;
			text-overflow: ellipsis;
			white-space: nowrap;

		}
		#oo{
			display: inline-block;
			width: 367px;
			height: 50px;
			position: absolute;
			top: 60px;
			right: 850px;
			text-align: center;
			font-size: 25px;
			line-height: 50px;
			font-weight: 700;
		}
	</style>
</head>
<body>
<div id="box">
		<div class="topnav">
			<div class="text">
				<h1>学生信息统计系统</h1>
				<span><?php echo $_SESSION['usname']; ?></span>
				<a href="login-out.php" >退出</a>
			</div>
		</div>