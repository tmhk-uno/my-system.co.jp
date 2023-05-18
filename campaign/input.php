<?php
include dirname(__FILE__)."/config.php";

$go_back_url = "./campaign.php";

$token = isset($_POST['csrf_token_campaign']) ? $_POST['csrf_token_campaign'] : '';
$token_cookie = F_COOKIE_N('csrf_token_campaign');
S_COOKIE_N("csrf_token_campaign", "", 0, "/");
if ($token != $token_cookie) {
    $_SESSION["third_campaign"] = "";
    $_SESSION['af'] = array();
    $_SESSION['errMsg'] = array();

    F_script("このページはアクセスできません。","window.location = '".$go_back_url."'");
    exit();
}

if (isset($_SESSION['third_campaign']) && $_SESSION['third_campaign'] == 'third_campaign') {
	$_SESSION["third_campaign"] = "";
	$_SESSION['af'] = array();
	$_SESSION['errMsg'] = array();
	
	header('Location:' . $go_back_url);
	exit();
}
$_SESSION["first_campaign"] = "";
$_SESSION["second_campaign"] = "second_campaign";

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

if ($outputData['company_name'] == NULL) {
    array_push($errMsg, 'company_name');
}

if ($outputData['user_name'] == NULL) {
    array_push($errMsg, 'user_name');
}

if ($outputData['email'] == NULL) {
    array_push($errMsg, 'email');
} else if (!check_email_address($outputData['email'])) {
    array_push($errMsg, 'email2');
} else if ($outputData['email'] != $outputData['email_repeat']) {
    array_push($errMsg, 'email3');
}

if ($outputData['zip1'] == NULL) {
    array_push($errMsg, 'zip1');
}

if ($outputData['zip2'] == NULL) {
    array_push($errMsg, 'zip2');
}

if ($outputData['addr1'] == NULL) {
    array_push($errMsg, 'addr1');
}

if ($outputData['addr2'] == NULL) {
    array_push($errMsg, 'addr2');
}

if ($outputData['addr3'] == NULL) {
    array_push($errMsg, 'addr3');
}

if ($outputData['method_radio'] == NULL) {
    array_push($errMsg, 'method_radio');
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

if(!isset($outputData['company_name'])) { $outputData['company_name'] = ""; }
else { $outputData['company_name'] = check_input_data($outputData['company_name']); }

if(!isset($outputData['user_name'])) { $outputData['user_name'] = ""; }
else { $outputData['user_name'] = check_input_data($outputData['user_name']); }

if(!isset($outputData['email'])) { $outputData['email'] = ""; }
else { $outputData['email'] = check_input_data($outputData['email']); }

if(!isset($outputData['email_repeat'])) { $outputData['email_repeat'] = ""; }
else { $outputData['email_repeat'] = check_input_data($outputData['email_repeat']); }

if(!isset($outputData['tel'])) { $outputData['tel'] = ""; }
else { $outputData['tel'] = check_input_data($outputData['tel']); }

if(!isset($outputData['zip1'])) { $outputData['zip1'] = ""; }
else { $outputData['zip1'] = check_input_data($outputData['zip1']); }

if(!isset($outputData['zip2'])) { $outputData['zip2'] = ""; }
else { $outputData['zip2'] = check_input_data($outputData['zip2']); }

if(!isset($outputData['addr1'])) { $outputData['addr1'] = ""; }
else { $outputData['addr1'] = check_input_data($outputData['addr1']); }

if(!isset($outputData['addr2'])) { $outputData['addr2'] = ""; }
else { $outputData['addr2'] = check_input_data($outputData['addr2']); }

if(!isset($outputData['addr3'])) { $outputData['addr3'] = ""; }
else { $outputData['addr3'] = check_input_data($outputData['addr3']); }

if(!isset($outputData['method_radio'])) { $outputData['method_radio'] = ""; }
else { $outputData['method_radio'] = check_input_data($outputData['method_radio']); }

// send mail -------------

$user_email = $outputData['email'];

$body = "";
$body.="\n\n";

$subject = "【株式会社マイ・システム】お申し込みくださりありがとうございます";
$subject_admin = "【株式会社マイ・システム】キャンペーンページからお申し込みがありました";

$body .= ''  ."\n";
$body .= $outputData['user_name'] . '様'  ."\n";
$body .= ''  ."\n";
$body .= 'お申し込みを受付ました。ありがとうございます。'  ."\n";
$body .= '後程担当者よりご連絡差し上げますのでお待ち下さい。'  ."\n";
$body .= ''  ."\n";
$body .= '以下の内容が送信されました。'  ."\n";
$body .= ''  ."\n";

$body_admin .= ''  ."\n";
$body_admin .= $outputData['user_name'] . '様'  ."\n";
$body_admin .= ''  ."\n";
$body_admin .= 'お問い合わせ内容を受付ました。ありがとうございます。'  ."\n";
$body_admin .= '後程担当者よりご連絡差し上げますのでお待ち下さい。'  ."\n";
$body_admin .= ''  ."\n";
$body_admin .= '以下の内容が送信されました。'  ."\n";
$body_admin .= ''  ."\n";

$body_default .= '---------------------------------------------------------------------'  ."\n";
$body_default .= '■会社名：'  ."\n";
$body_default .= '        '  . $outputData['company_name'] . "様\n";
$body_default .= ''  ."\n";
$body_default .= '■お名前：'  ."\n";
$body_default .= '        '  . $outputData['user_name'] . "様\n";
$body_default .= ''  ."\n";
$body_default .= '■メールアドレス：'  ."\n";
$body_default .= '        '  . $outputData['email']    .       "\n";
$body_default .= ''  ."\n";
$body_default .= '■電話番号：'  ."\n";
$body_default .= '        '  . $outputData['tel'] .       "\n";
$body_default .= ''  ."\n";
$body_default .= '■郵便番号：'  ."\n";
$body_default .= '        '  . '〒 ' . $outputData['zip1'] . '-' . $outputData['zip2'] .       "\n";
$body_default .= ''  ."\n";
$body_default .= '■住所：'  ."\n";
$body_default .= '        '  . $outputData['addr1'] . $outputData['addr2'] . $outputData['addr3'] .       "\n";
$body_default .= ''  ."\n";
$body_default .= '■お支払い方法：'  ."\n";
$body_default .= '        '  . $outputData['method_radio'] .       "\n";
$body_default .= ''  ."\n";
$body_default .= '---------------------------------------------------------------------'  ."\n";
$body_default .= ''  ."\n";
$body_default .= '株式会社マイ・システム'  ."\n";
$body_default .= '東京都昭島市昭和町2-7-6-501'  ."\n";
$body_default .= 'TEL:042-519-2224'  ."\n";
$body_default .= 'FAX：042-519-2225'  ."\n";
$body_default .= ''  ."\n";

$body .= $body_default;
$body_admin .= $body_default;

mb_language('uni');
mb_internal_encoding("UTF-8");

if($admin_email != '') {
    $toMailaddr = $admin_email;
    $sndSubject = $subject_admin;
    $sndMessage = $body_admin;
    $addHeader = 'From:' . mb_encode_mimeheader($admin_name) . '<' . $admin_email . '>' . "\n";
    $addHeader = str_replace("\r\n", "\n", $addHeader);
    mb_send_mail($toMailaddr, $sndSubject, $sndMessage, $addHeader);
}

if($user_email != '') {
    $toMailaddr = $user_email;
    $sndSubject = $subject;
    $sndMessage = $body;
    $addHeader = 'From:' . mb_encode_mimeheader($admin_name) . '<' . $admin_email . '>' . "\n";
    $addHeader = str_replace("\r\n", "\n", $addHeader);
    mb_send_mail($toMailaddr, $sndSubject, $sndMessage, $addHeader);
}

$reDir = "./thankyou.php";
F_script('', "parent.location.href='{$reDir}'; window.location.replace('about:blank');");
exit();
