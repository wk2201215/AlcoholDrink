<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
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
    echo '<form action="costomer-output.php" method="post" enctype="multipart/form-data" class="">';
    echo '<div class="field">';
    echo '<label class="label">アカウントID</label>';
    echo '<div class="control">';
    echo '<input type="text" name="login_id" class="input" value="', $login_id, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">氏名</label>';
    echo '<div class="control">';
    echo '<input type="text" name="name" class="input" value="', $name, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">パスワード</label>';
    echo '<div class="control">';
    echo '<input type="password" name="password" class="input" value="', $password, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">郵便番号</label>';
    echo '<div class="control">';
    echo '<input type="text" name="postcode" class="input" value="', $postcode, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">住所</label>';
    echo '<div class="control">';
    echo '<input type="text" name="address" class="input" value="', $address, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">電話番号</label>';
    echo '<div class="control">';
    echo '<input type="text" name="tel" class="input" value="', $tel, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">メールアドレス</label>';
    echo '<div class="control">';
    echo '<input type="text" name="mail" class="input" value="', $mail, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">生年月日</label>';
    echo '<div class="control">';
    echo '<input type="date" name="dirth" class="input" value="', $birth, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label" style="font-size: 0.96rem;">身分証など本人確認ができる写真をお願いします</label>';
    echo '<div class="control my-5">';
    echo '<input type="file" accept="image/*" class="" name="idcard" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<input type="submit" class="button is-primary is-medium is-fullwidth" value="登録">';
    echo '</div>';
    echo '</form>';
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>