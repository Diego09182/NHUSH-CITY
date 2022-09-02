<?php

	require_once("dbtools.inc.php");
	
	function test_input($data) {
	  
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
		
	}
	
	function error() {
	  
		header("location:index.html");
		exit();
		
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  
		if (empty($_POST["author"])) {
			error();
		} else {
			$author = test_input($_POST["author"]);
		}
		  
		if (empty($_POST["tag"])) {
			error();
		} else {
			$tag = test_input($_POST["tag"]);
		}
		  
		if (empty($_POST["subject"])) {
			error();
		} else {
			$subject = test_input($_POST["subject"]);
		}
		  
		if (empty($_POST["content"])) {
			error();
		} else {
			$content = test_input($_POST["content"]);
		}
				
		if (empty($_POST["user_id"])) {
			error();
		} else {
			$id = test_input($_POST["user_id"]);
		}
		
	}
	
	$current_time = date("Y-m-d H:i:s");
	
	//建立資料連接
	$link = create_connection();
				
	//執行SQL查詢
	$sql = "INSERT INTO message(author, tag, subject, content, date, user_id, likes, dislike)
	        VALUES ('$author', '$tag', '$subject', '$content', '$current_time','$id', '$likes', '$dislike')";
	$result = execute_sql($link, "news", $sql);
	
	//關閉資料連接
	mysqli_close($link);
	
	//將網頁重新導向
	header("location:forum.php");
	exit();
  
?>