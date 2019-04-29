<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
	/**
	 * 注册页面
	 * @Author   zsw
	 * @DataTime 2019-02-18T11:09:17+0800
	 * @return   [type]                   [description]
	 */
    public function register()
    {
    	// dd('hello world');
    	return view('user.register');
    }
    /**
     * 处理注册
     */
    public function doregister(Request $request)
    {
    	$data =  $request->all();
    	$uname = $data['userName'];//用户名
    	$password = $data['password'];//密码
    	$md5Pwd = md5($password);
    	// //获取密码盐
    	$salt = str_shuffle($md5Pwd);//把加密后的字符串随机打乱
    	$salt = substr($salt, mt_rand(0,strlen($md5Pwd)-11),10);
    	// //获取加盐的密码
    	$password = md5($password.$salt);
    	// //存入数据库
    	$res['user_name'] = $uname;
    	$res['password'] = $password;
    	$res['salt'] = $salt;
    	$res['create_time'] = time();
    	$sql = DB::table('lv_user')->insertGetId($res);
    	if($sql){
    		//注册成功后把用户信息保存在session中
    		$res['user_id'] = $sql;
    		Session::put('user_info',$res);
    		//注册成功后生成token令牌
    		$token['user_id'] = $sql;//用户id
    		$token['expires_time'] = strtotime("+1 days");//token的有效期为一天
    		$set_token = base64_encode($sql.strtotime("+1 days"));//生成token
    		$token['token'] = $set_token;
    		$token['create_time'] = time();
    		//token保存到数据库
    		$res = DB::table('lv_utoken')->insert($token);
    		return response()->json(['code'=>1,'url'=>'test']);
    	}
    }
    /**
     * 登录页面
     */
    public function login()
    {
    	//验证用户是否已经登录
    	if(Session::has('user_info.user_id')){
    		return redirect('test');
    	}
    	return view('user.login');
    }
    /**
     * 验证用户登录
     */
    public function dologin(Request $request)
    {
    	//获取用用户信息
    	$info = $request->all();
    	$uname = $info['userName'];//用户名
    	$password = $info['password'];//密码
    	//获取密码盐
    	$salt = DB::table('lv_user')->where('user_name',$uname)->value('salt');
    	//获取加密后的密码
    	$md5 = md5($password.$salt);
    	$sql = DB::table('lv_user')->where(['user_name'=>$uname,'password'=>$md5])->first();
    	if($sql){
    		//保存信息到session中
    		$uinfo['user_id'] = $sql->id;
    		Session::put('user_info',$uinfo);
    		//用户登录的信息正确情况下 更新用户的token
    		$user_id = $sql->id;
    		$token['expires_time'] = strtotime("+1 days");//token的有效期为一天
    		$set_token = base64_encode($user_id.strtotime("+1 days"));//生成token
    		$token['token'] = $set_token;
    		// $token['user_id'] = $user_id;
    		//把token保存到session中
    		Session::put('token',$set_token);
    		DB::table('lv_utoken')->where('user_id',$user_id)->update($token);
    		return response()->json(['code'=>1,'url'=>'test']);
    	}else{
    		return response()->json(['code'=>0,'msg'=>'登录失败,账号或密码错误']);
    	}
    }
    /**
     * 退出登录
     */
    public function logout()
    {
    	Session::flush();
    	return redirect('login');
    }
}
