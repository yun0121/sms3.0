<?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >学生信息查询</p>
  			<form id="form5" action="save4.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">姓名：</label>
   				 <div class="controls">
     				 <input id="xm6" name="xm6" class="input-large input-fat" type="text" placeholder="请输入姓名" data-rules="minlength=2|maxlength=10">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">学号:</label>
           <div class="controls">
             <input id="xh6" name="xh6" class="input-large input-fat" type="text" placeholder="请输入学号">
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

