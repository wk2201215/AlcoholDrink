<?php require 'not-access.php'; ?>
<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'judge.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<?php include_once 'view_counter.class.php';
$counter = new ViewCounter();
//ページ固有のID
$id = 0018;
$count = $counter->log($id,$_SESSION['customer']['id']);
// echo $count;
?>
<div class="hero-body py-5">

<?php
    $pdo=new PDO($connect, USER, PASS);
    $id=$_SESSION['customer']['id'];
    //$id=1;
    if(!empty($_POST)) {
        $recipe_id=$_POST['recipe_id'];
      //画像処理
        $image_name = null;
        if(!empty($_FILES['cooking_image']['name'])){
        $uploaddir = 'images/cooking/';
        //ファイル名をユニーク化
        $str=$_FILES['cooking_image']['name'];
        $path_parts = pathinfo($str);
        $random_name = uniqid(mt_rand());
        $image_name = $random_name . '.' . $path_parts['extension'];
        $uploadfile = $uploaddir . $image_name;
        if (move_uploaded_file($_FILES['cooking_image']['tmp_name'], $uploadfile)) {
          echo "正常にアップロードされました。\n";
        } else {
          echo "画像のアップロードができませんでした\n";
        }

        //画像update文
        $sql=$pdo->prepare('UPDATE Recipes SET recipe_image_pass = ? WHERE recipe_id = ?');
        $sql->execute([$image_name,$recipe_id]);
       }
        
       //材料delete文
        $sql=$pdo->prepare('DELETE FROM Recipe_ingredients WHERE recipe_id = ?');
        $sql->execute([$recipe_id]);

        if(!empty($_POST['ingredient_name'])){
            //材料の配列を格納
            $ingredient_names = $_POST['ingredient_name'];
            $ingredient_quantitys = $_POST['ingredient_quantity'];

            //レシピ材料詳細
            $key=1;
            foreach (array_map(null, $ingredient_names, $ingredient_quantitys) as [$value1, $value2]) {
                $sql_ingredient = $pdo->prepare('insert into Recipe_ingredients VALUES (?, ?, ?, ?)');  
                $sql_ingredient->execute([$recipe_id, $key, $value1, $value2]);
                $key++;
            }
        }
        //作り方delete文
        $sql=$pdo->prepare('DELETE FROM Recipe_cooking WHERE recipe_id = ?');
        $sql->execute([$recipe_id]);

        if(!empty($_POST['cooking_procedure'])){
            //作り方の配列を格納
            $cooking_procedures = $_POST['cooking_procedure'];

            //レシピ作り方詳細
            $key=1;
            foreach ($cooking_procedures as $value3) {
                $sql_description = $pdo->prepare('insert into Recipe_cooking VALUES (?, ?, ?)');  
                $sql_description->execute([$recipe_id, $key, $value3]);
                $key++;
            }
        }
        //タイトルと説明のupdate文
        $sql=$pdo->prepare('UPDATE Recipes SET recipe_name = ? , recipe_description = ? WHERE recipe_id = ?');
        $sql->execute([$_POST['recipe_name'], $_POST['recipe_description'], $recipe_id]);
    }
?>

</div>
<?php require 'recipe-show.php'; ?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>

