<?php
include dirname(__FILE__)."/config.php";

if (isset($_SESSION['second_campaign']) && $_SESSION['second_campaign'] != 'second_campaign') {
	F_script("このページはアクセスできません。", "window.location = './campaign.php'");
    exit();
}
unset($_SESSION['af']);
unset($_SESSION['errMsg']);
$_SESSION["first_campaign"] = "";
$_SESSION["second_campaign"] = "";
$_SESSION["third_campaign"] = "third_campaign";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>電帳法改正対応猶予期間がもうすぐ終了！Tsignboxなら安価で手軽に対応できます</title>
	<meta name="description" content="Tsignboxは2022年1月の改正電帳法に対応、電子書類にタイムスタンプを付与し、履歴管理や検索も可能です">
	<meta name="keywords" content="Tsignbox,ティーサインボックス,電子帳簿保存法対応,電子帳簿保存法,電帳法,ペーパーレス,タイムスタンプ,インボイス,領収書,請求書,電子化,東京,武蔵村山,昭島,東大和,瑞穂,青梅,立川,八王子,多摩,北海道,恵庭,えにわ">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/campaign.css">
	<link rel="stylesheet" href="../css/scroll-hint.css">
	<script src="../js/jquery-2.2.4.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/main.js"></script>
	<script src="../js/scroll-hint.js"></script>
	<script>
		(function(d) {
			var config = {
					kitId: 'llm7xua',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement,
				t = setTimeout(function() {
					h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
				}, config.scriptTimeout),
				tk = d.createElement("script"),
				f = false,
				s = d.getElementsByTagName("script")[0],
				a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if (f || a && a != "complete" && a != "loaded") return;
				f = true;
				clearTimeout(t);
				try {
					Typekit.load(config)
				} catch (e) {}
			};
			s.parentNode.insertBefore(tk, s)
		})(document);
	</script>
	<script>
		(function(d) {
			var config = {
					kitId: 'llm7xua',
					scriptTimeout: 3000,
					async: true
				},
				h = d.documentElement,
				t = setTimeout(function() {
					h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
				}, config.scriptTimeout),
				tk = d.createElement("script"),
				f = false,
				s = d.getElementsByTagName("script")[0],
				a;
			h.className += " wf-loading";
			tk.src = 'https://use.typekit.net/' + config.kitId + '.js';
			tk.async = true;
			tk.onload = tk.onreadystatechange = function() {
				a = this.readyState;
				if (f || a && a != "complete" && a != "loaded") return;
				f = true;
				clearTimeout(t);
				try {
					Typekit.load(config)
				} catch (e) {}
			};
			s.parentNode.insertBefore(tk, s)
		})(document);
	</script>
</head>

<body id="campaign" class="sub service">
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
							<a href="../campaign/campaign.html">
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
								<li>
									<a href="../service/signage.html">
										<span>デジタルサイネージ</span>
									</a>
								</li>
								<li>
									<a href="../service/DTP.html">
										<span>DTP・PR動画制作</span>
									</a>
								</li>
								<!-- メニュー項目を揃えるためのダミー要素 -->
								<li></li>

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
						<a href="../campaign/campaign.html" class="aon">
							<span>CAMPAIGN</span>
						</a>
					</li>
					<li class="service">
						<a href="#">
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
								<li>
									<a href="../service/signage.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_7.jpg" width="217" height="120" alt="デジタルサイネージ">
										</div>
										<span>デジタルサイネージ</span>
									</a>
								</li>

								<li>
									<a href="../service/DTP.html" class="wink">
										<div class="img_wrap">
											<img src="../imgs/submenu_img_DTP.jpg" width="217" height="120" alt="DTP・PR動画制作">
										</div>
										<span>DTP・PR動画制作</span>
									</a>
								</li>
								<!-- メニュー項目を揃えるためのダミー要素 -->
								<li></li>
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
						<a href="../contact/">
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
						<li>
							<a href="../service/signage.html">
								<span class="image">
									<img src="../imgs/mnb_img7.jpg" alt="デジタルサイネージ">
								</span>
								<strong class="tit">デジタルサイネージ</strong>
							</a>
						</li>
						<li>
							<a href="../service/DTP.html">
								<span class="image">
									<img src="../imgs/mnb_imgDTP.jpg" alt="DTP・PR動画制作">
								</span>
								<strong class="tit">DTP・PR動画制作</strong>
							</a>
						</li>
						<!-- メニュー項目を揃えるためのダミー要素 -->
						<li></li>

					</ul>
				</div>
			</div>
		</header>
		<!-- new campaign -->
		<div id="content">
			<div class="inner_static">
				<section class="sec_confirm">
					<h4 class="tit1">
						<strong>申し込み送信完了</strong>
					</h4>
					<div class="bx_thankyou">
						<p>
							お申し込みを送信いたしまた。ありがとうございます。<br>
							お申し込み内容をメールにも送信しております。<br>
							後程担当者よりご連絡差し上げますのでお待ち下さい。
						</p>
					</div>
					<div class="entry_form_btn">
						<a href="/">HOME</a>
					</div>
				</section>
			</div>
		</div>
		<!-- //new campaign -->
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
						<a href="../campaign/campaign.html" class="aon">
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
						<a href="../contact/">
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
					<strong>Copyright © my-system Co., Ltd. All rights reserved.</strong><br />
					<strong>※Dsign Clean、i-Orderは株式会社NETDOORの商標または登録商標です。</strong><br />
					<strong>※menuはmenu株式会社の商標または登録商標です。</strong><br />
					<strong>※ターンドケイはカルテック株式会社の商標または登録商標です。</strong>
				</p>
			</div>
		</div>
	</footer>

</body>
<script>
	new ScrollHint('.table_container', {
		suggestiveShadow: true,
		remainingTime: 5000,
		i18n: {
			scrollable: 'スクロールできます'
		}
	});
</script>
<script src="./script.js?v=2304251804"></script>
</html>