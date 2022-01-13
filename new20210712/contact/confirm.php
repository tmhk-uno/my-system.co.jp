<?php
include dirname(__FILE__)."/config.php";

$go_back_url = "./";

$token = isset($_POST['csrf_token_inquiry']) ? $_POST['csrf_token_inquiry'] : '';
$valid = !empty($token) && validateCSRFToken($token);
if (!$valid) {
    $_SESSION["third_inquiry"] = "";
    $_SESSION['af'] = array();
    $_SESSION['errMsg'] = array();

    F_script("このページはアクセスできません。","window.location = '".$go_back_url."'");
    exit();
}
if (isset($_SESSION['third_inquiry']) && $_SESSION['third_inquiry'] == 'third_inquiry') {
    $_SESSION["third_inquiry"] = "";
    $_SESSION['af'] = array();
    $_SESSION['errMsg'] = array();

    header('Location:' . $go_back_url);
    exit();
}
$_SESSION["first_inquiry"] = "";
$_SESSION["second_inquiry"] = "second_inquiry";

$outputData = $_POST;

//全角半角変換
$outputData['tel'] = mb_convert_kana($outputData['tel'], "a", 'utf-8');
$outputData['email'] = mb_convert_kana($outputData['email'], "a", 'utf-8');
$outputData['email_repeat'] = mb_convert_kana($outputData['email_repeat'], "a", 'utf-8');

//エラーチェック
$errMsg = array();
if ($outputData['name'] != 'あいうえお') {
    array_push($errMsg, 'name');
}

if ($outputData['user_name'] == NULL) {
    array_push($errMsg, 'user_name');
}

if ($outputData['user_name_read'] == NULL) {
    array_push($errMsg, 'user_name_read');
}

if ($outputData['email'] == NULL) {
    array_push($errMsg, 'email');
} else if (!check_email_address($outputData['email'])) {
    array_push($errMsg, 'email2');
} else if ($outputData['email'] != $outputData['email_repeat']) {
    array_push($errMsg, 'email3');
}

if ($outputData['comment'] == NULL) {
    array_push($errMsg, 'comment');
}

$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$recaptcha_server.'&response='.$outputData['g-recaptcha-response'];
$flag = json_decode(getSslPage($url));

if(!$flag->success) {
    array_push($errMsg, 're');
}

if (count($errMsg) > 0) {
    $_SESSION['errMsg'] = $errMsg;
    $_SESSION['af'] = $outputData;
        
    header('Location:' . $go_back_url);
    exit();
}
else {
    unset($_SESSION['af']);
    unset($_SESSION['errMsg']);
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
	<title>確認ページ | 株式会社マイ・システム</title>
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
					<a href="../">HOME</a><span class="gt">/</span><a href="../contact/">CONTACT</a><span class="gt">/</span><strong class="current">確認ページ</strong>
				</div>
				<h3 id="pagetit">
					<strong class="en">CONTACT</strong>
					<span class="jp">確認ページ</span>
				</h3>
			</div>
		</div>
		<div id="content">
			<div class="inner_static">
				<section class="sec_confirm">
					<h4 class="tit1">
						<strong>CONFIRM</strong>
					</h4>
					<form id="edit_form" name="edit_form" method="post" action="input" onsubmit="return true;">
						<input type="hidden" id="refresh" value="no"/>
						<input type="hidden" name="name" value="あいうえお"/>
						<input type="hidden" name="user_name" value="<?php echo $outputData['user_name'];?>"/>
						<input type="hidden" name="user_name_read" value="<?php echo $outputData['user_name_read'];?>"/>
						<input type="hidden" name="email" value="<?php echo $outputData['email'];?>"/>
						<input type="hidden" name="email_repeat" value="<?php echo $outputData['email_repeat'];?>"/>
						<input type="hidden" name="tel" value="<?php echo $outputData['tel'];?>"/>
						<input type="hidden" name="gender" value="<?php echo $outputData['gender'];?>"/>
						<input type="hidden" name="question1" value="<?php echo $outputData['question1'];?>"/>
						<input type="hidden" name="question2" value="<?php echo $outputData['question2'];?>"/>
						<input type="hidden" name="comment" value="<?php echo $outputData['comment'];?>"/>
						<?php
							$token = getCSRFToken();
							echo '<input type="hidden" name="csrf_token_inquiry" value="' . $token . '"/>'
						?>
						<ul class="lst_contact s2">
							<li>
								<div class="item">
									<h6 class="tit">お名前</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['user_name']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">お名前(フリガナ)</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['user_name_read']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">電話番号(ハイフンなし)</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['tel']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">メールアドレス</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['email']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">性別</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['gender']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">職種</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['question1']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">お問い合わせ商材</h6>
								</div>
								<div class="cnt">
									<?php echo($outputData['question2']); ?>
								</div>
							</li>
							<li>
								<div class="item">
									<h6 class="tit">お問い合わせ</h6>
								</div>
								<div class="cnt" style="word-break:break-all">
									<?php echo(nl2br(stripcslashes($outputData['comment']))); ?>
								</div>
							</li>
						</ul>
						<div class="btn_area">
							<a href="javascript:void(0);" onclick="go_next(1);" class="btn_cancel">
								<span class="tx">戻る</span>
							</a>
							<a href="javascript:void(0);" onclick="go_next(2);" class="btn_confirm">
								<span class="tx">送信ページへ</span>
								<span class="arr"></span>
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
<script src="./script.js"></script>
<script>
window.onbeforeunload = function() {
  return true;
};
</script>
</body>
</html>