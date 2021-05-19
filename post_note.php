<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $subject = $_POST["subject"]; 
  $content = $_POST["content"]; 
  $current_time = date("Y-m-d H:i:s");
  $owner_id = $_POST["owner"]; 

  //建立資料連接
  $link = create_connection();
			
  //執行SQL查詢
  $sql = "INSERT INTO note(author, subject, content, owner ,date)
          VALUES ('$author', '$subject', '$content', '$owner_id' ,'$current_time')";
  $result = execute_sql($link, "note", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:myhome.php");
  exit();
?>