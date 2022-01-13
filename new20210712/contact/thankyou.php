<?php
include dirname(__FILE__)."/config.php";

if (isset($_SESSION['second_inquiry']) && $_SESSION['second_inquiry'] != 'second_inquiry') {
	F_script("このページはアクセスできません。","window.location = '../'");
    exit();
}
unset($_SESSION['af']);
unset($_SESSION['errMsg']);
$_SESSION["first_inquiry"] = "";
$_SESSION["second_inquiry"] = "";
$_SESSION["third_inquiry"] = "";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>完了ページ | 株式会社マイ・システム</title>
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
					<a href="../">HOME</a><span class="gt">/</span><a href="../contact/">CONTACT</a><span class="gt">/</span><strong class="current">完了ページ</strong>
				</div>
				<h3 id="pagetit">
					<strong class="en">CONTACT</strong>
					<span class="jp">完了ページ</span>
				</h3>
			</div>
		</div>
		<div id="content">
			<div class="inner_static">
				<section class="sec_confirm">
					<h4 class="tit1">
						<strong>THANK YOU</strong>
					</h4>
					<div class="bx_thankyou">
						<p>
							お問い合わせの内容を送信いたしました。<br>
							ありがとうございます。
						</p>
					</div>
					<div class="btn_area">
						<a href="../" class="btn_home">
							<span class="tx">HOME</span>
						</a>
					</div>
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
</body>
</html>