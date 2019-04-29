<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>模拟token登录</title>
	<style>
        input[type]{
            border: 1px solid darkorange;
            background: white;
        }
        #button{
            border: 10px solid orange;
            width: 200px;
            box-shadow:0px 4px 5px #666;
            background: orange;        
            color: white;    
        }
        
    </style>
</head>
<body>
	<form id="register">
		<h3>用户注册</h3>
		<hr>
		<p>用户名:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" id="name" name="userName" placeholder="请填写用户名" required="required"></p>
		<p>密码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="paswd" type="password" placeholder="请填写密码" name="password" required="required"></p>
		<p>确认密码:&nbsp;<input id="paswd2" type="password" name="confirmPwd" placeholder="请确认密码" required="required"></p>
		<p>邮箱:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="email" placeholder="请填写邮箱" name="email" required="required"></p>	
		<p><input type="checkbox" required="required">我已阅读注册手册</p>
		<p><input type="submit" id="button" value="注册"></p>
	</form>
	<script type="text/javascript" src='js/jquery-3.31.min.js'></script>
	<script type="text/javascript">
		$('#button').click(function(){
			$.ajax({
				type:'post',
				dataType:'json',
				url:'doregister',
				headers:{
					'X-CSRF-TOKEN':'{{csrf_token()}}'
				},
				data:$('#register').serialize(),
				success:function(res){
					// console.log(typeof(res))
					location.href = res.url;
				}
			})
			return false;
		})
	</script>
</body>
</html>