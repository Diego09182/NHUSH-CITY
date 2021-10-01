<?php
	
	//取得要顯示之記錄
	$news_id = $_GET["id"];
	setcookie("news_id", $news_id);
	
	//如果 cookie 中的 passed 變數不等於 TRUE
	//表示尚未登入網站，將使用者導向首頁 index.html
	$passed = $_COOKIE{"passed"};
	$member_id = $_COOKIE{"id"};
	
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
	$users_sql = "SELECT * FROM users Where id = $member_id";
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
  .fontSIZE:link,
  .fontSIZE:visited{
  	display:inline-block;
  	text-decoration:none;
  	text-align:center;
  	height:30px;
  	width:30px;
  	color:black;
  	background-color:white;
  	border:1px solid green;
  }
  .fontSIZE:hover,
  .fontSIZE:active{
  	color:white;
  }
  
  </style>
  <body>
	<nav class="light lighten-1 brown" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="forum.php" class="brand-logo center">NHUSH-CITY</a>
		  <ul class="left hide-on-med-and-down">
			<li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
			<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
		  </ul>
		  <ul class="right hide-on-med-and-down">
			<li><a class="waves-effect" href="modify.php">修改資料</a></li>
			<li><a class="waves-effect" href="myhome.php">我的小屋</a></li>
			<?php
				if ($member_id == 45)
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
	
	<div class="fixed-action-btn horizontal click-to-toggle">
	    <a class="btn-floating btn-large brown">
			<i class="material-icons">menu</i>
	    </a>
	    <ul>
			<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
			<li><a href="#modal1" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="回覆文章"><i class="material-icons">mode_edit</i></i></a></li>
			<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
		</ul>
	</div>
	
	<div class="container center" id="app">
	 
	<br>
	
    <?php	  
	
	//取得要顯示之記錄
	$id = $_GET["id"];
	
	setcookie("news_id", $id);
	
	//建立資料連接
	$link = create_connection();
				
	//執行SQL查詢
	$sql = "SELECT * FROM message WHERE id = $id";
	$result = execute_sql($link, "news", $sql);
						  
    //顯示原討論主題的內容
	while ($row = mysqli_fetch_assoc($result))
	{
		//執行SQL查詢身分
		$user_id = $row['user_id'];
		$member_sql = "SELECT * FROM users Where id = $user_id";
		$member_result = execute_sql($link, "member", $member_sql);
		$member_row = mysqli_fetch_assoc($member_result);
		$url = $member_row["url"];
		$avatar = $member_row["avatar"];
		
		echo"<div class='row'>";
			echo"<div class='col s12 m3'>";
				echo"<div class='center'>";
					echo"<div class='card'>";
						echo"<div class='card-image'>";
							echo"<img class='materialboxed' data-caption='圖片連結:$avatar' src='$avatar'>";
							echo"<br>";
						echo"</div>";
						echo"<a href='#modal2' class='btn-floating halfway-fab waves-effect waves-light brown right'><i class='tooltipped' data-delay='50' data-tooltip='查看個人資料'><i class='material-icons'>perm_identity</i></i></a>";
						echo"<br>";	
						echo"<div class='card-content'>";
							echo"<h5>發文者:".$row["author"]."</h5>";
							echo"<p></p>";
							echo"<br>";
						echo"</div>";
					echo"</div>";
					echo"<ul class='collapsible' data-collapsible='accordion'>";
						echo"<li>";
							echo"<div class='collapsible-header'><i class='material-icons'>info</i>自我介紹</div>";
							echo"<div class='collapsible-body'><p>".$member_row["comment"]."</p></div>";
						echo"</li>";
					echo"</ul>";
				echo"</div>";
			echo"</div>";	
			echo"<div class='col s12 m9 right'>";
				echo"<div class='card'>";
						echo"<br>";
						echo"<br>";
						echo"<div class='card-content'>";
							echo"<h3>".$row["subject"]."</h4>";
							echo"<h5 v-bind:style='fontStyle'>".$row["content"]."</h5>";
							echo"<br>";
							echo"<div class='chip left brown'>";
								echo"#".$row["tag"];
							echo"</div>";
							echo"<p class='right'>發文時間:".$row["date"]."</p>";
							echo"<br>";
							echo"<br>";
							echo"<div class='card-action'>";
								echo"<p class='left'>讚:".$row["likes"]."</p>";
								echo"<p class='left'>噓:".$row["dislike"]."</p>";
								echo"<a class='btn-floating halfway-fab waves-effect waves-light brown right' href='dislike.php'><i class='tooltipped' data-delay='50' data-tooltip='噓他'><i class='material-icons'>thumb_down</i></i></a>";
								echo"<a class='btn-floating halfway-fab waves-effect waves-light brown right' href='like.php'><i class='tooltipped' data-delay='50' data-tooltip='按讚'><i class='material-icons'>thumb_up</i></i></a>";
								echo"<a class='btn-floating halfway-fab waves-effect waves-light brown right' @click='decreasefontsize'><i class='tooltipped' data-delay='50' data-tooltip='字體縮小'><i class='material-icons'>zoom_out</i></i></a>";
								echo"<a class='btn-floating halfway-fab waves-effect waves-light brown right' @click='increasefontsize'><i class='tooltipped' data-delay='50' data-tooltip='字體放大'><i class='material-icons'>zoom_in</i></i></a>";
							echo"</div>";
								if ($member_id == 45 or $member_id == $row["user_id"]){
									echo"<br><br>";
									echo"<a class='waves-effect waves-light btn brown right' onclick='DeletePost($id)'>";
										echo"刪除";
									echo"</a>";
								}
								echo"<br>";
							echo"<div class='left'>";
								echo"<a href='#modal3' class='btn-floating halfway-fab waves-effect waves-light brown right'><i class='tooltipped' data-delay='50' data-tooltip='檢舉貼文'><i class='material-icons'>report_problem</i></i></a>";
							echo"</div>";
						echo"</div>";
				echo"</div>";
			echo"</div>";	
		echo"</div>";
	echo"</div>";
		
		echo"<div id='modal2' class='modal'>";
			echo"<div class='modal-content'>";
				echo"<h4 class='center-align'>個人資料</h4>";
						echo"<div class='row'>";
							echo"<div class='col s12 m4'>";
								echo"<div class='card'>";
										echo"<div class='card-image'>";
										echo"<img src='$avatar'>";
										echo"</div>";
										echo"<br>";
										echo"<div class='card-content'>";
											echo"<h5>使用者:".$member_row["account"]."</h5>";
											echo"<br>";
										echo"</div>";
								echo"</div>";
							echo"</div>";
							echo"<div class='col s12 m8'>";
								echo"<div class='card'>";
										echo"<div class='card-content'>";
											echo"<h5>自我簡介:".$member_row["comment"]."</h5>";
											echo"<h5>興趣:".$member_row["interest"]."</h5>";
											echo"<h5>社團:".$member_row["club"]."</h5>";
											echo"<h5>上站次數:".$member_row["times"]."</h5>";
											echo"<h5>個人網站:".$member_row["url"]."</h5>";
											echo"<a href='$url' class='modal-action modal-close waves-effect waves-green brown btn right'>前往</a>";
											echo"<br>";
										echo"</div>";
								echo"</div>";
							echo"</div>";
					echo"</div>";
				echo"</div>";
		echo"</div>";
		
		echo"<br>";
		
	}	
			

    //執行 SQL 命令
    $sql = "SELECT * FROM reply_message WHERE reply_id = $id";
    $result = execute_sql($link, "news", $sql);
	  
	echo"<div class='container'>";
		echo"<ul class='collection'>";
			echo"<li class='collection-item avatar'>";
				echo"<img src='images/NanhuSchool.png' alt='' class='circle'>";
				echo"<span class='title left'>發問前先查閱相關內容</span>";
				echo"<span class='author right'>發文者:系統管理員</span>";
				echo"<br>";
				echo"<p class='right'></p>";
				echo"<br>";
				echo"<hr>";
				echo"<p class='left'>記得遵守社群守則</p>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
			echo"</li>";
		echo"</ul>";
	echo"</div>";
			
    if (mysqli_num_rows($result) <> 0)
    {		  	
      //顯示回覆主題的內容
		while ($row = mysqli_fetch_assoc($result))
		{	
			
			$avatar = $row["avater"];
			
			echo"<div class='container'>";
				echo"<ul class='collection'>";
					echo"<li class='collection-item avatar'>";
						echo"<img src='$avatar' alt='' class='circle'>";
						echo"<span class='title left'>".$row["subject"]."</span>";
						echo"<span class='author right'>發文者:".$row["author"]."</span>";
						echo"<br>";
						echo"<p class='right'>".$row["date"]."</p>";
						echo"<br>";
						echo"<hr>";
						echo"<span class='left'>".$row["content"]."</span>";
						echo"<br>";
						echo"<br>";
						echo"<br>";
					echo"</li>";
				echo"</ul>";
			echo"</div>";
		}
    }
		
		//釋放記憶體空間
		mysqli_free_result($result);
		mysqli_close($link);
		
	?>
	
	<div id="modal3" class="modal">
		<div class="modal-content">
			<h4 class="center-align">檢舉貼文</h4>
				<div class="col s12 m6">
					<div class="card blue-grey darken-1 card">
					<div class="card-content white-text">
					<span class="card-title">此貼文違反的規定</span>
						<form name="report" method="post" action="report.php">
							<div class="input-field col m4 right">
								<i class="material-icons prefix">perm_identity</i>
								<input class="validate" name="author" type="text" value="<?php echo $users_row{"account"} ?>" readonly>
								<input type="hidden" name="reply_id" value="<?php echo $id ?>">
								<label for="icon_prefix2">帳號</label>
							</div>
							<div class="row">
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<input name="report"  id="name" type="text" class="validate" length="15">
									<label for="last_name">檢舉原因</label>
								</div>
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<textarea name="report_content" id="textarea" class="materialize-textarea" length="40"></textarea>
									<label for="last_name">檢舉附註內容</label>
								</div>
							</div>
							<br>
							<div class="card-action center-align">
								<a class="waves-effect waves-light btn brown" onClick="check_report()">發送</a>
								<a class="waves-effect waves-light btn brown" onClick="reset_report()">重新輸入</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="modal1" class="modal">
		<div class="modal-content">
			<h4 class="center-align">回覆貼文</h4>
				<div class="col s12 m6">
					<div class="card blue-grey darken-1 card">
						  <div class="card-content white-text">
							<form name="myForm" method="post" action="post_reply.php">
								<input type="hidden" name="reply_id" value="<?php echo $id ?>">
								<input type="hidden" name="avater" value="<?php echo $user_avatar ?>">
								<span class="card-title">留言板</span>
									<div class="input-field col m4 right">
										<i class="material-icons prefix">perm_identity</i>
										<input class="validate" name="author" type="text" value="<?php echo $users_row{"account"} ?>" readonly>
										<label for="icon_prefix2">帳號</label>
									</div>
								<div class="row">
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<input name="subject"  id="last_name" type="text" class="validate" length="15">
										<label for="last_name">主題</label>
									</div>
									<div class="input-field col s12 m12">
									  <i class="material-icons prefix">mode_edit</i>
									  <textarea name="content" id="textarea1" class="materialize-textarea" length="40"></textarea>
									  <label for="last_name">內容</label>
									</div>
								</div>
							  <br>
							  <div class="card-action center-align">
								<a class="waves-effect waves-light btn brown" onClick="check_data()">發送</a>
								<a class="waves-effect waves-light btn brown" onClick="reset()">重新輸入</a>
								<br>
								<br>
								<a href="main.php">回首頁</a>
							  </div>
							</form>
						</div>
					</div>
				</div>
		</div>
	</div>
</div>

	<br>
	<br>
	
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
  </body>
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<script src="js/materialize.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js" integrity="sha256-kRbW+SRRXPogeps8ZQcw2PooWEDPIjVQmN1ocWVQHRY=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
		<script type="text/javascript">
			var active = false;
						
			new Vue({
			    el: '#app',
			    data: {
			        fontsizesetting: 30,
			        fontStyle: {
			            'font-size': '30px'
			        }
			    },
			    methods: {
			        increasefontsize() {
			            this.fontStyle['font-size'] = `${this.fontsizesetting+= 5}px`
			        },
			        decreasefontsize() {
			            this.fontStyle['font-size'] = `${this.fontsizesetting-= 5}px`
			        },
			    }
			})

			function DeletePost(id)
			{
			  if (confirm("請確認是否刪除此貼文？"))
			    location.href = "delPost.php?show_posts=" + id;
			}
			
			function check_data()
			{		
				if (document.myForm.subject.value.length == 0)
				  {
					alert("回覆主題一定要填寫");
					return false;
				  }
				  if (document.myForm.subject.value.length > 15)
				  {
					alert("回覆主題不可以超過15個字元");
					return false;
				  }
				  if (document.myForm.content.value.length == 0)
				  {
					alert("回覆內容一定要填寫");
					return false;
				  }
				  if (document.myForm.content.value.length > 40)
				  {
					alert("回覆內容不可以超過40個字元");
					return false;
				  }				
			  myForm.submit();
			}
			
			function check_report()
			{		
				if (document.report.report.value.length == 0)
				  {
					alert("檢舉原因一定要填寫");
					return false;
				  }
				  if (document.report.report.value.length > 15)
				  {
					alert("檢舉原因不可以超過15個字元");
					return false;
				  }
				  if (document.report.report_content.value.length == 0)
				  {
					alert("檢舉附註內容一定要填寫");
					return false;
				  }
				  if (document.report.report_content.value.length > 40)
				  {
					alert("檢舉附註內容不可以超過40個字元");
					return false;
				  }				
			  report.submit();
			}
			
			function reset(){
				document.myForm.subject.value = ""
				document.myForm.content.value = ""
			}
			
			function reset_report(){
				document.report.report.value = ""
				document.report.report_content.value = ""
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
		
</html>