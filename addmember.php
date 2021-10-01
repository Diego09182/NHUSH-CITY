<?php
  require_once("dbtools.inc.php");
  
  //取得表單資料
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"]; 
  $year = $_POST["year"]; 
  $month = $_POST["month"]; 
  $day = $_POST["day"];
  $student_ID = $_POST["student_ID"]; 
  $cellphone = $_POST["cellphone"];
  $interest = $_POST["interest"];
  $email = $_POST["email"]; 
  $url = $_POST["url"]; 	
  $comment = $_POST["comment"];

  //建立資料連接
  $link = create_connection();
			
  //檢查帳號是否有人申請
  $sql = "SELECT * FROM users Where account = '$account'";
  $result = execute_sql($link, "member", $sql);

  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號沒人使用
  else
  {
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //執行 SQL 命令，新增此帳號
    $sql = "INSERT INTO users (account, password, name, sex, 
            year, month, day, student_ID, cellphone, interest,
            email, url, comment) VALUES ('$account', '$password', 
            '$name', '$sex', $year, $month, $day, '$student_ID', 
            '$cellphone', '$interest', '$email', '$url', '$comment')";

    $result = execute_sql($link, "member", $sql);
  }
	
  //關閉資料連接	
  mysqli_close($link);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>NHUSH-CITY</title>
  
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/hover.css"/>
    <link href="https://gnehs.github.io/ChatUI/css/ChatUI.css" rel="stylesheet">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  </head>

  <body>
	  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
		<h1 class="center header-text animate__animated animate__backInLeft" id="index-title1" >南湖高中</h1>
      <div class="row center">
        <h5 class="header col s12 light" id="index-title2">An exclusive community for Nanhu High School</h5>
      </div>
      <br><br>
    </div>
  </div>

	<div class="container">
		<section id="plan" class="tm-section-pad-top">
			<div class="container">
				<div class="center-align">
					<h3 class="tm-text-primary tm-section-title mb-4">恭喜您的NHUSH-CITY帳號註冊成功了!</h3>
		        </div>
		        <div class="card horizontal small">
					<div class="card-stacked">
						<div class="card-content">
							<h4>
							  <blockquote>
								<p class="center-align">您的資料如下：（請勿按重新整理鈕）</p>
								<p class="center-align">帳號：<font color="#FF0000"><?php echo $account ?></font></p>
								<p class="center-align">密碼：<font color="#FF0000"><?php echo $password ?></font></p>
								<p class="center-align">需要先回首頁登入</p>
								<p class="center-align">請記下您的帳號及密碼，然後<a href="index.html">回首頁</a>登入</p>
							  </blockquote>
							</h4>
						</div>
					</div>
				</div>
		</section>
	</div>
	
  </body>
</html>