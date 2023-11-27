<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php

    $pdo=new PDO($connect, USER, PASS);
    //$id=$_SESSION['customer']['id'];
    $id=1;
    if(!empty($_POST)) {
        $sql=$pdo->prepare('insert into Recipes values(null,?,?,default,default,?,?)');
        $sql->execute([$_POST['recipe_name'] , $id , $_POST['recipe_image_pass'] , $_POST['recipe_description']]);

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
    }
?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>