<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title></title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!-- basic styles -->
		<link href="/Public/assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="/Public/assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->


		<!-- ace styles -->

		<link rel="stylesheet" href="/Public/assets/css/ace.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="/Public/assets/js/ace-extra.min.js"></script>
		<script src="/Public/js/jquery.js"></script>
		<script src="/Public/js/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="/Public/assets/js/html5shiv.js"></script>
		<script src="/Public/assets/js/respond.min.js"></script>
		<![endif]-->
	</head>

<script>
//新建cookie。
//hours为空字符串时,cookie的生存期至浏览器会话结束。hours为数字0时,建立的是一个失效的cookie,这个cookie会覆盖已经建立过的同名、同path的cookie（如果这个cookie存在）。
function setCookie(name,value,hours,path){
    var name = escape(name);
    var value = escape(value);
    var expires = new Date();
     expires.setTime(expires.getTime() + hours*3600000);
     path = path == "" ? "" : ";path=" + path;
     _expires = (typeof hours) == "string" ? "" : ";expires=" + expires.toUTCString();
     document.cookie = name + "=" + value + _expires + path;
}
//获取cookie值
function getCookieValue(name){
    var name = escape(name);
    //读cookie属性，这将返回文档的所有cookie
    var allcookies = document.cookie;    

    //查找名为name的cookie的开始位置
     name += "=";
    var pos = allcookies.indexOf(name);    
    //如果找到了具有该名字的cookie，那么提取并使用它的值
    if (pos != -1){                                             //如果pos值为-1则说明搜索"version="失败
        var start = pos + name.length;                  //cookie值开始的位置
        var end = allcookies.indexOf(";",start);        //从cookie值开始的位置起搜索第一个";"的位置,即cookie值结尾的位置
        if (end == -1) end = allcookies.length;        //如果end值为-1说明cookie列表里只有一个cookie
        var value = allcookies.substring(start,end); //提取cookie的值
        return (value);                           //对它解码      
         }   
    else return "";                               //搜索失败，返回空字符串
}
//删除cookie
function deleteCookie(name,path){
    var name = escape(name);
    var expires = new Date(0);
     path = path == "" ? "" : ";path=" + path;
     document.cookie = name + "="+ ";expires=" + expires.toUTCString() + path;
}

</script>

	<body class="login-layout">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<i class="icon-leaf green"></i>
									<span class="red"></span>
									<span class="white"><?php echo (C("TITLE")); ?></span>
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="icon-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form name="form-login" id="form-login" action="" method="post">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?php echo ($username); ?>"/>
															<i class="icon-user"></i>
														</span>
													</label>

													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" id="password" class="form-control" name="password" placeholder="Password" />
															<i class="icon-lock"></i>
														</span>
													</label>

													<div class="space"></div>
													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" id="remember" class="ace" checked/>
															<span class="lbl"> Remember Me</span>
														</label>
														<button type="button"  onclick="do_submit()"class="width-35 pull-right btn btn-sm btn-primary">
															<i class="icon-key"></i>
															<script>
															function do_submit(){
																if(document.getElementById('remember').checked){
																	
																	setCookie('username',document.getElementById('username').value,24);
																	setCookie('password',document.getElementById('password').value,24);
																}else{
																	deleteCookie('username');
																	deleteCookie('password');
																}
																document.getElementById('form-login').submit();
															}
															</script>
															<a onclick="do_submit()" style="color:#FFFFFF"> Login</a>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

										</div><!-- /widget-main -->

										<div class="toolbar clearfix">

										</div>
									</div><!-- /widget-body -->
								</div><!-- /login-box -->



								<div id="signup-box" class="signup-box widget-box no-border">
									<div class="widget-body">

									</div><!-- /widget-body -->
								</div><!-- /signup-box -->
							</div><!-- /position-relative -->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

<script>
var username = getCookieValue('username');
var password = getCookieValue('password');
document.getElementById('username').value = username;
document.getElementById('password').value = password;
</script>

		<!--[if !IE]> -->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='/Public/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='/Publicassets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			function show_box(id) {
			 jQuery('.widget-box.visible').removeClass('visible');
			 jQuery('#'+id).addClass('visible');
			}
		</script>
</body>
</html>