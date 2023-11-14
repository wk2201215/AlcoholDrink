<?php require 'db-connect.php';?>
<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
    $id=$name=$password=$zipcode=$address=$tel=$mail=$birthdate=$login=$idcard='';
    if(isset($_SESSION['customer'])){
        $accountid=$_SESSION['customer']['id'];
        $name=$_SESSION['customer']['name'];
        $password=$_SESSION['customer']['password'];
        $zipcode=$_SESSION['customer']['zipcode'];
        $address=$_SESSION['customer']['address'];
        $telephonenumber=$_SESSION['customer']['tel'];
        $mailadores=$_SESSION['customer']['mail'];
        $birthdate=$_SESSION['customer']['birthdate'];
        $identificationcard=$_SESSION['customer']['idcard'];
    }
    echo '<form action="costomer-output.php" method="post">';
    echo '<table>';
    echo '<tr><td>アカウントID</td><td><br>';
    echo '<input type="text" name="id"  value="', $id, '" >';
    echo '</td></tr>';
    echo '<tr><td>氏名</td><td><br>';
    echo '<input type="text" name="name"  value="', $name, '" >';
    echo '</td></tr>';
    echo '<tr><td>パスワード</td><td><br>';
    echo '<input type="password" name="password"  value="', $password, '" >';
    echo '</td></tr>';
    echo '<tr><td>郵便番号</td><td><br>';
    echo '<input type="text" name="zipcode"  value="', $zipcode, '" >';
    echo '</td></tr>';
    echo '<tr><td>住所</td><td><br>';
    echo '<input type="text" name="address"  value="', $address, '" >';
    echo '</td></tr>';
    echo '<tr><td>電話番号</td><td><br>';
    echo '<input type="text" name="tel"  value="', $tel, '" >';
    echo '</td></tr>';
    echo '<tr><td>メールアドレス</td><td><br>';
    echo '<input type="text" name="mail"  value="', $mail, '" >';
    echo '</td></tr>';
    echo '<tr><td>生年月日</td><td><br>';
    echo '<input type="text" name="dirthdate"  value="', $birthdate, '" >';
    echo '</td></tr>';
    echo '<tr><td>身分証など本人確認ができる写真をお願いします</td><td><br>';
    echo '<input type="file" accept="image/*" name="idcard"  value="', $idcard, '" >';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit"  value="登録">';
    echo '</form>';
?>
<?php require 'footer.php'; ?>