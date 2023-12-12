<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0011;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="displaycenter">
<div class="has-text-centered" style="width:100%;">
<?php
if(isset($_SESSION['customer'])) {
    unset($_SESSION['customer']);
    echo '<p class="block title is-5">ログアウトしました。</p>';
}else{
    echo '<p class="block title is-5">すでにログアウトしています。</p>';
}
?>
<button type="button" class="button" onclick="location.href='login-input.php'">ログイン画面へ</button>
</div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>