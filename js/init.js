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

	const About = {
	template:`
	<div class="row">
		
		<div class="row">
			<login></login>
		</div>
		<div class="row">
			<register></register>
		</div>
	
		<div class="container">
			<div class="container">
				<h3 class="center-align">系統開發起始</h3>
				<div class="row">
					<div class="col s12 m12">
					  <div class="card brown">
						<div class="card-content white-text">
							<span class="card-title"><I>"要做出適合學生交流、發表學習成果的平台"</I>
							</span>
							<br>
							<span class="card-content">
							<I class="right"></I>
							</span>
						</div>
						<div class="card-action">
							<a class="btn-floating halfway-fab waves-effect waves-light brown right"><i class="tooltipped" data-delay="50" data-tooltip="只能點讚ww"><i class="material-icons">thumb_up</i></i></a>
						</div>
						<br>
						<br>
					  </div>
					</div>
				</div>
			</div>
		</div>	
		
		<div class="container">
			<div class="container">
				<h3 class="center-align">校園相關</h3>
				<div class="row">
					<div class="card col s12 m6">
						<div class="card-image">
							 <h4 class="center-align">重要活動</h4>
						</div>
							<div class="card-tabs">
								<ul class="tabs tabs-fixed-width">
									<li class="tab"><a href="#test1">校慶</a></li>				
									<li class="tab"><a href="#test2">聖誕活動</a></li>
								</ul>
							</div>
						<div class="card-content grey lighten-4">
							<div id="test1">
							<h5>要抽成QQ</h5>
							<img class="materialboxed responsive-img" src="images/nhush1.png">
							</div>
							<div id="test2">
							<h5>好......</h5>
							<img class="materialboxed responsive-img" src="images/merrynhush.png">
							</div>
						</div> 
					</div>
					<div class="card col s12 m6">
						<div class="card-content black-text">
							<span class="card-title">校園特色</span>
							<p>可以展開</p>
						</div>
						  <ul class="collapsible" data-collapsible="accordion">
							<li>
								<div class="collapsible-header">球隊</div>
								<div class="collapsible-body">
									<p>表現優異。</p>
								</div>
							</li>
							<li>
								<div class="collapsible-header">社團</div>
								<div class="collapsible-body">
									<p>多元且有趣。</p>
								</div>
							</li>
							<li>
								<div class="collapsible-header">學生自治</div>
								<div class="collapsible-body">
									<p>可以選擇班聯會代表，每個代表都很認真爭取學生權益。</p>
								</div>
							</li>
						  </ul>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="container">
				<h3 class="center-align">校園資訊</h3>
				<br>
				<div class="row">
					<div class="col s12 m7">
					  <div class="card brown">
						<div class="card-content white-text center-align">
							<span class="card-title center-align">缺點</span>	
								  <table class="bordered">
									<thead>
									  <tr>
										  <th data-field="id">問題</th>					              
									  </tr>
									</thead>
									<tbody>
									  <tr>
										<td>社團經費缺少</td>
									  </tr>
									  <tr>
										<td>校本必修內容較無趣</td>
									  </tr>
									  <tr>
										<td>秋/冬天的地板，會比較濕</td>
									  </tr>
									</tbody>
								  </table>
						</div>
					  </div>
					</div>
					<div class="col s12 m5">
					  <div class="card brown">
						<div class="card-content white-text center-align">
							<span class="card-title">優點</span>	
							<p>社團選擇多元</p>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>` 
}

	const Disclaimer = {
	template:`
	<div class="row">
				
		  <div class="row">	
		  
			<div class="row">
				<login></login>
			</div>
			<div class="row">
				<register></register>
			</div>
			
			<br>
			
			<div class="container">
				<div class="container">
					<div class="center-align">
						<h3 class="tm-text-primary tm-section-title mb-4">社群規則</h3>
					</div>
					<div class="col s12 m12">
						<div class="card horizontal">
							<div class="card-stacked">
								<div class="card-content">
									<h5>
									  <blockquote>
												<table>
												  <thead>
													<tr>
													  <th data-field="id">規則</th>
													  <th data-field="name">處罰內容</th>
													</tr>
												  </thead>
												  <tbody>
													<tr>
													  <td>禁止侵犯他人著作權</td>
													  <td>封鎖帳號</td>
													</tr>
													<tr>
													  <td>禁止任何犯罪行為</td>
													  <td>封鎖帳號</td>
													</tr>
													<tr>
													  <td>禁止發送垃圾訊息</td>
													  <td>封鎖帳號</td>
													</tr>
													<tr>
													  <td>禁止宣傳未授權的任何產品及服務</td>
													  <td>封鎖帳號</td>
													</tr>
												  </tbody>
												</table>
									  </blockquote>
									</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<br>
			
			<div class="container">
				<div class="container">
					<div class="center-align">
						<h3 class="tm-text-primary tm-section-title mb-4">免責聲明</h3>
					</div>
					<div class="col s12 m12">
						<div class="card horizontal">
						  <div class="card-stacked">
							<div class="card-content">
								<h4>
									<blockquote>
										開發者及運營者不為使用本站的用戶，負起其任何行為的法律責任。
									<br>
										對使用或連結本網頁而引致任何損害或其他無形損失，本網站不承擔任何賠償。
									</blockquote>
								</h4>
							</div>
						  </div>
						</div>
					</div>
				</div>
			</div>
			
	</div>` 
}

	const Home = {
	template:` 
	<div class="container">
		
		<div class="row"> 
			<login></login>
		</div>	
		
		<div class="row"> 
			<register></register>
		</div>	
			
	<div class="container">
			
		<h3 class="center-align">主要功能</h3>
		<br>
		<div  class='row'>
			<div class="col s12 m4">
				<div class="card animate__animated animate__fadeIn">
					<div class="card-image waves-effect waves-block waves-light">
					  <img class="activator" src="images/NanhuSchool.png">
					</div>
					<div class="card-content">
					  <span class="card-title activator grey-text text-darken-4">南湖校務<i class="material-icons right">more_vert</i></span>
					  <br>
					  <a class="waves-effect waves-light btn right brown">進入</a>
					  <br>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">南湖校務<i class="material-icons right">close</i></span>
					  <p>關於南湖高中的學生自治與校務投票。</p>
					</div>
				</div>
			</div>  
			  
			<div class="col s12 m4">
				<div class="card animate__animated animate__fadeIn">
					<div class="card-image waves-effect waves-block waves-light">
					  <img class="activator" src="images/NanhuSchool.png">
					</div>
					<div class="card-content">
					  <span class="card-title activator grey-text text-darken-4">綜合討論區<i class="material-icons right">more_vert</i></span>
					  <br>
					  <a class="waves-effect waves-light btn right brown">進入</a>
					  <br>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">綜合討論區<i class="material-icons right">close</i></span>
					  <p>討論關於校園的任何事項。</p>
					</div>
				</div>
			</div>
			
			<div class="col s12 m4">
				<div class="card animate__animated animate__fadeIn">
					<div class="card-image waves-effect waves-block waves-light">
					  <img class="activator" src="images/NanhuSchool.png">
					</div>
					<div class="card-content">
					  <span class="card-title activator grey-text text-darken-4">學習歷程<i class="material-icons right">more_vert</i></span>
					  <br>
					  <a class="waves-effect waves-light btn right brown">進入</a>
					  <br>
					</div>
					<div class="card-reveal">
					  <span class="card-title grey-text text-darken-4">學習歷程<i class="material-icons right">close</i></span>
					  <p>學生的學習歷程展示與討論區。</p>
					</div>
				</div>
			</div>
		</div>
		
		<div  class='row'>
			<div class="col s12 m4">
				<div class="card animate__animated animate__fadeIn">
					<div class="card-image waves-effect waves-block waves-light">
						<img class="activator" src="images/NanhuSchool.png">
					</div>
					<div class="card-content">
						<span class="card-title activator grey-text text-darken-4">文章區<i class="material-icons right">more_vert</i></span>
						<br>
						<a href="#!" class="waves-effect waves-light btn right brown">進入</a>
						<br>
					</div>
					<div class="card-reveal">
						<span class="card-title grey-text text-darken-4">文章區<i class="material-icons right">close</i></span>
						<p>學習資訊分享。</p>
					</div>
				</div>
			</div>
		</div>
		
		<serve></serve>
		
	</div>
		
		<slogan></slogan>
		
		</div>
		
		  </div>	
	</div>`
}
	
	function check_login()
    {
        if (document.Form.account.value.length == 0)
          alert("帳號欄位不可以空白哦！");
        else if (document.Form.password.value.length == 0)
          alert("密碼欄位不可以空白哦！");
        else 
		Form.submit();
	}
	
	function check_data()
	{	
		if (document.myForm.account.value.length == 0)
		{
		  alert("「使用者帳號」一定要填寫");
		  return false;
		}
		if (document.myForm.account.value.length > 10)
		{
		  alert("「使用者帳號」不可以超過10個字元");
		  return false;
		}
		if (document.myForm.account.value.length < 5)
		{
		  alert("「使用者帳號」要超過5個字元");
		  return false;
		}
		if (document.myForm.password.value.length == 0)
        {
          alert("「使用者密碼」一定要填寫");
          return false;
        }
		if (document.myForm.password.value.length > 10)
		{
		  alert("「使用者密碼」不可以超過10個字元");
		  return false;
		}
		if (document.myForm.name.value.length == 0)
		{
		  alert("您一定要留下真實姓名");
		  return false;
		}
		if (document.myForm.student_ID.value.length != 8 && document.myForm.student_ID.value.length > 0)
		{
		  alert("學號的資料錯誤");
		  return false;
		}
		if (document.myForm.comment.value.length > 30)
		{
		  alert("「個人簡介」不可以超過30個字元");
		  return false;
		}
		if (document.myForm.year.value.length == 0)
		{
		  alert("您忘了填「出生年」欄位了");
		  return false;
		}
		if (document.myForm.month.value.length == 0)
		{
		  alert("您忘了填「出生月」欄位了");
		  return false;
		}	
		if (document.myForm.month.value > 12 | document.myForm.month.value < 1)
		{
		  alert("「出生月」應該介於1-12之間");
		  return false;
		}
		if (document.myForm.day.value.length == 0)
		{
		  alert("您忘了填「出生日」欄位了");
		  return false;
		}
		if (document.myForm.month.value == 2 & document.myForm.day.value > 29)
		{
		  alert("二月只有28天，最多29天");
		  return false;
		}	
		if (document.myForm.month.value == 4 | document.myForm.month.value == 6
		  | document.myForm.month.value == 9 | document.myForm.month.value == 11)
		{
		  if (document.myForm.day.value > 30)
		  {
		    alert("4 月、6 月、9 月、11 月只有30天");
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
		myForm.submit();
	}
	
	const routes = [
	{
		path:'/',component:Home
	},
	{
		path:'/home',component:Home
	},
	{
		path:'/about',component:About
	},
	{
		path:'/disclaimer',component:Disclaimer
	}
]

	const router = new VueRouter({
		routes
	})
	
	Vue.component('banner', {
	  template:  
		`<div class="section no-pad-bot" id="index-banner">
			<div class="container">
				<br><br>
					<h1 class="center header-text animate__animated animate__fadeIn" id="index-title1" >南湖高中</h1>
				<div class="row center">
					<h5 class="header col s12 light" id="index-title2">An exclusive community for Nanhu High School</h5>
				</div>
				<br><br>
			</div>
		</div>`
	})
	
	Vue.component('features', {
	  template:  
		`<div class="row">		
			<div class="container">	
				<h3 class="center-align">主要功能</h3>
				<br>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">南湖校務<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="school.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">南湖校園<i class="material-icons right">close</i></span>
						  <p>關於南湖高中的學生自治與校務投票。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">綜合討論區<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="forum.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">綜合討論區<i class="material-icons right">close</i></span>
						  <p>討論關於校園的任何事項。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
						  <img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
						  <span class="card-title activator grey-text text-darken-4">學習歷程<i class="material-icons right">more_vert</i></span>
						  <br>
						  <a class="waves-effect waves-light btn right brown" href="works.php">進入</a>
						  <br>
						</div>
						<div class="card-reveal">
						  <span class="card-title grey-text text-darken-4">學習歷程<i class="material-icons right">close</i></span>
						  <p>學生的學習歷程展示與討論區。</p>
						</div>
					</div>
				</div>
				<div class="col s12 m4">
					<div class="card animate__animated animate__fadeIn">
						<div class="card-image waves-effect waves-block waves-light">
							<img class="activator" src="images/NanhuSchool.png">
						</div>
						<div class="card-content">
							<span class="card-title activator grey-text text-darken-4">文章區<i class="material-icons right">more_vert</i></span>
							<br>
							<a href="home_article.php" class="waves-effect waves-light btn right brown">進入</a>
							<br>
						</div>
						<div class="card-reveal">
							<span class="card-title grey-text text-darken-4">文章區<i class="material-icons right">close</i></span>
							<p>學習資訊分享。</p>
						</div>
					</div>
				</div>
			</div>
		</div>`
	})
	
	Vue.component('login', {
	  template:  
		`<div id="modal1" class="modal">
		  	<div class="modal-content">
		  		<form action="checkpwd.php" method="post" name="Form">
		  			<h4 class="center-align">系統登入</h4>
		  			<div class="input-field col s12 m6">
		  				<i class="material-icons prefix">account_circle</i>
		  				<input name="account" id="icon_prefix" type="text" class="validate" size="15">
		  				<label for="icon_prefix">帳號</label>
		  			</div>
		  			<div class="input-field col s12 m6">
		  				<i class="material-icons prefix">https</i>
		  				<input name="password" id="password" type="password" class="validate" size="15">
		  				<label for="icon_telephone">密碼</label>
		  			</div>
		  		</form>
		  	</div>
		  	<div class="modal-footer">
		  		<a class=" modal-action modal-close waves-effect waves-green btn-flat">關閉</a>
		  		<a class="waves-effect waves-light btn brown" onClick="check_login()">登入</a>
		  	</div>
		</div>`
	})
	
	Vue.component('register', {
	  template:  
		`<div id="modal2" class="modal">
			<div class="modal-content">
				<form action="addmember.php" method="post" name="myForm">
					<h4 class="center-align">註冊帳號</h4>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">account_circle</i>
						<input name="name" id="icon_prefix" type="text" class="validate">
						<label for="icon_prefix">學生姓名</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">https</i>
						<input name="student_ID" id="icon_telephone" type="text" class="validate" size="15">
						<label for="icon_telephone">學號</label>
					</div>
					<div class="input-field col s4">
						<input name="year" id="icon_prefix" type="text" class="validate" size="2">
						<label for="icon_prefix">年(民國)</label>
					</div>
					<div class="input-field col s4">
						<input name="month" id="icon_prefix" type="text" class="validate" size="2">
						<label for="icon_prefix">月</label>
					</div>
					<div class="input-field col s4">
						<input name="day" id="icon_prefix" type="text" class="validate" size="2">
						<label for="icon_prefix">日</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">account_circle</i>
						<input name="account" id="icon_prefix" type="text" class="validate" size="15">
						<label for="icon_prefix">註冊帳號</label>
					</div>
					<br> 
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">https</i>
						<input name="password" id="password" type="password" class="validate" size="15">
						<label for="password">註冊密碼</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">account_circle</i>
						<input name="email" id="email" type="email" class="validate">
						<label for="email" data-error="wrong" data-success="right">電子信箱</label>
					</div>
					<div class="input-field col s12 m6">
						<i class="material-icons prefix">account_circle</i>
						<input name="cellphone" id="cellphone" type="tel" class="validate">
						<label for="telephone" data-error="wrong" data-success="right">行動電話</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input name="interest" id="cellphone" type="text" size="50" class="validate">
						<label for="telephone" data-error="wrong" data-success="right">個人興趣</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input name="url" id="cellphone" type="text" size="50" class="validate">
						<label for="telephone" data-error="wrong" data-success="right">個人網站</label>
					</div>
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
						<input name="comment" id="introduction" type="text" class="validate">
						<label for="comment" data-error="wrong" data-success="right">個人簡介</label>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">關閉</a>
				<a class="waves-effect waves-light btn brown" onClick="check_data()">註冊</a>
			</div>
		</div>`
	})
	
	Vue.component('slogan', {
	  template:  
		`<div id="slogan">
			<div class="row">
				<div class="center-align col m12">
					<br>
					<h2 class="center-align">NHUSH CITY</h2>
					<h5 class="center-align">
					你能想像一個專屬於我們的社區嗎? 你可以在這裡分享對於學校與學習相關的任何問題。
					<br>
					<br>
					我們會不斷精進此系統，請提供任何意見給開發團隊。
					</h5>
					<br>			
					<br>
				</div>
			</div>		  
		</div>`
	})
	
	Vue.component('serve', {
	  template:  
		`<div class="row">	
			<h3 class="center-align">主要服務</h3>
			<br>
			<div class="col s12 m4">
			  <div class="icon-block">
				<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat hvr-grow-rotate material-icons">perm_media</i></h2>
				<h5 class="center">提供學習資料</h5>
				<p class="light center">提供優良的學習歷程檔案範例</p>
			  </div>
			</div>		
			<div class="col s12 m4">
			  <div class="icon-block">
				<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat material-icons">comment</i></h2>
				<h5 class="center">用戶經驗分享</h5>
				<p class="light center">可以進行成果發表與討論分享</p>
			  </div>
			</div>	
			<div class="col s12 m4">
			  <div class="icon-block">
				<h2 class="center light-brown-text"><i class="animate__animated animate__heartBeat material-icons">assessment</i></h2>
				<h5 class="center">相關統計資料</h5>
				<p class="light center">秉持透明、開放的態度，公開部分統計資料</p>
			  </div>
			</div>
		</div>`
	})
	
	Vue.component('billboard', {
	  template:  
		`<div class="container">
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
			</div>
		</div>`
	})
	
	Vue.component('contact', {
	  template:  
		`<div class="container">
			<div class="container">
				<div class="center-align">
					<h3 class="tm-text-primary tm-section-title mb-4">CONTACT</h3>
				</div>		
				<div class="col s6 m6">
					<div class="card horizontal small">
						<div class="card-stacked">
							<div class="card-content">
								<h4>
								<blockquote>
								<i class="material-icons medium">perm_phone_msg</i>02-26308889</p>
								<i class="material-icons medium">contacts</i>臺北市內湖區康寧路3段220號</p>
								</blockquote>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>`
	})
	
	Vue.component('tool', {
	  template:  
		`<div class="fixed-action-btn horizontal click-to-toggle">
		<a class="btn-floating btn-large brown">
			<i class="material-icons">menu</i>
		</a>
		<ul>
			<li><a @click="reset()" href="#modal2" class="btn-floating btn waves-effect waves-light blue"><i class="tooltipped" data-position="top" data-tooltip="註冊"><i class="material-icons">assignment</i></i></a></li>
		</ul>
	</div>`
	})
	
	Vue.component('footers', {
	  template:  
		`<footer class="page-footer brown">
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
		</footer>`
	})
	
	new Vue({
			el: '#app',
			router,
			data: {
                Home: '首頁',
                About: '關於網站',
				Disclaimer:'免責聲明',
            },
			methods:{
				reset(){
					$('ul.tabs').tabs();
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
				},	
				mounted(){
					$('ul.tabs').tabs();
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
				}
			}
        })