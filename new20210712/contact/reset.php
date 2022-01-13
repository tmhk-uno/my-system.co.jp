<?php
include dirname(__FILE__)."/config.php";

unset($_SESSION['af']);
unset($_SESSION['errMsg']);
$_SESSION["first_inquiry"] = "";
$_SESSION["second_inquiry"] = "";
$_SESSION["third_inquiry"] = "";

header('Location:./');
?>