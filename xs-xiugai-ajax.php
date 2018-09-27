  <?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  		<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<p class="sui-text-xxlarge" >班级列表</p>
  			<table class="sui-table table-primary" id="ph">
            <tr><th>编号</th><th>学号</th><th>班号</th><th>姓名</th><th>照片</th><th>性别</th><th>出生日期</th><th>电话号码</th><th>操作</th></tr>
              <tbody id="inner">

              </tbody>
        </table>
  		</div>
</div>
	</div>
<?php include("foot.php")?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script id="temlate1">
{{each arr val idx}}
    <tr>
      <td>{{val.id}}</td>
      <td>{{val.学号}}</td>
      <td>{{val.班号}}</td>
      <td>{{val.姓名}}</td>
      <td>{{val.照片}}</td>
      <td>{{val.性别}}</td>
      <td>{{val.出生日期}}</td>
      <td>{{val.电话号码}}</td>
      <td><a class='sui-btn btn-xlarge btn-primary' href='xs.update.php?kid={{val.id}}'>修改</a>&nbsp;&nbsp;&nbsp;<a class='sui-btn btn-xlarge btn-danger' href='xs-del.php?kid={{val.id}}'>删除</a></td>
    </tr>
{{/each}}
</script>
<script>
  $(function(){
    $.ajax({
      url:"api.php",
      type:"POST",
      dataType:"json",
      data:{
        "action":"student"
      },
      beforeSend:function(XMMLHttpRequest){
        $("#studentlist").html("<tr><td>正在查询,请稍后...</td></tr>")
      },
      success:function(data,textStatus){
        console.log(data.data);
        if (data.code == 200) {
            // var str = "";
            // for(var i = 0;i < data.data.length;i++){
            //     console.log(data.data[i]);
            //     str += "<tr><td>" + data.data[i].id + "</td><td>" + data.data[i].姓名+"</td><td>" + data.data[i].性别+"</td><td>" + data.data[i].出生日期+"</td><td>" + data.data[i].电话号码+"</td><td></td></tr>";  第一种方法
            // }
              // att(data);   第二种方法
            var arr = data.data;//声明一个变量为arr
            var html = template('temlate1',{"arr":arr});
            $("#inner").html(html);//第三种办法

            // $("#ph").html(str);
            // console.log(str); 
        }
      },
      error:function(XMLHttpRequest,textStatus,errorThrown){
        //请求失败后调用此函数
        console.log("失败原因: "+ errorThrown);
      }
    });
  })
     //遍历JSON的函数
//   function att(data){
//   for (var i = 0; i < data.data.length; i++) {
//     var $trs = $("<tr></tr>");
//     for(j in data.data[i]){
//       var $tds = "<td>" + data.data[i][j] + "</td>";
//       $trs.append($tds);
//     }
//     $("#ph").append($trs);
//   }
// }
</script>

