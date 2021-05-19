<?php
  require_once("dbtools.inc.php");

  $now_post_id = $_COOKIE{"news_id"};
  
  //建立資料連接
  $link = create_connection();
  
  $sql = "UPDATE message SET dislike = dislike + 1  WHERE id = '$now_post_id'";
  
  $result = execute_sql($link, "news", $sql);
  
  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:show_posts.php?id=".$now_post_id."");
  exit();
?>