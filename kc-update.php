	<?php include("head.php")?>
  <?php
    $kid = empty($_GET["kid"])?"null":$_GET["kid"];
    if ($kid == "null") {
      die ("请选择要修改的记录");
    }else{
      //创建连接
     include("conn.php");

      //选择要操作的数据库
      mysqli_select_db($conn,"student_dbs");
      //设置读取数据库的编码,不然显示汉字为乱码
      mysqli_query($conn,"set names utf8");
      //执行SQL语句
      $sql = "select 课程编号,课程名,时间 from course where 课程编号={$kid}";
      $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result)>0) {
          //将查询结果转换成数组
          $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有记录";
      }
//关闭数据库
mysqli_close($conn);
    }
  ?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >课程修改</p>
  			<form id="form1" action="kc-save.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程名：</label>
   				 <div class="controls">
              <!--增加一个隐藏的input,用来区分是新增数据还是修改数据-->
              <input type="hidden" name="action" value="update">
              <!--增加一个隐藏的input,保存课程编号-->
              <input type="hidden" name="kid" value="<?php echo $row['课程编号']; ?>">
     				 <input id="kcname" value="<?php echo $row['课程名']?>" name="kcname" class="input-large input-fat" type="text" placeholder="请输入课程名称" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程时间：</label>
   				 <div class="controls">
     				 <input id="kcTime" name="kcTime" value="<?php echo $row['时间']?>" class="input-large input-fat" type="text" placeholder="请输入课程时间">
   				 </div>
 			</div>
 			<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="提交" name="" class="sui-btn btn-large btn-primary">
 				</div>
 			</div>
  			</form>
  		</div>
</div>
	</div>
<?php include("foot.php")?>

