<?php require 'db-connect.php';?>
<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'menu.php'; ?>
<?php
    $login_id=$name=$password=$postcode=$address=$tel=$mail=$birth=$idcard='';
    if(isset($_SESSION['customer'])){
        $login_id=$_SESSION['customer']['login_id'];
        $name=$_SESSION['customer']['name'];
        $password=$_SESSION['customer']['password'];
        $postcode=$_SESSION['customer']['postcode'];
        $address=$_SESSION['customer']['address'];
        $tel=$_SESSION['customer']['tel'];
        $mail=$_SESSION['customer']['mail'];
        $birth=$_SESSION['customer']['birth'];
        $idcard=$_SESSION['customer']['idcard'];
    }
    echo '<form action="costomer-output.php" method="post">';
    echo '<table>';
    echo '<tr><td>アカウントID</td><td><br>';
    echo '<input type="text" name="login_id"  value="', $login_id, '" >';
    echo '</td></tr>';
    echo '<tr><td>氏名</td><td><br>';
    echo '<input type="text" name="name"  value="', $name, '" >';
    echo '</td></tr>';
    echo '<tr><td>パスワード</td><td><br>';
    echo '<input type="password" name="password"  value="', $password, '" >';
    echo '</td></tr>';
    echo '<tr><td>郵便番号</td><td><br>';
    echo '<input type="text" name="postcode"  value="', $postcode, '" >';
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
    echo '<input type="date" name="dirth"  value="', $birth, '" >';
    echo '</td></tr>';
    echo '<tr><td>身分証など本人確認ができる写真をお願いします</td><td><br>';
    echo '<input type="file" accept="image/*" name="idcard"  value="', $idcard, '" >';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit"  value="登録">';
    echo '</form>';
?>
<?php require 'footer.php'; ?>