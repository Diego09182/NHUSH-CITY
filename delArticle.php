<?php
  require_once("dbtools.inc.php");

  $now_article_id = $_COOKIE{"article_id"};
  
  //建立資料連接
  $link = create_connection();
  
  $sql = "DELETE FROM article WHERE id = '$now_article_id'";
  
  $result = execute_sql($link, "news", $sql);
  
  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:home_article.php");
  exit();
?>