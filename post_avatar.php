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
		  
		if (empty($_POST["avatar"])) {
			error();
		} else {
			$avatar = test_input($_POST["avatar"]);
		}
		  
		if (empty($_POST["owner"])) {
			error();
		} else {
			$owner_id = test_input($_POST["owner"]);
		}
		
	}
	 
	//建立資料連接
	$link = create_connection();
	
	//執行 UPDATE 陳述式來更新使用者資料
	$sql = "UPDATE users SET avatar = '$avatar' WHERE id = '$owner_id'";
	
	$result = execute_sql($link, "member", $sql);
	
	//關閉資料連接
	mysqli_close($link);
	 
	//將網頁重新導向
	header("location:myhome.php");
	exit();
	
?>