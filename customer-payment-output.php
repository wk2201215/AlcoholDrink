<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('update  Customers set customer_payment=? where customer_id=?');
    $id=$_SESSION['customer']['id'];
        $sql->execute([
            $_POST['p'],
            $id]);
    echo '<p>支払い方法を変更しました。</p>';
    echo '<p>支払い方法</p>';
    echo $_POST['p'];
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>