<?php 
namespace app\rooms\model; 
 
use think\Model; 
use think\Db; 
 
class Rooms extends Model {     
  public function getInfo($date = 'monday')   
  {   
    $res = Db::name('rooms')->where('date', $date)->select();       
    return $res;  
  } 
  public function setInfo($date,$room,$username)
  {
    $res1=Db::name('rooms')->where('date',$date)->setfield($room,2);
    $user=['username'=>$username,'room'=>$room,'date'=>$date];
    $ok=db('userinf')->insert($user);
    return $ok;
  }
  public function getUserInfo($username)
  {
    $res = Db::name('userinf')->where('username', $username)->select();       
    return $res; 
  }
  public function deleteUserInfo($date,$room)
  {
    $res1=Db::name('rooms')->where('date',$date)->setfield($room,1);
    $res = Db::name('userinf')->where('room',$room)->delete(); 
    return $res;
  }
  public function userRegist($name,$password)
  {
    $user=['user_name'=>$name,'user_pwd'=>md5($password)];
    $ok=db('users')->insert($user);
    return $ok;
  }
  public function userLogin($name,$password)
  {
    $has = db('users')->where('user_name', $name)->find();
    if($has['user_pwd'] != md5($password)){
    	$this->error('用户名密码错误');
    }
    return $has['user_pwd'] == md5($password);
  }
}