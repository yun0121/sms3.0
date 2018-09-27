<?php include("head.php")?>
<?php
	$xm6 = $_POST["xm6"];
	$xh6 = $_POST["xh6"];
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if ($action == "add") {
		$str1 = "数据查询成功!";
		$str2 = "对不起,查找不到该数据!";
		$url = "index6.php";
		$sql1 = "select*from student where 姓名='{$xm6}' or 学号='{$xh6}'";
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
	}else{
		echo "{$str2}";
	}
//关闭数据库
mysqli_close($conn);
?>
<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >学生列表</p>
  			<table class="sui-table table-primary">
            <tr><th>编号</th><th>学号</th><th>班号</th><th>姓名</th><th>性别</th><th>出生日期</th><th>电话号码</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
    	 $row1 = $row['性别']==1?'男':'女';
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['学号']}</td>
      <td>{$row['班号']}</td>
      <td>{$row['姓名']}</td>
      <td>{$row1}</td>
      <td>{$row['出生日期']}</td>
      <td>{$row['电话号码']}</td>
      <td><a class='sui-btn btn-xlarge btn-primary' href='xs.update.php?kid={$row['id']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-xlarge btn-danger' href='xs-del.php?kid={$row['id']}'>删除</a></td>
      </tr>";
    };
  }else{
    echo "没有记录";
  }
?>
        </table>
  		</div>
</div>
	</div>
<?php include("foot.php")?>