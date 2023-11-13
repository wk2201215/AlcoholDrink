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
    // echo '<tr><td>身分証など本人確認ができる写真をお願いします</td><td><br>';
    // echo '<input type="file" accept="image/*" name="idcard"  value="', $idcard, '" >';
    try{
        $pdo=new PDO($connect,USER,PASS);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "images/$image";
        $sql = "INSERT INTO images(name) VALUES (:image)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], './images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
    if (isset($_POST['upload'])){
        echo '<p>',$message,'</p>';
        echo '<p><a href="image.php">画像表示へ</a></p>';
    }else{
        echo '<form method="post" enctype="multipart/form-data">';
            echo '<tr><td>身分証など本人確認ができる写真をお願いします</td><td><br>';
            echo '<input type="file" accept="image/*" name="idcard"  value="', $idcard, '" >';
            echo '<button><input type="submit" name="upload" value="アップロード"></button>';
        echo '</form>';
    }
    echo '</td></tr>';
    echo '</table>';
    echo '<input type="submit"  value="登録">';
    echo '</form>';
?>
<?php require 'footer.php'; ?>