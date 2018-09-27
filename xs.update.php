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
      $sql = "select id,学号,班号,姓名,照片,性别,出生日期,电话号码 from student where id={$kid}";
      $result = mysqli_query($conn,$sql);

      if (mysqli_num_rows($result)>0) {
          //将查询结果转换成数组
          $row = mysqli_fetch_assoc($result);
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
        <p class="sui-text-xxlarge" >学生信息修改</p>
        <form  id="form3" class="sui-form form-horizontal sui-validate" action="save2.php" method="post" enctype="multipart/form-data">
        <div class="control-group">
          <label class="control-label" for="inputEmail">学号:</label>
           <div class="controls">
             <!--增加一个隐藏的input,用来区分是新增数据还是修改数据-->
              <input type="hidden" name="action" value="update">
              <!--增加一个隐藏的input,保存课程编号-->
              <input type="hidden" name="kid" value="<?php echo $row['id']; ?>">
             <input id="xh"  name="xh" value="<?php echo $row['学号']?>" class="input-large input-fat" type="text" placeholder="请输入学号" data-rules="required|minlength=6|maxlength=6">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">班号：</label>
           <div class="controls">
             <input id="bh1" name="bh1" value="<?php echo $row['班号']?>" class="input-large input-fat" type="text" placeholder="请输入班号">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">姓名：</label>
           <div class="controls">
             <input id="xm" name="xm" value="<?php echo $row['姓名']?>" class="input-large input-fat" type="text" placeholder="请输入姓名">
           </div>
      </div>
      <div class="control-group">
          <input type="hidden" name="tp" value="<?php echo $row['照片']; ?>">
          <label class="control-label" for="inputEmail">照片:</label>
           <div class="controls">
              <img width="80" height="150" src="<?php echo $row['照片']; ?>">
              <input type="file" name="file">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">性别：</label>
           <div class="controls">
             <label class="radio-pretty inline <?php if($row['性别']=='1'){echo 'checked';} ?>">
                <input type="radio" value="1" checked="checked" name="xb"><span>男</span>
             </label>
             <label class="radio-pretty inline <?php if($row['性别']=='0'){echo 'checked';} ?>">
                <input type="radio" value="0" name="xb"><span>女</span>
             </label>
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">出生日期：</label>
           <div class="controls">
             <input id="csrq" value="<?php echo $row['出生日期']?>" name="csrq" class="input-large input-fat" type="text" placeholder="请输入出生日期">
           </div>
      </div>
      <div class="control-group">
          <label class="control-label" for="inputEmail">电话号码:</label>
           <div class="controls">
             <input id="dhhm" value="<?php echo $row['电话号码']?>" name="dhhm" class="input-large input-fat" type="text" placeholder="请输入电话号码">
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
<script>
var dhhm = document.getElementById('dhhm');
console.log(dhhm);
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