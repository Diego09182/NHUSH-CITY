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
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>NHUSH-CITY</title>
    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon"/>
  </head>	
  <body>
	  
	<div id='app'>
		
	<nav class="light lighten-1 brown" role="navigation">
	    <div class="nav-wrapper container"><a id="logo-container" href="works.php" class="brand-logo center">NHUSH-CITY</a>
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
	
	<banner></banner>
	
	<br>
	
    <?php
	
    require_once("dbtools.inc.php");
    $album_id = $_GET["album"];
    $photo_id = $_GET["photo"];
      
    //建立資料連接
    $link = create_connection();
      
    //取得並顯示相簿名稱
    $sql = "SELECT name FROM album WHERE id = $album_id";
    $result = execute_sql($link, "album", $sql);
    $album_name = mysqli_fetch_object($result)->name;    
	
    echo "<h4 align='center'>作品名:".$album_name."</h4>";
      
    //取得並顯示相片資料
	$sql = "SELECT filename, comment FROM photo WHERE id = $photo_id";
    $result = execute_sql($link, "album", $sql);
    $row = mysqli_fetch_object($result);
    $file_name = $row->filename;
    $comment = $row->comment;
	  
	echo"<div class='container'>";
		echo"<div class='row'>";
			echo"<div class='col'>";
				echo"<div class='card'>";
					echo "<p align='center'><img src='Photo/$file_name' style='border-style:solid;border-width:1px'></p>";
				echo"</div>";
			echo"</div>";
			echo"<div class='col s12 m5'>";
				echo"<div class='card'>";
					echo"<div class='card-content'>";
						echo"<h5>".$comment."</h5>";
					echo"</div>";
				echo"</div>";
			echo"</div>";
		echo"</div>";
	echo"</div>";
	
    //取得並建立相片導覽資料
    $sql = "SELECT a.id, a.filename FROM (SELECT id, filename FROM photo 
			WHERE album_id = $album_id AND (id <= $photo_id)
            ORDER BY id desc) a ORDER BY a.id";
	
    $result = execute_sql($link, "album", $sql);
      
    echo "<hr><p align='center'>";
      while ($row = mysqli_fetch_assoc($result))
      {
      	if ($row["id"] == $photo_id)
      	{
      	  echo "<img src='Thumbnail/" . $row["filename"] .
      	       "' style='border-style:solid;border-color: Red;border-width:2px'>　";
      	}
      	else
      	{
      	  echo "<a href='photoDetail.php?album=$album_id&photo=" . $row["id"] .
      	       "'><img src='Thumbnail/" . $row["filename"] .
      	       "' style='border-style:solid;border-color:Black;border-width:1px'></a>　";
      	}
      }      
      
      $sql = "SELECT id, filename FROM photo WHERE album_id = $album_id AND (id > $photo_id)
              ORDER BY id";			  
      $result = execute_sql($link, "album", $sql);      
      while ($row = mysqli_fetch_assoc($result))
      {
      	echo "<a href='photoDetail.php?album=$album_id&photo=" . $row["id"] .
      	     "'><img src='Thumbnail/" . $row["filename"] .
      	     "' style='border-style:solid;border-color:Black;border-width:1px'></a>　";
      }      
      echo "</p>";
		  		
      //釋放記憶體
      mysqli_free_result($result);
	  //關閉資料連接
      mysqli_close($link);
    ?>
    <p align="center">
      <a href="showAlbum.php?album_id=<?php echo $album_id ?>">回到【<?php echo $album_name ?>】作品首頁
    </p>
	
	<footers></footers>
	
</div>
</body>
<!--  Scripts-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.8/vue.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue-router/3.0.1/vue-router.js"></script>
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="js/materialize.js"></script>
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
</html>