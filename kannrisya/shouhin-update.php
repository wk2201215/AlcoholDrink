<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
    $pdo=new PDO($connect, USER, PASS);
    
    if(!empty($_POST)){
        
        //productDBをupdate
        $update_stmt=$pdo->prepare('update Products set product_name=?,price=?,image_pass=?,product_description=?,category_id=?,discount=? where product_id=?');
        $update_stmt->execute([$_POST['product_name'], $_POST['price'],$_POST['image_pass'],$_POST['product_description'],$_POST['category_id'],$_POST['discount'],$_POST['product_id']]);
        header("Location: shouhin-list.php");
        exit;
    }
?>