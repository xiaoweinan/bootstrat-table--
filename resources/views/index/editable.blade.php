<!DOCTYPE html>
<html>
<head>
	<title>x-editable的使用</title>
	<meta charset="utf-8">
	<script type="text/javascript" src='js/jquery-3.31.min.js'></script>
	<script type="text/javascript" src="js/bootstrap-table/dist/dropdown.js"></script>
	<script type="text/javascript" src="js/bootstrap-table/dist/popper.min.js"></script>
	<!-- 引入bootstrap组件 -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap/dist/css/bootstrap.css">
	<script type="text/javascript" src='js/bootstrap/dist/js/bootstrap.js'></script>
	<!-- 引入x-editable组件 -->
	<link rel="stylesheet" type="text/css" href="js/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css">
	<script type="text/javascript" src="js/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.js"></script>
	<!-- 引入bootstrap-table组件 -->
	<link rel="stylesheet" type="text/css" href="js/bootstrap-table/dist/bootstrap-table.css">
	<script type="text/javascript" src="js/bootstrap-table/dist/bootstrap-table.js"></script>
	<script type="text/javascript" src='js/bootstrap-table/dist/locale/bootstrap-table-zh-CN.js'></script>
	<link rel="stylesheet" type="text/css" href='js/open-iconic-master/font/css/open-iconic-bootstrap.css'>
</head>
<body>
	<div class="container">
		<a href="#" id="username">用户名</a>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#username').editable({
				mode:'inline',
				type:'text',
			})
		})	
	</script>
</body>
</html>