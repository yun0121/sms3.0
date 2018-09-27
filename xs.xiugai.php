  <?php include("head.php")?>
  <?php
  //创建连接
  include("conn.php");

  //选择要操作的数据库
  mysqli_select_db($conn,"student_dbs");
  //设置读取数据库的编码,不然显示汉字为乱码
  mysqli_query($conn,"set names utf8");
  //执行SQL语句
  $sql = "select id,学号,班号,姓名,照片,性别,出生日期,电话号码 from student";
  $result = mysqli_query($conn,$sql);
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
  			<p class="sui-text-xxlarge" >班级列表</p>
  			<table class="sui-table table-primary">
            <tr><th>编号</th><th>学号</th><th>班号</th><th>姓名</th><th>照片</th><th>性别</th><th>出生日期</th><th>电话号码</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      $row1 = $row['性别']==1?'男':'女';
      echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['学号']}</td>
      <td>{$row['班号']}</td>
      <td>{$row['姓名']}</td>
      <td>{$row['照片']}</td>
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
