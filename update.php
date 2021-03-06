<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
  $passed = $_COOKIE["passed"];
	
  /* 如果 cookie 中的 passed 變數不等於 TRUE，
     表示尚未登入網站，將使用者導向首頁 index.html */
  if ($passed != "TRUE")
  {
    header("location:index.html");
    exit();
  }
	
  /* 如果 cookie 中的 passed 變數等於 TRUE，
     表示已經登入網站，則取得使用者資料 */
  else
  {
    require_once("dbtools.inc.php");
	
    //取得 modify.php 網頁的表單資料
    $id = $_COOKIE["id"];
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
				
    //執行 UPDATE 陳述式來更新使用者資料
    $sql = "UPDATE users SET password = '$password', name = '$name', year = $year, month = $month, day = $day, student_ID = '$student_ID', cellphone = '$cellphone', 
            interest = '$interest', email = '$email', url = '$url', comment = '$comment' WHERE id = $id";
			
    $result = execute_sql($link, "member", $sql);
		
    //關閉資料連接
    mysqli_close($link);
  }		
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
	<div class="container">
		<section id="plan" class="tm-section-pad-top">
			<div class="container">
				<div class="center-align">
					<h3 class="tm-text-primary tm-section-title mb-4">恭喜您已經修改資料成功了!</h3>
		        </div>
		        <div class="card horizontal">
					<div class="card-stacked">
						<div class="card-content">
							<h4>
							  <blockquote>
								<p class="center-align">您的資料如下：（請勿按重新整理鈕）</p>
								<p class="center-align">姓名：<font color="#FF0000"><?php echo $name ?></font></p>
								<p class="center-align">密碼：<font color="#FF0000"><?php echo $password ?></font></p>
								<p class="center-align">學號：<font color="#FF0000"><?php echo $student_ID ?></font></p>
								<p class="center-align">電話：<font color="#FF0000"><?php echo $cellphone ?></font></p>
								<p class="center-align">電子信箱：<font color="#FF0000"><?php echo $email ?></font></p>
								<p class="center-align">興趣：<font color="#FF0000"><?php echo $interest ?></font></p>
								<p class="center-align">個人網站：<font color="#FF0000"><?php echo $url ?></font></p>
								<p class="center-align">個人簡介：<font color="#FF0000"><?php echo $comment ?></font></p>
								<p class="center-align">請記下您的帳號及密碼，然後<a href="main.php">回首頁</a></p>
							  </blockquote>
							</h4>
						</div>
					</div>
				</div>
		</section>
	</div>
  </body>
</html>