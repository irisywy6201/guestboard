<?php
  require_once("connect.php");
  $username = $_POST['guestName'];
  $password = $_POST['password'];
  $confirmpassword = $_POST['confirmpassword'];
  // $password_md5 = md5($password); //密碼加密
  include("function.php");//引入函數庫
  reg($username,$password,$confirmpassword);//使用註冊函數
?>
