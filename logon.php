<?php
  if (isset($_POST["account"]))
  {
    require_once("dbtools.inc.php");
	
    //取得登入資料
    $account = $_POST["account"]; 	
    $passwor = $_POST["password"];
	
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
      
    }
    else     //如果帳號密碼正確
    {
	
	  //取得 id 欄位
	  $id = mysqli_fetch_object($result)->id;	
	  $account = mysqli_fetch_object($result)->account;	
		
      //將使用者資料加入 Session
      session_start();
      $row = mysqli_fetch_object($result);
      $_SESSION["login_user"] = $account;
      $_SESSION["login_id"] = $id;
	    
      //釋放 $result 佔用的記憶體	
      mysqli_free_result($result);
			
      //關閉資料連接	
      mysqli_close($link);
	        
     header("location:main.php");
    }
  }
?>