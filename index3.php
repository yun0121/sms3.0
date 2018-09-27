	<?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >班级录入</p>
  			<form  id="form2" class="sui-form form-horizontal sui-validate" action="save1.php" method="post">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号:</label>
   				 <div class="controls">
     				 <input id="bh"  name="bh" class="input-large input-fat" type="text" placeholder="请输入班号" data-rules="required|minlength=2|maxlength=5">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班长：</label>
   				 <div class="controls">
     				 <input id="bz" name="bz" class="input-large input-fat" type="text" placeholder="请输入班长名称">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">教室：</label>
   				 <div class="controls">
     				 <input id="js" name="js" class="input-large input-fat" type="text" placeholder="请输入教室号">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班主任：</label>
   				 <div class="controls">
     				 <input id="bzr" name="bzr" class="input-large input-fat" type="text" placeholder="请输入班主任名称">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班级口号：</label>
   				 <div class="controls">
     				 <input id="bjkh" name="bjkh" class="input-large input-fat" type="text" placeholder="请输入班级口号">
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