<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui.min.css">
	<link rel="stylesheet" href=" http://g.alicdn.com/sj/dpl/1.5.1/css/sui-append.min.css">
	<style>
		#box{
			width:1300px;
			height: 600px;
			margin:50px auto;
			border:1px solid;
			background-color: rgb(242,242,242);
		}
		#box1{
			width: 600px;
			height: 600px;
			margin:30px auto;
			position: relative;
		}
		.top{
			width: 100px;
			height: 50px;
			border:2px solid red;
			text-align: center;
			line-height: 50px;
			display: inline-block;
			position: absolute;
			left: 800px;
			top: 0;
		}
		.top1{
			width: 100px;
			height: 50px;
			border:2px solid red;
			text-align: center;
			line-height: 50px;
			display: inline-block;
			background-color: blue;
			position: absolute;
			left: 900px;
			top: 0;
		}
		.top1 a{
			color: #fff;
		}
		#yz{
			display: inline-block;
			width: 50px;
			height: 20px;
			border:1px solid red;
		}
		#Judge{
			color: red;	
			display: inline-block;
			width: 100px;
			height: 20px;
			margin-top: 5px;
			position: absolute;
			right: 144px;
    		top: 91px;
		}
		#mail_a{
			color: red;	
			display: inline-block;
			width: 100px;
			height: 20px;
			margin-top: 5px;
			position: absolute;
			right: 194px;
    		top: 3px;
		}
		#password_a{
			color: red;	
			display: inline-block;
			width: 100px;
			height: 20px;
			margin-top: 5px;
			position: absolute;
			right: 194px;
    		top: 46px;
		}
		#wangji{
			color: red;
			margin-left: 100px;
		}
	</style>
</head>
<body>
	<div class='top'><a href="index.html">用户注册</a></div>
	<div class="top1"><a href="indexdl.php">用户登录</a></div>
	<div></div>
	<div id="box">
		<div id="box1">
			<form id="form2" class="sui-form form-horizontal sui-validate" method="post">
			<div class="control-group">
          		<label class="control-label" for="inputEmail">用户邮件:</label>
           		<div class="controls">
             		<input id="yj" name="yj"  class="input-large input-fat" type="text" placeholder="邮箱" data-rules="required|email">
           		</div>
      		</div>
      		<span id="mail_a"></span>
      		<div class="control-group">
          		<label class="control-label" for="inputEmail">密码:</label>
           		<div class="controls">
             		<input name="password" title="密码" id="inputPassword" type="password" placeholder="密码" data-rules="required" class="input-large input-fat">
           		</div>
      		</div>
      		<span id="password_a"></span>
      		<div class="control-group">
          		<label class="control-label" for="inputEmail">验证码:</label>
           		<div class="controls">
             		<input id="yzm" name="yzm"  class="input-large input-fat" type="text" placeholder="请输入验证码">
           		</div>
				<span id="yz"></span>
      		</div>
      		<span id="Judge"></span>
      		<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" id="tijiao" value="登录" name="" class="sui-btn btn-large btn-primary">
 				</div>
 			</div>
 			<a href="indexzh.php" id="wangji">忘记密码</a>
		</form>
		</div>
	</div>
</body>
</html>
 <script type="text/javascript" src="http://g.alicdn.com/sj/lib/jquery/dist/jquery.min.js"></script>
  <script type="text/javascript" src="http://g.alicdn.com/sj/dpl/1.5.1/js/sui.min.js"></script>
<script>
	var yz = document.getElementById('yz');
	var yzm = document.getElementById('yzm');
	var yj = document.getElementById('yj');
	var Judge_a = document.getElementById("Judge");
	var co = "";
	var random = ['1','2','3','4','5','6','7','8','9','0','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var len = random.length;
	for (var i = 0;i<4;i++) {
		var index=Math.floor(Math.random()*len);
		co=co+random[index];
	}
	yz.innerHTML = co;
	yzm.onblur = function(){
		var panduan = yzm.value;
		var small_a = co.toLowerCase();
		if (panduan.length == 0) {
			Judge_a.innerHTML = "验证码不能为空";
		}else if(panduan!=small_a){
			Judge_a.innerHTML="验证码不正确";
		}else{
			Judge_a.innerHTML="验证码输入正确";
		}
	}
	// yj.onblur = function(){
	// 	document.cookie = "email="+yj.value;
	// 	console.log(document.cookie);
	// 	}
	$("#tijiao").on("click",function(){
		//使用$.ajax()提交数据
		$.ajax({
			url  : "savedl-ajax.php",
			type : "POST",
			data : $("#form2").serialize(),
			dataType:"JSON",
			beforeSend:function(){
				//发送前调用此函数。一般在此编写检测代码或者loading
			},
			success: function(data,textStatus){
				//请求成功后调用此函数
				if(data.code == 200){
					console.log("登陆成功");
					console.log(data);
					$(window).attr('location','index1.php');
				}
				if(data.code == 20001){
					$("#password_a").html("密码错误");
				}
				if(data.code == 20004){
					$("#mail_a").html("该邮箱未注册,请先注册");
				}
			},
			error : function(XMLHttpRequest,textStatus,errorThrown){
				//请求失败后调用此函数
				console.log("失败原因" + errorThrown);
			}
		});
		return false;
	});
</script>