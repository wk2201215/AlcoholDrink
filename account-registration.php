<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/account-registration.css">
    <title>アカウント情報登録</title>
</head>
<body>
<?php
    $accountId=$name=$password=$Zipcode=$address=$telephonenumber=$mailadores=$birthdate=$login=$Identificationcard='';
    if(isset($_SESSION['customer'])){
        $accountId=$_SESSION['customer']['accountId'];
        $name=$_SESSION['customer']['name'];
        $password=$_SESSION['customer']['password'];
        $Zipcode=$_SESSION['customer']['Zipcode'];
        $address=$_SESSION['customer']['address'];
        $telephonenumber=$_SESSION['customer']['telephonenumber'];
        $mailadores=$_SESSION['customer']['mailadores'];
        $birthdate=$_SESSION['customer']['birthdate'];
        $Identificationcard=$_SESSION['customer']['Identificationcard'];
    }
    echo '<form action="account-registration-output" method="post">';
    echo '<table>';
    echo '<tr><td>アカウントID</td><td><br>';
    echo '<input type="text" name="name"  value="', $accountId, '" >';
    echo '</td></tr>';
    echo '<tr><td>氏名</td><td><br>';
    echo '<input type="text" name="name"  value="', $name, '" >';
    echo '</td></tr>';
    echo '<tr><td>パスワード</td><td><br>';
    echo '<input type="password" name="password"  value="', $password, '" >';
    echo '</td></tr>';
    echo '<tr><td>郵便番号</td><td><br>';
    echo '<input type="text" name="address"  value="', $Zipcode, '" >';
    echo '</td></tr>';
    echo '<tr><td>住所</td><td><br>';
    echo '<input type="text" name="address"  value="', $address, '" >';
    echo '</td></tr>';
    echo '<tr><td>電話番号</td><td><br>';
    echo '<input type="text" name="login"  value="', $telephonenumber, '" >';
    echo '</td></tr>';
    echo '<tr><td>メールアドレス</td><td><br>';
    echo '<input type="text" name="login"  value="', $mailadores, '" >';
    echo '</td></tr>';
    echo '<tr><td>生年月日</td><td><br>';
    echo '<input type="text" name="login"  value="', $birthdate, '" >';
    echo '</td></tr>';
    echo '<tr><td>身分証など本人確認ができる写真をお願いします</td><td><br>';
    echo '<input type="text" name="login"  value="', $Identificationcard, '" >';
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit"  value="登録">';
    echo '</form>';
?>
</body>
</html>