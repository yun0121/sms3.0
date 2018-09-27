<?php
  //创建连接
  include("conn.php");
  $kid = empty($_GET["kid"])?"null":$_GET["kid"];
  //执行SQL语句
  $sql = "select * from news where id={$kid}";
  $sql1 = "SELECT * FROM news LIMIT 0,5";
  $result = mysqli_query($conn,$sql);
  $result1 = mysqli_query($conn,$sql1);
   if (mysqli_num_rows($result)>0) {
          //将查询结果转换成数组
          $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有记录";
      };
  //关闭数据库
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="xwfb.css">
</head>
<body>
	<div class="box">
		<div class="header">
			<span class="maskFif"></span>
			<div class="inner">
				<h1 class="logo">
					<a href="#">
						<span class="cn"></span>
					</a>
				</h1>
				<div class="nav01">
					<a href="#">首页</a>
					<a href="#">师资队伍</a>
					<a href="#">专业设置</a>
					<a href="#">招生就业</a>
					<a href="#">北网新闻</a>
					<a href="#">走进北网</a>
					<a href="#">联系我们</a>
				</div>
			</div>
		</div>
		<div class="section08">
			<div class="wrap">
				<div class="breadBox">
					<h2>北网新闻</h2>
					<a href="index1.php">主页</a>
					<a href="index1.php">北网新闻</a>
				</div>
			</div>
		</div>
		<div class="section17">
			<div class="clearfix wrap">
				<div class="boxL">
					<div class="block26">
						<div class="tit06">
							<h4>
								<font color="#2052af">北网新闻</font>
								<font color="f7931e"></font>
							</h4>
						</div>
						<div class="innerBox">
							<h2><?php echo $row['标题']; ?></h2>
							<div class="other">
								<span class="d"><?php echo $row['发布时间']; ?></span>
								<span class="tag"></span>
							</div>
							<div class="txt">
							<?php echo $row['内容']; ?>
							<div style="text-align: center;">
								<img src="<?php echo $row['图片']; ?>" style="width: 819px; height: 520px;">
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="boxR">
					<div class="block30">
						<div class="border"></div>
						<div class="inner">
							<div class="tit">
								<h2>最新资讯</h2>
							</div>
							<?php
								 if (mysqli_num_rows($result1)>0) {
          							//将查询结果转换成数组
          							while ($row1 = mysqli_fetch_assoc($result1)){
          							echo "
										<div class='txt01'>
											<div class='t'>{$row1['发布时间']}  | </div>
											<div class='d'>
												<a href='#'>{$row1['标题']}</a>
											</div>
										</div>";
          							};
      							}else{
          							echo "没有记录";
      							};
							?>
							<div class="tit">
								<h2>北京网络职业学院</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
