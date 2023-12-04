<?php session_start(); ?>
<?php require 'db-connect.php'; ?>
<?php require 'header.php'; ?>
<?php require 'header-menu.php'; ?>
<div class="hero-body py-5">

<?php
if(empty($_GET['recipe_id'])){
    echo '<form action = "recipe-insert.php" class="box" method="post" enctype="multipart/form-data">';
    echo '<div class="field" id="cookingimage">';
    echo '<div class="file is-boxed image has-name is-fullwidth">';
    echo '<label class="file-label">';
    echo '<input class="file-input" type="file" name="cooking_image" accept="image/*" @change="onImageUploaded">';
    echo '<span class="file-cta">';
    echo '<span class="file-icon"><i class="fas fa-upload"></i></span>';
    echo '<span class="file-label has-text-centered">料理の写真をのせる</span>';
    echo '</span>';
    echo '<span class="file-name has-text-centered">{{ image_name }}</span>';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field">';
    echo '<label class="label">レシピ名</label>';
    echo '<div class="control">';
    echo '<input type = "text" class="input" name = "recipe_name" required>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field ingredient">';
    echo '<label class="label">材料</label>';
    echo '<div class="control">';
    echo '<table id="ingredient_table">';
    echo '<tbody id="ingredient_tbody">';
    echo '<tr class="ingredient_item">';
    echo '<td class="width55"><input type = "text" class="input mb-2" name = "ingredient_name[]" placeholder="材料" required></td>';
    echo '<td class="width35"><input type = "text" class="input mb-2" name = "ingredient_quantity[]" placeholder="分量" required></td>';
    echo '<td class="width5 clear-column pb-2"><span class="ingredient_close-icon" onclick="deleteIngredient(this)">✖</span></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr>';
    echo '<td><button id="ingredient_add" type="button" onclick="addIngredientRow()">＋材料を追加</button></td>';
    echo '</tr>';
    echo '</tfoot>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field cooking">';
    echo '<label class="label">作り方</label>';
    echo '<div class="control">';
    echo '<table id="cooking_table">';
    echo '<tbody id="cooking_tbody">';
    echo '<tr class="cooking_item">';
    echo '<td class="width95 pr-2"><textarea class="textarea mb-2" name = "cooking_procedure[]" placeholder="作り方" rows="2" cols="40" required></textarea></td>';
    echo '<td class="width5 clear-column pb-2"><span class="cooking_close-icon" onclick="deleteCooking(this)">✖</span></td>';
    echo '</tr>';
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr>';
    echo '<td><button id="cooking_add" type="button" onclick="addCookingRow()">＋作り方を追加</button></td>';
    echo '</tr>';
    echo '</tfoot>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field">';
    echo '<label class="label">説明</label>';
    echo '<div class="control">';
    echo '<textarea class="textarea" name="recipe_description" rows="4" cols="40"></textarea>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field has-text-right">';
    echo '<input class="button is-link" type = "submit" value = "投稿">';
    echo '</div>';
    echo '</form>';         
}else{
    $pdo=new PDO($connect, USER, PASS);
    $recipe_id=$_GET['recipe_id'];
    $sql=$pdo->prepare('SELECT * FROM Recipes where recipe_id = ?');
    $sql->execute([$recipe_id]);
    $item=$sql->fetchAll();
    $ingredient_sql=$pdo->prepare('SELECT * FROM Recipe_ingredients where recipe_id = ?');
    $ingredient_sql->execute([$recipe_id]);
    $cooking_sql=$pdo->prepare('SELECT * FROM Recipe_cooking where recipe_id = ?');
    $cooking_sql->execute([$recipe_id]);
    echo '<form action = "recipe-update.php" class="box" method="post" enctype="multipart/form-data">';
    echo '<input type="hidden" name="recipe_id" value="',$recipe_id,'">';
    echo '<div class="field" id="cookingimage">';
    echo '<div class="file is-boxed image has-name is-fullwidth">';
    echo '<label class="file-label">';
    echo '<input class="file-input" type="file" name="cooking_image" accept="image/*" @change="onImageUploaded">';
    echo '<span class="file-cta">';
    echo '<span class="file-icon"><i class="fas fa-upload"></i></span>';
    echo '<span class="file-label has-text-centered">料理の写真を変更する</span>';
    echo '</span>';
    echo '<span class="file-name has-text-centered">{{ image_name }}</span>';
    echo '</label>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field">';
    echo '<label class="label">レシピ名</label>';
    echo '<div class="control">';
    echo '<input type = "text" class="input" name = "recipe_name" value="',$item[0]['recipe_name'],'" required>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field ingredient">';
    echo '<label class="label">材料</label>';
    echo '<div class="control">';
    echo '<table id="ingredient_table">';
    echo '<tbody id="ingredient_tbody">';
    foreach($ingredient_sql as $row){
        echo '<tr class="ingredient_item">';
        echo '<td class="width55"><input type = "text" class="input mb-2" name = "ingredient_name[]" value="',$row['ingredient_name'],'" required></td>';
        echo '<td class="width35"><input type = "text" class="input mb-2" name = "ingredient_quantity[]" value="',$row['ingredient_quantity'],'" required></td>';
        echo '<td class="width5 clear-column pb-2"><span class="ingredient_close-icon" onclick="deleteIngredient(this)">✖</span></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr>';
    echo '<td><button id="ingredient_add" type="button" onclick="addIngredientRow()">＋材料を追加</button></td>';
    echo '</tr>';
    echo '</tfoot>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field cooking">';
    echo '<label class="label">作り方</label>';
    echo '<div class="control">';
    echo '<table id="cooking_table">';
    echo '<tbody id="cooking_tbody">';
    foreach($cooking_sql as $row){
        echo '<tr class="cooking_item">';
        echo '<td class="width95 pr-2"><textarea class="textarea mb-2" name = "cooking_procedure[]" placeholder="作り方" rows="2" cols="40" required>',$row['cooking_procedure'],'</textarea></td>';
        echo '<td class="width5 clear-column pb-2"><span class="cooking_close-icon" onclick="deleteCooking(this)">✖</span></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '<tfoot>';
    echo '<tr>';
    echo '<td><button id="cooking_add" type="button" onclick="addCookingRow()">＋作り方を追加</button></td>';
    echo '</tr>';
    echo '</tfoot>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field">';
    echo '<label class="label">説明</label>';
    echo '<div class="control">';
    echo '<textarea class="textarea" name="recipe_description" rows="4" cols="40">',$item[0]['recipe_description'],'</textarea>';
    echo '</div>';
    echo '</div>';
    echo '<div class="field has-text-right">';
    echo '<input class="button is-link" type = "submit" value = "変更">';
    echo '</div>';
    echo '</form>';
}
?>
</div>
<?php require 'footer-menu.php'; ?>
<?php require 'footer.php'; ?>