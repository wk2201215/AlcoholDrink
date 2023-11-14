<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
if(isset($_SESSION['customer'])){
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from Customers where id!=? and login=?');
    $sql->execute([$id,$_POST['login']]);
}else{
    $sql=$pdo->prepare('select * from Customers where login=?');
    $sql->execute([$_POST['login']]);
}
if(empty($sql->fetchAll())) {
    if(isset($_SESSION['customer'])){
        $sql=$pdo->prepare('update  Customers set login_id 
        customer_name customer_password postcode address 
        telephone mail birth where id=?');
        $sql->execute([
            $_POST['id'],$_POST['name'],
            $_POST['password'],$_POST['zipcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['dirthdate'],
            $id]);
        $_SESSION['customer']=[
            'id'=>$id, 'name'=>$_POST['name'],
            'password'=>$_POST['password'], 
            'zipcode'=>$_POST['zipcode'],
            'address'=>$_POST['address'], 
            'tel'=>$_POST['tel'],'mail'=>$_POST['mail'],
            'dirthdate'=>$_POST['dirthdate'],
            'login'=>$_POST['login']];
            echo 'お客様情報を更新しました。';
    } else {
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $sql=$pdo->prepare('insert into Customer value(null,?,?,?,?,?,?,?,?,?,null,null,null,null,null)');
        $sql->execute([
            $_POST['id'],$_POST['name'],
            $_POST['password'],$_POST['zipcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['dirthdate']]);
        echo 'お客様情報を登録しました。';
    }
} else {
    echo 'ログイン名が既に使用されていますので、変更してください。';
}
?>
<?php require 'footer.php'; ?>

