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
  
  <div class="section no-pad-bot" id="index-banner">
    <div class="container">
      <br><br>
	<h1 class="center header-text animate__animated animate__fadeIn" id="index-title1" >南湖高中</h1>
	<div class="row center">
		<h5 class="header col s12 light animate__animated animate__fadeIn" id="index-title2">An exclusive community for Nanhu High School</h5>
	</div>
    <br>
	<br>
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
				<li><a class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>	
				<li><a href="#modal1" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="發表文章"><i class="material-icons">mode_edit</i></i></a></li>
				<li><a href="myhome.php" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="我的小屋"><i class="material-icons">view_quilt</i></i></a></li>
			</ul>
		</div>
			
		<div id="modal1" class="modal">
			<div class="modal-content">
				<div class="col s12 m6">
					<div class="card blue-grey darken-1 card">
						  <div class="card-content white-text">
							<form name="myForm" method="post" action="post_article.php">
								<input type="hidden" name="owner" value="<?php echo $id ?>">
								<span class="card-title">文章上傳</span>
								<div class="row">
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<input name="title"  id="last_name" type="text" class="validate" length="15">
										<label for="last_name">文章標題</label>
									</div>
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<input name="tag" id="last_name" type="text" class="validate" length="4"></input>
										<label for="last_name">文章標籤</label>
									</div>
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<input name="introduction" id="last_name" type="text" class="validate" length="20"></input>
										<label for="last_name">文章簡介</label>
									</div>
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<textarea name="article_content" id="textarea1" class="materialize-textarea" length="200"></textarea>
										<label for="last_name">文章內容</label>
									</div>
									<div class="input-field col s12 m12">
										<i class="material-icons prefix">mode_edit</i>
										<textarea name="image_url" id="textarea1" class="materialize-textarea" length="200"></textarea>
										<label for="last_name">封面連結(imgur)</label>
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
		
		<div class="section">
			<div class="row">
				<div>	
					<h3 class="center-align">教育文章</h3>
					<br>
					
					<?php
						
						//指定每頁顯示幾筆記錄
						$records_per_page = 3;
														
						//取得要顯示第幾頁的記錄
						if (isset($_GET["page"]))
						  $page = $_GET["page"];
						else
						  $page = 1;
													
						//執行SQL查詢
						$sql = "SELECT id, title, tag, introduction, article_content, image_url,owner, date FROM article ORDER BY date DESC";
						$result = execute_sql($link, "news", $sql);
						
						//取得記錄數 
						$total_records = mysqli_num_rows($result);
														
						//計算總頁數
						$total_pages = ceil($total_records / $records_per_page);
														
						//計算本頁第一筆記錄的序號
						$started_record = $records_per_page * ($page - 1);
														
						//將記錄指標移至本頁第一筆記錄的序號
						mysqli_data_seek($result, $started_record);					
						
						echo"<div class='row'>";
										 
						//顯示記錄
						$j = 1;
						
						while ($row = mysqli_fetch_assoc($result) and $j <= $records_per_page)
						{		
							//將網址連結取出
							$image_url = $row["image_url"];
							
							echo"<div class='col s12 m3 left'>";
								echo"<div class='card hoverable'>";
										echo"<div class='card-image'>";
											echo"<img class='materialboxed' src='$image_url'>";
										echo"</div>";
										echo"<br>";
										echo"<div class='chip chip-two'>".$row["tag"]."</div>";
										echo"<div class='card-content'>";
											echo"<h5>".$row["title"]."</h5>";
											echo"<p class='truncate'>".$row["introduction"]."</p>";
											echo"<br>";
											echo"<a href='show_article.php?id=".$row["id"]."' class='waves-effect waves-light btn right brown'>查看</a>";
											echo"<br>";
											echo"<br>";
										echo"</div>";
								echo"</div>";
							echo"</div>";

							$j++;
						}
							echo"<div class='col s12 m3 right'>";
								echo"<div class='collection center-align'>";
									echo"<a  class='collection-item'><h4>文章分類</h4></a>";
									echo"<a  class='collection-item'>面試心得</a>";
									echo"<a  class='collection-item'>教育文章</a>";
									echo"<a  class='collection-item'>科系分享</a>";
								echo"</div>";
							echo"</div>";
						
						echo"</div>";
						
						//產生導覽列
						echo"<ul class='pagination center'>";
							if ($page > 1)
								echo "<li class='waves-effect'><a href='home_article.php?page=". ($page - 1) . "'><i class='material-icons'>chevron_left</i></a></li>";
										
							for ($i = 1; $i <= $total_pages; $i++)
							{
								if ($i == $page)
									echo "<li class='waves-effect'><a href='home_article.php?page=$i'>$i</a></li>";
								else
									echo"<li class='waves-effect'><a href='home_article.php?page=$i'>$i</a></li>";
							}
									
							if ($page < $total_pages)
								echo"<li class='waves-effect'><a href='home_article.php?page=". ($page + 1) . "'><i class='material-icons'>chevron_right</i></a></li>";
							  echo "</p>";  
						echo"</ul>";
						  
						  //釋放記憶體空間
						  mysqli_free_result($result);
						  mysqli_close($link);
									  
					?>
					
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
		<script src="https://unpkg.com/vue/dist/vue.js"></script>
		<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
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
				if (document.myForm.title.value.length == 0)
				  {
					alert("主題一定要填寫");
					return false;
				  }
				  if (document.myForm.title.value.length > 15)
				  {
					alert("主題不可以超過15個字元");
					return false;
				  }
				  if (document.myForm.introduction.value.length == 0)
				  {
					alert("簡介內容一定要填寫");
					return false;
				  }
				  if (document.myForm.introduction.value.length > 20)
				  {
					alert("簡介內容不可以超過20個字元");
					return false;
				  }
				  if (document.myForm.article_content.value.length == 0)
				  {
				  	alert("文章內容一定要填寫");
				  	return false;
				  }
				  if (document.myForm.article_content.value.length > 200)
				  {
				  	alert("文章內容不可以超過200個字元");
				  	return false;
				  }
				  if (document.myForm.tag.value.length == 0)
				  {
				  	alert("標籤一定要填寫");
				  	return false;
				  }
				  if (document.myForm.tag.value.length != 4)
				  {
				  	alert("標籤內容要符合4字格式");
				  	return false;
				  }
				  if (document.myForm.image_url.value.length == 0)
				  {
				  	alert("圖片連結一定要填寫");
				  	return false;
				  }
				  if (document.myForm.image_url.value.length > 200)
				  {
				  	alert("圖片連結不可以超過200個字元");
				  	return false;
				  }
			  myForm.submit();
			}
			
			function reset(){
				document.myForm.title.value = ""
				document.myForm.introduction.value = ""
				document.myForm.url.value = ""
				document.myForm.tag.value = ""
				document.myForm.image_url.value = ""
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