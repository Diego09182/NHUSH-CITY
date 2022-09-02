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
				
		if (empty($_POST["avater"])) {
			error();
		} else {
			$avater = test_input($_POST["avater"]);
		}
		
		if (empty($_POST["reply_id"])) {
			error();
		} else {
			$reply_id = test_input($_POST["reply_id"]);
		}
		
	}
	
	$current_time = date("Y-m-d H:i:s");
	
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