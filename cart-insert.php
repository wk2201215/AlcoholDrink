<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php
$product_id=$_POST['id'];
$pdo=new PDO($connect,USER,PASS);
$sql=$pdo->prepare('select * from Carts where customer_id=? and product_id=?');
$sql->execute([$_SESSION['customer']['id'],$product_id]);
$cart=$sql->fetchAll();
if(!empty($cart)){
    $sql=$pdo->prepare('update Carts set cart_quantity=? where customer_id=? and product_id=?');
    $sql->execute([$cart['cart_quantity']+$_POST['count'],$_SESSION['customer']['id'],$product_id]);
}else{
    $sql2=$pdo->prepare('insert into Carts values(?,?,?)');
    $sql2->execute([$_SESSION['customer']['id'],$product_id,$_POST['count']]);
}
header('Location:cart-show.php');
exit();
?>
<?php require 'footer.php'; ?>