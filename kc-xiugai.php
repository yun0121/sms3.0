	<?php include("head.php")?>
  <?php
  //创建连接
  include("conn.php");

  //选择要操作的数据库
  mysqli_select_db($conn,"student_dbs");
  //设置读取数据库的编码,不然显示汉字为乱码
  mysqli_query($conn,"set names utf8");
  //执行SQL语句
  $sql = "select 课程编号,课程名,时间 from course";
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
  			<p class="sui-text-xxlarge" >课程列表</p>
  			<table class="sui-table table-primary">
            <tr><th>课程编号</th><th>课程名</th><th>课程时间</th><th>操作</th></tr>
<?php
  if (mysqli_num_rows($result)>0) {
    while ($row = mysqli_fetch_assoc($result)){
      echo "<tr>
      <td>{$row['课程编号']}</td>
      <td>{$row['课程名']}</td>
      <td>{$row['时间']}</td>
      <td><a class='sui-btn btn-xlarge btn-primary' href='kc-update.php?kid={$row['课程编号']}'>修改</a>&nbsp;&nbsp;&nbsp;
      <a class='sui-btn btn-xlarge btn-danger' href='kc-del.php?kid={$row['课程编号']}'>删除</a></td>
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

