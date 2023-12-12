<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
    $pdo=new PDO($connect, USER, PASS);
    
    if(!empty($_POST)){
        //カテゴリDBからカテゴリIDを取ってくる
        // $sql=$pdo->prepare('select Products.category_id FROM Products INNER JOIN Categories ON Products.category_id = Categories.category_id where category_name =?');
        // $sql->execute([$_POST['category_name']]);
        // $row = $sql->fetch(PDO::FETCH_ASSOC);
        // $category_id1 = $row['category_id'];

        // $category_id1=$pdo->prepare('select Products.product_id FROM Products INNER JOIN Categories ON Products.category_id = Categories.category_id where category_name =?');
        // $category_id1->execute([$_POST['category_name']]);

        // カテゴリIDが取得できない場合は新しく挿入し、再度取得
        // if ($sql->rowCount() == 0) {
        //     $pdo->prepare('insert into Categories (category_name) values (?)')->execute([$_POST['category_name']]);
        //     $category_id1->execute([$_POST['category_name']]);

        //     $sql=$pdo->prepare('select Products.product_id FROM Products INNER JOIN Categories ON Products.category_id = Categories.category_id where category_name =?');
        //     $sql->execute([$_POST['category_name']]);
        //     $row = $sql->fetch(PDO::FETCH_ASSOC);
        //     $category_id1 = $row['category_id'];
        // }

        //$product_id = intval($_POST['product_id']);
        
        //productDBをupdate
        $update_stmt=$pdo->prepare('update Products set product_name=?,price=?,image_pass=?,product_description=?,category_id=? where product_id=?');
        $update_stmt->execute([$_POST['product_name'], $_POST['price'],$_POST['image_pass'],$_POST['product_description'],$_POST['category_id'],$_POST['product_id']]);
        header("Location: shouhin-list.php");
        exit;
    }
?>