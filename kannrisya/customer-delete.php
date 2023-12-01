<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
    $pdo=new PDO($connect, USER, PASS);

    //顧客削除(論理削除:deleteに見せかけupdate)
    //削除した顧客データはtrue削除してないデータはfalse 1=true
    $sql=$pdo->prepare('update Customers set delete_flag = 1 where customer_id=?');
    $sql->execute([$_GET['customer_id']]);

    header("Location: customer-list.php");
    exit;
?>