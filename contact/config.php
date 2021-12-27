<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $redirect");
}

session_start();

$admin_email = "info@my-system.co.jp";
$admin_name = "株式会社マイ・システム";

$recaptcha_client = "6LfHRiUTAAAAAC_oyxUpYdmNlYIu_rQMRmAD5Y_W";
$recaptcha_server = "6LfHRiUTAAAAAAi7IwX7xJ8cXhuyzByETo8-SywH";

function check_input_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function getCSRFToken() {
    $nonce = generateStringFromLength(64);
    if (empty($_SESSION['csrf_tokens'])) {
        $_SESSION['csrf_tokens'] = array();
    }
    $_SESSION['csrf_tokens'][$nonce] = true;
    return $nonce;
}
function validateCSRFToken($token) {
    if (isset($_SESSION['csrf_tokens'][$token])) {
        unset($_SESSION['csrf_tokens'][$token]);
        return true;
    }
    return false;
}
function generateStringFromLength($length) {  
    $characters  = "0123456789";  
    $characters .= "abcdefghijklmnopqrstuvwxyz";  
    $characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";  
      
    $string_generated = "";  
      
    while ($length != strlen($string_generated))  
    {  
        
        $string_generated = "";
        $nmr_loops = $length;  
        while ($nmr_loops--)  
        {  
            $string_generated .= $characters[mt_rand(0, strlen($characters)-1)];  
        }  
    }

    return $string_generated;  
}
function F_script($val, $linkVal, $charset="UTF-8") {
    $rtnVal = "";
    if ( $val != "" || $linkVal != "" )
    {
        $rtnVal = "<meta http-equiv=\"content-type\" content=\"text/html; charset={$charset}\" />" . chr(13) . chr(10)
        . "<script type=\"text/javascript\">" . chr(13) . chr(10);

        if ($val != "") { $rtnVal .= "alert(\"{$val}\");" . chr(13) . chr(10); }
        if ($linkVal != "") { $rtnVal .= $linkVal . chr(13) . chr(10); }

        $rtnVal .= "</script>";
    }
    echo($rtnVal);
    exit();
}
function check_email_address($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    else {
        return true;
    }
}
function getSslPage($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    // curl_setopt($ch, CURLOPT_HEADER, false);
    // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    // curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
// json_encode()関数が存在しないなら
if (!function_exists('json_encode')) {
    // JSON.phpを読み込んで
    require_once 'JSON.php';
    // json_encode()関数を定義する
    function json_encode($value) {
        $s = new Services_JSON();
        return $s->encodeUnsafe($value);
    }
    // json_decode()関数を定義する
    function json_decode($json, $assoc = false) {
        $s = new Services_JSON($assoc ? SERVICES_JSON_LOOSE_TYPE : 0);
        return $s->decode($json);
    }
}
// 以降、json_encode(), json_decode() が使用可能
?>