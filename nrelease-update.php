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
      $sql = "select id,标题,肩题,图片,内容,发布时间,usernd,columind from news where id={$kid}";
      $sql1 = "SELECT `id` FROM `user` WHERE name = '{$_SESSION['usname']}'";
      $sql2 = "SELECT DISTINCT id,name FROM newscolumn";
      $result = mysqli_query($conn,$sql);
      $result1 = mysqli_query($conn, $sql1);
      $result2 = mysqli_query($conn, $sql2);
      if (mysqli_num_rows($result)>0) {
          //将查询结果转换成数组
          $row = mysqli_fetch_assoc($result);
      }else{
          echo "没有记录";
      };
      if (mysqli_num_rows($result1)>0) {
          //将查询结果转换成数组
          $row1 = mysqli_fetch_assoc($result1);
      }else{
          echo "没有记录";
      };
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
        <p class="sui-text-xxlarge" >新闻发布修改</p>
        <form  id="form3" class="sui-form form-horizontal sui-validate" action="nrelease-save.php" method="post" enctype="multipart/form-data">
        <div class="control-group">
          <label class="control-label" for="inputEmail">标题:</label>
           <div class="controls">
             <!--增加一个隐藏的input,用来区分是新增数据还是修改数据-->
              <input type="hidden" name="action" value="update">
              <!--增加一个隐藏的input,保存课程编号-->
              <input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
             <input id="bt"  name="bt" value="<?php echo $row['标题']?>" class="input-large input-fat" type="text" placeholder="请输入标题">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">肩题：</label>
           <div class="controls">
             <input id="jt" name="jt" value="<?php echo $row['肩题']?>" class="input-large input-fat" type="text" placeholder="请输入肩题">
           </div>
      </div>
      <div class="control-group">
          <input type="hidden" name="tp" value="<?php echo $row['图片']; ?>">
          <label class="control-label" for="inputEmail">图片:</label>
           <div class="controls">
              <img width="80" height="150" src="<?php echo $row['图片']; ?>">
              <input type="file" name="file">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">作者:</label>
           <div class="controls">
            <input type="hidden" name="zz" value="<?php echo $row1['id']; ?>">
            <input type="text" readonly= "true"  class="input-large input-fat" value="<?php echo $_SESSION['usname']?>">
           </div>
      </div>
     <div class="control-group">
          <label class="control-label" for="inputEmail">时间:</label>
           <div class="controls">
             <input id="sj" name="sj" value="<?php echo $row['发布时间']?>" class="input-large input-fat" type="text" placeholder="请输入">
           </div>
      </div>
       <div class="control-group">
          <label class="control-label" for="inputEmail">内容:</label>
           <div class="controls">
            <textarea rows="7" cols="100" name="nr"><?php echo $row['内容']?></textarea>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">栏目:</label>
           <div class="controls">
           <select id="lm" name="lm">
<?php
if( mysqli_num_rows($result2) > 0 ){
  while ( $row2 = mysqli_fetch_assoc($result2) ) {
    echo "<option value='{$row2['id']}'>{$row2['name']}</option>";
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
          <input type="submit" value="确认修改" name="" class="sui-btn btn-large btn-primary">
        </div>
      </div>
        </form>
      </div>
</div>
  </div>
<?php include("foot.php")?>
