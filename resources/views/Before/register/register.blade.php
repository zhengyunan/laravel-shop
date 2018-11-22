<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
	<title>个人注册</title>


    <link rel="stylesheet" type="text/css" href="/Before/css/webbase.css" />
    <link rel="stylesheet" type="text/css" href="/Before/css/pages-register.css" />
</head>

<body>
	<div class="register py-container ">
		<!--head-->
		<div class="logoArea">
			<a href="" class="logo"></a>
		</div>
		<!--register-->
		<div class="registerArea">
			<h3>注册新用户<span class="go">我有账号，去<a href="{{route('user_login')}}" target="_blank">登陆</a></span></h3>
			<div class="info">
				<form action="{{route('doregister')}}" method="post" class="sui-form form-horizontal">
				{{csrf_field()}} 
					<div class="control-group">
						<label class="control-label">用户名：</label>
						<div class="controls">
							<input name="username" type="text" placeholder="请输入你的用户名" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">登录密码：</label>
						<div class="controls">
							<input type="password" name="password" placeholder="设置登录密码" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">确认密码：</label>
						<div class="controls">
							<input type="password" name="repassword" placeholder="再次确认密码" class="input-xfat input-xlarge">
						</div>
					</div>
					
					<div class="control-group">
						<label class="control-label">手机号：</label>
						<div class="controls">
							<input type="text" name="tel" placeholder="请输入你的手机号" class="input-xfat input-xlarge">
						</div>
					</div>
					<div class="control-group">
						<label for="inputPassword" class="control-label">短信验证码：</label>
						<div class="controls">
							<input name="mobile_code" type="text" placeholder="短信验证码" class="input-xfat input-xlarge"><input type="button" value="发送验证码" id="btn-send">
						</div>
					</div>
					
					<div class="control-group">
						<label for="inputPassword" class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<div class="controls">
							<input name="m1" type="checkbox" value="2" checked=""><span>同意协议并注册《品优购用户协议》</span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"></label>
						<div class="controls btn-reg">

							<button src="submit">注册</button>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
		<!--foot-->
		<div class="py-container copyright">
			<ul>
				<li>关于我们</li>
				<li>联系我们</li>
				<li>联系客服</li>
				<li>商家入驻</li>
				<li>营销中心</li>
				<li>手机品优购</li>
				<li>销售联盟</li>
				<li>品优购社区</li>
			</ul>
			<div class="address">地址：北京市昌平区建材城西路金燕龙办公楼一层 邮编：100096 电话：400-618-4000 传真：010-82935100</div>
			<div class="beian">京ICP备08001421号京公网安备110108007702
			</div>
		</div>
	</div>


<script type="text/javascript" src="/Before/js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/Before/js/plugins/jquery.easing/jquery.easing.min.js"></script>
<script type="text/javascript" src="/Before/js/plugins/sui/sui.min.js"></script>
<script type="text/javascript" src="/Before/js/plugins/jquery-placeholder/jquery.placeholder.min.js"></script>
<script type="text/javascript" src="/Before/js/pages/register.js"></script>
</body>

</html>

<script>
     var seconds = 60;
		 var si;
	   $("#btn-send").click(function(){
			 //获取手机号码
			 
			 var tel = $("input[name=tel]").val();
            //  console.log(tel);
			 //执行AJAX发送到服务器
			 $.ajax({
				  type:"GET",  
					url:"{{route('ajax-send-modbile-code')}}",
					data:{'tel':tel},
					success:function(data){
						$("#btn-send").attr('disabled',true);

						//每秒执行一次
            si = setInterval(function(){
            
						seconds--;
						if(seconds==0){
							//生效
							$("#btn-send").attr('disabled',false);
							seconds=60;
							$("#btn-send").val("发送验证码");
							//关闭定时器
							clearInterval($si);
						}else{
							$("#btn-send").val("还剩："+(seconds));
						}
						},1000);


					}
			 });
		 });
	</script>