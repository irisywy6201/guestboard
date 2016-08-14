<?php
  require_once("connect.php");
// register的驗證
function reg($username,$password,$confirmpassword){
  $sql="SELECT * FROM user WHERE guestName='$username';";
  $result = mysql_query($sql);
  $row = mysql_fetch_row($result);
  if($username==null){
    echo"<font color='red'>錯誤！使用者名稱不能為空！</font>";
    echo'<meta http-equiv="refresh" content="2; url=register.php">';
  }
  elseif($password==null||$confirmpassword==null){
    echo"<font color='red'>錯誤！密碼(再輸入一次)不能為空！</font>";
    echo'<meta http-equiv="refresh" content="2; url=register.php">';
  }
  elseif($password!=$confirmpassword)
  {
  echo"<font color='red'>錯誤！密碼輸入不一致！</font>";
  echo'<meta http-equiv="refresh" content="2; url=register.php">';
  }
  elseif($username==$row[1]){
    echo "此帳號已有人使用了,換個好嗎";
    echo'<meta http-equiv="refresh" content="2; url=register.php">';
  }
  else{
    $sql="INSERT INTO `user` (guestName,password,confirmpassword) VALUES ('$username', '$password', '$confirmpassword');" ;
    if(mysql_query($sql)){
      echo"<font color='green'>註冊成功！</font>";
      echo'<meta http-equiv="refresh" content="2; url=register.php">';
    }
    else{
      echo"<font color='red'>註冊失敗！</font>";
      echo'<meta http-equiv="refresh" content="2; url=register.php">';
    }
  }
}
// login的驗證
  function login($username,$password){
    $sql="SELECT * FROM user WHERE guestName='$username';";
    $sql2="SELECT * FROM admin WHERE guestName='$username';";
    $result = mysql_query($sql);
    $row = mysql_fetch_row($result);
    $result2 = mysql_query($sql2);
    $row2 = mysql_fetch_row($result2);
    if($username==null||$password==null)
    {
    echo"<font color='red'>錯誤！使用者名稱跟密碼都要填！</font>";
    echo'<meta http-equiv="refresh" content="2; url=login.php">';
    }
    elseif($username!=$row[1] && $username!=$row2[1]){
      echo"<font color='red'>錯誤！查無使用者！</font>";
      echo'<meta http-equiv="refresh" content="10; url=login.php">';
      echo"$username";
    }
    elseif($password!=$row[3]&& $password!=$row2[2])
    {
    echo"<font color='red'>錯誤！密碼錯誤！</font>";
    echo'<meta http-equiv="refresh" content="2; url=login.php">';
    }
    else{
      if($username==$row2[1]){
        echo"<font color='green'>登入成功！</font>";
        echo"管理員";
        echo "你好!";
        echo'<meta http-equiv="refresh" content="2; url=管理員看的.php">';
        $_SESSION['guestName']=$username;
      }
      else{
        echo"<font color='green'>登入成功！</font>";
        echo"尊貴的會員";
        echo $username;
        echo "你好!";
        echo'<meta http-equiv="refresh" content="2; url=留言板登入的.php">';
        $_SESSION['guestName']=$username;
      }
    }
  }
 //登出
 function logout()
 {
 unset($_SESSION['username']);
 echo "登出中...";
 echo'<meta http-equiv="refresh" content="2; url=login.php">';
 }


?>
