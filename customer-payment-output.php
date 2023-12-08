<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="displaycenter">
    <div style="width:85%;">
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('update Customers set payment_id=? where customer_id=?');
    $sql->execute([$_POST['p'],$_SESSION['customer']['id']]);
    $_SESSION['customer']=['payment'=>$_POST['p']];
    echo '<p class="block title is-4">支払い方法を変更しました。</p>';
    $sql=$pdo->prepare('SELECT payment_name	FROM Payments where payment_id = ?');
    $sql->execute([$_SESSION['customer']['payment']]);
    $result=$sql->fetch();
    echo '<label class="label">登録された支払い方法</label>';
    echo '<div class="box">';
    echo '<p>',$result['payment_name'],'</p>';
    echo '</div>';
?>
</div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>