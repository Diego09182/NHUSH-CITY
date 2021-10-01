<?php
	  //檢查 cookie 中的 passed 變數是否等於 TRUE
	  $passed = $_COOKIE{"passed"};
	  $id = $_COOKIE{"id"};
	  
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
    $sql = "SELECT * FROM users Where id = $id";
    $result = execute_sql($link, "member", $sql);
	
    $row = mysqli_fetch_assoc($result);
	  
	//取得要顯示之記錄
	$id = $_GET["id"];
	
	//設定現行瀏覽的文章
	setcookie("article_id", $id);
	
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
  <link rel="stylesheet" type="text/css" href="css/hover.css"/>
  <link href="https://gnehs.github.io/ChatUI/css/ChatUI.css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
</head>
<style type="text/css">

	body{
		font-family: 'Noto Sans TC', sans-serif;
	}
	
	
	h6{
		font-size: 1.6875rem;
		line-height: 2rem;
	}
	
	.page-footer {
	  bottom: 0;
	  width: 100%;
	}

	
	</style>
	<body>
	
		<nav class="light lighten-1 brown" role="navigation">
			<div class="nav-wrapper container"><a id="logo-container" href="home_article.php" class="brand-logo center">NHUSH-CITY</a>
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
				<li><a class="waves-effect">學號:<?php echo $row{"student_ID"} ?></a></li>
				<li><a class="waves-effect">行動電話:<?php echo $row{"cellphone"} ?></a></li>
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
		
		<?php
			
			//取得要顯示之記錄
			$id = $_GET["id"];
			
			//設定現行瀏覽的文章
			setcookie("article_id", $id);
			
			//執行SQL查詢
			$sql = "SELECT id,title,tag,article_content,owner,date FROM article where id = $id";
			$result = execute_sql($link, "news", $sql);
			
		?>
	
	<div id="app">	
		<div class="container">	
			<?php
				while ($row = mysqli_fetch_assoc($result))
				{
				
				//執行SQL查詢身分
				$owner_id = $row['owner'];
				$member_sql = "SELECT * FROM users Where id = $owner_id";
				$member_result = execute_sql($link, "member", $member_sql);
				$member_row = mysqli_fetch_assoc($member_result);
				
				echo"<div class='row'>";
				   echo" <div class='col m12 s12'>";
						echo"<div id='introduction' class='section scrollspy'>";
							echo"<h3>".$row["title"]."</h3>";
							echo"<div class='row'>";
							  echo"<div class='chip chip-two'>".$row["tag"] ."</div>";
								echo"<a class='fontSIZE waves-effect waves-light btn brown right' herf='#' @click='decreasefontsize'>A-</a>";
								echo"<a class='fontSIZE waves-effect waves-light btn brown right' herf='#' @click='increasefontsize'>A+</a>";
							if ($member_id == 45 or $member_id == $row["user_id"]){
								echo"<br><br>";
								echo"<a class='waves-effect waves-light btn brown right' onclick='DeleteNote($id)'>";
									echo"刪除";
								echo"</a>";
							}
							echo"</div>";
								echo"<br>";
							echo"<div class='author'>";
								echo"<i class='left'>作者:".$member_row["account"]."</i>";
								echo"<i class='right'>發文時間:".$row["date"]."</i>";
							echo"</div>";
						echo"</div>";
						echo"<br>";
						echo"<hr>";
						echo"<h6 v-bind:style='fontStyle'>".$row["article_content"]."</h6>";	
					echo"</div>";
				echo"</div>";
				
				}
			?>
		</div>
	
		<footer class="page-footer brown">
			<div class="container">
			  <div class="row">
				<div class="col m6 s12">
				  <h5 class="white-text">南湖資訊社</h5>
				  <p class="grey-text text-lighten-4">{{about}}</p>
				  <p class="grey-text text-lighten-4">{{copyright}}</p>
				</div>
				<div class="col m3 s12">
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
				<br>
			  </div>
			</div>
		</footer>
	</div>		
		
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.11"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js" integrity="sha256-kRbW+SRRXPogeps8ZQcw2PooWEDPIjVQmN1ocWVQHRY=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
	<script type="text/javascript">
		
	new Vue({
	    el: '#app',
	    data: {
			about:'We are students of Nanhu High School and we love Computer Science and Information Engineering.',
			copyright:'This website is completed by our students and teachers.',
	        fontsizesetting: 27,
	        fontStyle: {
	            'font-size': '27px'
	        }
	    },
	    methods: {
	        increasefontsize() {
	            this.fontStyle['font-size'] = `${this.fontsizesetting++}px`
	        },
	        decreasefontsize() {
	            this.fontStyle['font-size'] = `${this.fontsizesetting--}px`
	        }
	    }
	})
	
	function DeleteNote(id)
	{
	  if (confirm("請確認是否刪除此文章？"))
	    location.href = "delArticle.php?show_article=" + id;
	}
	
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
