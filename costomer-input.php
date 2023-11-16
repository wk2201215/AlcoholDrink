<?php require 'db-connect.php';?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録</title>
    <link rel="stylesheet" href="../css/customer-input.css">
</head>
<body>
    
<?php require 'menu.php'; ?>
<?php
    $login_id=$name=$password=$postcode=$address=$tel=$mail=$birth='';
    if(isset($_SESSION['customer'])){
        $login_id=$_SESSION['customer']['login_id'];
        $name=$_SESSION['customer']['name'];
        $password=$_SESSION['customer']['password'];
        $postcode=$_SESSION['customer']['postcode'];
        $address=$_SESSION['customer']['address'];
        $tel=$_SESSION['customer']['tel'];
        $mail=$_SESSION['customer']['mail'];
        $birth=$_SESSION['customer']['birth'];
        // $idcard=$_SESSION['customer']['idcard'];
    }

    echo '<form action="costomer-output.php" method="post">';
    echo '<div>';
    echo '<dl>';
    echo '<dt>アカウントID</dt>';
    echo '<dd><input type="text" id="id" name="id"  value="', $login_id, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>氏名</dt>';
    echo '<dd><input type="text" id="name" name="name"  value="', $name, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>パスワード</dt>';
    echo '<dd><input type="password" id="password" name="password"  value="', $password, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>郵便番号</dt>';
    echo '<dd><input type="text" id="zipcode" name="zipcode"  value="', $postcode, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>住所</dt>';
    echo '<dd><input type="text" id="address" name="address"  value="', $address, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>電話番号</dt>';
    echo '<dd><input type="text" id="tel" name="tel"  value="', $tel, '" ></dd>';
    echo'</dl>';

    echo '<dl>';
    echo '<dt>メールアドレス</dt>';
    echo '<dd><input type="text" id="mail" name="mail"  value="', $mail, '" ></dd>';
    echo '</dl>';

    echo '<dl>';
    echo '<dt>生年月日</dt>';
    echo '<dd><input type="text" id="dirthdate" name="dirthdate"  value="', $birth, '" ></dd>';
    echo '</dl>';

    echo'<dl>';
    echo '<dt>身分証など本人確認ができる写真をお願いします</dt>';
    echo '<dd><input type="file" accept="image/*" name="idcard"  value="', $idcard, '" ></dd>';
    echo '</dl>';

    
?>
<?php require 'footer.php'; ?>