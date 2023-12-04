<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="displaycenter">
    <div class="has-text-centered" style="width:85%;">
<?php
    if(isset($_POST['k'])){
        $pdo=new PDO($connect,USER,PASS);
        $sql=$pdo->prepare('update Customers set delete_flag=1 where customer_id=?');
        $id=$_SESSION['customer']['id'];
        $sql->execute([$id]);
        unset($_SESSION['customer']);
        echo '<label class="label">アカウントの削除が完了しました。</label>';
    }else{
        echo '<label class="label">アカウントが削除できませんでした。</label>';
    }
?>
    <button class="button" type="button" onclick="location.href='login-input.php'">ログイン画面へ</button>
    </div>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>