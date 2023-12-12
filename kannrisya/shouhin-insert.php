<?php require '../db-connect.php'; ?>
<?php
    //処理のみ
      $pdo=new PDO($connect, USER, PASS);
    
    // POSTに値が存在する場合、データベースに登録
      if(!empty($_POST)) {

        //カテゴリがあったらidを返したい
        //なければカテゴリ名をカテゴリDBに挿入してidを返したい
        // $sql=$pdo->prepare('select category_id FROM Categories where category_name=?');
        // $sql->execute([$_POST['categori_name']]);
        // $row = $sql->fetch(PDO::FETCH_ASSOC);
        // $category_id = $row['category_id'];


        //商品DBにinsert
        $sql=$pdo->prepare('insert into Products(product_name,image_pass,price,product_description,category_id)
                      values (?,?,?,?,?)');
        $sql->execute([$_POST['product_name'],$_POST['image_pass'],$_POST['price'],$_POST['description'],$_POST['category_id']]);
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

