$(function(){
	//初始化table
	var oTable = new TableInit();
	oTable.init();
})
var TableInit = function() {
	var oTableInit = new Object();
	//初始化table
	oTableInit.init = function(){
		$('#vessel-table').bootstrapTable({
			url:'getData',//请求后台的url 获取展示数据
			method:'get',
			toolbar:'#toolbar',//工具栏按钮存放容器
			striped:true,//是否启用各行显色
			cache:false,//是否启用缓存,默认是true
			pagination:true,//是否显示分页
			sortable:true,//是否启用排序
			sortOrder:'desc',//排序规则
			queryParams:queryParams,//请求服务器端时 发送的请求参数 即查询条件
			sidePagination:'server',//分页方式：client客户端分页方式,server服务端分页方式
			pageNumber:1,//初始化加载第一页 默认第一页
			pageSize:5,//每页显示记录数
			pageList:[10,20,50,'All'],//可供选择的每页显示记录数
			paginationPreText: "上一页",
			paginationNextText: "下一页",
			search:true,//是否显示表格搜索
			strictSearch: true,
			showColumns:true,//是否显示所有列 下拉按钮
			showRefresh:true,//是否显示刷新按钮
			minimumCountColumns:2,//最少允许的列数
			clickToSelect:false,//是否启用点击选中行
			height:'',//行高 如果没有height属性 表格胡根据记录数自动调整高度
			uniqueId:'id',//每一行的唯一标识 一般为主键
			showToggle:true,//是否显示详情视图和列表视图的切换按钮
			cardView:false,//是否显示详情视图
			detailView:false,//是否显示父子表
			buttonsClass: 'btn',
			iconSize: 'pager',
			columns:[
				{checkbox:true},
				{field:'id',title:'订单id'},
				{field:'user_id',title:'用户id'},
				{field:'express_no',title:'订单号'},
				{field:'out_order_no',title:'外部单号'},
				{field:'expressid',title:'快递编号',editable:{
					type:'text',
					title:'快递编号'
				}},
				{field:'price',title:'价格'},
				{field:'addressee',title:'收件人'},
				{field:'a_mphone',title:'收件人手机'},
				{field:'all_address',title:'收件地址'},
				{field:'create_time',title:'下单时间'},
				{field:'operate',title:'操作',align:'center', width:'120px',
					formatter:function(value,row,index){
			            var e = '<a href="#" mce_href="#" onclick="edit(\''+ row.id + '\')">编辑</a> ';
			            var d = '<a href="#" mce_href="#" onclick="del(\''+ row.id +'\')">删除</a> ';
			            return e+d;
			        }
		        }
			],
		});
		//得到查询参数
		function queryParams(params){
			// console.log(params)
			var temp = {
				limit:params.limit,//获取每页显示的记录数
				offset:params.offset,//从第几条数据开始
				search:params.search,//查询条件
				currentPage:(params.offset/params.limit)+1//页码
			};
			return temp;
		}
	}
	//用户退出
	$("#logout").on('click',function(){
		// console.log('hello world')
	})
	//编辑数据 在初始化table里面定义函数时 要用window全局曝光 否则不生效
	window.edit = function(id){
		console.log(id)
	}
	return oTableInit;
}
//编辑数据 在初始化table外面定义函数时 正常写就行了
// function edit(id){
// 	console.log(id);
// }

// var array = ['name','xiaoming','age',20,'address','nanjing'];
// console.log(typeof(array));
// var array = new Array();
// array['a1'] = 2;
// array['a2'] = 3;
// console.log(array.length);
// var arr = new Array();
// arr[2] = 2;
// console.log(arr.length);

