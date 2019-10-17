var validate = {
	user_account : false,
	user_pwd		 : false,
	repwd    : false,
	code   : false,
	loginUser_account : false,
	loginUser_pwd : false,
	loginCode:false

};
var msg = '';

//验证注册表单
$(function(){
	var register = $('form[name=register]');
	register.submit(function() {
		var isOk = validate.user_account&& validate.user_pwd && validate.repwd && validate.code;
		if(isOk) {
			return true;
		}
		//点击提交按钮依次触发失去焦点再次验证
		$('input[name=user_account]', register).trigger('blur');
		$('input[name=user_pwd]', register).trigger('blur');
		$('input[name=repwd]', register).trigger('blur');
		$('input[name=code]', register).trigger('blur');
		return false;

	});
	//-------验证用户名-------
	$('input[name=user_account]', register).blur(function(){
		var user_account = $(this).val();
		var span = $(this).next();
		//不能为空
		if(user_account== ''){
			msg = '用户名不能为空！';
			span.html(msg).addClass('error');
			validate.user_account = false;
			return;
		}
		if(!/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/g.test(user_account)&&
			!/^1[3456789]\d{9}$/g.test(user_account)){
			msg = '必须是电话号码或邮箱';
			span.html(msg).addClass('error');
			validate.user_account = false;
			return;
		}
		//异步验证用户名是否存在
		$.ajax({
			type : "get",
			url:"http://localhost/tp/index.php/home/login/checkName",
			// url:"login/checkName",
			// url : "<{url('login/checkName')}>",
			data : {
			  user_account : user_account
			}, //携带的参数
			dataType:'json',
			beforeSend:function(){
				msg = '请求中';
				span.html(msg).addClass('error');
			},
			// var data=JSON.parse(ajax.responseText),
			success : function(res) {
				//根据后台返回前台的msg给提示信息加HTML
				// alert (data.status);
				if (res.status==1) {
						// 账号已经存在
					msg = '账号已存在';
					span.html(msg).addClass('error');
					validate.user_account = false;
					}else {
					msg = '可以注册';
					span.html(msg).removeClass('error');
					validate.user_account= true;
					 }
			 },
			 error:function () {
				 msg = '网络异常';
				 span.html(msg).addClass('error');
				 validate.user_account = false;
			 }
		});
	});
	//---------验证密码-------------
	$('input[name=user_pwd]', register).blur(function(){
		var user_pwd = $(this).val();
		var span = $(this).next();
		//不能为空
		if(user_pwd == ''){
			msg = '密码不能为空';
			span.html(msg).addClass('error');
			validate.user_pwd = false;
			return;
		}
		//正则判断
		if(!/^\w{6,20}$/g.test(user_pwd)){
			msg = '密码必须由6-20个字母，数字，或者下划线组成';
			span.html(msg).addClass('error');
			validate.user_pwd = false;
			return;
		}

		msg = '';
		validate.user_pwd = true;
		span.html(msg).removeClass('error');

	});

	//确认密码
	$('input[name=repwd]', register).blur(function(){
		var repwd = $(this).val();
		var span = $(this).next();
		//确认密码不能为空
		if(repwd== ''){
			msg = '请确认密码';
			span.html(msg).addClass('error');
			validate.repwd = false;
			return;
		}
		//两次密码是否相同
		if(repwd != $('input[name=user_pwd]', register).val()){
			msg = '两次密码不一致！';
			span.html(msg).addClass('error');
			validate.repwd = false;
			return;
		}
		msg = '';
		span.html(msg).removeClass('error');
		validate.repwd = true;


	});
	//发送验证码
	$(".sendCode",register).click(function () {
		var obj=$(this);
		//用户名自动触发
		$("input[name='user_account']",register).trigger('blur');
		// $("input[name='user_pwd']",register).trigger('blur');
		// 取用户名
		var user_account=$("input[name='user_account']").val().trim();
		if(validate.user_account){
		//	发送短信
			$.ajax({
				url:"http://localhost/tp/index.php/home/login/sendCode",
				// url:"login/sendCode",
				// url:"<{url('login/sendCode')}>",
				type:"get",
				data : {
					user_account : user_account
				},
				dataType:'json',
				beforeSend:function () {
					obj.html("发送中")
				},
				success : function(res) {
					//根据后台返回前台的msg给提示信息加HTML
					// alert (data.status);
					if (res.status==0) {
						obj.html("发送失败");
						validate.code = false;
					}else {
						obj.html("发送成功");
						validate.code= true;
					}
				},
				error:function () {
					obj.html("网络异常");
					validate.code = false;
				}
			});
		}
	});

	//-------验证验证码-----
	$('input[name=code]', register).blur(function() {
		var code = $(this).val();
		var span = $(this).next().next();
		//不能为空
		if(code == ''){
			msg = '请输入验证码';
			span.html(msg).addClass('error');
			validate.code = false;
			return;
		}
		//异步验证码判断
		$.ajax({
			type:'get',
			url:"http://localhost/tp/index.php/home/login/checkCode",
			// url:"login/checkCode",
			data:{
			    code:code
			},
			dataType:"json",
			success : function(res) {
				//根据后台返回前台的msg给提示信息加HTML
				// alert (data.status);
				if (res.status==1) {
					msg = '验证码正确';
					span.html(msg).addClass('error');
					validate.code = true;
					return;
				}else {
					msg = '验证码错误';
					span.html(msg).addClass('error');
					validate.code = false;
					return;
				}
			},
			error:function () {
				msg = '网络异常';
				span.html(msg).addClass('error');
				validate.code = false;
				return;
			}


		})

	});

	//登录form 表单验证 
	var login = $('form[name=login]');
	//登录提交事件
	login.submit(function() {
		//&& validate.loginUser_pwd
		if(validate.loginUser_account && validate.loginCode ){
			return true;
		} 
		//依次触发失去焦点动作
		$('input[name=user_account]', login).trigger('blur');
		$('input[name=code]', login).trigger('blur');
		$('input[name=user_pwd]', login).trigger('blur');
		return false;
	});

	//验证登录用户名
	$('input[name=user_account]', login).blur(function() {
		var user_account = $(this).val();
		var span = $('#login-msg');
		//为空的情况
		if(user_account == ''){
			span.html('请填入账号');
			validate.loginUser_account = false;
			return;
		}
		//格式判断
		if(!/^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/g.test(user_account)&&
			!/^1[3456789]\d{9}$/g.test(user_account)){
			span.html('必须是电话号码或邮箱');
			validate.loginUser_account = false;
			return;
		}
	//验证唯一性
		$.ajax({
			type:'get',
			url:"http://localhost/tp/index.php/home/binding/checkName",
			data:{
				user_account:user_account
			},
			dataType:"json",
			success : function(res){
              if(res.status==1){
				  span.html('用户已绑定');
				  validate.loginUser_account = false;
				  return;
			  }else {
				  span.html('可以绑定');
				  validate.loginUser_account = true;
				  return;
			  }
			},
			error : function(res){
				span.html('网络异常');
				validate.loginUser_account = false;
				return;
			}

		})



	});
	//发送验证码
	$(".sendCode",login).click(function () {
		var obj=$(this);
		//用户名自动触发
		$("input[name='user_account']",login).trigger('blur');
		// $("input[name='user_pwd']",register).trigger('blur');
		// 取用户名
		var user_account=$("input[name='user_account']").val().trim();
		if(validate.loginUser_account){
			//	发送短信
			$.ajax({
				url:"http://localhost/tp/index.php/home/binding/sendCode",
				// url:"<{url('login/sendCode')}>",
				type:"get",
				data : {
					user_account : user_account
				},
				dataType:'json',
				beforeSend:function () {
					obj.html("发送中")
				},
				success : function(res) {
					//根据后台返回前台的msg给提示信息加HTML
					// alert (data.status);
					if (res.status==0) {
						obj.html("发送失败");
						validate.loginCode = false;
					}else {
						obj.html("发送成功");
						validate.loginCode= true;
					}
				},
				error:function () {
					obj.html("网络异常");
					validate.loginCode= false;
				}
			});
		}
	});
	//-------验证验证码-----
	$('input[name=code]', login).blur(function() {
		var code = $(this).val();
		var span = $(this).next().next();
		//不能为空
		if(code == ''){
			span.html('验证码不能为空');
			validate.loginCode = false;
			return;
		}
		//异步验证码判断
		$.ajax({
			type:'get',
			url:"http://localhost/tp/index.php/home/binding/checkCode",
			data:{
				code:code
			},
			dataType:"json",
			success : function(res) {
				//根据后台返回前台的msg给提示信息加HTML
				// alert (data.status);
				if (res.status==1) {
					span.html('验证码正确');
					validate.loginCode = true;
					return;
				}else {
					span.html('验证码错误');
					validate.loginCode = false;
					return;
				}
			},
			error:function () {
				span.html('网络异常');
				validate.loginCode = false;
				return;
			}


		})

	});



	//验证密码
	$('input[name=user_pwd]', login).blur(function(){
		var user_pwd = $(this).val();
		var span = $('#home-msg');
		//为空的情况
		if(user_pwd == ''){
			span.html('请输入密码');
			validate.loginUser_pwd = false;
			return;
		}
		//验证验证码
		$.ajax({
			type:'get',
			url:"http://localhost/tp/index.php/home/login/checkPwd",
			data:{
				user_pwd:user_pwd,
			},
			dataType:"json",
			success : function(res) {
				//根据后台返回前台的msg给提示信息加HTML
				// alert (data.status);
				if (res.status==1) {
					span.html('密码正确');
					validate.loginUser_pwd = true;
					return;
				}else {
					span.html('密码错误');
					validate.loginUser_pwd = false;
					return;
				}
			},
			error:function () {
				span.html('网络异常');
				validate.loginUser_pwd = false;
				return;
			}

		});

	})





});