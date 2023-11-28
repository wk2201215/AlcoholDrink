<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
if(isset($_SESSION['customer'])) {
    unset($_SESSION['customer']);
    echo 'ログアウトしました。';
}else{
    echo 'すでにログアウトしています。';
}
?>
<button type="button" onclick="location.href='login-input.php'">ログイン画面へ</button>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>