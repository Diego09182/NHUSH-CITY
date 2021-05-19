<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE
	$passed = $_COOKIE["passed"];
	$id = $_COOKIE{"id"};
	
  /*  如果 cookie 中的 passed 變數不等於 TRUE
      表示尚未登入網站，將使用者導向首頁 index.html	*/
	if ($passed != "TRUE")
	{
		header("location:index.html");
		exit();
	}
	if ($id != "45")
	{
		header("location:index.html");
		exit();
	}
 
	require_once("dbtools.inc.php");
			
    //建立資料連接
    $link = create_connection();
				
    //執行 SELECT 陳述式取得使用者資料
    $member_sql = "SELECT * FROM users Where id = $id";
    $member_result = execute_sql($link, "member", $member_sql);
		
    $row = mysqli_fetch_assoc($member_result);  
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
<body>

<div id='app'>	
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
					  <li><a href="#">twyaya</a></li>
					  <li><a href="https://github.com/twyaya"><img src="images/GitHub.png"></a></li>
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
	
	<br>
	
	<div class="container">

	<div class="row">				
		<div class="container">	
			<h3 class="center-align">審查文章</h3>
			<br>
			
			<?php
			
			//指定每頁顯示幾筆記錄
			$records_per_page = 8;
							
			//取得要顯示第幾頁的記錄
			if (isset($_GET["page"]))
			  $page = $_GET["page"];
			else
			  $page = 1;
									
			//執行SQL查詢
			$sql = "SELECT id, author, report, report_content ,date ,reply_id FROM reply_message ORDER BY date DESC";
			$result = execute_sql($link, "report", $sql);
								
			//取得記錄數 
			$total_records = mysqli_num_rows($result);
							
			//計算總頁數
			$total_pages = ceil($total_records / $records_per_page);
							
			//計算本頁第一筆記錄的序號
			$started_record = $records_per_page * ($page - 1);
							
			//將記錄指標移至本頁第一筆記錄的序號
			mysqli_data_seek($result, $started_record);
			
			$j = 1;
		
			echo"<div class='card-panel teal brown'>";
		
				while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
				{
					
						echo"<div class='row'>";
							echo"<div class='col s12 m12'>";
								echo"<div class='card blue-grey darken-1'>";
									echo"<div class='card-content white-text'>";
										echo"<span class='card-title'>".$row["report"]."</span>";
										echo"<span class='author right'>發文者:".$row["author"]."</span>";
											echo"<p>".$row["report_content"]."</p>";
											echo"<p class='right'>發文時間:".$row["date"]."</p>";
									echo"</div>";
									echo"<div class='card-action'>";
										echo"<a href='show_posts.php?id=".$row["reply_id"]."' class='waves-effect waves-light btn brown'>查看</a>";
										echo"<a href='delete_report' class='waves-effect waves-light btn brown right'>刪除檢舉</a>";
									echo"</div>";
									echo"<br><br>";
								echo"</div>";
							echo"</div>";
						echo"</div>";
					
					$j++;
					
				}
			
			echo"</div>";
			
			//產生導覽列
			echo"<ul class='pagination center'>";
						
			if ($page > 1)
						echo "<li class='waves-effect'><a href='review.php?page=". ($page - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
								
			for ($i = 1; $i <= $total_pages; $i++)
			{
			  if ($i == $page)
			    echo "<li class='waves-effect'><a href='review.php?page=$i'>$i</a></li>";
			  else
				echo"<li class='waves-effect'><a href='review.php?page=$i'>$i</a></li>";
			}
							
			if ($page < $total_pages)
						echo"<li class='waves-effect'><a href='review.php?page=". ($page + 1) . "'><i class='material-icons'>chevron_right</i></a></li>";
			echo "</p>";
			
			echo"</ul>";
			//釋放記憶體空間
			mysqli_free_result($result);
			mysqli_close($link);
			
			?>

			<h3 class="center-align">主要服務</h3>
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
	</div>
		
	<section id="slogan" class="tm-section-pad-top">
		<div class="row">
		  <div class="center-align col-12">
			<br>
			<h2 class="center-align">NHUSH CITY</h2>
			<p class="center-align">
			你能想像一個專屬於我們的社區嗎? 你可以在這裡分享對於學校與學習相關的任何問題。
			<br>
			<br>
			我們會不斷精進此系統，請提供任何意見給開發團隊。
			</p>
			<br>			
			<br>
		  </div>
		</div>		  
	</section>
		
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
								<h4>
								<blockquote><i class="material-icons medium">perm_phone_msg</i>02-26308889</p>
								<i class="material-icons medium">contacts</i>臺北市內湖區康寧路3段220號</p>
								</blockquote>
							</div>
						</div>
		            </div>
				</div>
			</div>
		</section>
	</div>

	<br><br>

</div>
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