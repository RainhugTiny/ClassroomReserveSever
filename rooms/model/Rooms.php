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
}