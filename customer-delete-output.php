<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
    if(isset($_POST['k'])){
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('delete from Customers where customer_id=? limit 1');
        $id=$_SESSION['customer']['id'];
        $sql->execute([$id]);
        unset($_SESSION['customer']);
        echo 'アカウントの削除が完了しました。';
    }else{
        echo 'チェックがされていません';
    }
?>
<button type="button" onclick="location.href='login-input.php'">ログイン画面へ</button>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>