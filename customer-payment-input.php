<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu-back.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0004;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<?php
    echo '<div class="hero-body py-5">';
    $pdo=new PDO($connect, USER, PASS);
    //現在の支払い方法
    echo '<label class="label">現在の支払い方法</label>';
    echo '<div class="box">';
    echo '<p>',$_SESSION['customer']['payment'],'</p>';
    echo '</div>';

    //支払い方法変更
    $sql=$pdo->query('SELECT * FROM Payments');
    echo '<label class="label">支払い方法変更</label>';
    echo '<form method="post" action="customer-payment-output.php">';

    echo '<ul class="field box payment_ul">';
    foreach($sql as $row){
    echo '<li class="control has-icons-left has-icons-right">';
    echo '<label class="input" for="',$row['payment_name'],'" >',$row['payment_name'],'</label>';
    echo '<span class="icon is-left">';
    echo '<i class="fas fa-chevron-circle-right"></i>';
    echo '</span>';
    echo '<span class="icon is-right">';
    echo '<input type="radio" name="p" value="',$row['payment_id'],'" id="',$row['payment_name'],'" required>';
    echo '</span>';
    echo '</li>';
    }
    echo '</ul>';

    echo '<div class="field has-text-right">';
    echo '<button type="submit" class="button is-warning" style="background-color:#ffce5d";>支払い方法変更</button>';
    echo '</div>';
    echo '</form>';
    echo '</div>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>