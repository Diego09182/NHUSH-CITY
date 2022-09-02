<?php

	require_once("dbtools.inc.php");
	header("Content-type: text/html; charset=utf-8");
  
	if (!empty($_POST["account"]))
 	{
		
		require_once("dbtools.inc.php");
		
		function test_input($data) 
		{
		
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		
		}
		
		function error() 
		{
		
			header("location:index.html");
			exit();
		
		}
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") 
		{
		
			if (empty($_POST["account"])) {
				error();
			} else {
				$account = test_input($_POST["account"]);
			}
			  
			if (empty($_POST["password"])) {
				error();
			} else {
				$password = test_input($_POST["password"]);
			}
		
		}
		
		//建立資料連接
		$link = create_connection();
		
		//檢查帳號密碼是否正確
		$sql = "SELECT * FROM users Where account = '$account' AND password = '$password'";
		$result = execute_sql($link, "member", $sql);
		
		//若沒找到資料，表示帳號密碼錯誤
		if (mysqli_num_rows($result) == 0)
		{
		
			//釋放 $result 佔用的記憶體
			mysqli_free_result($result);
					
			//關閉資料連接	
			mysqli_close($link);
			
			//顯示訊息要求使用者輸入正確的帳號密碼
			echo "<script type='text/javascript'>";
			echo "alert('帳號密碼錯誤，請查明後再登入');";
			echo "history.back();";
			echo "</script>";
		 
		}
		else//如果帳號密碼正確
		{
		
			//取得使用者id
			$id = mysqli_fetch_object($result)->id;
			
			//增加登入次數
			$sql = "UPDATE users SET times = times + 1  Where id = '$id'";
			$result = execute_sql($link, "member", $sql);
			
			//將使用者狀態加入 session
			session_start();
			$_SESSION["user"] = $id;
			
			//釋放 $result 佔用的記憶體	
			mysqli_free_result($result);
			
			//關閉資料連接	
			mysqli_close($link);
		
			header("location:main.php");
		
		}
	
	}
	else
	{
		header("location:index.html");
	}
?>