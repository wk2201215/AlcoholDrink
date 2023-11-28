<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
if(isset($_SESSION['customer'])){
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('insert into Purchase values(null,?)');
    // var_dump($_SESSION['customer']['id']);
    $sql->execute([$_SESSION['customer']['id']]); 
    $last_id = $pdo->lastInsertId();
    $sql2=$pdo->prepare('insert into Purchase_detail values(?,?,?)');
    foreach($_SESSION['product'] as $id=>$product){
        // $sql2=$pdo->prepare('insert into Purchase_detail values(?,?,?)');
        $sql2->execute([$last_id, $id, $product['count']]);
        unset($_SESSION['product'][$id]);
    }
} 
?>
<p>購入手続きが完了しました。ありがとうございます。
<?php require 'footer.php'; ?>