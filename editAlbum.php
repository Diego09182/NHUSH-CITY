<?php
  require_once("dbtools.inc.php");
  
  //登入狀態驗證
  session_start();
  if (empty($_SESSION["user"]))
  {
    header("location:index.html");
    exit();
  }
  
  $id = $_SESSION["user"];
  
  //建立資料連接
  $link = create_connection();
    
  if (!isset($_POST["album_id"]))
  {
    $album_id = $_GET["album_id"];
  														
    //取得相簿名稱及相簿所有者的帳號
    $sql = "SELECT name, owner FROM album where id = $album_id";
    $result = execute_sql($link, "album", $sql);
    $row = mysqli_fetch_object($result);
    $album_name = $row->name;
    $album_owner = $row->owner;
      
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //關閉資料連接	
    mysqli_close($link);
	
    if ($album_owner != $id)
    {
      echo "<script type='text/javascript'>";
      echo "alert('您不是相簿的主人，無法修改相簿名稱。');";
      echo "</script>";
	  header("location:index.html");
	  exit();
	  
    }
  }
  else
  {
    $album_id = $_POST["album_id"];
    $album_name = $_POST["album_name"];
    $sql = "UPDATE album SET name = '$album_name'
            WHERE id = $album_id AND owner = '$id'";
    execute_sql($link, "album", $sql);
  			
    //關閉資料連接	
    mysqli_close($link);
    
    header("location:works.php");
  }
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
	  
    <h2 align="center">修改相簿名稱</h2>
	
	<div class="container">
		<div class="col s12 m6">
			<div class="card blue-grey darken-1 card">
				  <div class="card-content white-text">
					<form name="editAlbumform" method="post" action="editAlbum.php">
						<input type="hidden" name="album_id" value="<?php echo $album_id ?>">
						<span class="card-title">更改相簿</span>
						<div class="input-field col s6">
							<i class="material-icons prefix">mode_edit</i>
							<input name="album_name" id="name" type="text" class="validate" length="8" value="<?php echo $album_name ?>">
							<label for="last_name">相簿名稱</label>
						</div>
						<br>
						<div class="card-action center-align">
							<a class="waves-effect waves-light btn" type="submit" onClick="check_editAlbum()">更新</a>
							<a class="waves-effect waves-light btn" onClick="reset()">重新輸入</a>
							<br>
							<br>
							<a href="works.php">回首頁</a>
						</div>
					</form>
				</div>
			</div>
		</div>
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
  	
  	function check_editAlbum()
  	{		
  		if (document.editAlbumform.album_name.value.length == 0)
  		{
  			alert("相簿名稱一定要填寫");
  			return false;
  		}
  		  if (document.editAlbumform.album_name.value.length > 8)
		{
  			alert("相簿名稱不可以超過8個字元");
  			return false;
  		}
	
		editAlbumform.submit();
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