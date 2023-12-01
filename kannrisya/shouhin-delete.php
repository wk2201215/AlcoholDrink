<?php require '../db-connect.php'; ?>
<?php
//処理のみ
    $pdo=new PDO($connect, USER, PASS);

    //知識と商品をつなげてるテーブル
    $delete_Knowledge_products=$pdo->prepare('delete Knowledge_products from Knowledge_products where product_id=?');
    $delete_Knowledge_products->execute([$_GET['product_id']]);

    //商品を削除
    $delete_Products=$pdo->prepare('delete Products from Products where product_id=?');
    $delete_Products->execute([$_GET['product_id']]);

    header("Location: shouhin-list.php");
    exit;
?>