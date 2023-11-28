<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$id=$_POST['id'];
// var_dump($_POST);
if(!isset($_SESSION['product'])){
    $_SESSION['product']=[];
}
$count=0;
if(isset($_SESSION['product'][$id])){
    $count=$_SESSION['product'][$id]['count'];
}
$_SESSION['product'][$id]=[
    'name'=>$_POST['name'],
    'price'=>$_POST['price'],
    'count'=>$count+$_POST['count']
];
echo '<br>';
// var_dump($_SESSION);
echo '<p>カートに商品を追加しました。</p>';
echo '<hr>';
require 'cart.php';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>