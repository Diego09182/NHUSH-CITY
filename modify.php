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
		
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $users_sql = "SELECT * FROM users Where id = $id";
    $users_result = execute_sql($link, "member", $users_sql);	
    $users_row = mysqli_fetch_assoc($users_result);
	$user_avatar = $users_row{"avatar"};	
?>
<!DOCTYPE html>
<html lang="en">
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
<div id="app">	
  <nav class="light lighten-1 brown" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="main.php" class="brand-logo center">NHUSH-CITY</a>
		  <ul class="left hide-on-med-and-down">
			<li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
			<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
		  </ul>
		  <ul class="right hide-on-med-and-down">
			<li><a class="waves-effect" href="myhome.php">我的小屋</a></li>
			<?php
				if ($id == 45)
				{
					echo"<li><a class='waves-effect' href='review.php'>審查文章</a></li>";
				}
			?>
		</ul>
	  <ul id="slide-out" class="side-nav">
	    <li>
			<div class="userView">
				<div class="background">
					<img src="images/head.jpg">
				</div>
				<?php
					echo"<a>";
						echo"<img class='circle' src='$user_avatar'>";
					echo"</a>";
				?>
				<a><span class="name">十三</span></a>
			</div>
	  	</li>
		<blockquote>
	    <li><a class="waves-effect"><i class="material-icons">info_outline</i>帳戶資訊</a></li>
	    <li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
		<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
		<li><a class="waves-effect">學號:<?php echo $users_row{"student_ID"} ?></a></li>
		<li><a class="waves-effect">行動電話:<?php echo $users_row{"cellphone"} ?></a></li>
		<li><a href="myhome.php">我的小屋</a></li>
		<li><a class="waves-effect"><i class="material-icons">info_outline</i>聯絡資訊</a></li>
		<li><a class="waves-effect">ssss.gladmasy@gmail.com</a></li>
	  	<li class="no-padding">
			<ul class="collapsible collapsible-accordion">
				<li>
					<a class="collapsible-header">開發者資訊<i class="material-icons">arrow_drop_down</i></a>
					<div class="collapsible-body">
						<ul>
							<li><a href="#">ssss</a></li>
							<li><a href="https://github.com/Diego09182"><img src="images/GitHub.png"></a></li>
						</ul>
					</div>
				</li>
			</ul>
	  	</li>
		</blockquote>
	  </ul>
	  <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

	<banner></banner>
	
	<div class="fixed-action-btn horizontal click-to-toggle">
	    <a class="btn-floating btn-large brown">
			<i class="material-icons">menu</i>
	    </a>
	    <ul>
			<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
		</ul>
	</div>
	
	<div class="container">
		<h3 class="center-align">修改資料</h3>
		<div class="card">
			<form name="myForm" method="post" action="update.php" >
				<div class="card blue-grey darken-1 card">
					  <div class="card-content white-text">
						<form action="update.php" method="post" name="myForm">
							<span class="card-title">使用者資料(標示「*」欄位請務必填寫)</span>
							<div class="input-field col s6">
									<p>*使用者帳號:</p>
									<br>
									<p><?php echo $users_row{"account"} ?></p>
								</div>
								<div class="row">
									<div class="input-field col m6">
										*使用者密碼：
										<input name="password" type="password" class="validate" size="10" length="10" value="<?php echo $users_row{"password"} ?>">
										(請使用英文或數字鍵，勿使用特殊字元)
									</div>
									<div class="input-field col m6">
										*密碼確認：
										<input name="re_password" type="password" class="validate" size="10" length="10" value="<?php echo $users_row{"password"} ?>">
										(再輸入一次密碼，並記下您的使用者名稱與密碼)
									</div>
								</div>
								<div class="input-field col s8">
									*使用者姓名：
									<input name="name"  id="name" type="text" class="validate" size="3" length="3" value="<?php echo $users_row{"name"} ?>">
									(使用非真實姓名管理員將刪除帳號)
								</div>
								<br>
								<div class="row">
									<p>*生日:民國 年 月 日</p>
									<div class="input-field">
										<input class="col m4" name="year" type="text" class="validate" size="2" value="<?php echo $users_row{"year"} ?>"> 
										<input class="col m4" name="month" type="text" class="validate" name="month" size="2" value="<?php echo $users_row{"month"} ?>">
										<input class="col m4" name="day" type="text" class="validate" name="day" size="2" value="<?php echo $users_row{"day"} ?>">
									</div>
								</div>
								<div class="row">
									<div class="input-field col m6">
										*學號：
										<input name="student_ID" type="text" size="8" length="8" value="<?php echo $users_row{"student_ID"} ?>">
										(依照學校學號格式)
									</div>
									<div class="input-field col m6">
										*行動電話：
										<input name="cellphone" type="text" size="10" length="10" value="<?php echo $users_row{"cellphone"} ?>">
									</div>
								</div>
								<div class="row">
									<div class="input-field col m6">
										*E-mail
										<input name="email" type="text" size="30" length="30" value="<?php echo $users_row{"email"} ?>">
									</div>	
									<div class="input-field col m6">
										個人網站：
										<input name="url" type="text" size="40" length="40" value="<?php echo $users_row{"url"} ?>">
									</div>
								</div>
								<div class="input-field col s8">
									興趣：
									<input name="interest" type="text" size="10" length="10" value="<?php echo $users_row{"interest"} ?>">
								</div>
								<div class="input-field col s8">
									社團：
									<input name="club" type="text" size="5" length="5" value="<?php echo $users_row{"club"} ?>">
								</div>
								<div class="input-field col s8">
									自我介紹：
									<textarea name="comment" id="textarea1" size="30" length="30" class="materialize-textarea"><?php echo $users_row{"comment"} ?></textarea>
								</div>
							<br>
							<div class="card-action center-align">
								<a class="waves-effect waves-light btn brown" onClick="check_data()">確定</a>
								<a class="waves-effect waves-light btn brown" onClick="reset()">重新輸入</a>
								<br>
								<br>
								<a href="main.php">回首頁</a>
							</div>
						</form>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<footers></footers>
</div>	
</body>
</html>
<!--  Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.8/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
	
      function check_data()
      {
        if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("您一定要留下真實姓名哦！");
          return false;
        }	
        if (document.myForm.year.value.length == 0)
        {
          alert("您忘了填「出生年」欄位了...");
          return false;
        }
        if (document.myForm.month.value.length == 0)
        {
          alert("您忘了填「出生月」欄位了...");
          return false;
        }	
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
        {
          alert("「出生月」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0)
        {
          alert("您忘了填「出生日」欄位了...");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
        {
          alert("二月只有 28 天，最多 29 天");
          return false;
        }
		if (document.myForm.month.value > 30)
		{
		  alert("二月只有 28 天，最多 29 天");
		  return false;
		}
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6
          | document.myForm.month.value == 9 | document.myForm.month.value == 11)
        {
          if (document.myForm.day.value > 30)
          {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;					
          }
        }	
        else
        {
          if (document.myForm.day.value > 31)
          {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;					
          }				
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1)
        {
          alert("出生日應該在 1-31 之間");
          return false;
        }
		if (document.myForm.student_ID.value.length != 8 && document.myForm.student_ID.value.length > 0)
		{
		  alert("學號的資料錯誤");
		  return false;
		}
		if (document.myForm.comment.value.length > 30)
		{
		  alert("「個人簡介」不可以超過30個字元哦...");
		  return false;
		}	
			myForm.submit();					
      }
	  
	  function reset(){
	  	document.myForm.name.value = ""
	  	document.myForm.password.value = ""
		document.myForm.re_password.value = ""
		document.myForm.name.value = ""
	  }
</script>