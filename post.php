<?php
  require_once("dbtools.inc.php");
	
  $author = $_POST["author"];
  $tag = $_POST["tag"];
  $subject = $_POST["subject"]; 
  $content = $_POST["content"]; 
  $current_time = date("Y-m-d H:i:s");
  $info = $_POST["info"];
  $id = $_POST["user_id"];
  $likes = $_POST["likes"];
  $dislike = $_POST["dislike"];

  //建立資料連接
  $link = create_connection();
			
  //執行SQL查詢
  $sql = "INSERT INTO message(author, tag, subject, content, date, info, user_id, likes, dislike)
          VALUES ('$author', '$tag', '$subject', '$content', '$current_time', '$info','$id', '$likes', '$dislike')";
  $result = execute_sql($link, "news", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:forum.php");
  exit();
?>