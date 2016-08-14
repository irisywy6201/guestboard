
<?php
  require_once("connect.php");
?>
<style>
.container{
   background-color:#DDDDDD;
   margin-top: 10%;
   margin-left: 37.5%;
   width: 25%;
   border-radius: 20px;
   padding-top:25px;
   padding-bottom: 60px;
}
body{
   background-image:url("bckgrd.jpg");
   opacity: 0.8;
}

</style>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
  <form action="regc.php" method="post" onsubmit="return checkForm();">
  <div class="container" style="text-align:center;">
    <h1><strong>Register</strong></h1></br>
    <p><strong>Username</strong>：
        <input name="guestName" class="normalinput" id="username" type="text">
        <font color="#ff0000">*</font><br>
    </p>
    <p><strong>Password</strong>：
        <input name="password" class="normalinput" id="password" type="password">
        <font color="#ff0000">*</font><br>
    </p>
    <p><strong>Confirm Password</strong>：
        <input name="confirmpassword" class="normalinput" id="confirmpassword" type="password">
        <font color="#ff0000">*</font><br>
    </p>
    <input name="action" id="action" type="hidden"></br>
    <input name="action" id="action" value="join" type="hidden">
    <input name="Submit2" value="Submit" type="submit">
    <input name="Submit" value="Back" onclick="window.history.back();" type="button">
  </br></br>已有帳號？<a href="login.php">登入</a>
  </form>

  </div>
</body>

</html>
