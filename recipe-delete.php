<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$pdo=new PDO($connect, USER, PASS);
$recipe_id=$_GET['recipe_id'];
$sql=$pdo->prepare('delete from Recipe_ingredients where recipe_id=?') ;
$sql->execute([$recipe_id]) ;
$sql=$pdo->prepare('delete from Recipe_cooking where recipe_id=?') ;
$sql->execute([$recipe_id]) ;
$sql=$pdo->prepare('delete from Recipes where recipe_id=?') ;
$sql->execute([$recipe_id]) ;
session_write_close();
header('Location:recipe-top.php');
exit();
?>