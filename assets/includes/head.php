<?php
require_once 'pdo.php';
require_once 'pdo2.php';

session_start();
$script_name = $_SERVER['SCRIPT_NAME'];
$pattern = "~(/index\.php|/)$~";
$name = '';

if (preg_match($pattern, $script_name)) {
    $name = "index.php";
}


if ($pdo->getFileBaseNameURL() != "login.php" && $pdo->getFileBaseNameURL() != "guard_registration.php" && $pdo->getFileBaseNameURL() != "index.php" && $name != "index.php"
) {
    if (!isset($_SESSION["guardmark_username"])) {
        header("location:login.php");
    }
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("location:login.php");
}


?>


<head>
    <title>CMS - GuardMark</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="MobileOptimized" content="320">
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.css">

    <link rel="stylesheet" href="assets/css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/nice-select.css">
    <?php 
    $settings = $pdo->read("settings");
    ?>
    <?php 
    if ($settings[0]['theme'] == "dark") {
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/fonts_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/bootstrap_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/font-aws_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/icon-fonts_dark.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/dark/style_dark.css">



    <style>
    .select2-dropdown {
        background-color: black !important;
    }
    </style>

    <?php } else  if ($settings[0]['theme'] == "light"){ ?>
    <link rel="stylesheet" type="text/css" href="assets/css/themes/light_white/fonts_light_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/light_white/bootstrap_light_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/light_white/font-aws_light_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/light_white/icon-fonts_light_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/light_white/style_light_white.css">
    <style>
    .select2-dropdown {
        background-color: white !important;
    }
    </style>
    <?php } else if($settings[0]['theme'] == 'full_white') { ?>
    <link rel="stylesheet" type="text/css" href="assets/css/themes/full_white/fonts_full_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/full_white/bootstrap_full_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/full_white/font-aws_full_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/full_white/icon-fa_full_white.css">
    <link rel="stylesheet" type="text/css" href="assets/css/themes/full_white/style_full_white.css">
    <style>
    .select2-dropdown {
        background-color: white !important;
    }
    </style>
    <?php } ?>
    <link rel="shortcut icon" type="image/png" href="assets/guardmark/images/rap-icon.png">
    <link rel="stylesheet" id="theme-change" type="text/css" href="#">
    <link rel="stylesheet" href="assets/css/selectorCustom.css" />

    <?php if ($pdo->getFileBaseNameURL() == "login.php" || $pdo->getFileBaseNameURL() == "index.php" || $name == "index.php") {
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/auth.css">

    <?php } ?>

</head>