<?php include("head.php");
include "conn.php";
//选择要操作的数据库
mysqli_select_db($conn,"student_dbs");
//设置读取数据库的编码,不然显示汉字为乱码
mysqli_query($conn,"set names utf8");
$sql = "SELECT `id` FROM `user` WHERE name = '{$_SESSION['usname']}'";
$sql1 = "SELECT DISTINCT id,name FROM newscolumn";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
if (mysqli_num_rows($result)>0) {
          //将查询结果转换成数组
          $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有记录";
      };
?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >新闻发布模块</p>
  			<form id="form1" action="nrelease-save.php" method="post" class="sui-form form-horizontal sui-validate" enctype="multipart/form-data" >
  			<div class="control-group">
    			<label class="control-label" for="inputEmail">标题:</label>
   				 <div class="controls">
     				 <input id="bt" name="bt" class="input-large input-fat" type="text" placeholder="请输入" data-rules="required|minlength=5|maxlength=50">
   				 </div>
 			</div>
 			<div class="control-group">
    			<label class="control-label" for="inputEmail">肩题:</label>
   				 <div class="controls">
     				 <input id="jt" name="jt" class="input-large input-fat" type="text" placeholder="请输入">
   				 </div>
 			</div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">照片:</label>
           <div class="controls">
             <input type="file" name="file">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">作者:</label>
           <div class="controls">
            <input type="hidden" name="zz" value="<?php echo $row['id']; ?>">
            <input type="text" readonly= "true"  class="input-large input-fat" value="<?php echo $_SESSION['usname']?>">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">时间:</label>
           <div class="controls">
             <input id="sj" name="sj" class="input-large input-fat" type="text" placeholder="请输入">
           </div>
      </div>
       <div class="control-group">
          <label class="control-label" for="inputEmail">内容:</label>
           <div class="controls">
            <textarea rows="7" cols="100" name="nr"></textarea>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">栏目:</label>
           <div class="controls">
           <select id="lm" name="lm">
<?php
if( mysqli_num_rows($result1) > 0 ){
  while ( $row1 = mysqli_fetch_assoc($result1) ) {
    echo "<option value='{$row1['id']}'>{$row1['name']}</option>";
  }
}else{
  echo "<option value=''>请先添加栏目</option>";
}
 ?>       
           </select>
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