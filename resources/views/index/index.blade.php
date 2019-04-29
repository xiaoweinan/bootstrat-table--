<!DOCTYPE html>
<html>
<head>
	<title>laravel使用</title>
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
	<script type="text/javascript" src="js/bootstrap-table/dist/extensions/editable/bootstrap-table-editable.js"></script>
	<link rel="stylesheet" type="text/css" href='js/open-iconic-master/font/css/open-iconic-bootstrap.css'>
	<!-- 引入自定义js -->
	<script type="text/javascript" src='js/index.js'></script>
</head>
<body>
	 <div id="toolbar" class="btn-group">
        <button id="btn_add" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>新增
        </button>
        <button id="btn_edit" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>修改
        </button>
        <button id="btn_delete" type="button" class="btn btn-default">
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>删除
        </button>
        <button id="logout" type="button" class="btn btn-default">
            <a href="logout"><font color="red">退出</font></a>
        </button>
    </div>
	<table id='vessel-table' data-classes="table table-hover table-condensed"></table>
	{$json}
</body>
</html>
<script type="text/javascript">
	var str = '{ "name": "programer", "age": "18" }';
	obj = JSON.parse(str);
	console.log(obj.name)
</script>