<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0005;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="displaycenter">
    <div style="width:85%;">
<?php
    $pdo=new PDO($connect,USER,PASS);
    $sql=$pdo->prepare('update Customers set payment_id=? where customer_id=?');
    $sql->execute([$_POST['p'],$_SESSION['customer']['id']]);
    $sql2=$pdo->prepare('select * from Payments where payment_id=?');
    $sql2->execute([$_POST['p']]);
    $result=$sql2->fetch();
    $_SESSION['customer']['payment']=$result['payment_name'];
    echo '<p class="block title is-4">支払い方法を変更しました。</p>';
    echo '<label class="label">登録された支払い方法</label>';
    echo '<div class="box">';
    echo '<p>',$_SESSION['customer']['payment'],'</p>';
    echo '</div>';
?>
</div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>