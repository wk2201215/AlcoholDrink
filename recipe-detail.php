<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<div class="hero-body py-5">

<?php $recipe_id=$_GET['recipe_id']; ?>
<?php require 'recipe-show.php'; ?>


</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>