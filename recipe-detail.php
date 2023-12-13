<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0014;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="hero-body py-5">

<?php $recipe_id=$_GET['recipe_id']; ?>
<?php require 'recipe-show.php'; ?>


</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>