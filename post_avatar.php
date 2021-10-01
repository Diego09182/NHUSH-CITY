<?php
  require_once("dbtools.inc.php");
	
  $avatar = $_POST["avatar"];
  $owner_id = $_POST["owner"]; 
  
  //建立資料連接
  $link = create_connection();

 //執行 UPDATE 陳述式來更新使用者資料
  $sql = "UPDATE users SET avatar = '$avatar' WHERE id = '$owner_id'";

  $result = execute_sql($link, "member", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:myhome.php");
  exit();
?>