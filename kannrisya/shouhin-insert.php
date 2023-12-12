<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
      $pdo=new PDO($connect, USER, PASS);
    
    // POSTに値が存在する場合、データベースに登録
      if(!empty($_POST)) {

        //商品DBにinsert
        $sql=$pdo->prepare('insert into Products(product_name,image_pass,price,product_description,category_id,discount)
                      values (?,?,?,?,?,?)');
        $sql->execute([$_POST['product_name'],$_POST['image_pass'],$_POST['price'],$_POST['description'],$_POST['category_id'],$_POST['discount']]);
        // 直前に挿入された商品のIDを取得
        $last_product_id = $pdo->lastInsertId();

        //knowledge_productsDBにinsert
        // $sql=$pdo->prepare('insert into Knowledge_products(product_id,knowledge_id)
        //               values (?,?)');
        // $sql->execute([$last_product_id,$category_id]);

        header("Location: shouhin-list.php");
        exit;
    
      }
?>

