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
    $sql = "SELECT * FROM users Where id = $id";
    $result = execute_sql($link, "member", $sql);
		
    $row = mysqli_fetch_assoc($result);  
	
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
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
 <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
 <link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon" />
</head>
<body>
<div id="app">	
  <nav class="light lighten-1 brown" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="main.php" class="brand-logo center">NHUSH-CITY</a>
		<ul class="left hide-on-med-and-down">
			<li><a class="waves-effect">名稱:<?php echo $row{"account"} ?></a></li>
			<li><a class="waves-effect">姓名:<?php echo $row{"name"} ?></a></li>
		</ul>
		<ul class="right hide-on-med-and-down">
		  	<li><a class="waves-effect" href="modify.php">修改資料</a></li>
			<li><a class="waves-effect" href="myhome.php">我的小屋</a></li>
		</ul>
	  <ul id="slide-out" class="side-nav">
	    <li>
			<div class="userView">
				<div class="background">
					<img src="images/head.jpg">
				</div>
				<a><img class="circle" src="images/dog.jpg"></a>
				<a><span class="name">十三</span></a>
			</div>
	  	</li>
		<blockquote>
	    <li><a class="waves-effect"><i class="material-icons">info_outline</i>帳戶資訊</a></li>
	    <li><a class="waves-effect">名稱:<?php echo $row{"account"} ?></a></li>
		<li><a class="waves-effect">姓名:<?php echo $row{"name"} ?></a></li>
		<li><a class="waves-effect">學號:<?php echo $row{"telephone"} ?></a></li>
		<li><a class="waves-effect">行動電話:<?php echo $row{"cellphone"} ?></a></li>
		<li><a class="" href="modify.php">我的小屋</a></li>
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
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
		<h1 class="center header-text animate__animated animate__fadeIn" id="index-title1" >南湖高中</h1>
		<div class="row center">
			<h5 class="header col s12 light animate__animated animate__fadeIn" id="index-title2">An exclusive community for Nanhu High School</h5>
		</div>
      <br><br>
    </div>
  </div>
	
	<br>
	<br>

  <div class="container">
	  
	  <div class="fixed-action-btn horizontal click-to-toggle">
	      <a class="btn-floating btn-large brown">
	  		<i class="material-icons">menu</i>
	      </a>
	      <ul>
	  		<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
	  		<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
	  	</ul>
	  </div>
	
    <div class="section">
		
      <div class="row">
	<div>	
		
		<h3 class="center-align">校務投票</h3>
		<br>
		
		<div class="col s12 m3">
			<div class="card hoverable">
					<div class="card-image">
					  <img src="images/NanhuSchool.png">
					</div>
					<br>
					<div class="chip chip-two">
						學生自治
					</div>	
					<div class="card-content">
						<h5>班聯會主席</h5>
						<p class="truncate">請盡快投票</p>
						<a href="election.php" class="waves-effect waves-light btn right brown">查看</a>
						<br>
					</div>
			</div>
		</div>
		  
		<div class="col s12 m3">
			<div class="card hoverable">
					<div class="card-image">
					  <img src="images/NanhuSchool.png">
					</div>
					<br>
					<div class="chip chip-two">
						學生自治
					</div>	
					<div class="card-content">
						<h5>班長聯席會主席</h5>
						<p class="truncate">還沒開放</p>
						<a class="waves-effect waves-light btn right brown">查看</a>
						<br>
					</div>
			</div>
		</div>
		
		<div class="col s12 m3">
			<div class="card hoverable">
					<div class="card-image">
					  <img src="images/NanhuSchool.png">
					</div>
					<br>
					<div class="chip chip-two">
						校務投票
					</div>	
					<div class="card-content">
						<h5>畢業旅行地點</h5>
						<p class="truncate">還沒開放</p>
						<a class="waves-effect waves-light btn right brown">查看</a>
						<br>
					</div>
			</div>
		</div>

		<div class="col s12 m3">
		  <div class="collection center-align">
			<a  class="collection-item"><h4>文章分類</h4></a>
			<a  class="collection-item">學生自治</a>
			<a  class="collection-item">校務投票</a>
		  </div>
		</div>
		
	</div>
	</div>
		</div>

			<br>
			<br>
			
	
				</div>
			</div>
		</div>
	
	<div class="row">
		<section id="facility" class="tm-section-pad-top">
		  <div class="container tm-container-gallery">
			<div class="row">
			  <div class="center-align col-12">
				<br>
				<h2 class="tm-text-primary tm-section-title mb-4">NHUSH CITY</h2>
				<p class="mx-auto tm-work-description">
					你能想像一個專屬於我們的社區嗎? 你可以在這裡分享你關於學校與學習相關的任何問題，達成共同學習法的作用。
				<br>
				<br>
				我們會不斷精進此系統，請提供任何意見給開發團隊。
				</p>
				<br>			
				<br>
			  </div>            
			</div>	
		</section>
	</div>
		
		
	<br>
	<br>
	
 <div class="container">	
	<section id="plan" class="tm-section-pad-top">
	      <div class="container">
	        <div class="center-align">
				<h3 class="tm-text-primary tm-section-title mb-4">公佈欄</h3>
	        </div>
	          <div class="col s6 m6">
	            <div class="card horizontal small">
	              <div class="card-stacked">
	                <div class="card-content">
						<h4>
							<blockquote>
								切換頁面時，如果有顯示的BUG，請重新整理。
							</blockquote>
						</h4>
	                </div>
	              </div>
	            </div>
	          </div>
	</section>
</div>
	
	<br><br>

<div class="container">
		<section id="plan" class="tm-section-pad-top">
		      <div class="container">
		        <div class="center-align">
					<h3 class="tm-text-primary tm-section-title mb-4">CONTACT</h3>
		        </div>		
		          <div class="col s6 m6">
		            <div class="card horizontal small">
		              <div class="card-stacked">
		                <div class="card-content">
							<blockquote>
							<h4><i class="material-icons medium">perm_phone_msg</i>02-26308889</p>
							<p><i class="material-icons medium">contacts</i>臺北市內湖區康寧路3段220號</p>
							</blockquote>
						</div>
		              </div>
		            </div>
		          </div>
		</section>
</div>

  <footer class="page-footer brown">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">南湖資訊社</h5>
          <p class="grey-text text-lighten-4">We are students of Nanhu High School and we love Computer Science and Information Engineering.</p>
		  <p class="grey-text text-lighten-4">This website is completed by our students and teachers.</p>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">相關連結</h5>
          <ul>
            <li><a class="white-text" href="http://www.nhush.tp.edu.tw/default_page.asp">南湖高中官網</a></li>
            <li><a class="white-text" href="https://e-portfolio.cooc.tp.edu.tw/Portal.do">臺北市學習歷程檔案系統</a></li>
            <li><a class="white-text" href="https://sschool.tp.edu.tw/Login.action?schNo=403303">台北市高中第二代校務行政系統</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
			<p class="center-align">Made by <a class="orange-text text-lighten-3" href="http://www.materializecss.cn">Materialize</a></p>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
