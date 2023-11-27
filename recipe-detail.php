<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php $recipe_id=$_GET['recipe_id']; ?>
<?php require 'recipe-show.php'; ?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>