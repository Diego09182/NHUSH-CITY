<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $tag = $_POST["tag"];
  $subject = $_POST["subject"]; 
  $content = $_POST["content"]; 
  $current_time = date("Y-m-d H:i:s");
  $id = $_POST["user_id"];
  
  //建立資料連接
  $link = create_connection();
  			
  //執行SQL查詢
  $sql = "INSERT INTO systemupdate(author, tag, subject, content, date,user_id)
          VALUES ('$author', '$tag', '$subject', '$content', '$current_time','$id')";
  $result = execute_sql($link, "news", $sql);
  
  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:main.php");
  exit();
  
  
?>