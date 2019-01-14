<?php
namespace app\index\controller;

use think\Controller;

class Rooms extends Controller
{
    public function read()
    {
        $date = input('date');
        $model = model('Rooms');
        $data = $model->getInfo($date);
        return json($data);
    }
   public function write()
   {
     $date=input('date');
     $room=input('room');
     $username=input('username');
     $model = model('Rooms');
     $data=$model->setInfo($date,$room,$username);
     return json($data);
   }
  public function userinfo()
  {
    $username=input('username');
    $model=model('Rooms');
    $data=$model->getUserInfo($username);
    return json($data);
  }
  public function cancel()
  {
     $date=input('date');
     $room=input('room');
     //$username=input('username');
     $model = model('Rooms');
     //$data=$model->deleteUserInfo($date,$room,$username);
     $data=$model->deleteUserInfo($date,$room);
     return json($data);
  }
  public function readall()
  {
     $model = model('Rooms');
     $data=$model->getAllRoom();
     //$info=json($data);
     //var_dump($info);
     for ($x=0;$x<7;$x++)
     {
       $monday=$data[$x];
       echo '日期:  '.json_decode(json_encode($monday['date'])).'<br>';
       echo '教室3101  :  '.json_decode(json_encode($monday['room_3101'])).'<br>';
       echo '教室3102  :  '.json_decode(json_encode($monday['room_3102'])).'<br>';
       echo '教室3103  :  '.json_decode(json_encode($monday['room_3103'])).'<br>';
       echo '教室3201  :  '.json_decode(json_encode($monday['room_3201'])).'<br>';
     echo '教室3202  :  '.json_decode(json_encode($monday['room_3202'])).'<br>';
     echo '教室3203  :  '.json_decode(json_encode($monday['room_3203'])).'<br>';
     echo '教室3301  :  '.json_decode(json_encode($monday['room_3301'])).'<br>';
     echo '教室3302  :  '.json_decode(json_encode($monday['room_3302'])).'<br>';
     echo '教室3303  :  '.json_decode(json_encode($monday['room_3303'])).'<br>';
     echo '会议室2101  :  '.json_decode(json_encode($monday['room_2101'])).'<br>';
     echo '会议室2102  :  '.json_decode(json_encode($monday['room_2102'])).'<br>';
     echo '会议室2103  :  '.json_decode(json_encode($monday['room_2103'])).'<br>';
     echo '会议室2201  :  '.json_decode(json_encode($monday['room_2201'])).'<br>';
     echo '会议室2202  :  '.json_decode(json_encode($monday['room_2202'])).'<br>';
     echo '会议室2203  :  '.json_decode(json_encode($monday['room_2203'])).'<br>';
     echo '会议室2301  :  '.json_decode(json_encode($monday['room_2301'])).'<br>';
     echo '会议室2302  :  '.json_decode(json_encode($monday['room_2302'])).'<br>';
     echo '会议室2303  :  '.json_decode(json_encode($monday['room_2303'])).'<br>';
     }
  }
  
}