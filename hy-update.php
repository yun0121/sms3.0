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
      $sql = "select * from user where id={$kid}";
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
  			<p class="sui-text-xxlarge" >会员修改</p>
  			<form id="form1" action="hy-save.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">用户邮件:</label>
   				 <div class="controls">
              <!--增加一个隐藏的input,用来区分是新增数据还是修改数据-->
              <input type="hidden" name="action" value="update">
              <!--增加一个隐藏的input,保存课程编号-->
              <input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
     				 <input id="yj" name="yj" value="<?php echo $row['email']?>" name="kcname" class="input-large input-fat" type="text" placeholder="请输入修改的邮箱">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">昵称：</label>
   				 <div class="controls">
     				 <input id="nc" name="nc" value="<?php echo $row['name']?>" class="input-large input-fat" type="text" placeholder="请输入修改的昵称">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">密码：</label>
           <div class="controls">
             <input id="password" name="password" value="<?php echo $row['password']?>" class="input-large input-fat" type="text" placeholder="请输入修改的密码">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">密码提示:</label>
          <div class="controls">
          <select id="ts" name="ts">
          <option value='你的小学在哪里上'>你的小学在哪里上</option>
          <option value='你的最好朋友的姓名'>你的最好朋友的姓名</option>
          <option value='你的最有纪念意义的日期'>你的最有纪念意义的日期</option>
          </select>
          </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">答案:</label>
          <div class="controls">
            <input id="da" name="da"  class="input-large input-fat" type="text" placeholder="请核对你的密码" value="<?php echo $row['answer']?>">
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

