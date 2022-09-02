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
  			
    
	if (!isset($_POST["photo_name"]))
	{
		$photo_id = $_GET["photo_id"];
															
		//取得相簿名稱及相簿的主人
		$sql = "SELECT a.name, a.filename, a.comment, a.album_id, b.name AS album_name,
				b.owner FROM photo a, album b where a.id = $photo_id and b.id = a.album_id";
		$result = execute_sql($link, "album", $sql);
		$row = mysqli_fetch_object($result);
		$album_id = $row->album_id;
		$album_name = $row->album_name;
		$album_owner = $row->owner;
		$photo_name = $row->name;
		$file_name = $row->filename;
		$photo_comment = $row->comment;
		  
		//釋放 $result 佔用的記憶體	
		mysqli_free_result($result);
			
		//關閉資料連接	
		mysqli_close($link);
	  
		if ($album_owner != $id)
		{
		  echo "<script type='text/javascript'>";
			echo "alert('您不是相片的主人，無法修改相片名稱。')";
		  echo "</script>";
		}
	}
	else
	{
		$album_id = $_POST["album_id"];
		$photo_id = $_POST["photo_id"];
		$photo_name = $_POST["photo_name"];
		$photo_comment = $_POST["photo_comment"];
		
		$sql = "UPDATE photo SET name = '$photo_name', comment = '$photo_comment'
				WHERE id = $photo_id AND EXISTS(SELECT '*' FROM album
				WHERE id = $album_id AND owner = '$id')";
		execute_sql($link, "album", $sql);
			
		//關閉資料連接	
		mysqli_close($link);
		
		header("location:showAlbum.php?album_id=$album_id");
	}
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
	<h2 class="center-align">修改相片名稱</h2>
	<div class="container">
		<div class="col s12 m12">
			<div class="card blue-grey darken-1 card">
				<div class="card-content white-text">
					<form name="editPhotoform" method="post" action="editPhoto.php">
						<input type="hidden" name="photo_id" value="<?php echo $photo_id ?>">
						<input type="hidden" name="album_id" value="<?php echo $album_id ?>">
						<span class="card-title">更改相片</span>
						<div class="input-field col s12">
							<i class="material-icons prefix">mode_edit</i>
							<input name="photo_name" id="name" type="text" class="validate" length="30" value="<?php echo $photo_name ?>">
							<label for="last_name">相片名稱</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">mode_edit</i>
							<textarea class="materialize-textarea" name="photo_comment" type="text" length="80"><?php echo $photo_comment ?></textarea>
							<label for="last_name">相片描述</label>
						</div>
						<div class="card-action center-align">
							<a class="waves-effect waves-light btn" onClick="check_data()" <?php if ($album_owner != $id) echo 'disabled' ?>>確定</a>
							<br>
							<br>
							<a href="showAlbum.php?album_id=<?php echo $album_id ?>">回<?php echo $album_name ?>相簿</a>
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
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/zh_TW/sdk.js#xfbml=1&version=v6.0"></script>
<script src="js/init.js"></script>
<script type="text/javascript">
		function check_data()
		{		
			if (document.editPhotoform.photo_name.value.length == 0)
			{
				alert("相片名稱一定要填寫");
				return false;
			}
			if (document.editPhotoform.photo_comment.value.length == 0)
			{
				alert("相片內容一定要填寫");
				return false;
			}
			if (document.editPhotoform.photo_name.value.length > 30)
			{
				alert("相片名稱不可以超過30字");
				return false;
			}
			if (document.editPhotoform.photo_comment.value.length > 80)
			{
				alert("相片內容不可以超過80字");
				return false;
			}
			editPhotoform.submit();
		}
</script>
</html>