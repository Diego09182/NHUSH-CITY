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
    $member_sql = "SELECT * FROM users Where id = $id";
    $member_result = execute_sql($link, "member", $member_sql);
		
    $users_row = mysqli_fetch_assoc($member_result);  
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
  	<div class="nav-wrapper container"><a id="logo-container" href="forum.php" class="brand-logo center">NHUSH-CITY</a>
  	  <ul class="left hide-on-med-and-down">
  		<li><a class="waves-effect">名稱:<?php echo $users_row{"account"} ?></a></li>
  		<li><a class="waves-effect">姓名:<?php echo $users_row{"name"} ?></a></li>
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
				
					echo"<div class='card-panel teal brown col s12 m12'>";
				
							while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
							{
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
												echo"<a href='delReport.php' class='waves-effect waves-light btn brown right'>刪除檢舉</a>";
											echo"</div>";
											echo"<br><br>";
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
					
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1 card">
							  <div class="card-content white-text">
								<form name="myForm" method="post" action="post_update.php" enctype="multipart/form-data">
										<input type="hidden" name="user_id" value="<?php echo $id ?>">
										<div class="card-content white-text">
											<span class="card-title">系統更新</span>
											<div class="input-field col m4 right">
												<i class="material-icons prefix">perm_identity</i>
												<input class="validate white-text" name="author" type="text" value="<?php echo $users_row{"account"} ?>" readonly>
												<label class="white-text" for="icon_prefix2">帳號</label>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix">mode_edit</i>
												<input class="validate" name="subject" type="text" size="15" length="15">
												<label for="icon_prefix2">更新主題</label>
											</div>
											<br>
											<div class="input-field col s12">
												<i class="material-icons prefix">mode_edit</i>
												<textarea class="materialize-textarea" name="content" size="80" length="80"></textarea>
												<label for="icon_prefix2">更新內容</label>
											</div>
											<div class="input-field col s12">
												<i class="material-icons prefix">mode_edit</i>
												<input class="validate" name="tag" type="text" size="4" length="4">
												<label for="icon_prefix2">標籤</label>
											</div>
											<br>
											<a class="waves-effect waves-light btn brown right" onClick="check_data()">確定</a>
											<a class="waves-effect waves-light btn brown right" onClick="reset()">重新輸入</a>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col s12 m12">
						<div class="card blue-grey darken-1 card">
							  <div class="card-content white-text">
								<form name="billboard" method="post" action="post_billboard.php" enctype="multipart/form-data">
										<input type="hidden" name="user_id" value="<?php echo $id ?>">
										<div class="card-content white-text">
											<span class="card-title">公布欄更新</span>
											<div class="input-field col m4 right">
												<i class="material-icons prefix">perm_identity</i>
												<input class="validate white-text" name="author" type="text" value="<?php echo $users_row{"account"} ?>" readonly>
												<label class="white-text" for="icon_prefix2">帳號</label>
											</div>
											<br>
											<div class="input-field col s12">
												<i class="material-icons prefix">mode_edit</i>
												<textarea class="materialize-textarea" name="billboard" size="80" length="80"></textarea>
												<label for="icon_prefix2">公布內容</label>
											</div>
											<br>
											<a class="waves-effect waves-light btn brown right" onClick="check_billboard()">確定</a>
											<a class="waves-effect waves-light btn brown right" onClick="reset_billboard()">重新輸入</a>
										</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				
				<serve></serve>
				
			</div>
			
			<slogan></slogan>
			
			<br><br>
		</div>
	</div>	

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
	
	function check_data()
	{		
		if (document.myForm.subject.value.length == 0)
		  {
			alert("更新標題一定要填寫");
			return false;
		  }
		  if (document.myForm.subject.value.length > 15)
		  {
			alert("更新標題不可以超過15個字元");
			return false;
		  }
		  if (document.myForm.content.value.length == 0)
		  {
			alert("更新內容一定要填寫");
			return false;
		  }
		  if (document.myForm.content.value.length > 40)
		  {
			alert("更新內容不可以超過40個字元");
			return false;
		  }
		  
		myForm.submit();
	}
	
	function check_billboard()
	{		

		  if (document.billboard.billboard.value.length == 0)
		  {
			alert("公布內容一定要填寫");
			return false;
		  }
		  if (document.billboard.billboard.value.length > 40)
		  {
			alert("公布內容不可以超過40個字元");
			return false;
		  }
		  
		billboard.submit();
	}
	
	function reset(){
		document.myForm.subject.value = ""
		document.myForm.content.value = ""
	}
	
	function reset_billboard(){
		document.billboard.billboard.value = ""
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