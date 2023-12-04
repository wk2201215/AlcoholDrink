<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
    if(isset($_POST['k'])){
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('update Customers set delete_flag=1 where customer_id=?');
        $id=$_SESSION['customer']['id'];
        $sql->execute([$id]);
        unset($_SESSION['customer']);
        header('Location:login-input.php');
        exit();
    }else{
        unset($_SESSION['customer']);
        header('Location:login-input.php');
        exit();
    }
?>
