<?php

	//登入狀態驗證
	session_start();
	if (empty($_SESSION["user"]))
	{
		header("location:index.html");
		exit();
	}
	
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>推薦候選人</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/hover.css"/>
	<link href="https://gnehs.github.io/ChatUI/css/ChatUI.css" rel="stylesheet">
	<link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  </head>
  <body>
    <h2 class="center-align">推薦候選人</h2>
	<div class="container">
		<div class="col s12 m6">
			<div class="card blue-grey darken-1 card">
				  <div class="card-content white-text">
					<form action="recommend.php" method="post" name="myForm">
						<span class="card-title">候選人資料</span>
							<div class="input-field col s6">
								<i class="material-icons prefix">mode_edit</i>
								<input name="name"  id="last_name" type="text" class="validate" length="3">
								<label for="last_name">候選人姓名</label>
							</div>
							<div class="input-field col s6">
							  <i class="material-icons prefix">mode_edit</i>
							  <textarea name="introduction" id="textarea1" class="materialize-textarea" length="50"></textarea>
							  <label for="last_name">候選人介紹</label>
							</div>
					  <br>
					  <div class="card-action center-align">
						<a class="waves-effect waves-light btn" onClick="check_data()">確定</a>
						<a class="waves-effect waves-light btn" onClick="reset()">重新輸入</a>
						<br>
						<br>
						<a href="http://localhost/NHUSH-CITY/index.php">回首頁</a>
					  </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.2.0/anime.js" integrity="sha256-kRbW+SRRXPogeps8ZQcw2PooWEDPIjVQmN1ocWVQHRY=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
	<script type="text/javascript">
		
		function check_data()
		{		
		  if (document.myForm.name.value.length == 0)
		  {
		    alert("「候選人姓名」一定要填寫哦...");
		    return false;
		  }
		  if (document.myForm.name.value.length > 3)
		  {
		    alert("「候選人姓名」不可以超過 3 個字元哦...");
		    return false;
		  }
		  if (document.myForm.introduction.value.length == 0)
		  {
		    alert("「候選人資訊」一定要填寫哦...");
		    return false;
		  }
		  if (document.myForm.introduction.value.length > 50)
		  {
		    alert("「候選人資訊」不可以超過 50 個字元哦...");
		    return false;
		  }				

		  myForm.submit();
		}
		
		function reset(){
			document.myForm.name.value = ""
			document.myForm.introduction.value = ""
		}
		
	</script>
  </body>
</html>