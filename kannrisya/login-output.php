<?php session_start(); ?>
<?php require '../db-connect.php'; ?>

<?php
unset($_SESSION['control']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from control where login=? and password=?');
$sql->execute([$_POST['name'],$_POST['password']])
foreach($sql as $row){
    $_SESSION['control'] = [
        'id'=>$row['id'],'name'=>$row['name'],'login'=>$row['login'],'password'=>$row['password']
    ];
}
if(isset($_SESSION['control'])){
    header("Location: start.html");
    exit;
}else{
    header("Location: login-input.php");
    exit;
}
?>