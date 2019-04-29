<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//学习使用消息队列
class MqueueController extends Controller
{
	public function producer()
	{
		$msgqueue = DB::table('lv_queue');
		//模拟用户下单
		$mobile = $_GET['mobile'];
		$order_id = mt_rand(10000,99999);
		$data['mobile'] = $mobile;
		$data['order_id'] = $order_id; 
		//死循环插入数据库
		if(!empty($mobile)){
			while(1){
				$sql = $msgqueue->insert($data);
				sleep(2);
			}
		}
	}
}



	$file =input('post.avatar');
	if(!$file){
		$this->error('请上传需要导入的表格！支持csv,xls,xlsx格式！');
	}
	$filePath = ROOT_PATH . DS . 'public' . DS . $file;
	if (!is_file($filePath)) {
		$this->error('上传的表格不存在，请核实');
	}
	$PHPReader = new \PHPExcel_Reader_Excel2007();
		if (!$PHPReader->canRead($filePath)) {
			$PHPReader = new \PHPExcel_Reader_Excel5();
		if (!$PHPReader->canRead($filePath)) {
			$PHPReader = new \PHPExcel_Reader_CSV();
			$PHPReader->setInputEncoding('GBK');
			if (!$PHPReader->canRead($filePath)) {
				$this->error(__('Unknown data format'));
			}
		}
	}         
    for($i=2;$i<=$allRow;$i++){
        switch ($express_id) {
            case 1:
                //接口请求参数
                $post_info = [
                    
                ];
                //请求接口
                $json = sendRequest('',$post_info,'POST');
                $return = json_decode($json,1);
                $code = $return['code'];
                if($code==0){
                    $return_data = $return['data'];
                    $taskid = $return_data['recordId'];
                    //处理成功时的业务逻辑
                    $result = [];
                    $result[$i] = [
                        
                    ];
                    //更新用户信息
                    $yu_money = $yu_money-$total_fee;
                    \app\common\model\User::score($score=0,'-'.$total_fee,$uid,'购买礼品，编号'.$retu[$i]['id']);
                    $continue_num = $continue_num+1;
                }else{
                    $this->error($return['msg']);
                }
                break;
            default:
                # code...
                break;
        }
    }