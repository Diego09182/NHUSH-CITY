<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $subject = $_POST["subject"]; 
  $content = $_POST["content"]; 
  $current_time = date("Y-m-d H:i:s");
  $avater = $_POST["avater"];
  $reply_id = $_POST["reply_id"];

  //建立資料連接
  $link = create_connection();
	
  //執行SQL查詢
  $sql = "INSERT INTO reply_message(author, subject, content, date, avater,reply_id) 
          VALUES ('$author', '$subject', '$content', '$current_time', '$avater','$reply_id')";
  $result = execute_sql($link, "news", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:show_posts.php?id=" . $reply_id);
  exit();
?>