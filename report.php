<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $report = $_POST["report"]; 
  $report_content = $_POST["report_content"]; 
  $current_time = date("Y-m-d H:i:s");
  $reply_id = $_POST["reply_id"];
  
  //建立資料連接
  $link = create_connection();
	
  //執行SQL查詢
  $sql = "INSERT INTO reply_message(author, report, report_content, date, reply_id) 
          VALUES ('$author', '$report', '$report_content','$current_time', '$reply_id')";
  $result = execute_sql($link, "report", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:show_posts.php?id=" . $reply_id);
  exit();
?>