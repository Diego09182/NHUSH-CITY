<?php

	//登入狀態驗證
	session_start();
	if (empty($_SESSION["user"]))
	{
		header("location:index.html");
		exit();
	}
	
	$id = $_SESSION["user"];
	
    require_once("dbtools.inc.php");

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
	$club = $_POST["club"];
    $comment = $_POST["comment"];
	
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
		  
		if (empty($password)) {
			error();
		} else {
			$password = test_input($password);
		}
		  
		if (empty($name)) {
			error();
		} else {
			$name = test_input($name);
		}
		  
		if (empty($year)) {
			error();
		} else {
			$year = test_input($year);
		}
				
		if (empty($month)) {
			error();
		} else {
			$month = test_input($month);
		}
		
		if (empty($day)) {
			error();
		} else {
			$day = test_input($day);
		}
		
		if (empty($student_ID)) {
			error();
		} else {
			$student_ID = test_input($student_ID);
		}
		
		if (empty($cellphone)) {
			error();
		} else {
			$cellphone = test_input($cellphone);
		}
		
		if (empty($interest)) {
			error();
		} else {
			$interest = test_input($interest);
		}
		
		if (empty($email)) {
			error();
		} else {
			$email = ($email);
		}
		
		if (empty($url)) {
			error();
		} else {
			$url = test_input($url);
		}
		
		if (empty($club)) {
			error();
		} else {
			$club = test_input($club);
		}
		
		if (empty($comment)) {
			error();
		} else {
			$comment = test_input($comment);
		}
		
	}
	
    //建立資料連接
    $link = create_connection();
	
    //執行 UPDATE 陳述式來更新使用者資料
    $sql  = "UPDATE users SET password = '$password', name = '$name', year = $year, month = $month, day = $day, student_ID = '$student_ID', 
			cellphone = '$cellphone', interest = '$interest', email = '$email', url = '$url', club = '$club' , comment = '$comment' WHERE id = $id";
	
    execute_sql($link, "member", $sql);
	
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
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon" />
</head>
<body>
	<div class="container">
		<div class="container">
			<div class="center-align">
				<h3 class="tm-text-primary tm-section-title mb-4">您已經修改資料</h3>
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
								<p class="center-align">社團：<font color="#FF0000"><?php echo $club ?></font></p>
								<p class="center-align">個人簡介：<font color="#FF0000"><?php echo $comment ?></font></p>
								<br>
								<p class="center-align">請回<a href="myhome.php">我的小屋</a></p>
							</blockquote>
						</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>