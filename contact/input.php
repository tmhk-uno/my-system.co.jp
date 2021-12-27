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


// send mail -------------

$user_email = $outputData['email'];

$body = "";
$body.="\n\n";

$subject = "お問い合わせです。";

$body .= ''  ."\n";
$body .= $outputData['user_name'] . '様'  ."\n";
$body .= ''  ."\n";
$body .= 'お問い合わせ内容を受付ました。ありがとうございます。'  ."\n";
$body .= '後程担当者よりご連絡差し上げますのでお待ち下さい。'  ."\n";
$body .= ''  ."\n";
$body .= '以下の内容が送信されました。'  ."\n";
$body .= ''  ."\n";
$body .= '---------------------------------------------------------------------'  ."\n";
$body .= '■お名前：'  ."\n";
$body .= '        '  . $outputData['user_name'] . "様\n";
$body .= ''  ."\n";
$body .= '■お名前(フリガナ)：'  ."\n";
$body .= '        '  . $outputData['user_name_read'] . "\n";
$body .= ''  ."\n";
$body .= '■電話番号：'  ."\n";
$body .= '        '  . $outputData['tel'] .       "\n";
$body .= ''  ."\n";
$body .= '■メールアドレス：'  ."\n";
$body .= '        '  . $outputData['email']    .       "\n";
$body .= ''  ."\n";
$body .= '■性別：'  ."\n";
$body .= '        '  . $outputData['gender'] .       "\n";
$body .= ''  ."\n";
$body .= '■職種：'  ."\n";
$body .= '        '  . $outputData['question1'] .       "\n";
$body .= ''  ."\n";
$body .= '■お問い合わせ商材：'  ."\n";
$body .= '        '  . $outputData['question2'] .       "\n";
$body .= ''  ."\n";
$body .= '■当お問い合わせ：'  ."\n";
$body .= '        '  . $outputData['comment'] .       "\n";
$body .= ''  ."\n";
$body .= '---------------------------------------------------------------------'  ."\n";
$body .= ''  ."\n";
$body .= '株式会社マイ・システム'  ."\n";
$body .= '東京都昭島市昭和町2-7-6-501'  ."\n";
$body .= 'TEL:042-519-2224'  ."\n";
$body .= 'FAX：042-519-2225'  ."\n";
$body .= ''  ."\n";


mb_language('uni');
mb_internal_encoding("UTF-8");

if($admin_email != '') {
    $toMailaddr = $admin_email;
    $sndSubject = $subject;
    $sndMessage = $body;
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

header('Location:./thankyou.php');
exit();
?>