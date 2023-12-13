<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0013;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="displaycenter">
    <div style="width:85%;">
        <label class="title">購入を確定しました</label>
    </div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>