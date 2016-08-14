<?php
  header("Content-Type: text/html; charset=utf-8");
  @mysql_connect("localhost","root","1234");
  @mysql_select_db("guestboard");
  @mysql_query("set name utf-8");
  $data=mysql_query('select * from guest order by guestTime desc');//讓資料由最新呈現到最舊
?>
