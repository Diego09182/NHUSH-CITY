<?php

	require_once("dbtools.inc.php");
	
	$collector = $_COOKIE{"id"};
	$post = $_COOKIE{"news_id"};
	
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
		  
		if (empty($_COOKIE{"id"})) {
			error();
		} else {
			$collector = test_input($collector);
		}
		 
		if (empty($_COOKIE{"news_id"})) {
			error();
		} else {
			$post = test_input($post);
		}
		
	}
	
	$current_time = date("Y-m-d H:i:s");
	
	//建立資料連接
	$link = create_connection();
	
	//執行SQL查詢
	$sql = "INSERT INTO collect_post(favorite,collector,date)
			VALUES ('$post','$collector','$current_time')";
	$result = execute_sql($link, "news", $sql);
	
	//關閉資料連接
	mysqli_close($link);
	
	//將網頁重新導向
	header("location:show_posts.php?id=".$post."");
	exit();
	
?>