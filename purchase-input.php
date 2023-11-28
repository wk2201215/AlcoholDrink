<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if(isset($_SESSION['customer'])){
if(!empty($_SESSION['product'])){
    echo '<p>お名前：',$_SESSION['customer']['name'],'</p>';
    echo '<p>ご住所：',$_SESSION['customer']['address'],'</p>';
    echo '<hr>';
    require 'cart.php';
    echo '<hr>';
    echo '<a href="purchase-output.php">購入を確定する</a>';
}else{
    echo 'カートに商品がありません。';
}
}else{
    echo 'ログインしてください。';
}
?>
<?php require 'footer.php'; ?>