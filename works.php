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
    $users = mysqli_fetch_assoc($users_result);
    $avatar = $users{"avatar"};
	
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
	<link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon" />
</head>
<body>
<div id="app">

	<nav class="light lighten-1 brown" role="navigation">
		<div class="nav-wrapper container"><a id="logo-container" href="main.php" class="brand-logo center">NHUSH-CITY</a>
			<ul class="left hide-on-med-and-down">
				<li><a class="waves-effect">名稱:<?php echo $users{"account"} ?></a></li>
				<li><a class="waves-effect">姓名:<?php echo $users{"name"} ?></a></li>
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
								echo"<img class='circle' src='$avatar'>";
							echo"</a>";
						?>
						<a><span class="name">十三</span></a>
					</div>
				</li>
				<blockquote>
				<li><a class="waves-effect"><i class="material-icons">info_outline</i>帳戶資訊</a></li>
				<li><a class="waves-effect">名稱:<?php echo $users{"account"} ?></a></li>
				<li><a class="waves-effect">姓名:<?php echo $users{"name"} ?></a></li>
				<li><a class="waves-effect">學號:<?php echo $users{"student_ID"} ?></a></li>
				<li><a class="waves-effect">行動電話:<?php echo $users{"cellphone"} ?></a></li>
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
			<li><a href="modify.php" class="btn-floating btn waves-effect waves-light green"><i class="tooltipped" data-position="top" data-tooltip="修改資料"><i class="material-icons">perm_identity</i></i></a></li>
			<li><a href="#modal1" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="上傳作品"><i class="material-icons">mode_edit</i></i></a></li>
		</ul>
	</div>
	  
	<div id="modal1" class="modal">
		<div class="modal-content">
	  		<div class="col s12 m6">
	  			<div class="card blue-grey darken-1 card">
	  				  <div class="card-content white-text"> 
	  					<form name="Albumform" method="post" action="addAlbum.php">
	  						<span class="card-title">加入相簿</span>
	  						<div class="row">
								<div class="input-field col s12 m12">
									<i class="material-icons prefix">mode_edit</i>
									<input name="album_name"  id="name" type="text" class="validate" length="8">
									<label for="last_name">相簿名稱</label>
								</div>
	  						</div>
	  						<br>
	  						<div class="card-action center-align">
								<a class="waves-effect waves-light btn brown" type="submit" @click="check_album()">上傳</a>
								<a class="waves-effect waves-light btn brown" onClick="reset()">重新輸入</a>
	  							<br>
	  							<br>
	  							<a href="works.php">回首頁</a>
	  						</div>
	  					</form>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	</div>
	  
	<div class="container"> 
	
	<?php
														
    //取得所有相簿的資料
    $sql = "SELECT id, name, owner FROM album order by name";
    $album_result = execute_sql($link, "album", $sql);
    
    //取得相簿的數目
    $total_album = mysqli_num_rows($album_result);
    
    echo "<p class='center'>總共有".$total_album."項作品</p>";
    echo "<table border='0' align='center'>";
    
    //指定每列顯示幾個相簿
    $album_per_row = 3;
      					
    //顯示相簿清單
    $i = 1;
    while ($row = mysqli_fetch_assoc($album_result))
    {
      	//取得相簿編號、名稱及相簿的主人
      	$album_id = $row["id"];
      	$album_name = $row["name"];
      	$album_owner = $row["owner"];
      	
      	$sql = "SELECT filename FROM photo WHERE album_id = $album_id";
      	$photo_result = execute_sql($link, "album", $sql);
      	
      	//取得相簿的相片數目
      	$total_photo = mysqli_num_rows($photo_result);
      	
      	//相片數目大於 0 就以第一張相片當作相簿封面，否則以 None.png 當封面
      	if ($total_photo > 0)
          $cover_photo = mysqli_fetch_object($photo_result)->filename;
      	else
      	  $cover_photo = "None.png";
      	
      	//釋放記憶體  
      	mysqli_free_result($photo_result);
      	
        if ($i % $album_per_row == 1)
          echo "<tr align='center' valign='top'>";
        
        echo"<td>";
				
		echo"<div class='row'>";
			echo"<div class='col'>";
				echo"<div class='card'>";
					echo"<div class='card-image'>";
						echo"<img src='Thumbnail/$cover_photo' style='border-color:Black;border-width:1px'>";
					echo"</div>";
					echo"</a>";
					echo"<div class='card-content'>";
						echo"<h5>".$album_name."</h5>";
						echo"<br>";
						echo"<p class='right'>總共有".$total_photo."張圖片</p>";
						echo"<br><br>";
						echo"<a class='waves-effect waves-light btn right brown' href='showAlbum.php?album_id=$album_id'>";
							echo"查看";
						echo"</a>";
					echo"</div>";
					if ($album_owner == $id)
					{
						echo"<div class='card-action'>";
							echo"<a class='waves-effect waves-light btn brown' href='editAlbum.php?album_id=$album_id'>";
								echo"編輯";
							echo"</a>";
							echo'&nbsp;';
							echo"<a class='waves-effect waves-light btn brown' href='#' onclick='DeleteAlbum($album_id)'>";
								echo"刪除";
							echo"</a>";
						echo"</div>";
					}
				echo"</div>";
			echo"</div>";
		echo"</div>";
        
        echo "</td>";
        
        if ($i % $album_per_row == 0 || $i == $total_album)
          echo "</tr>";
               
        $i++;
    }
      
		echo "</table>" ;
														
		//釋放記憶體並關閉資料連接
		mysqli_free_result($album_result);
		mysqli_close($link);
	 
    ?>
	
	</div>
	
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
	  
    function DeleteAlbum(album_id)
    {
      if (confirm("請確認是否刪除此相簿？"))
        location.href = "delAlbum.php?album_id=" + album_id;
    }
	
	function check_album()
	{
		if (document.Albumform.album_name.value.length == 0)
		{
			alert("相簿名稱一定要填寫");
			return false;
		}
		if (document.Albumform.album_name.value.length > 8)
		{
			alert("相簿名稱不可以超過8字");
			return false;
		}
		Albumform.submit();
	}
	
	function reset(){
		document.Albumform.album_name.value = ""
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