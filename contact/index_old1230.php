<?php
include dirname(__FILE__)."/config.php";

if (isset($_SESSION['third_inquiry']) && $_SESSION['third_inquiry'] == 'third_inquiry') {
    $_SESSION["third_inquiry"] = "";
    unset($_SESSION['af']);
    unset($_SESSION['errMsg']);
}
$_SESSION["first_inquiry"] = "first_inquiry";
$_SESSION["second_inquiry"] = "";

if (isset($_SESSION['af']) && $_SESSION['af'] != NULL) {
    $outputData = $_SESSION['af'];
    $_SESSION['af'] = array();
}
else if (isset($_POST) && $_POST != NULL) {
    $outputData = $_POST;
}

if (isset($_SESSION['errMsg']) && count($_SESSION['errMsg']) > 0) {
    $outputData['errMsg'] = $_SESSION['errMsg'];
    $_SESSION['errMsg'] = array();
} else {
    $outputData['errMsg'] = array();
}

if(!isset($outputData['user_name'])) { $outputData['user_name'] = ""; }
else { $outputData['user_name'] = check_input_data($outputData['user_name']); }

if(!isset($outputData['user_name_read'])) { $outputData['user_name_read'] = ""; }
else { $outputData['user_name_read'] = check_input_data($outputData['user_name_read']); }

if(!isset($outputData['email'])) { $outputData['email'] = ""; }
else { $outputData['email'] = check_input_data($outputData['email']); }

if(!isset($outputData['email_repeat'])) { $outputData['email_repeat'] = ""; }
else { $outputData['email_repeat'] = check_input_data($outputData['email_repeat']); }

if(!isset($outputData['tel'])) { $outputData['tel'] = ""; }
else { $outputData['tel'] = check_input_data($outputData['tel']); }

if(!isset($outputData['gender'])) { $outputData['gender'] = ""; }
else { $outputData['gender'] = check_input_data($outputData['gender']); }

if(!isset($outputData['question1'])) { $outputData['question1'] = ""; }
else { $outputData['question1'] = check_input_data($outputData['question1']); }

if(!isset($outputData['question2'])) { $outputData['question2'] = ""; }
else { $outputData['question2'] = check_input_data($outputData['question2']); }

if(!isset($outputData['comment'])) { $outputData['comment'] = ""; }
else { $outputData['comment'] = check_input_data($outputData['comment']); }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>お問い合わせ | 株式会社マイ・システム</title>
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="../css/style.css">
	<script src="../js/jquery-2.2.4.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/main.js"></script>
</head>
<body id="contact" class="sub">
	<div class="wrapper">
		<div id="pmenu">
			<div class="inner_static">
				<div class="btn_area">
					<a href="#" class="btn_close">
						<span></span>
						<span></span>
					</a>
				</div>
				<nav id="pmenu_mnb">
					<ul>
						<li>
							<a href="../">
								<span>HOME</span>
							</a>
						</li>
						<li>
							<a href="../campaign/signage.html">
								<span>CAMPAIGN</span>
							</a>
						</li>
						<li>
							<a href="../service/copy.html">
								<span>SERVICE</span>
							</a>
							<ul class="d2 cf">
								<li>
									<a href="../service/copy.html">
										<span>複合機</span>
									</a>
								</li>
								<li>
									<a href="../service/web_solution.html">
										<span>WEBソリューション</span>
									</a>
								</li>
								<li>
									<a href="../service/utm.html">
										<span>UTM</span>
									</a>
								</li>
								<li>
									<a href="../service/support.html">
										<span>サポート業務</span>
									</a>
								</li>
								<li>
									<a href="../service/internet.html">
										<span>インターネット回線</span>
									</a>
								</li>
								<li>
									<a href="../service/oa.html">
										<span>OA販売</span>
									</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="../access.html">
								<span>ACCESS</span>
							</a>
						</li>
						<li>
							<a href="../company.html">
								<span>COMPANY</span>
							</a>
						</li>
						<li>
							<a href="../contact/">
								<span>CONTACT</span>
							</a>
						</li>
						<li>
							<a href="../privacy.html">
								<span>PRIVACY POLICY</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<header id="header">
			<div class="inner_static">
				<h1 id="h_logo">
					<a href="../">
						<strong>株式会社マイ・システム</strong>
					</a>
				</h1>
				<a href="#" class="btn_menu sp">
					<span></span>
					<span></span>
					<span></span>
				</a>
				<ul id="mnb">
					<li>
						<a href="../">
							<span>HOME</span>
						</a>
					</li>
					<li class="campaign">
						<a href="../campaign/signage.html">
							<span>CAMPAIGN</span>
						</a>
					</li>
					<li class="service">
						<a href="../service/copy.html">
							<span>SERVICE</span>
						</a>
						<div class="sub-menu">
							<p class="sub_menu_title">SERVICE</p>
							<ul>
								<li>
									<a href="../service/copy.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_1.jpg" width="217" height="120" alt="複合機">
										</div>
										<span>複合機</span>
									</a>
								</li>
								<li>
									<a href="../service/utm.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_2.jpg" width="217" height="120" alt="UTM">
										</div>
										<span>UTM</span>
									</a>
								</li>
								<li>
									<a href="../service/internet.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_3.jpg" width="217" height="120" alt="インターネット回線">
										</div>
										<span>インターネット回線</span>
									</a>
								</li>
								<li>
									<a href="../service/web_solution.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_4.jpg" width="217" height="120" alt="WEBソリューション">
										</div>
										<span>WEBソリューション</span>
									</a>
								</li>								
								<li>
									<a href="../service/support.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_5.jpg" width="217" height="120" alt="サポート業務">
										</div>
										<span>サポート業務</span>
									</a>
								</li>								
								<li>
									<a href="../service/oa.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_6.jpg" width="217" height="120" alt="OA販売">
										</div>
										<span>OA販売</span>
									</a>
								</li>
							</ul>
						</div>
					</li>
					<li>
						<a href="../access.html">
							<span>ACCESS</span>
						</a>
					</li>
					<li>
						<a href="../company.html">
							<span>COMPANY</span>
						</a>
					</li>
					<li>
						<a href="../contact/" class="aon">
							<span>CONTACT</span>
						</a>
					</li>
				</ul>
				<div id="snb_service">
					<h6 class="snb_tit">
						<strong>SERVICE</strong>
					</h6>
					<ul class="lst_d2">
						<li>
							<a href="../service/copy.html">
								<span class="image">
									<img src="../imgs/mnb_img1.jpg" alt="複合機">
								</span>
								<strong class="tit">複合機</strong>
							</a>
						</li>
						<li>
							<a href="../service/utm.html">
								<span class="image">
									<img src="../imgs/mnb_img2.jpg" alt="UTM">
								</span>
								<strong class="tit">UTM</strong>
							</a>
						</li>
						<li>
							<a href="../service/internet.html">
								<span class="image">
									<img src="../imgs/mnb_img3.jpg" alt="インターネット回線">
								</span>
								<strong class="tit">インターネット回線</strong>
							</a>
						</li>
						<li>
							<a href="../service/web_solution.html">
								<span class="image">
									<img src="../imgs/mnb_img4.jpg" alt="WEBソリューション">
								</span>
								<strong class="tit">WEBソリューション</strong>
							</a>
						</li>
						<li>
							<a href="../service/support.html">
								<span class="image">
									<img src="../imgs/mnb_img5.jpg" alt="サポート業務">
								</span>
								<strong class="tit">サポート業務</strong>
							</a>
						</li>
						<li>
							<a href="../service/oa.html">
								<span class="image">
									<img src="../imgs/mnb_img6.jpg" alt="OA販売">
								</span>
								<strong class="tit">OA販売</strong>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</header>
		<div id="spot">
			<div class="inner_static">
				<div id="pp">
					<a href="../">HOME</a><span class="gt">/</span><strong class="current">CONTACT</strong>
				</div>
				<h3 id="pagetit">
					<strong class="en">CONTACT</strong>
					<span class="jp">お問い合わせ</span>
				</h3>
			</div>
		</div>
		<div id="content">
			<div class="inner_static">
				<section class="sec_contact">
					<div class="h_group">
						<h4 class="tit1">
							<strong>TEL・FAX</strong>
						</h4>
						<p class="lead">
							弊社製品についてのお問い合わせは、こちらで受付しております。
						</p>
					</div>
					<ul class="lst_contact s1">
						<li>
							<div class="item">
								<h6 class="tit">TEL</h6>
							</div>
							<div class="cnt">
								<a href="tel:042-519-2224">042-519-2224</a>（平日 9:00～17:30）
							</div>
						</li>
						<li>
							<div class="item">
								<h6 class="tit">FAX</h6>
							</div>
							<div class="cnt">
								042-519-2225
							</div>
						</li>
					</ul>
				</section>
				<section class="sec_contact">
					<div class="h_group">
						<h4 class="tit1">
							<strong>CONTACT</strong>
						</h4>
						<p class="lead">
							弊社製品についてのお問い合わせは、こちらで受付しております。
						</p>
					</div>
					<form id="contact_form" name="contact_form" action="confirm.php" method="post" onsubmit="return false">
						<input type="hidden" id="refresh" value="no"/>
						<input type="hidden" name="name" value="あいうえお"/>
						<input type="hidden" name="re" class="re" value="no"/>
						<?php
							$token = getCSRFToken();
							echo '<input type="hidden" name="csrf_token_inquiry" value="' . $token . '"/>'
						?>
						<ul class="lst_contact s2">
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="user_name">お名前</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<input type="text" id="user_name" class="user_name input_txt type1" name="user_name" maxlength="20" value="<?php echo $outputData['user_name'];?>">
									<span class="alert_msg user_name_alert <?php if(in_array('user_name', $outputData['errMsg'])) { echo("alert_show"); } ?>">お名前を入力してください。</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="user_name_read">お名前(フリガナ)</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<input type="text" id="user_name_read" class="user_name_read input_txt type1" name="user_name_read" maxlength="20" value="<?php echo $outputData['user_name_read'];?>">
									<span class="alert_msg user_name_read_alert <?php if(in_array('user_name_read', $outputData['errMsg'])) { echo("alert_show"); } ?>">お名前(フリガナ)を入力してください。</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="tel">電話番号(ハイフンなし)</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<input type="text" id="tel" class="tel input_txt type1" name="tel" maxlength="20" value="<?php echo $outputData['tel'];?>">
									<span class="alert_msg tel_alert <?php if(in_array('tel', $outputData['errMsg'])) { echo("alert_show"); } ?>">電話番号を入力してください。</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="inp4">メールアドレス</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<input type="email" id="email" class="email input_txt type2" name="email" maxlength="200" value="<?php echo $outputData['email'];?>">
									<span class="alert_msg email_alert <?php if(in_array('email', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスを入力してください。</span>
									<span class="alert_msg email2_alert <?php if(in_array('email2', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスを正しく入力してください。</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="email_repeat">確認用メールアドレス</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<input type="email" id="email_repeat" class="email_repeat input_txt type2" name="email_repeat" maxlength="200" value="<?php echo $outputData['email_repeat'];?>">
									<span class="alert_msg email3_alert <?php if(in_array('email3', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスが一致しません。</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">性別</h6>
								</div>
								<div class="cnt">
									<span class="group_rd1">
										<input type="radio" id="gender1" class="gender input_rd" name="gender" value="男性" <?php if($outputData['gender'] == '男性') { echo( 'checked'); }?>><label for="gender1">男性</label>
									</span>
									<span class="group_rd1">
										<input type="radio" id="gender2" class="gender input_rd" name="gender" value="女性" <?php if($outputData['gender'] == '女性') { echo( 'checked'); }?>><label for="gender2">女性</label>
									</span>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="question1">職種</label>
									</h6>
								</div>
								<div class="cnt">
									<select name="question1" id="question1" title="question1" class="sel_opt1 type1">
										<option value="">選択してください</option>
										<option value="経営者" <?php if($outputData['question1'] == '経営者') { echo('selected="selected"'); }?>>経営者</option>
										<option value="会社員" <?php if($outputData['question1'] == '会社員') { echo('selected="selected"'); }?>>会社員</option>
										<option value="自営業" <?php if($outputData['question1'] == '自営業') { echo('selected="selected"'); }?>>自営業</option>
										<option value="学生" <?php if($outputData['question1'] == '学生') { echo('selected="selected"'); }?>>学生</option>
										<option value="その他" <?php if($outputData['question1'] == 'その他') { echo('selected="selected"'); }?>>その他</option>
									</select>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="question2">お問い合わせ商材</label>
									</h6>
								</div>
								<div class="cnt">
									<select name="question2" id="question2" title="question2" class="sel_opt1 type1">
										<option value="">選択してください</option>
                                                                                <option value="飲食店向け各種オーダーシステム" <?php if($outputData['question2'] == '飲食店向け各種オーダーシステム') { echo('selected="selected"'); }?>>飲食店向け各種オーダーシステム</option>
										<option value="D Sign Clean" <?php if($outputData['question2'] == 'D Sign clean') { echo('selected="selected"'); }?>>D Sign clean（コロナ対策ディスプレイ）</option>
                                        <option value="デジタルサイネージ" <?php if($outputData['question2'] == 'デジタルサイネージ') { echo('selected="selected"'); }?>>デジタルサイネージ</option>
										<option value="複合機" <?php if($outputData['question2'] == '複合機') { echo('selected="selected"'); }?>>複合機</option>
										<option value="UTM" <?php if($outputData['question2'] == 'UTM') { echo('selected="selected"'); }?>>UTM</option>
										<option value="ホームページ作成" <?php if($outputData['question2'] == 'ホームページ作成') { echo('selected="selected"'); }?>>ホームページ作成</option>
										<option value="NURO光" <?php if($outputData['question2'] == 'NURO光') { echo('selected="selected"'); }?>>NURO光</option>
										<option value="モバイル回線" <?php if($outputData['question2'] == 'モバイル回線') { echo('selected="selected"'); }?>>モバイル回線</option>
										<option value="SMSサービス" <?php if($outputData['question2'] == 'SMSサービス') { echo('selected="selected"'); }?>>SMSサービス</option>
										<option value="PCなど" <?php if($outputData['question2'] == 'PCなど') { echo('selected="selected"'); }?>>PCなど</option>
										<option value="その他" <?php if($outputData['question2'] == 'その他') { echo('selected="selected"'); }?>>その他</option>
									</select>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">
										<label for="comment">お問い合わせ</label>
									</h6>
									<span class="ess">必須</span>
								</div>
								<div class="cnt">
									<textarea name="comment" id="comment" class="comment txa1" cols="20" rows="10"><?php echo $outputData['comment'];?></textarea>
									<span class="alert_msg comment_alert <?php if(in_array('comment', $outputData['errMsg'])) { echo("alert_show"); } ?>">お問い合わせ内容を入力してください。</span>
								</div>
							</li>
						</ul>
						<div class="recaptcha_wrap">
							<div id="html_element"></div>
							<span class="alert_msg re_alert <?php if(in_array('re', $outputData['errMsg'])) { echo("alert_show"); } ?>">スパム防止のためのものです。チェックボックスをクリックしてください。</span>
						</div>
						<div class="btn_area">
							<a href="javascript:void(0);" onclick="check_form();" class="btn_confirm">
								<span class="tx">確認ページへ</span>
								<span class="arr"></span>
							</a>
							<a href="javascript:void(0);" onclick="reset_form();" class="btn_cancel">
								<span class="tx">キャンセル</span>
							</a>
						</div>
					</form>
				</section>
			</div>
		</div>
		<footer id="footer">
			<a href="#" class="btn_pagetop">
				<strong class="inner_wrap">
					<span>ページトップへ</span>
				</strong>
			</a>
			<div class="inner_static">
				<section id="f_contact" class="cf">
					<div class="inner_wrap">
						<h4 class="tit">
							<strong>CONTACT</strong>
						</h4>
						<p class="lead">
							弊社製品についてのお問い合わせは、<br>
							こちらで受付しております。
						</p>
					</div>
					<a href="../contact/" class="btn_contact">
						<span class="tx">お問い合わせはこちらへ</span>
						<span class="arr"></span>
					</a>
				</section>
				<nav id="fnb" class="cf">
					<ul>
						<li class="pc_tb">
							<a href="../">
								<span>HOME</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../campaign/signage.html">
								<span>CAMPAIGN</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../service/copy.html">
								<span>SERVICE</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../access.html">
								<span>ACCESS</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../company.html">
								<span>COMPANY</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../contact/" class="aon">
								<span>CONTACT</span>
							</a>
						</li>
						<li class="pc_tb">
							<a href="../privacy.html">
								<span>PRIVACY POLICY</span>
							</a>
						</li>
					</ul>
				</nav>
				<ul class="f_sinfo">
					<li class="address">
						<address>〒196-0015 東京都昭島市昭和町2-7-6-501</address>
					</li>
					<li class="tel">
						<a href="tel:042-519-2224" class="btn_tel"><span>TEL. 042-519-2224</span></a><span class="time">（平日 9:00～17:30）</span>
					</li>
					<li class="fax">
						FAX. 042-519-2225
					</li>
				</ul>
				<div class="copyright">
					<p id="f_cr">
						<strong>Copyright &copy; my-system Co., Ltd. All rights reserved.</strong>
					</p>
				</div>
			</div>
		</footer>
	</div>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script>
var onloadCallback = function() {
  grecaptcha.render('html_element', {
    'sitekey' : '<?php echo $recaptcha_client?>',
    'callback' : correctCaptcha
  });
};
var correctCaptcha = function(response) {
  if(response.length > 0) {
  	$('.re').val('yes');
  }
};
</script>
<script src="./script.js"></script>
</body>
</html>