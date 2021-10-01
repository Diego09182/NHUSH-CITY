<?php
  require_once("dbtools.inc.php");
	
  $title = $_POST["title"];
  $tag = $_POST["tag"]; 
  $introduction = $_POST["introduction"]; 
  $article_content = $_POST["article_content"];
  $image_url = $_POST["image_url"]; 
  $current_time = date("Y-m-d H:i:s");
  $owner_id = $_POST["owner"];
  
  //建立資料連接
  $link = create_connection();
			
  //執行SQL查詢
  $sql = "INSERT INTO article(title, tag, introduction, article_content, image_url, owner, date)
          VALUES ('$title','$tag','$introduction','$article_content','$image_url','$owner_id','$current_time')";
  $result = execute_sql($link, "news", $sql);

  //關閉資料連接
  mysqli_close($link);
  
  //將網頁重新導向
  header("location:home_article.php");
  exit();
?>