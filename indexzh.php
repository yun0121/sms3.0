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
		}
		#yz{
			display: inline-block;
			width: 50px;
			height: 20px;
			border:1px solid red;
		}
	</style>
</head>
<body>
	<div id="box">
		<div id="box1">
			<form id="form3" class="sui-form form-horizontal sui-validate" action="savezh.php" method="post">
			<div class="control-group">
          		<label class="control-label" for="inputEmail">用户邮件:</label>
           		<div class="controls">
             		<input id="yj1" name="yj1"  class="input-large input-fat" type="text" placeholder="邮箱" data-rules="required|email">
           		</div>
      		</div>
      		<div class="control-group">
          		<label class="control-label" for="inputEmail">验证码:</label>
           		<div class="controls">
             		<input id="yzm1" name="yzm1"  class="input-large input-fat" type="text" placeholder="请输入验证码">
           		</div>
				<span id="yz"></span>
      		</div>
      		<div class="control-group">
          		<label class="control-label" for="inputEmail">密码提示:</label>
           		<div class="controls">
             		<select id="ts1" name="ts1">
   						<option value='你的小学在哪里上'>你的小学在哪里上</option>
   						<option value='你的最好朋友的姓名'>你的最好朋友的姓名</option>
   						<option value='你的最有纪念意义的日期'>你的最有纪念意义的日期</option>
           			</select>
           		</div>
      		</div>
      		<div class="control-group">
          		<label class="control-label" for="inputEmail">答案:</label>
           		<div class="controls">
             		<input id="da1" name="da1"  class="input-large input-fat" type="text" placeholder="请核对你的密码">
           		</div>
      		</div>
      		<div class="control-group">
 				<label class="control-label"></label>
 				<div class="controls">
 					<input type="submit" value="登录" name="" class="sui-btn btn-large btn-primary">
 				</div>
 			</div>
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
	var co = "";
	var random = ['1','2','3','4','5','6','7','8','9','0','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
	var len = random.length;
	for (var i = 0;i<4;i++) {
		var index=Math.floor(Math.random()*len);
		co=co+random[index];
	}
	console.log(co);
	yz.innerHTML = co;
	yzm.onblur = function(){
		var panduan = yzm.value;
		if (panduan.length == 0) {
			alert("验证码不能为空");
		}else if(panduan!=co){
			alert("验证码不正确")
		}else{
			alert("验证码输入正确");
		}
	}
</script>