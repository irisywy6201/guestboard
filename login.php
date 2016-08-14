<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<style>
  .container{
    background-color:	#DDDDDD;
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
<body>
  <div class="container" style="text-align:center;">
    <h1 style="text-align: center;">Login</h1>
    <form method="post" action="loginc.php" name="login">
    <p><strong>Username</strong>：
        <input name="guestName" class="normalinput" id="username" type="text">
        <font color="#ff0000">*</font><br>
    </p>
    <p><strong>Password</strong>：
        <input name="password" class="normalinput" id="password" type="password">
        <font color="#ff0000">*</font><br>
    </p>

    <input name="login" value="登入" type="submit"><br>
    <br>
    沒有帳號？<a href="register.php">註冊</a></td>
  </form>
  </div>
</body>
</html>
