<?php

	require_once("dbtools.inc.php");
	
	function test_input($data) {
	  
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
		
	}
	
	function error() {
	  
		header("location:index.html");
		exit();
		
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  
		if (empty($_POST["title"])) {
			error();
		} else {
			$title = test_input($_POST["title"]);
		}
		  
		if (empty($_POST["tag"])) {
			error();
		} else {
			$tag = test_input($_POST["tag"]);
		}
		  
		if (empty($_POST["introduction"])) {
			error();
		} else {
			$introduction = test_input($_POST["introduction"]);
		}
		  
		if (empty($_POST["article_content"])) {
			error();
		} else {
			$article_content = test_input($_POST["article_content"]);
		}
				
		if (empty($_POST["image_url"])) {
			error();
		} else {
			$image_url = test_input($_POST["image_url"]);
		}
		
		if (empty($_POST["owner"])) {
			error();
		} else {
			$owner_id = test_input($_POST["owner"]);
		}
		
	}
	$current_time = date("Y-m-d H:i:s");
	
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