	<?php include("head.php")?>
	<div class="sui-container">
		<div class="sui-layout">
  		<div class="sidebar">
  			<!-- 左菜单 -->
			<?php include("menuleft.php")?>
  		</div>
  		<div class="content">
  			<h2>学生管理系统</h2>
        <div class="inner">
            <ul id="list">
              
            </ul>
        </div>
  		</div>
</div>
<?php include("foot.php")?>
<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
  $(function(){
    $.ajax({
      url:"api.php",
      type:"POST",
      dataType:"json",
      data:{
        "action":"news"
      },
      beforeSend:function(XMMLHttpRequest){
        $("#newslist").html("<tr><td>正在查询,请稍后...</td></tr>")
      },
      success:function(data,textStatus){
        console.log(data.data);
        if (data.code == 200) {
          var str1 = "";
            for(var i = 0;i < data.data.length;i++){
                console.log(data.data[i].内容);
                str1 += "<li><div class='block'><a href='xwfb.php?kid=" + data.data[i].id + "'><img src='" + data.data[i].图片 + "' class='img'></a></div><div class='dat'>" + data.data[i].发布时间 + " | 北网新闻 </div><div class='tit'><h2><a> " + data.data[i].肩题 + "</a></h2></div><div class='dig'>" + data.data[i].内容 + "</div></li>";
            }
            
            console.log(str1);
            $("#list").html(str1);
        }
      },
      error:function(XMLHttpRequest,textStatus,errorThrown){
        //请求失败后调用此函数
        console.log("失败原因: "+ errorThrown);
      }
    });
  })
</script>

// <script>
//     // document.cookie = "name = lixiangyun;expires=Thu,22 Aug 2018 00:00:00 GMT";
//     //第二种方法
//     // var days = 30;
//     // var daysTime = 30*24*60*60*1000;//转换成毫秒
//     // var exp = new Date();
//     // exp.setTime(exp.getTime() + daysTime);//设置为30天后
//     // document.cookie = "name = lixiangyun;expires="+exp.toGMTString();
//     // document.cookie = "password = 123456";
// </script>

