<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
if(isset($_SESSION['customer'])){
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from Customers where customer_id!=? and login_id=?');
    $sql->execute([$id,$_POST['login_id']]);
}else{
    $sql=$pdo->prepare('select * from Customers where login_id=?');
    $sql->execute([$_POST['login_id']]);
}
if(empty($sql->fetchAll())) {
    if(isset($_SESSION['customer'])){
        $sql=$pdo->prepare('update  Customers set login_id=? 
        customer_name=? customer_password=? postcode=? address=? 
        telephone=? mail=? birth=? where customer_id=?');
        $sql->execute([
            $_POST['login_id'],$_POST['name'],
            $pass,$_POST['postcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['dirth'],
            $id]);
        $_SESSION['customer']=[
            'id'=>$id, 'accountid'=>$_POST['login_id'],
            'name'=>$_POST['name'],
            'password'=>$pass, 
            'zipcode'=>$_POST['postcode'],
            'address'=>$_POST['address'], 
            'tel'=>$_POST['tel'],'mail'=>$_POST['mail'],
            'dirthdate'=>$_POST['dirth'],
            'login'=>$_POST['login']];
            echo 'お客様情報を更新しました。';
    } else {
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image = 'images/'.$_FILES['idcard']['name'];
        $sql=$pdo->prepare('insert into Customers value(null,?,?,?,?,?,?,?,?,?,null,null,default,null,null,default)');
        $sql->execute([
            $_POST['login_id'],$_POST['name'],
            $pass,$_POST['postcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['dirth'],
            $image]);
            move_uploaded_file($_FILES['idcard']['tmp_name'],$image);//imagesディレクトリにファイル保存
        echo 'アカウントの登録が完了しました。';
    }
} else {
    echo 'ログイン名が既に使用されていますので、変更してください。';
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>

