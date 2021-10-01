<?php
  require_once("dbtools.inc.php");
  header("Content-type: text/html; charset=utf-8");
  
  if (isset($_POST["account"]))
  {
    require_once("dbtools.inc.php");
  		
    //取得登入資料
    $account = $_POST["account"]; 	
    $password = $_POST["password"];
  	
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
    else	//如果帳號密碼正確
    {
	  
	  //取得id與帳號
	  $id = mysqli_fetch_object($result)->id;
	  $account = mysqli_fetch_object($result)->account;	
	  
	  $sql = "UPDATE users SET times = times + 1  Where id = '$id'";
	  $result = execute_sql($link, "member", $sql);
	  
	  session_start();	
	    
	  //將使用者狀態加入 cookies
	  setcookie("id", $id);
	  setcookie("passed", "TRUE");
	  
      //釋放 $result 佔用的記憶體	
      mysqli_free_result($result);
  			
      //關閉資料連接	
      mysqli_close($link);
  	    
      header("location:main.php");
	  
    }
  }
  
?>

