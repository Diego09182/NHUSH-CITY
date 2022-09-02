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
	
	$album_id = $_GET["album_id"];
  
	//建立資料連接
	$link = create_connection();
	  
	//刪除儲存在硬碟的相片
	$sql = "SELECT filename FROM photo WHERE album_id = $album_id
			AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$id')";
	$result = execute_sql($link, "album", $sql);
  
	while ($row = mysqli_fetch_assoc($result))
	{
		$file_name = $row["filename"];
		$photo_path = realpath("./Photo/$file_name");
		$thumbnail_path = realpath("./Thumbnail/$file_name");

		if (file_exists($photo_path))
			unlink($photo_path);

		if (file_exists($thumbnail_path))
			unlink($thumbnail_path);
	}
  
	//刪除儲存在資料庫的相片資訊
	$sql = "DELETE FROM photo WHERE album_id = $album_id
			AND EXISTS(SELECT '*' FROM album WHERE id = $album_id AND owner = '$id')";
	execute_sql($link, "album", $sql);

	//刪除儲存在資料庫的相簿資訊 	
	$sql = "DELETE FROM album WHERE id = $album_id AND owner = '$id'";
	execute_sql($link, "album", $sql);
		
	//釋放記憶體並關閉資料連接
	mysqli_free_result($result);
	mysqli_close($link);

	header("location:works.php");
?>