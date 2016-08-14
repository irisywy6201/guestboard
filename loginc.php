<?php
  require_once("connect.php");

  $username = $_POST['guestName'];
  $password = $_POST['password'];
  include("function.php");//引入函數庫
  // $password_md5 = md5($password); //密碼加密
  login($username,$password);//使用登入函數
?>
