<?php session_start(); ?>
<?php require '../db-connect.php'; ?>
<?php
unset($_SESSION['control']);
$pdo=new PDO($connect, USER, PASS);
$sql=$pdo->prepare('select * from Administrator where dministrator_password=?');
$sql->execute([$_POST['password']]);
foreach($sql as $row){
    if(password_verify($_POST['dministrator_password'],$row['dministrator_password'])){
        $_SESSION['control'] = [
            'id'=>$row['administrator_id'],
            'name'=>$row['administrator_name'],
            'password'=>$row['dministrator_password']
        ];
    }
}
if(isset($_SESSION['control'])){
    header("Location: start.html");
    exit;
}else{
    header('Location:login-input.php?hogeA=ログイン名またはパスワードが違います');
exit();
}
?>