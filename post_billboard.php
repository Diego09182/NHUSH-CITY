<?php
	
	require_once("dbtools.inc.php");
		
	$author = $_POST["author"];
	$billboard = $_POST["billboard"]; 
	$current_time = date("Y-m-d H:i:s");
	$id = $_POST["user_id"];
	
	//建立資料連接
	$link = create_connection();
				
	//執行SQL查詢
	$sql = "INSERT INTO bulletin_board(author,billboard,date,user_id)
	        VALUES ('$author','$billboard','$current_time','$id')";
	$result = execute_sql($link, "news", $sql);
	
	//關閉資料連接
	mysqli_close($link);
	
	//將網頁重新導向
	header("location:main.php");
	exit();
	
?>