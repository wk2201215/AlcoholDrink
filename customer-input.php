<?php session_start(); ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="hero-body py-5">
<?php
    $login_id=$name=$password=$postcode=$address=$tel=$mail=$birth='';
    $b='登録';
    if(isset($_SESSION['customer'])){
        $login_id=$_SESSION['customer']['login_id'];
        $name=$_SESSION['customer']['name'];
        $password=$_SESSION['customer']['password'];
        $postcode=$_SESSION['customer']['postcode'];
        $address=$_SESSION['customer']['address'];
        $tel=$_SESSION['customer']['tel'];
        $mail=$_SESSION['customer']['mail'];
        $birth=$_SESSION['customer']['birth'];
        $b='変更';
        // $idcard=$_SESSION['customer']['idcard'];
    }
    echo '<form action="customer-output.php" method="post" enctype="multipart/form-data">';

    echo '<div class="field">';
    echo '<label class="label">アカウントID</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="login_id"  value="', $login_id, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">氏名</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="name"  value="', $name, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">パスワード</label>';
    echo '<div class="control">';
    echo '<input class="input" type="password" name="password"  value="', $password, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">郵便番号</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="postcode"  value="', $postcode, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">住所</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="address"  value="', $address, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">電話番号</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="tel"  value="', $tel, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">メールアドレス</label>';
    echo '<div class="control">';
    echo '<input class="input" type="text" name="mail"  value="', $mail, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">生年月日</label>';
    echo '<div class="control">';
    echo '<input class="input" type="date" name="birth"  value="', $birth, '" required>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<label class="label">身分証など本人確認ができる写真をお願いします</label>';
    echo '<div class="file is-boxed image has-name is-fullwidth">';
    echo '<label class="file-label">';
    if(isset($_SESSION['customer'])){
        echo '<input class="file-input" type="file" accept="image/*" name="idcard" @change="onImageUploaded">';
        echo '<span class="file-cta">';
        echo '<span class="file-icon"><i class="fas fa-upload"></i></span>';
        echo '<span class="file-label has-text-centered">写真を変更する</span>';
        echo '</span>';
    }else{
        echo '<input class="file-input" type="file" accept="image/*" name="idcard" @change="onImageUploaded" required>';
        echo '<span class="file-cta">';
        echo '<span class="file-icon"><i class="fas fa-upload"></i></span>';
        echo '<span class="file-label has-text-centered">写真をのせる</span>';
        echo '</span>';
    }
    echo '<span class="file-name has-text-centered">{{ image_name }}</span>';
    echo '</label>';
    echo '</div></div>';

    echo '<div class="field">';
    echo '<div class="contro">';
    echo '<input class="button is-primary is-medium mt-4" type="submit" value="',$b,'" style="width:100%;">';
    echo '</div></div>';
    echo '</form>';
?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>