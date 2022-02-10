<?php
	//檢查 cookie 中的 passed 變數是否等於 TRUE
	$passed = $_COOKIE["passed"];
	$id = $_COOKIE{"id"};
	
	//表示尚未登入網站，將使用者導向首頁 index.html
	if ($_COOKIE{"passed"} != "TRUE")
	{
		header("location:index.html");
		exit();
	}
	if ($_COOKIE{"id"} == "")
	{
		header("location:index.html");
		exit();
	}
	
	require_once("dbtools.inc.php");
	
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $users_sql = "SELECT * FROM users Where id = $id";
    $users_result = execute_sql($link, "member", $users_sql);	
    $users_row = mysqli_fetch_assoc($users_result);
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
				<li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
				<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
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
		    <li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
			<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
			<li><a class="waves-effect">學號:<?php echo $users_row{"student_ID"} ?></a></li>
			<li><a class="waves-effect">行動電話:<?php echo $users_row{"cellphone"} ?></a></li>
			<li><a href="myhome.php">我的小屋</a></li>
			<li><a href="modify.php">修改資料</a></li>
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
	
	<br>
	
	<div class="fixed-action-btn horizontal click-to-toggle">
		<a class="btn-floating btn-large brown">
			<i class="material-icons">menu</i>
		</a>
		<ul>
			<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
			<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
		</ul>
	</div>
	
	<div class="container">
		<features></features>	
		<serve></serve>			
	</div>
	
	<div class="center-align">
		<h3>系統更新</h3>
	</div>
	
	<div class="container">	
		<?php
			
			//指定每頁顯示幾筆記錄
			$records_per_page = 3;
							
			//取得要顯示第幾頁的記錄
			if (isset($_GET["page"]))
			  $page = $_GET["page"];
			else
			  $page = 1;
									
			//執行SQL查詢
			$sql = "SELECT id, author, tag, subject, content, date FROM systemupdate ORDER BY date DESC";
			$result = execute_sql($link, "news", $sql);
								
			//取得記錄數 
			$total_records = mysqli_num_rows($result);
							
			//計算總頁數
			$total_pages = ceil($total_records / $records_per_page);
							
			//計算本頁第一筆記錄的序號
			$started_record = $records_per_page * ($page - 1);
							
			//將記錄指標移至本頁第一筆記錄的序號
			mysqli_data_seek($result, $started_record);
			
			$j = 1;
			
			echo"<div class='row'>";
				while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
				{				
					echo"<div class='center-align'>";
						echo"<div class='col s4 m4'>";
							echo"<div class='card blue-grey darken-1'>";
								echo"<div class='card-content white-text'>";
									echo"<span class='card-title'>".$row["subject"]."</span>";
									echo"<br>";
									echo"<p class='chip brown left'>".$row["tag"]."</p>";
									echo"<br><br>";
									echo"<h5 class=''>".$row["content"]."</h5>";
									echo"<br>";
									echo"<span class='author right'>發文者:".$row["author"]."</span>";
									echo"<br>";
									echo"<p class='right'>更新時間:".$row["date"]."</p>";
								echo"</div>";
								echo"<br>";
							echo"</div>";
						echo"</div>";
					echo"</div>";
					
					$j++;
				}
			echo"</div>";
			
			//產生導覽列
			echo"<ul class='pagination center'>";
						
			if ($page > 1)
						echo "<li class='waves-effect'><a href='main.php?page=". ($page - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
								
			for ($i = 1; $i <= $total_pages; $i++)
			{
			  if ($i == $page)
				echo "<li class='waves-effect'><a href='main.php?page=$i'>$i</a></li>";
			  else
				echo"<li class='waves-effect'><a href='main.php?page=$i'>$i</a></li>";
			}
							
			if ($page < $total_pages)
						echo"<li class='waves-effect'><a href='review.php?page=". ($page + 1) . "'><i class='material-icons'>chevron_right</i></a></li>";
			echo "</p>";
			
			echo"</ul>";
			
		?>
	</div>	
	
	<slogan></slogan>
	
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
	
	<br><br>
	
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v6.0"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
	
	Vue.component('slogan', {
	  template:  
		`<div id="slogan">
			<div class="row">
				<div class="center-align col m12">
					<br>
					<h2 class="center-align">NHUSH CITY</h2>
					<h5 class="center-align">
					你能想像一個專屬於我們的社區嗎? 你可以在這裡分享對於學校與學習相關的任何問題。
					<br>
					<br>
					我們會不斷精進此系統，請提供任何意見給開發團隊。
					</h5>
					<br>			
					<br>
				</div>
			</div>		  
		</div>`
	})
	
	Vue.component('tool', {
	  template:  
		`<div class="fixed-action-btn horizontal click-to-toggle">
			<a class="btn-floating btn-large brown">
				<i class="material-icons">menu</i>
			</a>
			<ul>
				<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
				<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
			</ul>
		</div>`
	})
	
	Vue.component('banner', {
	  template:  
		`<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<br><br>
					<h1 class="center header-text animate__animated animate__fadeIn" id="index-title1" >南湖高中</h1>
				<div class="row center">
					<h5 class="header col s12 light" id="index-title2">An exclusive community for Nanhu High School</h5>
				</div>
				<br><br>
			</div>
		</div>`
	})
	
	Vue.component('features', {
	  template:  
		`<div class="row">		
			<div class="container">	
				<h3 class="center-align">主要功能</h3>
				<br>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">南湖校務<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="school.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">南湖校園<i class="material-icons right">close</i></span>
						  <p>關於南湖高中的學生自治與校務投票。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">綜合討論區<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="forum.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">綜合討論區<i class="material-icons right">close</i></span>
						  <p>討論關於校園的任何事項。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">學習歷程<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="works.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">學習歷程<i class="material-icons right">close</i></span>
						  <p>學生的學習歷程展示與討論區。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">文章區<i class="material-icons right">more_vert</i></span>
							<br>
							<a href="home_article.php" class="waves-effect waves-light btn right brown">進入</a>
							<br>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">文章區<i class="material-icons right">close</i></span>
							<p>學習資訊分享。</p>
						</div>
					</div>
				</div>
			</div>
		</div>`
	})
	
	Vue.component('serve', {
	  template:  
		`<div class="row">
			<div class="container">	
				<h3 class="center-align">主要服務</h3>
				<br>
				<div class="col s12 m4">
				  <div class="icon-block">
					<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat hvr-grow-rotate material-icons">perm_media</i></h2>
					<h5 class="center">提供學習資料</h5>
					<p class="light center">提供優良的學習歷程檔案範例</p>
				  </div>
				</div>		
				<div class="col s12 m4">
				  <div class="icon-block">
					<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat material-icons">comment</i></h2>
					<h5 class="center">用戶經驗分享</h5>
					<p class="light center">可以進行成果發表與討論分享</p>
				  </div>
				</div>	
				<div class="col s12 m4">
				  <div class="icon-block">
					<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat material-icons">assessment</i></h2>
					<h5 class="center">相關統計資料</h5>
					<p class="light center">秉持透明、開放的態度，公開部分統計資料</p>
				  </div>
				</div>
			</div>
		</div>`
	})
	
	Vue.component('contact', {
	  template:  
		`<div class="container">
			<div class="container">
				<div class="center-align">
					<h3>CONTACT</h3>
				</div>		
				<div class="col s6 m6">
					<div class="card horizontal small">
						<div class="card-stacked">
							<div class="card-content">
								<h4>
								<blockquote>
								<i class="material-icons medium">perm_phone_msg</i>02-26308889</p>
								<i class="material-icons medium">contacts</i>臺北市內湖區康寧路3段220號</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`
	})
	
	Vue.component('footers', {
	  template:  
		`<footer class="page-footer brown">
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
		</footer>`
	})
	
	new Vue({
	    el: '#app',
	})
	
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