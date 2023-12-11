<?php session_start(); ?>
<?php require 'db-connect.php';?>
<?php
unset($_SESSION['customer']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Customers where login_id=?');
$sql->execute([$_POST['login_id']]);
foreach($sql as $row) {
    if(password_verify($_POST['password'],$row['customer_password'])){
        $sql2=$pdo->prepare('select * from Payments where payment_id=?');
        $sql2->execute([$row['payment_id']]);
        $result=$sql2->fetch();
        $_SESSION['customer']=[
            'id'=>$row['customer_id'],
            'login_id'=>$row['login_id'],
            'name'=>$row['customer_name'],
            'password'=>$_POST['password'],
            'postcode'=>$row['postcode'],
            'address'=>$row['address'],
            'tel'=>$row['telephone'],
            'mail'=>$row['mail'],
            'birth'=>$row['birth'],
            'payment'=>$result['payment_name']
        ];
    }
}
if(isset($_SESSION['customer'])){
header('Location:top.php');
exit();    
}else{
header('Location:login-input.php?hogeA=ログイン名またはパスワードが違います');
exit();
}
?>
