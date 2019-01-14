<?php
namespace app\index\controller;
 
use think\Controller;
use think\Db; 
 
class Reserve extends Controller
{
    public function index()
    {
    	return $this->fetch();
    }   
      // 处理预定逻辑
    public function doReserve()
    {
    	$param = input('post.');
    	if(empty($param['date'])){
    		echo "您好：".cookie('info');
    		//$this->error( '日期不能为空');
    	}
    	
    	if(empty($param['roomnumber'])){
    		
    		//$this->error('会议室或教室号码不能为空');
    	}
    	else{
             	// 验证日期
    	$has = db('roomcn')->where('date', $param['date'])->find();
    	if(empty($has)){
    		
    		$this->error('日期错误');
    	}
    	
    	// 验证会议室或教室号码
        
    	if($has['room_'.$param['roomnumber']] =='有课'){
    		cookie('info','房间有课');
    		$this->error('房间有课');
    	}
        if($has['room_'.$param['roomnumber']] =='空闲'){
    		cookie('info','预定成功');
            Db::name('roomcn')->where('date',$param['date'])->setfield('room_'.$param['roomnumber'],'已预定');
            //Db::name('rooms')->where('date','monday')->setfield('room_3101',2);
    		$this->error("预定成功");
    	}
        if($has['room_'.$param['roomnumber']] =='已预定'){
    		cookie('info','房间已预定');
    		$this->error('房间已预定');
    	} 
        }
    }
}