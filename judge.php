<?php
if(!isset($_SESSION['customer'])){
    header('Location:login-input.php?hogeA=ログインしてください。');
}else{
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('select * from Customers where customer_id=?') ;
    $sql->execute([$_SESSION['customer']['id']]);
    $judge=$sql->fetchAll();
    if($judge[0]['delete_flag']==1){
        unset($_SESSION['customer']);
        header('Location:login-input.php?hogeA=このアカウントは削除されています。');
    }
}
?>