<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>

<?php
    $pdo=new PDO($connect, USER, PASS);
    //$id=$_SESSION['customer']['id'];
    $id=1;
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
          echo "正常にアップロードされました。\n";
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

<?php
    $pdo=new PDO($connect, USER, PASS);
    $recipe_id=$last_resipi_id;
    $sql=$pdo->prepare('SELECT * FROM Recipes where recipe_id = ?');
    $sql->execute([$recipe_id]);
    $item=$sql->fetchAll();
    $ingredient_sql=$pdo->prepare('SELECT * FROM Recipe_ingredients where recipe_id = ?');
    $ingredient_sql->execute([$recipe_id]);
    $cooking_sql=$pdo->prepare('SELECT * FROM Recipe_cooking where recipe_id = ?');
    $cooking_sql->execute([$recipe_id]);

echo '<div class="box">';

//画像
echo '<div class="field">';
echo '<div class="image is-fullwidth has-background-info-light">';
echo '<img src="images/cooking/',$item[0]['recipe_image_pass'],'" class="mx-auto" style="max-height:50vh;width:auto;">';
echo '</div>';
echo '</div>';
//レシピ名
echo '<div class="field">';
echo '<label class="label">',$item[0]['recipe_name'],'</label>';
echo '</div>';
//説明
echo '<div class="field">';
echo '<label>',$item[0]['recipe_description'],'</label>';
echo '</div>';
//材料
echo '<div class="field ingredient">';
echo '<label class="label">材料</label>';
echo '<div class="control">';
echo '<table id="ingredient_table" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
echo '<tbody id="ingredient_tbody">';
foreach($ingredient_sql as $row){
    echo '<tr class="ingredient_item">';
    echo '<td class="width5">',$row['ingredient_number'],'</td>';
    echo '<td class="width55">',$row['ingredient_name'],'</td>';
    echo '<td class="width35">',$row['ingredient_quantity'],'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
//作り方
echo '<div class="field cooking">';
echo '<label class="label">作り方</label>';
echo '<div class="control">';
echo '<table id="cooking_table" class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">';
echo '<tbody id="cooking_tbody">';
foreach($cooking_sql as $row){
    echo '<tr class="cooking_item">';
    echo '<td class="width5">',$row['cooking_number'],'</td>';
    echo '<td class="width95">',$row['cooking_procedure'],'</td>';
    echo '</tr>';
}
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';

echo '</div>';
?>

<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>
