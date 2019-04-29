<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class IndexController extends Controller
{
    /**
     * 测试
     */
    public function test()
    {
        //判断用户是否登录
        $user_id = Session::get('user_info.user_id');
        if(!$user_id){
            return redirect('login');
        }
        // echo Session::get('token');
        $sql = DB::table('lv_utoken')->where('token',Session::get('token'))->value('user_id');
        if(empty($sql)){
            Session::flush();
            return '该账户在其他设备登录!强制下线';
        }
    	return view('index.index');
    }
    /**
     * 获取数据
     */
    public function getData(Request $request)
    {
    	$offset = $request->input('offset');
    	$limit = $request->input('limit');//每页显示记录数
    	$currentPage = ceil($request->input('currentPage'));//当前页码
    	$data = DB::select('select * from lv_order');
    	$num = count($data);//总记录数
    	//判断当前页码是否存在
    	// $currentPage = empty($currentPage)?1:$currentPage;
    	
    	// 动态获取当前页数据
    	$row = DB::table('lv_order')->offset($offset)->limit($limit)->get();
    	foreach($row as $val){
    		$lists[] = [
    			'id'=>$val->id,
    			'user_id'=>$val->user_id,
    			'express_no'=>$val->express_no,
    			'out_order_no'=>$val->out_order_no,
    			'expressid'=>$val->expressid,
    			'price'=>$val->price,
    			'addressee'=>$val->addressee,
    			'a_mphone'=>$val->a_mphone,
    			'all_address'=>$val->all_address,
    			'create_time'=>$val->create_time,
    		];
    	}
    	$rows = $lists;
    	$json = ['total'=>$num,'rows'=>$rows];
    	return json_encode($json);
    }
    /**
     * 正则匹配去除所有空格
     * @Author   zsw
     * @DataTime 2019-02-13T16:15:16+0800
     * @return   [type]                   [description]
     */
    public function env()
    {
    	$str = '   1 ';
    	dump(preg_replace('# #','',$str));
    }
    /**
     * 
     */
    public function api()
    {
        return json_encode(['name'=>'xiaowei','age'=>23,'address'=>'nanjin']);
    }
    /**
     * x-editable表格行内编辑
     */
    public function editable(){
        return view('index.editable');
    }
}
