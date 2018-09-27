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
      $sql = "select id,学号,课程编号,成绩 from xuanxiu where id={$kid}";
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
  			<p class="sui-text-xxlarge" >成绩修改</p>
  			<form id="form1" action="save3.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">学号:</label>
   				 <div class="controls">
              <!--增加一个隐藏的input,用来区分是新增数据还是修改数据-->
              <input type="hidden" name="action" value="update">
              <!--增加一个隐藏的input,保存课程编号-->
              <input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
     				 <input id="xh1" value="<?php echo $row['学号']?>" name="xh1" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
 			<div class="control-group">
          <label class="control-label" for="inputEmail">课程编号:</label>
           <div class="controls">
             <input id="kc" name="kc" value="<?php echo $row['课程编号']?>" class="input-large input-fat" type="text" placeholder="请输入课程编号">
           </div>
 			</div>
     <div class="control-group">
          <label class="control-label" for="inputEmail">成绩:</label>
           <div class="controls">
             <input id="cj" name="cj" value="<?php echo $row['成绩']?>" class="input-large input-fat" type="text" placeholder="请输入成绩">
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

