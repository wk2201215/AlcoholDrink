<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    $id=$_SESSION['customer']['id'];
    if(!empty($_POST)) {
      //画像処理
        $uploaddir = 'images/cooking/';
        //ファイル名をユニーク化
        $str=$_FILES['cooking_image']['name'];
        $path_parts = pathinfo($str);
        $random_name = uniqid(mt_rand());
        $image_name = $random_name . '.' . $path_parts['extension'];
        $uploadfile = $uploaddir . $image_name;
        if (move_uploaded_file($_FILES['cooking_image']['tmp_name'], $uploadfile)) {
          echo "画像は正常にアップロードされました。\n";
      } else {
          echo "画像のアップロードができませんでした\n";
      }
      
        $sql=$pdo->prepare('insert into Recipes values(null,?,?,default,default,?,?)');
        $sql->execute([$_POST['recipe_name'] , $id , $image_name , $_POST['recipe_description']]);

        // 直前に挿入されたレシピのIDを取得
        $last_resipi_id = $pdo->lastInsertId(); 

        //材料の配列を格納
        $ingredient_names = $_POST['ingredient_name'];
        $ingredient_quantitys = $_POST['ingredient_quantity'];

        //レシピ材料詳細
        $key=1;
        foreach (array_map(null, $ingredient_names, $ingredient_quantitys) as [$value1, $value2]) {
            $sql_ingredient = $pdo->prepare('insert into Recipe_ingredients VALUES (?, ?, ?, ?)');  
            $sql_ingredient->execute([$last_resipi_id, $key, $value1, $value2]);
            $key++;
        }

        //作り方の配列を格納
        $cooking_procedures = $_POST['cooking_procedure'];
        var_dump($cooking_procedures);

        //レシピ作り方詳細
        $key=1;
        foreach ($cooking_procedures as $value3) {
            $sql_description = $pdo->prepare('insert into Recipe_cooking VALUES (?, ?, ?)');  
            $sql_description->execute([$last_resipi_id, $key, $value3]);
            $key++;
        }

        //imagesディレクトリにファイル保存
        move_uploaded_file($_FILES['recipe_image']['tmp_name'],$image);
    }
?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>
