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
	
	<div class="fixed-action-btn horizontal click-to-toggle">
	    <a class="btn-floating btn-large brown">
			<i class="material-icons">menu</i>
	    </a>
	    <ul>
			<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
			<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
			<li><a href="#modal1" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="撰寫日誌"><i class="material-icons">mode_edit</i></i></a></li>
		</ul>
	</div>
	
	<div id="modal1" class="modal">
		<div class="modal-content">
			<div class="col s12 m12">
				<div class="card blue-grey darken-1 card">
					<div class="card-content white-text">
						<form name="myForm" method="post" action="post_note.php">
							<input type="hidden" name="author" value="<?php echo $users_row{"account"} ?>">
							<input type="hidden" name="owner" value="<?php echo $id ?>">
							<span class="card-title">日誌留言板</span>
							<div class="row">
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<input name="subject"  id="last_name" type="text" class="validate" length="15">
									<label for="last_name">日記主題</label>
								</div>
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<textarea name="content" id="textarea1" class="materialize-textarea" length="80"></textarea>
									<label for="last_name">日記內容</label>
								</div>
							</div>
							<br>
							<div class="card-action center-align">
								<a class="waves-effect waves-light btn" onClick="check_data()">發送</a>
								<a class="waves-effect waves-light btn" onClick="reset()">重新輸入</a>
								<br>
								<a href="main.php">回首頁</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="modal2" class="modal">
		<div class="modal-content">
			<div class="col s12 m6">
				<div class="card blue-grey darken-1 card">
					  <div class="card-content white-text">
						<form name="avatarForm" method="post" action="post_avatar.php">
							<input type="hidden" name="author" value="<?php echo $users_row{"account"} ?>">
							<input type="hidden" name="owner" value="<?php echo $id ?>">
							<span class="card-title">頭像上傳</span>
							<div class="row">
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<input name="avatar"  id="last_name" type="text" class="validate" length="200">
									<label for="last_name">頭像連結</label>
								</div>
							</div>
						  <br>
						  <div class="card-action center-align">
							<a class="waves-effect waves-light btn brown" onClick="check_avatar()">發送</a>
							<a class="waves-effect waves-light btn brown" onClick="reset()">重新輸入</a>
							<br>
							<a href="main.php">回首頁</a>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row">
			<div class="col s12 m9">
				<div class="card-panel teal brown">			
					<h4 class="white-text center">收藏貼文</h4>
					<hr>			
						<?php
							
							//指定每頁顯示幾筆記錄
							$records_per_page = 6;
																	
							//取得要顯示第幾頁的記錄
							if (isset($_GET["page"]))
								$page = $_GET["page"];
							else
								$page = 1;
																
							//執行SQL查詢
							$sql = "SELECT id, favorite, title, collector,date FROM collect_post WHERE collector = $id ORDER BY date DESC";
							$result = execute_sql($link, "news", $sql);
							
							//取得記錄數 
							$total_records = mysqli_num_rows($result);
																	
							//計算總頁數
							$total_pages = ceil($total_records / $records_per_page);
							
							//計算本頁第一筆記錄的序號
							$started_record = $records_per_page * ($page - 1);
											
							//將記錄指標移至本頁第一筆記錄的序號
							mysqli_data_seek($result, $started_record);
							 
							//顯示日記
							$j = 1;
							while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
							{
								
								echo"<ul class='collection'>";
									echo"<li class='collection-item avatar' class='col s12 m12'>";
											echo"<i class='material-icons circle'>folder</i>";
											echo"<div class='card-content'>";
											echo"<h5>";
												echo"文章ID:".$row["favorite"];
											echo"</h5>";
											echo"<hr>"; 
											echo"<p class='truncate right'>";
												echo"收藏時間:".$row["date"];
											echo"</p>";
											echo"<div class='left'>";
												echo"收藏者:".$users_row{"account"};
											echo"</div>";
											echo"<br>";
											echo"<br>";
											echo"<a class='waves-effect waves-light btn right brown' href='show_posts.php?id=".$row["favorite"]."'>";
												echo"查看";
											echo"</a>";
											echo"</div>";
									echo"</li>";	
								echo"</ul>";
																						
								$j++;
							}
							
							//產生導覽列
							echo"<ul class='pagination center'>";
								if ($page > 1)
									echo "<li class='waves-effect'><a href='myhome.php?page=". ($page - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
											
								for ($i = 1; $i <= $total_pages; $i++)
								{
									if ($i == $page)
										echo "<li class='waves-effect'><a href='myhome.php?page=$i'>$i</a></li>";
									else
										echo"<li class='waves-effect'><a href='myhome.php?page=$i'>$i</a></li>";
								}
										
								if ($page < $total_pages)
									echo"<li class='waves-effect'><a href='myhome.php?page=". ($page + 1) . "'><i class='material-icons'>chevron_right</i></a></li>";
								  echo "</p>";  
							echo"</ul>"; 
							
							//執行SQL查詢
							$sql = "SELECT id, author, tag, subject, date FROM message WHERE user_id = $id ORDER BY date DESC";
							$result = execute_sql($link, "news", $sql);
							
							//取得文章數
							$total_posts = mysqli_num_rows($result);
							
						?>
				</div>
			</div>
			
			<div class="col s12 m3">
				<div class="card animate__animated animate__fadeIn">
				<?php
					echo"<div class='card-image'>";
						 echo"<img src='$user_avatar'>";
					echo"</div>";
				?>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4"><i class="material-icons right">more_vert</i></span>
						<h5><?php echo $users_row{"account"} ?></h5>
						<a class="waves-effect waves-light btn right brown" href="#modal2">更改頭像</a>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">頭像<i class="material-icons right">close</i></span>
						<p>會顯示於發文者區塊</p>
					</div>
				</div>
			</div>		
			<div class="col s12 m3">
				<div class="card-panel">
					<h5 class="card-title grey-text text-darken-4 center">自我介紹</h5>
					<h5><?php echo $users_row{"comment"} ?></h5>
				</div>
			</div>			
			<div class="col s12 m3">
				<div class="card-panel">
					<h5 class="card-title grey-text text-darken-4 center">興趣</h5>
					<h5><?php echo $users_row{"interest"} ?></h5>
				</div>
			</div>			
			<div class="col s12 m3">
				<div class="card-panel">
					<h5 class="card-title grey-text text-darken-4 center">社團</h5>
					<h5><?php echo $users_row{"club"} ?></h5>
				</div>
			</div>			
			<div class="col s12 m3">
				<div class="card-panel">
					<h5 class="card-title grey-text text-darken-4 center">站內紀錄</h5>
					<br>
					<h5>上站次數:<?php echo $users_row{"times"}?></h5>
					<br>
					<h5>日記數量:<?php echo $total_records?></h5>
					<br>
					<h5>文章數量:<?php echo $total_posts?></h5>
					<br>
				</div>
			</div>						
		</div>	
	</div>
	
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
		
	<br>
	
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
<script src="js/init.js"></script>
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
			
			function check_avatar()
			{		
				if (document.avatarForm.avatar.value.length == 0)
				{
					alert("頭像連結一定要填寫");
					return false;
				}
				if (document.avatarForm.avatar.value.length > 200)
				{
					alert("頭像連結不可以超過200個字元");
					return false;
				}
			
				avatarForm.submit();
			}
			
			function reset(){
				document.myForm.subject.value = ""
				document.myForm.content.value = ""
				document.avatarForm.avatar.value = ""
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
