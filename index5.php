<?php include("head.php"); 
include "conn.php";
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码,不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
$sql = "SELECT * FROM `course` WHERE 1";
$result = mysqli_query($conn, $sql);
?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >成绩录入</p>
  			<form id="form4" action="save3.php" method="post" class="sui-form form-horizontal sui-validate">
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">学号：</label>
   				 <div class="controls">
     				 <input id="xh1" name="xh1" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=2|maxlength=10">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">课程名:</label>
   				 <div class="controls">
             <select id="kc" name="kc">
<?php
if( mysqli_num_rows($result) > 0 ){
  while ( $row = mysqli_fetch_assoc($result) ) {
    echo "<option value='{$row['课程编号']}'>{$row['课程名']}</option>";
  }
}else{
  echo "<option value=''>请先添加课程信息</option>";
}
 ?>       
           </select>
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">成绩:</label>
           <div class="controls">
             <input id="cj" name="cj" class="input-large input-fat" type="text" placeholder="请输入成绩">
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

