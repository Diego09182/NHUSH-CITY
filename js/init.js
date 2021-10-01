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
	
			<div id="modal1" class="modal">
				<div class="modal-content">
					<form action="checkpwd.php" method="post" name="Form">
						<h4 class="center-align">系統登入</h4>
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input name="account" id="icon_prefix" type="text" class="validate" size="15">
							<label for="icon_prefix">帳號</label>
						</div>
						<div class="input-field col s12">
							<i class="material-icons prefix">https</i>
							<input name="password" id="password" type="password" class="validate" size="15">
							<label for="icon_telephone">密碼</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a class=" modal-action modal-close waves-effect waves-green btn-flat">關閉</a>
					<a class="waves-effect waves-light btn" onClick="check_login()">登入</a>
				</div>
			</div>
				
		  <div class="row">	

			
			<div id="modal2" class="modal">
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
					<a class="waves-effect waves-light btn" onClick="check_data()">註冊</a>
				</div>
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
							<p class="left">讚:</p>
							<a class="btn-floating halfway-fab waves-effect waves-light brown right"><i class="tooltipped" data-delay="50" data-tooltip="只能點讚ww"><i class="material-icons">thumb_up</i></i></a>
						</div>
						<br>
						<br>
					  </div>
					</div>
				</div>
		</div>
		
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
							<p>無。</p>
						</div>
						  <ul class="collapsible" data-collapsible="accordion">
						    <li>
						      <div class="collapsible-header">球隊</div>
						      <div class="collapsible-body"><p>大家都很棒歐。(官腔)</p></div>
						    </li>
						    <li>
						      <div class="collapsible-header">社團</div>
						      <div class="collapsible-body"><p>大家都很棒歐。(官腔)</p></div>
						    </li>
							<li>
							  <div class="collapsible-header">學生自治</div>
							  <div class="collapsible-body">
							  <p>協助試辦及草擬高級中等學校學生自治組織補助社團經費辦法，提供北市各校參考，但成效不彰，僅小田園服務隊申請補助</p>
							  <p>於106、107、108學年度，南湖班聯會成員皆有因酒後行為，導致校內外觀感不佳之事件。</p>
							  <p>在108年度，選舉下一屆班聯會主席時，校方擅自更改為電子投票，且該系統遭到惡意攻擊，後經修正有效投票率僅有22.03%，三次選舉後確立下年度之新任班聯會正副主席</p>
							  </div>
							</li>
						  </ul>
					</div>
				</div>
		</div>
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
						            <td>校本必修超無聊</td>
						          </tr>
						          <tr>
						            <td>秋/冬天的地板，下雨時超濕，比你阿公還持久的那種</td>
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
						<p>不知道</p>
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
		  
			<div id="modal1" class="modal">
				<div class="modal-content">
					<form action="checkpwd.php" method="post" name="Form">
					  <h4 class="center-align">系統登入</h4>
						<div class="input-field col s6">
							<i class="material-icons prefix">account_circle</i>
							<input name="account" id="icon_prefix" type="text" class="validate" size="15">
							<label for="icon_prefix">帳號</label>
						</div>
						<div class="input-field col s6">
							<i class="material-icons prefix">https</i>
							<input name="password" id="password" type="password" class="validate" size="15">
							<label for="icon_telephone">密碼</label>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<a class=" modal-action modal-close waves-effect waves-green btn-flat">關閉</a>
					<a class="waves-effect waves-light btn" onClick="check_login()">登入</a>
				</div>
			</div>
			
			<div id="modal2" class="modal">
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
					<a class="waves-effect waves-light btn" onClick="check_data()">註冊</a>
				</div>
			</div>
		
		<br>
				<div class="container">
					<section id="plan" class="tm-section-pad-top">
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
					</section>
				</div>
				
				<div class="container">
					<section id="plan" class="tm-section-pad-top">
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
												開發者及運營者不為使用本站的用戶，負起其任何行為的法律責任
											</blockquote>
											<blockquote>
												對使用或連結本網頁而引致任何損害或其他無形損失，本網站不承擔任何直接、間接、附帶、特別、衍生性或懲罰性賠償。
											</blockquote>
										</h4>
									</div>
								  </div>
								</div>
							  </div>
					</section>
				</div>
		
			
	</div>` 
}

const Home = {
	template:` 
	<div class="container">
		<div class="section" id="features">
			
		  <!--   Icon Section   -->
		  <div class="row">	
				<div id="modal1" class="modal">
					<div class="modal-content">
						<form action="checkpwd.php" method="post" name="Form">
						  <h4 class="center-align">系統登入</h4>
							<div class="input-field col s6">
								<i class="material-icons prefix">account_circle</i>
								<input name="account" id="icon_prefix" type="text" class="validate" size="15">
								<label for="icon_prefix">帳號</label>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">https</i>
								<input name="password" id="password" type="password" class="validate" size="15">
								<label for="icon_telephone">密碼</label>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<a class=" modal-action modal-close waves-effect waves-green btn-flat">關閉</a>
						<a class="waves-effect waves-light btn" onClick="check_login()">登入</a>
					</div>
				</div>
			
			<div id="modal2" class="modal">
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
					<a class="waves-effect waves-light btn" onClick="check_data()">註冊</a>
				</div>
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
		
			<h3 class="center-align">主要服務</h3>
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
		</div>
		</div>
		
		<section id="facility" class="tm-section-pad-top">
			<div class="row">
			  <div class="center-align col-12">
				<br>
				<h2 class="tm-text-primary tm-section-title mb-4">NHUSH CITY</h2>
				<p class="mx-auto tm-work-description">
					你能想像一個專屬於我們的社區嗎? 你可以在這裡分享對於學校與學習相關的任何問題。
				<br>
				<br>
					我們會不斷精進此系統，請提供任何意見給開發團隊。
				</p>
				<br>			
				<br>
			  </div>            	
		</section>
		</div>
		
		<div class="row">
		<div class="center-align">
			<h3 class="tm-text-primary tm-section-title mb-4">系統更新</h3>
		</div>
		<div class="carousel">
		    <a class="carousel-item" href="#one!">	          
				<div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">頁面更新</span>
						<p>關於網站與網站聲明</p>
					</div>
					<br>
					<br>
				</div>
			</a>
		    <a class="carousel-item" href="#one!">
				<div class="">
				  <div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">系統更新</span>
						<p>登入系統部分完成</p>
					</div>
					<br>
					<br>
				</div>
		    </a>
		    <a class="carousel-item" href="#one!">
				<div class="">
				  <div class="card blue-grey darken-1">
					<div class="card-content white-text">
						<span class="card-title">系統更新</span>
						<p>投票系統部分完成</p>
					</div>
					<br>
					<br>
				  </div>
				</div>
		    </a>
		  </div>
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
	
	new Vue({
			el: '#app',
			router,
			data: {
                Home: '首頁',
                About: '關於網站',
				Disclaimer:'免責聲明',
            },
			methods:{
				checkdata(){
					myForm.submit();
				},
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
				},
				increasefontsize() {
				    this.fontStyle['font-size'] = `${this.fontsizesetting++}px`
				},
				decreasefontsize() {
				    this.fontStyle['font-size'] = `${this.fontsizesetting--}px`
				}
			}
        })


new Vue({
		    el: '#app',
		    data: {
				about:'We are students of Nanhu High School and we love Computer Science and Information Engineering.',
				copyright:'This website is completed by our students and teachers.',
		    },
		    methods: {
		    }
		})