<?php
include dirname(__FILE__)."/config.php";

if (isset($_SESSION['third_campaign']) && $_SESSION['third_campaign'] == 'third_campaign') {
    $_SESSION["third_campaign"] = "";
    unset($_SESSION['af']);
    unset($_SESSION['errMsg']);
}
$_SESSION["first_campaign"] = "first_campaign";
$_SESSION["second_campaign"] = "";

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
	<title>電帳法改正対応猶予期間がもうすぐ終了！Tsignboxなら安価で手軽に対応できます</title>
	<meta name="description" content="Tsignboxは2022年1月の改正電帳法に対応、電子書類にタイムスタンプを付与し、履歴管理や検索も可能です">
	<meta name="keywords" content="Tsignbox,ティーサインボックス,電子帳簿保存法対応,電子帳簿保存法,電帳法,ペーパーレス,タイムスタンプ,インボイス,領収書,請求書,電子化,東京,武蔵村山,昭島,東大和,瑞穂,青梅,立川,八王子,多摩,北海道,恵庭,えにわ">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/campaign.css?v=2304270034">
	<link rel="stylesheet" href="../css/scroll-hint.css">
	<link rel="stylesheet" href="../css/animation.css">
	<script src="../js/jquery-2.2.4.min.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script>
	<script src="../js/script.js?v=2304270034"></script>
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
		<div class="main_visual">
			<div class="mv_bg">
				<div class="main_visual_wrap black_txt">
					<div class="mv_txt">電子帳簿保存法<br>の改正に備える</div>
					<div class="mv_img"><img src="../imgs/logo.png" alt=""></div>
				</div>
				<div class="scroll_wrap">
					<div class="icon-scroll">
						<span id="scroll"></span>
						<p class="_tx">Scroll</p>
					</div>
				</div>
			</div>
		</div>
		<div>
			<section>
				<div class="tit_wrap ani-delay">
					<div class="tit_wrap_txt ani-delay-item ani-bottom">
						<span>Overview</span>電子帳簿保存法の<br class="tit_wrap_txt_br1">改正概要
					</div>
				</div>
				<div>
					<div class="Overview_1 ani-delay">
						<div class="Overview_tit ani-delay-item ani-bottom">電帳法の区分と対応</div>
						<div class="Overview_1_txt ani-delay-item ani-bottom"><span class="green_txt">請求書</span>や<span class="green_txt">発注書</span>など、どの企業でも受け取る機会の多い書類が対象です</div>
						<div class="Overview_table ani-delay-item ani-bottom">
							<table class="Overview_table1">
								<tr>
									<th class="Overview_1_cell8">国税関係書類</th>
								</tr>
								<tr>
									<td class="Overview_1_cell1 Overview_1_cell8">取引関係書類</td>
								</tr>
								<tr>
									<td class="Overview_1_cell3">相手授受</td>
								</tr>
								<tr>
									<td class="Overview_1_cell2">
										<ul class="table_column Overview_1_cell8">
											<li>・領収書</li>
											<li>・請求書</li>
											<li>・納品書</li>
											<li>・見積書</li>
											<li>・契約書</li>
											<li>&emsp;など</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td class="Overview_1_cell4 Overview_1_cell8">電帳法4条3項</td>
								</tr>
								<tr>
									<td class="Overview_1_cell2 Overview_1_cell8">電子帳簿保存法上の区分イメージ</td>
								</tr>
								<tr>
									<td class="Overview_1_cell4 Overview_1_cell8">スキャナ保存</td>
								</tr>
								<tr>
									<td class="Overview_1_cell2 Overview_1_cell8">紙で授受した書類</td>
								</tr>
							</table>
							<table class="Overview_table2">
								<tr>
									<th class="Overview_1_cell6">電子取引</th>
								</tr>
								<tr>
									<td class="Overview_1_cell2">
										<ul class="table_column Overview_1_cell8">
											<li>・請求書</li>
											<li>・見積書</li>
											<li>・納品書</li>
											<li>・注文書</li>
											<li>・注文請書</li>
											<li>・契約書</li>
											<li>&emsp;など</li>
											<li>&thinsp;</li>
											<li>&thinsp;</li>
											<li>&thinsp;</li>
											<li>&thinsp;</li>
											<li>&thinsp;</li>
										</ul>
									</td>
								</tr>
								<tr>
									<td class="Overview_1_cell5">新電帳法7条</td>
								</tr>
								<tr>
									<td class="Overview_1_cell7 Overview_1_cell8">電子帳簿保存法上の区分イメージ</td>
								</tr>
								<tr>
									<td class="Overview_1_cell5">電子データ保存</td>
								</tr>
								<tr>
									<td class="Overview_1_cell7 Overview_1_cell8">データで授受した取引情報</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="Overview_2 black_txt ani-delay">
						<div class="Overview_tit ani-delay-item ani-bottom">法律が変わり、<br class="Overview_tit_br1">データ保管する理由が<br class="Overview_tit_br2">あります</div>
						<div class="Overview_2_txt ani-delay-item ani-bottom"><span class="Overview_2_txt_1">「<span class="green_txt">電子帳簿保存法</span>」</span><span class="Overview_2_txt_2">という法律が<br class="Overview_2_txt_br">2022年1月に改正しました。<br>
								データで受け取ったら、<span class="pink_txt_1">紙保存はNG。<br class="Overview_2_txt_br">データ保存が必要になった。<br>
									その時に電帳法に準拠する必要があります。</span></span>
						</div>
						<div class="ani-delay-item ani-bottom">
							<div class="table_container">
								<table class="Overview_table3">
									<tr>
										<th class="Overview_table3_1 black_txt">紙保管</th>
										<th class="Overview_table3_2"><img src="../imgs/overview_img.png" alt=""></th>
										<th class="Overview_table3_3"><span class="table3_3_txt black_txt">電子保管</span><span class="table3_3_pink">電帳法の要件を<br>守りましょう!</span>
											<p class="table3_3_circle">授受の<br>形態</p>
										</th>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="entry_btn">
				<div class="entry_btn_1 ani-delay">
					<div class="entry_btn_txt entry_btn_1_txt ani-delay-item ani-bottom">申し込みはこちらをご利用ください</div>
					<div class="entry_btn_wrap ani-delay-item ani-bottom">
						<div class="entry_btn_cont entry_btn_wrap1 ">
							<div class="entry_btn_btn1">
								<a class="black_txt to_form_section" href="javascript:void(0);">申し込み</a>
							</div>
						</div>
						<div class="entry_btn_cont entry_btn_wrap2">
							<div class="entry_btn_btn2">
								<a href="https://my-system.co.jp/contact/" target="_blank" rel="noopener noreferrer">お問い合わせ</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="timestamp ani-delay">
					<div class="timestamp_tit ani-delay-item ani-bottom"><span class="timestamp_tit1">(参考) </span><br><span class="timestamp_tit2">タイムスタンプ<br>とは何か</span></div>
					<div class="ani-delay-item ani-bottom">
						<a href="../imgs/overview_img2.png" target="_blank"><img class="timestamp_img" src="../imgs/overview_img2.png" alt=""></a>
					</div>
				</div>
				<div class="penalty ani-delay">
					<div class="penalty_tit ani-delay-item ani-bottom">具体的なペナルティ<br>の可能性</div>
					<div class="penalty_wrap_bg ani-delay-item ani-bottom">
						<div class="penalty_wrap">
							<div class="penalty_wrap_3col">
								<div class="penalty_box_wrap">
									<div class="penalty_box penalty_1 black_txt">
										<div class="penalty_box_tit penalty_box_tit1">青色申告の<br class="penalty_box_tit1_br">承認取消</div>
										<p class="penalty_box_txt_1">電磁的記録の保存を要件を満たして行っていない場合には、保存義務が履行されていないことになるとして、青色申告の承認取消対象となり得ます。<br>特別控除65万円、親族給与の経費化、損失繰越の利用、貸倒れ引当金の計上、少額資産の一括償却といった仕組みを失いかねません。</p>
										<div class="penalty_box_txt_2">
											<ul>
												<li>※<a href="https://www.nta.go.jp/law/joho-zeikaishaku/sonota/jirei/pdf/0021006-031_02.pdf" target="_blank" class="penalty_green_txt">国税庁「電子帳簿保存法一問一答【スキャナ保存関係】」</a>P40/問56</li>
												<li>※<a href="https://elaws.e-gov.go.jp/document?lawid=340AC0000000034" target="_blank" class="penalty_green_txt">法人税法</a> 第127条第1項第1号</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="penalty_box_wrap">
									<div class="penalty_box penalty_2 black_txt">
										<div class="penalty_box_tit">対象取引が経費として<br class="penalty_box_tit2_br">認められない可能性</div>
										<p class="penalty_box_txt_1">電磁的記録を要件に従って保存していない場合やその電磁的記録を出力した書面等を保存している場合については、その電磁的記録や書面等は、国税関係書類以外の書類(電子取引の確認書類)とみなされません。</p>
										<div class="penalty_box_txt_2">
											<ul>
												<li>※<a href="https://www.nta.go.jp/law/joho-zeikaishaku/sonota/jirei/pdf/0021006-031_03.pdf" target="_blank" class="penalty_green_txt">国税庁「電子帳簿保存法一問一答」</a>P30/問42</li>
											</ul>
										</div>
									</div>
								</div>
								<div class="penalty_box_wrap">
									<div class="penalty_box penalty_3 black_txt">
										<div class="penalty_box_tit">データの隠蔽又は仮装があった場合、<br class="penalty_box_tit2_br">重加算税10%</div>
										<p class="penalty_box_txt_1">通常の過少申告加算税に加えて、電磁的記録の記録事項に関し隠蔽又は仮装がある場合、重加算税が追加で10%加重されます。</p>
										<div class="penalty_box_txt_2">
											<ul>
												<li>※<a href="https://elaws.e-gov.go.jp/document?lawid=410AC0000000025" target="_blank" class="penalty_green_txt">電子帳簿保存法</a> 第8条第5項</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="faq ani-delay">
					<div class="faq_tit ani-delay-item ani-bottom">
						<div class="faq_tit1">FAQ</div>
						<div class="faq_tit2 black_txt">よくある質問</div>
					</div>
					<div class="faq_txt black_txt ani-delay-item ani-bottom">
						<div class="faq_txt_wrap">
							<div class="faq_txt_q_wrap">
								<div class="faq_txt_circle"><img src="../imgs/faq_q.png" alt=""></div>
								<div class="faq_txt_q">絶対にツールを入れなきゃいけないの?<br>
									自分たちのサーバー環境で対応するのじゃだめ?
								</div>
							</div>
							<div class="faq_txt_a_wrap">
								<div class="faq_txt_circle"><img src="../imgs/faq_a.png" alt=""></div>
								<div class="faq_txt_a">
									対応できるなら、それでも構いません。<br>
									<span class="faq_txt_a_b">でも本当に対応できますか?</span><br>
									自分たちでタイムスタンプをPDFに付与する仕組みがありますか?<br>
									日付や金額で検索・取得できる環境を整えられるでしょうか?<br>
									それらを全て自前で構築することは、よほどのIT企業でない限り大きな手間・時間・コストがかかります。<br>
									<span class="faq_txt_a_b">対応できる専用サービスを活用するほうが、よっぽど簡単かつ安価現実的な対応方針と言えます。</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="tit_wrap ani-delay">
					<div class="tit_wrap_txt ani-delay-item ani-bottom">
						<span>Aboutus</span>Tsignboxに<br class="tit_wrap_txt_br2">ついて
					</div>
				</div>
				<div class="tsignbox_1 ani-delay">
					<div class="tsignbox_1_tit ani-delay-item ani-bottom">電帳法(データ保存)要件と<br>Tsignboxの対応</div>
					<div class="tsignbox_table black_txt ani-delay-item ani-bottom">
						<div class="table_container">
							<table>
								<thead>
									<tr>
										<th class="tsignbox_table_th1"></th>
										<th class="tsignbox_table_cell1 tsignbox_table_th2">電帳法の要件</th>
										<th class="tsignbox_table_cell1 tsignbox_table_th3">Tsignboxの対応</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="tsignbox_table_cell2">取引関係書類</th>
										<td label="電帳法の要件">
											<ul>
												<li>電子書類に<span class="tsignbox_table_pink">タイムスタンプを付与</span>できる</li>
												<li>システム上で訂正、削除ができないか、又はその履歴を記録できる</li>
												<li>事務処理規定を整備して、それに則って運用する(上記のいずれかの要件を満たす)</li>
											</ul>
										</td>
										<td class="tsignbox_table_cell3" label="tsignboxの対応">
											<ul>
												<li>送信する電子書類に<span class="tsignbox_table_pink">タイムスタンプを付与</span>できる</li>
												<li>締結が完了した契約書が<span class="tsignbox_table_pink">完全には削除されない</span>よう記録</li>
												<li>受領したデータを保存することで<span class="tsignbox_table_pink">タイムスタンプを付与</span>できる</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th class="tsignbox_table_cell2">検索性</th>
										<td label="電帳法の要件">
											<ul>
												<li><span class="tsignbox_table_pink">契約相手、日付、金額</span>の条件で検索できる</li>
												<li>日付又は金額については範囲指定で検索可</li>
												<li>複数の項目を組み合わせて検索可</li>
											</ul>
										</td>
										<td class="tsignbox_table_cell3" label="tsignboxの対応">
											<ul>
												<li><span class="tsignbox_table_pink">自由に検索項目を設定</span>し検索できる<br>(範囲指定・複数条件の設定も可)</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th class="tsignbox_table_cell2">関連書類の添付</th>
										<td label="電帳法の要件">
											<ul>
												<li>システム概要、操作説明書などの備え付け</li>
											</ul>
										</td>
										<td class="tsignbox_table_cell3" label="tsignboxの対応">
											<ul>
												<li>マニュアルやFAQを公開し常に確認できる状態</li>
											</ul>
										</td>
									</tr>
									<tr>
										<th class="tsignbox_table_cell2">見読性</th>
										<td label="電帳法の要件">
											<ul>
												<li>PCの画面上で電子書類を鮮明に確認できる</li>
												<li>電子書類を速やかに出力することができる</li>
											</ul>
										</td>
										<td class="tsignbox_table_cell3" label="tsignboxの対応">
											<ul>
												<li>PCの画面上で電子書類を鮮明に確認できる</li>
												<li>電子書類を速やかに出力することができる</li>
											</ul>
										</td>
									</tr>
								</tbody>
								<tr></tr>
							</table>
						</div>
					</div>
				</div>
				<div class="tsignbox_2 ani-delay">
					<div class="tsignbox_2_tit ani-delay-item ani-bottom">Tsignboxの強み</div>
					<div class="tsignbox_2_wrap ani-delay-item ani-bottom">
						<div class="tsignbox_2_wrap_3col">
							<div class="tsignbox_2_box_wrap">
								<div class="tsignbox_2_box tsignbox_2_1 black_txt">
									<div class="tsignbox_2_box_img_wrap">
										<div class="tsignbox_2_box_img"><img src="../imgs/tsuyomi_img1.png" alt=""></div>
									</div>
									<div class="tsignbox_2_box_tit">電話サポート</div>
									<p class="tsignbox_2_box_txt_1">オペレーターが対応する電話サポートメール、チャットも可/契約相手も利用可電帳法についての問い合わせも可能</p>
									<div class="tsignbox_2_box_txt_2">1</div>
								</div>
							</div>
							<div class="tsignbox_2_box_wrap">
								<div class="tsignbox_2_box tsignbox_2_2 black_txt">
									<div class="tsignbox_2_box_img_wrap">
										<div class="tsignbox_2_box_img"><img src="../imgs/tsuyomi_img2.png" alt=""></div>
									</div>
									<div class="tsignbox_2_box_tit">定額パッケージ</div>
									<p class="tsignbox_2_box_txt_1">定額でプラン内のファイル数を存分に使えます。過去の紙文書もデータ化して保管できます</p>
									<div class="tsignbox_2_box_txt_2">2</div>
								</div>
							</div>
							<div class="tsignbox_2_box_wrap">
								<div class="tsignbox_2_box tsignbox_2_3 black_txt">
									<div class="tsignbox_2_box_img_wrap">
										<div class="tsignbox_2_box_img"><img src="../imgs/tsuyomi_img3.png" alt=""></div>
									</div>
									<div class="tsignbox_2_box_tit">電子契約導入or<br>解約も安心</div>
									<p class="tsignbox_2_box_txt_1">将来電子契約を導入する際スムーズに移行(別途アカウント作成等は不要)</p>
									<p class="tsignbox_2_box_txt_1 tsignbox_2_box_txt_1_2">解約後もデータ閲覧・ダウンロード可能</p>
									<div class="tsignbox_2_box_txt_2">3</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="entry_btn">
				<div class="entry_btn_1 ani-delay">
					<div class="entry_btn_txt entry_btn_2_txt ani-delay-item ani-bottom">申し込みはこちらをご利用ください</div>
					<div class="entry_btn_wrap ani-delay-item ani-bottom">
						<div class="entry_btn_cont">
							<div class="entry_btn_btn1">
								<a class="black_txt to_form_section" href="javascript:void(0);">申し込み</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="logo_sec ani-delay">
					<div class="logo_sec_img ani-delay-item ani-bottom"><img src="../imgs/logo.png" alt=""></div>
					<div class="logo_sec_txt black_txt ani-delay-item ani-bottom">JIMMA認証取得<br>※2023年2月</div>
				</div>
				<div class="plan black_txt ani-delay">
					<div class="plan_1 ani-delay-item ani-bottom">
						<div class="plan_tit_1">安価で手軽に電帳法対応<br>【電子取引】</div>
						<div class="plan_tit_2">
							<div class="plan_tit_2_1">文書保管プラン</div>
							<div class="plan_tit_2_2">定額</div>
							<div class="plan_tit_2_3"><span>14,500<span class="plan_tit_2_3_m">/月</span></span></div>
							<div class="plan_tit_2_4">(税抜き)</div>
						</div>
						<div class="plan_table">
							<table>
								<tr>
									<th>アカウントに関する仕様</th>
								</tr>
								<tr>
									<td>
										<ul>
											<li>基本アカウント数：1アカウント<br>
												(複数名で共有可・同時接続可)</li>
											<li>アカウント追加：不可</li>
										</ul>
									</td>
								</tr>
								<tr class="plan_table_m_top">
									<th>文書保管に関する仕様</th>
								</tr>
								<tr class="plan_table_m_bottom">
									<td>
										<ul>
											<li><span class="pink_txt">総保管容量：無制限</span></li>
											<li>月間アップロード上限：500件(追加500件/月5,000円)</li>
											<li>1ファイルあたりサイズ：5MB以内</li>
											<li>1度の操作でまとめてアップできる件数：20件</li>
											<li>タイムスタンプ：AMANO社製(認定タイムスタンプ)</li>
											<li>タイムスタンプ間隔：1回/1秒</li>
										</ul>
									</td>
								</tr>
								<tr>
									<th>その他機能・仕様</th>
								</tr>
								<tr>
									<td>
										<ul>
											<li>フォルダ管理</li>
											<li>検索タグ付け</li>
											<li>電子契約機能：1送信/月</li>
											<li><span class="pink_txt">解約後もデータ保持。</span></li>
											<li><span class="pink_txt">継続的に閲覧・ダウンロードが可能です(解約後無期限)</span></li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="plan_2 ani-delay-item ani-bottom">
						<div class="plan_tit_1"><span class="plan_tit_1_1">本格的に文書管理</span><br>スキャナ保存/電子取引</div>
						<div class="plan_tit_2">
							<div class="plan_tit_2_1">文書保管<span class="pink_txt">Plus</span>プラン</div>
							<div class="plan_tit_2_2">定額</div>
							<div class="plan_tit_2_3"><span>50,000<span class="plan_tit_2_3_m">/月</span></span></div>
							<div class="plan_tit_2_4">(税抜き)</div>
						</div>
						<div class="plan_table">
							<table>
								<tr>
									<th>アカウントに関する仕様</th>
								</tr>
								<tr>
									<td>
										<ul>
											<li>基本アカウント数：<span class="pink_txt">20アカウント</span><br>
												(複数名で共有可・同時接続可)</li>
											<li>アカウント追加：1アカウント500円</li>
										</ul>
									</td>
								</tr>
								<tr class="plan_table_m_top">
									<th>文書保管に関する仕様</th>
								</tr>
								<tr class="plan_table_m_bottom">
									<td>
										<ul>
											<li><span class="pink_txt">総保管容量：無制限</span></li>
											<li>月間アップロード上限：<span class="pink_txt">10,000件</span>(追加1,000件/月5,000円)</li>
											<li>1ファイルあたりサイズ：5MB以内</li>
											<li>1度の操作でまとめてアップできる件数：20件</li>
											<li>タイムスタンプ：AMANO社製(認定タイムスタンプ)</li>
											<li>タイムスタンプ間隔：1回/1秒</li>
										</ul>
									</td>
								</tr>
								<tr>
									<th>その他機能・仕様</th>
								</tr>
								<tr>
									<td>
										<ul>
											<li>フォルダ管理(縦10階層/横無制限)</li>
											<li>検索タグ付け</li>
											<li>電子契約機能：1通/月</li>
											<li><span class="pink_txt">閲覧制限(フォルダに対する閲覧権限付与)</span></li>
											<li><span class="pink_txt">権限管理(閲覧できる/アップロードできる)</span></li>
											<li><span class="pink_txt">リマインダー(更新漏れをなくすための通知)</span></li>
											<li><span class="pink_txt">補足資料アップロード(Excel/Word等も可能)</span></li>
											<li><span class="pink_txt">文書の関連付け(保管文書同士の関連付が可能)</span></li>
											<li><span class="pink_txt">文書一覧ダウンロード(CSV)(契約台帳作成などに便利)</span></li>
											<li><span class="pink_txt">二要素認証(セキュリティ強化)</span></li>
										</ul>
									</td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="comparison ani-delay">
					<div class="comparison_tit ani-delay-item ani-bottom">類似サービスとの比較</div>
					<div class="comparison_table black_txt ani-delay-item ani-bottom">
						<div class="table_container">
							<table>
								<thead>
									<tr>
										<th class="comparison_table_th1"></th>
										<th class="comparison_table_cell1 comparison_table_th2">Tsignbox</th>
										<th class="comparison_table_cell1 comparison_table_th3">その他<br>
											電子契約サービス</th>
										<th class="comparison_table_cell1 comparison_table_th4">オンライン<br class="comparison_table_br1">ストレージ<br>
											DropBox<br>
											GoogleDrive</th>
										<th class="comparison_table_cell1 comparison_table_th3">電帳法対応<br>ストレージ</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th class="comparison_table_cell2">改変防止機能<br>タイムスタンプ</th>
										<td class="comparison_table_cell3 comparison_table_cell5">&#12295;</td>
										<td class="comparison_table_cell4 comparison_table_cell5">&#12295;</td>
										<td class="comparison_table_cell4 comparison_table_cell6">&times;</td>
										<td class="comparison_table_cell4 comparison_table_cell5">&#12295;</td>
									</tr>
									<tr>
										<th class="comparison_table_cell2">条件検索機能</th>
										<td class="comparison_table_cell3 comparison_table_cell5">&#12295;</td>
										<td class="comparison_table_cell4 comparison_table_cell5">&#12295;</td>
										<td class="comparison_table_cell4 comparison_table_cell6">&times;</td>
										<td class="comparison_table_cell4 comparison_table_cell5">&#12295;</td>
									</tr>
									<th class="comparison_table_cell2">電子契約機能</th>
									<td class="comparison_table_cell3 comparison_table_cell5">&#12295;</td>
									<td class="comparison_table_cell4 comparison_table_cell5">&#12295;</td>
									<td class="comparison_table_cell4 comparison_table_cell6">&times;</td>
									<td class="comparison_table_cell4 comparison_table_cell6">&times;</td>
									</tr>
									<tr>
										<th class="comparison_table_cell2">保管可能形式</th>
										<td class="comparison_table_cell3 comparison_table_txt">PDF</td>
										<td class="comparison_table_cell4 comparison_table_txt">PDF</td>
										<td class="comparison_table_cell4 comparison_table_txt">全形式</td>
										<td class="comparison_table_cell4 comparison_table_txt">PDF/JPEG/PING</td>
									</tr>
									<tr>
										<th class="comparison_table_cell2">価格</th>
										<td class="comparison_table_cell3 comparison_table_txt">月額<br>¥14,500</td>
										<td class="comparison_table_cell4 comparison_table_txt">月額<br>¥30,000+従量課金~</td>
										<td class="comparison_table_cell4 comparison_table_txt">月額<br>¥0~</td>
										<td class="comparison_table_cell4 comparison_table_txt">月額<br>¥10,000+従量課金~</td>
									</tr>
									<tr>
										<th class="comparison_table_cell2">特徴</th>
										<td class="comparison_table_cell3 comparison_table_cell7 comparison_table_txt">
											<ul>
												<li>文書保管単体で活用できるため<br>安価な料金設定</li>
												<li>電子契約にも発展可能</li>
											</ul>
										</td>
										<td class="comparison_table_cell4 comparison_table_cell7 comparison_table_txt">
											<ul>
												<li>単体売りできず料金高め</li>
												<li>電子契約も利用可能</li>
											</ul>
										</td>
										<td class="comparison_table_cell4 comparison_table_cell7 comparison_table_txt">
											<ul>
												<li>タイムスタンプ<br>検索要件を満たさない</li>
											</ul>
										</td>
										<td class="comparison_table_cell4 comparison_table_cell7 comparison_table_txt">
											<ul>
												<li>従量課金が一般的<br>解約時のデータ撤退コストあり</li>
												<li>将来電子契約を活用する際二元管理になる</li>
											</ul>
										</td>
									</tr>
								</tbody>
								<tr></tr>
							</table>
						</div>
					</div>
				</div>
			</section>
			<section class="entry_btn">
				<div class="entry_btn_1 ani-delay">
					<div class="entry_btn_txt entry_btn_2_txt ani-delay-item ani-bottom">申し込みはこちらをご利用ください</div>
					<div class="entry_btn_wrap ani-delay-item ani-bottom">
						<div class="entry_btn_cont">
							<div class="entry_btn_btn1">
								<a class="black_txt to_form_section" href="javascript:void(0);">申し込み</a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section>
				<div class="about_campaign">
					<div class="about_campaign_1 ani-delay">
						<div class="about_campaign_1_tit ani-delay-item ani-bottom">お得なキャンペーン<br>実施中</div>
						<div class="about_campaign_1_txt ani-delay-item ani-bottom">キャンペーン期間中は、すべてのお客様が0円でスタートしていただけます。</div>
						<div class="ani-delay-item ani-bottom"><img src="../imgs/campaign_img1.png" alt=""></div>
					</div>
					<div class="about_campaign_2 black_txt ani-delay">
						<div class="about_campaign_2_tit ani-delay-item ani-bottom">お申込みから<br>利用開始までの流れ</div>
						<div class="ani-delay-item ani-bottom">
							<ol class="about_campaign_2_li">
								<li>申込フォームを送信</li>
								<li class="about_campaign_2_li_2">必要書類郵送&emsp;返送</li>
								<li class="about_campaign_2_li_3">アカウント発行のご連絡（メール）<span>※返送書類到着後、1週間～10日程度お時間をいただきます</span></li>
								<li class="about_campaign_2_li_4">【利用開始】</li>
								<li>利用開始月の翌月末まで無料利用</li>
								<li class="about_campaign_2_li_6">利用開始月の3か月目から課金開始</li>
							</ol>
						</div>
					</div>
					<div class="about_campaign_3 black_txt ani-delay">
						<div class="about_campaign_3_tit ani-delay-item ani-bottom">解約手続きについて</div>
						<div class="about_campaign_3_txt ani-delay-item ani-bottom">
							<p>2か月目が終わる1週間前までに、弊社メールアドレス info@my-system.co.jp にメールお願いします。<br>
								（メール内容）
							<ul>
								<li>・貴社名</li>
								<li>・電話番号</li>
								<li>・解約希望</li>
							</ul>
							</p>
							<p class="about_campaign_3_txt_2">※解約処理では、書類のやり取りは発生いたしません。<br>
								なお、1週間を切ったタイミングでご連絡いただいた場合、事務手続きの都合上、料金発生前でのご解約は間に合いません。ご注意ください。
							</p>
						</div>
					</div>
				</div>
			</section>
			<section id="form_section">
				<div id="form_parent" class="entry black_txt ani-delay">
					<div class="entry_tit ani-delay-item ani-bottom">お申し込み</div>
					<form id="campaign_form" class="form--horizontal" onsubmit="return add_data();">
						<input type="hidden" id="refresh" value="no"/>
						<input type="hidden" name="name" value="あいうえお"/>
						<input type="hidden" name="re" class="re" value="no"/>
						<div class="entry_form ani-delay-item ani-bottom">
							<div>
								<ul>
									<li class="entry_form_box">
										<div class="entry_form_ttl">会社名<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box">
												<input class="entry_form_input input_1" type="text" id="company_name" name="company_name" value="<?php echo $outputData['company_name'];?>">
												<p class="alert_msg entry_form_cont_error company_name_alert <?php if(in_array('company_name', $outputData['errMsg'])) { echo("alert_show"); } ?>">会社名を入力してください。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box">
										<div class="entry_form_ttl">お名前<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box">
												<div>
													<input class="entry_form_input input_1" type="text" id="user_name" name="user_name" value="<?php echo $outputData['user_name'];?>">
												</div>
												<p class="alert_msg entry_form_cont_error user_name_alert <?php if(in_array('user_name', $outputData['errMsg'])) { echo("alert_show"); } ?>">お名前を入力してください。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box">
										<div class="entry_form_ttl">メールアドレス<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box">
												<input class="entry_form_input input_1" type="email" id="email" name="email" value="<?php echo $outputData['email'];?>">
												<p class="alert_msg entry_form_cont_error email_alert <?php if(in_array('email', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスを入力してください。</p>
												<p class="alert_msg entry_form_cont_error email2_alert <?php if(in_array('email2', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスを正しく入力してください。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box confirm_hide">
										<div class="entry_form_ttl">確認用メールアドレス<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box">
												<input class="entry_form_input input_1" type="email" id="email_repeat" name="email_repeat" value="<?php echo $outputData['email_repeat'];?>">
												<p class="alert_msg entry_form_cont_error email3_alert <?php if(in_array('email3', $outputData['errMsg'])) { echo("alert_show"); } ?>">メールアドレスが一致しません。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box">
										<div class="entry_form_ttl">お客様の電話番号<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box">
												<div>
													<input class="entry_form_input input_1" type="tel" id="tel" name="tel" value="<?php echo $outputData['tel'];?>">
												</div>
												<p class="alert_msg entry_form_cont_error tel_alert <?php if(in_array('tel', $outputData['errMsg'])) { echo("alert_show"); } ?>">お客様の電話番号を入力してください。</p>
												<p class="alert_msg entry_form_cont_error tel2_alert <?php if(in_array('tel2', $outputData['errMsg'])) { echo("alert_show"); } ?>">お客様の電話番号を正しく入力してください。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box">
										<div class="entry_form_ttl">郵便番号<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box form_postal_code">
												<div class="postal_code_txt">
													<div>
														<label><span class="postal_code_txt_1">〒</span>
															<input class="entry_form_input input_2 confirm_hide" type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="zip1" name="zip1" maxlength="3" value="<?php echo $outputData['zip1'];?>">
														</label>
													</div>
													<div class="confirm_hide">
														<label><span class="postal_code_txt_2">-</span>
															<input class="entry_form_input input_2" type="tel" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="zip2" name="zip2" maxlength="4" value="<?php echo $outputData['zip2'];?>">
														</label>
													</div>
													<div class="postal_code_txt_3 confirm_hide">&#40;半角数字&#41;</div>
												</div>
												<div class="confirm_hide">
													<div class="postal_code_btn"><a class="postal_code_txt_4" href="javascript:void(0);"><span>郵便番号確認</span></a></div>
												</div>
											</div>
											<p class="alert_msg entry_form_cont_error error_postal_code zip_alert <?php if(in_array('zip', $outputData['errMsg'])) { echo("alert_show"); } ?>">郵便番号を入力してください。</p>
											<p class="alert_msg entry_form_cont_error error_postal_code zip2_alert <?php if(in_array('zip2', $outputData['errMsg'])) { echo("alert_show"); } ?>">正しい郵便番号を入力してください。</p>
										</div>
									</li>
									<li class="entry_form_box">
										<div class="entry_form_ttl">住所<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box address_txt">
												<label><span class="address_txt_1">都道府県</span>
													<input class="entry_form_input input_3 confirm_hide" type="text" id="addr1" name="addr1" value="<?php echo $outputData['addr1'];?>">
												</label>
												<label class="address_txt_2_wrap confirm_hide"><span class="address_txt_2">市町村</span>
													<input class="entry_form_input input_3" type="text" id="addr2" name="addr2" value="<?php echo $outputData['addr2'];?>">
												</label>
												<p class="address_txt_3 confirm_hide">番地、アパート・マンション名、<br>部屋番号</p>
												<input class="entry_form_input input_4 confirm_hide" type="text" id="addr3" name="addr3" value="<?php echo $outputData['addr3'];?>">
												<p class="alert_msg entry_form_cont_error addr_alert <?php if(in_array('addr', $outputData['errMsg'])) { echo("alert_show"); } ?>">住所を入力してください。</p>
											</div>
										</div>
									</li>
									<li class="entry_form_box method">
										<div class="entry_form_ttl">お支払い方法<span class="entry_form_required">必須</span></div>
										<div class="entry_form_cont">
											<div class="entry_form_cont_box method_box">
												<ul class="method_radio_wrap confirm_hide">
													<li>
														<input type="radio" id="method_radio_1" name="method_radio" <?php if($outputData['method_radio'] == '口座振替') { echo( 'checked'); }?> value="口座振替">
														<label for="method_radio_1" class="method_radio">口座振替</label>
													</li>
													<li>
														<input type="radio" id="method_radio_2" name="method_radio" <?php if($outputData['method_radio'] == '請求書払い') { echo( 'checked'); }?> value="請求書払い">
														<label for="method_radio_2" class="method_radio">請求書払い</label>
													</li>
												</ul>
												<p class="method_txt_2 confirm_hide">注記
												<ul class="method_txt_2_2 confirm_hide">
													<li>※口座振替は口座登録時3300円(税込)の登録手数料を初回引落時に承ります。2回目以降は手数料がかかりません。</li>
													<li>※ご請求書でのお支払いの場合は末締め翌末払いとなります。振込手数料はお客様のご負担となります。</li>
												</ul>
												</p>
												<p class="alert_msg entry_form_cont_error method_radio_alert <?php if(in_array('method_radio', $outputData['errMsg'])) { echo("alert_show"); } ?>">お支払い方法を選択してください。</p>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="recaptcha_wrap confirm_hide">
								<div id="html_element"></div>
								<span class="alert_msg re_alert <?php if(in_array('re', $outputData['errMsg'])) { echo("alert_show"); } ?>">スパム防止のためのものです。チェックボックスをクリックしてください。</span>
							</div>
							<div class="entry_form_btn">
								<a class="check_btn" href="javascript:void(0);" onclick="add_data(); return false;">確認ページへ</a>
								<a class="back_btn" href="javascript:void(0);" onclick="check_data(); return false;">入力内容編集</a>
								<a class="submit_btn" href="javascript:void(0);" onclick="add_data(); return false;">送信する</a>
							</div>
						</div>
					</form>
					<iframe src="" id="addIframe" name="addIframe" width="1" height="1" border="0" frameborder="0" framespacing="0" scrolling="no" vspace="0" style="border:none;margin:0px;background:#333"></iframe>
				</div>
			</section>
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