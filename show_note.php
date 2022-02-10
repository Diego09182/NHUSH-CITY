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
    $member_row = mysqli_fetch_assoc($result);  
	
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
	<nav class="light lighten-1 brown" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="forum.php" class="brand-logo center">NHUSH-CITY</a>
			<ul class="left hide-on-med-and-down">
				<li><a class="waves-effect">名稱:<?php echo $member_row{"account"} ?></a></li>
				<li><a class="waves-effect">姓名:<?php echo $member_row{"name"} ?></a></li>
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
				<li><a class="waves-effect">名稱:<?php echo $member_row{"account"} ?></a></li>
				<li><a class="waves-effect">姓名:<?php echo $member_row{"name"} ?></a></li>
				<li><a class="waves-effect">學號:<?php echo $member_row{"student_ID"} ?></a></li>
				<li><a class="waves-effect">行動電話:<?php echo $member_row{"cellphone"} ?></a></li>
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
			<h1 class="center header-text animate__animated animate__fadeIn" id="index-title1" >南湖高中</h1>
	    <div class="row center">
			<h5 class="header col s12 light animate__animated animate__fadeIn" id="index-title2">An exclusive community for Nanhu High School</h5>
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
			<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
		</ul>
	</div>
	
	<?php
	  echo "<div class='container center'>";
	 ?>
	 
	<br>
	
    <?php	
			
      //取得要顯示之記錄
      $id = $_GET["id"];
	  
	  //設定現行瀏覽的日記
	  setcookie("note_id", $id);
	
      //建立資料連接
      $link = create_connection();
			
      //執行SQL查詢
      $sql = "SELECT * FROM note WHERE id = $id";
      $result = execute_sql($link, "note", $sql);
	
      //顯示原討論主題的內容
      while ($row = mysqli_fetch_assoc($result))
      {
		
		$avatar = $member_row["avatar"];
		
		echo"<div class='row'>";
		
		echo"<div class='col s12 m3'>";
			echo"<div class='card left'>";
				echo"<div class='card-image'>";
					echo"<img src='$avatar'>";
					echo"<br>";
				echo"</div>";
				echo"<br>";	
				echo"<div class='card-content'>";
					echo"<h5>發文者:".$row["author"]."</h5>";
					echo"<p></p>";
					echo"<br>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
		
		echo"<div class='col s12 m9 right'>";
			echo"<div class='card'>";
				echo"<br>";
				echo"<br>";
						echo"<div class='card-content'>";
							echo"<h4>".$row["subject"]."</h4>";
							echo"<h5>".$row["content"]."</h5>";
							echo"<br>";
							echo"<div class='chip left'>";
								echo"#".$row["tag"];
							echo"</div>";
							echo"<p class='right'>發文時間:".$row["date"]."</p>";
							echo"<br>";
							echo"<br>";
							echo"<div class='card-action'>";
							echo"</div>";
						echo"<br>";
						if ($member_id == 45 or $member_id == $row["user_id"]){
							echo"<br><br>";
							echo"<a class='waves-effect waves-light btn brown right' onclick='DeleteNote($id)'>";
								echo"刪除";
							echo"</a>";
						}
						echo"</div>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
		
		echo"<br>";
		
      }	
			
      //釋放 $result 佔用的記憶體空間
      mysqli_free_result($result);

      //執行 SQL 命令
      $sql = "SELECT * FROM reply_message WHERE reply_id = $id";
      $result = execute_sql($link, "news", $sql);
	  
	echo"<div class='container'>";
		echo"<ul class='collection'>";
			echo"<li class='collection-item avatar'>";
				echo"<img src='images/NanhuSchool.png' alt='' class='circle'>";
				echo"<span class='title left'>在日誌中無法留言</span>";
				echo"<span class='author right'>發文者:系統管理員</span>";
				echo"<br>";
				echo"<p class='right'></p>";
				echo"<br>";
				echo"<hr>";
				echo"<p class='left'>一樣遵守社群守則</p>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
				echo"<br>";
			echo"</li>";
		echo"</ul>";
	echo"</div>";
			
      if (mysqli_num_rows($result) <> 0)
      {
		  
        echo "<table width='800' align='center' cellpadding='3'>";
		
        //顯示回覆主題的內容
        while ($row = mysqli_fetch_assoc($result))
        {
		  echo"<div class='container'>";
			  echo"<ul class='collection'>";
				  echo"<li class='collection-item avatar'>";
					  echo"<img src='images/NanhuSchool.png' alt='' class='circle'>";
					  echo"<span class='title left'>".$row["subject"]."</span>";
					  echo"<span class='author right'>發文者:".$row["author"]."</span>";
					  echo"<br>";
					  echo"<p class='right'>".$row["date"]."</p>";
					  echo"<br>";
					  echo"<hr>";
					  echo"<p class='left'>".$row["content"]."</p>";
					  echo"<br>";
					  echo"<br>";
					  echo"<br>";
					  echo"<br>";
				  echo"</li>";
			  echo"</ul>";
		  echo"</div>";
		  
        }
				
      }
	
	echo "</div>";
	
      //釋放記憶體空間
      mysqli_free_result($result);
      mysqli_close($link);
    ?>
		
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
			
			function check_data()
			{		
				if (document.myForm.subject.value.length == 0)
				  {
					alert("主題一定要填寫");
					return false;
				  }
				  if (document.myForm.subject.value.length > 15)
				  {
					alert("主題不可以超過15個字元");
					return false;
				  }
				  if (document.myForm.content.value.length == 0)
				  {
					alert("內容一定要填寫");
					return false;
				  }
				  if (document.myForm.content.value.length > 80)
				  {
					alert("內容不可以超過80個字元");
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
				  if (document.report.report_content.value.length > 80)
				  {
					alert("檢舉附註內容不可以超過80個字元");
					return false;
				  }				
			  report.submit();
			}
			
			function DeleteNote(id)
			{
			  if (confirm("請確認是否刪除此日記？"))
			    location.href = "delNote.php?show_note=" + id;
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