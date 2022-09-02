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
    <link rel="shortcut icon" href="images/NHUSHFOX.ico" type="image/x-icon" />
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
				<li><a class="waves-effect">學號:<?php echo $row{"student_ID"} ?></a></li>
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
     
    <banner></banner>
	
    <?php
      
    $album_id = $_GET["album_id"];
    
    //取得相簿的名稱及相簿的主人
    $sql = "SELECT name, owner FROM album WHERE id = $album_id";
    $result = execute_sql($link, "album", $sql);
    $row = mysqli_fetch_object($result);
    $album_name = $row->name;
    $album_owner = $row->owner;
      
	echo "<div class='container'>";
	  
	echo "<h4 align='center'>作品名:".$album_name."</h4>";

    //取得相簿裡所有照片的縮圖
    $sql = "SELECT id, name, filename FROM photo WHERE album_id = $album_id";
    $result = execute_sql($link, "album", $sql);
	$total_photo = mysqli_num_rows($result);
	  
    echo "<table border='0' align='center'>";

    //指定每列顯示幾張照片
    $photo_per_row = 4;
      					
    //顯示相片縮圖
    $i = 1;
    while ($row = mysqli_fetch_assoc($result))
    {
      	$photo_id = $row["id"];
      	$photo_name = $row["name"];
      	$file_name = $row["filename"];
      	
        if ($i % $photo_per_row == 1)
          echo "<tr align='center'>";
        
        echo "<td width='160px'>";
        
		echo"<div class='row'>";
			echo"<div class='col'>";
				echo"<div class='card'>";
					echo"<div class='card-image'>";
						echo"<img src='Thumbnail/$file_name' style='border-color:Black;border-width:1px'>";
					echo"</div>";
					echo"</a>";
					echo"<div class='card-content'>";
						echo"<h5>".$album_name."</h5>";
						echo"<h6>".$photo_name."</h6>";
						echo"<br><br>";
						echo"<a class='waves-effect waves-light btn right brown' href='photoDetail.php?album=$album_id&photo=$photo_id'>";
							echo"查看";
						echo"</a>";
					echo"</div>";
					if ($album_owner == $id){
						echo"<div class='card-action'>";
							echo"<a class='waves-effect waves-light btn brown' href='editPhoto.php?photo_id=$photo_id'>";
								echo"編輯";
							echo"</a>";
							echo'&nbsp;';
							echo"<a class='waves-effect waves-light btn brown' href='#' onclick='DeletePhoto($album_id, $photo_id)'>";
								echo"刪除";
							echo"</a>";
						echo"</div>";
					}
				echo"</div>";
			echo"</div>";
		echo"</div>";
          
        echo "<p></td>";
        
        if ($i % $photo_per_row == 0 || $i == $total_photo)
          echo "</tr>";
        
        $i++;
    }
      
    echo"</table>";
	
	if ($album_owner == $id)
	{
		echo"<div class='fixed-action-btn horizontal click-to-toggle'>";
		    echo"<a class='btn-floating btn-large brown'>";
				echo"<i class='material-icons'>menu</i>";
		    echo"</a>";
		    echo"<ul>";
				echo"<li><a href='modify.php' class='btn-floating btn waves-effect waves-light green'><i class='tooltipped' data-position='top' data-tooltip='修改資料'><i class='material-icons'>perm_identity</i></i></a></li>";
				echo"<li><a href='#modal1' class='btn-floating btn waves-effect waves-light blue'><i class='tooltipped' data-position='top' data-tooltip='上傳相片'><i class='material-icons'>mode_edit</i></i></a></li>";
			echo"</ul>";
		echo"</div>";
	}
	
	echo "</div>";
	
	//釋放資源並關閉資料連接
	mysqli_free_result($result);
	mysqli_close($link);
	
    ?>
	
	<br><br><br><br><br><br><br><br><br><br><br>
	
	<div id="modal1" class="modal">
		<div class="modal-content">
			<div class="card blue-grey darken-1 card">
				<div class="card-content white-text">
					<form name="imageform" method="post" action="uploadPhoto.php" enctype="multipart/form-data">
						<input type="hidden" name="album_id" value="<?php echo $album_id ?>">
						<input type="hidden" name="album_owner" value="<?php echo $album_owner ?>">
						<span class="card-title">上傳相片</span>
						<div class="row">
							<div class="input-field col s12 m12">
								<div class='file-field input-field'>
									<div class='btn brown'>
										<span>圖片上傳</span>
										<input type='file' name='myfile[]' size='50' accept='image/*'>
									</div>
									<div class='file-path-wrapper'>
										<input class='file-path validate' type='text'>
									</div>
								</div>
							</div>
							<div class="input-field col s12 m12">
								<div class='file-field input-field'>
									<div class='btn brown'>
										<span>圖片上傳</span>
										<input type='file' name='myfile[]' size='50' accept='image/*'>
									</div>
									<div class='file-path-wrapper'>
										<input class='file-path validate' type='text'>
									</div>
								</div>
							</div>
							<div class="input-field col s12 m12">
								<div class='file-field input-field'>
									<div class='btn brown'>
										<span>圖片上傳</span>
										<input type='file' name='myfile[]' size='50' accept='image/*'>
									</div>
									<div class='file-path-wrapper'>
										<input class='file-path validate' type='text'>
									</div>
								</div>
							</div>
							<div class="input-field col s12 m12">
								<div class='file-field input-field'>
									<div class='btn brown'>
										<span>圖片上傳</span>
										<input type='file' name='myfile[]' size='50' accept='image/*'>
									</div>
									<div class='file-path-wrapper'>
										<input class='file-path validate' type='text'>
									</div>
								</div>
							</div>
						</div>
						<br>
						<div class="card-action center-align">
							<a class="waves-effect waves-light btn" type="submit" onClick="check_photo()">上傳</a>
							<br>
							<br>
							<a href="works.php">回首頁</a>
						</div>
					</form>
				</div>
			</div>
		</div>
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
		
	function check_photo()
	{  
		imageform.submit();
	}
		
	function DeletePhoto(album_id, photo_id)
	{
		if (confirm("請確認是否刪除此相片？"))
			location.href = "delPhoto.php?album_id=" + album_id + "&photo_id=" + photo_id;
	}
		
</script>
</body>                                                                                 
</html>