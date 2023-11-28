<?php session_start();?>
<?php require 'db-connect.php';?>
<?php require 'header.php';?>
<?php require 'header-menu.php'; ?>
<?php
unset($_SESSION['customer']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Customers where login_id=?');
// $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
$sql->execute([$_POST['login_id']]);
// var_dump($_POST);
// $k=$sql->fetchAll();
// var_dump($k);
foreach ($sql as $row){
    // echo 1;
    // $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
    // echo $pass;
    if(password_verify($_POST['password'],$row['customer_password'])){
        // echo '1';
        $_SESSION['customer']=[
            'id'=>$row['customer_id'],
            'login_id'=>$row['login_id'],
            'name'=>$row['customer_name'],
            'password'=>$row['customer_password'],
            'postcode'=>$row['postcode'],
            'address'=>$row['address'],
            'tel'=>$row['telephone'],
            'mail'=>$row['mail'],
            'birth'=>$row['birth'],
            'payment'=>$row['customer_payment']
        ];
    }
}
// var_dump($_SESSION);
if(isset($_SESSION['customer'])){
    echo 'いらっしゃいませ、', $_SESSION['customer']['name'], 'さん。';
    // echo '<button type="button" onclick="location.href='top.php'">トtop.phpップページへ</button>';
    // var_dump($_SESSION['customer']['id']);
}else{
    echo 'ログイン名またはパスワードが違います。';
    echo'<button type="button" onclick=history.back()>戻る</button>';
    // echo $pass;
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php';?>