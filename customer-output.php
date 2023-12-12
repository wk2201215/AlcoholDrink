<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php
$pdo=new PDO($connect,USER,PASS);
$pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
$uploaddir = 'images/customer/';
if(isset($_SESSION['customer'])){
    $id=$_SESSION['customer']['id'];
    $sql=$pdo->prepare('select * from Customers where customer_id!=? and login_id=?');
    $sql->execute([$id,$_POST['login_id']]);
}else{
    $sql=$pdo->prepare('select * from Customers where login_id=?');
    $sql->execute([$_POST['login_id']]);
}
if(empty($sql->fetchAll())) {
    echo '<div class="hero-body py-5">';
    if(isset($_SESSION['customer'])){
        $sql2=$pdo->prepare('update Customers set login_id=?, 
        customer_name=?, customer_password=?, postcode=?, address=?, 
        telephone=?, mail=?, birth=? where customer_id=?');
        $sql2->execute([
            $_POST['login_id'],$_POST['name'],
            $pass,$_POST['postcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['birth'],
            $_SESSION['customer']['id']]);
        if(!empty($_FILES['idcard'])){
            $str=$_FILES['idcard']['name'];
            $path_parts = pathinfo($str);
            $random_name = uniqid(mt_rand());
            $image_name = $random_name . '.' . $path_parts['extension'];
            $uploadfile = $uploaddir . $image_name;
            $sql3=$pdo->prepare('update Customers set identification_image_pass = ? where customer_id = ?');
            $sql3->execute([$image_name,$id]);
            if (move_uploaded_file($_FILES['idcard']['tmp_name'], $uploadfile)) {
                echo "<p>画像は正常にアップロードされました。</p>";
              } else {
                echo "<p>画像のアップロードができませんでした</p>";
            }
        }
            echo '<label class="label">お客様情報を更新しました。</label>';
    } else {
        //ファイル名をユニーク化
        $str=$_FILES['idcard']['name'];
        $path_parts = pathinfo($str);
        $random_name = uniqid(mt_rand());
        $image_name = $random_name . '.' . $path_parts['extension'];
        $uploadfile = $uploaddir . $image_name;
        //imagesディレクトリにファイル保存
        if (move_uploaded_file($_FILES['idcard']['tmp_name'], $uploadfile)) {
            echo "<p>画像は正常にアップロードされました。</p>";
          } else {
            echo "<p>画像のアップロードができませんでした</p>";
          }
        $sql4=$pdo->prepare('insert into Customers value(null,?,?,?,?,?,?,?,?,?,null,null,default,null,null,default)');
        $sql4->execute([
            $_POST['login_id'],$_POST['name'],
            $pass,$_POST['postcode'],
            $_POST['address'],$_POST['tel'],
            $_POST['mail'],$_POST['birth'],
            $image_name]);
        echo '<label class="label">アカウントの登録が完了しました。</label>';
    }
    unset($_SESSION['customer']);

    $sql5=$pdo->prepare('select * from Customers where login_id=?');
    $sql5->execute([$_POST['login_id']]);
    foreach($sql5 as $row) {
        $_SESSION['customer']=[
            'id'=>$row['customer_id'],
            'login_id'=>$row['login_id'],
            'name'=>$row['customer_name'],
            'password'=>$_POST['password'],
            'postcode'=>$row['postcode'],
            'address'=>$row['address'],
            'tel'=>$row['telephone'],
            'mail'=>$row['mail'],
            'birth'=>$row['birth'],
            'payment'=>$row['payment_id']
        ];

        echo '<div class="box">';
        echo '<div class="field">';
        echo '<table id="customer_table" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
        echo '<tbody id="customer_tbody">';

        echo '<tr class="customer_item">';
        echo '<th>アカウントID</th>';
        echo '<td>',$row['login_id'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>氏名</th>';
        echo '<td>',$row['customer_name'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>パスワード</th>';
        echo '<td>',$_POST['password'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>郵便番号</th>';
        echo '<td>',$row['postcode'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>住所</th>';
        echo '<td>',$row['address'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>電話番号</th>';
        echo '<td>',$row['telephone'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>メールアドレス</th>';
        echo '<td>',$row['mail'],'</td>';
        echo '</tr>';

        echo '<tr class="customer_item">';
        echo '<th>生年月日</th>';
        echo '<td>',$row['birth'],'</td>';
        echo '</tr>';

        echo '</tbody>';
        echo '</table>';
        echo '</div>';

        echo '<div class="field">';
        echo '<label class="label">証明写真</label>';
        echo '<div class="control image is-fullwidth has-background-info-light">';
        echo '<img src="images/customer/',$row['identification_image_pass'],'" alt="image" class="mx-auto" style="max-height:20vh;width:auto;">';
        echo '</div></div>';
        echo '</div>';
    }
echo '</div>';
//いる場合
} else {
    echo '<div class="displaycenter"><div class="has-text-centered" style="width:85%;">';
    echo '<label class="label">ログイン名が既に使用されていますので、変更してください。</label>';
    echo '<button class="button" onclick="history.back()">戻る</button>';
    echo '</div></div>';
}
?>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>]
