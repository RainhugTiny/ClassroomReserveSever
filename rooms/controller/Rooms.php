<?php
namespace app\rooms\controller;

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
    public function regist()
  {
     $name=input('name');
     $password=input('password');
     //$username=input('username');
     $model = model('Rooms');
     //$data=$model->deleteUserInfo($date,$room,$username);
     $data=$model->userRegist($name,$password);
     return json($data);
  }
  public function login()
  {
     $name=input('name');
     $password=input('password');
     //$username=input('username');
     $model = model('Rooms');
     //$data=$model->deleteUserInfo($date,$room,$username);
     $data=$model->userLogin($name,$password);
     return json($data);
  }
  
}