<?php include("head.php"); 
include "conn.php";
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码,不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
$sql = "SELECT DISTINCT 班号 FROM banji";
$result = mysqli_query($conn, $sql);
?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >学生录入</p>
  			<form  id="form3" class="sui-form form-horizontal sui-validate" action="save2.php" method="post" enctype="multipart/form-data">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">学号:</label>
   				 <div class="controls">
     				 <input id="xh"  name="xh" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=5|maxlength=6">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">班号：</label>
   				 <div class="controls">
             <select id="bh1" name="bh1">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row['班号']}'>{$row['班号']}</option>";
  }
}else{
  echo "<option value=''>请先添加班级信息</option>";
}
 ?>       
           </select>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">姓名：</label>
   				 <div class="controls">
     				 <input id="xm" name="xm" class="input-large input-fat" type="text" placeholder="请输入姓名">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">照片:</label>
           <div class="controls">
             <input type="file" name="file">
           </div>
      </div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">性别：</label>
   				 <div class="controls">
     				<!--  <input id="xb" name="xb" class="input-large input-fat" type="text" placeholder="请输入性别"> -->
             <label class="radio-pretty inline checked">
                <input type="radio" value="1" checked="checked" name="xb"><span>男</span>
             </label>
             <label class="radio-pretty inline">
                <input type="radio" value="0" name="xb"><span>女</span>
             </label>
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">出生日期：</label>
   				 <div class="controls">
     				 <input id="csrq" name="csrq" class="input-large input-fat" type="text" placeholder="请输入出生日期">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">电话号码:</label>
           <div class="controls">
             <input id="dhhm" name="dhhm" class="input-large input-fat" type="text" placeholder="请输入电话号码">
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
<script>
var dhhm = document.getElementById('dhhm');
var tga =  /(^1[3|5|8|4|7][0-9]{9}$)/;
dhhm.onblur = function(){
  var str = dhhm.value;
  if (tga.test(str)) {
    alert("手机号码正确");
  }else{
   alert("无效手机号码");
  }
}
</script>