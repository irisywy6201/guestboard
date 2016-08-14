<?php
header("Content-Type:text/html; charset=utf-8");
require_once("connMysql.php");
if(isset($_POST["action"])&&($_POST["action"]=="add")){
  $query_insert = "INSERT INTO `user_reply` (`reply`,`time`) VALUES (";
  $query_insert .= "'".$_POST["reply"]."')";  	
  $query_insert .= "NOW(),";
  mysql_query($query_insert);
  //回到留言板
  header("Location: indexboard1.php");
} 
$pageRow_records = 5;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecBoard = "SELECT * FROM `board` ORDER BY `time` DESC";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecBoard = $query_RecBoard." LIMIT ".$startRow_records.", ".$pageRow_records;
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecBoard 中
$RecBoard = mysql_query($query_limit_RecBoard);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecBoard 中
$all_RecBoard = mysql_query($query_RecBoard);
//計算總筆數
$total_records = mysql_num_rows($all_RecBoard);
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);


if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["loginMember"]);
  header("Location: login.php");
}
?>

<style>
body{
  background: #ddccff !important;
}
#myModal{
    background-color: rgba(0, 0, 0, 0.5);
}
</style>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>留言版</title>
<link rel="shortcut icon" href="http://img02.tooopen.com/Downs/images/2010/7/31/sy_20100731140000541079.jpg">
</head>

<body>
	<table width="700" border="0" align="center" cellpadding="0" cellspacing="10">
  <section id="header-wrapper">
  <header id ="header">
    <div style ="padding: 20px 10px 20px 100px; float:center"></div>
        <td><table align="right" border="0" cellpadding="0" cellspacing="0" width="700">
        <tr>
          <p align="center"><font face="cursive"><font color="#0000a0"><font size=10>Message Board</font></font></font></p>
          <br></br>
          <form>
          <td><p align="center"><a href="?logout=true"><INPUT TYPE="BUTTON" VALUE="logout"></a></p></td>
          <p align="center"><a href="post.php"><INPUT TYPE="BUTTON" VALUE="leave a message"></a></p>
        </form>
      </table><br><br><hr></td>
    </header>
</section>
  </tr>
<td class="tdbline"><center><table width="40%" border="0" cellspacing="0" cellpadding="0">
     <tr valign="top">
        <td width="500">
        <div class="boxtl"></div><div class="boxtr"></div>
        <div class="regbox">
        	<?php while($row_RecBoard=mysql_fetch_assoc($RecBoard)){ ?>
        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
              <span class="name"><font face="cursive">ID:</span></td>
            <td><font face="cursive"><span class="heading"><font size=5> Subject:<?php echo $row_RecBoard["subject"];?></span></font>
              <p><font face="cursive"><font size=4>Content:<?php echo nl2br($row_RecBoard["content"]);?></p>
              <p align="right"><font size=2><?php echo $row_RecBoard["time"];?></p>

                <hr></td>
          </tr>  
        </table>
        <?php }?>



        <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
          <tr>
            <td valign="middle"><p>items：<?php echo $total_records;?></p></td>
            <td align="right"><p>
                <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
                <a href="?page=1">first page</a> | <a href="?page=<?php echo $num_pages-1;?>">previous page</a> |
                <?php }?>
                <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
                <a href="?page=<?php echo $num_pages+1;?>">next page</a> | <a href="?page=<?php echo $total_pages;?>">last page</a>
                <?php }?>
              </p></td>
          </tr>
        </table>
      </div></td>
     </tr>
</body>
</html>