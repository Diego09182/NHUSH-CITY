<?php
  //檢查 cookie 中的 passed 變數是否等於 TRUE 
  $passed = $_COOKIE{"passed"};
  $id = $_COOKIE{"id"};
  //如果 cookie 中的 passed 變數不等於 TRUE
  //表示尚未登入網站，將使用者導向首頁 index.html
  if ($passed != "TRUE")
  {
    header("location:index.html");
    exit();
  }
  if ($id == "")
  {
    header("location:index.html");
    exit();
  }
	
  //如果 cookie 中的 passed 變數等於 TRUE
  //表示已經登入網站，取得使用者資料	
  else
  {
    require_once("dbtools.inc.php");
		
    $id = $_COOKIE{"id"};
		
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="css/hover.css"/>
  <link href="https://gnehs.github.io/ChatUI/css/ChatUI.css" rel="stylesheet">
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">		
  </head>
  <body>
	
	
	<div class="container">
		<div class="container">
			<h3 class="center-align">修改資料</h3>
			<div class="card">
				<form name="myForm" method="post" action="update.php" >
					<div class="card blue-grey darken-1 card">
						  <div class="card-content white-text">
							<form action="update.php" method="post" name="myForm">
								<span class="card-title">使用者資料(標示「*」欄位請務必填寫)</span>
									<div class="input-field col s6">
										<p>*使用者帳號:</p>
										<br>
										<p><?php echo $row{"account"} ?></p>
									</div>
									<div class="row">
										<div class="input-field col m6">
											*使用者密碼：
											<input name="password" type="password" class="validate" size="10" length="10" value="<?php echo $row{"password"} ?>">
											(請使用英文或數字鍵，勿使用特殊字元)
										</div>
										<div class="input-field col m6">
											*密碼確認：
											<input name="re_password" type="password" class="validate" size="10" length="10" value="<?php echo $row{"password"} ?>">
											(再輸入一次密碼，並記下您的使用者名稱與密碼)
										</div>
									</div>
									<div class="input-field col s8">
										*使用者姓名：
										<input name="name"  id="name" type="text" class="validate" size="3" length="3" value="<?php echo $row{"name"} ?>">
										(使用非真實姓名管理員將刪除帳號)
									</div>
									<br>
									<div class="row">
										<p>*生日:民國 年 月 日</p>
										<div class="input-field">
											<input class="col m3" name="year" type="text" class="validate" size="2" value="<?php echo $row{"year"} ?>"> 
											<input class="col m3" name="month" type="text" class="validate" name="month" size="2" value="<?php echo $row{"month"} ?>">
											<input class="col m3" name="day" type="text" class="validate" name="day" size="2" value="<?php echo $row{"day"} ?>">
										</div>
									</div>
									<div class="row">
										<div class="input-field col m6">
											*學號：
											<input name="student_ID" type="text" size="8" length="8" value="<?php echo $row{"student_ID"} ?>">
											(依照學校學號格式)
										</div>
										<div class="input-field col m6">
											*行動電話：
											<input name="cellphone" type="text" size="10" length="10" value="<?php echo $row{"cellphone"} ?>">
										</div>
									</div>
									<div class="row">
										<div class="input-field col m6">
											*E-mail
											<input name="email" type="text" size="30" length="30" value="<?php echo $row{"email"} ?>">
										</div>	
										<div class="input-field col m6">
											個人網站：
											<input name="url" type="text" size="40" length="40" value="<?php echo $row{"url"} ?>"></td>
										</div>
									</div>
									<div class="input-field col s8">
										興趣：
										<textarea name="interest" id="textarea1" size="30" length="30" class="materialize-textarea"><?php echo $row{"interest"} ?></textarea>
									</div>
									<div class="input-field col s8">
										自我介紹：
										<textarea name="comment" id="textarea1" size="30" length="30" class="materialize-textarea"><?php echo $row{"comment"} ?></textarea>
									</div>
							  <br>
							  <div class="card-action center-align">
								<a class="waves-effect waves-light btn" onClick="check_data()">確定</a>
								<a class="waves-effect waves-light btn" onClick="reset()">重新輸入</a>
								<br>
								<br>
								<a href="http://localhost/NHUSH-CITY/main.php">回首頁</a>
							  </div>
							</form>
						</div>
					</div>
				</form>
			</div>
		</div>
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
	
  </body>
</html>

	<script src="https://unpkg.com/vue/dist/vue.js"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="js/materialize.js"></script>
    <script type="text/javascript">
      function check_data()
      {
        if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫哦...");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
          alert("「使用者密碼」不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.re_password.value.length == 0)
        {
          alert("「密碼確認」欄位忘了填哦...");
          return false;
        }
        if (document.myForm.password.value != document.myForm.re_password.value)
        {
          alert("「密碼確認」欄位與「使用者密碼」欄位一定要相同...");
          return false;
        }
        if (document.myForm.name.value.length == 0)
        {
          alert("您一定要留下真實姓名哦！");
          return false;
        }	
        if (document.myForm.year.value.length == 0)
        {
          alert("您忘了填「出生年」欄位了...");
          return false;
        }
        if (document.myForm.month.value.length == 0)
        {
          alert("您忘了填「出生月」欄位了...");
          return false;
        }	
        if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
        {
          alert("「出生月」應該介於 1-12 之間哦！");
          return false;
        }
        if (document.myForm.day.value.length == 0)
        {
          alert("您忘了填「出生日」欄位了...");
          return false;
        }
        if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
        {
          alert("二月只有 28 天，最多 29 天");
          return false;
        }
		if (document.myForm.month.value > 30)
		{
		  alert("二月只有 28 天，最多 29 天");
		  return false;
		}
        if (document.myForm.month.value == 4 | document.myForm.month.value == 6
          | document.myForm.month.value == 9 | document.myForm.month.value == 11)
        {
          if (document.myForm.day.value > 30)
          {
            alert("4 月、6 月、9 月、11 月只有 30 天哦！");
            return false;					
          }
        }	
        else
        {
          if (document.myForm.day.value > 31)
          {
            alert("1 月、3 月、5 月、7 月、8 月、10 月、12 月只有 31 天哦！");
            return false;					
          }				
        }
        if (document.myForm.day.value > 31 | document.myForm.day.value < 1)
        {
          alert("出生日應該在 1-31 之間");
          return false;
        }
		if (document.myForm.student_ID.value.length != 8 && document.myForm.student_ID.value.length > 0)
		{
		  alert("學號的資料錯誤");
		  return false;
		}
		if (document.myForm.comment.value.length > 30)
		{
		  alert("「個人簡介」不可以超過30個字元哦...");
		  return false;
		}	
        myForm.submit();					
      }
	  
	  function reset(){
	  	document.myForm.name.value = ""
	  	document.myForm.password.value = ""
		document.myForm.re_password.value = ""
		document.myForm.name.value = ""
	  }
    </script>
<?php
    //釋放資源及關閉資料連接
    mysqli_free_result($result);
    mysqli_close($link);
  }
?>