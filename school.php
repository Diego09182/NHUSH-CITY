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
  
	<banner></banner>
	
	<br><br>

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
	  
    <div class="row">	
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
				<a class="collection-item black-text"><h4>文章分類</h4></a>
				<a class="collection-item black-text">學生自治</a>
				<a class="collection-item black-text">校務投票</a>
			</div>
		</div>
	</div>
	
	<br><br>
	
	<slogan></slogan>
		
	<br><br>
	
	<?php
	
		//執行SQL查詢
		$sql = "SELECT id,billboard,date FROM bulletin_board ORDER BY date DESC";
		$result = execute_sql($link, "news", $sql);
		$row = mysqli_fetch_assoc($result);
		
	?>
	
	<div class="container">
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
									<?php  echo $row["billboard"]  ?>
								</blockquote>
							</h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<br><br>

	<contact></contact>

</div>

	<footers></footers>
	
</div>
<!--  Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.8/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js" integrity="sha256-kRbW+SRRXPogeps8ZQcw2PooWEDPIjVQmN1ocWVQHRY=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
		
	$(document).ready(function(){
		$('.parallax').parallax();
		$('.button-collapse').sideNav();
		$('.carousel.carousel-slider').carousel({full_width: true});
		$('.modal').modal();
		$('.materialboxed').materialbox();
		$('.tooltipped').tooltip({delay: 50});
		$('.chips').material_chip();
		$('.collapsible').collapsible();
		$('.carousel').carousel();
		$('.slider').slider({full_width: true});
		$('select').material_select();
		$(".button-collapse").sideNav();
	});
	
</script>
</body>
</html>
