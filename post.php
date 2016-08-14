<?php 
header("Content-Type: text/html; charset=utf-8");
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="add")){
  $query_insert = "INSERT INTO `board` (`subject`,`time`,`content`) VALUES (";
  $query_insert .= "'".$_POST["subject"]."',";
  $query_insert .= "NOW(),";
  $query_insert .= "'".$_POST["content"]."')";
  mysql_query($query_insert);
  //回到留言板
  header("Location: indexboard1.php");
} 
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["loginMember"]);
  header("Location: login.php");
}
?>
<style>
body{
  background: #ddccff !important;
}
</style>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言版</title>
<link rel="shortcut icon" href="http://img02.tooopen.com/Downs/images/2010/7/31/sy_20100731140000541079.jpg">
<script language="javascript">
function checkForm(){
  if(document.formPost.boardcontent.value==""){
    alert("請填寫留言內容!");
    document.formPost.boardcontent.focus();
    return false;
  }
    return confirm('確定送出嗎？');
}

</script>
</head>
<table width="700" border="0" align="center" cellpadding="0" cellspacing="10">
  <section id="header-wrapper">
  <header id ="header">
    <div style ="padding: 20px 10px 20px 100px; float:center"></div>
        <td><table align="right" border="0" cellpadding="0" cellspacing="0" width="700">
        <tr>
          <p align="center"><font face="cursive"><font color="#0000a0"><font size=10>Leave A Message</font></font></font></p>
          <br></br>
          <form><p align="center">
          <a href="?logout=true"><INPUT TYPE="BUTTON" VALUE="logout"></a>
          <a href="indexboard1.php"><INPUT TYPE="BUTTON" VALUE="return to message board"></a></p>
        </form>
      </table></td>
    </header>
</section>

   </tr>
  <tr>
    <td class="tdbline"><center><table width="40%" border="0" cellspacing="0" cellpadding="0">
      <tr valign="top">
        <td width="250">
        <div class="boxtl"></div><div class="boxtr"></div>
<div class="regbox">
        <form action="" method="post" name="formPost" id="formPost" onSubmit="return checkForm();">
          <table width="80%" border="0" align="center" cellpadding="10" cellspacing="0">
            <tr valign="top"><br></br>
              <p><font face="cursive"><font size=6>Hi, <?php echo $_SESSION["name"];?></span></p>         
                <p><font size=4>Subject:
                  <input type="text" name="subject" id="subject">
                 </p> 
                <p><font size=4>Content:
                  <textarea name="content" id="content" cols="70" rows="20"></textarea>
              </p>
            </tr>
            <tr valign="top">
              <td colspan="3" align="center" valign="middle"><input name="action" type="hidden" id="action" value="add">
                <input type="submit" name="button" id="button" value="send">
                <input type="reset" name="button2" id="button2" value="reset">
                <input type="button" name="button3" id="button3" value="back" onClick="window.history.back();"></td>
            </tr>
          </table>
        </form>     
</div></td>
        <div class="boxbl"></div><div class="boxbr"></div></td>
      </tr>
    </table></center></td>
  </tr>

</body>
</html>
