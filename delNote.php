<?php
  require_once("dbtools.inc.php");

  $now_note_id = $_COOKIE{"note_id"};
  
  //建立資料連接
  $link = create_connection();
  
  $sql = "DELETE FROM note WHERE id = '$now_note_id'";
  
  $result = execute_sql($link, "note", $sql);
  
  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:myhome.php");
  exit();
?>